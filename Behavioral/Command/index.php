<?php

require '../../vendor/autoload.php';

use DesignPatterns\Behavioral\Command\GameApp;
use DesignPatterns\Behavioral\Command\Point;
use DesignPatterns\Behavioral\Command\Commands\LeftCommand;
use DesignPatterns\Behavioral\Command\Commands\RightCommand;
use DesignPatterns\Behavioral\Command\Commands\TopCommand;
use DesignPatterns\Behavioral\Command\Commands\BottomCommand;

$game = new GameApp();
$game->newGame(new Point(0, 0), new Point(1, 2));

$field = $game->getField();

$leftCommand = new LeftCommand($field);
$rightCommand = new RightCommand($field);
$topCommand = new TopCommand($field);
$bottomCommand = new BottomCommand($field);

$game->addKey('left', $leftCommand)
     ->addKey('right', $rightCommand)
     ->addKey('top', $topCommand)
     ->addKey('bottom', $bottomCommand);

echo "----- TO RIGHT -----";
$game->pressKey('right');
var_dump($field->getPlayer(), $game->checkGoal());

echo "----- TO RIGHT -----";
$game->pressKey('right');
var_dump($field->getPlayer(), $game->checkGoal());

echo "------- BACK -------";
$game->undo();
var_dump($field->getPlayer(), $game->checkGoal());

echo "---- TO BOTTOM ----";
$game->pressKey('bottom');
var_dump($field->getPlayer(), $game->checkGoal());

echo "---- TO BOTTOM ----";
$game->pressKey('bottom');
var_dump($field->getPlayer(), $game->checkGoal());
