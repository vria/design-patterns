<?php

namespace DesignPatterns\Structural\Bridge\Math;

/**
 * The gmp implementation of arithmetic operations that allows calculations with large numbers represented as strings:
 * http://php.net/manual/en/book.gmp.php
 * Corresponds to `ConcreteImplementor` in the Bridge pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class GMPMathImpl implements MathImplInterface
{
    /**
     * @inheritdoc
     */
    public function neg($number)
    {
        return gmp_strval(gmp_neg($number));
    }

    /**
     * @inheritdoc
     */
    public function add($augend, $addend)
    {
        return gmp_strval(gmp_add($augend, $addend));
    }

    /**
     * @inheritdoc
     */
    public function sub($minuend, $subtrahend)
    {
        return gmp_strval(gmp_sub($minuend, $subtrahend));
    }

    /**
     * @inheritdoc
     */
    public function mul($multiplicand, $multiplier)
    {
        return gmp_strval(gmp_mul($multiplicand, $multiplier));
    }

    /**
     * @inheritdoc
     */
    public function div($dividend, $divisor)
    {
        return gmp_strval(gmp_div($dividend, $divisor));
    }

    /**
     * @inheritdoc
     */
    public function cmp($first, $second)
    {
        $result = gmp_cmp($first, $second);

        if ($result == 0) {
            return MathImplInterface::EQUALS;
        } elseif ($result > 0) {
            return MathImplInterface::GREATER;
        }

        return MathImplInterface::LOWER;
    }

    /**
     * @inheritdoc
     */
    public function sqrt($number)
    {
        return gmp_strval(gmp_sqrt($number));
    }
}
