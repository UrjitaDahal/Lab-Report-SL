<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calculator</title>
</head>
<body>
    <h1>Triangle Area Calculator</h1>
    <form method="post">
        <label for="base">Enter the base of the triangle:</label>
        <input type="number" step="any" name="base" id="base" required>
        <br>
        <label for="height">Enter the height of the triangle:</label>
        <input type="number" step="any" name="height" id="height" required>
        <br>
        <button type="submit" name="calculate_area">Calculate Area</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['calculate_area'])) {
        $base = (float) $_POST['base'];
        $height = (float) $_POST['height'];
        $area = calculateTriangleArea($base, $height);
        echo "<p>The area of the triangle  is: $area</p>";
    }
    function calculateTriangleArea($base, $height) {
    return 0.5 * $base * $height;
}
?>
</body>
</html>