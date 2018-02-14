<?php

namespace DesignPatterns\Behavioral\Strategy;

/**
 * Concrete strategy to filter products by the criteria of being in stock.
 *
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
