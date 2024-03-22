<?php
// Database connection parameters
$servername = "localhost"; // Replace with your database server name
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "library"; // Replace with your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch data
$sql = "SELECT * FROM members"; // Replace with your table name
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Members Table</title>
    <link rel="stylesheet" type="text/css" href="styleF.css">
</head>
<body>
    <table align="center" border="1" style="width:600px; line-height:40px;">
        <tr>
            <th>Member ID</th>
            <th>Member Name</th>
            <th>Contact Details</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['member_id'] . "</td>";
                echo "<td>" . $row['member_name'] . "</td>"; 
                echo "<td>" . $row['contact_details'] . "</td>";       
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'>0 results</td></tr>";
        }
        ?>
    </table>
</body>
</html>
<?php
// Close the connection
$conn->close();
?>
