<?php  
 $connect = mysqli_connect("localhost", "root", "", "lists");  
 $sql = "DELETE FROM items WHERE ID = '".$_POST["id"]."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Deleted';  
 }  
 ?>
