<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Details</title> 
    <link rel="stylesheet" href="styles.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
     
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
    background-color:skyblue;
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
<nav>
            <ul>
            <li><a href="dashboard2.php">Back</a></li>
                <li><a href="donor.php">Donors</a></li>
               
                
                <!-- Add more navigation links for other entities -->
            </ul>

        </nav>
    <center><h2>Donor Details</h2>

<?php
// Database connection details
// $servername = "localhost";
// $username = "username";
// $password = "password";
// $dbname = "temple_db";
include("db.php");
include("functions.php");
// Create connection
// $con = new mysqli($servername, $username, $password, $dbname);
$query="select * from donor";
$result=mysqli_query($con,$query);
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Query to fetch poojas
// $sql = "SELECT id, name, description, duration, pooja_time, cost FROM poojas";
// $result = $con->query($sql);

// Check if any poojas are found
if ($result->num_rows > 0) {
    // Output table header
    echo "<table>";
    echo "<tr><th>DonorID</th><th>Name</th><th>Age</th><th>BloodType</th><th>ContactDetails</th><th>Gender</th><th>DateOfDonation</th></tr>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["DonorID"] . "</td>";
        echo "<td>" . $row["Name"] . "</td>";
        echo "<td>" . $row["Age"] . "</td>";
        echo "<td>" . $row["BloodType"] . "</td>";
        echo "<td>" . $row["ContactDetails"] . "</td>";
        echo "<td>" . $row["Gender"] . "</td>";
        echo "<td>" . $row["DateOfDonation"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    // echo "<button onclick=\"location.href='add_pooja.php'\">Add Pooja</button>"; // Change 'add_pooja.php' to your actual file name

} else {
    echo "No Donor found";
}

// Close connection
$con->close();
?>
<br><br>
<!-- <a style="font-size:20px; background-color:black; padding:15px 25px 15px 25px; color:white;" href="addDonor.html">Add Donor</a> -->

<form action="addDonor.php" method="get">
        <button type="submit">Add</button>
       
    </form>
    <form action="deleteDonor.php" method="get">
        <button type="submit">Delete</button>
       
    </form>
    <form action="updateDonor.php" method="get">
        <button type="submit">Update</button>
       
    </form>
</body>
</html>
