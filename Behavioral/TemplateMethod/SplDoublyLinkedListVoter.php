<?php

namespace DesignPatterns\Behavioral\TemplateMethod;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class SplDoublyLinkedListVoter extends AbstractVoter
{
    /**
     * @return string
     */
    protected function supportedClass()
    {
        return 'SplDoublyLinkedList';
    }

    /**
     * @return array
     */
    protected function supportedAttributes()
    {
        return array('shift', 'unshift', 'pop', 'push');
    }

    /**
     * @param \SplDoublyLinkedList $object
     * @param $attribute
     *
     * @return bool
     */
    protected function hasAccess($object, $attribute)
    {
        if ($attribute == "unshift" || $attribute == "push") {
            return true;
        }

        if ($object->count() > 0 && ($attribute == "shift" || $attribute == "pop") ) {
            return true;
        }

        return false;
    }
}
