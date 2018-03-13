<?php

namespace DesignPatterns\Creational\FactoryMethod;

/**
 * HTTP request that parses URL string and stores the current URL.
 *
 * It corresponds to `Product` in the Factory Method pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
interface RequestInterface
{
    /**
     * @return string
     */
    public function getRequestURL();
}
