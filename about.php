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
        <h1>Tentang Kami</h1>
      </div>
      <center>
        <a href="landing.php"><img class="img-responsive" src="images/logo-about.png" alt=""></a>
      </center>
      <div class="col-md-12 text-justify">

        <p>
          <strong>EbookHub.id</strong> adalah perusahaan self publishing/ penerbit <i>indie.</i> Berawal dari interaksi online dengan para pecinta dunia kepenulisan, kami berinisiatif membangun fasilitas yang memudahkan para penulis untuk mengorbitkan karya mereka. EbookHub.id  merupakan tempat yang tepat untuk mempertemukan penulis dengan pembaca guna menyediakan apa yang mereka butuhkan, yaitu sebagai penulis yang membutuhkan wadah menerbitkan buku dengan cara yang lebih mudah dan ekonomis, sedangkan pembaca membutuhkan buku-buku berkualitas dan mudah terjangkau. Di sinilah kami berperan untuk menjembatani kebutuhan penulis dan pembaca.
          <strong>EbookHub.id</strong> memberi kesempatan bagi siapapun juga tanpa kecuali untuk menerbitkan karya mereka. Kami menerima segala jenis naskah baik fiksi maupun non-fiksi dalam berbagai genre (asal tidak berbau pornografi, SARA dan mengandung kontroversi). Pada dasarnya, kami memposisikan diri sebagai sahabat para penulis. Semoga komitmen ini bisa kami pertahankan untuk terus berkontribusi bagi perkembangan dunia literasi Indonesia pada khususnya dan dunia pada umumnya.
          Tunjukkan eksistensi karya Anda pada dunia. <strong>Read. Write. Inspire!</strong>


        </p>
      </div>

      <div class="col-md-12 text-center visi-ebookhub">
        <ol>
          <h2 id="greetings-1">Visi Ebookhub</h2>
          <p class="visi-text">“Meningkatkan Pengetahuan dan Intelektual Bangsa Indonesia melalui Pendidikan”</p>
        </ol>
      </div>
        <ol>
          <div class="text-center">
            <h2 id="greetings-1">Misi Ebookhub</h2>
          </div>
          <div class="col-md-6 col-md-offset-3 text-justify">
            <li>Mengembangkan dan menyebarluaskan ilmu pengetahuan, serta mengupayakan penerapannya untuk meningkatkan martabat kehidupan masyarakat dan kebudayaan nasional.</li>
            <li>Meningkatkan minat baca dengan membuka akses membaca tanpa dibatasi ruang dan waktu melalui pemanfaatan teknologi.</li>
            <li>Menjadi penyedia beragam konten digital berkualitas sesuai dengan ketentuan hukum yang berlaku.</li>
          </div>
        </ol>
      </div>
    </div>
  </div>
</div>

<?php
  require_once("templates/footer.php");
?>
