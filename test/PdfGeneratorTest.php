<?php
namespace PdfGenerator\Tests;
use PdfGenerator\PdfGenerator;
use PHPUnit\Framework\TestCase;
class PdfGeneratorTest extends TestCase
{

    public function testPdfGeneration()
    {
        $pdfGenerator = new PdfGenerator();
        $pdfGenerator->create();
    }

    protected function isPdfFileValid($filePath)
    {
        $fileContent = file_get_contents($filePath);
        return strpos($fileContent, '%PDF-') === 0;
    }
}