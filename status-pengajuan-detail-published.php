<?php
  require_once("templates/header.php");
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

	if (isset($_GET['id'])) {
		$no = $_GET['id'];
	  }
	else {
		header('Location:status-pengajuan.php');
  }

  function sold($id) {
		$conn = connectDB();

		$sql = "SELECT count(*) AS terjual FROM purchase WHERE book_id = '".$id."'";

		if(!$result = mysqli_query($conn, $sql)) {
			die("Error: $sql");
		}

		mysqli_close($conn);
		return $result;
	}
?>

<div class="status-pengajuan-detail section-margin">
  <div class="container">

    <div class="row">
      <div class="col-md-3">
        <div class="item">
          <div class="card  text-center card-product-details">
            <img class='card-img-top img-circle img-fluid' src='images/avatar.png' alt='card-img'>
            <!-- <h2>Nando Putra Pratama</h2> -->
          </div>
        </div>

        <div class="panel panel-default sidebar-menu">
          <div class="panel-harga">
            <div class="panel-heading text-center">
              <h3 class="panel-title">
              <?php
                if (isset($_SESSION["user_id"])){
                  $conn = connectDB();
                  $query = mysqli_query($conn, "SELECT nama_lengkap FROM user WHERE user_id = '".$_SESSION["user_id"]."'");
                  $name = mysqli_fetch_assoc($query);
                  echo $name['nama_lengkap'];
                }
              ?>
              </h3>
            </div>

            <div class="panel-body">
              <ul class="nav nav-pills nav-stacked category-menu">
                <?php
                      if ($_SESSION["role"] === "editor"){
                        echo'
                        <li>
                          <a href="lihat-profil.php">Profil</a>
                        </li>
                        <li>
                          <a href="edit-password.php">Edit Password</a>
                        </li>
                          <li class="active-profil">
                            <a href="daftar-pengajuan.php">Daftar Pengajuan</a>
                          </li>

                        ';
                      }else{
                        echo'
                        <li class="active-profil">
                          <a href="lihat-profil.php">Profil</a>
                        </li>
                        <li>
                          <a href="edit-password.php">Edit Password</a>
                        </li>
                        <li>
                          <a href="status-pengajuan.php">Status Pengajuan</a>
                        </li>
                        <li>
                          <a href="buku-saya.php">Buku Saya</a>
                        </li>
                        ';
                      }
                    ?>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <?php
			$conn = connectDB();
			$query = "SELECT u.*, b.book_id, b.publish_date FROM unggah u
                INNER JOIN book b on b.upload_id = u.no
                where no = '$no'";
      $detail_publish = mysqli_query($conn, $query);

      if (mysqli_num_rows($detail_publish) > 0) {
        $row = mysqli_fetch_assoc($detail_publish);
        $book_id = $row['book_id'];
        $sold = sold("$book_id");
        if (mysqli_num_rows($sold) > 0) {
          while ($row_sold = mysqli_fetch_assoc($sold)){
            $olddate = $row['publish_date'];
            $bulan = array (1 =>   	'Januari',
                                    'Februari',
                                    'Maret',
                                    'April',
                                    'Mei',
                                    'Juni',
                                    'Juli',
                                    'Agustus',
                                    'September',
                                    'Oktober',
                                    'November',
                                    'Desember'
                            );
            $split = explode('-', $olddate);
            $tanggal = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
            echo'

            <div class="col-md-9">
              <h1 class="register-title">Status Pengajuan</h1>

              <div class="table-details">
                <table class="table detail-pengajuan table-hover table-bordered table-responsive">
                  <tbody>
                    <tr>
                      <td><strong>Judul Buku</strong></td>
                      <td id="judulBuku">'.$row['title'].'</td>
                    </tr>
                    <tr>
                      <td><strong>Nama Penulis</strong></td>
                      <td id="namaPenulis">'.$row['author'].'</td>
                    </tr>
                    <tr>
                      <td><strong>Kategori</strong></td>
                      <td id="kategori">'.$row['category'].'</td>
                    </tr>
                    <tr>
                      <td><strong>Deskripsi/Sinopsis Buku</strong></td>
                      <td id="deskripsiBuku">'.$row['description'].'</td>
                    </tr>
                    <tr>
                      <td><strong>Tanggal Terbit</strong></td>
                      <td id="tanggalUpload">'.$tanggal.'</td>
                    </tr>
                    <tr>
                      <td><strong>Jumlah Terjual</strong></td>
                      <td id="terjual">'.$row_sold['terjual'].'</td>
                    </tr>
                    <tr>
                      <td><strong>Status Pengajuan</strong></td>
                      <td id="status"><h4 class="status">'.$row['status'].'</h4></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>';
          }
        }
			}
		  ?>


    </div>


  </div>
</div>

<?php
  require_once("templates/footer.php");
?>
