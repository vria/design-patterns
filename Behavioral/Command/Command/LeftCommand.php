<?php

namespace DesignPatterns\Behavioral\Command\Command;

/**
 * Move to left. It corresponds to `ConcreteCommand` in the Command pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class LeftCommand extends MoveCommand
{
    /**
     * @inheritdoc
     */
    public function move()
    {
        $this->field->toLeft();
    }

    /**
     * @inheritdoc
     */
    public function moveBack()
    {
        $this->field->toRight();
    }
}
