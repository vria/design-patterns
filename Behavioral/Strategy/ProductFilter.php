<?php

namespace DesignPatterns\Behavioral\Strategy;

/**
 * Interface ProductFilter
 * @package DesignPatterns\Behavioral\Strategy
 */
interface ProductFilter
{
    /**
     * @param array $product
     * @return mixed
     */
    public function filter(array $product);
}
