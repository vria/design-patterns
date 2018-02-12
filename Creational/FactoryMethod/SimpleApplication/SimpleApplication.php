<?php

namespace DesignPatterns\Creational\FactoryMethod\SimpleApplication;

use DesignPatterns\Creational\FactoryMethod\Application;
use DesignPatterns\Creational\FactoryMethod\RequestInterface;

/**
 * Concrete creator
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class SimpleApplication extends Application
{
    /**
     * @return SimpleRouterInterface
     */
    public function createRouter()
    {
        return new SimpleRouterInterface();
    }

    /**
     * @param $requestURL
     *
     * @return RequestInterface
     */
    public function createRequest($requestURL)
    {
        return new SimpleRequestInterface($requestURL);
    }
}
