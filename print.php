<?php
  // defenisikan koneksi
  require('config.php');
  // Cek apakah parameter ID ada
  if (isset($_GET['npm'])) {
    // jika ada ambil nilai id
    $id = $_GET['npm'];
  } else {
    // jika tidak ada redirect ke index.php
    header('Location:index.php');
  }
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Cetak KTM</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="print.css">
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
		</div>
	</nav>
	
	<div class="container" style="margin-top:20px" align="center">
			<h2>Cetak Kartu Tanda Mahasiswa</h2>
		<hr>

				<?php
      // query SQL menampilkan data dari table tbl_biodata
      
      $sql = "SELECT * FROM tb_mahasiswa where npm='$id'";
      // tampung data (dalam array) kedalam variable $biodata
      $biodata = mysqli_query($db, $sql);
      // variable untuk membuat tabel HTML
      $strTbl = "<div class='table-responsive'>";
      $strTbl .= "<table class='table  table-bordered table-hover' id='dataTables-example'>";
      // cek apakah $biodata nilai kosong atau tidakss
      if (mysqli_num_rows($biodata) > 0) {
        // jika ada tampilkan kedalam tabel
        $data = mysqli_fetch_assoc($biodata);
 
      } else {
        // jika data tidak ada, tampilkan pesan didalam tabel
        $strTbl .="<tr><td colspan='2'>Ooouppsss... Maaf, data masih kosong, tambahkan data dari Database terlebih dahulu</td></tr>";
      }
      $strTbl .= "</table>";
      $strTbl .= "</div>";
            // tampilkan tabel pada halaman
      print($strTbl);
     ?>


<div class="card">
  <header>
    <h5 align="left">Kartu Tanda Mahasiswa</h5>
    <div class="logo">
      <span>
        <img src="logo.jpg" id="Layer_1" viewBox="0 0 234.5 53.7"><style>.st0{fill:none;stroke:#FFCC33;stroke-width:5;stroke-miterlimit:10;}</style><path d="M.6 1.4L116.9 52l117-50.6" class="st0"/></img>
      </span></div>
  </header>

  <div class="announcement">
    
    <h5 align="left"> NPM      : <?php echo $data['npm'] ?></h5>
    <h5 align="left"> Nama     : <?php echo $data['nama'] ?></h5>
    <h5 align="left"> TTL      : <?php echo $data['tempat_lahir'] ?>,<?php echo $data['tanggal_lahir'] ?></h5>
    <h5 align="left"> Fakultas : <?php echo $data['nama_fakultas'] ?></h5>
    <h5 align="left"> prodi    : S1 - <?php echo $data['nama_prodi'] ?></h5>
    <h6>Tanggal Berlaku S/D 30-12-2024</h6>

  </div>
  <div class="foto">
      <span>
        <img src="foto/<?php echo $foto; ?>"></img>
      </span>
   </div>
   <div class="barcode">
      <span>
        <img src="barcode.jpg" ></img>
      </span>
   </div>
   <div class="unikama">
      <span>
        <img src="unikama.jpg" ></img>
      </span>
    </div>
</div>

	<script>
		window.print();
	</script>
 
</body>
</html>