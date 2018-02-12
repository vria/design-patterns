<?php

namespace DesignPatterns\Structural\Composite;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class Form extends FormView
{
    /**
     * @var array
     */
    protected $children = [];

    /**
     * @param FormView $child
     *
     * @return $this
     */
    public function add(FormView $child)
    {
        $this->children[$child->getName()] = $child;

        return $this;
    }

    /**
     * @param $name
     *
     * @return FormView
     */
    public function get($name)
    {
        if (!array_key_exists($name, $this->children)) {
            throw new \InvalidArgumentException("There is no child with $name name");
        }

        return $this->children[$name];
    }

    /**
     * @inheritdoc
     */
    public function render()
    {
        echo "<form>";

        foreach($this->children as $child) {
            $child->render();
        }

        echo "</form>";
    }
}
