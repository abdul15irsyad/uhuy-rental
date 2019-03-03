<?php
	include 'koneksi.php';

	$merk=$_POST['merk'];
	$jenis=$_POST['jenis'];
	$transmisi=$_POST['transmisi'];
	$tahun=$_POST['tahun'];
	$harga=$_POST['harga'];
	// $foto=$_POST['foto'];

	if (!empty($merk) 
		&& !empty($jenis)
		&& !empty($transmisi)
		&& !empty($tahun)
		&& !empty($harga)) {
		$sql=mysqli_query($koneksi,"INSERT INTO mobil_table(merk,jenis,transmisi,tahun,harga,status) VALUES('".$merk."','".$jenis."','".$transmisi."','".$tahun."','".$harga."','available')");
		$res=mysqli_fetch_row($sql);
		echo json_encode($res);
	}
?>