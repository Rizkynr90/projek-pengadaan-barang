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
			$edit = mysqli_query($koneksi, "UPDATE supplier SET			 	
						nama_supplier = '$_POST[tnama_supplier]',
                        no_telp = '$_POST[tno_telp]',
						alamat = '$_POST[talamat]'
                        WHERE id_supplier ='$_POST[id]'
										   ");
			if($edit) 
			{
				echo "<script>
						alert('Edit data suksess!');
						document.location='supplier.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Edit data GAGAL!!');
						document.location='supplier.php';
				     </script>";
			}
		}
		else
		{
		
			$simpan = mysqli_query($koneksi, "INSERT INTO supplier (id_supplier, nama_supplier, no_telp, alamat)
										  VALUES ('$_POST[tid_supplier]', 
										  		 '$_POST[tnama_supplier]', 
										  		 '$_POST[tno_telp]', 
										  		 '$_POST[talamat]')
										 ");
			if($simpan) 
			{
				echo "<script>
						alert('Simpan data suksess!');
						document.location='supplier.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Simpan data GAGAL!!');
						document.location='supplier.php';
				     </script>";
			}
		}


		
	}



	if(isset($_GET['hal']))
	{
		
		if($_GET['hal'] == "edit")
		{
		
			$tampil = mysqli_query($koneksi, "SELECT * FROM supplier WHERE id_supplier = '$_GET[id]' ");
			$data = mysqli_fetch_array($tampil);
			if($data)
			{
				
				$vid_supplier = $data['id_supplier'];
				$vnama_supplier = $data['nama_supplier'];
				$vno_telp = $data['no_telp'];
				$valamat = $data['alamat'];
			}
		}
		else if ($_GET['hal'] == "hapus")
		{

			$hapus = mysqli_query($koneksi, "DELETE FROM supplier WHERE id_supplier = '$_GET[id]' ");
			if($hapus){
				echo "<script>
						alert('Hapus Data Suksess!!');
						document.location='supplier.php';
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
          <a class="nav-link active" href="supplier.php"><b>Supplier</b></a>
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
	    <p class="text-center">Penambahan Data Supplier</p>
	  </div>
	  <div class="card-body">
	    <form method="post" action="">
	    	<div class="form-group">
	    		<label>ID Supplier</label>
	    		<input type="text" name="tid_supplier" value="<?=@$vid_supplier?>" class="form-control" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Nama Supplier</label>
	    		<input type="text" name="tnama_supplier" value="<?=@$vnama_supplier?>" class="form-control" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Nomor Telepon</label>
	    		<input type="text" name="tno_telp" value="<?=@$vno_telp?>" class="form-control" required>
	    	</div>
			<div class="form-group">
				<label>Alamat</label>
				<textarea class="form-control" name="talamat"></textarea>
			</div>
			<br></br>
	    	<button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
	    	<button type="reset" class="btn btn-danger" name="breset">Kosongkan</button>

	    </form>
	  </div>
	</div>
	<div class="card mt-3">
	  <div class="card-header bg-dark text-white">
	    <p class="text-center">Data Supplier</p>
	  </div>
	  <div class="card-body">
	    
	    <table class="table table-bordered table-striped">
	    	<tr>
	    		<th>No.</th>
	    		<th>ID Supplier</th>
	    		<th>Nama Supplier</th>
	    		<th>Nomor Telepon</th>
	    		<th>Alamat</th>
	    		<th>Aksi</th>
	    	</tr>
	    	<?php
	    		$no = 1;
	    		$tampil = mysqli_query($koneksi, "SELECT * from supplier order by id_supplier desc");
	    		while($data = mysqli_fetch_array($tampil)) :

	    	?>
	    	<tr>
	    		<td><?=$no++;?></td>
	    		<td><?=$data['id_supplier']?></td>
	    		<td><?=$data['nama_supplier']?></td>
	    		<td><?=$data['no_telp']?></td>
	    		<td><?=$data['alamat']?></td>
	    		<td>
	    			<a href="supplier.php?hal=edit&id=<?=$data['id_supplier']?>" class="btn btn-warning"> Edit </a>
	    			<a href="supplier.php?hal=hapus&id=<?=$data['id_supplier']?>" 
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