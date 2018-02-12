<?php

namespace DesignPatterns\Behavioral\Visitor\FormFields;

use DesignPatterns\Behavioral\Visitor\FormField;
use DesignPatterns\Behavioral\Visitor\VisitorInterface;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class ChoiceField extends FormField
{
    /**
     * @var array
     */
    private $choices;

    /**
     * @param VisitorInterface $visitor
     */
    public function accept(VisitorInterface $visitor)
    {
        $visitor->visitChoice($this);
    }

    /**
     * @return array
     */
    public function getChoices()
    {
        return $this->choices;
    }

    /**
     * @param array $choices
     */
    public function setChoices($choices)
    {
        $this->choices = $choices;
    }
}
