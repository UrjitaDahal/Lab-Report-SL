<?php
function calculateTotalLegs($chickens, $cows, $pigs) {
    $chickenLegs = $chickens * 2;
    $cowLegs = $cows * 4;
    $pigLegs = $pigs * 4;
    return $chickenLegs + $cowLegs + $pigLegs;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Animal Legs Calculator</title>
</head>
<body>
    <h1>Animal Legs Calculator</h1>
    <form method="post">
        <label for="chickens">Enter the number of chickens:</label>
        <input type="number" step="1" name="chickens" id="chickens" required>
        <br>
        <label for="cows">Enter the number of cows:</label>
        <input type="number" step="1" name="cows" id="cows" required>
        <br>
        <label for="pigs">Enter the number of pigs:</label>
        <input type="number" step="1" name="pigs" id="pigs" required>
        <br>
        <button type="submit" name="calculate_legs">Calculate Total Legs</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['calculate_legs'])) {
        $chickens = (int) $_POST['chickens'];
        $cows = (int) $_POST['cows'];
        $pigs = (int) $_POST['pigs'];
        $totalLegs = calculateTotalLegs($chickens, $cows, $pigs);
        echo "<p>The total number of legs among all the animals is: $totalLegs</p>";
    }
    ?>
</body>
</html>
