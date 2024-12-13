 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
 </head>
 <body>
    <h1>Minutes to Seconds Converter</h1>
    <form method="post">
        <label for="minutes">Enter the minutes:</label>
        <input type="number" step="1" name="minutes" id="minutes" required>
        <button type="submit" name="convert_time">Convert to Seconds</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['convert_time'])) {
        $minutes = (int) $_POST['minutes'];
        $seconds = minutesToSeconds($minutes);
        echo "<p>$minutes minutes is equal to $seconds seconds.</p>";
    }
    function minutesToSeconds($minutes) {
    return $minutes * 60;
}
    ?>
 </body>
 </html>
 
 
 
 
 