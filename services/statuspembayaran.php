

<?php
	
	function connectDB() {
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
	}
	function byrsuccess(){
		$conn = connectDB();
		$sql = "UPDATE user SET status_pembayaran='success' WHERE username='".$username."'";

		if(!$result = mysqli_query($conn, $sql)) {
			die("Error: $sql");
		  }
		  mysqli_close($conn);

		  return $result;
	}

	function byrfailed(){
		$conn = connectDB();
		$sql = "UPDATE user SET status_pembayaran='failed' WHERE username='".$username."'";

		if(!$result = mysqli_query($conn, $sql)) {
			die("Error: $sql");
		  }
		  mysqli_close($conn);

		  return $result;
	}

	if ($conn->query($sql) === TRUE) {
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . $conn->error;
	}
	
	$conn->close();	
?>
