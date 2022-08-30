<?php
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
}

require 'functions.php';

//ambil data diURL
$id = $_GET["id"];

//query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];
//var_dump($mhs["nim"]);

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
	
	//cek apakah data berhasil diubah atau tidak
	if (ubah($_POST) > 0) {
		echo "
			<script>
				alert('Data Berhasil Diubah !');
				document.location.href = 'index.php';
			</script>
		";
	}else{
		echo "
			<script>
				alert('Data Gagal Diubah !');
				document.location.href = 'index.php';
			</script>
		";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Data Mahasiswa</title>
</head>
<body>

	<h1>Edit Data Mahasiswa</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
		<input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">
		<ul>
			<li>
				<label for="nama">NAMA : </label>
				<input type="text" name="nama" id="nama" 
				value="<?= $mhs["nama"]; ?>">
			</li>
			<li>
				<label for="nim">NIM : </label>
				<input type="text" name="nim" id="nim" 
				value="<?= $mhs["nim"]; ?>">
			</li>
			<li>
				<label for="email">EMAIL : </label>
				<input type="text" name="email" id="email" 
				value="<?= $mhs["email"]; ?>">
			</li>
			<li>
				<label for="jurusan">JURUSAN : </label>
				<input type="text" name="jurusan" id="jurusan" 
				value="<?= $mhs["jurusan"]; ?>">
			</li>
			<li>
				<label for="gambar">GAMBAR : </label><br>
				<img src="img/<?= $mhs['gambar']; ?>" width = "50px"><br>
				<input type="file" name="gambar" id="gambar"> 
			</li>
			<br>
			<li>
				<button type="submit" name="submit">Edit Data</button>
			</li>
		</ul>
	</form>

</body>
</html>