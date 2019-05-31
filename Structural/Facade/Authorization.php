<?php

namespace DesignPatterns\Structural\Facade;

/**
 * Authorization checker.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class Authorization
{
    /**
     * Each rule defines required roles for URL path pattern:
     * [
     *     // Customers can access any URL path starting with '/shop'
     *     '/^\/shop/' => ['ROLE_CUSTOMER'],
     *
     *     // Admins and managers can access any URL path starting with '/back_office'
     *     '/^\/back_office/' => ['ROLE_ADMIN', 'ROLE_MANAGER'],
     * ]
     *
     * @var array
     */
    private $rules;

    /**
     * @param array $rules
     */
    public function __construct(array $rules)
    {
        $this->rules = $rules;
    }

    /**
     * Check if a given role has access to a given URL.
     *
     * @param string $role
     * @param string $urlPath
     *
     * @return bool
     *
     * @throws \RuntimeException
     */
    public function check($role, $urlPath)
    {
        foreach ($this->rules as $pattern => $roles) {
            if (preg_match($pattern, $urlPath)) {
                if (in_array($role, $roles)) {
                    return true;
                }

                throw new \RuntimeException('Access denied');
            }
        }

        throw new \RuntimeException('Access denied');
    }
}
