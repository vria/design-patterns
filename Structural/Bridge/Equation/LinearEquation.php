<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 24.07.2015
 * Time: 0:11
 */

namespace DesignPatterns\Structural\Bridge\Equation;


use DesignPatterns\Structural\Bridge\Math\MathImpl;

/**
 * Class LinearEquation
 *
 * ax + b = 0
 *
 * @package DesignPatterns\Structural\Bridge\Equation
 */
class LinearEquation extends Equation
{
    private $a;
    private $b;

    /**
     * @param $a
     * @param $b
     */
    public function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    /**
     * @throws \LogicException
     */
    public function solve()
    {
        if ($this->mathImpl instanceof MathImpl) {
            return $this->mathImpl->div($this->mathImpl->neg($this->b), $this->a);
        } else {
            throw new \LogicException("Math engine should be set via setMathImpl method");
        }
    }
}
