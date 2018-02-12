<?php

namespace DesignPatterns\Creational\AbstractFactory;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
interface TextInputInterface extends ElementInferface
{
    /**
     * @param string $name
     * @param string $label
     */
    public function __construct($name, $label);
}
