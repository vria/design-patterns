<?php

namespace DesignPatterns\Structural\Decorator;


/**
 * Class LogMessageWithDateDecorator
 * @package DesignPatterns\Structural\Decorator
 */
class LogMessageWithDateDecorator extends LogMessageDecorator
{
    /**
     * @var \DateTime
     */
    private $datetime;

    /**
     * @param LogMessageInterface $message
     * @param \DateTime $datetime
     */
    public function __construct(LogMessageInterface $message, \DateTime $datetime)
    {
        parent::__construct($message);
        $this->datetime = $datetime;
    }

    /**
     * @inheritdoc
     */
    public function log()
    {
        echo $this->datetime->format("d/m/Y H:i:s") . ": ";
        parent::log();
    }
}
