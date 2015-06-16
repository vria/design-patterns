<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 17.06.2015
 * Time: 0:27
 */

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