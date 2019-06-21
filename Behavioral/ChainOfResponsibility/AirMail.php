<?php

namespace DesignPatterns\Behavioral\ChainOfResponsibility;

/**
 * A concrete handler.
 * Airmail is for lightweight parcels and long distances.
 *
 * @author Vlad Riabchenko <vriabchenko@webnet.fr>
 */
class AirMail extends MailTransport
{
    /**
     * @inheritdoc
     */
    public function deliver(Parcel $parcel)
    {
        if ($parcel->getDistance() > 500 && $parcel->getWeight() < 20) {
            return 'Delivered by airmail in 2 days';
        }

        return parent::deliver($parcel);
    }
}
