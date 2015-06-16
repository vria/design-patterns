<?php

namespace DesignPatterns\Structural\Decorator;


abstract class LogMessageDecorator implements LogMessageInterface
{
    protected $message;

    public function __construct(LogMessageInterface $message)
    {
        $this->message = $message;
    }

    public function log()
    {
        $this->message->log();
    }
}