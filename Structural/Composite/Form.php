<?php

namespace DesignPatterns\Structural\Composite;


class Form extends FormView
{
    protected $children;

    public function __construct($name)
    {
        parent::__construct($name);
        $this->children = array();
    }

    public function add(FormView $child)
    {
        $this->children[$child->getName()] = $child;
    }

    public function get($name)
    {
        if (array_key_exists($name, $this->children)) {
            return $this->children[$name];
        }
        throw new Exception("There is no child with $name name");
    }

    public function render()
    {
        if (!$this->parent) {
            echo "<form>";
        }

        foreach($this->children as $child) {
            $child->render();
        }

        if (!$this->parent) {
            echo "</form>";
        }
    }
}