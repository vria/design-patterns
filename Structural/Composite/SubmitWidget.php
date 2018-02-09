<?php

namespace DesignPatterns\Structural\Composite;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
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
