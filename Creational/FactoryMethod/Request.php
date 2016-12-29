<?php

namespace DesignPatterns\Creational\FactoryMethod;


class Request
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
