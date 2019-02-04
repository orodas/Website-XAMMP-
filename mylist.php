<?php

session_start();
$user = "";
$password = "";

$connect = mysqli_connect("localhost","root",$password);

if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
//else
	//echo "success";
 
mysqli_select_db($connect, "lists"); //or ("Database not found");

if ($result = mysqli_query($connect, "SELECT DATABASE()")) {
	$row = mysqli_fetch_row($result);
    //printf("Default database is %s.\n", $row[0]);
    mysqli_free_result($result);
}
$cuser = $_SESSION['username'];
$query = "SELECT * FROM items WHERE user = '$cuser'";

$result = mysqli_query($connect, $query);

if (!$result) {
    printf("Error: \n");
    exit();
}
if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		echo ($row["val"] . "<br>");
	}
}
mysqli_free_result($result);
mysqli_close($connect);

?>
