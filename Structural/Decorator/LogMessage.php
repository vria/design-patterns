<?php

namespace DesignPatterns\Structural\Decorator;


class LogMessage implements LogMessageInterface
{
    private $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function log()
    {
        echo $this->message . "<br>";
    }
}