<?php  
session_start();
 $connect = mysqli_connect("localhost", "root", "", "lists");  
 $id = $_POST["id"];  
 $text = $_POST["text"];  
 $column_name = $_POST["column_name"];
$cuser = $_SESSION['username']; 
 $sql = "UPDATE items SET ".$column_name."='".$text."' , user = '".$cuser."' WHERE ID ='".$id."'"; 
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Updated';  
 }  
 ?>
