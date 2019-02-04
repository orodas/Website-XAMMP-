<?php

$user = "";
$password = "";

$connect = mysqli_connect("localhost","root",$password);

$inputuser = mysqli_real_escape_string($connect, $_POST['user']);
$inputpass = mysqli_real_escape_string($connect, $_POST['pass']);

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
 //else
	 //echo "success";
 
 mysqli_select_db($connect, "accounts"); //or ("Database not found");
 
if ($result = mysqli_query($connect, "SELECT DATABASE()")) {
	$row = mysqli_fetch_row($result);
    //printf("Default database is %s.\n", $row[0]);
    mysqli_free_result($result);
}

$query = "SELECT * FROM users WHERE user = '$inputuser' AND password = '$inputpass'";

$result = mysqli_query($connect, $query);

if (!$result) {
    printf("Error: \n");
    exit();
}

$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

$serveruser = $row["user"];
$serverpass = $row["password"];

if($serveruser != null && $serverpass != null){
	session_start();
	$_SESSION['loggedin'] = true;
	$_SESSION['username'] = $serveruser;
	header('Location: Home.php');
}
else {
	header('Location: Fail.php');
}

//echo $serveruser;
//echo $serverpass;

mysqli_free_result($result);
mysqli_close($connect);

?>
