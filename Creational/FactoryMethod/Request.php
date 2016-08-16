<?php

namespace DesignPatterns\Creational\FactoryMethod;


class Request
{
    /**
     * @var string
     */
    public $method;

    /**
     * @var array
     */
    public $parameters;

    /**
     * @param string $method
     * @param array $parameters
     */
    function __construct($method, $parameters = array())
    {
        $this->method = $method;
        $this->parameters = $parameters;
    }
}
