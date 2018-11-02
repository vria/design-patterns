<?php

namespace DesignPatterns\Creational\Singleton\Test;

use DesignPatterns\Creational\Singleton\Session;
use DesignPatterns\Creational\Singleton\SessionFile;
use DesignPatterns\Creational\Singleton\SessionMemcached;

/**
 * @author Vlad Riabchenko <vriabchenko@webnet.fr>
 */
class SessionWithoutEnvTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Create session with Session class.
     *
     * @runInSeparateProcess
     * @expectedException \LogicException
     * @expectedExceptionMessage singleton_session_class environment variable must be set to the subclass of DesignPatterns\Creational\Singleton\Session
     */
    public function testCreateWithSession()
    {
        Session::getInstance(uniqid());
    }

    /**
     * Create session with SessionFile class.
     *
     * @runInSeparateProcess
     * @expectedException \LogicException
     * @expectedExceptionMessage singleton_session_class environment variable must be set to the subclass of DesignPatterns\Creational\Singleton\Session
     */
    public function testCreateWithSessionFile()
    {
        SessionFile::getInstance(uniqid());
    }

    /**
     * Create session with SessionMemcached class.
     *
     * @runInSeparateProcess
     * @expectedException \LogicException
     * @expectedExceptionMessage singleton_session_class environment variable must be set to the subclass of DesignPatterns\Creational\Singleton\Session
     */
    public function testCreateWithSessionMemcached()
    {
        SessionMemcached::getInstance(uniqid());
    }
}
