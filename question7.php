<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calculator</title>
</head>
<body>
    <h1>Power Calculator</h1>
    <form method="post">
        <label for="voltage">Enter the voltage (V):</label>
        <input type="number" step="any" name="voltage" id="voltage" required>
        <br>
        <label for="current">Enter the current (A):</label>
        <input type="number" step="any" name="current" id="current" required>
        <br>
        <button type="submit" name="calculate_power">Calculate Power</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['calculate_power'])) {
        $voltage = (float) $_POST['voltage'];
        $current = (float) $_POST['current'];
        $power = calculatePower($voltage, $current);
        echo "<p>The power is: $power watts.</p>";
    }
    
    function calculatePower($voltage, $current) {
    return $voltage * $current;
}
?>
</body>
</html>