<?php

namespace DesignPatterns\Creational\AbstractFactory\Bootstrap;

use DesignPatterns\Creational\AbstractFactory\Button;


class BootstrapButton implements Button
{
    private $label;

    public function __construct($label)
    {
        $this->label = $label;
    }

    public function render()
    {
        echo '<button class="btn btn-primary">' . $this->label . '</button>';
    }
}