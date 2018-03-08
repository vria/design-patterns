<?php

namespace DesignPatterns\Behavioral\Visitor\FormFields;

use DesignPatterns\Behavioral\Visitor\FormField;
use DesignPatterns\Behavioral\Visitor\VisitorInterface;

/**
 * Email form field.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class EmailField extends FormField
{
    /**
     * Accept a visitor that will transform or validate this email field instance.
     *
     * @param VisitorInterface $visitor
     */
    public function accept(VisitorInterface $visitor)
    {
        $visitor->visitEmail($this);
    }
}
