<?php
	include 'koneksi.php';

	$iduser=$_POST['iduser'];
	$nama_depan=$_POST['nama_depan'];
	$nama_belakang=$_POST['nama_belakang'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$email=$_POST['email'];
	$notelp=$_POST['notelp'];

	if (!empty($nama_depan) 
		&& !empty($nama_belakang)
		&& !empty($username)
		&& !empty($password)
		&& !empty($email)
		&& !empty($notelp)) {
		$sql=mysqli_query($koneksi,"UPDATE user_table SET nama_depan='".$nama_depan."',nama_belakang='".$nama_belakang."',username='".$username."',password='".$password."',email='".$email."',no_telp='".$notelp."' WHERE id_user='".$iduser."'");
		header('location:../admin.php?page=user_table');
	}else{
		header('location:'.$_SERVER['HTTP_REFERER']);
	}
?>