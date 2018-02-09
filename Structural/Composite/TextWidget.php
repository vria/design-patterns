<?php

namespace DesignPatterns\Structural\Composite;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class TextWidget extends FormView
{
    /**
     * @inheritdoc
     */
    public function render()
    {
        echo '<input type="text" name="' . $this->name . '">';
    }
}
