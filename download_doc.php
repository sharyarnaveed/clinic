<?php
require 'vendor/autoload.php';

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

// Database connection settings
$host = 'localhost';
$db = 'clinic';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

// Establish PDO connection
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Retrieve POST data
$user_id = $_POST["id"];

// Fetch data from database
$sql = "SELECT * FROM patient_record WHERE patient_id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['user_id' => $user_id]);

// Create PHPWord object
$phpWord = new PhpWord();
$section = $phpWord->addSection();

// Populate document
while ($row = $stmt->fetch()) {
    $section->addText("ID: " . $row['patient_id']);
    $section->addText("Name: " . $row['name']);
    $section->addText("Father name: " . $row['fname']);
    $section->addText("CNIC: " . $row['cnic']);
    $section->addText("Phone NO: " . $row['phoneno']);
    $section->addText("Gender: " . $row['gender']);
    $section->addText("Date _time: " . $row['date_time']);
    $section->addTextBreak(1); // Add a line break
    $savePath = __DIR__ . "/path/to/save/";
$filename = $row['cnic'].'.docx';
$filepath = $savePath . $filename;
}

// Save document


// Check and create directory if it doesn't exist
if (!file_exists($savePath)) {
    mkdir($savePath, 0777, true); // Create directories recursively
}

// Save document
$writer = IOFactory::createWriter($phpWord, 'Word2007');
$writer->save($filepath);

// Serve document as a download
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename={$filename}");
header("Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document");
header("Content-Length: " . filesize($filepath));
readfile($filepath);
exit;
?>
