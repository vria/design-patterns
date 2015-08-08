<?php

namespace DesignPatterns\Behavioral\Command;

class Game
{
    /**
     * @var Point
     */
    public $player;

    /**
     * @var Point
     */
    public $goal;

    /**
     * @var array
     */
    private $keyboard;

    /**
     * @var array
     */
    private $menu;

    /**
     * @param Point $player
     * @param Point $goal
     */
    public function __construct(Point $player, Point $goal)
    {
        $this->player = $player;
        $this->goal = $goal;
    }

    /**
     * @return bool
     */
    public function checkGoal()
    {
        return $this->player->equalTo($this->goal);
    }

    /**
     * @param string $key
     * @param Command $command
     */
    public function addKey($key, $command)
    {
        $this->keyboard[$key] = $command;
    }

    /**
     * @param string $key
     */
    public function pressKey($key)
    {
        $this->keyboard[$key]->move();
    }

    /**
     * @param string $menuItem
     * @param Command $command
     */
    public function addMenuItem($menuItem, $command)
    {
        $this->menu[$menuItem] = $command;
    }

    /**
     * @param string $menuItem
     */
    public function pressMenuItem($menuItem)
    {
        $this->menu[$menuItem]->move();
    }
} 