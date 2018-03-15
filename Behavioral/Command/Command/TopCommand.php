<?php

namespace DesignPatterns\Behavioral\Command\Command;

/**
 * Move to top.
 *
 * It corresponds to `ConcreteCommand` in the Command pattern.
 */
class TopCommand extends MoveCommand
{
    /**
     * @inheritdoc
     */
    public function move()
    {
        $this->field->toTop();
    }

    /**
     * @inheritdoc
     */
    public function moveBack()
    {
        $this->field->toBottom();
    }
}
