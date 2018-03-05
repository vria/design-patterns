<?php

namespace DesignPatterns\Creational\Prototype\Bootstrap;

use DesignPatterns\Creational\Prototype\AbstractButton;

/**
 * Concrete button that is created by @see BootstrapHTMLFactory::createButton()
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class BootstrapButton extends AbstractButton
{
    /**
     * @inheritdoc
     */
    public function render()
    {
        echo '<button class="btn btn-primary">' . $this->label . '</button>';
    }
}
