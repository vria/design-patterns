<?php

namespace DesignPatterns\Structural\Facade\Test;

use DesignPatterns\Structural\Facade\RoleRegistry;
use PHPUnit\Framework\TestCase;

/**
 * @see RoleRegistry
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class RoleRegistryTest extends TestCase
{
    public function testGetRoles()
    {
        $roleRegistry = new RoleRegistry(['morthy' => 'ROLE_USER']);
        $roles = $roleRegistry->getRole('morthy');

        $this->assertEquals('ROLE_USER', $roles);
    }

    public function testGetRolesUserHasNoRole()
    {
        $roleRegistry = new RoleRegistry(['morthy' => 'ROLE_USER']);

        try {
            $roleRegistry->getRole('rick');
        } catch (\Exception $e) {
        }

        $this->assertInstanceOf(\LogicException::class, $e);
        $this->assertEquals('User has no role', $e->getMessage());
    }
}
