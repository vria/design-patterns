<?php

namespace DesignPatterns\Behavioral\Visitor;

use DesignPatterns\Behavioral\Visitor\FormFields\ChoiceField;
use DesignPatterns\Behavioral\Visitor\FormFields\IntegerField;
use DesignPatterns\Behavioral\Visitor\FormFields\EmailField;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
interface Visitor
{
    /**
     * @param EmailField $emailField
     */
    public function visitEmail(EmailField $emailField);

    /**
     * @param IntegerField $integerField
     */
    public function visitInteger(IntegerField $integerField);

    /**
     * @param ChoiceField $choiceField
     */
    public function visitChoice(ChoiceField $choiceField);
}
