<?php

namespace DesignPatterns\Creational\FactoryMethod\SimpleApplication;

use DesignPatterns\Creational\FactoryMethod\Application;

/**
 * The simplest application.
 *
 * It corresponds to `ConcreteCreator` in the Factory Method pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class SimpleApplication extends Application
{
    /**
     * @inheritdoc
     */
    public function createRouter()
    {
        return new SimpleRouter();
    }

    /**
     * @inheritdoc
     */
    public function createRequest($requestURL)
    {
        return new SimpleRequest($requestURL);
    }
}
