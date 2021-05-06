<?php
/**
 * @author Alexandre (DaazKu) Chouinard <alexandre.c@vanillaforums.com>
 * @copyright 2009-2017 Vanilla Forums Inc.
 * @license http://www.opensource.org/licenses/gpl-2.0.php GNU GPL v2
 */

namespace VanillaTests\VanillaConnect;

use PHPUnit\Framework\TestCase;
use Vanilla\VanillaConnect\VanillaConnect;

class VanillaConnectResponseTest extends TestCase {

    /**
     * @var VanillaConnect
     */
    private $vanillaConnect;

    /**
     * {@inheritdoc}
     */
    public function setUp() {
        $this->vanillaConnect = new VanillaConnect('TestClientID', 'TestSecret');
    }

    /**
     * Test a response.
     */
    public function testResponse() {
        $jti = uniqid();
        $id = uniqid();
        $jwt = $this->vanillaConnect->createResponseAuthJWT($jti, ['id' => $id]);

        $this->assertTrue($this->vanillaConnect->validateResponse($jwt, $claim));

        $this->assertTrue(is_array($claim));
        $this->assertArrayHasKey('jti', $claim);
        $this->assertEquals($jti, $claim['jti']);
    }

    /**
     * Test that it is possible to add extra data in the response claim.
     *
     * @throws \Exception
     */
    public function testExtraInfo() {
        $jti = uniqid();
        $id = uniqid();
        $userData = ['email' => 'test@example.com', 'name' => 'test'];
        $jwt = $this->vanillaConnect->createResponseAuthJWT($jti, ['id' => $id, 'user' => $userData]);

        $this->assertTrue($this->vanillaConnect->validateResponse($jwt, $claim));

        $extractedUserData = VanillaConnect::extractItemFromClaim($jwt, 'user');

        $this->assertEquals($userData, $extractedUserData);
    }
}
