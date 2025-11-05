<?php
// Secure login using prepared statements
$mysqli = new mysqli("localhost", "user", "password", "database");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $mysqli->prepare("SELECT password_hash FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($hash);

if ($stmt->fetch()) {
    if (password_verify($password, $hash)) {
        echo "Login successful";
    } else {
        echo "Invalid credentials";
    }
} else {
    echo "User not found";
}

$stmt->close();
$mysqli->close();
?>
