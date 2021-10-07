<?php
	//Koneksi Database
	$server = "localhost";
	$user = "root";
	$pass = "";
	$database = "rizkyn_pengadaan";

	$koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));

	if(isset($_POST['bsimpan']))
	{
		if($_GET['hal'] == "edit")
		{
			$edit = mysqli_query($koneksi, "UPDATE jenis_barang set
                        id_jenis= '$_POST[tid_jenis]',
												jenis_barang = '$_POST[tjenis_barang]',
                        WHERE id_jenis='$_POST[id]'
										   ");
			if($edit) 
			{
				echo "<script>
						alert('Edit data suksess!');
						document.location='jenis_barang.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Edit data GAGAL!!');
						document.location='jenis_barang.php';
				     </script>";
			}
		}
		else
		{
			$simpan = mysqli_query($koneksi, "INSERT INTO jenis_barang (id_jenis, jenis_barang)
										  VALUES (
										  		 '$_POST[tid_jenis]', 
										  		 '$_POST[tjenis_barang]')
										 ");
			if($simpan) 
			{
				echo "<script>
						alert('Simpan data suksess!');
						document.location='jenis_barang.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Simpan data GAGAL!!');
						document.location='jenis_barang.php';
				     </script>";
			}
		}


		
	}


	if(isset($_GET['hal']))
	{
		if($_GET['hal'] == "edit")
		{
			$tampil = mysqli_query($koneksi, "SELECT * FROM jenis_barang WHERE id_jenis = '$_GET[id]' ");
			$data = mysqli_fetch_array($tampil);
			if($data)
			{
				
				$vid_jenis = $data['id_jenis'];
				$vjenis_barang = $data['jenis_barang'];
			}
		}
		else if ($_GET['hal'] == "hapus")
		{
			
			$hapus = mysqli_query($koneksi, "DELETE FROM jenis_barang WHERE id_jenis = '$_GET[id]' ");
			if($hapus){
				echo "<script>
						alert('Hapus Data Suksess!!');
						document.location='jenis_barang.php';
				     </script>";
			}
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="#"><i><b>Pengadaan barang</b></i></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse text-right" id="navbarText">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="penyimpanan.php"><b>Beranda</b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="barang_masuk.php"><b>Barang Masuk</b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="barang_keluar.php"><b>Barang Keluar</b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="supplier.php"><b>Supplier</b></a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="logout.php"><b>Logout</b></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="dropdown">
  			<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    		Data Master
  			</button>
 			<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    		<li><a class="dropdown-item" href="satuan_barang.php">Satuan Barang</a></li>
    		<li><a class="dropdown-item" href="jenis_barang.php">Jenis Barang</a></li>
  		</ul>
		</div>
<div class="container">
	<!-- Awal Card Form -->
	<div class="card mt-5">
	  <div class="card-header bg-dark text-white">
	    <p class="text-center">Penambahan Data Jenis Barang</p>
	  </div>
	  <div class="card-body">
	    <form method="post" action="">
	    	<div class="form-group">
	    		<label>ID Jenis</label>
	    		<input type="text" name="tid_jenis" value="<?=@$vid_jenis?>" class="form-control" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Jenis Barang</label>
	    		<input type="text" name="tjenis_barang" value="<?=@$vjenis_barang?>" class="form-control" required>
	    	</div>
        <br>
	    	<button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
	    	<button type="reset" class="btn btn-danger" name="breset">Kosongkan</button>
	    </form>
	  </div>
	</div>
	<div class="card mt-3">
	  <div class="card-header bg-dark text-white">
	    <p class="text-center">Data Jenis Barang</p>
	  </div>
	  <div class="card-body">
	    
	    <table class="table table-bordered table-striped">
	    	<tr>
	    		<th>No.</th>
	    		<th>ID Jenis</th>
	    		<th>Jenis Barang</th>
	    		<th>Aksi</th>
	    	</tr>
	    	<?php
	    		$no = 1;
	    		$tampil = mysqli_query($koneksi, "SELECT * from jenis_barang order by id_jenis desc");
	    		while($data = mysqli_fetch_array($tampil)) :

	    	?>
	    	<tr>
	    		<td><?=$no++;?></td>
	    		<td><?=$data['id_jenis']?></td>
	    		<td><?=$data['jenis_barang']?></td>
	    		<td>
	    			<a href="jenis_barang.php?hal=edit&id=<?=$data['id_jenis']?>" class="btn btn-warning"> Edit </a>
	    			<a href="jenis_barang.php?hal=hapus&id=<?=$data['jenis_barang']?>" 
	    			   onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger"> Hapus </a>
	    		</td>
	    	</tr>
	    <?php endwhile;?>
	    </table>

	  </div>
	</div>

</div>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>