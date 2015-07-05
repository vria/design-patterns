<?php

namespace DesignPatterns\Creational\AbstractFactory;


interface Button extends Element
{
    public function __construct($label);
}