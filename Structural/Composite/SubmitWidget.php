<?php

namespace DesignPatterns\Structural\Composite;

/**
 * Class SubmitWidget
 * @package DesignPatterns\Structural\Composite
 */
class SubmitWidget extends FormView
{
    /**
     * @inheritdoc
     */
    public function render()
    {
        echo '<input type="submit" name="' . $this->name . '">';
    }
}
