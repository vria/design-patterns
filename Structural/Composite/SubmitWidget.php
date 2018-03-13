<?php

namespace DesignPatterns\Structural\Composite;

/**
 * HTML submit input.
 * Corresponds to `Leaf` in the Composite pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class SubmitWidget extends AbstractWidget
{
    /**
     * @inheritdoc
     */
    public function render()
    {
        echo '<input type="submit" name="' . $this->name . '">';
    }
}
