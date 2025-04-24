<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "project2";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user = $_POST['username'];
$pass = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='$user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($pass, $row['password'])) {
        echo "Login successful. <a href='welcome.html'>Go to Dashboard</a>";
    } else {
        echo "Invalid password. <a href='index.html'>Try again</a>";
    }
} else {
    echo "No user found. <a href='index.html'>Sign up here</a>";
}

$conn->close();
?>
