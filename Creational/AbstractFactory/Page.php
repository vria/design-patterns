<?php

namespace DesignPatterns\Creational\AbstractFactory;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
interface Page extends Element
{
    /**
     * @param Element $element
     */
    public function addElement(Element $element);
}
