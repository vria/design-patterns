<?php

namespace DesignPatterns\Behavioral\Observer;

/**
 * LoggerObserver is a listener that reacts to any state change of Order object and logs it's new state.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class LoggerObserver implements \SplObserver
{
    /**
     * @inheritdoc
     */
    public function update(\SplSubject $subject)
    {
        if ($subject instanceof Order) {
            echo "Order state is {$subject->getState()}/";
        }
    }
}
