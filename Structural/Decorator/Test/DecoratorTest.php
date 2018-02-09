<?php

namespace DesignPatterns\Structural\Decorator\Test;

use DesignPatterns\Structural\Decorator\LogMessage;
use DesignPatterns\Structural\Decorator\LogMessageWithDateDecorator;
use DesignPatterns\Structural\Decorator\LogMessageWithErrorLevelDecorator;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class DecoratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var LogMessage
     */
    private $message;

    public function setUp()
    {
        $this->message = new LogMessage("some message to log");
    }

    public function testLogMessage()
    {
        $this->expectOutputString("some message to log");

        $this->message->log();
    }

    public function testWithDate()
    {
        $now = new \DateTime();
        $message = new LogMessageWithDateDecorator($this->message, $now);

        $this->expectOutputString($now->format("d/m/Y H:i:s") . ": some message to log");

        $message->log();
    }

    public function testWithErrorLevel()
    {
        $message = new LogMessageWithErrorLevelDecorator($this->message, LogMessageWithErrorLevelDecorator::ERROR);

        $this->expectOutputString("<span style='color: " . LogMessageWithErrorLevelDecorator::ERROR . "'>some message to log</span>");

        $message->log();
    }

    public function testWithErrorLevelAndDate()
    {
        $now = new \DateTime();
        $message = new LogMessageWithDateDecorator($this->message, $now);

        $message = new LogMessageWithErrorLevelDecorator($message, LogMessageWithErrorLevelDecorator::ERROR);

        $this->expectOutputString("<span style='color: " . LogMessageWithErrorLevelDecorator::ERROR
            . "'>" . $now->format("d/m/Y H:i:s") . ": some message to log</span>");

        $message->log();
    }
}
