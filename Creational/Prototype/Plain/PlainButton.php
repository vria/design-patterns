<?php

namespace DesignPatterns\Creational\Prototype\Plain;

use DesignPatterns\Creational\Prototype\AbstractButton;

/**
 * Concrete plain HTML button.
 * The `Renderer` (`Client`) doesn't depends on it.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class PlainButton extends AbstractButton
{
    /**
     * @inheritdoc
     */
    public function render()
    {
        echo '<button>' . $this->label . '</button>';
    }
}
