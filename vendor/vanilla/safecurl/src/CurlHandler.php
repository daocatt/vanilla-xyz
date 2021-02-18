<?php
/**
 * @copyright 2009-2019 Vanilla Forums Inc.
 * @license MIT
 */

namespace Garden\SafeCurl;

/**
 * Class CurlHandler
 *
 * A wrapper for cURL methods.
 * Allows for a more object-oriented style
 * Allows for better unit testing (stub out this class and prevent actual network calls)
 *
 * @package Garden\SafeCurl
 */
class CurlHandler
{
    /**
     * @var resource
     */
    private $curlResource;

    /**
     * CurlHandler constructor.
     * @param $curlResource
     */
    public function __construct($curlResource) {
        $this->curlResource = $curlResource;
    }

    /**
     * Runs curl_exec with the local resource
     *
     * @see curl_exec()
     * @return bool|string
     */
    public function execute() {
        return curl_exec($this->curlResource);
    }

    /**
     * Runs get_error with the local resource
     *
     * @see curl_error()
     * @return string
     */
    public function getError(): string {
        return curl_error($this->curlResource);
    }

    /**
     * Runs curl_errno with the local resource
     *
     * @see curl_errno()
     * @return int
     */
    public function getErrorNumber(): int {
        return curl_errno($this->curlResource);
    }

    /**
     * Runs curl_getinfo with the local resource
     *
     * @see curl_getinfo()
     * @param int|null $option
     * @return mixed
     */
    public function getInfo(int $option = null) {
        return curl_getinfo($this->curlResource, $option);
    }

    /**
     * Runs curl_version with the local resource
     *
     * @see curl_version()
     * @return array
     */
    public function getVersion(): array {
        return curl_version();
    }

    /**
     * Runs curl_setopt with the local resource
     *
     * @see curl_setopt()
     * @param $option
     * @param $value
     */
    public function setOption($option, $value): void {
        curl_setopt($this->curlResource, $option, $value);
    }
}
