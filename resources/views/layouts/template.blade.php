<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="icon" href="{{ asset('assets/images/logo_communityconnect.png') }}" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Community Connect</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}" />

  <!-- Fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet" />

  <!-- Font awesome style -->
  <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
  <!-- Responsive style -->
  <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet" />

  <style>
    .hero_area {
      background-color: #f5f5f5;
      padding: 20px 0;
      text-align: center;
    }
    .hero_area h1 {
      font-size: 36px;
      font-weight: 600;
      color: #333;
      margin-bottom: 20px;
    }
    .hero_area p {
      font-size: 18px;
      color: #666;
      margin-bottom: 30px;
    }
    .hero_area .btn-box {
      margin-top: 10px;
    }
    .hero_area .btn1,
    .hero_area .btn2 {
      background-color: #007bff;
      color: #fff;
      padding: 10px 20px;
      border-radius: 5px;
      text-decoration: none;
      margin-right: 10px;
    }
    .hero_area .btn1:hover,
    .hero_area .btn2:hover {
      background-color: #0056b3;
    }
    .navbar-nav {
      margin-top: 10px;
    }
    .navbar-nav .nav-item {
      margin-right: 5px;
    }
    .navbar-nav .nav-link {
      padding-top: 0px;
      padding-bottom: 0px;
    }
  </style>
</head>

<body>
  <div class="hero_area">
    <!-- Header section starts -->
    @include('components.header')
    <!-- End header section -->

    <!-- Slider section -->
    @yield('content')
    <!-- End slider section -->
  @include('components.footer')
  </div>

  <!-- Footer section -->
  <!-- End footer section -->

  <!-- jQuery -->
  <script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
  <!-- Bootstrap JS -->
  <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
  <!-- Custom JS -->
  <script src="{{ asset('assets/js/custom.js') }}"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
  <!-- End Google Map -->

</body>

</html>
