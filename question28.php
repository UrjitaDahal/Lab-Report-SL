<?php

session_start();


$valid_username = "user";
$valid_password = "password";


$message = "";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $remember = isset($_POST['remember']);


    if ($username === $valid_username && $password === $valid_password) {

        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;


        if ($remember) {
            setcookie('username', $username, time() + (86400 * 7), "/"); 
            echo " cookie also set<br>";
        }

        
        echo"login was successful";
        exit;
    } else {
        $message = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <?php if ($message): ?>
            <p class="message"><?= htmlspecialchars($message) ?></p>
        <?php endif; ?>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Username" required value="<?= isset($_COOKIE['username']) ? htmlspecialchars($_COOKIE['username']) : '' ?>">
            <input type="password" name="password" placeholder="Password" required>
            <label><input type="checkbox" name="remember"> Remember Me</label>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>


