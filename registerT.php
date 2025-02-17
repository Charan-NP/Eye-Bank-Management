<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Details</title>
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
            <li><a href="registerT.php">Registers</a></li>
            <!-- Add more navigation links for other entities -->
        </ul>
    </nav>
    <center>
        <h2>Register Details</h2>

        <?php
        include("db.php");
        include("functions.php");

        $query = "SELECT * FROM register";
        $result = mysqli_query($con, $query);

        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>RegisterID</th><th>Name</th><th>Age</th><th>BloodType</th><th>ContactDetails</th><th>Gender</th><th>DateOfRegister</th><th>RegisterFor</th</tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["age"] . "</td>";
                echo "<td>" . $row["gender"] . "</td>";
                echo "<td>" . $row["phone"] . "</td>";
                echo "<td>" . $row["bloodType"] . "</td>";
                echo "<td>" . $row["dateOfRegister"] . "</td>";
                echo "<td>" . $row["registerFor"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No registers found";
        }

        $con->close();
        ?>

        <br><br>
       
        <form action="deleteRegister.php" method="get">
            <button type="submit">Delete</button>
        </form>
       
    </center>
</body>
</html>
