<?php
  include 'koneksi.php';
  
  $iduser=$_GET['id'];
  $sql=mysqli_query($koneksi,"SELECT * FROM user_table WHERE id_user='".$iduser."'");
  $data=mysqli_fetch_array($sql);
?>
<script type="text/javascript" src="js/konten.js"></script>
<div id="form_tambah">
	<form action="konten/edit_user.php" method="post">
  		<div class="form-group">
    		<label for="exampleFormControlInput1">Nama Depan</label>
        <input type="hidden" name="iduser" value="<?php echo $iduser;?>">
    		<input type="text" class="form-control" id="exampleFormControlInput1" name="nama_depan" placeholder="Nama Depan" value="<?php echo $data['nama_depan']; ?>" autofocus="autofocus">
  		</div>
  		<div class="form-group">
    		<label for="exampleFormControlInput1">Nama Belakang</label>
    		<input type="text" class="form-control" id="exampleFormControlInput1" name="nama_belakang" placeholder="Nama Belakang" value="<?php echo $data['nama_belakang']; ?>">
  		</div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Username</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="username" placeholder="Username" value="<?php echo $data['username']; ?>">
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Password</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="password" placeholder="Password" value="<?php echo $data['password']; ?>">
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Email</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="email" placeholder="youremail@example.com" value="<?php echo $data['email']; ?>">
      </div>
  		<div class="form-group">
    		<label for="exampleFormControlInput1">Nomor Telpon</label>
    		<input type="text" class="form-control" id="exampleFormControlInput1" name="notelp" placeholder="0888-8888-xxxx" value="<?php echo $data['no_telp']; ?>">
  		</div>
  		<div class="form-control">
  			<a href="admin.php?page=user_table" class="btn btn-light full-add">Batalkan</a>
  			<button type="submit" class="btn btn-primary full-add">Simpan</button>
  		</div>
  		<!-- <div class="form-group">
    		<label for="exampleFormControlSelect1">Example select</label>
    		<select class="form-control" id="exampleFormControlSelect1">
      			<option>1</option>
      			<option>2</option>
      			<option>3</option>
      			<option>4</option>
      			<option>5</option>
    		</select>
  		</div> -->
  	<!--<div class="form-group">
    		<label for="exampleFormControlTextarea1">Example textarea</label>
    		<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  		</div> -->
	</form>
</div>