<?php

namespace DesignPatterns\Structural\Bridge\Test;

use DesignPatterns\Structural\Bridge\Math\GMPMathImpl;
use DesignPatterns\Structural\Bridge\Math\MathImplInterface;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class GMPMathImplTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GMPMathImpl
     */
    private $GMPMathImpl;

    protected function setUp()
    {
        $this->GMPMathImpl = new GMPMathImpl();
    }

    public function testNeg()
    {
        $this->assertEquals("-518516815168165168166816568", $this->GMPMathImpl->neg("518516815168165168166816568"));
        $this->assertEquals("168000055168131801120589900", $this->GMPMathImpl->neg("-168000055168131801120589900"));
    }

    public function testSub()
    {
        $this->assertEquals("-8985277132326", $this->GMPMathImpl->sub("-333595516161", "8651681616165"));
    }

    public function testMul()
    {
        $this->assertEquals("-840088593309", $this->GMPMathImpl->mul("151122251", "-5559"));
    }

    public function testDiv()
    {
        $this->assertEquals("5559474", $this->GMPMathImpl->div("5489493392733906", "987412369"));
    }

    public function testCmp()
    {
        $this->assertEquals(MathImplInterface::EQUALS, $this->GMPMathImpl->cmp("11485526", "11485526"));
        $this->assertEquals(MathImplInterface::GREATER, $this->GMPMathImpl->cmp("514783", "-22114"));
        $this->assertEquals(MathImplInterface::LOWER, $this->GMPMathImpl->cmp("55596", "55597"));
    }

    public function testSqrt()
    {
        $this->assertEquals("11154", $this->GMPMathImpl->sqrt("124411716"));
    }
}
