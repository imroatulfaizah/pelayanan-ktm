<?php 
	include('config.php'); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pelayanan KTM</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="#">Pelayanan KTM</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
		</div>
	</nav>
	
	<div class="container" style="margin-top:20px">
		<h2>Edit Mahasiswa</h2>
		
		<hr>
		
		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['npm'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$npm = $_GET['npm'];
			
			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM tb_mahasiswa WHERE npm='$npm'") or die(mysqli_error($koneksi));
			
			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">NPM tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>
		
		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
			$nama		= $_POST['nama'];
			$lahir		= $_POST['lahir'];
			$ttl		= $_POST['ttl'];
			$prodi		= $_POST['prodi'];
			$fakultas	= $_POST['fakultas'];
			$foto		= $_POST['foto'];

			$sql = mysqli_query($koneksi, "UPDATE tb_mahasiswa SET nama='$nama', lahir='$lahir', ttl='$ttl', prodi='$fakultas', ttl='$fakultas', foto='$foto' WHERE npm='$npm'") or die(mysqli_error($koneksi));
			
			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="edit.php?npm='.$npm.'";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>	
		<form action="edit.php?npm=<?php echo $npm; ?>" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NPM</label>
				<div class="col-sm-10">
					<input type="text" name="npm" class="form-control" size="4" value="<?php echo $data['npm']; ?>" readonly required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NAMA MAHASISWA</label>
				<div class="col-sm-10">
					<input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">TEMPAT LAHIR</label>
				<div class="col-sm-10">
					<input type="text" name="lahir" class="form-control" value="<?php echo $data['lahir']; ?>" required>
				</div>
			</div>
				<div class="form-group row">
				<label class="col-sm-2 col-form-label">TANGGAL LAHIR</label>
				<div class="col-sm-10">
					<input type="text" name="ttl" class="form-control" value="<?php echo $data['ttl']; ?>" required>
				</div>
			</div>
				<div class="form-group row">
				<label class="col-sm-2 col-form-label">PRODI</label>
				<div class="col-sm-10">
					<input type="text" name="prodi" class="form-control" value="<?php echo $data['prodi']; ?>" required>
				</div>
			</div>
				<div class="form-group row">
				<label class="col-sm-2 col-form-label">FAKULTAS</label>
				<div class="col-sm-10">
					<input type="text" name="fakultas" class="form-control" value="<?php echo $data['fakultas']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">FOTO</label>
				<div class="col-sm-10">
					<input type="text" name="foto" class="form-control" value="<?php echo $data['foto']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
					<a href="index.php" class="btn btn-warning">KEMBALI</a>
				</div>
			</div>
		</form>
		
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
</body>
</html>