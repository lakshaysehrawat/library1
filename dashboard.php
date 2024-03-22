<?php
// dashboard.php

// Include session start and role-based access control

// Display user-specific data from the database
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
</head>
<body>
    <h2>Welcome to the Dashboard, <?php echo $_SESSION["username"]; ?>!</h2>
    <!-- Display user-specific data here -->
    <br>
    <a href="logout.php">Logout</a>
</body>
</html>
