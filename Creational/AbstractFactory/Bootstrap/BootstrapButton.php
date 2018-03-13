<?php

namespace DesignPatterns\Creational\AbstractFactory\Bootstrap;

use DesignPatterns\Creational\AbstractFactory\ButtonInterface;

/**
 * Concrete button that is created by @see BootstrapHTMLFactory::createButton().
 *
 * It corresponds to `ProductA2` in the Abstract Factory pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class BootstrapButton implements ButtonInterface
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
