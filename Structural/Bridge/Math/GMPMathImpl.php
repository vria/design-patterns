<?php

namespace DesignPatterns\Structural\Bridge\Math;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class GMPMathImpl implements MathImplInterface
{
    /**
     * @param mixed $number
     *
     * @return string
     */
    public function neg($number)
    {
        return gmp_strval(gmp_neg($number));
    }

    /**
     * @param mixed $augend
     * @param mixed $addend
     *
     * @return string
     */
    public function add($augend, $addend)
    {
        return gmp_strval(gmp_add($augend, $addend));
    }

    /**
     * @param mixed $minuend
     * @param mixed $subtrahend
     *
     * @return string
     */
    public function sub($minuend, $subtrahend)
    {
        return gmp_strval(gmp_sub($minuend, $subtrahend));
    }

    /**
     * @param mixed $multiplicand
     * @param mixed $multiplier
     *
     * @return string
     */
    public function mul($multiplicand, $multiplier)
    {
        return gmp_strval(gmp_mul($multiplicand, $multiplier));
    }

    /**
     * @param mixed $dividend
     * @param mixed $divisor
     *
     * @return string
     */
    public function div($dividend, $divisor)
    {
        return gmp_strval(gmp_div($dividend, $divisor));
    }

    /**
     * @param mixed $first
     * @param mixed $second
     *
     * @return int
     */
    public function cmp($first, $second)
    {
        $result = gmp_cmp($first, $second);
        if ($result == 0) {
            return MathImplInterface::EQUALS;
        }
        if ($result > 0) {
            return MathImplInterface::GREATER;
        }

        return MathImplInterface::LOWER;
    }

    /**
     * @param mixed $number
     *
     * @return string
     */
    public function sqrt($number)
    {
        return gmp_strval(gmp_sqrt($number));
    }
}
