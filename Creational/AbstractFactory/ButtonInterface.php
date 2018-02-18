<?php

namespace DesignPatterns\Creational\AbstractFactory;

/**
 * An interface for all concrete buttons:
 * - @see \DesignPatterns\Creational\AbstractFactory\Bootstrap\BootstrapButton
 * - @see \DesignPatterns\Creational\AbstractFactory\Plain\PlainButton
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
