<?php

namespace DesignPatterns\Creational\FactoryMethod\SimpleApplication;

use DesignPatterns\Creational\FactoryMethod\Request;
use DesignPatterns\Creational\FactoryMethod\Router;

/**
 * Concrete product
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class SimpleRouter implements Router
{
    /**
     * @param Request $request
     * @return callable
     * @throws \Exception
     */
    public function resolveHandler(Request $request)
    {
        switch ($request->getRequestURL()) {
            case '/':
                return [SimpleController::class, 'homeAction'];
            case '/contact.html':
                return [SimpleController::class, 'contactAction'];
            default:
                throw new \Exception("404");
        }
    }
}
