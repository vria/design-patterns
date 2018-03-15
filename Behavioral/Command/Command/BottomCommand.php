<?php

namespace DesignPatterns\Behavioral\Command\Command;

/**
 * Move to bottom.
 *
 * It corresponds to `ConcreteCommand` in the Command pattern.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class BottomCommand extends MoveCommand
{
    /**
     * @inheritdoc
     */
    public function move()
    {
        $this->field->toBottom();
    }

    /**
     * @inheritdoc
     */
    public function moveBack()
    {
        $this->field->toTop();
    }
}
