<?php
/**
 * @author Todd Burry <todd@vanillaforums.com>
 * @copyright 2009-2014 Vanilla Forums Inc.
 * @license MIT
 */

namespace Garden\Password;

/**
 * Implements the password hashing algorithm of Xenforo.
 */
class XenforoPassword implements PasswordInterface {

    /**
     * @var string The name of the hashing function to use.
     */
    private $hashFunction;

    /**
     * Initialize an instance of this class.
     *
     * @param string $hashFunction The name of the hash function to use.
     * This is an function name that can be passed to {@link hash()}.
     * @see hash()
     */
    public function __construct($hashFunction = '') {
        if (!$hashFunction) {
            $hashFunction = 'sha256';
        }
        $this->hashFunction = $hashFunction;
    }

    /**
     * {@inheritdoc}
     */
    public function hash($password) {
        $salt = base64_encode(openssl_random_pseudo_bytes(12));
        $result = [
            'hashFunc' => $this->hashFunction,
            'hash' => $this->hashRaw($password, $salt, $this->hashFunction),
            'salt' => $salt
        ];

        return serialize($result);
    }

    /**
     * Hashes a password with a given salt.
     *
     * @param string $password The password to hash.
     * @param string $salt The password salt.
     * @param string $function The hashing function to use.
     * @param string $storedHash password hash stored in the db.
     * @return string Returns the password hash.
     */
    private function hashRaw($password, $salt, $function = '', $storedHash = null) {
        if ($function == '') {
            $function = $this->hashFunction;
        }

        if($function !== 'crypt') {
            $calcHash = hash($function, hash($function, $password).$salt);
        } else if(!is_null($storedHash)){
            $calcHash = crypt($password, $storedHash);
        } else {
            throw new Gdn_UserException(t('Unknown hashing/crypting method.'));
        }


        return $calcHash;
    }

    /**
     * {@inheritdoc}
     */
    public function needsRehash($hash) {
        list($storedHash, $storedSalt) = $this->splitHash($hash);

        // Unsalted hashes should be rehashed.
        return $storedHash === false || $storedSalt === false;
    }

    /**
     * {@inheritdoc}
     */
    public function verify($password, $hash) {
        list($storedHash, $function, $storedSalt) = $this->splitHash($hash);

        $calcHash = $this->hashRaw($password, $storedSalt, $function, $storedHash);
        $result = $calcHash === $storedHash;

        return $result;
    }

    /**
     * Split the hash into its calculated hash and salt.
     *
     * @param string $hash The hash to split.
     * @return string[] An array in the form [$hash, $hashFunc, $salt].
     */
    private function splitHash($hash) {
        $parts = @unserialize($hash, ['allowed_classes' => false]);

        if (!is_array($parts)) {
            $result = ['', '', ''];
        } else {
            $parts += ['hash' => '', 'hashFunc' => '', 'salt' => ''];

            if (!$parts['hashFunc']) {
                switch (strlen($parts['hash'])) {
                    //xf11, XenForo_Authentication_Core11
                    case 32:
                        $parts['hashFunc'] = 'md5';
                        break;
                    case 40:
                        $parts['hashFunc'] = 'sha1';
                        break;
                    //xf12, XenForo_Authentication_Core12
                    default:
                        $parts['hashFunc'] = 'crypt';
                        break;
                }
            }

            $result = [$parts['hash'], $parts['hashFunc'], $parts['salt']];
        }
        return $result;
    }

    /**
     * Get the hash function.
     *
     * @return string Returns the name of hash function.
     */
    public function getHashFunction() {
        return $this->hashFunction;
    }

    /**
     * Set the hash function.
     *
     * @param string $hashFunction The name of the new hash function. Some examples would be: crypt, sha256, sha1.
     * @return XenforoPassword Returns `$this` for fluent calls.
     */
    public function setHashFunction($hashFunction) {
        $this->hashFunction = $hashFunction;
        return $this;
    }
}
