<?php

namespace DesignPatterns\Creational\FactoryMethod\SimpleApplication;

use DesignPatterns\Creational\FactoryMethod\RequestInterface;
use DesignPatterns\Creational\FactoryMethod\RouterInterface;

/**
 * It corresponds to `ConcreteProduct` in the Factory Method pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class SimpleRouter implements RouterInterface
{
    /**
     * @param RequestInterface $request
     * @return callable
     * @throws \Exception
     */
    public function resolveHandler(RequestInterface $request)
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
