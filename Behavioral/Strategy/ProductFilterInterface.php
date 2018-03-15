<?php

namespace DesignPatterns\Behavioral\Strategy;

/**
 * This is the Strategy contract for all concrete strategies.
 * @see ProductCollection::$filter the `Context` that uses a concrete strategy in order to filter the products.
 *
 * It corresponds to `Strategy` in the Strategy pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
interface ProductFilterInterface
{
    /**
     * Strategy method called from context @see ProductCollection::filterElements()
     *
     * @param array $product
     *
     * @return array
     */
    public function filter(array $product);
}
