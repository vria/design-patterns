<?php

namespace DesignPatterns\Creational\FactoryMethod\ParameterApplication;

use DesignPatterns\Creational\FactoryMethod\Request;
use DesignPatterns\Creational\FactoryMethod\Router;

/**
 * Concrete product
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class ParameterRouter implements Router
{
    /**
     * @param Request $request
     * @return callable
     * @throws \Exception
     */
    public function resolveHandler(Request $request)
    {
        if (!$request instanceof ParameterRequest) {
            throw new \InvalidArgumentException;
        }

        if ('/user' === $request->getPath() && $request->getQueryParameter('id')) {
            return [ParameterController::class, 'userAction'];
        }

        if ('/articles' === $request->getPath()
            && $request->getQueryParameter('category')
            && $request->getQueryParameter('filter')
        ) {
            return [ParameterController::class, 'articlesAction'];
        }

        throw new \Exception("404");
    }
}
