<?php

namespace DesignPatterns\Behavioral\Observer;

/**
 * SendEmailObserver is a listener that reacts to state change of Order object.
 * When Order is finalized it "sends" an email
 */
class SendEmailObserver implements \SplObserver
{
    /**
     * @inheritdoc
     */
    public function update(\SplSubject $subject)
    {
        if ($subject instanceof Order && $subject->getState() == "FINALIZED") {
            echo "You finalized your order. We're pleased to address you an e-mail/";
        }
    }
}
