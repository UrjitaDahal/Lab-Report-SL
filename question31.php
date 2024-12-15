<?php
$servername = "localhost";
$username_db = "root"; 
$password_db = "";
$dbname = "urjita_05_sl";


$conn = new mysqli($servername, $username_db, $password_db, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];

    $errors = [];

   
    if (strlen($username) < 8) {
        $errors[] = "Username must be at least 8 characters long.";
    }


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email address.";
    }

 
    $dob_timestamp = strtotime($dob);
    if (!$dob_timestamp || $dob_timestamp > time()) {
        $errors[] = "Invalid Date of Birth.";
    }

   
    if (!preg_match('/^\d{10}$/', $phone)) {
        $errors[] = "Phone number must be exactly 10 digits long.";
    }

 
    if (empty($errors)) {
        $stmt = $conn->prepare("INSERT INTO users (username, email, dob, phone) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $email, $dob, $phone);

        if ($stmt->execute()) {
            echo "<p >User registered successfully!</p>";
        } else {
            echo "<p>Error: " . $stmt->error . "</p>";
        }

        $stmt->close();
    } else {
      
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
   
</head>

<body>
    <div>
        <h2>User Registration</h2>
        <form action="" method="POST">
            <label for="username">Username :</label>
            <input type="text" id="username" name="username" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required><br><br>

            <label for="phone">Phone (10 digits):</label>
            <input type="text" id="phone" name="phone" required><br><br>

            <button type="submit">Register</button>
        </form>
    </div>
</body>

</html>