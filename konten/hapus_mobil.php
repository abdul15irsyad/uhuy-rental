<?php
	include 'koneksi.php';

	$id_mobil=$_POST['id'];

	if (!empty($id_mobil)) {
		$sql_select=mysqli_query($koneksi,"SELECT * FROM mobil_table WHERE id_mobil='".$id_mobil."' ");
		while($foto=mysqli_fetch_array($sql_select)){
			unlink("../".$foto['foto']);
			$sql_hapus=mysqli_query($koneksi,"DELETE FROM mobil_table WHERE id_mobil='".$id_mobil."'");
		}
	}
?>