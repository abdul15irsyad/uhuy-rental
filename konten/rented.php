<?php
	include 'koneksi.php';

	$idmobil=$_POST['id'];

	if (!empty($idmobil)) {
		$sql=mysqli_query($koneksi,"UPDATE mobil_table SET status='rented' WHERE id_mobil='".$idmobil."'");
	}
?>