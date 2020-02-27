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
                <?php
                      if ($_SESSION["role"] === "editor"){
                        echo'
                        <li>
                          <a href="lihat-profil.php">Profil</a>
                        </li>
                        <li class="active-profil">
                          <a href="edit-password.php">Edit Password</a>
                        </li>
                          <li>
                            <a href="daftar-pengajuan.php">Daftar Pengajuan</a>
                          </li>

                        ';
                      }else{
                        echo'
                        <li>
                          <a href="lihat-profil.php">Profil</a>
                        </li>
                        <li class="active-profil">
                          <a href="edit-password.php">Edit Password</a>
                        </li>
                        <li>
                          <a href="status-pengajuan.php">Status Pengajuan</a>
                        </li>
                        <li>
                          <a href="buku-saya.php">Buku Saya</a>
                        </li>
                        ';
                      }
                    ?>
              </ul>
            </div>
          </div>
        </div>

      </div>

      <div class="col-md-9">
        <h1 class="register-title">Edit Password</h1>
        
        <form name="changepwd" action="services/change-password.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="">Password Lama:</label>
            <input name="PassOld" type="password" class="form-control form-register">
          </div>

          <div class="form-group">
            <label for="">Password Baru:</label>
            <input name="PassNew" type="password" class="form-control form-register">
          </div>

          <div class="form-group">
            <label for="">Konfirmasi Password Baru:</label>
            <input name="PassConfirm" type="password" class="form-control form-register">
          </div>

          <button type="submit" name="submit" class="btn btn-primary btn-block btn-ebookhub btn-register">Simpan</button>
        </form>


      </div>


    </div>


  </div>
</div>

<?php
require_once("templates/footer.php");
?>
