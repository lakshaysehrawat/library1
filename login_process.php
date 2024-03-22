<?php
// login_process.php

// Include database connection code
$server_name = "localhost";
$username = "root";
$password = "";
$database_name = "library";

$conn = mysqli_connect($server_name, $username, $password, $database_name);

// Check the connection
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}
// Adjust the filename as needed

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Query the database to check user credentials
    $select_query = "SELECT id, username, password, salt, role FROM users WHERE username = ?";
    $stmt = $conn->prepare($select_query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    // Check if a user with the provided username exists
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $db_username, $db_password, $salt, $role);
        $stmt->fetch();

        // Hash the provided password with the stored salt
        $hashed_password = hash("sha256", $password . $salt);

        // Check if the hashed password matches the stored password
        if ($hashed_password === $db_password) {
            // Login successful
            session_start();

            // Store user information in the session
            $_SESSION["user_id"] = $id;
            $_SESSION["username"] = $db_username;
            $_SESSION["role"] = $role;

            // Redirect to the dashboard
            header("Location: dashboard.php");
            exit();
        } else {
            // Invalid password
            echo "Invalid password.";
        }
    } else {
        // User not found
        echo "User not found.";
    }

    // Close the statement
    $stmt->close();
    
    // Close the database connection
    $conn->close();
}
?>

