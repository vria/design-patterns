<?php

namespace DesignPatterns\Behavioral\ChainOfResponsibility;

/**
 * A concrete handler.
 * Railway mail is for heavy parcels and relatively long distances.
 *
 * @author Vlad Riabchenko <vriabchenko@webnet.fr>
 */
class RailwayMail extends MailTransport
{
    /**
     * @inheritdoc
     */
    public function deliver(Parcel $parcel)
    {
        if ($parcel->getDistance() < 1000 && $parcel->getWeight() < 1000) {
            return 'Delivered by railway in 1 day';
        }

        return parent::deliver($parcel);
    }
}
