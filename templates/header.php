<!--  -->
<?php
	session_start();
?>

<?php
	function daftarKategori($table) {
		$conn = connectDB();

		$sql = "SELECT * FROM $table";

		if(!$result = mysqli_query($conn, $sql)) {
			die("Error: $sql");
		}
		mysqli_close($conn);
		return $result;
	}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ebookhub</title>

		<!-- FAVICON -->
		<link rel="shortcut icon" href="images/favicon.png">

    <!-- ALL CSS HERE  -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">


    <!-- ALL FONTS HERE -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- <link rel="stylesheet" href="css/docs.theme.min.css"> -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- <link rel="stylesheet" href="css/owl.theme.default.min.css"> -->

    <!-- ALL JS HERE -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.4.1.js"></script>
    <script src="js/custom.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  </head>

  <body>

    <!-- Begin navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <a class="navbar-brand" href="landing.php"><img alt="Ebookhub.id" src="images/logo.png" class="img-responsive" /></a>

        </div>

        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Kategori <i class="fa fa-angle-down" aria-hidden="true"></i>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php
                  $daftarkategori = daftarKategori("category");
                  while ($row = mysqli_fetch_row($daftarkategori)) {
                    echo '
                    <a class="dropdown-item" href="shop-category.php?id='.$row[1].'&offset=0">'.$row[1].'</a>
                    ';
                  }
                ?>
              </div>
            </li>
            <li><a href="shop.php?offset=0">Shop</a></li>

            <li>

              <form class="navbar-form" role="search" action="search_shop.php" method="GET">
                  <div class="input-group">
                      <input type="text" class="form-control" placeholder="Kata Kunci..." name="query">
                      <div class="input-group-btn">
                          <button class="btn btn-default hidden-xs" type="submit">Cari</button>
                      </div>
                  </div>
              </form>
            </li>
            <?php
						if (isset($_SESSION["namauser"])){
              echo '
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  '.$_SESSION["namauser"].' <i class="fa fa-angle-down" aria-hidden="true"></i>
                </a>';
                if ($_SESSION["role"] === "editor"){
                  echo '
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="lihat-profil.php">Profil</a><br/>
                  <a class="dropdown-item" href="daftar-pengajuan.php">Editor Area</a><br />  
                  ';
                }else if ($_SESSION["role"] === "admin"){
                  echo '
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="lihat-profil.php">Profil</a><br/>
                  <a class="dropdown-item" href="statistik2.php">Statistik</a><br />  
                  ';
                }else{
                  echo'
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="lihat-profil.php">Profil</a><br/>
                  <a class="dropdown-item" href="status-pengajuan.php">Status Pengajuan</a><br/>
                  <a class="dropdown-item" href="buku-saya.php">Buku Saya</a><br/>
                  ';
                  }
                  echo '
                  <a href="services/logout.php" class="dropdown-item" href="#">Keluar</a>
                </div>
              </li>
							';
						}else if(!isset($_SESSION['namauser'])) {
							echo '
              <li> <a data-toggle="modal" href="#myModal">Masuk</a> </li>
							';
						}
					?>
          </ul>
        </div>

        <!-- Trigger the modal with a button -->
<!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->

<!-- Modal -->

      </div>
    </nav>
    <!-- End navigation -->

    <?php
      require_once("login.php");
     ?>
