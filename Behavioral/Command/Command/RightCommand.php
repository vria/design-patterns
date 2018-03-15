<?php

namespace DesignPatterns\Behavioral\Command\Command;

/**
 * Move to right.
 *
 * It corresponds to `ConcreteCommand` in the Command pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class RightCommand extends MoveCommand
{
    /**
     * @inheritdoc
     */
    public function move()
    {
        $this->field->toRight();
    }

    /**
     * @inheritdoc
     */
    public function moveBack()
    {
        $this->field->toLeft();
    }
}
