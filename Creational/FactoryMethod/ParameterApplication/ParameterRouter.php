<?php

namespace DesignPatterns\Creational\FactoryMethod\ParameterApplication;

use DesignPatterns\Creational\FactoryMethod\Request;
use DesignPatterns\Creational\FactoryMethod\Router;

class ParameterRouter implements Router
{
    /**
     * @param Request $request
     * @return callable
     * @throws \Exception
     */
    public function defineHandler(Request $request)
    {
        if (!$request instanceof ParameterRequest) {
            throw new \InvalidArgumentException;
        }

        if ('/user' === $request->getPath() && $request->getQueryParameter('id')) {
            return function(ParameterRequest $request) {
                return sprintf("<h1>Showing user #%s</h1>", $request->getQueryParameter('id'));
            };
        }

        if ('/articles' === $request->getPath()
            && $request->getQueryParameter('category')
            && $request->getQueryParameter('filter')
        ) {
            return function(ParameterRequest $request) {
                return sprintf("<h1>Showing articles of %s category with filter %s</h1>",
                    $request->getQueryParameter('category'), $request->getQueryParameter('filter'));
            };
        }

        throw new \Exception("404");
    }
}
