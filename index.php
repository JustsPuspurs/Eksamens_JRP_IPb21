<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viesu grāmata</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Viesu grāmata</h1>
        <form id="guestBookForm">
            <label for="name">Vārds:</label>
            <input type="text" id="name" required>
            
            <label for="email">E-pasts:</label>
            <input type="email" id="email" required>
            
            <label for="message">Ziņojums:</label>
            <textarea id="message" required></textarea>
            
            <button type="button" onclick="submitGuestbookEntry()">Pievienot ierakstu</button>
        </form>
        
        <div id="guestBookEntries"></div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
