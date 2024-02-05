<?php
$host = "localhost";
$username = "root"; // Default username for XAMPP
$password = ""; // Default password for XAMPP is empty
$database = "guestbook";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$entries = '';

if (isset($_GET['sort'])) {
    $sort = $_GET['sort'];
    
    // Meklēšanas nosacījums
    $search = '';
    if (isset($_GET['search']) && trim($_GET['search']) !== '') {
        $searchTerm = $conn->real_escape_string(trim($_GET['search']));
        $search = "WHERE LOWER(name) LIKE LOWER('%$searchTerm%')";
    }

    // SQL vaicājums ar kārtošanas nosacījumu
    $sql = "SELECT * FROM entries $search ORDER BY $sort DESC";
} else {
    $sql = "SELECT * FROM entries ORDER BY timestamp DESC";
}



$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $entries .= "<p><strong>{$row['name']}</strong> ({$row['email']}): {$row['message']} - Pievienots: {$row['timestamp']}</p>";
    }
} else {
    $entries = "Nav ierakstu.";
}

echo $entries;

$conn->close();
?>
