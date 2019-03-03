<?php
  session_start();
  if (isset($_SESSION['user'])) {
    if ($_SESSION['user']=='admin'){
      header('location:admin.php');
    }
    header('location:user.php');
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Uhuy Rental</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
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
  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <h1><a href="#intro" class="scrollto">
          <img src="img/logo/logo-md-white.png">
          <span>Uhuy Rental</span>
        </a></h1>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="#page">Cars</a></li>
          <li><a href="#features">Features</a></li>
          <li><a href="#gallery">Gallery</a></li>
          <li><a href="#team">Team</a></li>
          <li><a href="#" id="btn_login" data-toggle="modal" data-target="#modal_login">Login</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <div class="modal fade" id="modal_login">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal body -->
        <div class="modal-body">
          <div class="form">
            <form class="register-form" action="konten/signup.php" method="post">
              <div class="title">
                <label>Create an Account</label>  
              </div>
              <span class="section-divider"></span>
              <input type="text" name="nama_depan" placeholder="Nama Depan" style="text-transform: capitalize;" required/>
              <input type="text" name="nama_belakang" placeholder="Nama Belakang" style="text-transform: capitalize;" required/>
              <input type="email" name="email" placeholder="youremail@example.com" required/>
              <input type="text" name="notelp" placeholder="0888-8888-xxxx" required/>
              <input type="text" name="username" placeholder="Username" required/>
              <input type="password" name="password" placeholder="Password" required/>
              <input type="submit" name="btn_create" value="Create Account" class="btn">
              <p class="message message-sign-in">Already registered? <a href="#">Sign In</a></p>
            </form>

            <form class="login-form" action="konten/login.php" method="post">
              <div class="title">
                <label>Login</label>
              </div>
              <span class="section-divider"></span>
              <input type="text" name="username" placeholder="Username or Email" required/>
              <input type="password" name="password" placeholder="Password" required/>
              <input type="submit" name="btn_login" value="Login" class="btn">
              <p class="message message-register">Didn't have an account? <a href="#">Create an account</a></p>
            </form>
          </div>
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
      <h2>Welcome to <strong>UHUY RENTAL</strong></h2>
      <p>a company that will give you many choices to rent a car</p>
    </div>
    <div class="div-btn">
      <a class="btn btn-get-started" href="#page">Get Started</a>
    </div>
  </section><!-- #intro -->

  <main id="main">

    <section id="page">
      <div class="container container-page">

        <div class="section-header">
          <h3 class="section-title">Our Cars</h3>
          <span class="section-divider"></span>
          <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>

        <div id="search-bar" class="input-group">
          <input type="text" id="input_search" class="form-control" placeholder="Try search a car">
          <div class="input-group-append">
            <button class="btn btn-success" id="btn_search_mobil"><i class="fas fa-search"></i></button> 
          </div>
        </div>
        
        <!-- tampilan page mobil-->
        <div id="card-mobil-db" class="row"></div>
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
              <!-- <button class="btn-rent-car">Rent Car</button> -->
              <p>Please login first to rent a car</p>
            </div>

          </div>
        </div>
      </div>
      
    </section>

    <!--==========================
     Features Section
    ============================-->
    <section id="features" class="section-bg">
      <div class="container">

        <div class="section-header">
          <h3 class="section-title">Features</h3>
          <span class="section-divider"></span>
          <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>

        <div class="row">

          <div class="col-lg-6">
            <div class="box wow fadeInLeft">
              <div class="icon"><i class="ion-ios-stopwatch-outline"></i></div>
              <h4 class="title"><a href="">Lorem Ipsum</a></h4>
              <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident etiro rabeta lingo.</p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box wow fadeInRight">
              <div class="icon"><i class="ion-ios-bookmarks-outline"></i></div>
              <h4 class="title"><a href="">Dolor Sitema</a></h4>
              <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata nodera clas.</p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box wow fadeInLeft">
              <div class="icon"><i class="ion-ios-heart-outline"></i></div>
              <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
              <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur trinige zareta lobur trade.</p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box wow fadeInRight">
              <div class="icon"><i class="ion-ios-analytics-outline"></i></div>
              <h4 class="title"><a href="">Magni Dolores</a></h4>
              <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum rideta zanox satirente madera</p>
            </div>
          </div>

        </div>
      </div>
    </section><!-- #more-features -->

    <!--==========================
      Gallery Section
    ============================-->
    <section id="gallery">
      <div class="container-fluid">
        <div class="section-header">
          <h3 class="section-title">Gallery</h3>
          <span class="section-divider"></span>
          <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>

        <div class="row no-gutters">

          <div class="col-lg-4 col-md-6">
            <div class="gallery-item wow fadeInUp">
              <a href="img/gallery/gallery-1.jpg" class="gallery-popup">
                <img src="img/gallery/gallery-1.jpg" alt="">
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="gallery-item wow fadeInUp">
              <a href="img/gallery/gallery-2.jpg" class="gallery-popup">
                <img src="img/gallery/gallery-2.jpg" alt="">
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="gallery-item wow fadeInUp">
              <a href="img/gallery/gallery-3.jpg" class="gallery-popup">
                <img src="img/gallery/gallery-3.jpg" alt="">
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="gallery-item wow fadeInUp">
              <a href="img/gallery/gallery-4.jpg" class="gallery-popup">
                <img src="img/gallery/gallery-4.jpg" alt="">
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="gallery-item wow fadeInUp">
              <a href="img/gallery/gallery-5.jpg" class="gallery-popup">
                <img src="img/gallery/gallery-5.jpg" alt="">
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="gallery-item wow fadeInUp">
              <a href="img/gallery/gallery-6.jpg" class="gallery-popup">
                <img src="img/gallery/gallery-6.jpg" alt="">
              </a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #gallery -->

    <!--==========================
      Our Team Section
    ============================-->
    <section id="team" class="section-bg">
      <div class="container">
        <div class="section-header">
          <h3 class="section-title">Our Team</h3>
          <span class="section-divider"></span>
          <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>
        <div class="row wow fadeInUp">
          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="img/team/team-1.png" alt=""></div>
              <h4>Fathan Radhiyan</h4>
              <span>Chief Executive Officer</span>
              <div class="social">
                <a href=""><i class="fab fa-twitter"></i></a>
                <a href=""><i class="fab fa-facebook"></i></a>
                <a href=""><i class="fab fa-instagram"></i></a>
                <a href=""><i class="fab fa-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="img/team/team-2.png" alt=""></div>
              <h4>Diana Nur Yastin</h4>
              <span>Product Manager</span>
              <div class="social">
                <a href=""><i class="fab fa-twitter"></i></a>
                <a href=""><i class="fab fa-facebook"></i></a>
                <a href=""><i class="fab fa-instagram"></i></a>
                <a href=""><i class="fab fa-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="img/team/team-4.png" alt=""></div>
              <h4>Fildzah Waladien</h4>
              <span>Marketing Manager</span>
              <div class="social">
                <a href=""><i class="fab fa-twitter"></i></a>
                <a href=""><i class="fab fa-facebook"></i></a>
                <a href=""><i class="fab fa-instagram"></i></a>
                <a href=""><i class="fab fa-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="img/team/team-3.png" alt=""></div>
              <h4>Irsyad Abdul</h4>
              <span>Engineer  </span>
              <div class="social">
                <a href=""><i class="fab fa-twitter"></i></a>
                <a href=""><i class="fab fa-facebook"></i></a>
                <a href=""><i class="fab fa-instagram"></i></a>
                <a href=""><i class="fab fa-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- #team -->

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