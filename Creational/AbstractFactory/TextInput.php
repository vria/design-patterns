<?php

namespace DesignPatterns\Creational\AbstractFactory;

/**
 * Interface TextInput
 * @package DesignPatterns\Creational\AbstractFactory
 */
interface TextInput extends Element
{
    /**
     * @param string $name
     * @param string $label
     */
    public function __construct($name, $label);
}
