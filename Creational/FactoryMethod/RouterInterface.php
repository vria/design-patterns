<?php

namespace DesignPatterns\Creational\FactoryMethod;

/**
 * Router that matches a controller against current URL.
 *
 * It corresponds to `Product` in the Factory Method pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
interface RouterInterface
{
    /**
     * @param RequestInterface $request
     * @return callable
     */
    public function resolveHandler(RequestInterface $request);
}
