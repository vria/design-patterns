<?php

namespace DesignPatterns\Structural\Composite;


class SubmitWidget extends FormView
{
    public function render()
    {
        echo '<input type="submit" name="' . $this->name . '">';
    }
}