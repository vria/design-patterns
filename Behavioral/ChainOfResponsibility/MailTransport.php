<?php

namespace DesignPatterns\Behavioral\ChainOfResponsibility;

/**
 * Abstract mail transport that defines an interface for delivering parcels.
 * It implements the successor link.
 *
 * @author Vlad Riabchenko <vriabchenko@webnet.fr>
 */
abstract class MailTransport
{
    /**
     * Reference to the other mail transport. If the current transport cannot
     * deliver a @see Parcel then it will be passed to this successor.
     *
     * @var MailTransport|null
     */
    private $successor;

    /**
     * Set a successor.
     * A transport may not have a successor transport. So the calling of this
     * method is optional.
     *
     * @param MailTransport $successor
     */
    public function setSuccessor(MailTransport $successor)
    {
        $this->successor = $successor;
    }

    /**
     * Default logic of the abstract transport is to pass the responsibility to
     * the successor.
     * Concrete transports (air, railway, truck) will call this method in case
     * if they are not able to deliver a parcel. If there is no other transport
     * to deliver a parcel then an exception is thrown notifying a user that
     * his parcel is out of weight and/or distance.
     *
     * @param Parcel $parcel
     *
     * @return string
     *
     * @throws \RuntimeException There is no other transports available.
     */
    public function deliver(Parcel $parcel)
    {
        // There is no transport methods left.
        if (!$this->successor) {
            throw new \RuntimeException('Sorry. We cannot deliver your parcel');
        }

        return $this->successor->deliver($parcel);
    }
}
