<?php

namespace DesignPatterns\Behavioral\TemplateMethod;

/**
 * Voter to check if the methods of @see \SplDoublyLinkedList could be called.
 *
 * It corresponds to `ConcreteClass` in the Strategy pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class SplDoublyLinkedListVoter extends AbstractVoter
{
    /**
     * @inheritdoc
     */
    protected function supportsObject($object)
    {
        return $object instanceof \SplDoublyLinkedList;
    }

    /**
     * @inheritdoc
     */
    protected function supportsAttribute($attribute)
    {
        return in_array($attribute, ['shift', 'unshift', 'pop', 'push']);
    }

    /**
     * @inheritdoc
     */
    protected function hasAccess($object, $attribute)
    {
        /** @var $object \SplDoublyLinkedList */

        // Always wllow to push and unshift
        if ($attribute == "unshift" || $attribute == "push") {
            return true;
        }

        // Allow to shift and pop only when the double linked list is not empty
        if (($attribute == "shift" || $attribute == "pop") && $object->count() > 0) {
            return true;
        }

        return false;
    }
}
