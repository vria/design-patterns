<?php

namespace DesignPatterns\Creational\Prototype;

/**
 * An interface for all concrete text inputs:
 * - @see \DesignPatterns\Creational\Prototype\Bootstrap\BootstrapTextInput
 * - @see \DesignPatterns\Creational\Prototype\Plain\PlainTextInput
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
abstract class AbstractTextInput implements ElementInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $label;

    /**
     * @param string $name
     * @param string $label
     */
    public function __construct($name, $label)
    {
        $this->name = $name;
        $this->label = $label;
    }
}
