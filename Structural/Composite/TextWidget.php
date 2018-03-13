<?php

namespace DesignPatterns\Structural\Composite;

/**
 * HTML text input.
 * Corresponds to `Leaf` in the Composite pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class TextWidget extends AbstractWidget
{
    /**
     * @inheritdoc
     */
    public function render()
    {
        echo '<input type="text" name="' . $this->name . '">';
    }
}
