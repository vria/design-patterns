<?php

namespace DesignPatterns\Behavioral\Strategy\Test;

use DesignPatterns\Behavioral\Strategy\InStockFilter;
use DesignPatterns\Behavioral\Strategy\PriceFilter;
use DesignPatterns\Behavioral\Strategy\ProductCollection;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class StrategyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ProductCollection
     */
    private $products;

    protected function setUp()
    {
        $this->products = new ProductCollection([
            ['name' => 'Grand Prime', 'price' => 184.90, 'in_stock' => true],
            ['name' => 'Core Prime',  'price' => 138.00, 'in_stock' => false],
            ['name' => 'Trend Lite',  'price' => 69.90,  'in_stock' => true]
        ]);
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
        $expected = [
            ['name' => 'Grand Prime', 'price' => 184.90, 'in_stock' => true],
            ['name' => 'Trend Lite',  'price' => 69.90,  'in_stock' => true]
        ];

        $this->products->setFilter(new InStockFilter());
        $actual = $this->products->filterElements();

        $this->assertEquals(array_values($expected), array_values($actual));
    }

    public function testCheapProducts()
    {
        $expected = [
            ['name' => 'Trend Lite',  'price' => 69.90,  'in_stock' => true]
        ];

        $this->products->setFilter(new PriceFilter(70));
        $actual = $this->products->filterElements();

        $this->assertEquals(array_values($expected), array_values($actual));
    }

    public function testExpensive()
    {
        $expected = [
            ['name' => 'Grand Prime', 'price' => 184.90, 'in_stock' => true],
            ['name' => 'Core Prime',  'price' => 138.00, 'in_stock' => false]
        ];

        $this->products->setFilter(new PriceFilter(120, PriceFilter::SUPERIOR));
        $actual = $this->products->filterElements();

        $this->assertEquals(array_values($expected), array_values($actual));
    }
}
