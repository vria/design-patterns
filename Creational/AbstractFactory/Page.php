<?php

namespace DesignPatterns\Creational\AbstractFactory;

/**
 * Interface Page
 * @package DesignPatterns\Creational\AbstractFactory
 */
interface Page extends Element
{
    /**
     * @param Element $element
     */
    public function addElement(Element $element);
}
