<?php
$servername = "localhost";
$username = "root"; 
$password = "";
$dbname = "library"; 

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM borrowings";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Borrowers Table</title>
    <link rel="stylesheet" type="text/css" href="styleF.css">
</head>
<body>
    <table align="center" border="1" style="width:600px; line-height:40px;">
        <tr>
            <th>Borrow ID</th>
            <th>Member ID</th>
            <th>Book ID</th>
            <th>Borrow Date</th>
            <th>Return Date</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['borrowing_id'] . "</td>";
                echo "<td>" . $row['member_id'] . "</td>";
                echo "<td>" . $row['book_id'] . "</td>";
                echo "<td>" . $row['borrow_date'] . "</td>"; 
                echo "<td>" . $row['return_date'] . "</td>";       
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
$conn->close();
?>
