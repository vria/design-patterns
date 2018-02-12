<?php

namespace DesignPatterns\Structural\Bridge\Equation;

use DesignPatterns\Structural\Bridge\Math\MathImplInterface;

/**
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
     * Get roots
     *
     * @return mixed
     */
    public abstract function solve();
}
