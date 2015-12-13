<?php

namespace DesignPatterns\Structural\Bridge\Equation;

use DesignPatterns\Structural\Bridge\Math\MathImpl;

/**
 * Class QuadraticEquation
 *
 * ax^2 + bx + c = 0
 *
 * @package DesignPatterns\Structural\Bridge\Equation
 */
class QuadraticEquation extends Equation
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
     * @var mixed
     */
    private $c;

    /**
     * @param mixed $a
     * @param mixed $b
     * @param mixed $c
     */
    public function __construct($a, $b, $c)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }

    /**
     * @throws \LogicException
     *
     * @return mixed
     */
    public function solve()
    {
        if (!$this->mathImpl instanceof MathImpl) {
            throw new \LogicException("Math engine should be set via setMathImpl method");
        }
        $D = $this->mathImpl->sub(
            $this->mathImpl->mul($this->b, $this->b),
            $this->mathImpl->mul(4, $this->mathImpl->mul($this->a, $this->c))
        );

        $twoTimesA = $this->mathImpl->mul(2, $this->a);
        $minusB = $this->mathImpl->neg($this->b);

        // Two solutions
        if ($this->mathImpl->cmp($D, 0) == MathImpl::GREATER) {
            $sqrtD = $this->mathImpl->sqrt($D);

            return array(
                $this->mathImpl->div($this->mathImpl->add($minusB, $sqrtD), $twoTimesA),
                $this->mathImpl->div($this->mathImpl->sub($minusB, $sqrtD), $twoTimesA)
            );
        }

        // Single solution
        if ($this->mathImpl->cmp($D, 0) == MathImpl::EQUALS) {

            return array($this->mathImpl->div($minusB, $twoTimesA));
        }

        // No real solution
        return array();
    }
}
