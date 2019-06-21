<?php

namespace DesignPatterns\Behavioral\ChainOfResponsibility\Test;

use DesignPatterns\Behavioral\ChainOfResponsibility\AirMail;
use DesignPatterns\Behavioral\ChainOfResponsibility\Parcel;
use DesignPatterns\Behavioral\ChainOfResponsibility\RailwayMail;
use DesignPatterns\Behavioral\ChainOfResponsibility\TruckMail;
use PHPUnit\Framework\TestCase;

/**
 * @author Vlad Riabchenko <vriabchenko@webnet.fr>
 */
class MailTransportTest extends TestCase
{
    public function testTruck()
    {
        $parcel = new Parcel(30, 300);
        $transport = $this->getTransport();

        $this->assertEquals(
            'Delivered by post truck in 3 days',
            $transport->deliver($parcel)
        );
    }

    public function testRailway()
    {
        $parcel = new Parcel(990, 300);
        $transport = $this->getTransport();

        $this->assertEquals(
            'Delivered by railway in 1 day',
            $transport->deliver($parcel)
        );
    }

    public function testAir()
    {
        $parcel = new Parcel(1, 1350);
        $transport = $this->getTransport();

        $this->assertEquals(
            'Delivered by airmail in 2 days',
            $transport->deliver($parcel)
        );
    }

    public function testCannotDeliver()
    {
        $parcel = new Parcel(2000, 1350);
        $transport = $this->getTransport();

        try {
            $transport->deliver($parcel);
        } catch (\RuntimeException $e) {
            $this->assertEquals('Sorry. We cannot deliver your parcel', $e->getMessage());

            return;
        }

        $this->fail();
    }

    /**
     * Get a default transport setting: truck -> railway -> air.
     *
     * @return TruckMail
     */
    private function getTransport()
    {
        $truck = new TruckMail();
        $railway = new RailwayMail();
        $air = new AirMail();

        $truck->setSuccessor($railway);
        $railway->setSuccessor($air);

        return $truck;
    }
}
