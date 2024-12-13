<!DOCTYPE html>
<html>
<head>
    <title>Football Points Calculator</title>
</head>
<body>
    <h2>Football Points Calculator</h2>
    <form method="post" action="">
        <label for="wins">Number of Wins:</label>
        <input type="number" id="wins" name="wins" required min="0"><br><br>
        
        <label for="draws">Number of Draws:</label>
        <input type="number" id="draws" name="draws" required min="0"><br><br>
        
        <label for="losses">Number of Losses:</label>
        <input type="number" id="losses" name="losses" required min="0"><br><br>
        
        <button type="submit">Calculate Points</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
        $wins = isset($_POST['wins']) ? (int)$_POST['wins'] : 0;
        $draws = isset($_POST['draws']) ? (int)$_POST['draws'] : 0;
        $losses = isset($_POST['losses']) ? (int)$_POST['losses'] : 0;

        
        function calculatePoints($wins, $draws, $losses) {
            return ($wins * 3) + ($draws * 1);
        }

       
        $totalPoints = calculatePoints($wins, $draws, $losses);

        
        echo "<h3>Total Points: $totalPoints</h3>";
    }
    ?>
</body>
</html>
