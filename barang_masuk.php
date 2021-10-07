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
			
			$edit = mysqli_query($koneksi, "UPDATE barang_keluar set
                        			jumlah_barang = '$_POST[tjumlah_barang]',
									tglkeluar = '$_POST[ttanggal_keluar]',
                        			WHERE id_barang_keluar='$_POST[id]'
										   ");
			if($edit) 
			{
				echo "<script>
						alert('Edit data suksess!');
						document.location='barang_keluar.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Edit data GAGAL!!');
						document.location='barang_keluar.php';
				     </script>";
			}
		}
		else
		{
			
			$simpan = mysqli_query($koneksi, "INSERT INTO barang_keluar (jumlah_barang, tanggal_keluar)
										  VALUES (
											  	 '$_POST[$id_user]',
												 '$_POST[$_barang]',
										  		 '$_POST[tjumlah_barang]', 
										  		 '$_POST[ttanggal_keluar]')
										 ");
			if($simpan) 
			{
				echo "<script>
						alert('Simpan data suksess!');
						document.location='barang_keluar.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Simpan data GAGAL!!');
						document.location='barang_keluar.php';
				     </script>";
			}
		}
	}
	
	if(isset($_GET['hal']))
	{
		
		if($_GET['hal'] == "edit")
		{
			
			$tampil = mysqli_query($koneksi, "SELECT * FROM barang_keluar WHERE id_barang_keluar = '$_GET[id]' ");
			$data = mysqli_fetch_array($tampil);
			if($data)
			{
				
				
				
				$vjumlah_barang = $data['jumlah_barang'];
				$vtglkeluar = $data['tanggal_keluar'];
			}
		}
		else if ($_GET['hal'] == "hapus")
		{
			
			$hapus = mysqli_query($koneksi, "DELETE FROM barang_keluar WHERE id_barang_keluar = '$_GET[id]' ");
			if($hapus){
				echo "<script>
						alert('Hapus Data Suksess!!');
						document.location='barang_keluar.php';
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
          <a class="nav-link active" href="barang_masuk.php"><b>Barang Masuk</b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="barang_keluar.php"><b>Barang Keluar</b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="supplier.php"><b>Supplier</b></a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="logout.php"><b>Logout</b></a>
        </li>
          </div>
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
    		<li><a class="dropdown-item" href="jenis_barang">Jenis Barang</a></li>
  		</ul>
		</div>

<div class="container">

	
	<div class="card mt-5">
	  <div class="card-header bg-dark text-white">
	    <p class="text-center">Penambahan Data Barang Masuk</p>
	  </div>
	  <div class="card-body">
	    <form method="post" action="">
			<div class="form-group">
	    		<label>ID Barang Masuk</label>
	    		<input type="text" name="tid_barang" value="<?=@$vjumlah_barang?>" class="form-control" required>
	    	</div>
			<div class="form-group">
	    		<label>ID Supplier</label>
                <input type="number" name="tjumlah_barang" value="<?=@$vjumlah_barang?>" class="form-control" required>
	    	</div>
	    	<div class="form-group">
	    		<label>ID User</label>
	    		<input type="number" name="tjumlah_barang" value="<?=@$vjumlah_barang?>" class="form-control" required>
	    	</div>
	    	<div class="form-group">
	    		<label>ID Barang</label>
	    		<input type="number" name="ttanggal_keluar" value="<?=@$vtglkeluar?>" class="form-control" required>
	    	</div>
	    	<br>
	    	<button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
	    	<button type="reset" class="btn btn-danger" name="breset">Kosongkan</button>

	    </form>
	  </div>
	</div>
	<!-- Akhir Card Form -->

	<!-- Awal Card Tabel -->
	<div class="card mt-3">
	  <div class="card-header bg-dark text-white">
	    <p class="text-center">Data Barang Masuk</p>
	  </div>
	  <div class="card-body">
	    
	    <table class="table table-bordered table-striped">
	    	<tr>
	    		<th>No.</th>
	    		<th>ID Barang Masuk</th>
	    		<th>ID Supplier</th>
	    		<th>ID User</th>
          <th>ID Barang</th>
	    		<th>Jumlah Masuk</th>
				  <th>Tanggal Masuk</th>
	    		<th>Aksi</th>
	    	</tr>
	    	<?php
	    		$no = 1;
	    		$tampil = mysqli_query($koneksi, "SELECT * from barang_masuk order by id_barang_masuk desc");
	    		while($data = mysqli_fetch_array($tampil)) :

	    	?>
	    	<tr>
	    		<td><?=$no++;?></td>
	    		<td><?=$data['id_barang_masuk']?></td>
	    		<td><?=$data['id_supplier']?></td>
				<td><?=$data['id_user']?></td>
	    		<td><?=$data['id_barang']?></td>
				<td><?=$data['jumlah_masuk']?></td>
				<td><?=$data['tanggal_masuk']?></td>
	    		<td>
	    			<a href="barang_masuk.php?hal=edit&id=<?=$data['id_barang_masuk']?>" class="btn btn-warning"> Edit </a>
	    			<a href="barang_masuk.php?hal=hapus&id=<?=$data['id_barang_masuk']?>" 
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