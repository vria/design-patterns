<?php

namespace DesignPatterns\Creational\FactoryMethod\ParameterApplication;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class ParameterController
{
    /**
     * @param ParameterRequestInterface $request
     *
     * @return string
     */
    public static function userAction(ParameterRequestInterface $request)
    {
        return sprintf("<h1>Showing user #%s</h1>", $request->getQueryParameter('id'));
    }

    /**
     * @param ParameterRequestInterface $request
     *
     * @return string
     */
    public static function articlesAction(ParameterRequestInterface $request)
    {
        return sprintf(
            "<h1>Showing articles of %s category with filter %s</h1>",
            $request->getQueryParameter('category'), $request->getQueryParameter('filter')
        );
    }
}
