<?php
/**
 * @author Alexandre (DaazKu) Chouinard <alexandre.c@vanillaforums.com>
 * @copyright 2009-2017 Vanilla Forums Inc.
 * @license http://www.opensource.org/licenses/gpl-2.0.php GNU GPL v2
 */

namespace Vanilla\VanillaConnect;

use Firebase\JWT\JWT;
use Exception;

/**
 * Class VanillaConnect
 */
class VanillaConnect {

    /**
     * Name of this library.
     */
    const NAME = 'VanillaConnect';

    /**
     * Version. Uses semantic versioning.
     * @link http://semver.org/
     */
    const VERSION = '1.0.0';

    /**
     * Time in seconds before a token is considered expired.
     */
    const TIMEOUT = 1200; // (20s * 60s = 1200s = 20 minutes)

    /**
     * The hashing algorithm used to sign the JSON Web Token (JWT).
     */
    const HASHING_ALGORITHM = 'HS256';

    /**
     * Template containing the JWT required claim's fields for an authentication request.
     */
    const JWT_REQUEST_CLAIM_TEMPLATE = [
        'iat' => null, // (Timestamp) Issued At => Time at witch the JWT was created.
        'exp' => null, // (Timestamp) Expires At => Time at witch the JWT will be expired. iat + self::TIMEOUT
        'jti' => null, // (string) JWT ID. Act as a jti.
        'state' => null, // (string) Contains extra information that must be passed back in the response.
        'version' => self::VERSION, // (string) VanillaConnect version.
    ];

    /**
     * Template containing the JWT required header's fields for an authentication request.
     */
    const JWT_REQUEST_HEADER_TEMPLATE = [
        'alg' => self::HASHING_ALGORITHM,
        'azp' => null, // Authorized party => $clientID
        'typ' => 'JWT', // Type of token.
    ];

    /**
     * Template containing the JWT required claim's fields for a response.
     */
    const JWT_RESPONSE_CLAIM_TEMPLATE = [
        'id' => null, // (string) Identifier of the resource (usually a user) we want to authenticate.
        'iat' => null, // (Timestamp) Issued At => Time at witch the JWT was created.
        'exp' => null, // (Timestamp) Expires At => Time at witch the JWT will be expired. iat + self::TIMEOUT
        'errors' => null, // (array) List or errors that happened during the request validation.
        'jti' => null, // (string) JWT ID. Act as a jti.
        'state' => null, // (array) Contains extra information that have been passed in the request.
        'version' => self::VERSION, // (string) VanillaConnect version.
    ];

    /**
     * Template containing the JWT required header's fields for a response.
     */
    const JWT_RESPONSE_HEADER_TEMPLATE = self::JWT_REQUEST_HEADER_TEMPLATE;

    /**
     * @var string Client identifier.
     */
    protected $clientID;

    /**
     * @var array List of errors that were encountered during the validation process.
     */
    private $errors = [];

    /**
     * @var string Secret used to hash the JWT.
     */
    protected $secret;

    /**
     * VanillaConnect constructor.
     *
     * @throws Exception
     *
     * @param string $clientID
     * @param string $secret
     */
    public function __construct($clientID, $secret) {
        if (empty($clientID)) {
            throw new Exception('ClientID cannot be empty.');
        }
        if (empty($secret)) {
            throw new Exception('Secret cannot be empty.');
        }
        $this->clientID = $clientID;
        $this->secret = $secret;
    }

    /**
     * Extract the client ID from a JWT.
     *
     * @throws Exception
     * @param string $jwt JSON Web Token
     *
     * @return string The client ID.
     */
    public static function extractClientID($jwt) {
        $parts = explode('.', $jwt);
        if (count($parts) !== 3) {
            throw new Exception('Wrong number of segments.');
        }
        if (($header = json_decode(JWT::urlsafeB64Decode($parts[0]), true)) === null) {
            throw new Exception('Invalid header encoding.');
        }
        if (!isset($header['azp']) || $header['azp'] === '') {
            throw new Exception('Client ID is missing from the JWT header.');
        }

        return $header['azp'];
    }

    /**
     * Extract an item from a JWT's claim.
     *
     * @throws Exception
     * @param string $jwt JSON Web Token
     * @param string $item The item to extract from the claim.
     *
     * @return mixed The value of the item or null.
     */
    public static function extractItemFromClaim($jwt, $item) {
        $parts = explode('.', $jwt);
        if (count($parts) !== 3) {
            throw new Exception('Wrong number of segments.');
        }
        if (($claim = json_decode(JWT::urlsafeB64Decode($parts[1]), true)) === null) {
            throw new Exception('Invalid claim encoding.');
        }

        return isset($claim[$item]) ? $claim[$item] : null;
    }

    /**
     * Get the clientID.
     *
     * @return string
     */
    public function getClientID() {
        return $this->clientID;
    }

    /**
     * Return any errors that occurred.
     *
     * @return array
     */
    public function getErrors() {
        return $this->errors;
    }

    /**
     * Get the secret.
     *
     * @return string
     */
    public function getSecret() {
        return $this->secret;
    }

    /**
     * Create a request authentication JWT.
     *
     * @param string $jti Nonce token to put in the claim.
     * @param array $state Any extra items to add to the claim.
     * @return string JWT or false on failure.
     */
    public function createRequestAuthJWT($jti, array $state = []) {
        $authHeader = array_merge(
            self::JWT_REQUEST_HEADER_TEMPLATE,
            ['azp' => $this->clientID]
        );
        $payload = self::JWT_REQUEST_CLAIM_TEMPLATE;
        $payload['iat'] = time();
        $payload['exp'] = $payload['iat'] + self::TIMEOUT;
        $payload['jti'] = $jti;
        $payload['state'] = $state;

        return JWT::encode($payload, $this->secret, self::HASHING_ALGORITHM, null, $authHeader);
    }

    /**
     * Create a response authentication JWT.
     *
     * @param string $jti Nonce token to put in the claim.
     * @param array $claim
     *
     * @return string JWT or false on failure.
     * @throws \Exception
     */
    public function createResponseAuthJWT($jti, array $claim) {
        $responseHeader = array_merge(
            self::JWT_RESPONSE_HEADER_TEMPLATE,
            ['azp' => $this->clientID]
        );

        $payload = array_merge(self::JWT_RESPONSE_CLAIM_TEMPLATE, $claim);
        $payload['iat'] = time();
        $payload['exp'] = $payload['iat'] + self::TIMEOUT;
        $payload['jti'] = $jti;
        $payload['version'] = self::VERSION;

        if (!isset($payload['errors'])) {
            $this->validateResponseClaim($payload);

            if ($this->errors) {
                throw new \Exception('Error while building response: '.print_r($this->errors, true));
            }
        }

        return JWT::encode($payload, $this->secret, self::HASHING_ALGORITHM, null, $responseHeader);
    }

    /**
     * Validate the request JWT and fill $this->errors if there is any error.
     *
     * @param string $jwt JSON Web Token (JWT)
     * @param array $jwtClaim Array that will receive the JWT claim's content on success.
     * @param array $jwtHeader Array that will receive the JWT header's content on success.
     * @return array|bool The decoded payload or false otherwise.
     */
    public function validateRequest($jwt, &$jwtClaim = [], &$jwtHeader = []) {
        $valid = false;
        $this->errors = [];

        try {
            $parts = explode('.', $jwt);
            $header = json_decode(JWT::urlsafeB64Decode($parts[0]), true);
            if ($header) {
                $this->validateRequestHeader($header);
            }

            JWT::decode($jwt, $this->secret, [self::HASHING_ALGORITHM]);
            // We want arrays not objects so let's decode the claim ourselves.
            $claim = json_decode(JWT::urlsafeB64Decode($parts[1]), true);
            $this->validateRequestClaim($claim);

            if (empty($this->errors)) {
                $valid = true;
                $jwtClaim = $claim;
                $jwtHeader = $header;
            } else {
                $jwtClaim = [];
                $jwtHeader = [];
            }
        } catch(\Exception $e) {
            $this->errors['request_jtw_decode_exception'] = $e->getMessage();
        }

        return $valid;
    }

    /**
     * Validate the response JWT and fill $this->errors if there is any error.
     *
     * @param string $jwt JSON Web Token (JWT)
     * @param array $jwtClaim Array that will receive the JWT claim's content on success.
     * @param array $jwtHeader Array that will receive the JWT header's content on success.
     * @return bool True if the validation was a success, false otherwise.
     */
    public function validateResponse($jwt, &$jwtClaim = [], &$jwtHeader = []) {
        $valid = false;
        $this->errors = [];

        try {
            $parts = explode('.', $jwt);
            $header = json_decode(JWT::urlsafeB64Decode($parts[0]), true);
            if ($header) {
                $this->validateResponseHeader($header);
            }

            JWT::decode($jwt, $this->secret, [self::HASHING_ALGORITHM]);
            // We want arrays not objects so let's decode the claim ourselves.
            $claim = json_decode(JWT::urlsafeB64Decode($parts[1]), true);
            $this->validateResponseClaim($claim);

            if (empty($this->errors)) {
                $valid = true;
                $jwtClaim = $claim;
                $jwtHeader = $header;
            } else {
                $jwtClaim = [];
                $jwtHeader = [];
            }
        } catch(\Exception $e) {
            $this->errors['response_jwt_decode_exception'] = $e->getMessage();
        }


        return $valid;
    }

    /**
     * Validate the authentication header and fill $this->errors if there is any error.
     *
     * @param array $claim JWT header.
     */
    private function validateRequestHeader(array $claim) {
        $this->validateHeaderFields($claim, 'request');
    }

    /**
     * Validate the authentication claim and fill $this->errors if there is any error.
     *
     * @param array $claim JWT claim.
     */
    private function validateRequestClaim(array $claim) {
        $missingKeys = array_keys(array_diff_key(self::JWT_REQUEST_CLAIM_TEMPLATE, $claim));
        if (count($missingKeys)) {
            $this->errors['request_missing_claim_item'] = 'The authentication JWT claim is missing the following item(s): '.implode(', ', $missingKeys);
            return;
        }

        if (preg_match('/^\d+\.\d+\.\d+$/', $claim['version']) !== 1) {
            $this->errors['request_invalid_version'] = 'Invalid version.';
            return;
        }

        if (version_compare(explode('.', self::VERSION)[0], explode('.', $claim['version'])[0]) === 1) {
            $this->errors['request_incompatible_version'] = 'The request was issued with version '.$claim['version'].
                ' but this library needs a client of at least version '.self::VERSION;
        }
    }

    /**
     * Validate header's field.
     *
     * @param array $claim
     * @param string $type
     * @return bool
     */
    private function validateHeaderFields(array $claim, $type) {
        $missingKeys = array_keys(array_diff_key(constant(VanillaConnect::class.'::JWT_'.strtoupper($type).'_HEADER_TEMPLATE'), $claim));
        if (count($missingKeys)) {
            $this->errors[$type.'_missing_header_item'] = 'The '.$type.' JWT header is missing the following item(s): '.implode(', ', $missingKeys);
            return false;
        }

        if ($claim['azp'] !== $this->clientID) {
            $this->errors[$type.'_client_id_mismatch'] = 'The JWT was issued using a different ClientID(azp) than what was expected.';
            return false;
        }

        return true;
    }

    /**
     * Validate the response claim and fill $this->errors if there is any error.
     *
     * @param array $claim JWT claim.
     */
    private function validateResponseClaim(array $claim) {
        if (isset($claim['errors'])) {
            $this->errors = $claim['errors'];
        } else {
            $missingKeys = array_keys(array_diff_key(self::JWT_RESPONSE_CLAIM_TEMPLATE, $claim));
            if (count($missingKeys)) {
                $this->errors['response_missing_claim_item'] = 'The JWT claim is missing the following item(s): '.implode(', ', $missingKeys);
                return;
            }

            if (!isset($claim['id']) || $claim['id'] === '') {
                $this->errors['response_empty_claim_id'] = 'The JWT claim\'s field "id" is empty.';
            }
        }
    }

    /**
     * Validate the response header and fill $this->errors if there is any error.
     *
     * @param array $claim JWT claim.
     */
    private function validateResponseHeader(array $claim) {
        $this->validateHeaderFields($claim, 'response');
    }
}
