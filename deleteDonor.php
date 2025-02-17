<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Donor</title>
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
                <li><a href="donor.php">Back</a></li>
               
               
              
            </ul>

        </nav>
    <h2><center>Delete Donor</center></h2>
    <form action="deleteDonor.php" method="post">
        <label for="donorId">Donor ID:</label>
        <input type="text" id="donorId" name="donorId" required>
        <button type="submit">Delete Donor</button>
    </form>
</body>
</html>
<?php
include 'db.php';
include "functions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $donorId = $_POST["donorId"];

    // Validate and sanitize input (you can add more validation as needed)
    if (!empty($donorId) && is_numeric($donorId)) {
        // Check if donor ID exists in the donor table
        $checkSql = "SELECT * FROM donor WHERE DonorID = $donorId";
        $result = mysqli_query($con, $checkSql);

        if (mysqli_num_rows($result) > 0) {
            // Donor ID exists, proceed to delete
            $deleteSql = "DELETE FROM donor WHERE DonorID = $donorId";

            if (mysqli_query($con, $deleteSql) === TRUE) {
                echo "Donor with ID $donorId deleted successfully";
                // header("Location:donor.php");
            } else {
                echo "Error deleting record: " . mysqli_error($con);
            }
        } else {
            echo "No such user ID: $donorId";
        }

        $con->close();
    } else {
        echo "Invalid input. Please provide a valid donor ID.";
    }
}
?>
