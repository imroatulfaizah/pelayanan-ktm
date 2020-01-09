<?php
//memasukkan file config.php
include('config.php');
						$url='http://localhost/pmb/webservice/list_json_mhs.php';
						$json = file_get_contents($url);
						 
						// deserialize data from JSON
						$krs = json_decode($json,true);
						 // var_dump($krs);

?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD PHP MySQLi | TUTORIALWEB.NET</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="#"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="index.php">Home</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="tambah.php">Tambah</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	
	<div class="container" style="margin-top:20px">
		<h2>Tambah Mahasiswa</h2>
		
		<hr>
		
		<?php
		if(isset($_POST['submit'])){
			$npm			= $_POST['npm'];
			$nama			= $_POST['nama'];
			$tempat_lahir			= $_POST['tempat_lahir'];
			$tanggal_lahir			= $_POST['tanggal_lahir'];
			$nama_prodi	= $_POST['nama_prodi'];
			$nama_fakultas		= $_POST['nama_fakultas'];
			$foto			= $_POST['foto'];
			
			$cek = mysqli_query($koneksi, "SELECT * FROM tb_mahasiswa WHERE npm='$npm'") or die(mysqli_error($koneksi));
			
			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO tb_mahasiswa (npm, nama, tempat_lahir, tanggal_lahir, nama_prodi, nama_fakultas, foto) VALUES('$npm', '$nama', '$tempat_lahir', '$tanggal_lahir, $nama_prodi, $nama_fakultas, $foto')") or die(mysqli_error($koneksi));
				
				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="tambah.php";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, npm sudah terdaftar.</div>';
			}
		}
		?>
		
		<form action="tambah.php" method="post"  enctype="multipart/form-data>
			<div class="form-group row">
						<label>NPM</label>
						<select type ="text" id="npm"  onchange="cek_mahasiswa()" name = "npm" class="form-control" required>
							<?php 

						$no = 0;
						foreach ($krs['list_info'] as $kr) {
							$no++;
							foreach ($kr as $key => $value) {
								$$key=$value;
							}

							?>
						<option><?php echo $npm; } ?>
							
						</option>

						</select>
					</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NAMA MAHASISWA</label>
				<div class="col-sm-10">
					<input type="text" name="nama" id="nama" class="form-control" required>
				</div>
			</div>
						<div class="form-group row">
				<label class="col-sm-2 col-form-label">TEMPAT LAHIR</label>
				<div class="col-sm-10">
					<input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" required>
				</div>
			</div>
						<div class="form-group row">
				<label class="col-sm-2 col-form-label">TANGGAL LAHIR</label>
				<div class="col-sm-10">
					<input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required>
				</div>
			</div>
						<div class="form-group row">
				<label class="col-sm-2 col-form-label">NAMA PRODI</label>
				<div class="col-sm-10">
					<input type="text" name="nama_prodi" id="nama_prodi" class="form-control" required>
				</div>
			</div>
						<div class="form-group row">
				<label class="col-sm-2 col-form-label">NAMA FAKULTAS</label>
				<div class="col-sm-10">
					<input type="text" name="nama_fakultas" id="nama_fakultas" class="form-control" required>
				</div>
			</div>
						<div class="form-group row">
				<label class="col-sm-2 col-form-label">FOTO</label>
				<div class="col-sm-10">
					<input type="file" name="foto" id="foto" class="form-control" required>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
				</div>
			</div>
		</form>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
						<script type="text/javascript">
						    function cek_mahasiswa(){
						        var npm = $("#npm").val();
						        $.ajax({
						            url: 'http://localhost/pmb/webservice/cek_mahasiswa.php',
						            data:"npm="+npm ,
						        }).success(function (data) {
						            var json = data,
						            obj = JSON.parse(json);
						            $('#nama').val(obj.nama);
						            $('#tempat_lahir').val(obj.tempat_lahir);
						            $('#tanggal_lahir').val(obj.tanggal_lahir);
						            $('#nama_prodi').val(obj.nama_prodi);
						            $('#nama_fakultas').val(obj.nama_fakultas);
						            $('#foto').val(obj.foto);
						      
						        });
						    }
						</script>
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
</body>
</html>