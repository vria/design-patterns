<?php

namespace DesignPatterns\Creational\FactoryMethod\SimpleApplication;

use DesignPatterns\Creational\FactoryMethod\Request;
use DesignPatterns\Creational\FactoryMethod\Router as RouterInterface;

class Router implements RouterInterface
{
    /**
     * @param string $requestURL
     * @return Request
     * @throws \Exception
     */
    public function getHandleMethod($requestURL)
    {
        switch ($requestURL) {
            case '/':
                return new Request('indexAction');
            case '/contact.html':
                return new Request('contactAction');
            default:
                throw new \Exception;
        }
    }
}
