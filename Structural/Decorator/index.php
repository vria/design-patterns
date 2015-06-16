<?php

require '../../vendor/autoload.php';

use DesignPatterns\Structural\Decorator\LogMessage;
use DesignPatterns\Structural\Decorator\LogMessageWithDateDecorator;
use DesignPatterns\Structural\Decorator\LogMessageWithErrorLevelDecorator;

$message = new LogMessageWithErrorLevelDecorator(
               new LogMessageWithDateDecorator(
                   new LogMessage("Fatal error exception"), new \DateTime()),
               LogMessageWithErrorLevelDecorator::ERROR
           );

$message->log();