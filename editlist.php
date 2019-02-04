<?php

session_start();
$user = "";
$password = "";

$connect = mysqli_connect("localhost","root",$password);
$inputitem = mysqli_real_escape_string($connect, $_POST["new_item"]);

if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " ;
}


mysqli_select_db($connect, "lists"); //or ("Database not found");

if ($result = mysqli_query($connect, "SELECT DATABASE()")) {
    $row = mysqli_fetch_row($result);
    //printf("Default database is %s.\n", $row[0]);
}
$cuser = $_SESSION['username'];

$query = "INSERT INTO items (user, val) VALUES ('$cuser', '$inputitem')";


//$result = mysqli_query($connect, $query);
if(mysqli_query($connect, $query))
	echo "Item Added";

else
	echo "error";



//header('Location: Home.php');
mysqli_close($connect);

 
?>
