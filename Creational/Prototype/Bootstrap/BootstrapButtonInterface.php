<?php

namespace DesignPatterns\Creational\Prototype\Bootstrap;

use DesignPatterns\Creational\Prototype\ElementInterface;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class BootstrapButton implements ElementInterface
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
