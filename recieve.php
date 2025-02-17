

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eye Receiving Registration</title>
    <style>
    body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f2f2f2;
}

header {
    background-color:black;
    color:#f2f2f2;
    padding: 10px;
    text-align: center;
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
    max-width: 400px;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
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
    padding: 5px;
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
    text-align: center;
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
                <li><a href="register1.php">Back</a></li>
               
               
                
                <!-- Add more navigation links for other entities -->
            </ul>

        </nav>

<h2><center>Eye Receiving Registration</center></h2>    

<form action="" method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="age">Age:</label>
    <input type="number" id="age" name="age" required><br><br>

    <label for="gender">Gender:</label>
    <select id="gender" name="gender" required>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
    </select><br><br>

    <label for="phone">Phone:</label>
    <input type="tel" id="phone" name="phone" required><br><br>

    <label for="bloodgroup">Blood Group:</label>
    <select id="bloodgroup" name="bloodgroup" required>
        <option value="A+">A+</option>
        <option value="B+">B+</option>
        <option value="AB+">AB+</option>
        <option value="O+">O+</option>
        <option value="O-">O-</option>
        <option value="AB-">AB-</option>
        <option value="A-">Male</option>
        <option value="B-">B-</option>
        <option value="other">Other</option>
    </select><br><br>

    <label for="dob">DateOfBirth:</label>
            <input type="date" id="dob" name="dob" required><br><br>

            <label for="prooftype">ProofType:</label>
        <select id="prooftype" name="prooftype">
            
            <option value="adhaar">adhaar</option>
            <option value="passport">Passport</option>
        </select>
<br><br>

<label for="proofno">ProofNo:</label>
    <input type="id" id="proofno" name="proofno"  required><br><br>

    <label for="date">Date:</label>
            <input type="date" id="date" name="date" required><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
    
    <button type="submit" name="submit">Submit</button>
</form>

</body>
</html>

<?php
include 'db.php';
include "functions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $phone = $_POST["phone"];
    $bloodgroup = $_POST["bloodgroup"];
    $dob = $_POST["dob"];
    $prooftype = $_POST["prooftype"];
    $proofno = $_POST["proofno"];
    $date = $_POST["date"];
    $password = $_POST["password"];
    
    // Generate automatic register ID
    $registerID = generateRegisterID();

    // Perform SQL query to insert data into register table
    $sql = "INSERT INTO register (id, name, age, gender, phone, bloodType,DOB,ProofType,ProofNo, dateOfRegister,password, registerFor)
            VALUES ('$registerID', '$name', '$age', '$gender', '$phone', '$bloodgroup','$dob','$prooftype','$proofno', '$date','$password', 'receive')";

    // if (mysqli_query($con, $sql)) {
    //     echo "Registration successful!";
    //     header("Location:register1.php");
    // } else {
    //     echo "Error: " . $sql . "<br>" . mysqli_error($con);
    // }
    try {
        if (mysqli_query($con, $sql)) {
            echo "Registration successful!";
           
        } else {
            throw new Exception("Error inserting into register table");
        }
    } catch (Exception $e) {
        // Check if the error message indicates an assertion or trigger violation
        if (strpos($e->getMessage(), "Assertion violation") !== false) {
            echo "Assertion violation: Duplicate entry. Registration not allowed.";
        } else {
            // Handle other errors
            echo "Error: " . $e->getMessage();
        }
    }

    // Close the database connection
    mysqli_close($con);
}

    

// Check connection


// Check connection


// $sql = "enforce_register_assertion";

// if (mysqli_query($con, $sql)) {
//     echo "Registration successful!";
//     header("Location: register1.php");
// } else {
   

//     // Check if the error message indicates an assertion or trigger violation
//     if (strpos($error_message, "Assertion condition is not satisfied") !== false) {
//         echo "Assertion condition is not satisfied.";
//     } elseif (strpos($error_message, "Trigger violation") !== false) {
//         echo "Trigger violation.";
//     } else {
//         // Handle other errors
//         echo "Error: " . $sql . "<br>" . $error_message;
//     }
// }




    // Close the database connection
    // mysqli_close($con);
// }

// Function to generate a unique register ID
function generateRegisterID() {
    $prefix = "REG"; // Prefix for the register ID
    $timestamp = "101"; // Current timestamp

    // Concatenate the prefix and timestamp to create a unique ID
    $registerID = $prefix . $timestamp;

    return $registerID;
}
?>

