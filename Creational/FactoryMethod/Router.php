<?php

namespace DesignPatterns\Creational\FactoryMethod;


interface Router
{
    /**
     * @param string $requestURL
     * @return Request
     */
    public function getHandleMethod($requestURL);
}
