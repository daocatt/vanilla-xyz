<?php
/**
 * @copyright 2009-2019 Vanilla Forums Inc.
 * @license MIT
 */

namespace Garden\SafeCurl;

use Garden\SafeCurl\Exception\CurlException;
use Garden\SafeCurl\Exception\InvalidURLException;
use InvalidArgumentException;

/**
 * A wrapper to curl_exec for safely executing requests.
 */
class SafeCurl {

    private const CURL_RESOURCE_TYPE = "curl";

    /** @var CurlHandler */
    private $curlHandle;

    /** @var boolean */
    private $followLocation = false;

    /** @var int */
    private $followLocationLimit = 0;

    /** @var boolean */
    private $outputHeaders = false;

    /** @var UrlValidator */
    private $urlValidator;

    /**
     * Setup the instance.
     *
     * @param resource|CurlHandler $curlHandle
     * @param UrlValidator $urlValidator
     */
    public function __construct($curlHandle, ?UrlValidator $urlValidator = null) {
        $this->setCurlHandle($curlHandle);
        $this->setUrlValidator($urlValidator ?: new UrlValidator());
        $this->init();
    }

    /**
     * Exectutes a cURL request, whilst checking that the URL abides by our whitelists/blacklists.
     *
     * @param string $url
     * @return bool|string
     */
    public function execute($url) {
        $redirected = false;
        $redirectCount = 0;
        $redirectLimit = $this->getFollowLocationLimit();

        do {
            $url = $this->urlValidator->validateUrl($url);

            $this->curlHandle->setOption(CURLOPT_URL, $url["url"]);

            $response = $this->curlHandle->execute();

            if ($this->curlHandle->getErrorNumber()) {
                $error = $this->curlHandle->getError();
                throw new CurlException($error);
            }

            //Check for an HTTP redirect.
            if ($this->shouldFollowLocation()) {
                $statusCode = $this->curlHandle->getInfo(CURLINFO_HTTP_CODE);
                switch ($statusCode) {
                    case 301:
                    case 302:
                    case 303:
                    case 307:
                    case 308:
                        //Redirect received, so rinse and repeat.
                        if (0 === $redirectLimit || ++$redirectCount < $redirectLimit) {
                            $url = $this->curlHandle->getInfo(CURLINFO_REDIRECT_URL);
                            $redirected = true;
                        } else {
                            throw new Exception("Redirect limit exceeded.");
                        }
                        break;
                    default:
                        $redirected = false;
                }
            }
        } while ($redirected);

        return $response;
    }

    /**
     * Returns cURL handle.
     *
     * @return resource
     */
    public function getCurlHandle() {
        return $this->curlHandle;
    }

    /**
     * Get the maximum number of times location headers can be followed in a request.
     *
     * @return int
     */
    public function getFollowLocationLimit(): int {
        return $this->followLocationLimit;
    }

    /**
     * Sets up cURL ready for executing.
     */
    protected function init(): void {
        //To start with, disable FOLLOWLOCATION since we'll handle it.
        $this->curlHandle->setOption(CURLOPT_FOLLOWLOCATION, false);

        $this->curlHandle->setOption(CURLOPT_RETURNTRANSFER, true);

        //Force IPv4, since this class isn't yet comptible with IPv6.
        $curlVersion = $this->curlHandle->getVersion();
        if ($curlVersion["features"] & CURLOPT_IPRESOLVE) {
            $this->curlHandle->setOption(CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        }
    }

    /**
     * Remove headers from an output string, based
     *
     * @param string $output
     * @param int $headersLength
     * @return string
     */
    private function removeHeadersFromOutput(string $output, int $headersLength): string {
        $output = substr($output, $headersLength);

        // In case of a HEAD request or when reponse body is empty, substr may return a boolean false.
        if ($output === false) {
            $output = "";
        }

        return $output;
    }

    /**
     * Sets cURL handle.
     *
     * @param resource|CurlHandler $curlHandle
     */
    public function setCurlHandle($curlHandle): void {
        if (is_resource($curlHandle)){
            $this->validateCurlHandle($curlHandle);
            $this->curlHandle = new CurlHandler($curlHandle);
        } elseif ($curlHandle instanceof CurlHandler) {
            $this->curlHandle = $curlHandle;
        } else {
            throw new InvalidArgumentException('curlHandle must be a resource or instance of Garden\SafeCurl\CurlHandler');
        }
    }

    /**
     * Set whether or not location headers in responses be followed.
     *
     * @param boolean $followLocation
     */
    public function setFollowLocation(bool $followLocation): void {
        $this->followLocation = $followLocation;
    }

    /**
     * Set the maximum number of times location headers can be followed in a request.
     *
     * @param integer $limit
     */
    public function setFollowLocationLimit(int $limit): void {
        $this->followLocationLimit = $limit;
    }

    /**
     * After a host's IPs have been resolved, we set them as a cURL option.
     * This prevents the use of DNS rebinding as an SSRF attack
     *
     * @param array $url
     */
    private function setHostIPs(array $url): void {
        $port = parse_url($url['url'], PHP_URL_PORT);
        if (is_null($port) ){
            $scheme = parse_url($url['url'], PHP_URL_SCHEME);
            switch($scheme){
                case 'https':
                    $port = 443;
                    break;
                case 'http':
                default:
                    $port = 80;
                    break;
            };
        }

        $resolves = [];
        foreach ($url['ips'] as $url_ip) {
            $resolves[] = "{$url['host']}:$port:$url_ip";
        }
        $this->curlHandle->setOption(CURLOPT_RESOLVE, $resolves);
    }

    /**
     * Set whether or not headers should be included in the output of the request.
     *
     * @param boolean $outputHeaders
     */
    public function setOutputHeaders(bool $outputHeaders): void {
        $this->outputHeaders = $outputHeaders;
    }

    /**
     * Should location headers in responses be followed?
     *
     * @return boolean
     */
    public function shouldFollowLocation(): bool {
        return $this->followLocation;
    }

    /**
     * Should response headers be included in the output?
     *
     * @return boolean
     */
    public function shouldOutputHeaders(): bool {
        return $this->outputHeaders;
    }

    /**
     * Set the request URL validator.
     *
     * @param UrlValidator $urlValidator
     */
    public function setUrlValidator(UrlValidator $urlValidator): void {
        $this->urlValidator = $urlValidator;
    }

    /**
     * Validate the value is a cURL resource.
     *
     * @param resource $curlHandle
     */
    private function validateCurlHandle($curlHandle): void {
        if (!is_resource($curlHandle) || get_resource_type($curlHandle) !== self::CURL_RESOURCE_TYPE) {
            //Need a valid cURL resource, throw exception
            throw new \InvalidArgumentException("Invalid cURL handle provided.");
        }
    }
}
