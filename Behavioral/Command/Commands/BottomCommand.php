<?php

namespace DesignPatterns\Behavioral\Command\Commands;

/**
 * Move to bottom
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
