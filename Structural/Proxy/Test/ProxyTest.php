<?php

namespace DesignPatterns\Structural\Proxy\Test;

use DesignPatterns\Structural\Proxy\DependencyInjection\ServiceLocator;
use PHPUnit\Framework\TestCase;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class ProxyTest extends TestCase
{
    /**
     * Retrieve a printer then retrieve a scanner.
     */
    public function testPrinterScanner()
    {
        $serviceLocator = new ServiceLocator();
        $this->doTestPrinter($serviceLocator);
        $this->doTestScanner($serviceLocator);
    }

    /**
     * Retrieve a scanner then retrieve a printer.
     */
    public function testScannerPrinter()
    {
        $serviceLocator = new ServiceLocator();
        $this->doTestScanner($serviceLocator);
        $this->doTestPrinter($serviceLocator);
    }

    /**
     * Test the printer methods.
     *
     * @param ServiceLocator $serviceLocator
     */
    private function doTestPrinter(ServiceLocator $serviceLocator)
    {
        $printer = $serviceLocator->getPrinter();

        $this->assertEquals(
            '<printed>info</printed>',
            $printer->printDocument('info')
        );

        $this->assertEquals(
            '<printed><scanned>info</scanned></printed>',
            $printer->printScannedDocument('info')
        );
    }

    /**
     * Test the scanner methods.
     *
     * @param ServiceLocator $serviceLocator
     */
    public function doTestScanner(ServiceLocator $serviceLocator)
    {
        $scanner = $serviceLocator->getScanner();

        $this->assertEquals(
            '<scanned>info</scanned>',
            $scanner->scanDocument('info')
        );

        $this->assertEquals(
            '<scanned><printed>info</printed></scanned>',
            $scanner->scanPrintedDocument('info')
        );
    }
}
