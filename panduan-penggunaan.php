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
?>

<div class="about section-margin">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h1>Panduan Penggunaan</h1>
</div>
<div class="row">
  <div class="col-md-3">
  </div>
  <div class="col-md-6">
    <center>
      <img class="img-responsive" src="https://i.ibb.co/St1dWxg/panduan-publikasi.png" alt="">
    </center>

    <br>
    <h2>Panduan Penulis Mempublikasi Buku</h2>
    <ol class="list-group">
      <li>Penulis akan melakukan registrasi akun.</li>
      <li>Setelah berhasil melakukan registrasi akun, penulis akan mendownload template naskah buku yang telah disediakan.</li>
      <li>Penulis kemudian akan membuat naskah sesuai dengan template naskah buku yang telah didownload.</li>
      <li>Upload naskah buku yang telah dibuat oleh penulis di EbookHub.id.</li>
      <li>Naskah buku yang telah diupload akan diproses oleh editor.</li>
      <li>Naskah buku yang telah diproses oleh editor akan dipublikasikan di EbookHub.id apabila diterima, namun apabila naskah buku belum sesuai dengan ketentuan yang berlaku maka akan dikebalikan kepada penulis untuk disunting kembali.</li>
    </ol>
  </div>
  <div class="col-md-3">
  </div>
</div>

<br><br><br>

<div class="row">
  <div class="col-md-3">
  </div>
  <div class="col-md-6">
    <center>
      <img class="img-responsive" src="https://i.ibb.co/DkdcrR7/panduan-unduh.png" alt="">
    </center>
    <br>

    <h2>Panduan Pembaca Membeli dan Mendownload Buku</h2>
    <ol class="list-group">
      <li>Pembeli login akun di <a href="landing.php">EbookHub.id.</a></li>
      <li>Pembeli kemudian memilih buku yang akan dibeli dan memasukkan buku dalam daftar pembelian di keranjang.</li>
      <li>Setelah check out, pembeli kemudian memilih metode pembayaran yang tersedia di  EbookHub.id.</li>
      <li>Lalu pembaca memilih metode pembayaran dan melakukan pembayaran. Setelah pembayaran telah dilakukan dan berhasil, makan akan dikonfirmasi oleh EbookHub.id.</li>
      <li>Buku yang berhasil dibeli dapat diunduh.</li>
    </ol>
  </div>
  <div class="col-md-3">
  </div>
</div>

    </div>
  </div>
</div>

<?php
  require_once("templates/footer.php");
?>
