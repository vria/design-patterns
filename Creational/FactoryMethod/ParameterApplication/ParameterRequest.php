<?php

namespace DesignPatterns\Creational\FactoryMethod\ParameterApplication;


use DesignPatterns\Creational\FactoryMethod\Request;

class ParameterRequest extends Request
{
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
        parent::__construct($requestURL);

        $this->path = parse_url($requestURL, PHP_URL_PATH);
        parse_str(parse_url($requestURL, PHP_URL_QUERY), $this->queryParameters);
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
