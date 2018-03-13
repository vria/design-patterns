<?php

namespace DesignPatterns\Creational\FactoryMethod\SimpleApplication;

use DesignPatterns\Creational\FactoryMethod\RequestInterface;

/**
 * It corresponds to `ConcreteProduct` in the Factory Method pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class SimpleRequest implements RequestInterface
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
