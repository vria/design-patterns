<?php

namespace DesignPatterns\Structural\Bridge\Equation;

use DesignPatterns\Structural\Bridge\Math\MathImplInterface;

/**
 * Abstract equation that corresponds to `Abstraction` in the Bridge pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
abstract class Equation
{
    /**
     * @var MathImplInterface
     */
    protected $mathImpl;

    /**
     * @param MathImplInterface $mathImpl
     */
    public function setMathImpl(MathImplInterface $mathImpl)
    {
        $this->mathImpl = $mathImpl;
    }

    /**
     * Get the roots/roots of this equation.
     * The result can be potentially everything: int, float, string, array.
     *
     * @return mixed
     */
    public abstract function solve();
}
