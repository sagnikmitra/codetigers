<?php
/**
 * @author Alexandre (DaazKu) Chouinard <alexandre.c@vanillaforums.com>
 * @copyright 2009-2017 Vanilla Forums Inc.
 * @license MIT
 */

namespace Garden\Password;

require(__DIR__.'/../legacy/webwiz/functions.webwizhash.php');

/**
 * Implements tha password hashing algorithm from the Web Wiz framework.
 */
class WebWizPassword implements PasswordInterface {

    /** @var int */
    private $saltLength;

    public function __construct($saltLength = 10) {
        $this->saltLength = $saltLength;
    }

    /**
     * Hashes a plaintext password.
     *
     * @param string $password The password to hash.
     * @return string Returns the hashed password.
     * @throws \Exception Throws an exception when the hash method is invalid.
     */
    public function hash($password) {
        $salt = \ww_getSalt($this->saltLength);
        $hash = \ww_HashEncode($password.$salt);

        return $salt.'$'.$hash;
    }

    /**
     * {@inheritdoc}
     */
    public function needsRehash($hash) {
        if (strpos($hash, '$') === false) {
            return true;
        } else {
            list($salt, $password) = explode('$', $hash, 2);
            if (strlen($salt) != $this->saltLength) {
                return true;
            }
        }

        return false;
    }

    /**
     * Check to make sure a password matches its stored hash.
     *
     * @param string $password The password to verify.
     * @param string $hash The stored password hash.
     * @return bool Returns `true` if the password matches the stored hash.
     */
    public function verify($password, $hash) {
        return \ww_CheckPassword($password, $hash);
    }
}
