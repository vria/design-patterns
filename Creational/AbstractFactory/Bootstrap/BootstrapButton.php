<?php

namespace DesignPatterns\Creational\AbstractFactory\Bootstrap;

use DesignPatterns\Creational\AbstractFactory\Button;


/**
 * Class BootstrapButton
 * @package DesignPatterns\Creational\AbstractFactory\Bootstrap
 */
class BootstrapButton implements Button
{
    /**
     * @var string
     */
    private $label;

    /**
     * @param string $label
     */
    public function __construct($label)
    {
        $this->label = $label;
    }

    /**
     * @inheritdoc
     */
    public function render()
    {
        echo '<button class="btn btn-primary">' . $this->label . '</button>';
    }
}
