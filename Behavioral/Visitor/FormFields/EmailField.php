<?php

namespace DesignPatterns\Behavioral\Visitor\FormFields;

use DesignPatterns\Behavioral\Visitor\FormField;
use DesignPatterns\Behavioral\Visitor\VisitorInterface;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class EmailField extends FormField
{
    /**
     * @param VisitorInterface $visitor
     */
    public function accept(VisitorInterface $visitor)
    {
        $visitor->visitEmail($this);
    }
}
