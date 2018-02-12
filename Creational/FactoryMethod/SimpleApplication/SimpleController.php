<?php

namespace DesignPatterns\Creational\FactoryMethod\SimpleApplication;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class SimpleController
{
    /**
     * Respond to a "/" route
     *
     * @return string
     */
    public static function homeAction()
    {
        return '<h1>Simple App greats you!</h1>';
    }

    /**
     * Respond to a "/" route
     *
     * @return string
     */
    public static function contactAction()
    {
        return '<h1>We will be pleased to hear from you!</h1>';
    }
}
