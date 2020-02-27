<?php
require_once("templates/header.php");
?>

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

function myBook($table) {
  $conn = connectDB();

  $sql = "SELECT t.purchase_id, t.book_id, t.user_id, t.date, b.title, b.category, u.file FROM $table t
          INNER JOIN book b ON b.book_id = t.book_id
          INNER JOIN unggah u ON u.no = b.upload_id
          WHERE t.user_id = ".$_SESSION["user_id"]."";

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
                <li>
                  <a href="lihat-profil.php">Profil</a>
                </li>
                <li>
                  <a href="edit-password.php">Edit Password</a>
                </li>
                <li>
                  <a href="status-pengajuan.php">Status Pengajuan</a>
                </li>
                <li class="active-profil">
                  <a href="buku-saya.php">Buku Saya</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-9">
        <h1 class="register-title">Buku Saya</h1>

        <h2>Daftar Pembelian Buku Saya</h2>

        <div class="table-details">
          <table class="table table-hover table-bordered table-responsive">
            <thead>
              <tr>
                <th class="text-center tabel-header">Judul Buku</th>
                <th class="text-center tabel-header">Kategori</th>
                <th class="text-center tabel-header">Tanggal Beli</th>
                <th colspan="3" class="text-center tabel-header">Aksi</th>
              </tr>
            </thead>
            <?php
  						$daftarbuku = myBook("purchase");
  						if (mysqli_num_rows($daftarbuku) > 0) {
                while ($row = mysqli_fetch_assoc($daftarbuku)) {
                  $olddate = $row['date'];
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
                  echo '
                  <tbody>
                    <tr>
                      <td class="text-center">'.$row['title'].'</td>
                      <td class="text-center">'.$row['category'].'</td>
                      <td class="text-center">'.$tanggal.'</td>
                      <td class="text-center"><a type="button" class="btn btn-info" href="buku-saya-detail.php?id='.$row['purchase_id'].'"> <i class="fa fa-info"></i>&nbsp; Detail </a></td>
                      <td class="text-center"><a href="services/preview.php?id='.$row['file'].'" type="button" class="btn btn-warning"> <i class="fa fa-book"></i>&nbsp;Baca</button></td>
                      <td class="text-center"><a href="services/download.php?id='.$row['file'].'" type="button" class="btn btn-success"> <i class="fa fa-download"></i>&nbsp;Download</button></td>
                    </tr>
                  </tbody>
                  ';
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
