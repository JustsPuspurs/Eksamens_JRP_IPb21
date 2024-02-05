<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if ($name && $email && $message) {
        $entry = "<p><strong>$name</strong> ($email): $message</p>";
        file_put_contents('entries.html', $entry, FILE_APPEND);
    }
}

header('Location: index.php');
?>