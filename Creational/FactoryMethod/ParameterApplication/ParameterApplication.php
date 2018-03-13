<?php

namespace DesignPatterns\Creational\FactoryMethod\ParameterApplication;

use DesignPatterns\Creational\FactoryMethod\Application;

/**
 * Application that accepts parameters in URL.
 *
 * It corresponds to `ConcreteCreator` in the Factory Method pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class ParameterApplication extends Application
{
    /**
     * @inheritdoc
     */
    public function createRouter()
    {
        return new ParameterRouter();
    }

    /**
     * @inheritdoc
     */
    public function createRequest($requestURL)
    {
        return new ParameterRequest($requestURL);
    }
}
