<?php

namespace DesignPatterns\Behavioral\Observer;


class Order implements \SplSubject
{
    /**
     * @var \SplObjectStorage
     */
    private $observers;

    /**
     * @var string
     */
    private $state;

    public function __construct()
    {
        $this->observers = new \SplObjectStorage();
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @inheritdoc
     */
    public function attach(\SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    /**
     * @inheritdoc
     */
    public function detach(\SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    /**
     * @inheritdoc
     */
    public function notify()
    {
        foreach($this->observers as $observer) {
            /* @var $observer \SplObserver */
            $observer->update($this);
        }
    }

    public function initialize()
    {
        $this->state = "INITIALIZED";
        $this->notify();
    }

    public function finalize()
    {
        $this->state = "FINALIZED";
        $this->notify();
    }
}
