<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ZenBlog</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('frontEnd')}}/assets/img/favicon.png" rel="icon">
  <link href="{{asset('frontEnd')}}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('frontEnd')}}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{asset('frontEnd')}}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{asset('frontEnd')}}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="{{asset('frontEnd')}}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{asset('frontEnd')}}/assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS Files -->
  <link href="{{asset('frontEnd')}}/assets/css/variables.css" rel="stylesheet">
  <link href="{{asset('frontEnd')}}/assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: ZenBlog - v1.2.1
  * Template URL: https://bootstrapmade.com/zenblog-bootstrap-blog-template/
  * Author: BootstrapMade.com
  * License: https:///bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="{{route('home')}}" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="{{asset('frontEnd')}}/assets/img/logo.png" alt=""> -->
        <h1>ZenBlog</h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
            <li class="dropdown"><a><span>Categories</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              @foreach ($categories as $category )
              <li><a href="{{route('category.front',['catId'=>$category->id])}}">{{$category->category_name}}</a></li>    
              @endforeach
              
            </ul>
          </li>

          <li><a href="{{route('about')}}">About</a></li>
          <li><a href="{{route('contect')}}">Contact</a></li>
        </ul>
      </nav><!-- .navbar -->

      <div class="position-relative">
        @if (Session::get('userId'))
           <a href="{{route('user.logout')}}" class="btn btn-sm btn-info">LogOut</a>
           <a href="{{route('user.login')}}" class="btn btn-sm btn-info">{{Session::get('userName')}}</a>
        @else
      <a href="{{route('user.register')}}" class="btn btn-sm btn-danger">Register</a>
      <a href="{{route('user.login')}}" class="btn btn-sm btn-info">Login</a>
      @endif

        <a href="#" class="mx-2"><span class="bi-facebook"></span></a>
        <a href="#" class="mx-2"><span class="bi-twitter"></span></a>
        <a href="#" class="mx-2"><span class="bi-instagram"></span></a>

        <a href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a>
        <i class="bi bi-list mobile-nav-toggle"></i>

        <!-- ======= Search Form ======= -->
        <div class="search-form-wrap js-search-form-wrap">
          <form action="search-result.html" class="search-form">
            <span class="icon bi-search"></span>
            <input type="text" placeholder="Search" class="form-control">
            <button class="btn js-search-close"><span class="bi-x"></span></button>
          </form>
        </div><!-- End Search Form -->

      </div>

    </div>

  </header><!-- End Header -->
