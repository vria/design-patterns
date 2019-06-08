<?php

namespace DesignPatterns\Structural\Facade\Test;

use DesignPatterns\Structural\Facade\Authorization;
use PHPUnit\Framework\TestCase;

/**
 * @see Authorization
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class AuthorizationTest extends TestCase
{
    public function testCheck()
    {
        $authorization = new Authorization(['/^\/my_account/' => ['ROLE_USER']]);

        $this->assertTrue($authorization->check('ROLE_USER', '/my_account/preferences'));
    }

    public function testCheckAccessDenied()
    {

    }

    public function testCheckAccessDeniedNoPattern()
    {

    }
}
