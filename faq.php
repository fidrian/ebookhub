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
        <h1>Bantuan dan FAQ</h1>
      </div>

      <div class="col-md-12 text-justify">
        <div class="faq-group">
          <h4>Q: Apa itu Ebook?</h4>
          <p>A: Ebook adalah buku dalam bentuk digital yang dapat dibaca melalui perangkat handphone / tablet, maka kamu bisa membaca buku kapan saja dan di mana saja. Untuk     dapat mengakses ebook yang kamu beli di EbookHub.id, ikuti step berikut: <br>
          1. Pastikan kamu telah menyelesaikan pembayaran pesanan <br>
          2. Buka halaman daftar pesanan yang selesai yang akan menampilkan daftar ebook yang telah dibeli dan dapat diunduh. <br>
          3. Unduh Ebook yang telah dipilih. <br>
          4. Setelah selesai diunduh, kamu bisa membacanya secara offline menggunakan device.
          </p>
        </div>

        <div class="faq-group">
          <h4>Q: Apa itu self publishing?</h4>
          <p>
            A: Secara harfiah,  kata “self” berarti sendiri dan “publishing” berarti  menerbitkan. Maka,  self publishing dapat diartikan menjadi layanan yang ditujukan bagi penulis untuk menerbitkan buku sendiri (secara independen). Hal ini berarti penulis bertanggung jawab dengan keseluruhan proses penerbitan meliputi penulisan naskah, pembuatan layout naskah, membuat desain sampul buku (cover), serta menentukan harga jual buku.

          </p>
        </div>

        <div class="faq-group">
          <h4>Q: Bagaimana cara menerbitkan buku di EbookHub.id?</h4>
          <p>
            A: Tahapan untuk menerbitkan buku yakni dengan step berikut:<br>

            1. Pertama, dapat melengkapi formulir pendaftaran sesuai dengan data diri.<br>
            2. Setelah itu dapat mengunduh format naskah buku yang dapat diklik di sini. <br>
            3. Pastikan buku yang akan diterbitkan melalui layanan self publishing sudah sesuai dengan format yang ditentukan.<br>
            4. Naskah buku kemudian diupload ke EbookHub.id
          </p>
        </div>

        <div class="faq-group">
          <h4>Q: Tema buku apa yang bisa diterbitkan?</h4>
          <p>
            A: Semua tema, selama tidak mengandung unsur SARA,  pornografi dan mengandung kontroversi.
          </p>
        </div>

        <div class="faq-group">
          <h4>Q: Naskah dikirim ke mana?</h4>
          <p>
            A: Naskah dikirim melalui EbookHub.id
          </p>
        </div>

        <div class="faq-group">
          <h4>Q: Bagaimana Cara meng-upload naskah?</h4>
          <p>
            A: Bisa langsung buka tautan berikut:
            <a href="#">www.EbookHub.id(LINK UPLOAD)</a>
          </p>
        </div>

        <div class="faq-group">
          <h4>Q: Berapa lama naskah publish di web setelah penulis mengirimkan naskah?</h4>
          <p>
            A: Launching buku akan publish di web dalam waktu 25 HARI KERJA, jika dikirim melalui web, dan 30 HARI KERJA jika dikirim melalui email. Naskah yang lebih dari 200 halaman, maka akan ada tambahan waktu pengerjaan selama 7 hari. Naskah Ekspress dan Mini Ekspress akan publish di web dalam waktu 7 HARI KERJA. Naskah yang dikirim di luar jam kerja EbookHub.id  dihitung masuk di hari kerja berikutnya.
          </p>
        </div>

        <div class="faq-group">
          <h4>Q: Apakah penulis juga harus mengeluarkan biaya untuk memperoleh bukunya?</h4>
          <p>
            A: Ya. Penulis juga harus mengeluarkan biaya jika ingin membeli bukunya sendiri. Penulis akan tetap mendapatkan royalti meskipun yang membeli adalah dirinya sendiri.
          </p>
        </div>

        <div class="faq-group">
          <h4>Q: Berapa Royalti yang diterima penulis?</h4>
          <p>
            A: Royalti yang diterima oleh penulis adalah 80% dari harga jual buku. <br> *Silakan update data rekening penulis di profil akun masing-masing, agar royalti bisa dibayarkan sesuai jadwal
          </p>
        </div>

        <div class="faq-group">
          <h4>Q: Bagaimana sistem penjualan buku ?</h4>
          <p>
            A: Buku-buku EbookHub.id dijual secara Online melalui web EbookHub.id Selain dijual online penulis bisa ikut serta di program Distribusi Nasional  dan buku berpotensi dipasarkan lewat toko buku offline. Beberapa judul sudah bisa masuk dalam jumlah yang terbatas. Semua hasil penjualan tetap dilaporkan, meskipun tidak secara langsung karena memakai sistem konsinyasi atau titip jual.
          </p>
        </div>

        <div class="faq-group">
          <h4>Q: Berapa lama penulis akan mendapatkan royalti pertamanya?</h4>
          <p>
            A: Royalti penulis akan aktif setelah 90 hari pertama terhitung dari buku publish di web. Selanjutnya royalti akan diterima setiap 3 bulan sekali jika ada penjualan. Kemudian mengisi data rekening di akun masing-masing melalui 'my account'. Royalti biasanya dibayarkan pada tanggal 15-25 setiap bulannya.
          </p>
        </div>

        <div class="faq-group">
          <h4>Q: Kapan kontrak kerja sama antara penulis dan EbookHub.id  berakhir? </h4>
          <p>
            A: Ketika penulis mengirimkan surat pernyataan pemutusan kerja sama yang di tanda tangani oleh penulis di atas materai kepada pihak EbookHub.id.
          </p>
        </div>

        <div class="faq-group">
          <h4>Q: Apakah penulis boleh mempromosikan bukunya di  website/ blog/ twitter/ facebook selain akun resmi EbookHub.id ?</h4>
          <p>
            A: Boleh. Penulis bisa share semua konten yang tersedia di website EbookHub.id  termasuk produk buku dan informasi lainnya dengan cara klik opsi "share" di setiap pages.
          </p>
        </div>

        <div class="faq-group">
          <h4>Q: Adakah sms center/ WhatsApp/ Telegram?</h4>
          <p>
            A: Untuk konfirmasi proses penerbitan buku:  0813 7933 4880  Untuk konfirmasi pemesanan buku, pembayaran buku, dan pengiriman : 0813 7933 4881
          </p>
        </div>

        <div class="faq-group">
          <h4>Q: Adakah nomor telepon yang bisa dihubungi?</h4>
          <p>
            A: 021- 123456
          </p>
        </div>

        <div class="faq-group">
          <h4>Q: Kapan Jam kerja EbookHub.id ?</h4>
          <p>
            A:  Jam Kerja EbookHub.id: <br>
            Senin - Jumat: 08.00 WIB - 16.00 WIB <br>
            Sabtu: 08.00 - 12.00 WIB <br>
            Libur di hari Minggu dan hari libur nasional
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
  require_once("templates/footer.php");
?>
