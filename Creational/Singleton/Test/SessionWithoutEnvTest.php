<?php

namespace DesignPatterns\Creational\Singleton\Test;

use DesignPatterns\Creational\Singleton\Session;
use DesignPatterns\Creational\Singleton\SessionFile;
use DesignPatterns\Creational\Singleton\SessionMemcached;

/**
 * Tests creating sessions without environment variable set.
 * All tests must throw exceptions.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class SessionWithoutEnvTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Create session with abstract @see Session class.
     *
     * @runInSeparateProcess
     * @expectedException \LogicException
     * @expectedExceptionMessage singleton_session_class environment variable must be set to the subclass of DesignPatterns\Creational\Singleton\Session
     */
    public function testCreateWithSession()
    {
        Session::getInstance();
    }

    /**
     * Create session with @see SessionFile class.
     *
     * @runInSeparateProcess
     * @expectedException \LogicException
     * @expectedExceptionMessage singleton_session_class environment variable must be set to the subclass of DesignPatterns\Creational\Singleton\Session
     */
    public function testCreateWithSessionFile()
    {
        SessionFile::getInstance();
    }

    /**
     * Create session with @see SessionMemcached class.
     *
     * @runInSeparateProcess
     * @expectedException \LogicException
     * @expectedExceptionMessage singleton_session_class environment variable must be set to the subclass of DesignPatterns\Creational\Singleton\Session
     */
    public function testCreateWithSessionMemcached()
    {
        SessionMemcached::getInstance();
    }
}
