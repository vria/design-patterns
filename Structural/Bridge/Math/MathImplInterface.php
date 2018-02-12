<?php

namespace DesignPatterns\Structural\Bridge\Math;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
interface MathImplInterface
{
    const EQUALS = 0;
    const GREATER = 1;
    const LOWER = -1;

    /**
     * @param mixed $number
     *
     * @return mixed
     */
    public function neg($number);

    /**
     * @param mixed $augend
     * @param mixed $addend
     *
     * @return mixed
     */
    public function add($augend, $addend);

    /**
     * @param mixed $minuend
     * @param mixed $subtrahend
     *
     * @return mixed
     */
    public function sub($minuend, $subtrahend);

    /**
     * @param mixed $multiplicand
     * @param mixed $multiplier
     *
     * @return mixed
     */
    public function mul($multiplicand, $multiplier);

    /**
     * @param mixed $dividend
     * @param mixed $divisor
     *
     * @return mixed
     */
    public function div($dividend, $divisor);

    /**
     * @param mixed $first
     * @param mixed $second
     *
     * @return mixed
     */
    public function cmp($first, $second);

    /**
     * @param mixed $number
     *
     * @return mixed
     */
    public function sqrt($number);
}
