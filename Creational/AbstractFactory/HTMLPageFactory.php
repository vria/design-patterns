<?php

namespace DesignPatterns\Creational\AbstractFactory;

/**
 * Interface HTMLPageFactory
 * @package DesignPatterns\Creational\AbstractFactory
 */
interface HTMLPageFactory
{
    /**
     * @return Page
     */
    public function createPage();

    /**
     * @param string $name
     * @param string $label
     *
     * @return TextInput
     */
    public function createTextInput($name, $label);

    /**
     * @param string $label
     * @return Button
     */
    public function createButton($label);
}
