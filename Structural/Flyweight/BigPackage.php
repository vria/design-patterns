<?php

namespace DesignPatterns\Structural\Flyweight;

/**
 * Concrete flyweight.
 * This is a shared object that allows a certain economy of memory.
 * @see PackageFactory ensures that only one instance of big package is
 * instantiated.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class BigPackage implements PackageInterface
{
    /**
     * Intrinistic state that can be shared.
     * @var string
     */
    private $name = 'Big';

    /**
     * Intrinistic state that can be shared.
     * @var int
     */
    private $volume = 20;

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * The total mass grows as fast as a (linear + logarithmic) function.
     *
     * @inheritdoc
     */
    public function getTotalWeight($density)
    {
        return ceil($this->volume * $density * (1 + log($density, 10)));
    }
}
