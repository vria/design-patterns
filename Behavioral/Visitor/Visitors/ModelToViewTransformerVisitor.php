<?php

namespace DesignPatterns\Behavioral\Visitor\Visitors;

use DesignPatterns\Behavioral\Visitor\FormFields\CheckboxesField;
use DesignPatterns\Behavioral\Visitor\FormFields\EmailField;
use DesignPatterns\Behavioral\Visitor\FormFields\IntegerField;
use DesignPatterns\Behavioral\Visitor\VisitorInterface;

/**
 * Visitor that transforms model value to view value.
 *
 * It corresponds to `ConcreteVisitor` in the Strategy pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class ModelToViewTransformerVisitor implements VisitorInterface
{
    /**
     * @param EmailField $emailField
     */
    public function visitEmail(EmailField $emailField)
    {
        // Set email view value as the model value is.
        $emailField->setViewValue($emailField->getValue());
    }

    /**
     * @param IntegerField $integerField
     */
    public function visitInteger(IntegerField $integerField)
    {
        // Convert integer model value to string view value.
        $integerField->setViewValue(strval($integerField->getValue()));
    }

    /**
     * @param CheckboxesField $checkboxesField
     */
    public function visitCheckboxes(CheckboxesField $checkboxesField)
    {
        $choices = $checkboxesField->getChoices();
        $viewValues = [];

        // For each model value find a corresponding view value and add it to the array of view values.
        foreach ($checkboxesField->getValue() as $value) {
            $viewValues[] = array_search($value, $choices);
        }

        $checkboxesField->setViewValue($viewValues);
    }
}
