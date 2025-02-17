<?php
// Function to check if a username exists in the database
function usernameExists($mysqli, $username) {
    $sql = "SELECT id FROM user WHERE username = ?";
    if($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("s", $username);
        if($stmt->execute()) {
            $stmt->store_result();
            if($stmt->num_rows == 1) {
                return true; // Username exists
            } else {
                return false; // Username does not exist
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
            return false;
        }
        $stmt->close();
    }
}

// Function to register a new user
function registerUser($mysqli, $username, $password) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    if($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("ss", $username, $hashed_password);
        if($stmt->execute()) {
            return true; // Registration successful
        } else {
            echo "Oops! Something went wrong. Please try again later.";
            return false; // Registration failed
        }
        $stmt->close();
    }
}

// Function to validate user credentials
function validateUser($con, $username, $password) {
    $sql = "SELECT UserID, Username, Password FROM users WHERE Username = ?";
    if($stmt = $con->prepare($sql)) {
        $stmt->bind_param("s", $username);
        if($stmt->execute()) {
            $stmt->store_result();
            if($stmt->num_rows == 1) {
                $stmt->bind_result($id, $username, $hashed_password);
                if($stmt->fetch()) {
                    if(password_verify($password, $hashed_password)) {
                        return true; // Password is correct
                    } else {
                        return false; // Password is incorrect
                    }
                }
            } else {
                return false; // Username does not exist
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
            return false;
        }
        $stmt->close();
    }
}
?>
