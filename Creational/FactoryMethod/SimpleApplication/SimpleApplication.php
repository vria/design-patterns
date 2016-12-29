<?php

namespace DesignPatterns\Creational\FactoryMethod\SimpleApplication;


use DesignPatterns\Creational\FactoryMethod\ApplicationFramework;

class SimpleApplication extends ApplicationFramework
{
    /**
     * @return Router
     */
    public function getRouter()
    {
        return new Router();
    }

    /**
     * @return string
     */
    public function indexAction()
    {
        return '<h1>Simple App greats you!</h1>';
    }

    /**
     * @return string
     */
    public function contactAction()
    {
        return '<h1>We will be pleased to hear from you!</h1>';
    }
}
