<?php
/**
 * @copyright 2009-2019 Vanilla Forums Inc.
 * @license MIT
 */

namespace Garden\SafeCurl\Tests;

use Garden\SafeCurl\CurlHandler;
use Garden\SafeCurl\Exception;
use Garden\SafeCurl\Exception\CurlException;
use Garden\SafeCurl\SafeCurl;
use Garden\SafeCurl\Exception\InvalidURLException;
use Garden\SafeCurl\UrlPartsList;
use Garden\SafeCurl\UrlValidator;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

/**
 * Verify functionality of the SafeCurl class.
 */
class SafeCurlTest extends TestCase {

    private $curlHandler;

    /**
     * Invoke an other protected method on an object
     *
     * @param $object
     * @param $methodName
     * @param array $parameters
     * @return mixed
     * @throws \ReflectionException
     */
    public function invokeMethod(&$object, $methodName, array $parameters = array())
    {
        $reflection = new \ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $parameters);
    }

    protected function setUp(): void {
        parent::setUp();
        $this->curlHandler = $this->createStub(CurlHandler::class);
        $this->curlHandler
            ->expects($this->any())
            ->method('getVersion')
            ->willReturn(curl_version());
    }

    /**
     * Verify the ability to retrieve a normal URL using the default configuration.
     */
    public function testFunctionnalGet() {
        $handle = curl_init();

        $safeCurl = new SafeCurl($handle);
        $response = $safeCurl->execute("http://www.example.com");

        $this->assertNotEmpty($response);
    }

    /**
     * Verify a valid cURL handle is required to use the class.
     *
     */
    public function testBadCurlHandler() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('curlHandle must be a resource or instance of Garden\SafeCurl\CurlHandler');
        new SafeCurl(null);
    }

    /**
     * Provide data for testing blocked URLs.
     *
     * @return array
     */
    public function dataForBlockedUrl(): array {
        return [
            [
                "http://0.0.0.0:123",
                InvalidURLException::class,
                "Port is not whitelisted.",
            ],
            [
                "http://127.0.0.1/server-status",
                InvalidURLException::class,
                "Host resolves to a blacklisted address.",
            ],
            [
                "file:///etc/passwd",
                InvalidURLException::class,
                "No host found in URL.",
            ],
            [
                "ssh://localhost",
                InvalidURLException::class,
                "Scheme is not whitelisted.",
            ],
            [
                "gopher://localhost",
                InvalidURLException::class,
                "Scheme is not whitelisted.",
            ],
            [
                "telnet://localhost:25",
                InvalidURLException::class,
                "Scheme is not whitelisted.",
            ],
            [
                "http://169.254.169.254/latest/meta-data/",
                InvalidURLException::class,
                "Host resolves to a blacklisted address.",
            ],
            [
                "ftp://myhost.com",
                InvalidURLException::class,
                "Scheme is not whitelisted.",
            ],
            [
                "http://user:pass@www.vanillaforums.com?@www.example.com/",
                InvalidURLException::class,
                "Credentials not allowed as part of the URL.",
            ],
        ];
    }

    /**
     * Verify the default configuration can block dangerous URLs.
     *
     * @param string $url
     * @param string $exception
     * @param string $message
     * @dataProvider dataForBlockedUrl
     */
    public function testBlockedUrl(string $url, string $exception, string $message) {
        $this->expectException($exception);
        $this->expectExceptionMessage($message);

        $safeCurl = new SafeCurl(curl_init());
        $safeCurl->execute($url);
    }

    /**
     * Provide data for testing custom validation criteria.
     *
     * @return array
     */
    public function dataForBlockedUrlByOptions(): array {
        return [
            ["http://login:password@www.example.com", InvalidURLException::class, "Credentials not allowed as part of the URL."],
            ["http://www.example.com", InvalidURLException::class, "Host is blacklisted."],
        ];
    }

    /**
     * Verify validation based on custom criteria.
     *
     * @param string $url
     * @param string $exception
     * @param string $message
     * @dataProvider dataForBlockedUrlByOptions
     */
    public function testBlockedUrlByOptions(string $url, string $exception, string $message) {
        $this->expectException($exception);
        $this->expectExceptionMessage($message);

        $blacklist = new UrlPartsList();
        $blacklist->addHost("(.*)\.example\.com");

        $urlValidator = new UrlValidator($blacklist);
        $urlValidator->setCredentialsAllowed(false);

        $safeCurl = new SafeCurl(curl_init(), $urlValidator);
        $safeCurl->execute($url);
    }

    /**
     * Verify limiting following redirects.
     */
    public function testWithFollowLocationLimit() {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Redirect limit exceeded.");

        $safeCurl = new SafeCurl(curl_init());
        $safeCurl->setFollowLocation(true);
        $safeCurl->setFollowLocationLimit(1);
        $safeCurl->execute("https://google.com");
    }

    /**
     * Verify successfully following redirects.
     */
    public function testWithFollowLocation() {
        $safeCurl = new SafeCurl(curl_init());
        $safeCurl->setFollowLocation(true);
        $response = $safeCurl->execute("https://google.com");

        $this->assertNotEmpty($response);
    }

    public function testSettingHostIPs() {
        $url = [
            'url' => 'http://example.com',
            'host' => 'example.com',
            'ips' => [
                '1.2.3.4'
            ]
        ];

        $option = CURLOPT_RESOLVE;
        $value = [
            'example.com:80:1.2.3.4'
        ];


        $setOptionValue = null;
        $this->curlHandler
            ->expects($this->any())
            ->method('setOption')
            ->will(
                $this->returnCallback(function($op, $val) use($option, &$setOptionValue){
                    if($op === $option){
                        $setOptionValue = $val;
                    }
                })
            )
        ;

        $safeCurl = new SafeCurl($this->curlHandler);
        $this->invokeMethod($safeCurl, 'setHostIPs', [$url]);
        $this->assertSame($value, $setOptionValue);
    }

    /**
     * Verify blocking a URL that redirects to a blacklisted IP address.
     */
    public function testWithFollowLocationLeadingToABlockedUrl() {
        $this->expectException(InvalidURLException::class);
        $this->expectExceptionMessage("Port is not whitelisted.");

        $httpCode = 301;
        $redirectUrl = 'http://0.0.0.0:123';

        $this->curlHandler
            ->expects($this->any())
            ->method('getInfo')
            ->will(
                $this->returnCallback(function($option) use($httpCode, $redirectUrl) {
                    if (CURLINFO_HTTP_CODE === $option) {
                        return $httpCode;
                    }
                    if (CURLINFO_REDIRECT_URL === $option) {
                        return $redirectUrl;
                    }
                })
            )
        ;

        $safeCurl = new SafeCurl($this->curlHandler);
        $safeCurl->setFollowLocation(true);
        $safeCurl->execute("http://httpbin.org/redirect-to?url=$redirectUrl");
    }

    /**
     * Verify cURL timeouts are appropriately reported.
     */
    public function testWithCurlTimeout() {
        $this->expectException(CurlException::class);
        $this->expectExceptionMessage("timed out");

        $handle = curl_init();
        curl_setopt($handle, CURLOPT_TIMEOUT_MS, 1);

        $safeCurl = new SafeCurl($handle);
        $safeCurl->execute("https://httpstat.us/200?sleep=100");
    }
}
