<?php

namespace DesignPatterns\Structural\Composite;


class TextWidget extends FormView
{
    public function render()
    {
        echo '<input type="text" name="' . $this->name . '">';
    }
}