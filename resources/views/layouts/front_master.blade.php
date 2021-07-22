<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>E-Library Pemuda Persis Kota Bandung</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ url('assets/img/logo.png') }}" rel="icon">
  <link href="{{ url('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ url('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ url('assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
  <link href="{{ url('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ url('assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
  <link href="{{ url('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ url('assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ url('assets/vendor/aos/aos.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ url('assets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Dewi - v2.2.0
  * Template URL: https://bootstrapmade.com/dewi-free-multi-purpose-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ url('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ url('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  @stack('script')
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="{{ route('front') }}">LITKA</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
        <li><a href="{{ route('front') }}">Home</a></li>
          <li><a href="{{ route('front') }}">Tentang</a></li>
          <li class="drop-down @yield('front_buku')"><a href="{{ route('front_buku') }}">Buku</a>
            <ul>
              <li><a href="{{ route('front_buku') }}">Buku</a></li>
              <li><a href="#">Pengarang</a></li>
              <li><a href="#">Penerbit</a></li>
              <li><a href="#">Kategori</a></li>
              @if(!Auth::guest())
              <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
              @endif
            </ul>
          </li>
          <li><a href="#footer">Kontak</a></li>

        </ul>
      </nav><!-- .nav-menu -->

      <!-- //tombol login dan Logout -->
      @if(!Auth::guest())
      <a href="{{ route('logout') }}" class="get-started-btn scrollto" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
      </form>
      @else
      <a href="{{ route('login') }}" class="get-started-btn scrollto">Login</a>
      @endif

    </div>
  </header><!-- End Header -->

  <main id="main">

    @yield('front_content')

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>LITKA</h3>
              <h3>PD. Pemuda Persis</h3>
              <h3>Kota Bandung</h3>
              
              
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <p>
                Jl. Astanaanyar <br>
                No. 310 Kota Bandung<br><br>
                <strong>Phone:</strong><br>+62 821-21377835
              </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
          <h4>Link</h4>
          <div class="social-links mt-3">
                <a href="https://pemudapersisbandung.org/" target="_blank"><i class='bx bx-world'></i></a>
                <a href="https://www.facebook.com/pemudapersiskotabandung/" target="_blank" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="https://www.instagram.com/pemudapersiskotabandung/" target="_blank" class="instagram"><i class="bx bxl-instagram"></i></a>
              </div>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Kontak Kami</h4>
            <p>Bagi rekan-rekan yang mempunyai buku atau pdf karangan pejuang Persatuan Islam silahkan hubungi kami untuk diupload pada website ini </p>
            <a href="https://api.whatsapp.com/send?phone=6287881791025&text=Bismillah,%20Kang,%20saya%20ada%20buku%20PERSIS." target="_blank" class="btn btn-primary">WA Kami</a>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <a href="https://pemudapersisbandung.org/" target="_blank"><strong><span>PD. Pemuda Persis Kota Bandung</span></strong></a>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ url('assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ url('assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <script src="{{ url('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ url('assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
  <script src="{{ url('assets/vendor/counterup/counterup.min.js') }}"></script>
  <script src="{{ url('assets/vendor/venobox/venobox.min.js') }}"></script>
  <script src="{{ url('assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ url('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ url('assets/vendor/aos/aos.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ url('assets/js/main.js') }}"></script>

  <!-- DataTables -->
<script src="{{ url('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ url('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ url('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('adminlte/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('adminlte/dist/js/demo.js') }}"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "autoWidth": false,
      "scrollX": true,
    });
    $("#example3").DataTable({
      "autoWidth": false,
      "scrollX": true,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

</body>

</html>