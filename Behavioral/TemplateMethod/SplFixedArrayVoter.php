<?php

namespace DesignPatterns\Behavioral\TemplateMethod;


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
        return array('toArray');
    }

    /**
     * @param $object
     * @param $attribute
     * @return bool
     */
    protected function hasAccess($object, $attribute)
    {
        /* @var $object \SplFixedArray */
        return $object->count() > 0;
    }
}
