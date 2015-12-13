<?php

namespace DesignPatterns\Structural\Decorator;


/**
 * Class LogMessageWithErrorLevelDecorator
 * @package DesignPatterns\Structural\Decorator
 */
class LogMessageWithErrorLevelDecorator extends LogMessageDecorator
{
    const ERROR = "f00";
    const WARNING = "fb0";
    const INFO = "00f";

    /**
     * @var string
     */
    private $errorLevel;

    /**
     * @param LogMessageInterface $message
     * @param string $errorLevel
     */
    public function __construct(LogMessageInterface $message, $errorLevel = self::INFO)
    {
        parent::__construct($message);
        $this->errorLevel = $errorLevel;
    }

    /**
     * @inheritdoc
     */
    public function log()
    {
        echo "<span style='color: {$this->errorLevel}'>";

        parent::log();

        echo "</span>";
    }
}
