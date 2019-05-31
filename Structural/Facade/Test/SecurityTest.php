<?php

namespace DesignPatterns\Structural\Facade\Test;

use DesignPatterns\Structural\Facade\Authentication;
use DesignPatterns\Structural\Facade\Authorization;
use DesignPatterns\Structural\Facade\RoleRegistry;
use DesignPatterns\Structural\Facade\Security;
use PHPUnit\Framework\TestCase;

/**
 * @see Security
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class SecurityTest extends TestCase
{
    public function testCheckTrueRealClasses()
    {
        $encodedPass = password_hash('pass', PASSWORD_BCRYPT);

        $authentication = new Authentication(['rick' => $encodedPass]);
        $roleRegistry = new RoleRegistry(['rick' => 'ROLE_SCIENTIST']);
        $authorization = new Authorization(['/^\/lab/' => ['ROLE_SCIENTIST']]);

        $security = new Security($authentication, $roleRegistry, $authorization);

        $this->assertTrue($security->check('rick', 'pass', '/lab/concentrated_black_matter'));
    }

    public function testCheckTrue()
    {
        $authentication = $this->createMock(Authentication::class);
        $authentication->method('authenticate')->willReturn(true);

        $roleRegistry = $this->createMock(RoleRegistry::class);
        $roleRegistry->method('getRole')->willReturn([]);

        $authorization = $this->createMock(Authorization::class);
        $authorization->method('check')->willReturn(true);

        $security = new Security($authentication, $roleRegistry, $authorization);

        $this->assertTrue($security->check('user', 'pass', '/'));
    }
}
