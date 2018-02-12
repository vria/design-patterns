<?php

namespace DesignPatterns\Structural\Bridge\Equation;

use DesignPatterns\Structural\Bridge\Math\MathImplInterface;

/**
 * Class LinearEquation
 *
 * ax + b = 0
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class LinearEquation extends Equation
{
    /**
     * @var mixed
     */
    private $a;

    /**
     * @var mixed
     */
    private $b;

    /**
     * @param mixed $a
     * @param mixed $b
     */
    public function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    /**
     * @throws \LogicException
     *
     * @return mixed
     */
    public function solve()
    {
        if (!$this->mathImpl instanceof MathImplInterface) {
            throw new \LogicException("Math engine should be set via setMathImpl method");
        }

        return $this->mathImpl->div($this->mathImpl->neg($this->b), $this->a);
    }
}
