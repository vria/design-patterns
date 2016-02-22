<?php

namespace DesignPatterns\Behavioral\Visitor\FormFields;

use DesignPatterns\Behavioral\Visitor\FormField;
use DesignPatterns\Behavioral\Visitor\Visitor;

class ChoiceField extends FormField
{
    /**
     * @var array
     */
    private $choices;

    /**
     * @param Visitor $visitor
     */
    public function accept(Visitor $visitor)
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
