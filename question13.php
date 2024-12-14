<!DOCTYPE html>
<html>
<head>
    <title>Shape Area Calculator</title>
</head>
<body>
    <h2>Calculate  Area of Shape</h2>
    <form method="post" action="">
        <label for="base">Base (decimal):</label>
        <input type="number" step="0.01" id="base" name="base" required><br><br>

        <label for="height">Height (decimal):</label>
        <input type="number" step="0.01" id="height" name="height" required><br><br>

        <label for="shape">Select Shape:</label>
        <select id="shape" name="shape" required>
            <option value="triangle">Triangle</option>
            <option value="parallelogram">Parallelogram</option>
        </select><br><br>

        <button type="submit">Calculate Area</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $base = isset($_POST['base']) ? (float)$_POST['base'] : 0;
        $height = isset($_POST['height']) ? (float)$_POST['height'] : 0;
        $shape = isset($_POST['shape']) ? $_POST['shape'] : "";
        function calculateArea($base, $height, $shape) {
            if ($base <= 0 || $height <= 0) {
                return "Invalid input";
            }
            if ($shape === "triangle") {
                return 0.5 * $base * $height;
            } elseif ($shape === "parallelogram") {
                return $base * $height;
            } else {
                return "Please select a valid shape.";
            }
        }
        $result = calculateArea($base, $height, $shape);
        if (is_numeric($result)) {
            echo "<h3>The area of the $shape is: $result</h3>";
        } else {
            echo "<h3>$result</h3>";
        }
    }
    ?>
</body>
</html>
