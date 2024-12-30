<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "influencers_platform";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password for security

    $sql = "INSERT INTO users (name, email, role, password) VALUES ('$name', '$email', '$role', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Signup successful! You can now login.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
