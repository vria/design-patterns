<?php

namespace DesignPatterns\Creational\AbstractFactory;

/**
 * An interface for all HTML buttons.
 *
 * It corresponds to `AbstractProductA` in the Abstract Factory pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
interface ButtonInterface extends ElementInterface
{
    /**
     * @param string $label
     */
    public function __construct($label);
}
