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
if (isset($_GET['id'])) {
    $no = $_GET['id'];
  }
  else {
    echo  "<script type='text/javascript'>alert('Publikasi Buku Gagal');window.location = '../unduh.php';</script>";
  }
$conn = connectDB();
$sql = "UPDATE unggah SET status = 'Sudah Diterima' where no = $no";

if($result = mysqli_query($conn, $sql)) {
    echo  "<script type='text/javascript'>alert('Publikasi Buku Berhasil');window.location = '../unduh.php';</script>";
} 
else {
    die("Error: $sql");
}
?>