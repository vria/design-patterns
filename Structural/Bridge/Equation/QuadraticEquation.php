<?php

namespace DesignPatterns\Structural\Bridge\Equation;

use DesignPatterns\Structural\Bridge\Math\MathImplInterface;

/**
 * Quadratic equation `ax^2 + bx + c = 0` that corresponds to `RefinedAbstraction` in the Bridge pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
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
        if (!$this->mathImpl instanceof MathImplInterface) {
            throw new \LogicException("Math engine should be set via setMathImpl method");
        }

        $d = $this->mathImpl->sub(
            $this->mathImpl->mul($this->b, $this->b),
            $this->mathImpl->mul(4, $this->mathImpl->mul($this->a, $this->c))
        );

        $twoTimesA = $this->mathImpl->mul(2, $this->a);
        $minusB = $this->mathImpl->neg($this->b);

        // Two real solutions
        if ($this->mathImpl->cmp($d, 0) == MathImplInterface::GREATER) {
            $sqrtD = $this->mathImpl->sqrt($d);

            return [
                $this->mathImpl->div($this->mathImpl->add($minusB, $sqrtD), $twoTimesA),
                $this->mathImpl->div($this->mathImpl->sub($minusB, $sqrtD), $twoTimesA)
            ];
        }

        // Single real solution
        if ($this->mathImpl->cmp($d, 0) == MathImplInterface::EQUALS) {
            return [$this->mathImpl->div($minusB, $twoTimesA)];
        }

        // No real solution
        return [];
    }
}
