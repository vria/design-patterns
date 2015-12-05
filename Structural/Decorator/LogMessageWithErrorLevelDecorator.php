<?php

namespace DesignPatterns\Structural\Decorator;

class LogMessageWithErrorLevelDecorator extends LogMessageDecorator
{
    const ERROR = "f00";
    const WARNING = "fb0";
    const INFO = "00f";

    private $errorLevel;

    public function __construct(LogMessageInterface $message, $errorLevel = self::INFO)
    {
        parent::__construct($message);
        $this->errorLevel = $errorLevel;
    }

    public function log()
    {
        echo "<span style='color: {$this->errorLevel}'>";
        parent::log();
        echo "<span>";
    }
}
