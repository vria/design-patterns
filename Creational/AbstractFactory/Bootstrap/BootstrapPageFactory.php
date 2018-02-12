<?php

namespace DesignPatterns\Creational\AbstractFactory\Bootstrap;

use DesignPatterns\Creational\AbstractFactory\HTMLFactoryInterface;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class BootstrapPageFactory implements HTMLFactoryInterface
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
     *
     * @return BootstrapTextInput
     */
    public function createTextInput($name, $label)
    {
        return new BootstrapTextInput($name, $label);
    }

    /**
     * @param string $label
     *
     * @return BootstrapButton
     */
    public function createButton($label)
    {
        return new BootstrapButton($label);
    }
}
