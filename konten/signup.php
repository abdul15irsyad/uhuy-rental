<?php
// --- koneksi ke database
include 'koneksi.php';

$nama_depan = $_POST['nama_depan'];
$nama_belakang = $_POST['nama_belakang'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$notelp = $_POST['notelp'];
// $foto = $_POST['foto'];

if(!empty($nama_depan) 
    && !empty($nama_belakang) 
    && !empty($username) 
    && !empty($password) 
    && !empty($email) 
    && !empty($notelp)){
    $sql = "INSERT INTO user_table (nama_depan,nama_belakang,username,password,email,no_telp) VALUES('".$nama_depan."','".$nama_belakang."','".$username."','".$password."','".$email."','".$notelp."')";
    if(mysqli_query($koneksi, $sql)){
        session_start();
    	$_SESSION['user']=$username;
        header('location:../user.php');
    }else{
    	header('location:login_form.php');
    }
} else {
    $pesan = "Tidak dapat menyimpan, data belum lengkap!";
    header('location:login_form.php');
}
?> 