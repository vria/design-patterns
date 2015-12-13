<?php

namespace DesignPatterns\Creational\AbstractFactory\Bootstrap;

use DesignPatterns\Creational\AbstractFactory\HTMLPageFactory;

/**
 * Class BootstrapPageFactory
 * @package DesignPatterns\Creational\AbstractFactory\Bootstrap
 */
class BootstrapPageFactory implements HTMLPageFactory
{
    /**
     * @return BootstrapPage
     */
    public function createPage()
    {
        return new BootstrapPage();
    }

    /**
     * @param string $name
     * @param string $label
     * @return BootstrapTextInput
     */
    public function createTextInput($name, $label)
    {
        return new BootstrapTextInput($name, $label);
    }

    /**
     * @param string $label
     * @return BootstrapButton
     */
    public function createButton($label)
    {
        return new BootstrapButton($label);
    }
}
