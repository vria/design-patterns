<?php

namespace DesignPatterns\Creational\AbstractFactory;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
interface Button extends Element
{
    /**
     * @param string $label
     */
    public function __construct($label);
}
