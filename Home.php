<html>
<!--
<body background="polybg.jpg"> -->
<body style="background-color:powderblue;">

<div align="center">
<title>Welcome to the application</title>
<h3>Welcome</h3>
</div>

<div align="center">
Hello world, this is a test of my new website
</div>

<div align="right">
<form action="index.html">
<input type="submit" value = "Log out"></input>
</form></div><br>

<div align="center"> 
<!--
<form action="upload.html" method="POST">
<input type = "submit" value="Upload image"></input></form>
<form action="mylist.php" method="POST">
<input type = "submit" value="My list"></input></form>
<form action="editlist.html" method="POST">
<input type = "submit" value="Edit list"></input></form>
-->
<form action="deleteitem.php" method="POST">
<input type = "submit" value="My List"></input></form>
</div><br>

<?php
session_start();
echo "Welcome back, " . $_SESSION['username'] . "!";
?>
</body>
</html>
