<?php

namespace DesignPatterns\Behavioral\Command\Commands;

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
