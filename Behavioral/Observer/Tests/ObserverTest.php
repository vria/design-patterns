<?php

namespace DesignPatterns\Behavioral\Observer\Tests;

use DesignPatterns\Behavioral\Observer\Order;
use DesignPatterns\Behavioral\Observer\LoggerObserver;
use DesignPatterns\Behavioral\Observer\PersisterObserver;
use DesignPatterns\Behavioral\Observer\SendEmailObserver;

class ObserverTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Order
     */
    private $order;

    protected function setUp()
    {
        $this->order = new Order();
        $this->order->attach(new LoggerObserver());
        $this->order->attach(new PersisterObserver());
        $this->order->attach(new SendEmailObserver());
    }

    public function testInitialize()
    {
        $this->order->initialize();
        $this->expectOutputString("Order state is INITIALIZED/Persisted order in state of INITIALIZED/");
    }

    public function testFinalized()
    {
        $this->order->initialize();
        $this->order->finalize();
        $this->expectOutputString("Order state is INITIALIZED/Persisted order in state of INITIALIZED/"
            . "Order state is FINALIZED/Persisted order in state of FINALIZED/"
            . "You finalized your order. We're pleased to address you an e-mail/");
    }
}
