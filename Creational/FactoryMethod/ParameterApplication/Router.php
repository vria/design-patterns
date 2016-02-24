<?php

namespace DesignPatterns\Creational\FactoryMethod\ParameterApplication;

use DesignPatterns\Creational\FactoryMethod\Request;
use DesignPatterns\Creational\FactoryMethod\Router as RouterInterface;

class Router implements RouterInterface
{
    /**
     * @param string $requestURL
     * @return Request|void
     * @throws \Exception
     */
    public function getHandleMethod($requestURL)
    {
        $parsedURL = parse_url($requestURL);

        $path = $parsedURL['path'];

        $params = array();
        if (array_key_exists('query', $parsedURL)) {
            parse_str($parsedURL['query'], $params);
        }

        if (preg_match('/^\/search$/', $path)) {
            return new Request('searchAction', $params);
        }

        if (preg_match('/^\/view\/([A-Za-z]+)\/(\d+)/', $path, $matches)) {
            $params['className'] = $matches[1];
            $params['id'] = $matches[2];
            return new Request('viewAction', $params);
        }

        throw new \Exception;
    }
}
