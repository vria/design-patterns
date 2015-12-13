<?php

namespace DesignPatterns\Structural\Decorator;


/**
 * Class LogMessage
 * @package DesignPatterns\Structural\Decorator
 */
class LogMessage implements LogMessageInterface
{
    /**
     * @var string
     */
    private $message;

    /**
     * @param string $message
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * @inheritdoc
     */
    public function log()
    {
        echo $this->message;
    }
}
