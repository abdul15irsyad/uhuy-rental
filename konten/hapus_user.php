<?php
	include 'koneksi.php';

	$id_user=$_POST['id'];

	if (!empty($id_user)) {
		$sql=mysqli_query($koneksi,"DELETE FROM user_table WHERE id_user='".$id_user."'");
	}
?>