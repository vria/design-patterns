<?php

namespace DesignPatterns\Structural\Proxy;

/**
 * Printer service can print documents. It can also print the documents scanned
 * in advance by a scanner.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class Printer
{
    /**
     * @var Scanner
     */
    private $scanner;

    /**
     * @param Scanner $scanner
     */
    public function __construct(Scanner $scanner)
    {
        $this->scanner = $scanner;
    }

    /**
     * Simply print the document.
     *
     * @param string $document
     *
     * @return string
     */
    public function printDocument($document)
    {
        return '<printed>'.$document.'</printed>';
    }

    /**
     * Ask the scanner to scan a document then print this scanned document.
     *
     * @param string $document
     *
     * @return string
     */
    public function printScannedDocument($document)
    {
        $scanned = $this->scanner->scanDocument($document);

        return $this->printDocument($scanned);
    }
}
