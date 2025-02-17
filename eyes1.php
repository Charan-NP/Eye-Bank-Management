


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
    font-size:20px;
}

nav a:hover {
    background-color: #ddd;
    color: #333;
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
<nav>
            <ul>
                <li><a href="index1.php">Home</a></li>
                <li><a href="eyes1.php">Eyes</a></li>
               
                
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

</body>
</html>
