<?php

namespace DesignPatterns\Structural\Flyweight;

/**
 * Unshared concrete flyweight.
 * This is a custom package thus cannot be shared multiple times.
 * @see PackageFactory is in charge of instantiating the instances of custom
 * package.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class CustomPackage implements PackageInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $weight;

    /**
     * @param string $name
     * @param int $weight
     */
    public function __construct($name, $weight)
    {
        $this->name = $name;
        $this->weight = $weight;
    }

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @inheritdoc
     */
    public function getTotalWeight($density)
    {
        return $this->weight * $density;
    }
}
