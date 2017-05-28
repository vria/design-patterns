<?php

namespace DesignPatterns\Creational\FactoryMethod\SimpleApplication;

use DesignPatterns\Creational\FactoryMethod\Request;


class SimpleRequest implements Request
{
    /**
     * @var string
     */
    private $requestURL;

    /**
     * Request constructor.
     * @param string $requestURL
     */
    public function __construct($requestURL)
    {
        $this->requestURL = $requestURL;
    }

    /**
     * @return string
     */
    public function getRequestURL()
    {
        return $this->requestURL;
    }
}
