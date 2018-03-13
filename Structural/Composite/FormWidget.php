<?php

namespace DesignPatterns\Structural\Composite;

/**
 * A HTML form widget. It can be either a main (root) form or a subform.
 * The form can contain another html widgets as children that are both
 * the leaves (text input, submit input) and the composites (subform).
 *
 * Corresponds to `Composite` in the Composite pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class FormWidget extends AbstractWidget
{
    /**
     * An array of children.
     *
     * @var AbstractWidget[]
     */
    protected $children = [];

    /**
     * @inheritdoc
     */
    public function add(AbstractWidget $child)
    {
        // Save this child
        $this->children[$child->getName()] = $child;

        // Save this object as a parent of the child
        $child->parent = $this;

        return $this;
    }

    /**
     * @inheritdoc
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
        if (!$this->parent) {
            // If this form is a main (root) form
            echo '<form name="' . $this->name . '">';
        } else {
            // If this form is a subform
            echo '<div>';
        }

        foreach($this->children as $child) {
            $child->render();
        }

        if (!$this->parent) {
            // If this form is a main (root) form
            echo "</form>";
        } else {
            // If this form is a subform
            echo '</div>';
        }
    }
}
