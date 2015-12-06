<?php

namespace DesignPatterns\Behavioral\Command\Commands;

class LeftCommand extends MoveCommand
{
    public function move()
    {
        $this->field->toLeft();
    }

    public function moveBack()
    {
        $this->field->toRight();
    }
}
