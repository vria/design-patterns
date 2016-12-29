<?php

namespace DesignPatterns\Behavioral\ObserverSPL;


use SplSubject;

class SendEmailObserver implements \SplObserver
{
    /**
     * @inheritdoc
     */
    public function update(SplSubject $subject)
    {
        if ($subject instanceof Order && $subject->getState() == "FINALIZED") {
            echo "You finalized your order. We're pleased to address you an e-mail";
        }
    }
}
