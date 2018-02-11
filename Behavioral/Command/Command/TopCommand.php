<?php

namespace DesignPatterns\Behavioral\Command\Command;

/**
 * Move to top
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
