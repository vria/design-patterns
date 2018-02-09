<?php

namespace DesignPatterns\Creational\FactoryMethod;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
interface Router
{
    /**
     * @param Request $request
     * @return callable
     */
    public function resolveHandler(Request $request);
}
