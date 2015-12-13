<?php

namespace DesignPatterns\Creational\AbstractFactory\PlainHTML;

use DesignPatterns\Creational\AbstractFactory\Button;


/**
 * Class PlainButton
 * @package DesignPatterns\Creational\AbstractFactory\PlainHTML
 */
class PlainButton implements Button
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
        echo '<button>' . $this->label . '</button>';
    }
}
