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

if (isset($_GET['id'])) {
  $no = $_GET['id'];
}
else {
  header('Location:status-pengajuan.php');
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
        <h1 class="register-title">Detail Buku</h1>

        <div class="table-details">
          <table class="table table-hover table-bordered table-responsive">
          <?php
            $conn = connectDB();
            $query = "SELECT t.purchase_id, t.book_id, t.user_id, t.date, b.title, b.author, b.category, b.isbn, b.sku, u.description 
                      FROM purchase t 
                      INNER JOIN book b ON b.book_id = t.book_id
                      INNER JOIN unggah u ON u.no = b.upload_id
                      WHERE t.purchase_id = '$no'";
            $detail_beli = mysqli_query($conn, $query);

            if (mysqli_num_rows($detail_beli) > 0) {
              $row = mysqli_fetch_assoc($detail_beli);
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
                <td><strong>Judul Buku</strong></td>
                <td>'.$row['title'].'</td>
              </tr>
              <tr>
                <td><strong>Nama Penulis</strong></td>
                <td>'.$row['author'].'</td>
              </tr>
              <tr>
                <td><strong>Kategori</strong></td>
                <td>'.$row['category'].'</td>
              </tr>
              <tr>
                <td><strong>Deskripsi/Sinopsis Buku</strong></td>
                <td>'.$row['description'].'</td>
              </tr>
              <tr>
                <td><strong>Tanggal Beli</strong></td>
                <td>'.$tanggal.'</td>
              </tr>
              <tr>
                <td><strong>ISBN</strong></td>
                <td>'.$row['isbn'].'</td>
              </tr>
              <tr>
                <td><strong>SKU</strong></td>
                <td>'.$row['sku'].'</td>
              </tr>
              ';
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
