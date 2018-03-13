<?php

namespace DesignPatterns\Creational\FactoryMethod\Test;

use DesignPatterns\Creational\FactoryMethod\ParameterApplication\ParameterApplication;
use DesignPatterns\Creational\FactoryMethod\ParameterApplication\ParameterRequest;
use DesignPatterns\Creational\FactoryMethod\ParameterApplication\ParameterRouter;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class ParameterApplicationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ParameterApplication
     */
    private $application;

    protected function setUp()
    {
        $this->application = new ParameterApplication();
    }

    public function testRouterClass()
    {
        $this->assertInstanceOf(ParameterRouter::class, $this->application->createRouter());
    }

    public function testRequestClass()
    {
        $this->assertInstanceOf(ParameterRequest::class, $this->application->createRequest('/url'));
    }

    public function testUserAction()
    {
        $this->assertEquals('<h1>Showing user #123</h1>', $this->application->handle('/user?id=123'));
    }

    public function testArticlesAction()
    {
        $this->assertEquals(
            '<h1>Showing articles of home category with filter table</h1>',
            $this->application->handle('/articles?category=home&filter=table')
        );
    }

    /**
     * @expectedException \Exception
     */
    public function testException()
    {
        $this->application->handle('/404');
    }
}
