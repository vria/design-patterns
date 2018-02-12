<?php

namespace DesignPatterns\Creational\FactoryMethod\ParameterApplication;

use DesignPatterns\Creational\FactoryMethod\RequestInterface;

/**
 * Concrete product
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class ParameterRequestInterface implements RequestInterface
{
    /**
     * @var string
     */
    private $requestURL;

    /**
     * @var string
     */
    private $path;

    /**
     * @var array
     */
    private $queryParameters;

    /**
     * ParameterRequest constructor.
     * @param string $requestURL
     */
    public function __construct($requestURL)
    {
        $this->requestURL = $requestURL;
        $this->path = parse_url($requestURL, PHP_URL_PATH);
        parse_str(parse_url($requestURL, PHP_URL_QUERY), $this->queryParameters);
    }

    /**
     * @return string
     */
    public function getRequestURL()
    {
        return $this->requestURL;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return array
     */
    public function getQueryParameters()
    {
        return $this->queryParameters;
    }

    /**
     * @param string $parameter
     * @return string
     */
    public function getQueryParameter($parameter)
    {
        return array_key_exists($parameter, $this->queryParameters) ? $this->queryParameters[$parameter] : null;
    }
}
