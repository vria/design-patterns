<?php

namespace DesignPatterns\Creational\AbstractFactory;

/**
 * An interface for all html elements like:
 * - @see PageInterface
 * - @see TextInputInterface
 * - @see ButtonInterface
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
interface ElementInterface
{
    /**
     * Display element
     */
    public function render();
}
