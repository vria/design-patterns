<?php

namespace DesignPatterns\Creational\Prototype\Bootstrap;

use DesignPatterns\Creational\Prototype\AbstractTextInput;

/**
 * Concrete page that is created by @see BootstrapHTMLFactory::createTextInput()
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class BootstrapTextInput extends AbstractTextInput
{
    /**
     * @inheritdoc
     */
    public function render()
    {
        echo <<<EOT
<div class="form-group">
    <label for="{$this->name}">{$this->label}</label>
    <input class="form-control" id="{$this->name}" name="{$this->name}">
</div>
EOT;
    }
}
