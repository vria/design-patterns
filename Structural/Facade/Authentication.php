<?php

namespace DesignPatterns\Structural\Facade;

/**
 * Authentication checker.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class Authentication
{
    /**
     * Array of users and user passwords.
     * ['user' => 'password', ...]
     *
     * @var array
     */
    private $userPasswords;

    /**
     * @param array $userPasswords
     */
    public function __construct($userPasswords)
    {
        $this->userPasswords = $userPasswords;
    }

    /**
     * Verify if the provided password is correct.
     *
     * @param $user
     * @param $password
     *
     * @return bool
     *
     * @throws \RuntimeException
     */
    public function authenticate($user, $password)
    {
        if (!array_key_exists($user, $this->userPasswords)) {
            throw new \RuntimeException('User not found');
        }

        if (!password_verify($password, $this->userPasswords[$user])) {
            throw new \RuntimeException('Incorrect password');
        }

        return true;
    }
}
