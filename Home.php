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
<input type="submit" value = "Log out">
</div>
<?php
session_start();
echo "Welcome back, " . $_SESSION['username'] . "!";
?>
</body>
</html>