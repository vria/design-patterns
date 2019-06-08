<?php

namespace DesignPatterns\Structural\Proxy\DependencyInjection;

use DesignPatterns\Structural\Proxy\Scanner;

/**
 * Proxy for @see Scanner service. It performs lazy-loading of a scanner object.
 * It instantiates a scanner object only when a call must be forwarded to it.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class ScannerProxy extends Scanner
{
    /**
     * @var ServiceLocator
     */
    private $serviceLocator;

    /**
     * @var Scanner
     */
    private $scanner;

    /**
     * @param ServiceLocator $serviceLocator
     */
    public function __construct(ServiceLocator $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
    }

    /**
     * Instantiate @see $scanner property with real scanner object.
     */
    private function init()
    {
        // Retrieve a printer from the service locator.
        // It may be a proxy of the printer.
        $printer = $this->serviceLocator->getPrinter();

        $this->scanner = new Scanner($printer);
    }

    /**
     * @inheritdoc
     */
    public function scanDocument($document)
    {
        // Assure that the scanner is initialized.
        if (!$this->scanner) {
            $this->init();
        }

        // Forward call to real scanner object.
        return $this->scanner->scanDocument($document);
    }

    /**
     * @inheritdoc
     */
    public function scanPrintedDocument($document)
    {
        // Assure that the scanner is initialized.
        if (!$this->scanner) {
            $this->init();
        }

        // Forward call to real scanner object.
        return $this->scanner->scanPrintedDocument($document);
    }
}
