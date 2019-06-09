<?php

namespace DesignPatterns\Structural\Flyweight\Test;

use DesignPatterns\Structural\Flyweight\BigPackage;
use DesignPatterns\Structural\Flyweight\CustomPackage;
use DesignPatterns\Structural\Flyweight\PackageFactory;
use DesignPatterns\Structural\Flyweight\SmallPackage;
use PHPUnit\Framework\TestCase;

/**
 * @see PackageFactory
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class PackageFactoryTest extends TestCase
{
    public function testBigPackage()
    {
        $factory = new PackageFactory();
        $package1 = $factory->get(PackageFactory::BIG);
        $package2 = $factory->get(PackageFactory::BIG);

        $this->assertInstanceOf(BigPackage::class, $package1);
        $this->assertInstanceOf(BigPackage::class, $package2);
        $this->assertEquals(spl_object_hash($package1), spl_object_hash($package2));
    }

    public function testSmallPackage()
    {
        $factory = new PackageFactory();
        $package1 = $factory->get(PackageFactory::SMALL);
        $package2 = $factory->get(PackageFactory::SMALL);

        $this->assertInstanceOf(SmallPackage::class, $package1);
        $this->assertInstanceOf(SmallPackage::class, $package2);
        $this->assertEquals(spl_object_hash($package1), spl_object_hash($package2));
    }

    public function testCustomPackage()
    {
        $factory = new PackageFactory();
        $package1 = $factory->get(PackageFactory::CUSTOM, 'First', 10);
        $package2 = $factory->get(PackageFactory::CUSTOM, 'Second', 20);

        $this->assertInstanceOf(CustomPackage::class, $package1);
        $this->assertInstanceOf(CustomPackage::class, $package2);
        $this->assertNotEquals(spl_object_hash($package1), spl_object_hash($package2));
    }

    public function testUnknownPackage()
    {
        $factory = new PackageFactory();
        try {
            $factory->get('unknown');
        } catch (\InvalidArgumentException $e) {
            $this->assertEquals('Unknown package type', $e->getMessage());

            return;
        }

        $this->fail('No exception is thrown');
    }
}
