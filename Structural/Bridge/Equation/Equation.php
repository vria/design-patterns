<?php

namespace DesignPatterns\Structural\Bridge\Equation;

use DesignPatterns\Structural\Bridge\Math\MathImpl;

/**
 * Class Equation
 * @package DesignPatterns\Structural\Bridge\Equation
 */
abstract class Equation
{
    /**
     * @var MathImpl
     */
    protected $mathImpl;

    /**
     * @param MathImpl $mathImpl
     */
    public function setMathImpl(MathImpl $mathImpl)
    {
        $this->mathImpl = $mathImpl;
    }

    /**
     * Get roots
     *
     * @return mixed
     */
    public abstract function solve();
}
