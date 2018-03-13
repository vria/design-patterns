<?php

namespace DesignPatterns\Structural\Decorator\Test;

use DesignPatterns\Structural\Decorator\Logger;
use DesignPatterns\Structural\Decorator\LoggerWithDateDecorator;
use DesignPatterns\Structural\Decorator\LoggerWithErrorLevelDecorator;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class DecoratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Logger
     */
    private $logger;

    public function setUp()
    {
        $this->logger = new Logger();
    }

    public function testLog()
    {
        $this->logger->log('message from testLog');

        $this->expectOutputString('message from testLog');
    }

    public function testLoggerWithDateDecorator()
    {
        $logger = new LoggerWithDateDecorator($this->logger, 'd/m/Y H:i');
        $logger->log('message from testLoggerWithDateDecorator');

        $this->expectOutputString(date("d/m/Y H:i") . ": message from testLoggerWithDateDecorator");
    }

    public function testLoggerWithErrorLevel()
    {
        $logger = new LoggerWithErrorLevelDecorator($this->logger, LoggerWithErrorLevelDecorator::ERROR);
        $logger->log('message from testLoggerWithErrorLevel');

        $this->expectOutputString("<span style='color: #ff0000'>message from testLoggerWithErrorLevel</span>");
    }

    public function testLoggerWithDateDecoratorAndErrorLevel()
    {
        $logger = new LoggerWithDateDecorator($this->logger, 'd/m/Y H:i');
        $logger = new LoggerWithErrorLevelDecorator($logger, LoggerWithErrorLevelDecorator::INFO);
        $logger->log('message from testLoggerWithDateDecoratorAndErrorLevel');

        $this->expectOutputString("<span style='color: #0000ff'>" . date('d/m/Y H:i') . ": message from testLoggerWithDateDecoratorAndErrorLevel</span>");
    }
}
