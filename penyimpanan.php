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
			//Persiapan hapus data
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
          <a class="nav-link active" aria-current="page" href="penyimpanan.php"><b>Beranda</b></a>
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
    		<li><a class="dropdown-item" href="jenis_barang.php">Jenis Barang</a></li>
  		</ul>
		</div>

		<div class="container">
			<div class="row mt-5">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body"><b>Total Data Barang Masuk</b></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
										<?php $sql   = "SELECT * FROM barang_masuk";
											  $data   = mysqli_query($koneksi, $sql);
											  $produk1 = mysqli_num_rows($data);  ?>
                                        <p class="small text-white stretched-link" href="#"><b><?php echo $produk1 ?></b></p>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body"><b>Total Data Barang Keluar</b></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
										<?php $sql   = "SELECT * FROM barang_keluar";
											  $data   = mysqli_query($koneksi, $sql);
											  $produk2 = mysqli_num_rows($data);  ?>
                                        <p class="small text-white stretched-link" href="#"><b><?php echo $produk2 ?></b></p>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body"><b>Total Data Stok Barang</b></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
										<?php $sql   = "SELECT * FROM penyimpanan_barang";
											  $data   = mysqli_query($koneksi, $sql);
											  $produk3 = mysqli_num_rows($data);  ?>
                                        <p class="small text-white stretched-link" href="#"><b><?php echo $produk3 ?></b></p>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body"><b>Total Data Supplier</b></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
										<?php $sql   = "SELECT * FROM supplier";
											  $data   = mysqli_query($koneksi, $sql);
											  $produk4 = mysqli_num_rows($data);  ?>
                                        <p class="small text-white stretched-link" href="#"><b><?php echo $produk4 ?></b></p>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
		</div>

<div class="container">

	
	<div class="card mt-3">
	  <div class="card-header bg-dark text-white">
	    <p class="text-center">Data Barang</p>
	  </div>
	  <div class="card-body">
	    
	    <table class="table table-bordered table-striped">
	    	<tr>
	    		<th>No.</th>
	    		<th>ID Barang</th>
	    		<th>Nama Barang</th>
	    		<th>Stok Barang</th>
	    		<th>ID Satuan</th>
				<th>ID Jenis</th>
	    		
	    	</tr>
	    	<?php
	    		$no = 1;
	    		$tampil = mysqli_query($koneksi, "SELECT * from penyimpanan_barang order by id_barang desc");
	    		while($data = mysqli_fetch_array($tampil)) :

	    	?>
	    	<tr>
	    		<td><?=$no++;?></td>
	    		<td><?=$data['id_barang']?></td>
	    		<td><?=$data['nama_barang']?></td>
	    		<td><?=$data['stok_barang']?></td>
				<td><?=$data['id_satuan']?></td>
				<td><?=$data['id_jenis']?></td>
	    		
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