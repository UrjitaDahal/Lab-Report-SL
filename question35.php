<?php
    // Function to calculate simple interest
    function calculateSI($principle, $rate, $time) {
        return ($principle * $rate * $time) / 100;
    }

  
   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $principle = $_POST["principle"];
        $rate = $_POST["rate"];
        $time = $_POST["time"];

        if (isset($_POST["calculate_simple"]) && !empty($_POST["calculate_simple"]) && trim($_POST["calculate_simple"])) {
            $simple_interest = calculateSI($principle, $rate, $time);
            echo "Simple Interest: RS".($simple_interest);
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Interest Calculator</title>
</head>
<body>
    <h2>Interest Calculator</h2>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" novalidate>
        <fieldset>
        <div class="form-group">
        <label class="required" for="principle">  Principle:</label>
           <input type="number"  name="principle" placeholder="Enter amount" required><br><br>
</div>
<div class="form-group">
        <label class="required" for="rate">   Rate (%):</label>
          <input type="number" name="rate"  placeholder="Enter rate" required><br><br>
</div><div class="form-group">
        <label class="required" for="time">Time (years):</label>
            <input type="number"  name="time" placeholder="Enter time" required><br><br>
</div>
            <input type="submit" name="calculate_simple" value="Calculate Simple Interest">
        </fieldset>
    </form>
</body>
</html>

