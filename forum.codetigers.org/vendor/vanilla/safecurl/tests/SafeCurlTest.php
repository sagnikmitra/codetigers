<?php
/**
 * @copyright 2009-2019 Vanilla Forums Inc.
 * @license MIT
 */

namespace Garden\SafeCurl\Tests;

use Garden\SafeCurl\SafeCurl;
use Garden\SafeCurl\Exception\InvalidURLException;
use Garden\SafeCurl\UrlPartsList;
use Garden\SafeCurl\UrlValidator;

/**
 * Verify functionality of the SafeCurl class.
 */
class SafeCurlTest extends \PHPUnit\Framework\TestCase {

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
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid cURL handle provided.
     */
    public function testBadCurlHandler() {
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
        $this->expectException($exception, $message);
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
     *
     * @expectedException \Garden\SafeCurl\Exception
     * @expectedExceptionMessage Redirect limit exceeded.
     */
    public function testWithFollowLocationLimit() {
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

    /**
     * Verify blocking a URL that redirects to a blacklisted IP address.
     *
     * @expectedException \Garden\SafeCurl\Exception\InvalidURLException
     * @expectedExceptionMessage Port is not whitelisted.
     */
    public function testWithFollowLocationLeadingToABlockedUrl() {
        $safeCurl = new SafeCurl(curl_init());
        $safeCurl->setFollowLocation(true);
        $safeCurl->execute("http://httpbin.org/redirect-to?url=http://0.0.0.0:123");
    }

    /**
     * Verify cURL timeouts are appropriately reported.
     *
     * @expectedException \Garden\SafeCurl\Exception\CurlException
     * @expectedExceptionMessage Resolving timed out after 1 milliseconds
     */
    public function testWithCurlTimeout() {
        $handle = curl_init();
        curl_setopt($handle, CURLOPT_TIMEOUT_MS, 1);

        $safeCurl = new SafeCurl($handle);
        $safeCurl->execute("https://httpstat.us/200?sleep=100");
    }
}
