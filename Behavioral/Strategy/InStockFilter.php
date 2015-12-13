<?php

namespace DesignPatterns\Behavioral\Strategy;

/**
 * Class InStockFilter
 * @package DesignPatterns\Behavioral\Strategy
 */
class InStockFilter implements ProductFilter
{
    /**
     * @param array $products
     * @return array
     */
    public function filter(array $products)
    {
        return array_filter($products, function($product) {
            return $product['in_stock'];
        });
    }
}