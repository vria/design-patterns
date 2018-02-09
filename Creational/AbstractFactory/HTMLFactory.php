<?php

namespace DesignPatterns\Creational\AbstractFactory;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
interface HTMLFactory
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
     *
     * @return Button
     */
    public function createButton($label);
}
