<?php

namespace DesignPatterns\Creational\Singleton\Test;

use DesignPatterns\Creational\Singleton\Session;
use DesignPatterns\Creational\Singleton\SessionFile;

/**
 * The example of test double of the Session singleton.
 * Note that @see Session::getInstance() is still used and tests still depend on it.
 * Nevertheless any non-private method of singleton could be stubbed.
 *
 * @see SessionFileStub
 *
 * @author Vlad Riabchenko <vriabchenko@webnet.fr>
 */
class StubExampleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @inheritdoc
     */
    public static function setUpBeforeClass()
    {
        putenv('singleton_session_class='.SessionFileStub::class);
    }

    /**
     * Create session with @see SessionFile class.
     */
    public function testStubbedId()
    {
        $session = Session::getInstance();

        $this->assertEquals('stubbed_id', $session->getId());
        $this->assertEquals('SessionFile reads from file "stubbed_id"', $session->read());
        $this->assertEquals('SessionFile writes to file "stubbed_id"', $session->write());
    }

    /**
     * @inheritdoc
     */
    public static function tearDownAfterClass()
    {
        putenv('singleton_session_class');
    }
}

/**
 * Stubbed session - this is test double that permits to test `read` and `write`
 * methods of @see SessionFile without depending on the implementation of `getId` method.
 *
 * @author Vlad Riabchenko <vriabchenko@webnet.fr>
 */
class SessionFileStub extends SessionFile
{
    /**
     * @inheritdoc
     */
    public function getId()
    {
        return 'stubbed_id';
    }
}
