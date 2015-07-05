<?php

namespace DesignPatterns\Creational\AbstractFactory;


interface Page extends Element
{
    public function addElement(Element $element);
    public function render();
}