<?php

namespace DesignPatterns\Creational\FactoryMethod\SimpleApplication;

use DesignPatterns\Creational\FactoryMethod\Application;
use DesignPatterns\Creational\FactoryMethod\Request;

/**
 * Concrete creator
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class SimpleApplication extends Application
{
    /**
     * @return SimpleRouter
     */
    function createRouter()
    {
        return new SimpleRouter();
    }

    /**
     * @param $requestURL
     * @return Request
     */
    function createRequest($requestURL)
    {
        return new SimpleRequest($requestURL);
    }
}
