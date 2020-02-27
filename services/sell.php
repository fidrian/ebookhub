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

	function daftarBuku($table) {
		$conn = connectDB();
		
		$sql = "SELECT book_id, img_path, title, author, publisher, quantity FROM $table";
		
		if(!$result = mysqli_query($conn, $sql)) {
			die("Error: $sql");
		}
		mysqli_close($conn);
		return $result;
	}

    function insertBuku($idUnggah) {
		$conn = connectDB();
		
		$displayBuku = $_POST['displayBuku'];
		$judulBuku = $_POST['judulBuku'];
		$pengarangBuku = $_POST['pengarangBuku'];
		$penerbitBuku = $_POST['penerbitBuku'];
		$deskripsiBuku = $_POST['deskripsiBuku'];
		$stokBuku = $_POST['stokBuku'];

		$kategori = $_POST['kategori'];
		$isbn = $_POST['isbn'];
		$sku = $_POST['sku'];
		$target_dir = __DIR__ . "/../file_buku/";
		$name_file = $_FILES["fileEditor"]["name"];
		$target_file = $target_dir . basename($name_file);
		$uploadOk = 1;
		$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if file is on .doc or .docx format
		$type_apr = array('pdf','epug', 'mobi');
		$x = explode('.', $name_file);
		$ekstensi = strtolower(end($x));
		if(isset($_POST["submit"])) {
			if(in_array($ekstensi, $type_apr) === true) {
				echo "File is a document.";
				$uploadOk = 1;
			} else {
				echo "File is not a document.";
				$uploadOk = 0;
			}
		}
		// Check if file already exists
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}
		// Check file size
		if ($_FILES["fileEditor"]["size"] > 52428800) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		// Allow certain file formats
		if($fileType != "epug" && $fileType != "mobi" && $fileType != "pdf"
		&& $fileType != "txt" ) {
			echo "Sorry, only EPUG, MOBI, PDF, TXT files are allowed.";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["fileEditor"]["tmp_name"], $target_file)) {
				$filename = $_FILES["fileEditor"]["name"];
				echo "The file ". basename( $filename). " has been uploaded.";
				$daftarbuku = daftarBuku("book");
				$sdhAda = false;
				$bookid = 0;
				while ($row = mysqli_fetch_row($daftarbuku)) {	
					if($row[2] == $judulBuku) {
						$sdhAda = true;
						$bookid = $row[0];
						break;
					}
				}
				$_SESSION["titlebookadded"] = $judulBuku;
				
				if($sdhAda == true) {
					echo  "<script type='text/javascript'>alert('Buku Sudah Ada');</script>";
				} else {
					$name_buku = "file_buku/".$_FILES["fileCover"]["name"];
					$target_buku = $target_dir . basename($name_buku);
					if (move_uploaded_file($_FILES["fileCover"]["tmp_name"], $target_buku)) {
						$tanggalUpload = date("Y-m-d");
						$sql = "INSERT into book (img_path, title, author, publisher, description, quantity, category, publish_date, upload_id, isbn, sku) values('$name_buku', '$judulBuku', '$pengarangBuku', '$penerbitBuku', '$deskripsiBuku', $stokBuku, '$kategori', '$tanggalUpload', '$idUnggah', '$isbn', '$sku');";
						$diterima = 'Sudah Diterbitkan';
						$sql .= "UPDATE unggah SET status = '$diterima', file = '$filename' WHERE no = '$idUnggah'";
						// Execute multi query
						if (mysqli_multi_query($conn,$sql))
						{
						do
							{
							// Store first result set
							if ($result=mysqli_store_result($con)) {
							// Fetch one and one row
							while ($row=mysqli_fetch_row($result))
								{
									echo "New record created successfully <br/>";
								}
							// Free result set
							mysqli_free_result($result);
							}
							}
						while (mysqli_next_result($con));
						}
						// $_SESSION['fileEditor'] = $filename;
						// header("Location: ./update.php");
						header("Location: ../daftar-pengajuan.php");
					}else{
						echo  "<script type='text/javascript'>alert('Upload Cover Error');</script>";
					}
				}
				mysqli_close($conn);
			} else {
				echo "Sorry, there was an error ". $_FILES['fileEditor']['error']. " uploading your file.";
			}
		}
	}
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if($_POST['command'] === 'insert') {
			insertBuku($_POST['idUnggah']);
		}
	}
?>