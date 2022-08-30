<?php
require 'functions.php';

// tombol register sudah ditekan
if (isset($_POST["register"])) {
	if (registrasi($_POST) > 0) {
		echo "
		<script>
			alert('User Baru Berhasil DiTambahkan !');
		</script>
		";
	}else{
		echo mysqli_error($conn);
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman Registrasi</title>
	<style>
		label{
			display: block;
		}
	</style>
</head>
<body>


	<h1>Halaman Registrasi</h1>

	<form action="" method="post">

		<ul>
			<li>
				<label for="username">Username : </label>
				<input type="text" name="username" id="username">
			</li>
			<li>
				<label for="password">Password : </label>
				<input type="password" name="password" id="password">
			</li>
			<li>
				<label for="password2">Konfirmasi Password : </label>
				<input type="password" name="password2" id="password2">
			</li>
			<br>
			<li>
				<button type="submit" name="register">Register!</button>
			</li>
		</ul>
		
	</form>

</body>
</html>