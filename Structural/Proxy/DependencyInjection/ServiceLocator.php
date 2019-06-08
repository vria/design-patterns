<?php

namespace DesignPatterns\Structural\Proxy\DependencyInjection;
use DesignPatterns\Structural\Proxy\Printer;
use DesignPatterns\Structural\Proxy\Scanner;

/**
 * Service locator knows how to create services.
 * Usually it knows the dependencies of each service and knows how to provide
 * them. This is called "dependency injection".
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class ServiceLocator
{
    /**
     * Stores already instantiated services.
     *
     * @var array
     */
    private $services = [];

    /**
     * Get an instance of a printer.
     *
     * @return Printer
     */
    public function getPrinter()
    {
        // Create a printer proxy if it is not exist.
        if (!array_key_exists(Printer::class, $this->services)) {
            $this->services[Printer::class] = new PrinterProxy($this);
        }

        return $this->services[Printer::class];
    }

    /**
     * Get an instance of a scanner.
     *
     * @return Scanner
     */
    public function getScanner()
    {
        // Create a scanner proxy if it is not exist.
        if (!array_key_exists(Scanner::class, $this->services)) {
            $this->services[Scanner::class] = new ScannerProxy($this);
        }

        return $this->services[Scanner::class];
    }
}
