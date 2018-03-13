<?php

namespace DesignPatterns\Structural\Composite;

/**
 * Base class for all html widgets in composition that:
 * - defines common variables like `name`, `parent`,
 * - implements default logic of children management methods,
 * - defines the `render` method that renders html code of element (and its children if available).
 *
 * Corresponds to `Component` in the Composite pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
abstract class AbstractWidget
{
    /**
     * The name of an element.
     *
     * @var string
     */
    protected $name;

    /**
     * Reference to the parent.
     *
     * @var AbstractWidget
     */
    protected $parent;

    /**
     * Constructor.
     *
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get parent.
     *
     * @return AbstractWidget
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Add child. The name of the child allows to retrieve it afterwards.
     * This is a default implementation that leaves should live unchanged.
     * The composite subclasses must overwrite it to save a child.
     *
     * @param AbstractWidget $child
     */
    public function add(AbstractWidget $child)
    {
        throw new \BadMethodCallException("Simple form element cannot have children");
    }

    /**
     * Get child by its name.
     * This is a default implementation that leaves should live unchanged.
     * The composite subclasses must overwrite it to return a child.
     *
     * @param string $name
     *
     * @return AbstractWidget
     */
    public function get($name)
    {
        throw new \BadMethodCallException("Simple form element cannot have children");
    }

    /**
     * Render entire element.
     * Leaves will simply output some html while composites will ask their children to render themselves.
     */
    public abstract function render();
}
