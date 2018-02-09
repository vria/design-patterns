<?php

namespace DesignPatterns\Creational\AbstractFactory\Bootstrap;

use DesignPatterns\Creational\AbstractFactory\Button;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
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
