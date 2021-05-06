<?php
/**
 * @author Alexandre (DaazKu) Chouinard <alexandre.c@vanillaforums.com>
 * @copyright 2009-2017 Vanilla Forums Inc.
 * @license http://www.opensource.org/licenses/gpl-2.0.php GNU GPL v2
 */

namespace VanillaTests\VanillaConnect;

use Firebase\JWT\JWT;
use PHPUnit\Framework\TestCase;
use Vanilla\VanillaConnect\VanillaConnect;

class VanillaConnectResponseFailureTest extends TestCase {

    /**
     * @var VanillaConnect
     */
    private $vanillaConnect;

    /**
     * {@inheritdoc}
     */
    public function setUp() {
        parent::setUp();

        $this->vanillaConnect = new VanillaConnect('TestClientID', 'TestSecret');

        JWT::$timestamp = null;
    }

    /**
     * Test for an expired token.
     */
    public function testExpiredJWT() {
        $jwt = $this->vanillaConnect->createRequestAuthJWT(uniqid());

        // Do the validation as if we were in the future.
        JWT::$timestamp = time() + VanillaConnect::TIMEOUT;

        $this->assertFalse($this->vanillaConnect->validateRequest($jwt));

        $this->assertArrayHasKey('request_jtw_decode_exception', $this->vanillaConnect->getErrors());

        $this->assertContains('Expired token', $this->vanillaConnect->getErrors());
    }

    /**
     * The for a non supported hash method.
     */
    public function testInvalidHashMethod() {
        $jwt = JWT::encode(['jti' => uniqid()], 'TestSecret', 'HS512', null, ['azp' => 'TestClientID']);

        $this->assertFalse($this->vanillaConnect->validateResponse($jwt));

        $this->assertArrayHasKey('response_jwt_decode_exception', $this->vanillaConnect->getErrors());

        $this->assertContains('Algorithm not allowed', $this->vanillaConnect->getErrors());
    }

    /**
     *  Test for an invalid signature.
     *
     * @expectedException \Exception
     * @expectedExceptionMessageRegExp /^Error while building response:/
     */
    public function testInvalidSignature() {
        $wrongSecret = new VanillaConnect($this->vanillaConnect->getClientID(), $this->vanillaConnect->getSecret().'1');

        $wrongSecret->createResponseAuthJWT(uniqid(), []);
    }

    /**
     * Test for a jwt response with a missing 'id' from its claim.
     *
     * @expectedException \Exception
     * @expectedExceptionMessageRegExp /^Error while building response:/
     */
    public function testMissingClaimID() {
        $this->vanillaConnect->createResponseAuthJWT(uniqid(), ['name' => 'joe']);
    }

    /**
     * Test for a jwt response issued with the wrong client id.
     *
     * @expectedException \Exception
     * @expectedExceptionMessageRegExp /^Error while building response:/
     */
    public function testWrongClientID() {
        $wrongClient = new VanillaConnect($this->vanillaConnect->getClientID().'1', $this->vanillaConnect->getSecret());
        $wrongClient->createResponseAuthJWT(uniqid(), []);
    }

    /**
     * Test for a missing client id (azp) from the header.
     */
    public function testMissingClientID() {
        $jwt = JWT::encode([], 'TestSecret', VanillaConnect::HASHING_ALGORITHM);

        $this->assertFalse($this->vanillaConnect->validateResponse($jwt));

        $this->assertArrayHasKey('response_missing_header_item', $this->vanillaConnect->getErrors());
    }
}
