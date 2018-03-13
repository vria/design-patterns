<?php

namespace DesignPatterns\Creational\AbstractFactory\Bootstrap;

use DesignPatterns\Creational\AbstractFactory\HTMLFactoryInterface;

/**
 * Concrete factory that creates bootstrap HTML elements.
 *
 * It corresponds to `ConcreteFactory2` in the Abstract Factory pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class BootstrapHTMLFactory implements HTMLFactoryInterface
{
    /**
     * @inheritdoc
     */
    public function createPage()
    {
        return new BootstrapPage();
    }

    /**
     * @inheritdoc
     */
    public function createTextInput($name, $label)
    {
        return new BootstrapTextInput($name, $label);
    }

    /**
     * @inheritdoc
     */
    public function createButton($label)
    {
        return new BootstrapButton($label);
    }
}
