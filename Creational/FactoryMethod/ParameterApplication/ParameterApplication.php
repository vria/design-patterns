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
     * @return ParameterRouter
     */
    function createRouter()
    {
        return new ParameterRouter();
    }

    /**
     * @param $requestURL
     * @return ParameterRequest
     */
    function createRequest($requestURL)
    {
        return new ParameterRequest($requestURL);
    }

    public function searchAction($request)
    {
        return 'Search page. Parameters: ' . json_encode($request);
    }

    public function viewAction($params)
    {
        return "View {$params['className']} object of id {$params['id']}";
    }
}
