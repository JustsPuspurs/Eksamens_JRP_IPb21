<?php
include 'Guestbook.php';

$host = "localhost";
$username = "root"; // Default username for XAMPP
$password = ""; // Default password for XAMPP is empty
$database = "guestbook";

$guestbook = new Guestbook($host, $username, $password, $database);

// Sorting Links
echo '<div>
        <a href="index.php?sort=name">Kārtot pēc vārda</a> | 
        <a href="index.php?sort=timestamp">Kārtot pēc pievienošanas datuma</a>
      </div>';

// Search Form
echo '<form method="get" action="index.php">
        <label for="search">Meklēt pēc vārda:</label>
        <input type="text" name="search">
        <button type="submit">Meklēt</button>
      </form>';

// Guestbook Entry Form
echo '<form method="post" action="process.php" onsubmit="return validateForm()">
        <label for="name">Vārds:</label>
        <input type="text" name="name">
        <label for="email">E-pasts:</label>
        <input type="email" name="email">
        <label for="message">Ziņojums:</label>
        <textarea name="message"></textarea>
        <button type="submit">Pievienot ierakstu</button>
      </form>';

// Display Guestbook Entries
echo '<div id="guestBookEntries">' . $guestbook->getEntries($_GET['sort'] ?? 'timestamp', $_GET['search'] ?? '') . '</div>';

$guestbook->closeConnection();
?>
