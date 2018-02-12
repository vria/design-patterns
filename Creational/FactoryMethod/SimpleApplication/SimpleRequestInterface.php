<?php

namespace DesignPatterns\Creational\FactoryMethod\SimpleApplication;

use DesignPatterns\Creational\FactoryMethod\RequestInterface;

/**
 * Concrete product
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class SimpleRequestInterface implements RequestInterface
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
