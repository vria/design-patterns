<?php

namespace DesignPatterns\Structural\Proxy;

/**
 * Scanner service can scan documents. It can also scan the documents printed
 * in advance by a printer.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class Scanner
{
    /**
     * @var Printer
     */
    private $printer;

    /**
     * @param Printer $printer
     */
    public function __construct(Printer $printer)
    {
        $this->printer = $printer;
    }

    /**
     * Simply scan the document.
     *
     * @param string $document
     *
     * @return string
     */
    public function scanDocument($document)
    {
        return '<scanned>'.$document.'</scanned>';
    }

    /**
     * Ask the printer to print a document then scan this printed document.
     *
     * @param string $document
     *
     * @return string
     */
    public function scanPrintedDocument($document)
    {
        $printed = $this->printer->printDocument($document);

        return $this->scanDocument($printed);
    }
}
