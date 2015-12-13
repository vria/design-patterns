<?php

namespace DesignPatterns\Structural\Composite;

/**
 * Class TextWidget
 * @package DesignPatterns\Structural\Composite
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
