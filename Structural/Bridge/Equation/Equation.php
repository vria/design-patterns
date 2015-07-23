<?php

namespace DesignPatterns\Structural\Bridge\Equation;

use DesignPatterns\Structural\Bridge\Math\MathImpl;

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

    public abstract function solve();
}