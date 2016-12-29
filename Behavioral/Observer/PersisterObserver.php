<?php

namespace DesignPatterns\Behavioral\Observer;

/**
 * PersisterObserver is a listener that reacts to any state change of Order object and "persists" it's new state
 */
class PersisterObserver implements \SplObserver
{
    /**
     * @inheritdoc
     */
    public function update(\SplSubject $subject)
    {
        if ($subject instanceof Order) {
            echo "Persisted order in state of {$subject->getState()}/";
        }
    }
}
