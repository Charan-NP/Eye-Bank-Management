<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Donor</title>
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
    <h2><center>Update Donor<center></h2>
    <form action="updateDonor.php" method="post">
        <label for="donorId">Donor ID:</label>
        <input type="text" id="donorId" name="donorId" required>
        <br>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="age">Age:</label>
        <input type="text" id="age" name="age" required>
        <br>
        <label for="bloodType">Blood Group:</label> 
        <select id="bloodType" name="bloodType">Blood Type:</label>
        <option value="A+">A+</option>
        <option value="B+">B+</option>
        <option value="AB+">AB+</option>
        <option value="O+">O+</option>
        <option value="O-">O-</option>
        <option value="AB-">AB-</option>
        <option value="A-">A-</option>
        <option value="B-">B-</option>
        <option value="other">Other</option>
</select><br>
        <br>
        <label for="contactDetails">Contact Details:</label>
        <input type="text" id="contactDetails" name="contactDetails" required>
        <br> <br>
        <label for="gender">Gender:</label>
        <input type="text" id="gender" name="gender" required>
        <br> <br>
        <label for="dateOfDonation">Date of Donation:</label>
        <input type="date" id="dateOfDonation" name="dateOfDonation" required>
        <br> <br>
        <button type="submit">Update Donor</button>
    </form>
</body>
</html>
<?php
include 'db.php';
include 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $donorId = $_POST["donorId"];
    $name = $_POST["name"];
    $age = $_POST["age"];
    $bloodType = $_POST["bloodType"];
    $contactDetails = $_POST["contactDetails"];
    $gender = $_POST["gender"];
    $dateOfDonation = $_POST["dateOfDonation"];

    // Validate and sanitize input (you can add more validation as needed)
    if (!empty($donorId) && is_numeric($donorId)) {
        // Check if donor ID exists in the donor table
        $checkSql = "SELECT * FROM donor WHERE DonorID = $donorId";
        $result = mysqli_query($con, $checkSql);

        if (mysqli_num_rows($result) > 0) {
            // Donor ID exists, proceed to update
            $updateSql = "UPDATE donor SET
                Name = '$name',
                Age = $age,
                BloodType = '$bloodType',
                ContactDetails = $contactDetails,
                Gender = '$gender',
                DateOfDonation = '$dateOfDonation'
                WHERE DonorID = $donorId";

            if (mysqli_query($con, $updateSql) === TRUE) {
                echo "Donor with ID $donorId updated successfully";
            } else {
                echo "Error updating record: " . mysqli_error($con);
            }
        } else {
            echo "No such donor ID: $donorId";
        }

        $con->close();
    } else {
        echo "Invalid input. Please provide a valid donor ID.";
    }
}
?>
