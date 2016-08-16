<?php

namespace DesignPatterns\Creational\FactoryMethod\ParameterApplication;


use DesignPatterns\Creational\FactoryMethod\ApplicationFramework;

class Application extends ApplicationFramework
{
    public function getRouter()
    {
        return new Router();
    }

    public function searchAction($params)
    {
        return 'Search page. Parameters: ' . json_encode($params);
    }

    public function viewAction($params)
    {
        return "View {$params['className']} object of id {$params['id']}";
    }
}
