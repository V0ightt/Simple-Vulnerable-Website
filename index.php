<?php
// index.php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // VULNERABILITY: SQL Injection via string concatenation
    // An attacker can input "' OR '1'='1" to bypass login
    $sql = "SELECT * FROM users WHERE username = '" . $user . "' AND password = '" . $pass . "'";
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Login successful! Welcome, " . $user;
    } else {
        echo "Invalid credentials";
    }
}
?>

<!DOCTYPE html>
<html>
<body>
    <h2>Login</h2>
    <form method="POST" action="">
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
