<?php

namespace DesignPatterns\Creational\AbstractFactory;


interface HTMLPageFactory
{
    /**
     * @return Page
     */
    public function createPage();

    /**
     * @return TextInput
     */
    public function createTextInput($name, $label);

    /**
     * @return Button
     */
    public function createButton($label);
}