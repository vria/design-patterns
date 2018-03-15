<?php

namespace DesignPatterns\Behavioral\Visitor\FormFields;

use DesignPatterns\Behavioral\Visitor\FormField;
use DesignPatterns\Behavioral\Visitor\VisitorInterface;

/**
 * Integer form field.
 *
 * It corresponds to `ConcreteElement` in the Strategy pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class IntegerField extends FormField
{
    /**
     * @param VisitorInterface $visitor
     */
    public function accept(VisitorInterface $visitor)
    {
        $visitor->visitInteger($this);
    }
}
