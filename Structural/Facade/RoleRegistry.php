<?php

namespace DesignPatterns\Structural\Facade;

/**
 * Stores user roles.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class RoleRegistry
{
    /**
     * ['user' => 'role']
     *
     * @var array
     */
    private $roles;

    /**
     * @param array $roles
     */
    public function __construct($roles)
    {
        $this->roles = $roles;
    }

    /**
     * Retrieve the role of a given user.
     *
     * @param $user
     *
     * @return string
     *
     * @throws \LogicException User has no role
     */
    public function getRole($user)
    {
        if (!array_key_exists($user, $this->roles)) {
            throw new \LogicException('User has no role');
        }

        return $this->roles[$user];
    }
}
