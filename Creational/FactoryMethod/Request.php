<?php

namespace DesignPatterns\Creational\FactoryMethod;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
interface Request
{
    /**
     * @return string
     */
    public function getRequestURL();
}
