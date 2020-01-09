<?php
//memasukkan file config.php
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
 
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Daftar Mahasiswa</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="cek_mahasiswa.php">Tambah</a>
					</li>
				</ul>
			</div> 
		</div>
	</nav>
	
	<div class="container" style="margin-top:20px">
		<h2>Daftar Mahasiswa</h2>
		
		<hr>
		
		<table class="table table-striped table-hover table-sm table-bordered">
			<thead class="thead-dark">
				<tr>
					<th>NO.</th>
					<th>NPM</th>
					<th>NAMA MAHASISWA</th>
					<th>JURUSAN</th>
					<th>FAKULTAS</th>
					<th>TEMPAT LAHIR</th>
					<th>TANGGAL LAHIR</th>
					<th>FOTO</th>
					<th>CETAK</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$sql = "SELECT * FROM tb_mahasiswa";
				$no = 1;
				$query = mysqli_query($db, $sql);
				while ($cinta = mysqli_fetch_assoc($query)) {
			?>
						
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $cinta['npm']; ?></td>
							<td><?php echo $cinta['nama']; ?></td>
							<td><?php echo $cinta['tempat_lahir']; ?></td>
							<td><?php echo $cinta['tanggal_lahir']; ?></td>
							<td><?php echo $cinta['nama_prodi']; ?></td>
							<td><?php echo $cinta['nama_fakultas']; ?></td>
							<td><a class="thumbnail">
							<img height="200dp" width="200dp" src="foto/<?php echo $foto; ?>">
							</a></td>
							<td>
								<a href="print.php?npm=<?php echo $cinta['npm']?>" class="badge badge-warning">CETAK</a>
							</td>
						</tr>
						<?php
						
					}
				//jika query menghasilkan nilai 0
				
				?>
			<tbody>
		</table>
		
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
</body>
</html>
