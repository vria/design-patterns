<?php

namespace DesignPatterns\Creational\AbstractFactory;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
interface TextInput extends Element
{
    /**
     * @param string $name
     * @param string $label
     */
    public function __construct($name, $label);
}
