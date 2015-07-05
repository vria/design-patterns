<?php

namespace DesignPatterns\Creational\AbstractFactory;


interface TextInput extends Element
{
    public function __construct($name, $label);
    public function render();
}