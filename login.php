<?php
session_start();

// Include the database connection file
include 'db.php';
include "functions.php";


// Include the login process file




$username = $password = "";
$username_err = $password_err = $login_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }

    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }

    if(empty($username_err) && empty($password_err)){
        $sql = "SELECT Username, Password FROM users WHERE Username = ?";

        if($stmt = $con->prepare($sql)){
            $stmt->bind_param("s", $param_username);
            $param_username = $username;

            if($stmt->execute()){
                $stmt->store_result();
                if($stmt->num_rows > 0){
                    $stmt->bind_result($db_username, $db_password);
                    if($stmt->fetch()){
                        if($password === $db_password){
                            session_start();
                            $_SESSION["loggedin"] = true;
                            $_SESSION["username"] = $db_username;
                            header("location: index1.php");
                        } else{
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            $stmt->close();
        }
    }
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Eye Bank Management System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <style>
    body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f2f2f2;
}

header {
    background-color:skyblue;
    color:#f2f2f2;
    padding: 10px;
    text-align: center;
}

nav ul {
    list-style-type: none;
    padding: 0;
    background-color:white;
    overflow: hidden;
}

nav li {
    float: left;
}

nav a {
    display: block;
    color:blue;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

nav a:hover {
    background-color: #ddd;
    color: #333;
}


main {
    background-color: white;
    padding: 20px;
    margin: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(189, 184, 201, 0.1);
}

footer {
    background-color: black;
    color:white;
    text-align: center;
    padding: 5px;
    position: fixed;
    bottom: 0;
    width: 100%;
}

form {
    max-width: 400px;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
}

input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    background-color:blue;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #555;
}

p {
    margin-top: 15px;
}
a{
    
    color: blue;
}

@media (max-width: 600px) {
    /* Adjust styles for smaller screens */
    nav {
        text-align: center;
    }
    nav ul {
        text-align: center;
    }

    nav li {
        display: block;
        float: none;

    }
}
</style>
</head>
<body>
    <header>
        <br>
        <h1>Eye Bank Management System</h1>
        <br>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
              
               
                <!-- Add more navigation links for other entities -->
            </ul>
            
        </nav>
    </header>
    <main>
        <h2><center>Login</center></h2>
        <form action="login.php" method="post" onsubmit="return validateForm(this)">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" location="index.php">Login</button>

        </form>
        <p>Don't have an account? <a href="signup.php">Sign up here</a>.</p>
    </main>
    
    <footer>
        <p>&copy; 2024 Eye Bank Management System</p>
    </footer>
    <script src="scripts.js"></script>
</body>
</html>
