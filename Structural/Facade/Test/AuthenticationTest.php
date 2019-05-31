<?php

namespace DesignPatterns\Structural\Facade\Test;

use DesignPatterns\Structural\Facade\Authentication;
use PHPUnit\Framework\TestCase;

/**
 * @see Authentication
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class AuthenticationTest extends TestCase
{
    public function testAuthenticate()
    {
        $encodedPassword = password_hash('pa$$', PASSWORD_BCRYPT);
        $authentication = new Authentication(['rick' => $encodedPassword]);

        $this->assertTrue($authentication->authenticate('rick', 'pa$$'));
    }

    public function testAuthenticateUserNotFound()
    {
        $authentication = new Authentication(['rick' => 'encodedPa$$']);
        $encodedPassword = password_hash('encodedPa$$', PASSWORD_BCRYPT);

        try {
            $this->assertTrue($authentication->authenticate('morthy', $encodedPassword));
        } catch (\Exception $e) {
        }

        $this->assertInstanceOf(\RuntimeException::class, $e);
        $this->assertEquals('User not found', $e->getMessage());
    }

    public function testAuthenticateIncorrectPassword()
    {
        $authentication = new Authentication(['rick' => 'encodedPa$$']);
        $encodedPassword = password_hash('pa$$', PASSWORD_BCRYPT);

        try {
            $this->assertTrue($authentication->authenticate('rick', $encodedPassword));
        } catch (\Exception $e) {
        }

        $this->assertInstanceOf(\RuntimeException::class, $e);
        $this->assertEquals('Incorrect password', $e->getMessage());
    }
}
