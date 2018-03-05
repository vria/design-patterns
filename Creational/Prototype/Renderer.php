<?php

namespace DesignPatterns\Creational\Prototype;

/**
 * Client
 *
 * @author Vlad Riabchenko <vriabchenko@webnet.fr>
 */
class Renderer
{
    /**
     * @var AbstractButton
     */
    private $buttonPrototype;

    /**
     * @var AbstractTextInput
     */
    private $textInputPrototype;

    /**
     * @var AbstractPage
     */
    private $pagePrototype;

    /**
     * Constructeur
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
     * @return AbstractButton
     */
    public function createButton()
    {
        return clone $this->buttonPrototype;
    }

    /**
     * @return AbstractTextInput
     */
    public function createTextInput()
    {
        return clone $this->textInputPrototype;
    }

    /**
     * @return AbstractPage
     */
    public function createPage()
    {
        return clone $this->pagePrototype;
    }
}
