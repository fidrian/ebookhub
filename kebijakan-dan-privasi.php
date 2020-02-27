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

<div class="kebijakan section-margin">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h1>Kebijakan dan Privasi</h1>
      </div>
    </div>

    <div class="row text-justify">
      <div class="col-md-12">
        <h2>Kerahasiaan Data</h2>
        <p>EbookHub.id bertanggung jawab untuk pengumpulan informasi data pribadi pelanggan dan menjaga privasi pelanggan. Kebijakan ini berlaku bagi seluruh pelanggan/pengguna EbookHub.id tanpa   terkecuali.</p>
        <br>
        <h2>Pengumpulan Informasi</h2>
        <p>EbookHub.id tidak akan memperjualbelikan informasi pribadi pelanggan yang dikumpulkan secara online kepada pihak ketiga. Data pribadi pelanggan yang kami terima, hanya digunakan untuk kepentingan transaksi. Informasi yang kami dapat dari pelanggan, akan membantu kami dalam menyediakan informasi produk baru yang diminati atau dibutuhkan kembali oleh pelanggan tersebut. Kami dapat memberikan  nama dan alamat Anda kepada pihak ketiga untuk tujuan pengiriman produk kepada Anda (contohnya kepada jasa kurir).</p>

        <p>Setiap saat akan ada kemungkinan perubahan harga dan stok maka kami akan menggunakan informasi dari pelanggan saat pelanggan melakukan transaksi online. Customer Service kami akan         menginformasikan kepada pelanggan mengenai perubahan tersebut.</p>

        <p>Selain itu, informasi pelanggan digunakan untuk data statistik, analisa pemasaran, manajemen sistem informasi, survei dan peningkatan pelayanan, serta membantu kami dalam bertransaksi dengan pelanggan, melalui identifikasi permintaan dan kebutuhan pelanggan. Setiap saat dibutuhkan oleh badan hukum, kami akan memberikan informasi tentang pelanggan kepada pemerintah atau pihak ketiga atau badan resmi lainnya yang terkait.</p>
        <br>
        <h2>Transaksi Pembelian Produk</h2>
        <ol class="list-group">
          <li>EbookHub.id memiliki sistem keamanan sehingga pada saat pelanggan melakukan transaksi dapat dipastikan bahwa transaksi dan informasi pelanggan aman.</li>
          <li>Pastikan Anda melakukan log out setelah melakukan transaksi online EbookHub.id. Diharapkan pada saat membuat kata sandi (password), diimbuhi dengan angka atau karakter khusus untuk memperkuat kata sandi (password) Anda.</li>
          <li>Gunakan kata sandi (password) Anda secara hati-hati dan pastikan kata sandi (password) Anda tidak diketahui orang lain, agar tidak disalahgunakan.</li>
        </ol>
        <br>
        <h2>Perubahan pada Kebijakan Privasi</h2>
        <p>EbookHub.id memiliki hak untuk mengganti dan mengubah Pernyataan Privasi kapan pun. Semua perubahan kebijakan akan diumumkan di situs kami dan jika pelanggan ingin menarik persetujuan dalam penggunaan informasi pribadi, meminta akses dan / atau koreksi dari informasi pribadi, memiliki pertanyaan, komentar atau masalah, atau memerlukan bantuan mengenai hal-hal teknis, silakan hubungi kami melalui e-mail cs@ebookhub.id.</p>
      </div>
    </div>
  </div>
</div>

<?php
  require_once("templates/footer.php");
?>
