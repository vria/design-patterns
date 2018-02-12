<?php

namespace DesignPatterns\Creational\FactoryMethod;

/**
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
