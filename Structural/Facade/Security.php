<?php

namespace DesignPatterns\Structural\Facade;

/**
 * Security Facade that provides clients with a simple and concise interface.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class Security
{
    /**
     * @var Authentication
     */
    private $authentication;

    /**
     * @var RoleRegistry
     */
    private $roleRegistry;

    /**
     * @var Authorization
     */
    private $authorization;

    /**
     * The constructor of the Security Facade uses dependency injection.
     * But other solutions may be suitable:
     * - it can crate its dependencies directly,
     * - it can ask an abstract factory to create dependencies,
     * - it can use a service locator to retrieve dependencies.
     *
     * @param Authentication $authentication
     * @param RoleRegistry $roleRegistry
     * @param Authorization $authorization
     */
    public function __construct(Authentication $authentication, RoleRegistry $roleRegistry, Authorization $authorization)
    {
        $this->authentication = $authentication;
        $this->roleRegistry = $roleRegistry;
        $this->authorization = $authorization;
    }

    /**
     * Check if given user with given password cas access requested url path.
     * This method hides specialized security classes from clients. Thus shields
     * them from depending on them and from knowing the details of security package.
     *
     * @param string $user
     * @param string $password
     * @param string $urlPath
     *
     * @return bool
     *
     * @throws \RuntimeException User not found
     * @throws \RuntimeException Incorrect password
     * @throws \LogicException   User has no role
     * @throws \RuntimeException Access denied
     */
    public function check($user, $password, $urlPath)
    {
        // Authenticate user by checking its password.
        $this->authentication->authenticate($user, $password);

        // Retrieve user roles.
        $roles = $this->roleRegistry->getRole($user);

        // Check if user
        $this->authorization->check($roles, $urlPath);

        return true;
    }
}
