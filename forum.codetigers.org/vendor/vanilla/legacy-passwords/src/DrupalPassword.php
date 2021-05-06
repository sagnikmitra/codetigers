<?php
/**
 * @author Alexandre (DaazKu) Chouinard <alexandre.c@vanillaforums.com>
 * @copyright 2009-2017 Vanilla Forums Inc.
 * @license MIT
 */

namespace Garden\Password;

require(__DIR__.'/../legacy/drupal/password.inc.php');

/**
 * Implements tha password hashing algorithm from the Drupal framework.
 */
class DrupalPassword implements PasswordInterface {
    /**
     * Hashes a plaintext password.
     *
     * @param string $password The password to hash.
     * @return string Returns the hashed password.
     * @throws \Exception Throws an exception when the hash method is invalid.
     */
    public function hash($password) {
        return \Drupal\user_hash_password($password);
    }

    /**
     * {@inheritdoc}
     */
    public function needsRehash($hash) {
        if (strpos($hash, '$') === false) {
            return true;
        } else {
            if (strpos($hash, '$S$') !== 0) {
                return true;
            }
        }

        return true;
    }

    /**
     * Check to make sure a password matches its stored hash.
     *
     * @param string $password The password to verify.
     * @param string $hash The stored password hash.
     * @return bool Returns `true` if the password matches the stored hash.
     */
    public function verify($password, $hash) {
        return \Drupal\user_check_password($password, $hash);
    }
}
