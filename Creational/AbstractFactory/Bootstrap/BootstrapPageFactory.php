<?php

namespace DesignPatterns\Creational\AbstractFactory\Bootstrap;

use DesignPatterns\Creational\AbstractFactory\HTMLPageFactory;
use DesignPatterns\Creational\AbstractFactory\Page;
use DesignPatterns\Creational\AbstractFactory\TextInput;
use DesignPatterns\Creational\AbstractFactory\Button;


class BootstrapPageFactory implements HTMLPageFactory
{
    /**
     * @return BootstrapPage|Page
     */
    public function createPage()
    {
        return new BootstrapPage();
    }

    /**
     * @param $name
     * @param $label
     * @return BootstrapTextInput|TextInput
     */
    public function createTextInput($name, $label)
    {
        return new BootstrapTextInput($name, $label);
    }

    /**
     * @param $label
     * @return BootstrapButton|Button
     */
    public function createButton($label)
    {
        return new BootstrapButton($label);
    }
}