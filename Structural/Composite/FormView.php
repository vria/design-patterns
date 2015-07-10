<?php

namespace DesignPatterns\Structural\Composite;


abstract class FormView
{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function add(FormView $child)
    {
        throw new \BadMethodCallException("Simple form element cannot have children");
    }

    public function get($name)
    {
        throw new \BadMethodCallException("Simple form element cannot have children");
    }

    public abstract function render();
}