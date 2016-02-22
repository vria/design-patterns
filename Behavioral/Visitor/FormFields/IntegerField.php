<?php

namespace DesignPatterns\Behavioral\Visitor\FormFields;


use DesignPatterns\Behavioral\Visitor\FormField;
use DesignPatterns\Behavioral\Visitor\Visitor;

class IntegerField extends FormField
{
    /**
     * @param Visitor $visitor
     */
    public function accept(Visitor $visitor)
    {
        $visitor->visitInteger($this);
    }
}
