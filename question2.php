<?php

define("PI", 3.14159);

function calculateCircleArea($radius) {
    return PI * $radius * $radius;
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $radius = (float) $_POST['radius'];
    $area = calculateCircleArea($radius);
    echo "The area of the circle with radius $radius is: $area";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Calculate Circle Area</title>
</head>
<body>
    <form method="post">
        <label for="radius">Enter the radius of the circle:</label>
        <input type="number" step="any" name="radius" id="radius" required>
        <button type="submit">Calculate</button>
    </form>
</body>
</html>
