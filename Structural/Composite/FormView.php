<?php

namespace DesignPatterns\Structural\Composite;

abstract class FormView
{
    protected $name;
    protected $parent = null;

    public function __construct($name){
        $this->name = $name;
    }

    public function getParent()
    {
        return $this->parent;
    }

    public function getName()
    {
        return $this->name;
    }

    public function add(FormView $child)
    {
        throw new Exception("Simple form element cannot have children");
    }

    public function get($name)
    {
        throw new Exception("Simple form element cannot have children");
    }

    public abstract function render();
}