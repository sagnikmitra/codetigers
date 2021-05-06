<?php
/**
 * @copyright 2009-2019 Vanilla Forums Inc.
 * @license MIT
 */

namespace Garden\SafeCurl;

use Garden\SafeCurl\Exception\InvalidURLException;
use Garden\SafeCurl\UrlPartsList;

/**
 * Validate URLs against potential SSRF attacks.
 */
class UrlValidator {

    /** @var UrlPartsList */
    private $blacklist;

    /** @var boolean */
    private $credentialsAllowed = false;

    /** @var UrlPartsList */
    private $whitelist;

    /**
     * Configure the validator.
     *
     * @param UrlPartsList $blacklist
     * @param UrlPartsList $whitelist
     */
    public function __construct(?UrlPartsList $blacklist = null, ?UrlPartsList $whitelist = null) {
        $this->blacklist = $blacklist ?: $this->getDefaultBlacklist();
        $this->whitelist = $whitelist ?: $this->getDefaultWhitelist();
    }

    /**
     * Are URLs allowed to contain login credentials?
     *
     * @return boolean
     */
    public function areCredentialsAllowed(): bool {
        return $this->credentialsAllowed;
    }

    /**
     * Checks a passed in IP against a CIDR.
     * See http://stackoverflow.com/questions/594112/matching-an-ip-to-a-cidr-mask-in-php5.
     *
     * @param string $ip
     * @param string $cidr
     * @return boolean
     */
    private function cidrMatch(string $ip, string $cidr): bool {
        if (false === strpos($cidr, "/")) {
            //It doesn't have a prefix, just a straight IP match
            return $ip === $cidr;
        }

        list($subnet, $mask) = explode("/", $cidr);
        if ((ip2long($ip) & ~((1 << (32 - $mask)) - 1)) === ip2long($subnet)) {
            return true;
        }

        return false;
    }

    /**
     * Re-build a URL based on an array of parts.
     *
     * @param array $parts
     * @return string
     */
    private function buildUrl(array $parts): string {
        $url = "";

        $url .= !empty($parts["scheme"]) ? $parts["scheme"] . "://" : "";
        $url .= !empty($parts["user"]) ? $parts["user"] : "";
        $url .= !empty($parts["pass"]) ? ":" . $parts["pass"] : "";
        //If we have a user or pass, make sure to add an "@"
        $url .= !empty($parts["user"]) || !empty($parts["pass"]) ? "@" : "";
        $url .= !empty($parts["host"]) ? $parts["host"] : "";
        $url .= !empty($parts["port"]) ? ":" . $parts["port"] : "";
        $url .= !empty($parts["path"]) ? $parts["path"] : "";
        $url .= !empty($parts["query"]) ? "?" . $parts["query"] : "";
        $url .= !empty($parts["fragment"]) ? "#" . $parts["fragment"] : "";

        return $url;
    }

    /**
     * Get the default blacklist configuration.
     *
     * @return UrlPartsList
     */
    private function getDefaultBlacklist(): UrlPartsList {
        $result = new UrlPartsList();
        $result->setIPs([
            "0.0.0.0/8",
            "10.0.0.0/8",
            "100.64.0.0/10",
            "127.0.0.0/8",
            "169.254.0.0/16",
            "172.16.0.0/12",
            "192.0.0.0/29",
            "192.0.2.0/24",
            "192.88.99.0/24",
            "192.168.0.0/16",
            "198.18.0.0/15",
            "198.51.100.0/24",
            "203.0.113.0/24",
            "224.0.0.0/4",
            "240.0.0.0/4",
        ]);
        return $result;
    }

    /**
     * Get the default whitelist configuration.
     *
     * @return UrlPartsList
     */
    private function getDefaultWhitelist(): UrlPartsList {
        $result = new UrlPartsList();
        $result->setPorts([80, 443, 8080]);
        $result->setSchemes(["http", "https"]);
        return $result;
    }

    /**
     * Set whether or not sending credentials as part of a URL should be allowed.
     *
     * @param boolean $credentialsAllowed
     */
    public function setCredentialsAllowed(bool $credentialsAllowed): void {
        $this->credentialsAllowed = $credentialsAllowed;
    }

    /**
     * Validates a URL host.
     *
     * @param string $host
     * @return array
     */
    private function validateHost(string $host): array {
        $host = strtolower($host);

        //Check the host against the domain lists
        $whitelistedHosts = $this->whitelist->getHosts();
        if (!empty($whitelistedHosts) && $this->validateHostPattern($host, $whitelistedHosts) === false) {
            throw new InvalidURLException("Host is not whitelisted.");
        }

        $blacklistedHosts = $this->blacklist->getHosts();
        if (!empty($blacklistedHosts) && $this->validateHostPattern($host, $blacklistedHosts) === true) {
            throw new InvalidURLException("Host is blacklisted.");
        }

        //Now resolve to an IP and check against the IP lists
        $ips = @gethostbynamel($host);
        if (empty($ips)) {
            throw new InvalidURLException("Unable to resolve host.");
        }

        $whitelistedIPs = $this->whitelist->getIPs();
        if (!empty($whitelistedIPs)) {
            $valid = false;

            foreach ($whitelistedIPs as $whitelistedIP) {
                foreach ($ips as $ip) {
                    if ($this->cidrMatch($ip, $whitelistedIP)) {
                        $valid = true;
                        break 2;
                    }
                }
            }

            if (!$valid) {
                throw new InvalidURLException("Host does not resolve to a whitelisted address.");
            }
        }

        $blacklitedIPs = $this->blacklist->getIPs();
        if (!empty($blacklitedIPs)) {
            foreach ($blacklitedIPs as $blacklitedIP) {
                foreach ($ips as $ip) {
                    if ($this->cidrMatch($ip, $blacklitedIP)) {
                        throw new InvalidURLException("Host resolves to a blacklisted address.");
                    }
                }
            }
        }

        return ["host" => $host, "ips" => $ips];
    }

    /**
     * Given a host name, iterate through a list of host names and attempt a regex pattern match.
     *
     * @param string $host
     * @param array $hostList
     * @return boolean
     */
    private function validateHostPattern(string $host, array $hostList): bool {
        foreach ($hostList as $pattern) {
            if (preg_match("/^{$pattern}$/i", $host)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Validates a port.
     *
     * @param int $port
     * @return int
     */
    private function validatePort(int $port): int {
        $whitelisted = $this->whitelist->getPorts();
        if (!empty($whitelisted) && !in_array($port, $whitelisted)) {
            throw new InvalidURLException("Port is not whitelisted.");
        }

        $blacklisted = $this->blacklist->getPorts();
        if (!empty($blacklisted) && in_array($port, $blacklisted)) {
            throw new InvalidURLException("Port is blacklisted.");
        }

        return $port;
    }

    /**
     * Validates a URL scheme.
     *
     * @param string $scheme
     * @return string
     */
    private function validateScheme(string $scheme): string {
        $scheme = strtolower($scheme);

        $whitelisted = $this->whitelist->getSchemes();
        if (!empty($whitelisted) && !in_array($scheme, $whitelisted)) {
            throw new InvalidURLException("Scheme is not whitelisted.");
        }

        $blacklisted = $this->blacklist->getSchemes();
        if (!empty($blacklisted) && in_array($scheme, $blacklisted)) {
            throw new InvalidURLException("Scheme is blacklisted.");
        }

        return $scheme;
    }

    /**
     * Validates the whole URL.
     *
     * @param string $url
     * @return string
     */
    public function validateUrl(string $url): array {
        if ("" === trim($url)) {
            throw new InvalidURLException("URL cannot be empty.");
        }

        $parts = parse_url($url);
        if (empty($parts)) {
            throw new InvalidURLException("Unable to parse URL.");
        }

        if (!array_key_exists("host", $parts)) {
            throw new InvalidURLException("No host found in URL.");
        }

        //If credentials are passed in, but we don't want them, raise an exception
        if (!$this->areCredentialsAllowed() && (array_key_exists("user", $parts) || array_key_exists("pass", $parts))) {
            throw new InvalidURLException("Credentials not allowed as part of the URL.");
        }

        //First, validate the scheme
        if (array_key_exists("scheme", $parts)) {
            $parts["scheme"] = $this->validateScheme($parts["scheme"]);
        } else {
            //Default to http
            $parts["scheme"] = "http";
        }

        //Validate the port
        if (array_key_exists("port", $parts)) {
            $parts["port"] = $this->validatePort($parts["port"]);
        }

        //Validate the host
        $host = $this->validateHost($parts["host"]);
        $parts["host"] = $host["host"];

        //Rebuild the URL
        $url = $this->buildUrl($parts);

        return array(
            "url" => $url,
            "host" => $host["host"],
            "ips" => $host["ips"],
        );
    }
}
