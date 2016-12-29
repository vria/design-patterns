<?php

namespace DesignPatterns\Behavioral\ObserverSPL\Tests;

use DesignPatterns\Behavioral\ObserverSPL\Order;
use DesignPatterns\Behavioral\ObserverSPL\OrderEvolvedObserver;
use DesignPatterns\Behavioral\ObserverSPL\SendEmailObserver;

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
