<?php

$user = "";
$password = "";

$connect = mysqli_connect("localhost","root",$password);
$inputuser = mysqli_real_escape_string($connect, $_POST['nuser']);
$inputpass = mysqli_real_escape_string($connect, $_POST['npass']);
$inputcpass = mysqli_real_escape_string($connect, $_POST['cnpass']);

if(strcmp($inputpass,$inputcpass) != 0){
	header("Location:Rfail.php");
	exit();
}

if(empty($inputpass) || empty($inputuser)){
	header("Location:Ufail.php");
	exit();
}

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " ;
  }
 else
	 echo "success";
 
 mysqli_select_db($connect, "accounts"); //or ("Database not found");
 
 if ($result = mysqli_query($connect, "SELECT DATABASE()")) {
    $row = mysqli_fetch_row($result);
    printf("Default database is %s.\n", $row[0]);
    mysqli_free_result($result);
}
$query = "SELECT * FROM users WHERE user = '$inputuser'";
$insquery = "INSERT INTO users (user, password) Values ('$inputuser', '$inputpass')";

$result = mysqli_query($connect, $query);

if (!$result) {
    printf("Error: \n");
    exit();
}

$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

$serveruser = $row["user"];

if($serveruser != null){
	header('Location: Ufail.php');
	exit();
}
else {
	if (mysqli_query($connect, $insquery)) {
		echo "Registered successfully";
	} 
	else {
		echo "Error: did not insert"; //. $insquery . "<br>" . mysqli_error($connect);
	}
	
	header('Location: index.html');
}
mysqli_free_result($result);
mysqli_close($connect);

?>