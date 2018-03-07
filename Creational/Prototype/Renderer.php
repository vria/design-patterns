<?php

namespace DesignPatterns\Creational\Prototype;

/**
 * The renderer of HTML elements. The actual useful code is omitted in order to concentrate on the creation of HTML elements.
 * This is a `Client` code in terms of the prototype pattern.
 * It holds prototype of HTML elements and clones them when a new instance is needed.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class Renderer
{
    /**
     * The prototype of an HTML button.
     *
     * @var AbstractButton
     */
    private $buttonPrototype;

    /**
     * The prototype of an HTML text input.
     *
     * @var AbstractTextInput
     */
    private $textInputPrototype;

    /**
     * The prototype of an HTML page.
     *
     * @var AbstractPage
     */
    private $pagePrototype;

    /**
     * Constructor.
     * The renderer gets parametrized with prototypes.
     *
     * @param AbstractButton $buttonPrototype
     * @param AbstractTextInput $textInputPrototype
     * @param AbstractPage $pagePrototype
     */
    public function __construct(
        AbstractButton $buttonPrototype,
        AbstractTextInput $textInputPrototype,
        AbstractPage $pagePrototype
    ) {
        $this->buttonPrototype = $buttonPrototype;
        $this->textInputPrototype = $textInputPrototype;
        $this->pagePrototype = $pagePrototype;
    }

    /**
     * Create a new HTML button.
     *
     * @return AbstractButton
     */
    public function createButton()
    {
        return clone $this->buttonPrototype;
    }

    /**
     * Create a new HTML text input.
     *
     * @return AbstractTextInput
     */
    public function createTextInput()
    {
        return clone $this->textInputPrototype;
    }

    /**
     * Create a new HTML page.
     * Note that all children elements of the prototype page are cloned as well:
     * @see AbstractPage::__clone().
     *
     * @return AbstractPage
     */
    public function createPage()
    {
        return clone $this->pagePrototype;
    }
}
