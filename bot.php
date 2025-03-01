<?php
require 'vendor\autoload.php';
use Smalot\PdfParser\Parser;

header('Content-Type: application/json');

$userMessage = strtolower(trim($_POST['message'] ?? ''));

// Extract text from PDF
function extractTextFromPdf($filePath) {
    $parser = new Parser();
    $pdf = $parser->parseFile($filePath);
    return strtolower($pdf->getText());
}

$pdfText = extractTextFromPdf('medical_book.pdf');

// Debugging: Check extracted text
// echo $pdfText;
// exit;

$response = "I'm sorry, I don't understand that.";

// Simple keyword matching
if (strpos($pdfText, $userMessage) !== false) {
    $response = "I found information about " . $userMessage . " in the medical book.";
}

echo json_encode(['message' => $response]);
?>