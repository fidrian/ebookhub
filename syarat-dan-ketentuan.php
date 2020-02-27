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

<div class="syarat section-margin">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h1>Syarat dan Ketentuan</h1>
      </div>
    </div>

    <div class="row text-justify">
      <div class="col-md-12">
        <h2>Definisi</h2>

        <ol class="list-group">
          <li>Kepatuhan Anda: Sebelum menggunakan, mengakses atau memanfaatkan situs ini, Anda sudah membaca dengan baik setiap dan seluruh Syarat dan Ketentuan ini yang antara lain berisi mengenai Hak Cipta, Kewajiban Penulis, Bagi hasil Penulis dan ketentuan menerbitkan buku yang berkaitan dengan penulis EbookHub.id Dan dengan melanjutkan penggunaan atau pemanfaatan fasilitas yang diberikan oleh EbookHub.id maka Anda telah menyatakan persetujuan Anda terhadap setiap dan seluruh ketentuan dalam Syarat dan Ketentuan ini.</li>
          <li>Keanggotaan di EbookHub.id adalah terbuk bagi semua kalangan, baik penulis buku, pembeli buku maupun penikmat buku.</li>
          <li>Keanggotaan di EbookHub.id adalah GRATIS dengan mengisi form data keanggotaan secara lengkap dan benar.</li>
        </ol>
        <br>

        <h2>Hak Cipta</h2>
        <ol class="list-group">
          <li>Penulis menyatakan dengan sebenarnya telah menyerahkan sebuah naskah yang telah diketik kepada EbookHub.id.</li>
          <li>Penulis menyerahkan hak terbit kepada EbookHub.id selama kurun waktu 5 (lima) tahun sejak perjanjian disetujui. Selama itu penulis tidak boleh menerbitkan di penerbit lain dan menarik naskah dalam hal apapun.</li>
          <li>Selama Perjanjian ini berlaku, EbookHub.id dan Penulis bersama – sama melindungi Hak Cipta intelektual Penulis yang ada pada kedua belah pihak.</li>
        </ol>
        <br>

        <h2>Kewajiban Penulis</h2>
        <ol class="list-group">
          <li>Penulis menjamin bahwa ia tidak menyerahkan karya tersebut kepada pihak lain untuk diterbitkan atau diterjemahkan.</li>
          <li>Penulis menjamin naskah yang akan diterbitkan oleh EbookHub.id belum pernah diterbitkan oleh penebit lain. Jika penulis sudah pernah menerbitkan di penerbit lain dan ingin diterbitkan hanya di EbookHub.id maka harus ada surat keterangan pencabutan naskah dari penerbit sebelumnya.</li>
          <li>Penulis menjamin bahwa karya tersebut tidak mengandung sesuatu yang melanggar hak cipta orang lain dan melanggar hukum.</li>
          <li>Penulis menjamin bahwa karya tersebut tidak mengandung sesuatu yang dapat dianggap sebagai penghinaan atau fitnahan terhadap pihak lain.</li>
          <li>Penulis menjamin bahwa karya tersebut tidak mengandung sesuatu yang berbau pornografi, SARA, dan mengandung kontroversi.</li>
          <li>Penulis membebaskan EbookHub.id dari segala tuntutan pihak ketiga berdasarkan hal – hal yang ia jamin dalam hal ketiga ayat tersebut di atas, jika kesalahan terbukti semata – mata ada pada Penulis, terutama yang mengenai isi buku.</li>
          <li>Penulis tidak diperkenankan membuat karangan lain yang judul dan isinya sama atau judul yang diubah tapi isi sama atau judul sama tapi isi diubah atau dalam bentuk apa pun yang merugikan EbookHub.id dalam penjualan karya tersebut.</li>
          <li>Penulis tidak diperkenankan menyuruh orang lain menerbitkan atau membantu usaha orang lain untuk menerbitkan karya yang judul & isinya sama, atau judul yang diubah tapi isi sama atau judul sama tapi isi diubah atau dalam bentuk apa pun.</li>
          <li>Penulis tetap mempunyai hak untuk melakukan revisi, perbaikan atau penyempurnaan apabila pada naskah tersebut ditemukan kesalahan atau ketidaksempurnaan atau apabila diminta oleh EbookHub.id.</li>
          <li>Apabila diperlukan, penulis wajib memberikan deskripsi tentang tata wajah, ringkasan cerita, ilustrasi naskah, daftar gambar, foto-foto, daftar istilah, atau hal-hal lain yang berhubungan dengan kelengkapan naskah.</li>
        </ol>
        <br>

        <h2>Kewajiban Ebookhub.id</h2>
        <ol class="list-group">
          <li>EbookHub.id menyanggupi untuk segera menerbitkan naskah penulis dalam bentuk buku fisik maupun digital.</li>
          <li>EbookHub.id akan mempromosikan serta memasarkan buku tersebut seluas mungkin.</li>
          <li>EbookHub.id berhak memperbaiki naskah, menetapkan tata wajah, tata letak, bentuk buku, jumlah halaman, ilustrasi, penentuan harga, proses cetakan, dan cara penjualannya.</li>
          <li>EbookHub.id juga diberikan hak untuk menyebarluaskan karya penulis tersebut dalam bentuk lain, seperti Film, Sinetron, Video, dan lain-lain, baik sebagian ataupun keseluruhan naskah.</li>
          <li>EbookHub.id berhak untuk menarik dan tidak menerbitkan naskah yang sedang berjalan dengan atau tanpa alasan apapun.</li>
          <li>EbookHub.id tidak bertanggung jawab atas isi naskah yang diterbitkan jika dikemudian hari ditemukan hal-hal yang melanggar hukum,norma,dan asusila.</li>
        </ol>
        <br>

        <h2>Royalti atau Bagi Hasil</h2>
        <ol class="list-group">
          <li>EbookHub.id akan membayar bagi hasil kepada Penulis sebesar 80% dari harga jual buku sebelum pajak tambahan. Dan bagi hasil akan dikurangkan pajak sesuai dengan UUD perpajakan yang berlaku di           Indonesia.</li>
          <li>Penulis bisa menarik bagi hasil setiap bulannya.</li>
        </ol>
        <br>

        <h2>Penerjemah Naskah</h2>
        <ol class="list-group">
          <li>Jika naskah atau buku diterbitkan dalam bahasa lain, maka EbookHub.id berhak menerjemahkannya. Segala biaya penerjemahan akan dibicarakan kepada penulis Apabila penulis meninggal dunia, maka segala hak dan kewajibannya yang berhubungan dengan surat perjanjian ini beralih kepada ahli warisnya yang sah menurut hukum.</li>
          <li>Apabila ahli waris penulis lebih dari seorang, maka mereka harus menunjuk seorang ahli waris yang diberi surat kuasa penuh untuk berhubungan dengan EbookHub.id.</li>
          <li>Apabila penunjukkan tersebut tidak dilakukan dan diberitahukan kepada EbookHub.id, maka EbookHub.id berhak melakukan segala sesuatu mengenai hak-hak dan kewajiban-kewajiban mereka dengan layak dan sebaik-baiknya.</li>
        </ol>
        <br>

        <h2>Penyelesaian Perselisihan</h2>
        <ol class="list-group">
          <li>Apabila penulis sudah menyetujui perjanjian ini sebelum kurun waktu lima tahun melanggar perjanjian maka bagi hasil penulis akan dibekukan oleh EbookHub.id</li>
        </ol>
        <br>

        <h2>UU ITE NO.11 TAHUN 2008 BAB III MENGENAI SURAT ELEKTRONIK</h2>
        <ul class="list-group">
          <h4>PASAL 5 </h4>
          <li>Informasi Elektronik dan/atau Dokumen Elektronik dan/atau hasil cetaknya merupakan alat bukti hukum yang sah.</li>
        </ul>
        <ul class="list-group">
          <h4>PASAL 5 AYAT 4 </h4>
          <li>Surat yang menurut undang-undang harus dibuat tertulis meliputi tetapi tidak terbatas pada surat berharga, surat yang berharga, dan surat yang digunakan dalam proses penegakan hukum acara perdata, pidana, dan administrasi negara.</li>
        </ul>
        <ul class="list-group">
          <h4>PASAL 6 </h4>
          <li>Dalam hal terdapat ketentuan lain selain yang diatur dalam Pasal 5 ayat (4) yang mensyaratkan bahwa suatu informasi harus berbentuk tertulis atau asli, Informasi Elektronik dan/atau Dokumen Elektronik dianggap sah sepanjang informasi yang tercantum di dalamnya dapat diakses, ditampilkan, dijamin keutuhannya, dan dapat dipertanggungjawabkan sehingga menerangkan suatu keadaan.</li>
        </ul>
        <ul class="list-group">
          <h4>PASAL 7 </h4>
          <li>Setiap Orang yang menyatakan hak, memperkuat hak yang telah ada, atau menolak hak Orang lain berdasarkan adanya Informasi Elektronik dan/atau Dokumen Elektronik harus memastikan bahwa Informasi Elektronik dan/atau Dokumen Elektronik yang ada padanya berasal dari Sistem Elektronik yang memenuhi syarat berdasarkan Peraturan Perundang-undangan.</li>
        </ul>
        <br>
      </div>
    </div>
  </div>
</div>

<?php
require_once("templates/footer.php");
?>
