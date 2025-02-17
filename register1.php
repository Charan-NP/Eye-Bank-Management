<?php

//     session_start();


// if(!isset($_SESSION['UserID'])){
//     header("Location:register.php");
//     exit;
// }

// if (session_status() === PHP_SESSION_NONE) {
//     session_start();
// }

// // Check if the user is not logged in
// if (!isset($_SESSION['UserID'])) {
//     // Redirect to the login page
//     header("Location: login.php");
//     exit;
// }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eye Donation System</title>
    <style>
    body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f2f2f2;
}

header {
    background-color:black;
    color:#f2f2f2;
    padding: 10px;
    text-align: center;
}

nav ul {
    list-style-type: none;
    padding: 0;
    background-color:lightblue;
    overflow: hidden;
}

nav li {
    float: left;
}

nav a {
    display: block;
    color:black;
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
    text-align: center;
}

button:hover {
    background-color: #555;
}

p {
    margin-top: 15px;
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
<nav>
            <ul>
                <li><a href="index1.php">Back</a></li>
                <!-- /////<li><a href="<?php echo isset($_SESSION['UserID']) ? 'register.php' : 'login.php'; ?>">Register</a></li> 
                -->
                <li  style="float:right;"><a href="myregister.php">My Registration</a></li>
                <!-- Add more navigation links for other entities -->
            </ul>

        </nav>
    <h1><center>Welcome to the Eye Donation System</center></h1>
    
    <form action="donate.php" method="get">
        <button type="submit">Donate</button>
    </form>
    
    <form action="recieve.php" method="get">
        <button type="submit">Receive</button>
    </form>
</body>
</html>
