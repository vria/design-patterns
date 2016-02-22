<?php

namespace DesignPatterns\Behavioral\Visitor\FormFields;

use DesignPatterns\Behavioral\Visitor\FormField;
use DesignPatterns\Behavioral\Visitor\Visitor;

class EmailField extends FormField
{
    /**
     * @param Visitor $visitor
     */
    public function accept(Visitor $visitor)
    {
        $visitor->visitEmail($this);
    }
}
