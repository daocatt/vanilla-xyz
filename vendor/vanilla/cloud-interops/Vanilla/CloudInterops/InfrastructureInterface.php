<?php
/**
 * @copyright 2009-2020 Vanilla Forums Inc.
 * @author Eduardo Garcia Julia <eduardo.garciajulia@vanillaforums.com>
 * @license Proprietary
 */

namespace Vanilla\CloudInterops;

/**
 * Interface InfrastructureInterface
 */
interface InfrastructureInterface {

    /**
     * Get Site Id
     *
     * @return int
     */
    public function getSiteID(): int;

    /**
     * Get Account Id
     *
     * @return int
     */
    public function getAccountID(): int;

    /**
     * Get Cluster Name
     *
     * @return string
     */
    public function getClusterName(): string;

    /**
     * Get Cluster Config
     *
     * @param null $key
     * @param null $default
     * @return mixed
     */
    public function getClusterConfig($key = null, $default = null);

    /**
     * Get Site Config
     *
     * @param string $key
     * @param bool $defaultValue
     * @return mixed
     */
    public function getSiteConfig($key, $defaultValue = false);

    /**
     * Get Enable/Disable flag for a Feature. Defaults to true, unless a default is set in the call
     *
     * @param string $featureName
     * @param bool $default
     * @return bool
     */
    public function isFeatureEnable(string $featureName, bool $default = true): bool;
}
