<?php
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
}

//koneksi ke database
require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");
//$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id DESC");
//$mahasiswa = query("SELECT * FROM mahasiswa WHERE nim = '195314142'");
//$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id ASC");

//tombol cari ditekan
if (isset($_POST["cari"])) {
	$mahasiswa = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman Admin</title>

	<style>
		.loader{
			width: 100px;
			position: absolute;
			top: 120px;
			left: 290px;
			z-index: -1;
			display: none;
		}

		@media print{
			.logout, .tambah, .form-cari, .aksi{
				display: none;
			}
		}
	</style>
</head>
<body>

	<a href="logout.php">Logout</a> | <a href="cetak.php" target="_blank">Cetak</a>
	<br>

	<h1>Dafta Mahasiswa</h1>
	
	<a href="tambah.php" class="tambah">Tambah data Mahasiswa</a>
	<br><br>

	<form action="" method="post" class="form-cari">
		<input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian..." autocomplete="off" id="keyword">
		<button type="submit" name="cari" id="tombol-cari">Cari!</button>

		<img src="img/loader.gif" class="loader">
	</form>
	<br>

	<div id="container">

		<table border="1" cellpadding="10" cellspacing="0">
			
			<tr>
				<th>No.</th>
				<th class="aksi">Aksi</th>
				<th>Gambar</th>
				<th>NIM</th>
				<th>Nama</th>
				<th>Email</th>
				<th>Jurusan</th>
			</tr>

			<?php $i = 1; ?>
			<?php foreach ($mahasiswa as $row) : ?>
			<tr>
				<td><?= $i;?></td>
				<td class="aksi">
					<a href="ubah.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin?')">ubah</a> |
					<a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin?')">hapus</a>
				</td>
				<td><img src="img/<?= $row["gambar"]; ?>" width="50px"></td>
				<td><?= $row["nim"]; ?></td>
				<td><?= $row["nama"]; ?></td>
				<td><?= $row["email"]; ?></td>
				<td><?= $row["jurusan"]; ?></td>
			</tr>
			<?php $i++; ?>
			<?php endforeach; ?>

		</table>
	</div>
<script src="js/jquery-3.6.0.min.js"></script>

<script src="js/script.js"></script>
</body>
</html>