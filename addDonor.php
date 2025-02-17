<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Donor</title>
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

<h2><center>Add New Donor</center></h2>

<form action="addDonor.php" method="post">
<label for="donorid">DonorID:</label>
    <input type="id" name="donorid" required><br>

    <label for="name">Name:</label>
    <input type="text" name="name" required><br>

    <label for="age">Age:</label>
    <input type="number" name="age" required><br>

    <label for="bloodType">Blood Type:</label>
    <select id="bloodType" name="bloodType">
    <option value="A+">A+</option>
        <option value="B+">B+</option>
        <option value="AB+">AB+</option>
        <option value="O+">O+</option>
        <option value="O-">O-</option>
        <option value="AB-">AB-</option>
        <option value="A-">A-</option>
        <option value="B-">B-</option>
        <option value="other">Other</option>
</select><br><br> <br>
    <label for="contactDetails">Contact Details:</label>
    <input type="text" name="contactDetails" required><br> <br>

    <label for="gender">Gender:</label>
    <select name="gender" required>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Other">Other</option>
    </select><br> <br>

    <label for="dateOfDonation">Date of Donation:</label>
    <input type="date" name="dateOfDonation" required><br>

    <input type="submit" value="Submit">
</form>

</body>
</html>
<?php
// Assuming you have a form with fields: name, age, bloodType, contactDetails, gender, dateOfDonation
include 'db.php';
include "functions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $donorid = $_POST["donorid"];
    $name = $_POST["name"];
    $age = $_POST["age"];
    $bloodType = $_POST["bloodType"];
    $contactDetails = $_POST["contactDetails"];
    $gender = $_POST["gender"];
    $dateOfDonation = $_POST["dateOfDonation"];

    // Validate the contactDetails to avoid duplicates
    
        // Insert data into the donor table
        

        $sql = "INSERT INTO donor (DonorID,Name, Age, BloodType, ContactDetails, Gender, DateOfDonation)
                VALUES ('$donorid','$name', $age, '$bloodType', $contactDetails, '$gender', '$dateOfDonation')";

        if (mysqli_query($con, $sql)) {
         echo "Registration successful!";
            header("Location:donor.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }

        $conn->close();
    } 


// function isContactDetailsUnique($contactDetails)
// {
  
    

//     $sql = "SELECT COUNT(*) AS count FROM donor WHERE ContactDetails = $contactDetails";
//     $result = $conn->query($sql);

//     if ($result && $row = $result->fetch_assoc()) {
//         $count = $row["count"];
//         return $count == 0; // ContactDetails is unique if count is 0
//     }

//     $conn->close();
//     return false; // In case of an error
// }
?>
