<?php

namespace DesignPatterns\Behavioral\Command\Commands;

use DesignPatterns\Behavioral\Command\Command;
use DesignPatterns\Behavioral\Command\Field;

abstract class MoveCommand implements Command
{
    /**
     * @var Field
     */
    protected $field;

    /**
     * @param Field $field
     */
    function __construct(Field $field)
    {
        $this->field = $field;
    }
}
