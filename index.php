<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viesu grāmata</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>
<body>
    <div class="container">
        <h1>Viesu grāmata</h1>
        
        <!-- Sorting and Searching Links -->
        <div>
            <a href="getEntries.php?sort=name">Kārtot pēc vārda</a> | 
            <a href="getEntries.php?sort=timestamp">Kārtot pēc pievienošanas datuma</a> | 
        </div>

        <form method="get" action="getEntries.php">
            <label for="search">Meklēt pēc vārda:</label>
            <input type="text" name="search">
            <button type="submit">Meklēt</button>
        </form>

        <form method="post" action="process.php">
            <label for="name">Vārds:</label>
            <input type="text" name="name" required>
            
            <label for="email">E-pasts:</label>
            <input type="email" name="email" required>
            
            <label for="message">Ziņojums:</label>
            <textarea name="message" required></textarea>
            
            <button type="submit">Pievienot ierakstu</button>
        </form>
        
        <div id="guestBookEntries">
            <?php include 'getEntries.php'; ?>
        </div>
    </div>
</body>
</html>
