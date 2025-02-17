<?php
if (session_status() === PHP_SESSION_NONE) {
    // If the session is not already started, start the session
    session_start();
}

// Rest of your code goes here


// Include the database connection file
include 'db.php';
include "functions.php";

// Include the user information file

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eye Bank Management System</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
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
    max-width: 1000px;
    margin: 20px auto;
    background-color: #fff;
    padding: 10px;
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
        <h1> Eye Bank Management System</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="eyes.php">Eyes</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">register</a></li>
                
                
                
                
           
               
                <!-- <li  style="float:right;"><a href="register.php">Register</a></li> -->
                
                <!-- Add more navigation links for other entities -->
          


                
                <!-- Add more navigation links for other entities -->
            </ul>
            
<!-- 
             <div id="user-info">
                 //Display user info or login/signup buttons based on user authentication status -->
               
            

           
        </nav>
    </header>
    <main>
        <!-- Content will be loaded dynamically based on the selected page -->
        <!-- <div style="text-align:center;margin-top:40px;"> -->
        
         <!-- <img style="width:50%"; src="eye1.jpg" alt="cnt" /> -->

         <!-- <img style="width:100% ; height:20%;" src="image/eyem.jpeg" alt="cnt" /> -->
         <!-- <h2>Welcome to Eye Bank Management System</h2> -->
 <!-- </div> -->
 
    </main>
    <h1 style="text-align:center;font-size:45px;">Welcome to Eye Bank Management System</h1>
    <div class="header">


</div>


  <div id="page-container" style="margin-top:50px; position: relative;min-height: 84vh;   ">
    <div class="container">
    <div id="content-wrap"style="padding-bottom:75px;">
  <div id="demo" class="carousel slide" data-ride="carousel">

    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
    </ul>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="image\eyem1.png" alt="image\eyem2.jpeg" width="100%" height="500">
      </div>
      <div class="carousel-item">
        <img src="image\eyem2.jpeg" alt="image\eye3.jpg" width="100%" height="500">
      </div>

    </div>
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
  </div>
<br>
       
<br>
       
  </div>
    <!-- <footer>
        <p>&copy; 2024 Eye Bank Management System</p>
    </footer> -->
    <script src="scripts.js"></script>
</body>
</html>
 