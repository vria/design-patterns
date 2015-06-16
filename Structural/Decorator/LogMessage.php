<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 17.06.2015
 * Time: 0:22
 */

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