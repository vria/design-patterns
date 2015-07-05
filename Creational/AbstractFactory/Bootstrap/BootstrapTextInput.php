<?php

namespace DesignPatterns\Creational\AbstractFactory\Bootstrap;

use DesignPatterns\Creational\AbstractFactory\TextInput;


class BootstrapTextInput implements TextInput
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
    <div class="form-group">
        <label for="{$this->name}">{$this->label}</label>
        <input type="text" class="form-control" id="{$this->name}" name="{$this->name}">
    </div>
EOT;
    }
} 