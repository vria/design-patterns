<?php

namespace DesignPatterns\Creational\AbstractFactory\PlainHTML;

use DesignPatterns\Creational\AbstractFactory\Button;


class PlainButton implements Button
{
    private $label;

    public function __construct($label)
    {
        $this->label = $label;
    }

    public function render()
    {
        echo '<button>' . $this->label . '</button>';
    }
}