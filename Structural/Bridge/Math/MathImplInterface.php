<?php

namespace DesignPatterns\Structural\Bridge\Math;

/**
 * The interface for defining primitive arithmetic operations: adding, subtracting, negation, comparing, etc.
 *
 * Corresponds to `Implementor` in the Bridge pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
interface MathImplInterface
{
    const EQUALS = 0;
    const GREATER = 1;
    const LOWER = -1;

    /**
     * Negation -$number.
     *
     * @param mixed $number
     *
     * @return mixed
     */
    public function neg($number);

    /**
     * Adding $augend + $addend.
     *
     * @param mixed $augend
     * @param mixed $addend
     *
     * @return mixed
     */
    public function add($augend, $addend);

    /**
     * Subtracting $minuend - $subtrahend.
     *
     * @param mixed $minuend
     * @param mixed $subtrahend
     *
     * @return mixed
     */
    public function sub($minuend, $subtrahend);

    /**
     * Multiplication $multiplicand * $multiplier.
     *
     * @param mixed $multiplicand
     * @param mixed $multiplier
     *
     * @return mixed
     */
    public function mul($multiplicand, $multiplier);

    /**
     * Division $dividend / $divisor.
     *
     * @param mixed $dividend
     * @param mixed $divisor
     *
     * @return mixed
     */
    public function div($dividend, $divisor);

    /**
     * Comparing $first == $second.
     *
     * @param mixed $first
     * @param mixed $second
     *
     * @return mixed
     */
    public function cmp($first, $second);

    /**
     * Square root √$number.
     *
     * @param mixed $number
     *
     * @return mixed
     */
    public function sqrt($number);
}
