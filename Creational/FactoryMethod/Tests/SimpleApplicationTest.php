<?php

namespace DesignPatterns\Creational\FactoryMethod\Tests;

use DesignPatterns\Creational\FactoryMethod\ApplicationFramework;
use DesignPatterns\Creational\FactoryMethod\SimpleApplication\Application as SimpleApplication;

class SimpleApplicationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ApplicationFramework
     */
    private $application;

    protected function setUp()
    {
        $this->application = new SimpleApplication();
    }

    public function testRouterClass()
    {
        $this->assertInstanceOf('DesignPatterns\Creational\FactoryMethod\SimpleApplication\Router', $this->application->getRouter());
    }

    public function testIndexAction()
    {
        $this->assertEquals('<h1>Simple App greats you!</h1>', $this->application->handle('/'));
    }

    public function testContactAction()
    {
        $this->assertEquals('<h1>We will be pleased to hear from you!</h1>', $this->application->handle('/contact.html'));
    }

    /**
     * @expectedException \Exception
     */
    public function testException()
    {
        $this->application->handle('/not-exist');
    }
}
