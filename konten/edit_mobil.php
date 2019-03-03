<?php
	include 'koneksi.php';

	$idmobil=$_POST['idmobil'];
	$merk=$_POST['merk'];
	$jenis=$_POST['jenis'];
	$transmisi=$_POST['transmisi'];
	$tahun=$_POST['tahun'];
	$harga=$_POST['harga'];

	if (!empty($merk) 
		&& !empty($jenis)
		&& !empty($transmisi)
		&& !empty($tahun)
		&& !empty($harga)) {
		$sql=mysqli_query($koneksi,"UPDATE mobil_table SET merk='".$merk."',jenis='".$jenis."',transmisi='".$transmisi."',tahun='".$tahun."',harga='".$harga."' WHERE id_mobil='".$idmobil."'");
		header('location:../admin.php?page=mobil_table');
	}else{
		header('location:'.$_SERVER['HTTP_REFERER']);
	}
?>