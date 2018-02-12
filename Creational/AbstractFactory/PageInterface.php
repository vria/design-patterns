<?php

namespace DesignPatterns\Creational\AbstractFactory;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
interface PageInterface extends ElementInferface
{
    /**
     * @param ElementInferface $element
     */
    public function addElement(ElementInferface $element);
}
