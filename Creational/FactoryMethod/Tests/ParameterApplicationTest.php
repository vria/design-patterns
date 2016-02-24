<?php

namespace DesignPatterns\Creational\FactoryMethod\Tests;


use DesignPatterns\Creational\FactoryMethod\ApplicationFramework;
use DesignPatterns\Creational\FactoryMethod\ParameterApplication\Application as ParameterApplication;

class ParameterApplicationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ApplicationFramework
     */
    private $application;

    protected function setUp()
    {
        $this->application = new ParameterApplication();
    }

    public function testSearchAction()
    {
        $this->assertEquals('Search page. Parameters: {"brand":"Mercedes","type":"coupe"}',
            $this->application->handle('/search?brand=Mercedes&type=coupe'));
    }

    public function testViewAction()
    {
        $this->assertEquals('View Product object of id 12',
            $this->application->handle('/view/Product/12'));
    }

    /**
     * @expectedException \Exception
     */
    public function testException()
    {
        $this->application->handle('/view/-----');
    }
}
