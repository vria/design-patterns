<?php

namespace DesignPatterns\Structural\Decorator;


/**
 * Class LogMessageDecorator
 * @package DesignPatterns\Structural\Decorator
 */
class LogMessageDecorator implements LogMessageInterface
{
    /**
     * @var LogMessageInterface
     */
    protected $message;

    /**
     * @param LogMessageInterface $message
     */
    public function __construct(LogMessageInterface $message)
    {
        $this->message = $message;
    }

    /**
     * @inheritdoc
     */
    public function log()
    {
        $this->message->log();
    }
}
