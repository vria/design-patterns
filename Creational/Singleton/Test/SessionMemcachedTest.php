<?php

namespace DesignPatterns\Creational\Singleton\Test;

use DesignPatterns\Creational\Singleton\Session;
use DesignPatterns\Creational\Singleton\SessionFile;
use DesignPatterns\Creational\Singleton\SessionMemcached;

/**
 * @author Vlad Riabchenko <vriabchenko@webnet.fr>
 */
class SessionMemcachedTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @inheritdoc
     */
    public static function setUpBeforeClass()
    {
        putenv('singleton_session_class='.SessionMemcached::class);
    }

    /**
     * @runInSeparateProcess
     */
    public function testCreateWithSession()
    {
        $id = uniqid();

        // Create session with Session class
        $session = Session::getInstance($id);
        $sessionFile = SessionFile::getInstance($id);
        $sessionMemcached = SessionMemcached::getInstance($id);

        $this->assertInstanceOf(SessionMemcached::class, $session);
        $this->assertEquals(spl_object_hash($session), spl_object_hash($sessionFile));
        $this->assertEquals(spl_object_hash($session), spl_object_hash($sessionMemcached));
    }

    /**
     * @runInSeparateProcess
     */
    public function testCreateWithSessionFile()
    {
        $id = uniqid();

        // Create session with SessionFile class
        $sessionFile = SessionFile::getInstance($id);
        $session = Session::getInstance($id);
        $sessionMemcached = SessionMemcached::getInstance($id);

        $this->assertInstanceOf(SessionMemcached::class, $sessionFile);
        $this->assertEquals(spl_object_hash($sessionFile), spl_object_hash($session));
        $this->assertEquals(spl_object_hash($sessionFile), spl_object_hash($sessionMemcached));
    }

    /**
     * @runInSeparateProcess
     */
    public function testCreateWithSessionMemcached()
    {
        $id = uniqid();

        // Create session with SessionMemcached class
        $sessionMemcached = SessionMemcached::getInstance($id);
        $session = Session::getInstance($id);
        $sessionFile = SessionFile::getInstance($id);

        $this->assertInstanceOf(SessionMemcached::class, $sessionMemcached);
        $this->assertEquals(spl_object_hash($sessionMemcached), spl_object_hash($session));
        $this->assertEquals(spl_object_hash($sessionMemcached), spl_object_hash($sessionFile));
    }

    /**
     * @inheritdoc
     */
    public static function tearDownAfterClass()
    {
        putenv('singleton_session_class');
    }
}
