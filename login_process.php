<?php
session_start();

// Include the database connection file
include 'db.php';
include "functions.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Perform user authentication (you should use secure methods)
    // For simplicity, plaintext passwords are used here (not recommended in production)
    $sql = "SELECT * FROM users WHERE Username = '$username' AND Password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header("Location: index.php");
    } else {
        echo "Login failed. <a href='login.php'>Try again</a> or <a href='signup.php'>Sign up</a>";
    }
} else {
    echo "Invalid request method.";
}

// Close the database connection
$conn->close();
?>
