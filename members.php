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
	 $member_id = $_POST['member_id'];
	 $member_name = $_POST['member_name'];
	 $contact_details= $_POST['contact_details'];

	 $sql_query = "INSERT INTO members (member_id,member_name,contact_details)
	 VALUES ('$member_id','$member_name','$contact_details')";

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