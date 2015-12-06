<?php

namespace DesignPatterns\Behavioral\Command\Commands;

class RightCommand extends MoveCommand
{
    public function move()
    {
        $this->field->toRight();
    }

    public function moveBack()
    {
        $this->field->toLeft();
    }
}
