<?php

namespace DesignPatterns\Behavioral\Observer\Tests;

use DesignPatterns\Behavioral\Observer\Order;
use DesignPatterns\Behavioral\Observer\OrderEvolvedObserver;
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
        $this->order->attach(new OrderEvolvedObserver());
        $this->order->attach(new SendEmailObserver());
    }

    public function testInitialize()
    {
        $this->order->initialize();
        $this->expectOutputString("New order state is INITIALIZED");
    }

    public function testFinalized()
    {
        $this->order->initialize();
        $this->order->finalize();
        $this->expectOutputString("New order state is INITIALIZEDNew order state is FINALIZEDYou finalized your order. We're pleased to address you an e-mail");
    }
}
