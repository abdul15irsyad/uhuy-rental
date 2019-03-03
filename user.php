<?php
  session_start();
  if (!isset($_SESSION['user'])) {
    header('location:index.php');
  }else{
    if ($_SESSION['user']=="admin") {
      header('location:admin.php');
    }
  }
  include 'konten/koneksi.php';
  $sql = "SELECT * FROM user_table WHERE username='".$_SESSION['user']."'";
  $user = mysqli_fetch_array(mysqli_query($koneksi,$sql));
?>
<!DOCTYPE html>
<html>
<head>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta charset="utf-8">
  <title>Uhuy Rental</title>
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/logo/logo-mini-sm-white.png" rel="icon">
  <link href="img/logo/logo-mini-sm-white.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Open+Sans:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <!-- <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet"> -->
  <link href="lib/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/login_modal.css" rel="stylesheet">
</head>

<body>
<?php
  echo "<script>var idUserSession = ".$user['id_user']."</script>";
?>
  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <h1><a href="#" class="scrollto">
          <img src="img/logo/logo-md-white.png">
          <span>Uhuy Rental</span>
        </a></h1>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a id="btn_page" href="#">Cars</a></li>
          <li class="menu-has-children">
            <a href="#" id="btn_login" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <!--<span id="profile_image"><img src="img/profile/default-sm.png"></span>-->
              <?php echo $user['username'] ?>  
            </a>
            <ul>
              <li><a href="#" id="btn_myprofile">My Profile</a></li>
              <li><a href="#" id="btn_mybooking">My Booking</a></li>
              <li><a href="#" data-toggle="modal" data-target="#logoutModal">Logout</a></li>
            </ul>
            </div>
          </li>

        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Are you sure want to logout from this account ?</div>
          <div class="modal-footer">
            <a class="btn btn-danger" href="konten/logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">

    <div class="intro-text">
      <br><br><br><br>
      <h2>Welcome <strong><?= $user['nama_depan'];?></strong></h2>
      <p>Wanna rent a car?</p>
    </div>
    <div class="div-btn">
      <a class="btn btn-get-started" href="#page">Rent a Car</a>
    </div>
  </section><!-- #intro -->

  <main id="main">

    <section id="page" class="main-konten main-konten-page">
      <div class="container container-page">

        <div class="section-header">
          <h3 class="section-title">Our Cars</h3>
          <span class="section-divider"></span>
          <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>

        <div id="search-bar" class="input-group">
          <input type="text" id="input_search" class="form-control" placeholder="Try search a car">
          <div class="input-group-append">
            <button class="btn btn-success" type="submit"><i class="fas fa-search"></i></button> 
          </div>
        </div>
        
        <!-- tampilan page mobil-->
        <div id="card-mobil-db" class="row row-card justify-content-md-center"></div>
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
              <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
              <button class="btn-rent-car">Rent Car</button>
            </div>

          </div>
        </div>
      </div>
    </section>

    <!-- ========== -->
    <!-- My Profile -->
    <!-- ========== -->
    <section id="myprofile" class="main-konten main-konten-myprofile">
      <div class="container container-myprofile">
        <div class="section-header">
          <h3 class="section-title">My Profile</h3>
          <span class="section-divider"></span>
        </div>

        <table class="table">
          <tr>
            <td>
              <h2><?php echo $user['nama_depan']." ".$user['nama_belakang']; ?></h2>
            </td>
          </tr>
          <tr>
            <td>
              <h4><i class="fas fa-user"></i>&emsp;<?php echo $user['username']; ?></h4>
            </td>
          </tr>
          <tr>
            <td>
              <h4><i class="fas fa-envelope"></i>&emsp;<?php echo $user['email']; ?></h4>
            </td>
          </tr>
          <tr>
            <td>
              <h4><i class="fas fa-phone"></i>&emsp;<?php echo $user['no_telp']; ?></h4>
            </td>
          </tr>
        </table>

        <div class="row row-button-profile justify-content-md-center">
          <button class="btn-theme">Edit Profile</button>
        </div>
      </div>
    </section>

    <!-- ========== -->
    <!-- My Booking -->
    <!-- ========== -->
    <section id="mybooking" class="main-konten main-konten-mybooking">
      <div class="container container-mybooking">
        <div class="section-header">
          <h3 class="section-title">My Booking</h3>
          <span class="section-divider"></span>
        </div>
        <div id="mybooking_car" class="row row-card justify-content-md-center">
        </div>
      </div>
      <!-- Modal detail mobil -->
      <div class="modal fade" id="modal_detail_mobil_mybooking">
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
              <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
              <!-- <button class="btn-rent-car">Rent Car</button> -->
            </div>

          </div>
        </div>
      </div>
    </section>
  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="copyright">
            &copy; Copyright <strong>SOACTIVE 2018</strong>. All Rights Reserved
          </div>
        </div>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/magnific-popup/magnific-popup.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>
  <script src="js/login_form.js"></script>

</body>
</html>