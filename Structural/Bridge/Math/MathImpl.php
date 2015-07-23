<?php

namespace DesignPatterns\Structural\Bridge\Math;

interface MathImpl
{
    const EQUALS = 0;
    const GREATER = 1;
    const LOWER = -1;

    /**
     * @param $number
     * @return mixed
     */
    public function neg($number);

    /**
     * @param $augend
     * @param $addend
     * @return mixed
     */
    public function add($augend, $addend);

    /**
     * @param $minuend
     * @param $subtrahend
     * @return mixed
     */
    public function sub($minuend, $subtrahend);

    /**
     * @param $multiplicand
     * @param $multiplier
     * @return mixed
     */
    public function mul($multiplicand, $multiplier);

    /**
     * @param $dividend
     * @param $divisor
     * @return mixed
     */
    public function div($dividend, $divisor);

    /**
     * @param $first
     * @param $second
     * @return mixed
     */
    public function cmp($first, $second);

    public function sqrt($number);
}