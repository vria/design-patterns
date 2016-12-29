<?php

namespace DesignPatterns\Creational\FactoryMethod\SimpleApplication;

use DesignPatterns\Creational\FactoryMethod\Request;
use DesignPatterns\Creational\FactoryMethod\Router;

class SimpleRouter implements Router
{
    /**
     * @param Request $request
     * @return callable
     * @throws \Exception
     */
    public function defineHandler(Request $request)
    {
        switch ($request->getRequestURL()) {
            case '/':
                return function(Request $request) {
                    return '<h1>Simple App greats you!</h1>';
                };
            case '/contact.html':
                return function(Request $request) {
                    return '<h1>We will be pleased to hear from you!</h1>';
                };
            default:
                throw new \Exception("404");
        }
    }
}
