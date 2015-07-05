<?php

namespace DesignPatterns\Creational\AbstractFactory\PlainHTML;

use DesignPatterns\Creational\AbstractFactory\TextInput;


class PlainTextInput implements TextInput
{
    private $name;
    private $label;

    public function __construct($name, $label)
    {
        $this->name = $name;
        $this->label = $label;
    }

    public function render()
    {
        echo
<<<EOT
        <label for="{$this->name}">{$this->label}</label>
        <input type="text" id="{$this->name}" name="{$this->name}">
EOT;
    }
} 