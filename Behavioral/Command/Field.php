<?php

namespace DesignPatterns\Behavioral\Command;


class Field
{
    /**
     * @var Point
     */
    private $player;

    /**
     * @var Point
     */
    private $goal;

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
     * @return Point
     */
    public function getGoal()
    {
        return $this->goal;
    }

    /**
     * @return Point
     */
    public function getPlayer()
    {
        return $this->player;
    }

    /**
     * @return $this
     */
    public function toLeft()
    {
        $this->player->x--;

        return $this;
    }

    /**
     * @return $this
     */
    public function toRight()
    {
        $this->player->x++;

        return $this;
    }

    /**
     * @return $this
     */
    public function toTop()
    {
        $this->player->y--;

        return $this;
    }

    /**
     * @return $this
     */
    public function toBottom()
    {
        $this->player->y++;

        return $this;
    }
}
