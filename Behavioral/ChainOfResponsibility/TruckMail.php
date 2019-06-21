<?php

namespace DesignPatterns\Behavioral\ChainOfResponsibility;

/**
 * A concrete handler.
 * Truck mail is for medium parcels and medium distances.
 *
 * @author Vlad Riabchenko <vriabchenko@webnet.fr>
 */
class TruckMail extends MailTransport
{
    /**
     * @inheritdoc
     */
    public function deliver(Parcel $parcel)
    {
        if ($parcel->getDistance() < 400 && $parcel->getWeight() < 350) {
            return 'Delivered by post truck in 3 days';
        }

        return parent::deliver($parcel);
    }
}
