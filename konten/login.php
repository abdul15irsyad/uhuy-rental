<?php
	include 'koneksi.php';
	session_start();

	$username = mysqli_real_escape_string($koneksi,$_POST['username']);
	$password = mysqli_real_escape_string($koneksi,$_POST['password']);

	if (!empty($username && !empty($password))) {
		if ($username=="admin" && $password=="admin") {
			$_SESSION['user']="admin";
			header('location:../admin.php');
		}
		$sql = "SELECT * FROM user_table WHERE (username='$username' OR email='$username') AND password='$password'";
		$login = mysqli_query($koneksi,$sql);
		$rowcount = mysqli_num_rows($login);
		if ($rowcount>=1) {
			$_SESSION['user']=$username;
			header('location:../user.php');
		}else{
			header('location:../index.php');
		}
	}
?>