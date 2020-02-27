<?php
    session_start();
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
    function pinjamBuku($book_id, $user_id) {
        $conn = connectDB();
        $sqlsubmission = "DELETE from submission where book_id = $book_id and user_id = $user_id";

        if(!$result = mysqli_query($conn, $sqlsubmission)) {
            die("Error: $sqlsubmission");
        }
        mysqli_close($conn);
        header("Location: ../cart.php");
    }
    if (isset($_GET['id'])) {
        pinjamBuku($_GET['id'],$_SESSION["user_id"]);
    }
    else {
        echo  "<script type='text/javascript'>alert('Hapus barang pada cart gagal');window.location = '../shop.php';</script>";
    }
?>