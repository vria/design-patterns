<?php

namespace DesignPatterns\Creational\FactoryMethod\SimpleApplication;

use DesignPatterns\Creational\FactoryMethod\RequestInterface;
use DesignPatterns\Creational\FactoryMethod\RouterInterface;

/**
 * Concrete product
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class SimpleRouterInterface implements RouterInterface
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
