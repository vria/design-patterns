<?php

namespace DesignPatterns\Structural\Decorator;


class LogMessageWithDateDecorator extends LogMessageDecorator
{
    private $datetime;

    public function __construct(LogMessageInterface $message, \DateTime $datetime)
    {
        parent::__construct($message);
        $this->datetime = $datetime;
    }

    public function log()
    {
        echo $this->datetime->format("d/m/Y H:i:s") . ": ";
        parent::log();
    }
} 