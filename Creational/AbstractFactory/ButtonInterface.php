<?php

namespace DesignPatterns\Creational\AbstractFactory;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
interface ButtonInterface extends ElementInferface
{
    /**
     * @param string $label
     */
    public function __construct($label);
}
