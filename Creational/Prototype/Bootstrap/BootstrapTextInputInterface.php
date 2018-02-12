<?php

namespace DesignPatterns\Creational\Prototype\Bootstrap;

use DesignPatterns\Creational\Prototype\ElementInterface;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class BootstrapTextInput implements ElementInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $label;

    /**
     * @param string $name
     * @param string $label
     */
    public function __construct($name, $label)
    {
        $this->name = $name;
        $this->label = $label;
    }

    /**
     * @inheritdoc
     */
    public function render()
    {
        echo
<<<EOT
    <div class="form-group">
        <label for="{$this->name}">{$this->label}</label>
        <input class="form-control" id="{$this->name}" name="{$this->name}">
    </div>
EOT;
    }
}
