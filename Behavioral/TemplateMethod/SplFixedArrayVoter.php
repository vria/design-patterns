<?php

namespace DesignPatterns\Behavioral\TemplateMethod;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class SplFixedArrayVoter extends AbstractVoter
{
    /**
     * @return string
     */
    protected function supportedClass()
    {
        return 'SplFixedArray';
    }

    /**
     * @return array
     */
    protected function supportedAttributes()
    {
        return ['toArray'];
    }

    /**
     * @param \SplFixedArray $object
     * @param $attribute
     *
     * @return bool
     */
    protected function hasAccess($object, $attribute)
    {
        return $object->count() > 0;
    }
}
