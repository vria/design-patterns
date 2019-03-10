<?php

namespace DesignPatterns\Creational\Singleton\Test;

use DesignPatterns\Creational\Singleton\Session;
use DesignPatterns\Creational\Singleton\SessionFile;
use DesignPatterns\Creational\Singleton\SessionMemcached;

/**
 * Tests creating @see SessionFile session object.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class SessionFileTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @inheritdoc
     */
    public static function setUpBeforeClass()
    {
        putenv('singleton_session_class='.SessionFile::class);
    }

    /**
     * Create session with abstract @see Session class.
     *
     * @runInSeparateProcess
     */
    public function testCreateWithSession()
    {
        $session = Session::getInstance();
        $sessionFile = SessionFile::getInstance();
        $sessionMemcached = SessionMemcached::getInstance();

        $this->assertInstanceOf(SessionFile::class, $session);
        $this->assertEquals(spl_object_hash($session), spl_object_hash($sessionFile));
        $this->assertEquals(spl_object_hash($session), spl_object_hash($sessionMemcached));
    }

    /**
     * Create session with @see SessionFile class.
     *
     * @runInSeparateProcess
     */
    public function testCreateWithSessionFile()
    {
        $sessionFile = SessionFile::getInstance();
        $session = Session::getInstance();
        $sessionMemcached = SessionMemcached::getInstance();

        $this->assertInstanceOf(SessionFile::class, $sessionFile);
        $this->assertEquals(spl_object_hash($sessionFile), spl_object_hash($session));
        $this->assertEquals(spl_object_hash($sessionFile), spl_object_hash($sessionMemcached));
    }

    /**
     * Create session with @see SessionMemcached class.
     *
     * @runInSeparateProcess
     */
    public function testCreateWithSessionMemcached()
    {
        $sessionMemcached = SessionMemcached::getInstance();
        $session = Session::getInstance();
        $sessionFile = SessionFile::getInstance();

        $this->assertInstanceOf(SessionFile::class, $sessionMemcached);
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
