<?php

namespace DesignPatterns\Creational\AbstractFactory\Plain;

use DesignPatterns\Creational\AbstractFactory\HTMLFactoryInterface;

/**
 * Concrete factory that creates plain HTML elements.
 *
 * It corresponds to `ConcreteFactory1` in the Abstract Factory pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class PlainHTMLFactory implements HTMLFactoryInterface
{
    /**
     * @inheritdoc
     */
    public function createPage()
    {
        return new PlainPage();
    }

    /**
     * @inheritdoc
     */
    public function createTextInput($name, $label)
    {
        return new PlainTextInput($name, $label);
    }

    /**
     * @inheritdoc
     */
    public function createButton($label)
    {
        return new PlainButton($label);
    }
}
