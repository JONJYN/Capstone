<!DOCTYPE html>
<html>

<head>
	<script src="./assets/js/color-modes.js"></script>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Aplikasi Pembayaran SPP</title>

	<link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/headers/">

	<link href="./assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

	<!-- Favicons -->
	<link rel="apple-touch-icon" href="./assets/img/favicons/apple-touch-icon.png" sizes="180x180">
	<link rel="icon" href="./assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
	<link rel="icon" href="./assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
	<link rel="manifest" href="./assets/img/favicons/manifest.json">
	<link rel="mask-icon" href="./assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
	<link rel="icon" href="./assets/img/favicons/favicon.ico">
	<meta name="theme-color" content="#712cf9">

	<!-- Custom styles for this template -->
	<link href="./assets/custom.css" rel="stylesheet">
</head>

<body>
	<div class="modal modal-sheet position-static d-block bg-body-secondary p-4 py-md-5" tabindex="-1" role="dialog" id="modalSignin">
		<div class="modal-dialog" role="document">
			<div class="modal-content rounded-4 shadow">
				<div class="modal-header p-5 pb-4 border-bottom-0">
					<h1 class="fw-bold mb-0 fs-2">Silahkan Login Menggunakan Username dan Password Anda</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>

				<div class="modal-body p-5 pt-0">
					<form method="post" action="">
						<div class="form-floating mb-3">
							<input type="text" class="form-control rounded-3" id="username" name="username">
							<label for="floatingInput">Username</label>
						</div>
						<div class="form-floating mb-3">
							<input type="password" class="form-control rounded-3" id="pass" name="password">
							<label for="floatingPassword">Password</label>
						</div>
						<button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Log In</button>
						<hr class="my-4">
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php
	ob_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		//variabel untuk menyimpan kiriman dari form
		$user = $_POST['username'];
		$pass = $_POST['password'];

		if ($user == '' || $pass == '') {
			echo "Form belum lengkap!!";
		} else {
			include "connect.php";
			$sqlLogin = mysqli_query($connect, "SELECT * FROM admin 
						WHERE username='$user' AND password='$pass'");
			$jml = mysqli_num_rows($sqlLogin);
			$d = mysqli_fetch_array($sqlLogin);
			if ($jml > 0) {
				session_start();
				$_SESSION['login']	= true;
				$_SESSION['id']		= $d['idadmin'];
				$_SESSION['username'] = $d['username'];

				header('location:./index.php');
			} else {
				echo "Username dan Password anda Salah";
			}
		}
	}
	?>
</body>

</html>