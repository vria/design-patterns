<?php

namespace DesignPatterns\Creational\AbstractFactory\PlainHTML;

use DesignPatterns\Creational\AbstractFactory\HTMLPageFactory;


/**
 * Class PlainPageFactory
 * @package DesignPatterns\Creational\AbstractFactory\PlainHTML
 */
class PlainPageFactory implements HTMLPageFactory
{
    /**
     * @return PlainPage
     */
    public function createPage()
    {
        return new PlainPage();
    }

    /**
     * @param string $name
     * @param string $label
     * @return PlainTextInput
     */
    public function createTextInput($name, $label)
    {
        return new PlainTextInput($name, $label);
    }

    /**
     * @param string $label
     * @return PlainButton
     */
    public function createButton($label)
    {
        return new PlainButton($label);
    }
}
