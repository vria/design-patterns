<?php

namespace DesignPatterns\Creational\AbstractFactory\Plain;

use DesignPatterns\Creational\AbstractFactory\HTMLFactory;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class PlainPageFactory implements HTMLFactory
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
     *
     * @return PlainTextInput
     */
    public function createTextInput($name, $label)
    {
        return new PlainTextInput($name, $label);
    }

    /**
     * @param string $label
     *
     * @return PlainButton
     */
    public function createButton($label)
    {
        return new PlainButton($label);
    }
}
