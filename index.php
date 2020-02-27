<?php
	
	header("Location: landing.php");

	$databaseServer = "sql12.freesqldatabase.com";
	$databaseUsername = "sql12313869";
	$databasePassword = "qy1jlUjdiy";
	$databaseName = "sql12313869";
	
	$databaseConnection = mysqli_connect($databaseServer, $databaseUsername, $databasePassword, $databaseName);
	// $databaseConnection = pg_connect("postgres://kovxbaeuzktubz:eaa8f9f8363b08decb33167d1f58990be497f0f912b92bf5a596eb5869cb9a14@ec2-54-243-239-199.compute-1.amazonaws.com:5432/d649uh5394brc8");

	// function exception_error_handler($errno, $errstr, $errfile, $errline ) {
	// 	throw new ErrorException($errstr, $errno, 0, $errfile, $errline);
	// }
	// set_error_handler("exception_error_handler");
	
	// try {
	// 	$databaseConnection = mysqli_connect($databaseServer, $databaseUsername, $databasePassword, $databaseName);
	// 	$conn=@pg_connect("postgres://ec2-54-243-239-199.compute-1.amazonaws.com:5432/d649uh5394brc8?user=kovxbaeuzktubz&password=eaa8f9f8363b08decb33167d1f58990be497f0f912b92bf5a596eb5869cb9a14&ssl=true");
	// } Catch (Exception $e) {
	// 	Echo $e->getMessage();
	// }

	if (!$databaseConnection){
		die ("Connection to database failed");
	}
	
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		
		// username and password sent from form 
		session_start();
		
		$username = $_POST['username'];
		$password = $_POST['password']; 
				
		$queryLogin = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
		$resultLogin = mysqli_query($databaseConnection,$queryLogin);
		
		$row = mysqli_fetch_array($resultLogin,MYSQLI_ASSOC);
		$active = $row['active'];
		  
		$count = mysqli_num_rows($resultLogin);
		// If result matched $myusername and $mypassword, table row must be 1 row
			
		if($count == 1) {
			
			$_SESSION["user_id"] = $row["user_id"];
			$_SESSION["namauser"] = $row["username"];
			$_SESSION["role"] = $row["role"];
			
			if ($row["role"] === "user"){
				header("Location: shop.php");
			}else if ($row["role"] === "penulis"){
				header("Location: upload.php");
			}else if ($row["role"] === "editor"){
				header("Location: unduh.php");
			}else if ($row["role"] === "admin"){
				header("Location: statistik.php");
			}
			else{
				header("Location: landing.php");
			}

		}else {
			echo  "<script type='text/javascript'>alert('Login Gagal');</script>";
		}
		
	}
	
	mysqli_close($databaseConnection);
	
?>
<!DOCTYPE html>
<html lang="id">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>EBOOKHUB.ID</title>
		<link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
	    <link rel="stylesheet" type="text/css" href="css/index.css">
	</head>
	<body>
		<div class="row">
			<h1 class="title">EBOOKHUB.ID</h1>
			<button type="button" class="btn btn-lg btn-default" data-toggle="modal" data-target="#insertModal">
				Log in
			</button>	
			<a href="landing.php" class="btn-nologin"><button type="button" class="btn btn-lg btn-default">Masuk tanpa Log in</button></a>
		</div>
		<div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="insertModalLabel">Login</h4>
					</div>
					<div class="modal-body">
						<form action="index.php" method="post">
							<div class="form-group">
								<label for="username">Username</label>
								<input type="text" class="form-control" id="insert-username" name="username" placeholder="Username" required>
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" class="form-control" id="insert-password" name="password" placeholder="Password" required>
							</div>
							<input type="hidden" id="insert-command" name="command" value="insert">
							<button type="submit" class="btn btn-primary">Login</button>
						</form>
						<br />
						<a data-toggle="modal" data-target="#registerModal" href="#registerModal">Don't have an account?</a>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="insertModalLabel">Register</h4>
					</div>
					<div class="modal-body">
						<form action="services/register.php" method="post">
							<div class="form-group">
								<label for="username">Username</label>
								<input type="text" class="form-control" id="insert-username" name="username" placeholder="Username" required>
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" class="form-control" id="insert-password" name="password" placeholder="Password" required>
							</div>
							<div class="form-group">
								<label for="role">Role</label>
								<select class="form-control" id="insert-role" name="role" placeholder="Role">
									<option>User</option>
									<option>Penulis</option>
								</select>
							</div>
							<input type="hidden" id="insert-command" name="command" value="insert">
							<button type="submit" class="btn btn-primary">Register</button>
						</form>
						<br />
						<a onclick="$('#registerModal').modal('hide')">Already have an account?</a>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
		<script type="text/javascript" src="bootstrap/dist/js/bootstrap.min.js"></script>
	</body>
</html>