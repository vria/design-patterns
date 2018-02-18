<?php

namespace DesignPatterns\Creational\AbstractFactory;

/**
 * An interface for all concrete pages:
 * - @see \DesignPatterns\Creational\AbstractFactory\Bootstrap\BootstrapPage
 * - @see \DesignPatterns\Creational\AbstractFactory\Plain\PlainPage
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
