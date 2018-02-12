<?php

namespace DesignPatterns\Creational\AbstractFactory;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
interface PageInterface extends ElementInterface
{
    /**
     * @param ElementInterface $element
     */
    public function addElement(ElementInterface $element);
}
