<?php
	session_start();
	empty($_SESSION['user']);
	session_destroy();
	header('location:../index.php');
?>