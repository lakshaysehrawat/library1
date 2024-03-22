<?php
$server_name = "localhost";
$username = "root";
$password = "";
$database_name = "library";

$conn = mysqli_connect($server_name, $username, $password, $database_name);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

if (isset($_POST['save'])) {
    $book_id = $_POST['book_id'];
    $title = mysqli_real_escape_string($conn, $_POST['title']); 
    $author_id = $_POST['author_id'];
    $isbn = mysqli_real_escape_string($conn, $_POST['isbn']); 
    $availability = $_POST['availability'];

    $sql_query = "INSERT INTO books (book_id, title, author_id, isbn, availability)
                  VALUES ('$book_id', '$title', '$author_id', '$isbn', '$availability')";

    if (mysqli_query($conn, $sql_query)) {
        echo "New Details Entry inserted successfully!";
    } else {
        echo "Error: " . $sql_query . " " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
