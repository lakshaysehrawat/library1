
// register_process.php

// Include database connection code
<?php
$server_name = "localhost";
$username = "root";
$password = "";
$database_name = "library";

$conn = mysqli_connect($server_name, $username, $password, $database_name);

// Check the connection
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $id = $_POST["id"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Check if passwords match
    if ($password !== $confirm_password) {
        die("Passwords do not match.");
    }

    // Hash and salt the password
    $salt = bin2hex(random_bytes(32));
    $hashed_password = hash("sha256", $password . $salt);

    // Insert user data into the "users" table
    // Execute SQL query
    // ...

// Insert user data into the "users" table
// Execute SQL query
$insert_query = "INSERT INTO users (id, username, password, salt) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($insert_query);

// Bind parameters with their data types
$stmt->bind_param("ssss", $id, $username, $hashed_password, $salt);

// Execute the statement
if ($stmt->execute()) {
    // Registration successful
    // Redirect to login page
    header("Location: login.php");
    exit();
} else {
    // Registration failed
    echo "Error: " . $stmt->error;
}

// Close the statement
$stmt->close();

// Close the database connection
$conn->close();}
?>
