<?php

namespace DesignPatterns\Creational\AbstractFactory;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
interface HTMLFactoryInterface
{
    /**
     * @return PageInterface
     */
    public function createPage();

    /**
     * @param string $name
     * @param string $label
     *
     * @return TextInputInterface
     */
    public function createTextInput($name, $label);

    /**
     * @param string $label
     *
     * @return ButtonInterface
     */
    public function createButton($label);
}
