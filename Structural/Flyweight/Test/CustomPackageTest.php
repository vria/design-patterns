<?php

namespace DesignPatterns\Structural\Flyweight\Test;

use DesignPatterns\Structural\Flyweight\CustomPackage;
use PHPUnit\Framework\TestCase;

/**
 * @see CustomPackage
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class CustomPackageTest extends TestCase
{
    public function testName()
    {
        $package = new CustomPackage('Custom', 6);
        $this->assertEquals('Custom', $package->getName());
    }

    public function testVolume1()
    {
        $package = new CustomPackage('Custom', 6);
        $this->assertEquals(6, $package->getTotalWeight(1));
    }

    public function testVolume3()
    {
        $package = new CustomPackage('Custom', 6);
        $this->assertEquals(18, $package->getTotalWeight(3));
    }
}
