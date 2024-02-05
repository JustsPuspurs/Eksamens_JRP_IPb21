<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viesu grāmata</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function validateForm() {
            var name = document.forms["guestbookForm"]["name"].value;
            var email = document.forms["guestbookForm"]["email"].value;
            var message = document.forms["guestbookForm"]["message"].value;

            // Basic validation: Check if name, email, and message are not empty
            if (name === "" || email === "" || message === "") {
                alert("Lūdzu, aizpildiet visus obligātos laukus.");
                return false;
            }
        }
    </script>
</head>
<body>

        <h1>Viesu grāmata</h1>

        <!-- Sorting Links -->

            <a href="getEntries.php?sort=name">Kārtot pēc vārda</a> | 
            <a href="getEntries.php?sort=timestamp">Kārtot pēc pievienošanas datuma</a> | 


        <form method="get" action="getEntries.php">
            <label for="search">Meklēt pēc vārda:</label>
            <input type="text" name="search">
            <button type="submit">Meklēt</button>
        </form>
        <form name="guestbookForm" method="post" action="process.php" onsubmit="return validateForm()">
            <label for="name">Vārds:</label>
            <input type="text" name="name">
            
            <label for="email">E-pasts:</label>
            <input type="email" name="email">
            
            <label for="message">Ziņojums:</label>
            <textarea name="message"></textarea>

            <button type="submit">Pievienot ierakstu</button>
        </form>
        
        <div id="guestBookEntries">
            <?php include 'getEntries.php'; ?>

</body>
</html>
