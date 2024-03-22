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

if (isset($_POST['save'])) {
    $borrowing_id = $_POST['borrowing_id'];
    $member_id = $_POST['member_id'];
    $book_id = $_POST['book_id'];
    $borrow_date = $_POST['borrow_date'];
    $return_date = $_POST['return_date'];

    $sql_query = "INSERT INTO borrowings (borrowing_id, member_id, book_id, borrow_date, return_date)
                  VALUES ('$borrowing_id', '$member_id', '$book_id', '$borrow_date', '$return_date')";

    if (mysqli_query($conn, $sql_query)) {
        echo "New Details Entry inserted successfully!";
    } else {
        echo "Error: " . $sql_query . " " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
