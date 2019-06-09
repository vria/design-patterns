<?php

namespace DesignPatterns\Structural\Flyweight\Test;

use DesignPatterns\Structural\Flyweight\BigPackage;
use PHPUnit\Framework\TestCase;

/**
 * @see BigPackage
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class BigPackageTest extends TestCase
{
    public function testName()
    {
        $package = new BigPackage();
        $this->assertEquals('Big', $package->getName());
    }

    public function testVolume1()
    {
        $package = new BigPackage();
        $this->assertEquals(20, $package->getTotalWeight(1));
    }

    public function testVolume3()
    {
        $package = new BigPackage();
        $this->assertEquals(89, $package->getTotalWeight(3));
    }
}
