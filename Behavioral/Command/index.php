<?php

require '../../vendor/autoload.php';

use DesignPatterns\Behavioral\Command\Game;
use DesignPatterns\Behavioral\Command\Point;
use DesignPatterns\Behavioral\Command\Commands\LeftCommand;
use DesignPatterns\Behavioral\Command\Commands\RightCommand;
use DesignPatterns\Behavioral\Command\Commands\TopCommand;
use DesignPatterns\Behavioral\Command\Commands\BottomCommand;

$game = new Game(new Point(0, 0), new Point(1, 2));
$game->addKey('left', new LeftCommand($game));
$game->addKey('right', new RightCommand($game));
$game->addKey('top', new TopCommand($game));
$game->addKey('bottom', new BottomCommand($game));

$game->pressKey('right');
var_dump($game->player, $game->checkGoal());
echo "------------------------";

$game->pressKey('top');
var_dump($game->player, $game->checkGoal());
echo "------------------------";

$game->pressKey('top');
var_dump($game->player, $game->checkGoal());
