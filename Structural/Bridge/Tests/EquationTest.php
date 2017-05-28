<?php

namespace DesignPatterns\Structural\Bridge\Tests;

use DesignPatterns\Structural\Bridge\Equation\LinearEquation;
use DesignPatterns\Structural\Bridge\Equation\QuadraticEquation;
use DesignPatterns\Structural\Bridge\Math\GMPMathImpl;
use DesignPatterns\Structural\Bridge\Math\TrivialMathImpl;


class EquationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GMPMathImpl
     */
    private $GMPMathImpl;

    /**
     * @var TrivialMathImpl
     */
    private $trivialImpl;

    protected function setUp()
    {
        $this->GMPMathImpl = new GMPMathImpl();
        $this->trivialImpl = new TrivialMathImpl();
    }

    /**
     * @expectedException \LogicException
     */
    public function testLinearException()
    {
        $eq = new LinearEquation(5, 20);
        $eq->solve();
    }

    public function testLinear()
    {
        $eq = new LinearEquation(5, -205);
        $eq->setMathImpl($this->trivialImpl);
        $this->assertEquals(41, $eq->solve());
    }

    public function testLinearGMP()
    {
        $eq = new LinearEquation(5, 205);
        $eq->setMathImpl($this->GMPMathImpl);
        $this->assertEquals(-41, $eq->solve());
    }

    public function testQuadratic()
    {
        $eq = new QuadraticEquation(1, -7, 12);
        $eq->setMathImpl($this->trivialImpl);
        $this->assertEquals(array(4, 3), $eq->solve());
    }

    public function testQuadraticGMP()
    {
        $eq = new QuadraticEquation(1, -2, -15);
        $eq->setMathImpl($this->GMPMathImpl);
        $this->assertEquals(array(5, -3), $eq->solve());
    }
}
