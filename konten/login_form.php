<?php

?>
<!DOCTYPE html>
<html>
<head>
	<title>Rental Mobil | Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/login_form.css">
	<script type="text/javascript" src="../lib/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="../js/login_form.js"></script>
</head>
<body>
<div class="login-page justify-content-center">
  <div class="form">
    <form class="register-form" action="signup.php" method="post">
    	<div class="title">
    		<label>SIGN UP</label>	
    	</div>
      	<input type="text" name="nama_depan" placeholder="Nama Depan" style="text-transform: capitalize;" />
      	<input type="text" name="nama_belakang" placeholder="Nama Belakang" style="text-transform: capitalize;"/>
      	<input type="emai" name="email" placeholder="youremail@example.com"/>
      	<input type="text" name="notelp" placeholder="0888-8888-xxxx"/>
      	<input type="text" name="username" placeholder="Username"/>
      	<input type="password" name="password" placeholder="Password"/>
      	<input type="submit" name="btn_create" value="Create">
      	<p class="message message-sign-in">Already registered? <a href="#">Sign In</a></p>
    </form>
    <form class="login-form" action="login.php" method="post">
      	<div class="title">
      		<label>LOGIN</label>
      	</div>
      	<input type="text" name="username" placeholder="Username"/>
      	<input type="password" name="password" placeholder="Password"/>
      	<input type="submit" name="btn_login" value="Login">
      	<p class="message message-register">Not registered? <a href="#">Create an account</a></p>
    </form>
  </div>
</div>
</body>
</html>