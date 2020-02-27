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
	
	function detailBuku($no) {
		
		$conn = connectDB();
		
		$sql = "SELECT * FROM unggah WHERE no = $no";
		
		if(!$result = mysqli_query($conn, $sql)) {
			echo "error";
			die("Error: $sql");
		}
		
		$row = mysqli_fetch_row($result);
		mysqli_close($conn);
		$row = array_map('utf8_encode', $row);
		return json_encode($row);
		
	}
	
	// function bookPurchase($book_id) {
		
	// 	$conn = connectDB();
		
	// 	$sql = "SELECT * FROM purchase WHERE book_id = $book_id";
		
	// 	if(!$result = mysqli_query($conn, $sql)) {
	// 		die("Error: $sql");
	// 	}else if (mysqli_num_rows($result = mysqli_query($conn, $sql)) == 0){
	// 		return "[]";
	// 	}
	// 	n$hasil = "[";
	// 	while ($row = mysqli_fetch_row($result)){
	// 		$hasil .= json_encode($row).",";
	// 	}
	// 	$hasil = substr($hasil,0,strlen($hasil)-1);
	// 	$hasil .= "]";
	// 	mysqli_close($conn);
	// 	return $hasil;
		
	// }
	
	// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// 	if ($_POST['command'] === 'detail'){
	// 		$_SESSION['book_id'] = $_POST['book_id'];
	// 		$detail = detailBuku($_POST['book_id']);
	// 		echo $detail;
	// 	}else if ($_POST['command'] === 'purchase'){
	// 		$purchase = bookPurchase($_POST['book_id']);
	// 		echo $purchase;
	// 	}else if ($_POST['command'] === 'komentar'){
	// 		$komen = komenBuku($_POST['book_id'],$_POST['user_id'],$_POST['content']);
	// 		echo $komen;
	// 	}	
	// }
?>