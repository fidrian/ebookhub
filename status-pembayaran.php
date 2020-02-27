<?php
  require_once("templates/header.php");
?>

<?php 
  session_start();
	function connectDB() {
		// require 'config/connect.php';
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

  function selectRowsFromSubmission() {
    $conn = connectDB();
  
    $sql = "SELECT * FROM submission WHERE user_id = ".$_SESSION["user_id"]."";
    if(!$result = mysqli_query($conn, $sql)) {
      die("Error: $sql");
    }
    mysqli_close($conn);
    return $result;
  }
  
  function selectBooks() {
    $pinjam = selectRowsFromSubmission();
    $arraysubmission = array();
    while ($baris = mysqli_fetch_row($pinjam)) {
      array_push($arraysubmission, $baris[1]);
    }
    return $arraysubmission;
  }
  
  function selectAllFromBook($book_id) {
    $conn = connectDB();
  
    $sql = "SELECT * FROM book WHERE book_id = $book_id";
    if(!$result = mysqli_query($conn, $sql)) {
      die("Error: $sql");
    }
    mysqli_close($conn);
    return $result;
  }

?>

<div class="register">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="register-title">Status Pembayaran?</h1>
        
        <div class="btn-metode-pembayaran">
        <div class="row">
            <div class="col-md-6">
              <a href="buku-saya.php" class="btn btn-success btn-block btn-register btn-lg">SUCCESS</a>
              <?php 
                $conn = connectDB();
                $user_id = $_SESSION['user_id'];
                $datePaid = date("Y-m-d");
                if (isset($_GET['id'])) {
                  $no = $_GET['id'];
                  $query = mysqli_query($conn, "INSERT INTO purchase (book_id, user_id, date) VALUES ('$no', '$user_id', '$datePaid')");
                }else{
                  $arraybook = selectBooks();
                  $gabungan = "INSERT INTO purchase (book_id, user_id, date) VALUES ";
                  for ($i=0; $i < count($arraybook) - 1; $i++) {
                    $buku = selectAllFromBook($arraybook[$i]);
                    while ($row = mysqli_fetch_row($buku)) {
                      $gabungan .= "('$row[0]', '$user_id', '$datePaid'), ";
                    }
                  }
                  for ($i=count($arraybook) - 1; $i < count($arraybook); $i++) {
                    $buku = selectAllFromBook($arraybook[$i]);
                    while ($row = mysqli_fetch_row($buku)) {
                      $gabungan .= "('$row[0]', '$user_id', '$datePaid')";
                    }
                  }
                  $query = mysqli_query($conn, $gabungan);
                }
              ?>
              
            </div>
            <div class="col-md-6">
              <a href="buku-saya.php" class="btn btn-danger btn-block btn-register btn-lg">FAILED</a>
            </div>
          </div>
        </div>
                 
      </div>

      <div class="col-md-9 form-register-group">
        <form>
        </form>
      </div>

    </div>


  </div>
</div>

<?php
  require_once("templates/footer.php");
?>
