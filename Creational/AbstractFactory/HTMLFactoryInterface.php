<?php

namespace DesignPatterns\Creational\AbstractFactory;

/**
 * This is an interface of abstract factory that creates HTML elements.
 * All concrete factories that implement this interface are able to create these objects:
 * - @see PageInterface in createPage method
 * - @see TextInputInterface in createTextInput method
 * - @see ButtonInterface in createButton method
 *
 * Clients depend only on this interface and not on concrete factories. That makes factories interchangeable:
 * - @see \DesignPatterns\Creational\AbstractFactory\Bootstrap\BootstrapHTMLFactory
 * - @see \DesignPatterns\Creational\AbstractFactory\Plain\PlainHTMLFactory
 *
 * It corresponds to `AbstractFactory` in the Abstract Factory pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
interface HTMLFactoryInterface
{
    /**
     * Create a page
     *
     * @return PageInterface
     */
    public function createPage();

    /**
     * Create a text input
     *
     * @param string $name
     * @param string $label
     *
     * @return TextInputInterface
     */
    public function createTextInput($name, $label);

    /**
     * Create a button
     *
     * @param string $label
     *
     * @return ButtonInterface
     */
    public function createButton($label);
}
