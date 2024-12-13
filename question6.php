<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>age calculator</title>
</head>
<body>
    <h1>Age in Days Calculator</h1>
    <form method="post">
        <label for="years">Enter your age in years:</label>
        <input type="number" step="1" name="years" id="years" required>
        <br>
        <button type="submit" name="calculate_age">Calculate Age in Days</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['calculate_age'])) {
        $years = (int) $_POST['years'];
        $days = calculateAgeInDays($years);
        echo "<p> age in days is approximately: $days days.</p>";
    }
    ?>
    <?php
    function calculateAgeInDays($years) {
    return $years * 365; 
}
?>
</body>
</html>