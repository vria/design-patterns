<?php

namespace DesignPatterns\Behavioral\Strategy;


class InStockFilter implements ProductFilter
{
    public function filter($products)
    {
        return array_filter($products, function($product) {
            return $product['in_stock'];
        });
    }
}