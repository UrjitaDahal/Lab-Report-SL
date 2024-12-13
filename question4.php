<?php

function addnumber($num1, $num2) {
    return $num1 + $num2;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sum Calculator</title>
</head>
<body>
    <h1>Sum Calculator</h1>
    <form method="post">
        <label for="num1">Enter the first number:</label>
        <input type="number" step="any" name="num1" id="num1" required>
        <br>
        <label for="num2">Enter the second number:</label>
        <input type="number" step="any" name="num2" id="num2" required>
        <br>
        <button type="submit" name="calculate_sum">Calculate Sum</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['calculate_sum'])) {
        $num1 = (float) $_POST['num1'];
        $num2 = (float) $_POST['num2'];
        $sum = addnumber($num1, $num2);
        echo "<p>The sum of $num1 and $num2 is: $sum</p>";
    }
    ?>
</body>
</html>
