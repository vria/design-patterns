<?php

namespace DesignPatterns\Behavioral\Observer;


use SplSubject;

class OrderEvolvedObserver implements \SplObserver
{
    /**
     * @inheritdoc
     */
    public function update(SplSubject $subject)
    {
        if ($subject instanceof Order) {
            echo "New order state is " . $subject->getState();
        }
    }
}
