<?php

namespace DesignPatterns\Structural\Bridge\Math;

/**
 * The native implementation of arithmetic operations: +, -, *, etc.
 *
 * Corresponds to `ConcreteImplementor` in the Bridge pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class TrivialMathImpl implements MathImplInterface
{
    /**
     * @inheritdoc
     */
    public function neg($number)
    {
        return -$number;
    }

    /**
     * @inheritdoc
     */
    public function add($augend, $addend)
    {
        return $augend + $addend;
    }

    /**
     * @inheritdoc
     */
    public function sub($minuend, $subtrahend)
    {
        return $minuend - $subtrahend;
    }

    /**
     * @inheritdoc
     */
    public function mul($multiplicand, $multiplier)
    {
        return $multiplicand * $multiplier;
    }

    /**
     * @inheritdoc
     */
    public function div($dividend, $divisor)
    {
        return $dividend / $divisor;
    }

    /**
     * @inheritdoc
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
     * @inheritdoc
     */
    public function sqrt($number)
    {
        return sqrt($number);
    }
}
