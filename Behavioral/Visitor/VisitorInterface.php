<?php

namespace DesignPatterns\Behavioral\Visitor;

use DesignPatterns\Behavioral\Visitor\FormFields\CheckboxesField;
use DesignPatterns\Behavioral\Visitor\FormFields\IntegerField;
use DesignPatterns\Behavioral\Visitor\FormFields\EmailField;

/**
 * Declares a visit operation for each form field. These form field are not required to extend @see FormField,
 * visitor pattern doesn't require their class hierarchies to be related.
 * The method's name and signature determines the class that sends the visit request.
 *
 * It corresponds to `Visitor` in the Strategy pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
interface VisitorInterface
{
    /**
     * Visit @see EmailField object
     *
     * @param EmailField $emailField
     */
    public function visitEmail(EmailField $emailField);

    /**
     * Visit @see IntegerField object
     *
     * @param IntegerField $integerField
     */
    public function visitInteger(IntegerField $integerField);

    /**
     * Visit @see CheckboxesField object
     *
     * @param CheckboxesField $checkboxesField
     */
    public function visitCheckboxes(CheckboxesField $checkboxesField);
}
