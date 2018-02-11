<?php

namespace DesignPatterns\Behavioral\Observer;

/**
 * Order is a Subject that is observed by multiple Observers like
 * - LoggerObserver
 * - PersisterObserver
 * - SendEmailObserver
 *
 * Whenever Order changes it's state it notifies all attached Observers.
 * Note that Order knows nothing about its Observers but the fact that they implements \SplObserver interface.
 * This allows better reusability both the Order class and observers
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
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

    /**
     * Order constructor.
     */
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

    /**
     * The first step Order lifecycle. Changes the state of the order to "INITIALIZED"
     */
    public function initialize()
    {
        $this->state = "INITIALIZED";
        $this->notify();
    }

    /**
     * The second step Order lifecycle. Changes the state of the order to "FINALIZED"
     */
    public function finalize()
    {
        $this->state = "FINALIZED";
        $this->notify();
    }
}
