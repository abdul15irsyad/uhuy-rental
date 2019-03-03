<?php
  session_start();
  if (!isset($_SESSION['user'])) {
    header('location:index.php');
  }elseif($_SESSION['user']!='admin'){
    header('location:user.php');
  }
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <link href="img/logo/logo-mini-sm-white.png" rel="icon">
    <link href="img/logo/logo-mini-sm-white.png" rel="apple-touch-icon">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Uhuy Rental | Admin</title>

    <!-- Bootstrap core CSS-->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Custom fonts for this template-->
    <link href="lib/fontawesome-free/css/all.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="lib/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/admin.css" rel="stylesheet" type="text/css">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top" id="navbar_sticky">

      <div class="navbar-left">
        <a class="navbar-brand mr-1" href="#"><img src="img/logo/logo-sm-white.png"> Admin</a>
        <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i>
        </button>
      </div>
      <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <li class="nav-item dropdown no-arrow">
          <button class="btn btn-danger btn-keluar" data-toggle="modal" data-target="#logoutModal">Keluar</button>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item">
          <a class="nav-link nav-link-user nav-link-aktif" href="#" id="btn_user" title="Tabel Pengguna">
            <i class="fas fa-fw fa-user"></i>
            <span>Pengguna</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-link-mobil" href="#" id="btn_mobil" title="Tabel Mobil">
            <i class="fas fa-fw fa-car"></i>
            <span>Mobil</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-link-peminjaman" href="#" id="btn_peminjaman"  title="Tabel Penyewaan">
            <i class="fas fa-fw fa-table"></i>
            <span>Penyewaan</span></a>
        </li>
      </ul>

      <div id="content-wrapper">
        <!-- ============== -->
        <!--   Page Admin   -->
        <!-- ============== -->
        <div class="container-fluid">
          <!-- ============== -->
          <!--   User table   -->
          <!-- ============== -->
          <div class="konten konten-user-table card-body">
            <div class="row justify-content-center">
              <div class="col col-md-auto">
                <h3>Tabel Pengguna</h3>
              </div>
            </div>
            <div class="row row-search">
              <div class="col">
                <div id="search-bar" class="input-group">
                  <input type="text" class="form-control" id="search_user" placeholder="Cari pengguna">
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-bordered table-hover" id="user_table" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>No Telp</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody id="tbody_user">
                </tbody>
              </table>
            </div>
          </div><!-- End User Table -->

          <!-- ================ -->
          <!--    Mobil table   -->
          <!-- ================ -->
          <div class="konten konten-mobil-table card-body">
            <div class="row justify-content-center">
              <div class="col col-md-auto">
                <h3>Tabel Mobil</h3>
              </div>
            </div>
            <div class="row row-search">
              <div class="col">
                <button href="#" id="btn_add_mobil" class="btn btn-primary"><i class="fas fa-plus"></i><span>&nbsp;Tambah Mobil</span></button>
              </div>
              <div class="col">
                <div id="search-bar" class="input-group">
                  <input type="text" class="form-control" id="search_mobil" placeholder="Cari mobil">
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-bordered table-hover" id="mobil_table" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Merk</th>
                    <th>Model</th>
                    <th>Jenis</th>
                    <th>Transmisi</th>
                    <th>Tahun</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody id="tbody_mobil">
                </tbody>
              </table>
            </div>
            <!-- Modal detail mobil -->
            <div class="modal fade" id="modal_detail_mobil">
              <div class="modal-dialog">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Mobil 5</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                    <img src="img/gambar_mobil/mobil_1.jpg">
                    <table class="table table-modal">
                      <tbody></tbody>
                    </table>
                  </div>

                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <p>Please login first to rent a car</p>
                  </div>

                </div>
              </div>
            </div>
          </div><!-- End Mobil Table -->

          <!-- ================= -->
          <!-- Form Tambah Mobil -->
          <!-- ================= -->
          <div class="konten konten-tambah-mobil card-body" >
            <div class="row justify-content-center mb-3">
              <div class="col col-md-auto">
                <h3>Tambah Mobil</h3>
              </div>
            </div>
            <form id="form_tambah_mobil" enctype="multipart/form-data">
              <div class="form-group">
                <label for="inputMerk">Merk</label>
                <input type="text" class="form-control" id="inputMerk" name="merk" placeholder="Merk" autofocus="autofocus" required>
              </div>
              <div class="form-group">
                <label for="inputModel">Model</label>
                <input type="text" class="form-control" id="inputModel" name="model" placeholder="Model" required>
              </div>
              <div class="form-group">
                <label for="inputJenis">Jenis</label>
                <input type="text" class="form-control" id="inputJenis" name="jenis" placeholder="Jenis" required>
              </div>
              <div class="form-group">
                <label for="inputTransmisi">Transmisi</label>
                <select class="form-control" name="transmisi" id="inputTransmisi">
                    <option value="Manual">Manual</option>
                    <option value="Automatic">Automatic</option>
                </select>
                <!-- <input type="text" class="form-control" id="inputTransmisi" name="transmisi" placeholder="Transmisi" required> -->
              </div>
              <div class="form-group">
                <label for="inputTahun">Tahun</label>
                <input type="number" class="form-control" id="inputTahun" name="tahun" placeholder="Tahun" max="9999" required>
              </div>
              <div class="form-group">
                <label for="inputHarga">Harga Sewa</label>
                <input type="text" class="form-control" id="inputHarga" name="harga" placeholder="Harga Sewa" required>
              </div>
              <!-- upload foto -->
              <div class="form-group">
                Foto<br>
                <input type="file" class="inputFile" id="file" name="file" accept="image/*" onchange="showPreview(this,'tambah')">
                <label for="file" class="labelInputFile"><i class="fas fa-upload"></i>&nbsp;&nbsp;Unggah Gambar</label><br>
                <div class="tambah_mobil image_preview">
                  <!-- <p>Preview Image</p> -->
                  <img src="img/assets/image_preview.png">
                </div>
              </div>
              <div>
                <div class="row row-btn">
                  <div class="col">
                    <button id="batal_tambah_mobil" class="btn btn-batal full-add">Batalkan</button>
                  </div>
                  <div class="col">
                    <button type="submit" id="jadi_tambah_mobil" class="btn btn-primary full-add" >Tambah</button>
                  </div>
                </div>
              </div>
            </form>
          </div><!-- End Form Tambah Mobil -->

          <!-- ================= -->
          <!-- Form Edit Mobil -->
          <!-- ================= -->
          <div class="konten konten-edit-mobil card-body" >
            <div class="row justify-content-center mb-3">
              <div class="col col-md-auto">
                <h3>Edit Mobil</h3>
              </div>
            </div>
            <form id="form_edit_mobil" enctype="multipart/form-data">
              <!-- <input type="hidden" class="form-control" id="editId" name="id_mobil"> -->
              <!-- div class="form-group">
                <label for="editId">Id</label> -->
                <input type="hidden" class="form-control" id="editId" name="id_mobil">
              <!-- </div> -->
              <div class="form-group">
                <label for="editMerk">Merk</label>
                <input type="text" class="form-control" id="editMerk" name="merk" required>
              </div>
              <div class="form-group">
                <label for="editModel">Model</label>
                <input type="text" class="form-control" id="editModel" name="model" required>
              </div>
              <div class="form-group">
                <label for="editJenis">Jenis</label>
                <input type="text" class="form-control" id="editJenis" name="jenis" required>
              </div>
              <div class="form-group">
                <label for="editTransmisi">Transmisi</label>
                <select class="form-control" name="transmisi" id="editTransmisi">
                    <option value="Manual">Manual</option>
                    <option value="Automatic">Automatic</option>
                </select>
                <!-- <input type="text" class="form-control" id="editTransmisi" name="transmisi"required> -->
              </div>
              <div class="form-group">
                <label for="editTahun">Tahun</label>
                <input type="number" class="form-control" id="editTahun" name="tahun" max="9999" required>
              </div>
              <div class="form-group">
                <label for="editHarga">Harga Sewa</label>
                <input type="text" class="form-control" id="editHarga" name="harga" required>
              </div>
              <div class="form-group">
                <label for="editStatus">Status</label>
                <!-- <input type="text" class="form-control" id="editStatus" name="status" required> -->
                <select class="form-control" name="status" id="editStatus">
                    <option value="available">Available</option>
                    <option value="rented">Rented</option>
                </select>
              </div>
              <!-- upload foto -->
              <div class="form-group">
                Foto<br>
                <input type="file" class="inputFile" id="editfile" name="file" accept="image/*" onchange="showPreview(this,'edit')">
                <label for="editfile" class="labelInputFile"><i class="fas fa-upload"></i>&nbsp;&nbsp;Unggah Gambar</label><br>
                <div class="edit_mobil image_preview">
                  <!-- <p>Preview Image</p> -->
                  <img src="img/assets/image_preview.png">
                </div>
              </div>
              <div>
                <div class="row row-btn">
                  <div class="col">
                    <button id="batal_edit_mobil" class="btn btn-batal full-add">Batalkan</button>
                  </div>
                  <div class="col">
                    <button type="submit" class="btn btn-primary full-add" >Simpan</button>
                  </div>
                </div>
              </div>
            </form>
          </div><!-- End Form Tambah Mobil -->

          <!-- =============== -->
          <!-- Penyewaan Table -->
          <!-- =============== -->
          <div class="konten konten-peminjaman-table card-body">
            <div class="row justify-content-center">
              <div class="col col-md-auto">
                <h3>Tabel Penyewaan</h3>
              </div>
            </div>
            <div class="row row-search">
              <div class="col">
                <div id="search-bar" class="input-group">
                  <input type="text" class="form-control" id="search_peminjaman" placeholder="Cari data penyewaan">
                </div>
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
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody id="tbody_peminjaman">
                </tbody>
              </table>
              <a href="konten/print.php" class="btn btn-primary" style="float: right;">Cetak Laporan</a>
            </div>
          </div><!-- End Penyewaan Table -->

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center">
              <span>© Copyright . <strong>SOACTIVE 2018</strong>. All Rights Reserved</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Apakah anda yakin ingin keluar ?</div>
          <div class="modal-footer">
            <!-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button> -->
            <a class="btn btn-danger" href="konten/logout.php">Keluar</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="lib/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/admin.js"></script>
    <script type="text/javascript" src="js/konten.js"></script>
    
    <!-- Page level plugin JavaScript-->
    <!-- <script src="vendor/chart.js/Chart.min.js"></script> -->
    <script src="lib/datatables/jquery.dataTables.js"></script>
    <script src="lib/datatables/dataTables.bootstrap4.js"></script>


    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>

  </body>

</html>
