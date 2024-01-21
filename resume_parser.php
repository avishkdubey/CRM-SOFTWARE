<?php
require 'vendor/autoload.php'; // Include autoloader for PHPWord and PDFParser

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if a resume file was uploaded
    if (isset($_FILES['resume'])) {
        $resumeFile = $_FILES['resume'];

        // Check if it's a valid file
        if ($resumeFile['error'] === 0) {
            // Determine the file format (PDF, Word, etc.)
            $fileExtension = pathinfo($resumeFile['name'], PATHINFO_EXTENSION);

            // Check if it's a PDF
            if (strtolower($fileExtension) === 'pdf') {
                $resumeText = parsePdfResume($resumeFile['tmp_name']);
            }
            // Check if it's a Word document
            elseif (in_array(strtolower($fileExtension), ['doc', 'docx'])) {
                $resumeText = parseWordResume($resumeFile['tmp_name']);
            }

            // Extract candidate information from $resumeText
            $candidateInfo = extractCandidateInfo($resumeText);

            // Display or store the parsed information
            if (!empty($candidateInfo)) {
                echo '<h2>Parsed Candidate Information</h2>';
                foreach ($candidateInfo as $key => $value) {
                    echo "<p><strong>$key:</strong> $value</p>";
                }
            } else {
                echo 'No candidate information found in the resume.';
            }
        } else {
            echo 'Error uploading the resume file.';
        }
    }
}

function parsePdfResume($pdfFilePath)
{
    // Use smalot/pdfparser to extract text from PDF file
    $parser = new Smalot\PdfParser\Parser();
    $pdf = $parser->parseFile($pdfFilePath);

    $text = '';
    foreach ($pdf->getPages() as $page) {
        $text .= $page->getText();
    }

    return $text;
}

function parseWordResume($wordFilePath)
{
    // Use phpoffice/phpword to extract text from Word document
    $phpWord = \PhpOffice\PhpWord\IOFactory::load($wordFilePath);
    $sections = $phpWord->getSections();

    $text = '';
    foreach ($sections as $section) {
        $text .= $section->getText();
    }

    return $text;
}

function extractCandidateInfo($resumeText)
{
    // Implement logic to extract candidate information from $resumeText
    // You can use regular expressions or other text processing methods
    // to search for and extract relevant information like name, contact details, etc.

    $candidateInfo = array(
        'Name' => 'John Doe',
        'Email' => 'johndoe@example.com',
        'Phone' => '123-456-7890',
        // Add more fields as needed
    );

    return $candidateInfo;
}
?>
