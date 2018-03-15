<?php

namespace DesignPatterns\Creational\Prototype;

/**
 * An interface for all concrete pages:
 * - @see \DesignPatterns\Creational\Prototype\Bootstrap\BootstrapPage
 * - @see \DesignPatterns\Creational\Prototype\Plain\PlainPage
 * The `Renderer` (`Client`) depends on it.
 *
 * This is a `PrototypeC` constraint (interface or abstract class) in terms of the prototype pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
abstract class AbstractPage implements ElementInterface
{
    /**
     * @var ElementInterface[]
     */
    protected $elements = [];

    /**
     * @param ElementInterface $element
     *
     * @return $this
     */
    public function addElement(ElementInterface $element)
    {
        $this->elements[] = $element;

        return $this;
    }

    /**
     * Get elements
     *
     * @return ElementInterface[]
     */
    public function getElements()
    {
        return $this->elements;
    }

    /**
     * Clone all children elements.
     */
    public function __clone()
    {
        $this->elements = array_map(
            function($e) {
                return clone $e;
            },
            $this->elements
        );
    }
}
