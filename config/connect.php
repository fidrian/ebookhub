<?php
$servername = "sql12.freesqldatabase.com";
$username = "sql12313869";
$password = "qy1jlUjdiy";
$dbname = "sql12313869";
		
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
		
// Check connection
if (!$conn) {
	die("Connection failed: " + mysqli_connect_error());
}
return $conn;
?> 