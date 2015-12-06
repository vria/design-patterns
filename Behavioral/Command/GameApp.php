<?php

namespace DesignPatterns\Behavioral\Command;

class GameApp
{
    /**
     * @var array
     */
    private $keyboard;

    /**
     * @var Field
     */
    private $field;

    /**
     * @var array
     */
    private $requests;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->keyboard = array();
        $this->menu = array();
        $this->requests = array();
    }

    /**
     * @param Point $playerPos
     * @param Point $goalPos
     */
    public function newGame(Point $playerPos, Point $goalPos)
    {
        $this->field = new Field($playerPos, $goalPos);
        $this->requests = array();
    }

    /**
     * @return Field
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * @return bool
     */
    public function checkGoal()
    {
        return $this->field->getPlayer()->equalTo($this->field->getGoal());
    }

    /**
     * @param $key
     * @param Command $command
     * @return $this
     */
    public function addKey($key, Command $command)
    {
        $this->keyboard[$key] = $command;

        return $this;
    }

    /**
     * @param string $key
     */
    public function pressKey($key)
    {
        $this->requests[] = $key;
        $this->keyboard[$key]->move();
    }

    /**
     * @return $this
     */
    public function undo()
    {
        $lastRequest = array_pop($this->requests);

        $this->keyboard[$lastRequest]->moveBack();
    }
}
