<?php

namespace DesignPatterns\Creational\Prototype;

/**
 * An interface for all concrete buttons:
 * - @see \DesignPatterns\Creational\Prototype\Bootstrap\BootstrapButton
 * - @see \DesignPatterns\Creational\Prototype\Plain\PlainButton
 * The `Renderer` (`Client`) depends on it.
 *
 * This is a `PrototypeA` constraint (interface or abstract class) in terms of the Prototype pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
abstract class AbstractButton implements ElementInterface
{
    /**
     * @var string
     */
    protected $label;

    /**
     * @param string $label
     */
    public function __construct($label)
    {
        $this->label = $label;
    }
}
