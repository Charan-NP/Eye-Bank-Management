


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eye Details</title>
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
    max-width: 700px;
    margin: 20px auto;
    background-color: #fff;
    padding: 25px;
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
                <li><a href="eyes2.php">Eyes</a></li>
               
                
                <!-- Add more navigation links for other entities -->
            </ul>

        </nav>
   <center> <h2>Eye Details</h2></center>

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
$query="select * from eye";
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
    echo "<tr><th>EyeID</th><th>DonorID</th><th>BloodType</th><th>Status</th><th>DateOfCollection</th>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["EyeID"] . "</td>";
        echo "<td>" . $row["DonorID"] . "</td>";
        echo "<td>" . $row["BloodType"] . "</td>";
        echo "<td>" . $row["Status"] . "</td>";
        echo "<td>" . $row["DateOfCollection"] . "</td>";
       
        echo "</tr>";
    }
    echo "</table>";
    // echo "<button onclick=\"location.href='add_pooja.php'\">Add Pooja</button>"; // Change 'add_pooja.php' to your actual file name

} else {
    echo "No eye found";
}

// Close connection
$con->close();
?>
<br><br>
<!-- <a style="font-size:20px; background-color:black; padding:15px 25px 15px 25px; color:white;" href="addDonor.html">Add Donor</a> -->

<form action="addEye.php" method="get">
        <button type="submit">Add</button>
       
    </form>
    <form action="deleteEye.php" method="get">
        <button type="submit">Delete</button>
       
    </form>
    <form action="updateEye.php" method="get">
        <button type="submit">Update</button>
       
    </form>

</body>
</html>
