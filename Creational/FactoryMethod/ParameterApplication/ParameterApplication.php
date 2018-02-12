<?php

namespace DesignPatterns\Creational\FactoryMethod\ParameterApplication;

use DesignPatterns\Creational\FactoryMethod\Application;

/**
 * Concrete creator
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class ParameterApplication extends Application
{
    /**
     * @return ParameterRouterInterface
     */
    public function createRouter()
    {
        return new ParameterRouterInterface();
    }

    /**
     * @param $requestURL
     *
     * @return ParameterRequestInterface
     */
    public function createRequest($requestURL)
    {
        return new ParameterRequestInterface($requestURL);
    }

    /**
     * @param $request
     *
     * @return string
     */
    public function searchAction($request)
    {
        return 'Search page. Parameters: ' . json_encode($request);
    }

    /**
     * @param $params
     *
     * @return string
     */
    public function viewAction($params)
    {
        return "View {$params['className']} object of id {$params['id']}";
    }
}
