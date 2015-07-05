<?php

namespace DesignPatterns\Creational\AbstractFactory\PlainHTML;

use DesignPatterns\Creational\AbstractFactory\HTMLPageFactory;
use DesignPatterns\Creational\AbstractFactory\Page;
use DesignPatterns\Creational\AbstractFactory\TextInput;
use DesignPatterns\Creational\AbstractFactory\Button;


class PlainPageFactory implements HTMLPageFactory
{
    /**
     * @return PlainPage|Page
     */
    public function createPage()
    {
        return new PlainPage();
    }

    /**
     * @param $name
     * @param $label
     * @return PlainTextInput|TextInput
     */
    public function createTextInput($name, $label)
    {
        return new PlainTextInput($name, $label);
    }

    /**
     * @param $label
     * @return PlainButton|Button
     */
    public function createButton($label)
    {
        return new PlainButton($label);
    }
}