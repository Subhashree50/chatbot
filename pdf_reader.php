<?php
ini_set("memory_limit","1024M");

require 'vendor\autoload.php';

use Smalot\PdfParser\Parser;

function extractTextFromPdf($pdfFilePath) {
    $parser = new Parser();
    $pdf = $parser->parseFile($pdfFilePath);

    $pages = $pdf->getPages();
    $text = '';

    $totalPages = count($pages);
    echo "Total Pages: " . $totalPages . PHP_EOL;

    foreach ($pages as $index => $page) {
        $text .= $page->getText();
        echo "Processing page " . ($index + 1) . " of " . $totalPages . PHP_EOL;
    }

    file_put_contents('medical_book_text.txt', $text);
    echo "Text extraction completed! Check 'medical_book_text.txt' file.";
}

extractTextFromPdf('Medical_book.pdf');
?>