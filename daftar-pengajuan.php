<?php
require_once("templates/header.php");

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

  $sql = "SELECT no, title, author, category, description, file, upload_date, status FROM $table";

  if(!$result = mysqli_query($conn, $sql)) {
    die("Error: $sql");
  }
  mysqli_close($conn);
  return $result;
}
?>

<div class="daftar-pengajuan section-margin">
  <div class="container">

    <div class="row">
      <div class="col-md-3">
        <div class="item">
          <div class="card  text-center card-product-details">
            <img class='card-img-top img-circle img-fluid' src='images/avatar.png' alt='card-img'>
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
                    <a href="daftar-pengajuan.php">Daftar Pengajuan</a>
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
                <th class="text-center tabel-header">Nama Penulis</th>
                <th class="text-center tabel-header">Status</th>
                <th class="text-center tabel-header">Tanggal Unggah</th>
                <th colspan="2" class="text-center tabel-header">Aksi</th>
              </tr>
            </thead>
            <tbody>
            <?php
              $daftarbuku = daftarBuku("unggah");
              while ($row = mysqli_fetch_array($daftarbuku)) {
                if($row[7] == "Dalam Proses Review" || $row[7] == "Dalam Proses Penyuntingan") {
                  $olddate = $row[6];
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
                  <tr>
                  <td class="text-center">'.$row[1].'</td>
                  <td class="text-center">'.$row[2].'</td>
                  <td class="text-center">'.$row[7].'</td>
                  <td class="text-center">'.$tanggal.'</td>
                  <td class="text-center"><a href="services/download.php?id='.$row[5].'"><button type="button" class="btn btn-primary" ><i class="fa fa-download"></i> &nbsp;Unduh</button></a></td>
                  <td class="text-center"><a href="status-pengajuan-detail-editor.php?id='.$row[0].'"><button type="button" class="btn btn-warning" > <i class="fa fa-edit"></i> &nbsp;Update</button></a></td>
                </tr>
                  ';
                }
              }
            ?>
            </tbody>
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
                <th class="text-center tabel-header">Aksi</th>
              </tr>
            </thead>
            <tbody>
            <?php
              $daftarbuku = daftarBuku("unggah");
              while ($row = mysqli_fetch_array($daftarbuku)) {
                if($row[7] == "Sudah Diterbitkan") {
                  $conn = connectDB();
                  $publish = mysqli_query($conn, "SELECT publish_date FROM book WHERE upload_id = '$row[0]'");
                  while ($pd = mysqli_fetch_array($publish)) {
                    $olddate = $pd['publish_date'];
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
                  }
                  echo '
                  <tr>
                  <td class="text-center">'.$row[1].'</td>
                  <td class="text-center">'.$row[3].'</td>
                  <td class="text-center">'.$tanggal.'</td>
                  <td class="text-center">Sudah Diterbitkan</td>
                  <td class="text-center"><a href="status-pengajuan-detail.php?id='.$row[0].'"><button type="button" class="btn btn-info">Detail</button></a></td>
                </tr>
                  ';
                }
              }
            ?>

            </tbody>
          </table>
        </div>
      </div>


    </div>


  </div>
</div>

<?php
require_once("templates/footer.php");
?>
