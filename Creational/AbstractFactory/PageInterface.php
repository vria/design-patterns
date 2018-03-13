<?php

namespace DesignPatterns\Creational\AbstractFactory;

/**
 * An interface for all concrete pages:
 * - @see \DesignPatterns\Creational\AbstractFactory\Bootstrap\BootstrapPage
 * - @see \DesignPatterns\Creational\AbstractFactory\Plain\PlainPage
 *
 * It corresponds to `AbstractProductC` in the Abstract Factory pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
interface PageInterface extends ElementInterface
{
    /**
     * @param ElementInterface $element
     */
    public function addElement(ElementInterface $element);
}
