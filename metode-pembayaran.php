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

function selectRowsFromSubmission() {
  $conn = connectDB();

  $sql = "SELECT * FROM submission WHERE user_id = ".$_SESSION["user_id"]."";
  if(!$result = mysqli_query($conn, $sql)) {
    die("Error: $sql");
  }
  mysqli_close($conn);
  return $result;
}

function selectBooks() {
  $pinjam = selectRowsFromSubmission();
  $arraysubmission = array();
  while ($baris = mysqli_fetch_row($pinjam)) {
    array_push($arraysubmission, $baris[1]);
  }
  return $arraysubmission;
}

function selectAllFromBook($book_id) {
  $conn = connectDB();

  $sql = "SELECT * FROM book WHERE book_id = $book_id";
  if(!$result = mysqli_query($conn, $sql)) {
    die("Error: $sql");
  }
  mysqli_close($conn);
  return $result;
}
?>

<div class="metode-pembayaran">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="register-title">Pilih Metode Pembayaran</h1>
      </div>

      <div class="col-pembayaran">
        <div class="col-md-2 form-register-group">
          <form class="" action="" method="post">
            <div class="radio">
              <label><input type="radio" name="optradio"> <img src="https://i.ibb.co/7td7Zmp/bni.png" alt="" class="img-bank radio-bank"> </label>
            </div><br>

            <div class="radio">
              <label><input type="radio" name="optradio"> <img src="https://i.ibb.co/7bvW3Vd/bri.png" alt="" class="img-bank radio-bank"> </label>
            </div>

          </form>
        </div>

        <div class="col-md-1">

        </div>

        <div class="col-md-2 form-register-group">
          <form class="" action="" method="post">
            <div class="radio">
              <label><input type="radio" name="optradio"> <img src="https://i.ibb.co/kJ2MTnt/mandiri.png" alt="" class="img-bank radio-bank"> </label>
            </div><br>

            <div class="radio">
              <label><input type="radio" name="optradio"> <img src="https://i.ibb.co/g7Yk44X/bca.png" alt="" class="img-bank radio-bank"> </label>
            </div>


          </form>
        </div>

        <div class="col-md-1">

        </div>

        <div class="col-md-2 form-register-group">
          <form class="" action="" method="post">


            <div class="radio">
              <label><input type="radio" name="optradio"> <img src="https://i.ibb.co/172GzxX/gopay.png" alt="" class="img-bank radio-bank"> </label>
            </div>


          </form>
        </div>
      </div>

      <div class="col-md-3 pull-right">
        <div class="panel-ringkasan-belanja">
          <div class="panel-heading">
            <h3 class="panel-title">Ringkasan belanja</h3>
          </div>

          <div class="panel-body">
            <ul class="nav nav-pills nav-stacked category-menu">
              <a href="#"></a>
              <?php
                $conn = connectDB();
                if (isset($_GET['id'])) {
                  $no = $_GET['id'];
                  $query = "SELECT * FROM book where book_id = '$no'";
                  $detail_unggah = mysqli_query($conn, $query);

                  if (mysqli_num_rows($detail_unggah) > 0) {
                    $row = mysqli_fetch_assoc($detail_unggah);
                    echo '
                    <li><p href="#">Jumlah: Rp. '.$row['quantity'].'</p></li>
                    <li><p href="#">Total 1</p></li>
                    <a href="status-pembayaran.php?id='.$no.'" class="btn btn-primary btn-block btn-ebookhub btn-register">Bayar Sekarang</a>
                    ';
                  }
                }else{
                  $arraybook = selectBooks();
                  $sum = 0;
                  $qty = 0;
                  for ($i=0; $i < count($arraybook); $i++) {
                    $buku = selectAllFromBook($arraybook[$i]);
                    while ($row = mysqli_fetch_row($buku)) {
                      $sum = $sum + $row[6];
                      $qty++;
                    }
                  }
                  echo '
                  <li><p href="#">Jumlah: Rp. '.$sum.'</p></li>
                  <li><p href="#">Total Barang:  '.$qty.'</p></li>
                  <a href="status-pembayaran.php" class="btn btn-primary btn-block btn-ebookhub btn-register">Bayar Sekarang</a>
                  ';
                }
                ?>
            </ul>
          </div>
        </div>

      </div>


    </div>

    <div class="row panduan-pembayaran">
      <div class="col-md-12">
        <h1 class="register-title">Panduan Pembayaran</h1>
      </div>

      <div class="col-md-12">
        <div class="panel-group" id="accordion">
          <div class="panel panel-danger">
            <div class="panel-heading panel-transfer">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Transfer Bank BNI</a>
              </h4>
            </div>
            <div id="collapse1" class="panel-collapse collapse out">
              <div class="panel-body">
                <div class="row">
                  <ol>
                    <strong>ATM Bank BNI</strong>
                    <li>Masukkan Kartu ATM BNI, kemudian pilih “Bahasa”.</li>
                    <li>Masukkan “PIN ATM”.</li>
                    <li>Pilih “Menu Lainnya”, kemudian pilih menu “Transfer”.</li>
                    <li>Pilih jenis rekening yang akan digunakan (Contoh: “Dari Rekening Tabungan”).</li>
                    <li>Pilih “Virtual Account Billing”.</li>
                    <li>Masukan Nomor Virtual Account (contoh : 7810202001539202).</li>
                    <li>Tagihan yang harus dibayarkan akan muncul pada layar konfirmasi.</li>
                    <li>Pilih “Konfirmasi” apabila telah sesuai dengan order yang dipesan, lanjutkan transaksi.</li>
                    <li>Transaksi selesai, mohon penyimpan bukti pembayaran.</li>
                  </ol>
                </div>

                <div class="row">
                  <ol>
                    <strong>BNI Mobile Banking</strong>
                    <li>Akses BNI Mobile Banking dari handphone kemudian masukkan user ID dan password.</li>
                    <li>Pilih menu “Transfer”.</li>
                    <li>Pilih menu “Virtual Account Billing” kemudian pilih rekening debet.</li>
                    <li>Masukkan nomor Virtual Account Anda (contoh: 8277087781881441) pada menu “input baru”.</li>
                    <li>Tagihan yang harus dibayarkan akan muncul pada layar konfirmasi</li>
                    <li>Konfirmasi transaksi dan masukkan Password Transaksi.</li>
                    <li>Pembayaran Anda Telah Berhasil.</li>
                  </ol>
                </div>

                <div class="row">
                  <ol>
                    <strong>BNI Internet Banking (iBank Personal BNI)</strong>
                    <li>Akses https://ibank.bni.co.id kemudian klik “Enter”.</li>
                    <li>Masukkan User ID dan Password.</li>
                    <li>Pilih menu “Transfer”.</li>
                    <li>Pilih “Virtual Account Billing”.</li>
                    <li>Kemudian masukan nomor Virtual Account  (contoh : 7810202001539202) yang hendak dibayarkan. Lalu pilih rekening debet yang akan digunakan. Kemudian tekan ‘’lanjut’’.</li>
                    <li>Tagihan yang harus dibayarkan akan muncul pada layar konfirmasi.</li>
                    <li>Masukkan kode otentikasi token.</li>
                    <li>Transaksi selesai, mohon penyimpan bukti pembayaran.</li>
                  </ol>
                </div>

                <div class="row">
                  <ol>
                    <strong>BNI SMS Banking (iBank Personal BNI)</strong>
                    <li>Buka aplikasi SMS Banking BNI.</li>
                    <li>Pilih menu “Transfer”.</li>
                    <li>Pilih menu “Transfer rekening BNI” 4. Masukkan nomor rekening tujuan dengan 16 digit Nomor Virtual Account (contoh : 7810202001539202).</li>
                    <li>Masukkan nominal transfer sesuai order yang dipesan (contoh : 200,000).Nominal yang berbeda tidak dapat diproses.</li>
                    <li>Pilih “Proses” kemudian “Setuju”.</li>
                    <li>Balas SMS dengan ketik pin sesuai perintah.</li>
                    <li>Transaksi selesai, mohon penyimpan bukti pembayaran.</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>

          <div class="panel panel-danger">
            <div class="panel-heading panel-transfer">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Transfer Bank BRI</a>
              </h4>
            </div>
            <div id="collapse2" class="panel-collapse collapse out">
              <div class="panel-body">
                <div class="row">
                  <ol>
                    <strong>ATM Bank BRI</strong>
                    <li>Masukkan kartu ATM BRI Anda, lalu masukkan kode PIN ATM Anda.</li>
                    <li>Pilih menu “Transaksi lainnya”, lalu pilih menu “Pembayaran”.</li>
                    <li>Pilih menu “Lainnya”, lalu pilih menu “Briva”.</li>
                    <li>Masukkan nomor Virtual Account Anda 6001188700000376 dan pilih “Benar”.</li>
                    <li>Pilih “Ya” ketika konfirmasi pembayaran ditampilkan.</li>
                    <li>Transaksi selesai, mohon simpan bukti pembayaran Anda.</li>
                  </ol>
                </div>

                <div class="row">
                  <ol>
                    <strong>Mobile Banking</strong>
                    <li>Masuk ke Mobile Banking, lalu pilih menu “Pembayaran”.</li>
                    <li>Pilih menu “Briva”.</li>
                    <li>Masukkan nomor Virtual Account Anda 6001188700000376 dan masukkan jumlah yang harus dibayarkan.</li>
                    <li>Masukkan kode PIN Mobile Banking Anda dan pilih “Kirim”.</li>
                    <li>Transaksi selesai dan bukti pembayaran akan dikirimkan melalui SMS.</li>
                  </ol>
                </div>

                <div class="row">
                  <ol>
                    <strong>Internet Banking</strong>
                    <li>Masuk ke Internet Banking, lalu pilih menu “Pembayaran”.</li>
                    <li>Pilih menu “Briva”.</li>
                    <li>Masukkan nomor Virtual Account Anda 6001188700000376 dan pilih “Kirim”.</li>
                    <li>Masukkan kata sandi Anda (“Password”) dan “mToken internet banking”.</li>
                    <li>Transaksi selesai, mohon simpan bukti pembayaran Anda.</li>
                  </ol>
                </div>

                <div class="row">
                  <ol>
                    <strong>Teller</strong>
                    <li>Kunjungi teller Bank BRI di kantor cabang BRI.</li>
                    <li>Isi formulir slip penyetoran (deposit slip) berikut nomor Virtual Account Anda 6001188700000376 dan masukkan jumlah yang harus dibayarkan.</li>
                    <li>Serahkan formulir slip penyetoran dan uang tunai ke teller BRI.</li>
                    <li>Transaksi selesai, mohon simpan salinan formulir slip penyetoran Anda sebagai bukti pembayaran.</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>

          <div class="panel panel-danger">
            <div class="panel-heading panel-transfer">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Transfer Bank BCA</a>
              </h4>
            </div>
            <div id="collapse3" class="panel-collapse collapse out">
              <div class="panel-body">
                <div class="row">
                  <ol>
                    <strong>ATM Bank BCA</strong>
                    <li>Masukkan kartu ATM kemudian masukkan nomor PIN Anda.</li>
                    <li>Pilih "Transaksi lainnya", kemudian pilih "Transfer".</li>
                    <li>Silahkan masukkan no. BCA Virtual Account (74102000XXXXXXXX), lalu tekan "Benar".</li>
                    <li>Periksa kembali data transaksi kemudian tekan "Benar".</li>
                    <li>Simpan struk Anda sebagai bukti pembayaran. Penjual akan menerima notifikasi pembayaran.</li>
                  </ol>
                </div>

                <div class="row">
                  <ol>
                    <strong>Mobile Banking</strong>
                    <li>Login pada aplikasi M-BCA, masukkan PIN M-BCA.</li>
                    <li>Pilih "m-Transfer", pilih "BCA Virtual Account".</li>
                    <li>Klik "Input no. Virtual Account", lalu masukkan no. BCA Virtual Account (74102000XXXXXXXX).</li>
                    <li>Klik "OK" & "Send".</li>
                    <li>Periksa data transaksi kemudian pilih "OK".</li>
                    <li>Isi kolom "Berita" dengan nama Anda, lalu klik "OK", kemudian masukkan PIN M-BCA Anda.</li>
                    <li>Periksa kembali data transaksi Anda, kemudian klik "OK".</li>
                  </ol>
                </div>

                <div class="row">
                  <ol>
                    <strong>Internet Banking</strong>
                    <li>Login pada aplikasi KlikBCA, masukkan user ID & PIN.</li>
                    <li>Pilih "Transfer Dana", kemudian pilih "Transfer ke BCA Virtual Account".</li>
                    <li>Masukkan no. BCA Virtual Account (74102000XXXXXXXX) & klik "Lanjutkan".</li>
                    <li>Isi kolom "Berita" dengan nama Anda & klik "Lanjut".</li>
                    <li>Pastikan data yang dimasukkan sudah benar, dan Input "Respon KeyBCA", lalu klik "Kirim".</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>

          <div class="panel panel-danger">
            <div class="panel-heading panel-transfer">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Transfer Bank Mandiri</a>
              </h4>
            </div>
            <div id="collapse4" class="panel-collapse collapse out">
              <div class="panel-body">
                <div class="row">
                  <ol>
                    <strong>ATM Bank Mandiri</strong>
                    <li>Masukkan kartu ATM Mandiri, lalu masukkan PIN ATM.</li>
                    <li>Pilih menu ‘Bayar/Beli’.</li>
                    <li>Pilih ‘Lainnya’ dan pilih ‘Lainnya’ kembali.</li>
                    <li>Pilih ‘Multi Payment’.</li>
                    <li>Masukkan Kode Perusahaan EbookHub  – 89222.</li>
                    <li>Masukkan Nomer VA (Virtual Account) EbookHub  (Contoh: 8922214260074xxx).</li>
                    <li>Masukkan nominal pembayaran sesuai dengan order (Contoh : 459088).</li>
                    <li>Konfirmasi pembayaran akan muncul berupa pembayaran ke EbookHub , nomor VA, dan total tagihan. Pilih ’YA’ jika benar.</li>
                    <li>Transaksi selesai. Mohon simpan bukti transaksi.</li>
                  </ol>
                </div>

                <div class="row">
                  <ol>
                    <strong>Mobile Banking (Mandiri Online App)</strong>
                    <li>Install Aplikasi Mandiri Online , Pembayaran EbookHub  tidak dapat dilakukan di aplikasi Mandiri Mobile.</li>
                    <li>Masukkan User ID dan PIN, kemudian klik ’Masuk’.</li>
                    <li>Pilih Menu ’Bayar’.</li>
                    <li>Klik ’Buat Pembayaran Baru’ untuk mengeluarkan pilihan menu.</li>
                    <li>Pilih ’Multipayment’.</li>
                    <li>Pilih ‘Penyedia Jasa’.</li>
                    <li>Pilih ’EbookHub ’.</li>
                    <li>Masukkan Nomer VA (Virtual Account) EbookHub  (Contoh: 8922214260074xxx) dan klik ‘Tambah Sebagai Nomor Baru’.</li>
                    <li>Pilih ’Konfirmasi’ ( ’Nama Pembayaran’ bersifat optional).</li>
                    <li>Masukkan nominal pembayaran sesuai dengan order (Contoh : 459088), lalu klik ’Lanjut’.</li>
                    <li>Konfirmasi pembayaran akan muncul berupa pembayaran ke EbookHub , nomer VA, dan total tagihan. Klik ’Konfirmasi’ jika benar.</li>
                    <li>Transaksi selesai. Mohon simpan bukti transaksi.</li>
                  </ol>
                </div>

                <div class="row">
                  <ol>
                    <strong>Internet Banking</strong>
                    <li>Akses ib.bankmandiri.co.id masukkan User ID dan PIN, kemudian ‘login’ .</li>
                    <li>Pilih menu ‘Bayar’ lalu pilih menu ‘Multi Payment’.</li>
                    <li>Pilih ’Dari Rekening’ dan pilih rekening Anda.</li>
                    <li>Pilih ’Penyedia Jasa’ dan pilih ’EbookHub ’ (pilihan ‘EbookHub ’ berada di list bagian bawah).</li>
                    <li>Di bagian ’No VA’ masukkan nomor Virtual Account (Contoh: 8922214260074xxx).</li>
                    <li>Di bagian ’Nominal’ masukkan nominal transaksi untuk order tersebut (Contoh : 459088) lalu klik ’Lanjutkan’ (Tidak usah pilih ’Simpan di Daftar Pembayaran’).</li>
                    <li>Centang pada bagian Total Tagihan, lalu Jumlah Tagihan akan muncul dan klik ‘Lanjutkan’.</li>
                    <li>Input PIN Mandiri Appli 1 dari Token kemudian klik ’Kirim’.</li>
                    <li>Transaksi selesai, mohon simpan bukti pembayaran.</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>

          <div class="panel panel-danger">
            <div class="panel-heading panel-transfer">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">Transfer Gopay</a>
              </h4>
            </div>
            <div id="collapse5" class="panel-collapse collapse out">
              <div class="panel-body">
                <div class="row">
                  <ol>
                    <li>Pilih "Bayar dengan GOPAY".</li>
                    <li>Klik "PAY NOW by GO-PAY" untuk mendapatkan kode QR.</li>
                    <li>Buka aplikasi GO-JEK di HP Anda.</li>
                    <li>Klik Bayar dan pindai Kode QR.</li>
                    <li>Periksa kembali detail pembayaran Anda di aplikasi GOJEK dan tekan PAY.</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>


        </div>
      </div>
    </div>


  </div>
</div>

<?php
  require_once("templates/footer.php");
?>