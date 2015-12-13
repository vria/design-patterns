<?php

namespace DesignPatterns\Behavioral\Strategy;

/**
 * Class StrategyTest
 * @package DesignPatterns\Behavioral\Strategy
 */
class StrategyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ProductCollection
     */
    private $products;

    protected function setUp()
    {
        $this->products = new ProductCollection(array(
                array('name' => 'Grand Prime', 'price' => 184.90, 'in_stock' => true),
                array('name' => 'Core Prime',  'price' => 138.00, 'in_stock' => false),
                array('name' => 'Trend Lite',  'price' => 69.90,  'in_stock' => true),
                array('name' => 'Galaxy',      'price' => 99.99,  'in_stock' => false)
        ));
    }

    /**
     * @expectedException \LogicException
     */
    public function testFilterNotSetException()
    {
        $this->products->filterElements();
    }

    public function testInStockStrategy()
    {
        $expected = array(
            array('name' => 'Grand Prime', 'price' => 184.90, 'in_stock' => true),
            array('name' => 'Trend Lite',  'price' => 69.90,  'in_stock' => true)
        );

        $this->products->setFilter(new InStockFilter());
        $actual = $this->products->filterElements();

        $this->assertEquals(array_values($expected), array_values($actual));
    }

    public function testCheapProducts()
    {
        $expected = array(
            array('name' => 'Trend Lite',  'price' => 69.90,  'in_stock' => true)
        );

        $this->products->setFilter(new PriceFilter(70));
        $actual = $this->products->filterElements();

        $this->assertEquals(array_values($expected), array_values($actual));
    }

    public function testExpensive()
    {
        $expected = array(
            array('name' => 'Grand Prime', 'price' => 184.90, 'in_stock' => true),
            array('name' => 'Core Prime',  'price' => 138.00, 'in_stock' => false)
        );

        $this->products->setFilter(new PriceFilter(120, PriceFilter::SUPERIOR));
        $actual = $this->products->filterElements();

        $this->assertEquals(array_values($expected), array_values($actual));
    }
}
