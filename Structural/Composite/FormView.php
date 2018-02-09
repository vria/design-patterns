<?php

namespace DesignPatterns\Structural\Composite;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
abstract class FormView
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param FormView $child
     */
    public function add(FormView $child)
    {
        throw new \BadMethodCallException("Simple form element cannot have children");
    }

    /**
     * @param string $name
     *
     * @return FormView
     */
    public function get($name)
    {
        throw new \BadMethodCallException("Simple form element cannot have children");
    }

    /**
     * Renders entire element
     */
    public abstract function render();
}
