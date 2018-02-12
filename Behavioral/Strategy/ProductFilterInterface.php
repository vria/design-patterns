<?php

namespace DesignPatterns\Behavioral\Strategy;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
interface ProductFilterInterface
{
    /**
     * @param array $product
     *
     * @return array
     */
    public function filter(array $product);
}
