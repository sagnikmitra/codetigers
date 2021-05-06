<?php
/**
 * @author Alexandre (DaazKu) Chouinard <alexandre.c@vanillaforums.com>
 * @copyright 2009-2017 Vanilla Forums Inc.
 * @license http://www.opensource.org/licenses/gpl-2.0.php GNU GPL v2
 */

namespace Vanilla\VanillaConnect;

use Exception;

/**
 * Class VanillaConnectProvider
 *
 * Provider friendly class that works with the VanillaConnect plugin.
 */
class VanillaConnectProvider {

    /**
     * Regex used to validate the whitelist URLs which can contain wildcards.
     * It is a pretty loose regex that should enforce what is needed without blocked weird cases.
     *
     * One line regex:
     * /^(?<scheme>(?:https?:)?\/\/)(?<userpwd>[^\s]+?@)?(?<host>[^@\/\s]+)(?<path>\/[^?#\s]*)$/
     *
     * @var string
     */
    protected static $schemeHostPathRegex =
        '^' // Start of the line
        .'(?<scheme>(?:https?:)?\/\/)' // Must start with http://, https:// or //
        .'(?<userpwd>[^\s]+?@)?' // user:password@
        .'(?<host>[^@\/\s]+)' // We allow pretty much everything until we encounter the path
        .'(?<path>\/[^?#\s]*)' // The path. / is mandatory but the rest is optional.
        .'$'
    ;

    /**
     * @var array
     */
    private $allowedWhitelist;

    /**
     * @var VanillaConnect
     */
    private $vanillaConnect;

    /**
     * VanillaConnectProvider constructor.
     *
     * @param string $clientID
     * @param string $secret
     * @param array $redirectURLsWhitelist
     *
     * @throws \Exception
     */
    public function __construct($clientID, $secret, array $redirectURLsWhitelist) {
        $this->vanillaConnect = new VanillaConnect($clientID, $secret);
        $this->allowedWhitelist = $this->parseWhitelistURLs($redirectURLsWhitelist);
    }

    /**
     * Create a response URL, from an authentication JWT and a claim.
     *
     * @param string $requestJWT JWT sent during the authentication request.
     * @param array $claim The data to put as the claim in the the response JWT. Needs to contain id.
     * @return string The URL to redirect to so that the response can be processed.
     * @throws Exception
     */
    public function createResponseURL($requestJWT, array $claim) {
        $errors = [];

        $state = VanillaConnect::extractItemFromClaim($requestJWT, 'state');
        $redirect = isset($state['redirect']) ? $state['redirect'] : null;
        if (empty($redirect)) {
            throw new Exception('The authentication JWT claim is missing the "redirect" field.');
        } else {
            if (!$this->validateRedirectURL($redirect)) {
                $errors['request_invalid_redirect'] = "The redirect URL '$redirect' is not whitelisted.";

                $urlEncodingError = false;

                // Common URL encoding error
                if (strpos($redirect, ' ') !== false) {
                    $urlEncodingError = true;
                }

                if ($urlEncodingError) {
                    $errors['request_invalid_redirect_tip'] =
                        'Seems like the redirect URL was not properly encoded. Invalid character detected.';
                }
            }
        }

        if ($this->vanillaConnect->validateRequest($requestJWT, $authClaim)) {
            $nonce = $authClaim['jti'];
        } else {
            $errors += $this->vanillaConnect->getErrors();
        }

        if ($errors) {
            $nonce = null;
            $claim = ['errors' => $errors];
        }

        $responseJWT = $this->vanillaConnect->createResponseAuthJWT($nonce, $claim);
        return $redirect.(strpos($redirect, '?') === false ? '?' : '&').'jwt='.$responseJWT;
    }

    /**
     * Create a JWT that can be used to push the authentication of a resource.
     *
     * @param array $resourcePayload The data to put in the response JWT's claim.
     * @return string JWT
     */
    public function createPushSSOJWT(array $resourcePayload) {
        // Set the audience to pushsso.
        $resourcePayload['aud'] = 'pushsso';
        return $this->vanillaConnect->createResponseAuthJWT(uniqid(VanillaConnect::NAME.'_rn_'), $resourcePayload);
    }

    /**
     * Validate a redirect URL against the whitelist.
     *
     * @param $url
     * @return bool
     */
    protected function validateRedirectURL($url) {
        $allowed = false;

        foreach ($this->allowedWhitelist as $regex) {
            if (preg_match($regex, $url) === 1) {
                $allowed = true;
                break;
            }
        }

        return $allowed;
    }

    /**
     * Validate and transform whitelist URLs to regexes.
     *
     * @param array $urls
     * @return array regexes
     * @throws Exception
     */
    protected function parseWhitelistURLs(array $urls) {
        $regexes = [];

        foreach ($urls as $url) {
            if (preg_match('/'.self::$schemeHostPathRegex.'/', $url, $matches) !== 1) {
                throw new Exception('Supplied whitelist URL "'.$url.'" does not match "'.self::$schemeHostPathRegex.'"');
            }

            foreach ($matches as $name => &$match) {
                if (is_int($name)) {
                    unset($matches[$name]);
                    continue;
                }

                /*
                 * Disallow wildcards on the domain and TLD.
                 * This helps preventing something like www.example.* which would allow www.example.com and www.example.net
                 * but would also allow www.example.domain.evil
                 * This is not perfect because some TLD have multiple segments (.qc.ca, .me.uk) but, again, this will help.
                 */
                if ($name === 'host' && preg_match('#^(?:.*?)([^.@:\s]+\.[^.@:\s]+)(?::\d+)?$#', $match, $hostMatches) === 1) {
                    if (strpos($hostMatches[1], '*') !== false) {
                        throw new Exception('Wildcards are disallowed in domain and TLD.');
                    }
                }

                // Escape regex characters / . \ + * ? [ ^ ] $ ( ) { } = ! < > | : -
                $match = preg_quote($match, '/');

                if ($name === 'scheme' && $match === '\/\/') {
                    $match = '(?:https?:)?\/\/';
                    continue;
                }

                // Account for user:password@ that might not be provided.
                if ($name === 'userpwd' && $match === '') {
                    $match = '([^\s]+?@)?';
                    continue;
                }

                // Replace escaped wildcards
                if (strpos($match, '*') !== false) {
                    $match = str_replace('\\*', '[^?#\s]*?', $match);
                }
            }

            $regexes[] = '/^'.implode('', $matches).'(?:[?#].*)?$/i';
        }

        return $regexes;
    }
}
