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

<div class="register">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="register-title">Daftar Akun Ebookhub</h1>
      </div>

      <div class="col-md-9 form-register-group">
        <form action="services/register.php" method="post">
          <input type="text" class="form-control form-register" name="pengguna" id="insert-username" placeholder="Nama pengguna..." required>
          <input type="text" class="form-control form-register" name="lengkap" placeholder="Nama lengkap..." required>
          <input type="email" class="form-control form-register" name="email" id="insert-email" placeholder="E-mail..." required>
          <input type="password" class="form-control form-register" id="insert-password" name="password" placeholder="Kata sandi..." required>
          <input type="password" class="form-control form-register" placeholder="Ulangi kata sandi..." required>
          <label class="checkbox-inline">
          <input type="checkbox" value="" required>Dengan pembuatan akun, Anda menyetujui <a href="syarat-dan-ketentuan.php">syarat & ketentuan</a> dari Ebookhub
          </label>

          <input type="hidden" id="insert-command" name="command" value="insert">
          <button type="submit" class="btn btn-primary btn-block btn-ebookhub btn-register">Daftar</button>
        </form>
      </div>

      <div class="col-md-3">
        <div class="login-social">
          <button type="button" class="btn btn-primary btn-block btn-fb"> <i class="fa fa-facebook"></i>&nbsp;&nbsp;Daftar dengan Facebook</button>
          <button type="button" class="btn btn-primary btn-block btn-google"> <i class="fa fa-google"></i>&nbsp;&nbsp;Daftar dengan Google</button>
        </div>
      </div>
    </div>


  </div>
</div>

<?php
  require_once("templates/footer.php");
?>
