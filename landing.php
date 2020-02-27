<?php
  require_once("templates/header.php");
?>

<?php
  session_start();
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

		$sql = "SELECT book_id, img_path, title, author, publisher, quantity FROM $table";

		if(!$result = mysqli_query($conn, $sql)) {
			die("Error: $sql");
		}
		mysqli_close($conn);
		return $result;
  }

  function daftarNon($table) {
		$conn = connectDB();

		$sql = "SELECT * FROM $table WHERE category = 'Non Fiksi'";

		if(!$result = mysqli_query($conn, $sql)) {
			die("Error: $sql");
		}
		mysqli_close($conn);
		return $result;
  }

  function daftarFiksi($table) {
		$conn = connectDB();

		$sql = "SELECT * FROM $table WHERE category = 'Fiksi'";

		if(!$result = mysqli_query($conn, $sql)) {
			die("Error: $sql");
		}
		mysqli_close($conn);
		return $result;
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

  function selectAllRowsFromSubmission() {
		$conn = connectDB();

		$sql = "SELECT DISTINCT book_id FROM submission";
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

  function selectAllBooks() {
    $pinjam = selectAllRowsFromSubmission();
    $arraysubmission = array();
    while ($baris = mysqli_fetch_row($pinjam)) {
      array_push($arraysubmission, $baris[0]);
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

	function pinjamBuku($book_id, $user_id) {
		$conn = connectDB();
		$sqlsubmission = "INSERT into submission (book_id, user_id) values ('$book_id','$user_id')";

		$sqlbook = "UPDATE book SET quantity = quantity-1 where book_id = $book_id";
		if(!$result = mysqli_query($conn, $sqlsubmission)) {
			die("Error: $sqlsubmission");
		}
		if(!$result = mysqli_query($conn, $sqlbook)) {
			die("Error: $sqlbook");
		}
		mysqli_close($conn);
		header("Location: daftar.php");
	}

	function balikBuku($book_id, $user_id) {
		$conn = connectDB($book_id, $user_id);
		$sqlsubmission = "DELETE FROM submission WHERE book_id = $book_id AND user_id = $user_id";

		$sqlbook = "UPDATE book SET quantity = quantity+1 where book_id = $book_id";
		if(!$result = mysqli_query($conn, $sqlsubmission)) {
			die("Error: $sqlsubmission");
		}
		if(!$result = mysqli_query($conn, $sqlbook)) {
			die("Error: $sqlbook");
		}
		mysqli_close($conn);
		header("Location: daftar.php");
	}

	function showActButton($arraysubmission, $bookid, $stocknum) {
		$flag = false;
		for ($i=0; $i < count($arraysubmission); $i++) {
			if ($arraysubmission[$i] == $bookid) {
				echo '
				<form action="daftar.php" method="post">
					<input type="hidden" name="book_id" value="'.$bookid.'">
					<input type="hidden" name="command" value="balik">
					<button type="submit" class="btn btn-default" style="width:100%;">Balik</button>
				</form>
				';
				$flag = true;
			}
		}
		if($flag == false) {
			if($stocknum > 0) {
				echo '
				<form action="daftar.php" method="post">
					<input type="hidden" name="book_id" value="'.$bookid.'">
					<input type="hidden" name="command" value="pinjam">
					<button type="submit" class="btn btn-default" style="width:100%;">Pinjam</button>
				</form>
				';
			}
		}
	}

	function insertBuku() {
		$conn = connectDB();

		$displayBuku = $_POST['displayBuku'];
		$judulBuku = $_POST['judulBuku'];
		$pengarangBuku = $_POST['pengarangBuku'];
		$penerbitBuku = $_POST['penerbitBuku'];
		$deskripsiBuku = $_POST['deskripsiBuku'];
		$stokBuku = $_POST['stokBuku'];

		$daftarbuku = daftarBuku("book");
		$sdhAda = false;
		$bookid = 0;
		while ($row = mysqli_fetch_row($daftarbuku)) {
			if($row[2] == $judulBuku) {
				$sdhAda = true;
				$bookid = $row[0];
				break;
			}
		}
		$_SESSION["titlebookadded"] = $judulBuku;

		if($sdhAda == true) {
			$sql = "UPDATE book SET quantity = quantity + $stokBuku where book_id = $bookid";
		} else {
			$sql = "INSERT into book (img_path, title, author, publisher, description, quantity) values('$displayBuku', '$judulBuku', '$pengarangBuku', '$penerbitBuku', '$deskripsiBuku', $stokBuku)";
		}

		if($result = mysqli_query($conn, $sql)) {
			echo "New record created successfully <br/>";
			header("Location: detail.php");
			} else {
			die("Error: $sql");
		}
		mysqli_close($conn);
	}

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if($_POST['command'] === 'insert') {
			insertBuku();
		}else if ($_POST['command'] === 'pinjam') {
			pinjamBuku($_POST['book_id'],$_SESSION["user_id"]);
		} else if ($_POST['command'] === 'balik') {
			balikBuku($_POST['book_id'],$_SESSION["user_id"]);
		}
	}

?>


<!-- Begin Welcome -->
<div class="welcome">
  <div class="container">
    <div class="row">
      <div class="col-md-6 greetings">
        <h1 id="greetings-1">Hi, kami Ebookhub!</h1>
        <h3 id="greetings-2">Platform untuk menerbitkan e-book, membaca e-book, dan membeli e-book yang tepat untukmu!</h3>
        <h3 id="greetings-3">Ebookhub ingin membantu meningkatkan minat baca di Indonesia, ayo mulai sekarang!</h3>

        <div class="col-md-6">
        <button type="button" class="btn btn-primary btn-block btn-ebookhub btn-bacaupload" onclick="window.location='shop.php?offset=0'">Mulai Baca</button>
        </div>
        <div class="col-md-6">
        <button type="button" class="btn btn-primary btn-block btn-ebookhub btn-bacaupload" onclick="window.location='upload.php'">Mulai Terbitkan</button>
        </div>
      </div>

      <div class="col-md-6 devices text-center">
        <img src="images/devices.png" alt="" class="img-responsive">
      </div>
    </div>
  </div>
</div>
<!-- End Welcome -->

<!-- Begin How-to-use -->
<div class="how-to-use">
  <div class="container">
    <div class="row">

        <div class="col-lg-12">
          <h1 class="how-to-use-title text-center">Bagaimana menerbitkan buku di Eboookhub?</h1>
        </div>

        <div class="col-md-4 col-sm-12">
          <div class="box-how-to-use box-shadow text-center">
            <i class="fa fa-upload fa-how-to-use" aria-hidden="true"></i>
            <h2>Unggah</h2>
            <p>Unggah draft e-book yang kamu miliki dan kami akan segera melakukan pengecekan dan penilaian kelayakan terbit.</p>

          </div>
        </div>

        <div class="col-md-4 col-sm-12">
          <div class="box-how-to-use box-shadow text-center">
            <i class="fa fa-edit fa-how-to-use" aria-hidden="true"></i>
            <h2>Proses Edit</h2>
            <p>Apabila draft e-book lulus uji kelayakan, maka kami akan mempersiapkan e-book milikmu untuk dipublikasi. </p>

          </div>
        </div>

        <div class="col-md-4 col-sm-12">
          <div class="box-how-to-use box-shadow text-center">
            <i class="fa fa-book fa-how-to-use" aria-hidden="true"></i>
            <h2>Terbit</h2>
            <p>Selamat! E-book milikmu sudah dipublikasi dan siap untuk dibaca oleh seluruh pecinta buku.</p>

          </div>
        </div>


    </div>
</div>
</div>
<!-- End How-to-use -->

<!-- Begin Baru diterbitkan -->
<div class="baru-diterbitkan">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="text-center">Buku Baru Diterbitkan</h1>
      </div>

      <div class="col-lg-12 text-center">
        <div id="owl-baru-diterbitkan" class="owl-carousel owl-theme">
          <?php
              $daftarbuku = daftarBuku("book");
              if(isset($_SESSION['namauser'])) {
                $daftarpinjaman = selectRowsFromSubmission();
                  $arraysubmission = array();
                  while ($baris = mysqli_fetch_row($daftarpinjaman)) {
                    array_push($arraysubmission, $baris[1]);
                  }
              }

            while ($row = mysqli_fetch_row($daftarbuku)) {
              echo '
                    <div class="item">
                      <div class="card box-shadow">
                        <img class="card-img-top img-fluid" style="height:400px;" src="'.$row[1].'" alt="card-img">
                        <div class="card-body">
                          <a href="details.php?id='.$row[0].'"><h3 class="card-title ebook-title" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><strong>'.$row[2].'</strong></h3></a>
                          <p class="card-text ebook-author">'.$row[3].'</p>
                          <p class="card-text ebook-source">'.$row[4].'</p>';
                          if($row[5] > 0) {
                            echo '<h4 class="card-title ebook-price"><strong>Rp. '.$row[5].'</strong></h4>';
                          } else {
                            echo '<h4 class="card-title ebook-price"><strong>Stok Kosong</strong></h4>';
                          }
                          echo '
                          <a href="cart.php?id='.$row[0].'" class="btn btn-lg btn-danger btn-beli text-capitalize"><i class="fa fa-shopping-cart"> </i>&nbsp; Beli</a>
                          ';
                        echo '
                        </div>
                      </div>
                    </div>';
            }
          ?>
        </div>
        <div class="customNavigation">
          <a class="btn prev"> <i class="fa fa-angle-left"></i> </a>
          <a class="btn next"> <i class="fa fa-angle-right"></i> </a>
          <!-- <a class="btn play">Autoplay</a>
          <a class="btn stop">Stop</a> -->
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Baru diterbitkan -->

<!-- Begin Buku terpopuler -->
<div class="baru-diterbitkan">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="text-center">Buku Terpopuler</h1>
      </div>

      <div class="col-lg-12 text-center">
        <div id="owl-buku-terpopuler" class="owl-carousel owl-theme">
        <?php
              $arraybook = selectAllBooks();
              for ($i=0; $i < count($arraybook); $i++) {
                $buku = selectAllFromBook($arraybook[$i]);
                while ($row = mysqli_fetch_row($buku)) {
                  echo '
                  <div class="item">
                    <div class="card box-shadow">
                      <img class="card-img-top img-fluid" style="height:400px;" src="'.$row[1].'" alt="card-img">
                      <div class="card-body">
                        <a href="details.php?id='.$row[0].'"><h3 class="card-title ebook-title" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><strong>'.$row[2].'</strong></h3></a>
                        <p class="card-text ebook-author">'.$row[3].'</p>
                        <p class="card-text ebook-source">'.$row[4].'</p>';
                        if($row[6] > 0) {
                          echo '<h4 class="card-title ebook-price"><strong>Rp. '.$row[6].'</strong></h4>';
                        } else {
                          echo '<h4 class="card-title ebook-price"><strong>Stok Kosong</strong></h4>';
                        }
                        echo '
                        <a href="cart.php?id='.$row[0].'" class="btn btn-lg btn-danger btn-beli text-capitalize"><i class="fa fa-shopping-cart"> </i>&nbsp; Beli</a>
                        ';
                      echo '
                      </div>
                    </div>
                  </div>';
                }
              }
          ?>
        </div>

        <div class="customNavigation">
          <a class="btn prev2"><i class="fa fa-angle-left"></i></a>
          <a class="btn next2"><i class="fa fa-angle-right"></i></a>
          <!-- <a class="btn play">Autoplay</a>
          <a class="btn stop">Stop</a> -->
        </div>
      </div>
    </div>
  </div>

</div>
<!-- End Buku terpopuler -->


<!-- Begin Kategori -->
<div class="kategori">
  <div class="container-fluid">
    <div class="row">

      <div class="col-sm-12">
        <h1 class="text-center">Kategori</h1>
      </div>

      <div class="col-md-6 col-sm-12">
        <div class="hvrbox">
          <div class="centered"><h1>Non-Fiksi</h1></div>
			    <img src="images/non-fiction.jpg" alt="Fiksi" class="hvrbox-layer_bottom">
			    <div class="hvrbox-layer_top hvrbox-layer_slideup hvr-non-fiction">
				    <div class="hvrbox-text">
              <ul>
              <?php
                  $daftarnon = daftarNon("category");
                  while ($rownon = mysqli_fetch_row($daftarnon)) {
                    echo '
                    <li><a href="shop-category.php?id='.$rownon[1].'&offset=0">'.$rownon[1].'</a></li>
                    ';
                  }
                ?>
              </ul>
            </div>
			    </div>
		    </div>
      </div>

      <div class="col-md-6 col-sm-12">
        <div class="hvrbox">
          <div class="centered"><h1>Fiksi</h1></div>
			    <img src="images/fiction.jpg" alt="Mountains" class="hvrbox-layer_bottom">
			    <div class="hvrbox-layer_top hvrbox-layer_slideup hvr-fiction">
				    <div class="hvrbox-text">
              <ul>
              <?php
                  $daftarfiks = daftarFiksi("category");
                  while ($rowfiks = mysqli_fetch_row($daftarfiks)) {
                    echo '
                    <li><a href="shop-category.php?id='.$rowfiks[1].'&offset=0">'.$rowfiks[1].'</a></li>
                    ';
                  }
                ?>
              </ul>
            </div>
			    </div>
		    </div>
      </div>
    </div>
  </div>
</div>
<!-- End Kategori -->

<!-- Begin partner -->
<div class="partner">
  <div class="container text-center">
    <div class="row">
      <div class="col-lg-12">
        <h1>Partner Kami</h1>
      </div>

      <div class="col-md-3 col-sm-12">
        <a href="https://gramedia.com"><img src="images/gramedia.png" alt=""></a>
      </div>
      <div class="col-md-3 col-sm-12">
        <a href="http://www.kompasgramedia.com"><img src="images/kompas.jpg" alt=""></a>
      </div>
      <div class="col-md-3 col-sm-12">
        <a href="http://www.elexmedia.id"><img src="images/elex.png" alt=""></a>
      </div>
      <div class="col-md-3 col-sm-12">
        <a href="https://mizan.com"><img src="images/mizan.jpg" alt=""></a>
      </div>
    </div>
  </div>
</div>
<!-- End partner -->

<!-- Begin Subscribe -->
<div class="subscribe">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 subscribe-box text-center">
        <h2>Jadilah yang pertama tahu berita dan promosi menarik dari kami! (Gratis)</h2>
        <div class="input-group input-subscribe">
          <input type="email" class="form-control" placeholder="Masukkan alamat e-mail...">
          <span class="input-group-btn">
            <button class="btn btn-danger" type="submit">Berlangganan</button>
          </span>
        </div>
	    </div>
    </div>
  </div>
</div>
<!-- End Subscribe -->

<?php
  require_once("templates/footer.php");
?>
