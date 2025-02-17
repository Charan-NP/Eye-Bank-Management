<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Recipient</title>
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
                <li><a href="recipient.php">Back</a></li>
               
               
              
            </ul>

        </nav>
    <h2><center>Update Recipient</center></h2>
    <form action="updateRecipient.php" method="post">
        <label for="recipientId">Recipient ID:</label>
        <input type="text" id="recipientId" name="recipientId" required>
        <br>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="age">Age:</label>
        <input type="text" id="age" name="age" required>
        <br> <br>

        <label for="bloodType">Blood Group:</label>
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
        </select>
        <br>
        <br>
        <label for="contactDetails">Contact Details:</label>
        <input type="text" id="contactDetails" name="contactDetails" required>
        <br> <br>
        <label for="gender">Gender:</label>
        <select id="gender" name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>
        <br> <br>
        <label for="dateOfTransaction">Date of Transaction:</label>
        <input type="date" id="dateOfTransaction" name="dateOfTransaction" required>
        <br> <br>
        <button type="submit">Update Recipient</button>
    </form>
</body>
</html>
<?php
include 'db.php';
include 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $recipientId = $_POST["recipientId"];
    $name = $_POST["name"];
    $age = $_POST["age"];
    $bloodType = $_POST["bloodType"];
    $contactDetails = $_POST["contactDetails"];
    $gender = $_POST["gender"];
    $dateOfTransaction = $_POST["dateOfTransaction"];

    // Validate and sanitize input (you can add more validation as needed)
    if (!empty($recipientId) && is_numeric($recipientId)) {
        // Check if recipient ID exists in the recipient table
        $checkRecipientSql = "SELECT * FROM recipient WHERE RecipientID = $recipientId";
        $resultRecipient = mysqli_query($con, $checkRecipientSql);

        if (mysqli_num_rows($resultRecipient) > 0) {
            // Recipient ID exists, proceed to update
            $checkDateOfTransactionSql = "SELECT * FROM recipient WHERE DateOfTransaction = '$dateOfTransaction'";
            $resultDateOfTransaction = mysqli_query($con, $checkDateOfTransactionSql);

            if (mysqli_num_rows($resultDateOfTransaction) > 0) {
                // Update recipient details
                $updateRecipientSql = "UPDATE recipient SET
                    Name = '$name',
                    Age = $age,
                    BloodType = '$bloodType',
                    ContactDetails = '$contactDetails',
                    Gender = '$gender'
                    WHERE RecipientID = $recipientId";

                if (mysqli_query($con, $updateRecipientSql)) {
                    // Update related transactions
                    $updateTransactionSql = "UPDATE transaction SET
                        BloodType = '$bloodType',
                        DateOfTransaction = '$dateOfTransaction'
                        WHERE RecipientID = $recipientId";

                    if (mysqli_query($con, $updateTransactionSql)) {
                        echo "Recipient with ID $recipientId and related transactions updated successfully";
                    } else {
                        echo "Error updating related transactions: " . mysqli_error($con);
                    }
                } else {
                    echo "Error updating recipient record: " . mysqli_error($con);
                }
            } else {
                echo "Invalid DateOfTransaction: $dateOfTransaction";
            }
        } else {
            echo "No such recipient ID: $recipientId";
        }

        $con->close();
    } else {
        echo "Invalid input. Please provide a valid recipient ID.";
    }
}
?>
