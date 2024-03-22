<?php
$server_name="localhost";
$username="root";
$password="";
$database_name="library";

$conn=mysqli_connect($server_name,$username,$password,$database_name);
//now check the connection
if(!$conn)
{
	die("Connection Failed:" . mysqli_connect_error());

}

if(isset($_POST['save']))
{	
	 $author_id = $_POST['author_id'];
	 $author_name = $_POST['author_name'];
	
	 $sql_query = "INSERT INTO authors (author_id,author_name)
	 VALUES ('$author_id','$author_name')";

	 if (mysqli_query($conn, $sql_query)) 
	 {
		echo "New Details Entry inserted successfully !";
	 } 
	 else
     {
		echo "Error: " . $sql . "" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>