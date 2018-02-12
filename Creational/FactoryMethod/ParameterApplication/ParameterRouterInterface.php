<?php

namespace DesignPatterns\Creational\FactoryMethod\ParameterApplication;

use DesignPatterns\Creational\FactoryMethod\RequestInterface;
use DesignPatterns\Creational\FactoryMethod\RouterInterface;

/**
 * Concrete product
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class ParameterRouterInterface implements RouterInterface
{
    /**
     * @param RequestInterface $request
     * @return callable
     * @throws \Exception
     */
    public function resolveHandler(RequestInterface $request)
    {
        if (!$request instanceof ParameterRequestInterface) {
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
