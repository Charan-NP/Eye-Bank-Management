<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Eye</title>
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
                <li><a href="eyes2.php">Back</a></li>
               
               
              
            </ul>

        </nav>
    <h2><center>Delete Eye</center></h2>
    <form action="deleteEye.php" method="post">
        <label for="eyeId">Eye ID:</label>
        <input type="text" id="eyeId" name="eyeId" required>
        <button type="submit">Delete Eye</button>
    </form>
</body>
</html>
<?php
include 'db.php';
include "functions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $eyeId = $_POST["eyeId"];

    // Validate and sanitize input (you can add more validation as needed)
    if (!empty($eyeId) && is_numeric($eyeId)) {
        // Check if eye ID exists in the eye table
        $checkSql = "SELECT * FROM eye WHERE EyeID = $eyeId";
        $result = mysqli_query($con, $checkSql);

        if (mysqli_num_rows($result) > 0) {
            // Eye ID exists, proceed to delete
            $deleteSql = "DELETE FROM eye WHERE EyeID = $eyeId";

            if (mysqli_query($con, $deleteSql) === TRUE) {
                echo "Eye with ID $eyeId deleted successfully";
            } else {
                echo "Error deleting record: " . mysqli_error($con);
            }
        } else {
            echo "No such eye ID: $eyeId";
        }

        $con->close();
    } else {
        echo "Invalid input. Please provide a valid eye ID.";
    }
}
?>
