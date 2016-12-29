<?php

namespace DesignPatterns\Creational\FactoryMethod;


interface Router
{
    /**
     * @param Request $request
     * @return callable
     */
    public function defineHandler(Request $request);
}
