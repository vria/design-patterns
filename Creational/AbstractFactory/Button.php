<?php

namespace DesignPatterns\Creational\AbstractFactory;

/**
 * Interface Button
 * @package DesignPatterns\Creational\AbstractFactory
 */
interface Button extends Element
{
    /**
     * @param string $label
     */
    public function __construct($label);
}
