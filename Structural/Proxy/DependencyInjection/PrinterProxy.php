<?php

namespace DesignPatterns\Structural\Proxy\DependencyInjection;

use DesignPatterns\Structural\Proxy\Printer;

/**
 * Proxy for @see Printer service. It performs lazy-loading of a printer object.
 * It instantiates a printer object only when a call must be forwarded to it.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class PrinterProxy extends Printer
{
    /**
     * @var ServiceLocator
     */
    private $serviceLocator;

    /**
     * @var Printer
     */
    private $printer;

    /**
     * @param ServiceLocator $serviceLocator
     */
    public function __construct(ServiceLocator $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
    }

    /**
     * Instantiate @see $printer property with real printer object.
     */
    private function init()
    {
        // Retrieve a scanner from the service locator.
        // It may be a proxy of the scanner.
        $scanner = $this->serviceLocator->getScanner();

        $this->printer = new Printer($scanner);
    }

    /**
     * @inheritdoc
     */
    public function printDocument($document)
    {
        // Assure that the printer is initialized.
        if (!$this->printer) {
            $this->init();
        }

        // Forward call to real printer object.
        return $this->printer->printDocument($document);
    }

    /**
     * @inheritdoc
     */
    public function printScannedDocument($document)
    {
        // Assure that the printer is initialized.
        if (!$this->printer) {
            $this->init();
        }

        // Forward call to real printer object.
        return $this->printer->printScannedDocument($document);
    }
}
