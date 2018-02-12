<?php

namespace DesignPatterns\Creational\AbstractFactory\Plain;

use DesignPatterns\Creational\AbstractFactory\TextInputInterface;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class PlainTextInput implements TextInputInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $label;

    /**
     * @param string $name
     * @param string $label
     */
    public function __construct($name, $label)
    {
        $this->name = $name;
        $this->label = $label;
    }

    /**
     * @inheritdoc
     */
    public function render()
    {
        echo
<<<EOT
        <label for="{$this->name}">{$this->label}</label>
        <input type="text" id="{$this->name}" name="{$this->name}">
EOT;
    }
}
