<?php

namespace DesignPatterns\Creational\FactoryMethod\ParameterApplication;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class ParameterController
{
    /**
     * @param ParameterRequest $request
     * @return string
     */
    public static function userAction(ParameterRequest $request)
    {
        return sprintf("<h1>Showing user #%s</h1>", $request->getQueryParameter('id'));
    }

    /**
     * @param ParameterRequest $request
     * @return string
     */
    public static function articlesAction(ParameterRequest $request)
    {
        return sprintf("<h1>Showing articles of %s category with filter %s</h1>",
            $request->getQueryParameter('category'), $request->getQueryParameter('filter'));
    }
}
