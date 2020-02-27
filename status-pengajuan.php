<?php
require_once("templates/header.php");
session_start();
?>

<?php
	// session_start();
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

		$sql = "SELECT no, title, author, category, description, file, upload_date, status FROM $table where user_id = '".$_SESSION["namauser"]."'";

		if(!$result = mysqli_query($conn, $sql)) {
			die("Error: $sql");
		}
		mysqli_close($conn);
		return $result;
	}

	function publishedBook($table) {
		$conn = connectDB();

		$sql = "SELECT t.no, t.title, t.author, t.category, t.description, b.publish_date, t.status, b.book_id FROM $table t
				INNER JOIN book b on b.upload_id = t.no
				WHERE user_id = '".$_SESSION["namauser"]."'";

		if(!$result = mysqli_query($conn, $sql)) {
			die("Error: $sql");
		}
		mysqli_close($conn);
		return $result;
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

<br>
<div class="status-pengajuan-detail section-mini-margin">
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
                <li>
                  <a href="lihat-profil.php">Profil</a>
                </li>
                <li>
                  <a href="edit-password.php">Edit Password</a>
                </li>
                <li class="active-profil">
                  <a href="status-pengajuan.php">Status Pengajuan</a>
                </li>
                <li>
                  <a href="buku-saya.php">Buku Saya</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-9">
        <h1 class="register-title">Status Pengajuan</h1>

        <h2>Menunggu Proses Pengajuan</h2>

        <div class="table-details">
          <table class="table table-hover table-bordered table-responsive">
            <thead>
              <tr>
                <th class="text-center tabel-header">Judul Buku</th>
                <th class="text-center tabel-header">Kategori</th>
                <th class="text-center tabel-header">Tanggal Unggah</th>
                <th class="text-center tabel-header">Status</th>
                <th class="text-center tabel-header">Aksi</th>
              </tr>
            </thead>
            <?php
  						$daftarbuku = daftarBuku("unggah");
  						if (mysqli_num_rows($daftarbuku) > 0) {
  							while ($row = mysqli_fetch_assoc($daftarbuku)) {
  								$olddate = $row['upload_date'];
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
  								if($row['status'] == "Dalam Proses Review"  || $row['status'] == "Dalam Proses Penyuntingan") {
  									echo'
  									<tbody>
  									<tr>
  										<td class="text-center">'.$row['title'].'</td>
  										<td class="text-center">'.$row['category'].'</td>
  										<td class="text-center">'.$tanggal.'</td>
  										<td class="text-center">'.$row['status'].'</td>
  										<td class="text-center"><a class="btn btn-info" href="status-pengajuan-detail.php?id='.$row['no'].'"><i class="fa fa-info"></i>&nbsp;&nbsp;Detail</a></td>

  									</tr>
  									</tbody>';
  								}
  							}
  						}

  					?>
          </table>
        </div>

        <h2>Sudah Diterbitkan</h2>


        <div class="table-details">
          <table class="table table-hover table-bordered table-responsive">
            <thead>
              <tr>
                <th class="text-center tabel-header">Judul Buku</th>
                <th class="text-center tabel-header">Kategori</th>
                <th class="text-center tabel-header">Tanggal Terbit</th>
                <th class="text-center tabel-header">Status</th>
                <th class="text-center tabel-header">Jumlah Terjual</th>
                <th class="text-center tabel-header">Aksi</th>
              </tr>
            </thead>
            <?php
						$daftarbuku = publishedBook("unggah");  
  						if (mysqli_num_rows($daftarbuku) > 0) {
  							while ($row = mysqli_fetch_assoc($daftarbuku)) {
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
										if($row['status'] == "Sudah Diterbitkan") {
											echo'
												<tbody>
												<tr>
													<td class="text-center">'.$row['title'].'</td>
													<td class="text-center">'.$row['category'].'</td>
													<td class="text-center">'.$tanggal.'</td>
													<td class="text-center">'.$row['status'].'</td>
													<td class="text-center">'.$row_sold['terjual'].'</td>
													<td class="text-center"><a class="btn btn-info" href="status-pengajuan-detail-published.php?id='.$row['no'].'">Detail</a></td>
												</tr>
												</tbody>';
										}
									}
								}
  							}
  						}
  					?>
          </table>
        </div>
      </div>


    </div>


  </div>
</div>

<?php
require_once("templates/footer.php");
?>