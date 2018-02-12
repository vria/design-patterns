<?php

namespace DesignPatterns\Structural\Bridge\Math;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class TrivialMathImpl implements MathImplInterface
{
    /**
     * @param mixed $number
     *
     * @return mixed
     */
    public function neg($number)
    {
        return -$number;
    }

    /**
     * @param mixed $augend
     * @param mixed $addend
     *
     * @return mixed
     */
    public function add($augend, $addend)
    {
        return $augend + $addend;
    }

    /**
     * @param mixed $minuend
     * @param mixed $subtrahend
     *
     * @return mixed
     */
    public function sub($minuend, $subtrahend)
    {
        return $minuend - $subtrahend;
    }

    /**
     * @param mixed $multiplicand
     * @param mixed $multiplier
     *
     * @return mixed
     */
    public function mul($multiplicand, $multiplier)
    {
        return $multiplicand * $multiplier;
    }

    /**
     * @param mixed $dividend
     * @param mixed $divisor
     *
     * @return mixed
     */
    public function div($dividend, $divisor)
    {
        return $dividend / $divisor;
    }

    /**
     * @param mixed $first
     * @param mixed $second
     *
     * @return mixed
     */
    public function cmp($first, $second)
    {
        if ($first == $second) {
            return MathImplInterface::EQUALS;
        }
        if ($first > $second) {
            return MathImplInterface::GREATER;
        }

        return MathImplInterface::LOWER;
    }

    /**
     * @param mixed $number
     *
     * @return float
     */
    public function sqrt($number)
    {
        return sqrt($number);
    }
}
