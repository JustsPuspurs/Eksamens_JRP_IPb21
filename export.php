<?php
include 'Guestbook.php';

$host = "localhost";
$username = "root"; // Default username for XAMPP
$password = ""; // Default password for XAMPP is empty
$database = "guestbook";

$guestbook = new Guestbook($host, $username, $password, $database);

// Get entries and format them for export
$entries = $guestbook->getEntries('timestamp', '');

// Set headers for download
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="guestbook_export.txt"');

// Output entries to the browser
echo $entries;

$guestbook->closeConnection();
?>
