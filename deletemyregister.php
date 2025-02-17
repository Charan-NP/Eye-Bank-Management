<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Form</title>
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
                <li><a href="myregister.php">Back</a></li>
               
               
              
            </ul>

        </nav>
    <h2><center>Cancel Registration</center></h2>
    <form action="deletemyregister.php" method="POST">
        <label for="id">ID to delete:</label>
        <input type="id" id="id" name="id" required><br>

        <input type="submit" value="Delete">
    </form>
</body>
</html>
<?php
// Replace these variables with your database credentials
include 'db.php'; // Assuming this file contains $con for database connection

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check the connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    // Function to sanitize user input
    function sanitizeInput($input)
    {
        return htmlspecialchars(stripslashes(trim($input)));
    }

    // Check if 'id' is set in the $_POST array
    if (isset($_POST['id'])) {
        // Prompt user for ID
        $id = sanitizeInput($_POST['id']); // Assuming you're using POST method

        // Check if the ID is present in the register table
        $checkIdQuery = "SELECT * FROM register WHERE id = '$id'";
        $checkIdResult = $con->query($checkIdQuery);

        // If the ID is present, proceed with deletion
        if ($checkIdResult->num_rows > 0) {
            // Query to delete the record from the register table
            $deleteQuery = "DELETE FROM register WHERE id = '$id'";

            // Execute the query
            if ($con->query($deleteQuery) === TRUE) {
                echo "Record with ID $id deleted successfully.";
            } else {
                echo "Error deleting record: " . $con->error;
            }
        } else {
            echo "ID $id not present in the register table.";
        }
    } else {
        echo "ID is not set in the POST array.";
    }

    // Close the connection
    $con->close();
}
?>
