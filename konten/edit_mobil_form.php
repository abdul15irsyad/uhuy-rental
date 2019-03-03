<?php
  include 'koneksi.php';
  $idmobil=$_GET['id'];
  $sql=mysqli_query($koneksi,"SELECT * FROM mobil_table WHERE id_mobil='".$idmobil."'");
  $data=mysqli_fetch_array($sql);
?>
<div id="form_tambah">
	<form action="konten/edit_mobil.php" method="post">
  		<div class="form-group">
    		<label for="exampleFormControlInput1">Merk</label>
        <input type="hidden" name="idmobil" value="<?php echo $idmobil;?>">
    		<input type="text" class="form-control" id="exampleFormControlInput1" name="merk" placeholder="Merk" value="<?php echo $data['merk']; ?>" autofocus="autofocus">
  		</div>
  		<div class="form-group">
    		<label for="exampleFormControlInput1">Jenis</label>
    		<input type="text" class="form-control" id="exampleFormControlInput1" name="jenis" placeholder="Jenis" value="<?php echo $data['jenis']; ?>">
  		</div>
  		<div class="form-group">
    		<label for="exampleFormControlSelect1">Transmisi</label>
    		<select class="form-control" name="transmisi" id="exampleFormControlSelect1">
      			
            <option value="Manual" <?php if ($data['transmisi']=="Manual") {echo 'selceted="selected"';}else?> >Manual</option>
      			<option value="Automatic" <?php {echo 'selceted="selected"'; }?>>Automatic</option>
    		</select>
  		</div>
  		<div class="form-group">
    		<label for="exampleFormControlInput1">Tahun</label>
    		<input type="number" class="form-control" id="exampleFormControlInput1" name="tahun" placeholder="Tahun" value="<?php echo $data['tahun']; ?>">
  		</div>
  		<div class="form-group">
    		<label for="exampleFormControlInput1">Harga Sewa</label>
    		<input type="text" class="form-control" id="exampleFormControlInput1" name="harga" placeholder="Harga" value="<?php echo $data['harga']; ?>">
  		</div>
  		<div class="form-control">
  			<a href="admin.php?page=mobil_table" class="btn btn-light full-add">Batalkan</a>
  			<button type="submit" class="btn btn-primary full-add">Simpan</button>
  		</div>
	</form>
</div>