<?php
/**
 * @author Todd Burry <todd@vanillaforums.com>
 * @copyright 2009-2017 Vanilla Forums Inc.
 * @license MIT
 */

namespace Garden\Container\Tests;


use PHPUnit\Framework\TestCase;

abstract class AbstractContainerTest extends TestCase {
    const DB = 'Garden\Container\Tests\Fixtures\Db';
    const DB_INTERFACE = 'Garden\Container\Tests\Fixtures\DbInterface';
    const DB_DECORATOR = 'Garden\Container\Tests\Fixtures\DbDecorator';
    const FOO = 'Garden\Container\Tests\Fixtures\Foo';
    const FOO_AWARE = 'Garden\Container\Tests\Fixtures\FooAwareInterface';
    const PDODB = 'Garden\Container\Tests\Fixtures\PdoDb';
    const SQL = 'Garden\Container\Tests\Fixtures\Sql';
    const TUPLE = 'Garden\Container\Tests\Fixtures\Tuple';

    private $expectedErrors;

    /**
     * Clear out the errors array.
     */
    protected function setUp() {
        $this->expectedErrors = [];
        set_error_handler([$this, "errorHandler"]);
    }

    /**
     * Track errors that occur during testing.
     *
     * @param int $errno
     * @param string $errstr
     * @param string $errfile
     * @param int $errline
     * @param mixed $errcontext
     */
    public function errorHandler($errno, $errstr, $errfile, $errline, $errcontext) {
        // Look for an expected error.
        foreach ($this->expectedErrors as $i => $row) {
            list($no, $str) = $row;

            if (($errno === $no || $no === null) && ($errstr === $str || $str === null)) {
                unset($this->expectedErrors[$i]);
                return;
            }
        }

        // No error was found so throw an exception.
        throw new \ErrorException($errstr, $errno, $errno, $errfile, $errline);
    }

    /**
     * Assert than an error has occurred.
     *
     * @param string $errstr The desired error string.
     * @param int $errno The desired error number.
     */
    public function expectError($errstr, $errno) {
        $this->expectedErrors[] = [$errno, $errstr];
    }

    /**
     * Assert than an error has occurred.
     *
     * @param int $errno The desired error number.
     */
    public function expectErrorNumber($errno) {
        $this->expectError(null, $errno);
    }

    /**
     * Provide values for tests that are configured for shared and non shared.
     *
     * @return array Returns a data provider array.
     */
    public function provideShared() {
        return [
            'notShared' => [false],
            'shared' => [true]
        ];
    }
}
