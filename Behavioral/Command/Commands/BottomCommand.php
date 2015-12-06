<?php

namespace DesignPatterns\Behavioral\Command\Commands;

class BottomCommand extends MoveCommand
{
    public function move()
    {
        $this->field->toBottom();
    }

    public function moveBack()
    {
        $this->field->toTop();
    }
}
