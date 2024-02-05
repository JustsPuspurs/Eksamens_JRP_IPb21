<?php
$host = "localhost";
$username = "root"; // Default username for XAMPP
$password = ""; // Default password for XAMPP is empty
$database = "guestbook";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    if ($name && $email && $message) {
        $sql = "INSERT INTO entries (name, email, message) VALUES ('$name', '$email', '$message')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Redirect back to the index page after submission
header('Location: index.php');
exit();
?>
