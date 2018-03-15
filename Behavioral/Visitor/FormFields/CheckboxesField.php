<?php

namespace DesignPatterns\Behavioral\Visitor\FormFields;

use DesignPatterns\Behavioral\Visitor\FormField;
use DesignPatterns\Behavioral\Visitor\VisitorInterface;

/**
 * A group of checkboxes. The value and a the view value are arrays.
 *
 * It corresponds to `ConcreteElement` in the Strategy pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class CheckboxesField extends FormField
{
    /**
     * Possible choices, the key of this array is a possible view value while the value is a possible model value:
     *
     * ```
     * {
     *     'Car'   => Vehicle::CAR,
     *     'Bike'  => Vehicle::BIKE,
     *     'Plane' => Vehicle::PLANE
     * }
     * ```
     *
     * @var array
     */
    private $choices;

    /**
     * Accept a visitor that will transform or validate this choice field instance.
     *
     * @param VisitorInterface $visitor
     */
    public function accept(VisitorInterface $visitor)
    {
        $visitor->visitCheckboxes($this);
    }

    /**
     * Get possible choices.
     *
     * @return array
     */
    public function getChoices()
    {
        return $this->choices;
    }

    /**
     * Set possible choices.
     *
     * @param array $choices
     */
    public function setChoices($choices)
    {
        $this->choices = $choices;
    }
}
