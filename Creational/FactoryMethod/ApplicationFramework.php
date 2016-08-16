<?php

namespace DesignPatterns\Creational\FactoryMethod;

abstract class ApplicationFramework
{
    /**
     * @return Router
     */
    abstract function getRouter();

    /**
     * @param $requestURL
     * @return mixed
     */
    public function handle($requestURL)
    {
        $router = $this->getRouter();

        $request = $router->getHandleMethod($requestURL);

        return call_user_func(array($this, $request->method), $request->parameters);
    }
}
