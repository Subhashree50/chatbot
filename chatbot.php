
<?php
if (isset($_POST['message'])) {
    $userQuery = strtolower(trim($_POST['message']));
    $response = "I couldn't find relevant information. Please check the medical book for more details.";

    $file = 'medical_book_text.txt';

    if (file_exists($file)) {
        $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        // Search the medical book content for a relevant response
        foreach ($lines as $line) {
            if (stripos($line, $userQuery) !== false) {
                $response = $line;
                break;
            }
        }
    } else {
        $response = "Medical book content not available. Please try again later.";
    }

    echo json_encode(['response' => $response]);
}
?>
