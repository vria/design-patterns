<?php

namespace DesignPatterns\Creational\FactoryMethod;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
interface RequestInterface
{
    /**
     * @return string
     */
    public function getRequestURL();
}
