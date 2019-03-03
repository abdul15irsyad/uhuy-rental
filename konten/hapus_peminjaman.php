<?php
	include 'koneksi.php';

	$id_peminjaman=$_POST['id'];

	if (!empty($id_peminjaman)) {
		$sql_peminjaman=mysqli_query($koneksi,"SELECT * FROM peminjaman_table WHERE id_peminjaman='$id_peminjaman' ");
		while($peminjaman=mysqli_fetch_array($sql_peminjaman)){
			$sql_available=mysqli_query($koneksi,"UPDATE mobil_table SET status='available' WHERE id_mobil='$peminjaman[id_mobil]' ");
			$sql_hapus_peminjaman=mysqli_query($koneksi,"DELETE FROM peminjaman_table WHERE id_peminjaman='".$id_peminjaman."'");
		}
	}
?>