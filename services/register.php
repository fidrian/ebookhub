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
    
    function daftarUser($table) {
		$conn = connectDB();
		
		$sql = "SELECT * FROM $table";
		
		if(!$result = mysqli_query($conn, $sql)) {
			die("Error: $sql");
		}
		mysqli_close($conn);
		return $result;
	}
	
	if($_SERVER["REQUEST_METHOD"] == "POST") {
        $conn = connectDB();
		// username and password sent from form 
		session_start();
		
		// $username = $_POST['username'];
		$username = $_POST['pengguna'];
		$email = $_POST['email'];
		$nama_lengkap = $_POST['lengkap'];
        $password = $_POST['password']; 
		// $role = strtolower($_POST['role']); 
		$role = "user"; 
        
        $daftaruser = daftarUser("user");
		$sdhAda = false;
		$last = 0;
		while ($row = mysqli_fetch_row($daftaruser)) {	
			if($row[1] == $username) {
				$sdhAda = true;
				break;
			}
			$last = $row[0];
		}
        $_SESSION["namauser"] = $username;
        $_SESSION["email"] = $email;
        $_SESSION["nama_lengkap"] = $nama_lengkap;
		$_SESSION["role"] = $role;
		$_SESSION["user_id"] = $last + 1;
		
		if($sdhAda == true) {
			echo  "<script type='text/javascript'>alert('Register Gagal, username sudah ada');window.location = '../register.php';</script>";
		} else {
			$sql = "INSERT INTO user(username, password, role, email, nama_lengkap) VALUES('$username', '$password', LOWER('$role'), '$email', '$nama_lengkap')";
		}

		if($result = mysqli_query($conn, $sql)) {
			if ($row["role"] === "user"){
				header("Location: ../shop.php");
			}else if ($row["role"] === "penulis"){
				header("Location: ../upload.php");
			}else if ($row["role"] === "editor"){
				header("Location: ../unduh.php");
			}else if ($row["role"] === "admin"){
				header("Location: statistik.php");
			}
			else{
				header("Location: ../landing.php");
			}
		} else {
		    die("Error: $sql");
		}
		mysqli_close($conn);
					
	}
	
?>