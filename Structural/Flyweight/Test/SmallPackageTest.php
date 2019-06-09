<?php

namespace DesignPatterns\Structural\Flyweight\Test;

use DesignPatterns\Structural\Flyweight\SmallPackage;
use PHPUnit\Framework\TestCase;

/**
 * @see SmallPackage
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class SmallPackageTest extends TestCase
{
    public function testName()
    {
        $package = new SmallPackage();
        $this->assertEquals('Small', $package->getName());
    }

    public function testVolume1()
    {
        $package = new SmallPackage();
        $this->assertEquals(5, $package->getTotalWeight(1));
    }

    public function testVolume3()
    {
        $package = new SmallPackage();
        $this->assertEquals(10, $package->getTotalWeight(3));
    }
}
