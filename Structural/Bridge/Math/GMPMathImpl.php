<?php

namespace DesignPatterns\Structural\Bridge\Math;

/**
 * Class GMPMathImpl
 * @package DesignPatterns\Structural\Bridge\Math
 */
class GMPMathImpl implements MathImpl
{
    /**
     * @param $number
     * @return mixed
     */
    public function neg($number)
    {
        return gmp_strval(gmp_neg($number));
    }

    /**
     * @param $augend
     * @param $addend
     * @return mixed
     */
    public function add($augend, $addend)
    {
        return gmp_strval(gmp_add($augend, $addend));
    }

    /**
     * @param $minuend
     * @param $subtrahend
     * @return mixed
     */
    public function sub($minuend, $subtrahend)
    {
        return gmp_strval(gmp_sub($minuend, $subtrahend));
    }

    /**
     * @param $multiplicand
     * @param $multiplier
     * @return mixed
     */
    public function mul($multiplicand, $multiplier)
    {
        return gmp_strval(gmp_mul($multiplicand, $multiplier));
    }

    /**
     * @param $dividend
     * @param $divisor
     * @return mixed
     */
    public function div($dividend, $divisor)
    {
        return gmp_strval(gmp_div($dividend, $divisor));
    }

    /**
     * @param $first
     * @param $second
     * @return mixed
     */
    public function cmp($first, $second)
    {
        $result = gmp_cmp($first, $second);
        if ($result == 0) {
            return MathImpl::EQUALS;
        }
        if ($result > 0) {
            return MathImpl::GREATER;
        }
        return MathImpl::LOWER;
    }

    /**
     * @param $number
     * @return string
     */
    public function sqrt($number)
    {
        return gmp_strval(gmp_sqrt($number));
    }
}
