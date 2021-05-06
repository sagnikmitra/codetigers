<?php
/**
 * @copyright 2009-2019 Vanilla Forums Inc.
 * @license MIT
 */

namespace Garden\SafeCurl;

/**
 * A collection of potential URL part configurations. Useful for defining white- or blacklists.
 */
class UrlPartsList {
    /** @var array */
    private $hosts = [];

    /** @var array */
    private $ips = [];

    /** @var array */
    private $ports = [];

    /** @var array */
    private $schemes = [];

    /**
     * Configure the parts lists.
     *
     * @param array $hosts
     * @param array $ips
     * @param array $ports
     * @param array $schemes
     */
    public function __construct(array $hosts = [], array $ips = [], array $ports = [], array $schemes = []) {
        $this->setHosts($hosts);
        $this->setIPs($ips);
        $this->setPorts($ports);
        $this->setSchemes($schemes);
    }

    /**
     * Add a hostname.
     *
     * @param string $host
     */
    public function addHost(string $host): void {
        $this->insertValue($host, $this->hosts);
    }

    /**
     * Add an IP address or IP address CIDR mask.
     *
     * @param string $ip
     */
    public function addIP(string $ip): void {
        $this->insertValue($ip, $this->ips);
    }

    /**
     * Add a port.
     *
     * @param integer $port
     */
    public function addPort(int $port): void {
        $this->insertValue($port, $this->ports);
    }

    /**
     * Add a scheme.
     *
     * @param string $scheme
     */
    public function addScheme(string $scheme): void {
        $this->insertValue($scheme, $this->schemes);
    }

    /**
     * Get all configured hostnames.
     *
     * @return array
     */
    public function getHosts(): array {
        return $this->hosts;
    }

    /**
     * Get all configured IP addresses.
     *
     * @return array
     */
    public function getIPs(): array {
        return $this->ips;
    }

    /**
     * Get all configured ports.
     *
     * @return array
     */
    public function getPorts(): array {
        return $this->ports;
    }

    /**
     * Get all configured schemes.
     *
     * @return array
     */
    public function getSchemes(): array {
        return $this->schemes;
    }

    /**
     * Cleanup a value and insert it into an array if it does not already exist.
     *
     * @param mixed $value
     * @param array $destination
     */
    private function insertValue($value, array &$destination): void {
        $value = trim($value);
        if (!in_array($value, $destination)) {
            $destination[] = $value;
        }
    }

    /**
     * Overwrite configured URL parts with a new array of values.
     *
     * @param array $parts
     * @param array $values
     * @param callable $callback
     */
    private function overwriteParts(array &$parts, array $values, callable $callback) {
        $parts = [];
        foreach ($values as $value) {
            $callback($value);
        }
    }

    /**
     * Overwrite configured hosts.
     *
     * @param array $hosts
     */
    public function setHosts(array $hosts): void {
        $this->overwriteParts($this->hosts, $hosts, [$this, "addHost"]);
    }

    /**
     * Get all configured IP addresses.
     *
     * @param array $ips
     */
    public function setIPs(array $ips): void {
        $this->overwriteParts($this->ips, $ips, [$this, "addIP"]);
    }

    /**
     * Get all configured ports.
     *
     * @param array $ports
     */
    public function setPorts(array $ports): void {
        $this->overwriteParts($this->ports, $ports, [$this, "addPort"]);
    }

    /**
     * Get all configured schemes.
     *
     * @param array $schemes
     */
    public function setSchemes(array $schemes): void {
        $this->overwriteParts($this->schemes, $schemes, [$this, "addScheme"]);
    }
}
