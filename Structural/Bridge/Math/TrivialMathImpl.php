<?php

namespace DesignPatterns\Structural\Bridge\Math;

/**
 * Class TrivialMathImpl
 * @package DesignPatterns\Structural\Bridge\Math
 */
class TrivialMathImpl implements MathImpl
{
    /**
     * @param $number
     * @return mixed
     */
    public function neg($number)
    {
        return -$number;
    }

    /**
     * @param $augend
     * @param $addend
     * @return mixed
     */
    public function add($augend, $addend)
    {
        return $augend + $addend;
    }

    /**
     * @param $minuend
     * @param $subtrahend
     * @return mixed
     */
    public function sub($minuend, $subtrahend)
    {
        return $minuend - $subtrahend;
    }

    /**
     * @param $multiplicand
     * @param $multiplier
     * @return mixed
     */
    public function mul($multiplicand, $multiplier)
    {
        return $multiplicand * $multiplier;
    }

    /**
     * @param $dividend
     * @param $divisor
     * @return mixed
     */
    public function div($dividend, $divisor)
    {
        return $dividend / $divisor;
    }

    /**
     * @param $first
     * @param $second
     * @return mixed
     */
    public function cmp($first, $second)
    {
        if ($first == $second) {
            return MathImpl::EQUALS;
        }
        if ($first > $second) {
            return MathImpl::GREATER;
        }
        return MathImpl::LOWER;
    }

    /**
     * @param $number
     * @return float
     */
    public function sqrt($number)
    {
        return sqrt($number);
    }
}
