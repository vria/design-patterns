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

    /**
     * @param FormView $child
     * @return $this
     */
    public function add(FormView $child)
    {
        $this->children[$child->getName()] = $child;

        return $this;
    }

    /**
     * @param $name
     * @return FormView $child
     */
    public function get($name)
    {
        if (!array_key_exists($name, $this->children)) {
            throw new \InvalidArgumentException("There is no child with $name name");
        }

        return $this->children[$name];
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
