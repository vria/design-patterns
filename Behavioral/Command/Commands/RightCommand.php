<?php

namespace DesignPatterns\Behavioral\Command\Commands;

/**
 * Move to right
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
