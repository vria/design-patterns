<?php

namespace DesignPatterns\Structural\Flyweight;

/**
 * The factory instantiates flyweights and ensures that flyweights are shared
 * properly.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class PackageFactory
{
    const BIG = 'big';
    const SMALL = 'small';
    const CUSTOM = 'custom';

    private $packages = [];

    /**
     * When client requests a package this method returns either a shared
     * flyweight package or an unshared custom package.
     *
     * @param $type
     * @param null $name
     * @param null $volume
     *
     * @return PackageInterface
     */
    public function get($type, $name = null, $volume = null)
    {
        switch ($type) {
            // Returns a single existing big package.
            case self::BIG:
                // Instantiate a new big package flyweight if does not exist.
                if (!array_key_exists(self::BIG, $this->packages)) {
                    $this->packages[self::BIG] = new BigPackage();
                }

                return $this->packages[self::BIG];

            // Returns a single existing small package.
            case self::SMALL:
                // Instantiate a new small package flyweight if does not exist.
                if (!array_key_exists(self::SMALL, $this->packages)) {
                    $this->packages[self::SMALL] = new SmallPackage();
                }

                return $this->packages[self::SMALL];

            // Returns a custom package.
            case self::CUSTOM:
                // It is always a new instance that cannot represent different
                // packages.
                return new CustomPackage($name, $volume);
        }

        // Unknown type.
        throw new \InvalidArgumentException('Unknown package type');
    }
}
