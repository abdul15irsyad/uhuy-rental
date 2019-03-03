<?php 
  // header("Content-type: application/vnd.ms-excel");
  // header("Content-Disposition: attachment; filename=penyewaan ".date('j M Y').".xls"); 
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="../lib/fontawesome-free/css/all.css" rel="stylesheet" type="text/css">
  <link href="../css/admin.css" rel="stylesheet" type="text/css">
</head>
<body>
  <?php
    include 'koneksi.php';

    $sql_peminjaman=mysqli_query($koneksi,"SELECT * FROM ((peminjaman_table INNER JOIN user_table ON peminjaman_table.id_user=user_table.id_user) INNER JOIN mobil_table ON peminjaman_table.id_mobil=mobil_table.id_mobil)");
  ?>
  <div class="card-body">
    <div class="row justify-content-center">
      <div class="col col-md-auto">
        <h3>Tabel Penyewaan</h3>
      </div>
    </div>
    
    <div class="table-responsive">
      <table class="table table-bordered table-hover" id="peminjaman_table" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Nama Pengguna</th>
            <th>Mobil</th>
            <th>Tanggal Sewa</th>
            <th>Tanggal Selesai</th>
            <th>Bayar</th>
          </tr>
        </thead>
        <tbody id="tbody_peminjaman">
          <?php
            while($peminjaman=mysqli_fetch_array($sql_peminjaman)){
              $tgl_sewa = strtotime($peminjaman['tgl_sewa']);
              $tgl_selesai = strtotime($peminjaman['tgl_selesai']);
              $sewa = date("d-M-Y",$tgl_sewa);
              $selesai = date("d-M-Y",$tgl_selesai);
          ?>
          <tr>
            <td><?php echo $peminjaman['nama_depan']." ".$peminjaman['nama_belakang'] ?></td>
            <td><?php echo $peminjaman['merk']." ".$peminjaman['model'] ?></td>
            <td><?php echo $sewa ?></td>
            <td><?php echo $selesai ?></td>
            <td><?php echo $peminjaman['status_bayar'] ?></td>
          </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
<script src="lib/jquery/jquery.min.js"></script>
<script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="js/admin.js"></script>
<script type="text/javascript" src="js/konten.js"></script>
<script type="text/javascript">
  window.print();
  
</script>
</html>