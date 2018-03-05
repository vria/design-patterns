<?php

namespace DesignPatterns\Creational\Prototype;

/**
 * An interface for all html elements like:
 * - @see AbstractButton
 * - @see AbstractTextInput
 * - @see AbstractPage
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
