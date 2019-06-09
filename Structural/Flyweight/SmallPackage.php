<?php

namespace DesignPatterns\Structural\Flyweight;

/**
 * Concrete flyweight.
 * This is a shared object that allows a certain economy of memory.
 * @see PackageFactory ensures that only one instance of small package is
 * instantiated.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class SmallPackage implements PackageInterface
{
    /**
     * Intrinistic state that can be shared.
     * @var string
     */
    private $name = 'Small';

    /**
     * Intrinistic state that can be shared.
     * @var int
     */
    private $volume = 2;

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * The total weight is always a multiple of 5: 8 -> 10, 41 -> 45.
     *
     * @inheritdoc
     */
    public function getTotalWeight($density)
    {
        $nominalWeight = $this->volume * $density;

        return $nominalWeight + (5 - $nominalWeight % 5);
    }
}
