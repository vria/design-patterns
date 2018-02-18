<?php

namespace DesignPatterns\Creational\AbstractFactory;

/**
 * An interface for all concrete text inputs:
 * - @see \DesignPatterns\Creational\AbstractFactory\Bootstrap\BootstrapTextInput
 * - @see \DesignPatterns\Creational\AbstractFactory\Plain\PlainTextInput
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
interface TextInputInterface extends ElementInterface
{
    /**
     * @param string $name
     * @param string $label
     */
    public function __construct($name, $label);
}
