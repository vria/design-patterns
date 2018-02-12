<?php

namespace DesignPatterns\Behavioral\Strategy;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class InStockFilter implements ProductFilterInterface
{
    /**
     * @param array $products
     *
     * @return array
     */
    public function filter(array $products)
    {
        return array_filter($products, function($product) {
            return $product['in_stock'];
        });
    }
}
