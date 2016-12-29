<?php

namespace DesignPatterns\Creational\FactoryMethod;

/**
 * Application abstract base class.
 * Defines a framework for concrete applications.
 */
abstract class Application
{
    /**
     * This is the factory method.
     *
     * @return Router
     */
    abstract function createRouter();

    /**
     * This is another factory method.
     *
     * @param $requestURL
     * @return Request
     */
    abstract function createRequest($requestURL);

    /**
     * @param $requestURL
     * @return string
     */
    public function handle($requestURL)
    {
        $request = $this->createRequest($requestURL);
        $router = $this->createRouter();
        $handler = $router->defineHandler($request);

        return call_user_func($handler, $request);
    }
}
