

<?php include 'config.php';?>
						<?php
						$url='http://localhost/pmb/webservice/list_json_mhs.php';
						$json = file_get_contents($url);
						 
						// deserialize data from JSON
						$krs = json_decode($json,true);
						 // var_dump($krs);

						?>
						<!DOCTYPE html>
<html>

<head>
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
    <!--  wrapper -->
   
				<form  method="post" enctype="multipart/form-data">
					<div class="form-group">
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
					<div class="form-group">
						<label>Nama</label>
						<input name="nama" id="nama" type="text" class="form-control" placeholder="Nama ..">
					</div>
                    <div class="form-group">
                        <label>Tempat_lahir</label>
                        <input name="tempat_lahir" id="tempat_lahir" type="text" class="form-control" placeholder="Nama ..">
                    </div>
                    <div class="form-group">
                        <label>Tanggal_lahir</label>
                        <input name="tanggal_lahir" id="tanggal_lahir" type="text" class="form-control" placeholder="Nama ..">
                    </div>
					<div class="form-group">
						<label>Prodi</label>
						<input name="prodi" id="prodi" type="text" class="form-control" placeholder="Prodi ..">
					</div>

					<div class="form-group">
						<label>Fakultas</label>
						<input name="fakultas" id="fakultas" type="text" class="form-control" placeholder="Fa ..">
					</div>
                    <div class="form-group">
                        <label>Foto</label>
                        <input name="foto" id="foto" type="text" class="form-control" placeholder="Foto ..">
                    </div>
																

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<input type="submit" class="btn btn-primary" value="Simpan" name="submit">
				</div>
			</form>


						<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
						<script type="text/javascript">
						    function cek_mahasiswa(){
						        var npm = $("#npm").val();
						        $.ajax({
						            url: 'http://localhost/pmb/webservice/cek_pindah_prodi.php',
						            data:"npm="+npm ,
						        }).success(function (data) {
						            var json = data,
						            obj = JSON.parse(json);
						            $('#nama').val(obj.nama);
                                    $('#tempat_lahir').val(obj.tempat_lahir);
                                    $('#tanggal_lahir').val(obj.tanggal_lahir);
						            $('#prodi').val(obj.nama_prodi);
						            $('#fakultas').val(obj.nama_fakultas);
                                    $('#foto').val(obj.foto);
						      
						        });
						    }
						</script>
                    </table>

                    <!--pop up -->
      </div>
            </div>
        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/plugins/pace/pace.js"></script>
    <script src="assets/scripts/siminta.js"></script>
    <!-- Page-Level Plugin Scripts-->
  
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>
</body>
</html>



        <?php


// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['submit'])){
 
 
            $npm            = $_POST['npm'];
            $nama           = $_POST['nama'];
            $tempat_lahir           = $_POST['tempat_lahir'];
            $tanggal_lahir          = $_POST['tanggal_lahir'];
            $nama_prodi = $_POST['prodi'];
            $nama_fakultas      = $_POST['fakultas'];
            $foto           = $_POST['foto'];
 
        // buat query
$sql = "INSERT INTO tb_mahasiswa (npm, nama, tempat_lahir, tanggal_lahir, nama_prodi, nama_fakultas, foto) VALUES ('$npm', '$nama', '$tempat_lahir', '$tanggal_lahir', '$nama_prodi', '$nama_fakultas', '$foto')";
    $query = mysqli_query($db,$sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: index.php');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: tambah.php');

}
} else {
    die("akses dilarang");
}

?>