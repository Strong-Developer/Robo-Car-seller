<!DOCTYPE html>
<html lang="en">
<head>
    <title>RoboNegotiator</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">

    <!-- External CSS libraries -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-submenu.css">

    <link rel="stylesheet" type="text/css" href="css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/leaflet.css" type="text/css">
    <link rel="stylesheet" href="css/map.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" type="text/css" href="fonts/linearicons/style.css">
    <link rel="stylesheet" type="text/css"  href="css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css"  href="css/dropzone.css">
    <link rel="stylesheet" type="text/css"  href="css/slick.css">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="css/skins/midnight-blue.css">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" >

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,600,700%7CUbuntu:300,400,700" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link rel="stylesheet" type="text/css" href="css/ie10-viewport-bug-workaround.css">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script  src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script  src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script  src="js/html5shiv.min.js"></script>
    <script  src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="page_loader"></div>

<!-- Main header start -->
<header class="main-header sticky-header header-with-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand company-logo" href="index.html">
                <img src="img/logos/black-logo.png" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse w-100" id="navbar">
                <ul class="navbar-nav ml-auto">

                    <!--<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Shop
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="shop-list.html">Shop List</a></li>
                            <li><a class="dropdown-item" href="shop-cart.html">Shop Cart</a></li>
                            <li><a class="dropdown-item" href="shop-checkout.html">Shop Checkout</a></li>
                            <li><a class="dropdown-item" href="shop-details.html">Shop Details</a></li>
                        </ul>
                    </li> -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{route('home.main')}}">RoboNegotiator</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="" class="nav-link h-icon">
                            <i class="fa fa-user-edit"></i> About Us
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="" class="nav-link h-icon">
                            <i class="fa fa-phone"></i> Contact Us
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#full-page-search" class="nav-link h-icon">
                            <i class="fa fa-question"></i> FAQ
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{route('home.register')}}" class="nav-link h-icon">
                            <i class="fa fa-plus"></i> Sign Up
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{route('home.register')}}" class="nav-link h-icon">
                            <i class="fa fa-user"></i> Sign In
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<!-- Main header end -->

<!-- Banner start -->
<div class="banner" id="banner">
    <div id="bannerCarousole" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner banner-slider-inner text-center">
            <div class="carousel-item banner-max-height active">
                <img class="d-block w-100 h-100" src="img/car-2.jpg" alt="banner">
                <div class="carousel-content container banner-info-2">
                    <h1>Welcome to Car Cmart</h1>
                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
                </div>
            </div>
            <div class="carousel-item banner-max-height">
                <img class="d-block w-100 h-100" src="img/car-1.jpg" alt="banner">
                <div class="carousel-content container banner-info-2">
                    <h1>Welcome to Car Cmart</h1>
                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
                </div>
            </div>
            <div class="carousel-item banner-max-height">
                <img class="d-block w-100 h-100" src="img/car-3.jpg" alt="banner">
                <div class="carousel-content container banner-info-2">
                    <h1>Welcome to Car Cmart</h1>
                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev none-580" href="#bannerCarousole" role="button" data-slide="prev">
            <span class="slider-mover-left" aria-hidden="true">
                <i class="fa fa-angle-left"></i>
            </span>
        </a>
        <a class="carousel-control-next none-580" href="#bannerCarousole" role="button" data-slide="next">
            <span class="slider-mover-right" aria-hidden="true">
                <i class="fa fa-angle-right"></i>
            </span>
        </a>
    </div>
</div>
<!-- Banner end -->

<!-- Search box 3 start -->
<div class="search-box-3">
    <div class="container">
        <div class="search-section-area">
            <div class="search-area-inner">
                <div class="search-contents">
                    <form method="GET">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <select class="selectpicker search-fields" name="select-brand">
                                        <option>Select Brand</option>
                                        <option>Audi</option>
                                        <option>BMW</option>
                                        <option>Honda</option>
                                        <option>Nissan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <select class="selectpicker search-fields" name="select-make">
                                        <option>Select Make</option>
                                        <option>BMW</option>
                                        <option>Honda</option>
                                        <option>Lamborghini</option>
                                        <option>Sports Car</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <select class="selectpicker search-fields" name="select-location">
                                        <option>Select Location</option>
                                        <option>United States</option>
                                        <option>United Kingdom</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <select class="selectpicker search-fields" name="select-year">
                                        <option>Select Year</option>
                                        <option>2016</option>
                                        <option>2017</option>
                                        <option>2018</option>
                                        <option>2019</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <select class="selectpicker search-fields" name="select-type">
                                        <option>Select Type Of Car</option>
                                        <option>New Car</option>
                                        <option>Used Car</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <select class="selectpicker search-fields" name="transmission">
                                        <option>Transmission</option>
                                        <option>Automatic</option>
                                        <option>Manual</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <div class="range-slider">
                                        <div data-min="0" data-max="150000" data-unit="USD" data-min-name="min_price" data-max-name="max_price" class="range-slider-ui ui-slider" aria-disabled="false"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <button class="btn btn-block button-theme btn-md">
                                        <i class="fa fa-search"></i>Find
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Search box 3 end -->

<!-- Featured car start -->
<div class="featured-car content-area">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Featured Cars</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="car-box">
                    <div class="car-thumbnail">
                        <a href="car-details.html" class="car-img">
                            <div class="tag">Featured</div>
                            <div class="price-box">$850.00</div>
                            <img class="d-block w-100" src="img/car/car-1.jpg" alt="car">
                        </a>
                    </div>
                    <div class="detail">
                        <h1 class="title">
                            <a href="car-grid-rightside.html">Toyota Prius</a>
                        </h1>
                        <div class="location">
                            <a href="car-details.html">
                                <i class="flaticon-pin"></i>123 Kathal St. Tampa City,
                            </a>
                        </div>
                        <ul class="facilities-list clearfix">
                            <li>
                                <i class="flaticon-way"></i> 4,000 km
                            </li>
                            <li>
                                <i class="flaticon-manual-transmission"></i> Manual
                            </li>
                            <li>
                                <i class="flaticon-calendar-1"></i> 2019
                            </li>
                            <li>
                                <i class="flaticon-fuel"></i> Petrol
                            </li>
                            <li>
                                <i class="flaticon-car"></i> Sport
                            </li>
                            <li>
                                <i class="flaticon-gear"></i> Blue
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="car-box">
                    <div class="car-thumbnail">
                        <a href="car-details.html" class="car-img">
                            <div class="tag">Featured</div>
                            <div class="price-box">$850.00</div>
                            <img class="d-block w-100" src="img/car/car-4.jpg" alt="car">
                        </a>
                    </div>
                    <div class="detail">
                        <h1 class="title">
                            <a href="car-grid-rightside.html">Toyota Prius specs</a>
                        </h1>
                        <div class="location">
                            <a href="car-details.html">
                                <i class="flaticon-pin"></i>123 Kathal St. Tampa City,
                            </a>
                        </div>
                        <ul class="facilities-list clearfix">
                            <li>
                                <i class="flaticon-way"></i> 4,000 km
                            </li>
                            <li>
                                <i class="flaticon-manual-transmission"></i> Manual
                            </li>
                            <li>
                                <i class="flaticon-calendar-1"></i> 2019
                            </li>
                            <li>
                                <i class="flaticon-fuel"></i> Petrol
                            </li>
                            <li>
                                <i class="flaticon-car"></i> Sport
                            </li>
                            <li>
                                <i class="flaticon-gear"></i> Blue
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="car-box">
                    <div class="car-thumbnail">
                        <a href="car-details.html" class="car-img">
                            <div class="tag">Featured</div>
                            <div class="price-box">$850.00</div>
                            <img class="d-block w-100" src="img/car/car-3.jpg" alt="car">
                        </a>
                    </div>
                    <div class="detail">
                        <h1 class="title">
                            <a href="car-grid-rightside.html">Lexus GS F</a>
                        </h1>
                        <div class="location">
                            <a href="car-details.html">
                                <i class="flaticon-pin"></i>123 Kathal St. Tampa City,
                            </a>
                        </div>
                        <ul class="facilities-list clearfix">
                            <li>
                                <i class="flaticon-way"></i> 4,000 km
                            </li>
                            <li>
                                <i class="flaticon-manual-transmission"></i> Manual
                            </li>
                            <li>
                                <i class="flaticon-calendar-1"></i> 2019
                            </li>
                            <li>
                                <i class="flaticon-fuel"></i> Petrol
                            </li>
                            <li>
                                <i class="flaticon-car"></i> Sport
                            </li>
                            <li>
                                <i class="flaticon-gear"></i> Blue
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="car-box">
                    <div class="car-thumbnail">
                        <a href="car-details.html" class="car-img">
                            <div class="tag">Featured</div>
                            <div class="price-box">$850.00</div>
                            <img class="d-block w-100" src="img/car/car-5.jpg" alt="car">
                        </a>
                    </div>
                    <div class="detail">
                        <h1 class="title">
                            <a href="car-grid-rightside.html">Hyundai Santa</a>
                        </h1>
                        <div class="location">
                            <a href="car-details.html">
                                <i class="flaticon-pin"></i>123 Kathal St. Tampa City,
                            </a>
                        </div>
                        <ul class="facilities-list clearfix">
                            <li>
                                <i class="flaticon-way"></i> 4,000 km
                            </li>
                            <li>
                                <i class="flaticon-manual-transmission"></i> Manual
                            </li>
                            <li>
                                <i class="flaticon-calendar-1"></i> 2019
                            </li>
                            <li>
                                <i class="flaticon-fuel"></i> Petrol
                            </li>
                            <li>
                                <i class="flaticon-car"></i> Sport
                            </li>
                            <li>
                                <i class="flaticon-gear"></i> Blue
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="car-box">
                    <div class="car-thumbnail">
                        <a href="car-details.html" class="car-img">
                            <div class="tag">Featured</div>
                            <div class="price-box">$850.00</div>
                            <img class="d-block w-100" src="img/car/car-6.jpg" alt="car">
                        </a>
                    </div>
                    <div class="detail">
                        <h1 class="title">
                            <a href="car-grid-rightside.html">Audi Q7 2018</a>
                        </h1>
                        <div class="location">
                            <a href="car-details.html">
                                <i class="flaticon-pin"></i>123 Kathal St. Tampa City,
                            </a>
                        </div>
                        <ul class="facilities-list clearfix">
                            <li>
                                <i class="flaticon-way"></i> 4,000 km
                            </li>
                            <li>
                                <i class="flaticon-manual-transmission"></i> Manual
                            </li>
                            <li>
                                <i class="flaticon-calendar-1"></i> 2019
                            </li>
                            <li>
                                <i class="flaticon-fuel"></i> Petrol
                            </li>
                            <li>
                                <i class="flaticon-car"></i> Sport
                            </li>
                            <li>
                                <i class="flaticon-gear"></i> Blue
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="car-box">
                    <div class="car-thumbnail">
                        <a href="car-details.html" class="car-img">
                            <div class="tag">Featured</div>
                            <div class="price-box">$850.00</div>
                            <img class="d-block w-100" src="img/car/car-2.jpg" alt="car">
                        </a>
                    </div>
                    <div class="detail">
                        <h1 class="title">
                            <a href="car-grid-rightside.html">2017 Ford Mustang</a>
                        </h1>
                        <div class="location">
                            <a href="car-details.html">
                                <i class="flaticon-pin"></i>123 Kathal St. Tampa City,
                            </a>
                        </div>
                        <ul class="facilities-list clearfix">
                            <li>
                                <i class="flaticon-way"></i> 4,000 km
                            </li>
                            <li>
                                <i class="flaticon-manual-transmission"></i> Manual
                            </li>
                            <li>
                                <i class="flaticon-calendar-1"></i> 2019
                            </li>
                            <li>
                                <i class="flaticon-fuel"></i> Petrol
                            </li>
                            <li>
                                <i class="flaticon-car"></i> Sport
                            </li>
                            <li>
                                <i class="flaticon-gear"></i> Blue
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Featured car end -->

<!-- advantages start -->
<div class="advantages content-area">
    <div class="container">
        <!-- Main title -->
        <div class="main-title-2 text-center">
            <h1>Our Advantages</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="advantages-box">
                    <div class="icon">
                        <i class="flaticon-shield"></i>
                    </div>
                    <div class="detail">
                        <h5>Highly  Secured</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tincidunt aliquam.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="advantages-box">
                    <div class="icon">
                        <i class="flaticon-deal"></i>
                    </div>
                    <div class="detail">
                        <h5>Trusted Agents</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tincidunt aliquam.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="advantages-box">
                    <div class="icon">
                        <i class="flaticon-money"></i>
                    </div>
                    <div class="detail">
                        <h5>Get an Offer</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tincidunt aliquam.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="advantages-box">
                    <div class="icon">
                        <i class="flaticon-support-2"></i>
                    </div>
                    <div class="detail">
                        <h5>Free Support</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tincidunt aliquam.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- advantages end -->

<!-- Latest offers Start -->
<div class="latest-offers categories content-area-13 bg-grea-3">
    <div class="container">
        <!-- Main title -->
        <div class="main-title text-center">
            <h1>Latest Offers</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
        </div>
        <div class="row row-2">
            <div class="col-lg-4 col-md-12">
                <div class="row">
                    <div class="col-md-6 col-lg-12 col-pad">
                        <div class="category">
                            <div class="category_bg_box cat-1-bg">
                                <div class="category-overlay">
                                    <div class="category-content">
                                        <h3 class="category-title">
                                            <a href="car-list-rightside.html">Toyota Prius specs</a>
                                        </h3>
                                        <h5 class="category-subtitle">$850.00</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-12 col-pad">
                        <div class="category">
                            <div class="category_bg_box cat-3-bg">
                                <div class="category-overlay">
                                    <div class="category-content">
                                        <h3 class="category-title">
                                            <a href="car-details.html">Lexus GS F</a>
                                        </h3>
                                        <h5 class="category-subtitle">$450.00</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-pad">
                <div class="category">
                    <div class="category_bg_box category_long_bg cat-4-bg">
                        <div class="category-overlay">
                            <div class="category-content">
                                <h3 class="category-title">
                                    <a href="#">Audi R8</a>
                                </h3>
                                <h5 class="category-subtitle">$150.00</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="row">
                    <div class="col-md-6 col-lg-12 col-pad">
                        <div class="category">
                            <div class="category_bg_box cat-2-bg">
                                <div class="category-overlay">
                                    <div class="category-content">
                                        <h3 class="category-title">
                                            <a href="car-list-rightside.html">Toyota Prius</a>
                                        </h3>
                                        <h5 class="category-subtitle">$350.000</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-12 col-pad">
                        <div class="category">
                            <div class="category_bg_box cat-5-bg">
                                <div class="category-overlay">
                                    <div class="category-content">
                                        <h3 class="category-title">
                                            <a href="car-details.html">2017 Ford Mustang</a>
                                        </h3>
                                        <h4 class="category-subtitle">98 Properties</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Latest offers end -->

<!-- Our team start -->
<div class="our-team content-area">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Our Agent</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="team-1">
                    <div class="team-photo">
                        <a href="#">
                            <img src="img/avatar/avatar-5.jpg" alt="agent" class="img-fluid">
                        </a>
                        <ul class="social-list clearfix">
                            <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="google"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                    <div class="team-details">
                        <h5><a href="agent-detail.html">Michelle Nelson</a></h5>
                        <h6>Support Manager</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="team-1">
                    <div class="team-photo">
                        <a href="#">
                            <img src="img/avatar/avatar-7.jpg" alt="agent" class="img-fluid">
                        </a>
                        <ul class="social-list clearfix">
                            <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="google"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                    <div class="team-details">
                        <h5><a href="agent-detail.html">Martin Smith</a></h5>
                        <h6>Web Developer</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="team-1">
                    <div class="team-photo">
                        <a href="#">
                            <img src="img/avatar/avatar-6.jpg" alt="agent" class="img-fluid">
                        </a>
                        <ul class="social-list clearfix">
                            <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="google"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                    <div class="team-details">
                        <h5><a href="agent-detail.html">Carolyn Stone</a></h5>
                        <h6>Creative Director</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="team-1">
                    <div class="team-photo">
                        <a href="#">
                            <img src="img/avatar/avatar-8.jpg" alt="agent" class="img-fluid">
                        </a>
                        <ul class="social-list clearfix">
                            <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="google"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                    <div class="team-details">
                        <h5><a href="agent-detail.html">Brandon Miller</a></h5>
                        <h6>Manager</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Our team end -->

<!-- Testimonial start -->
<div class="testimonial bg-grea-3 content-area-5">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Our Testimonial</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
        </div>
        <!-- Slick slider area start -->
        <div class="slick-slider-area">
            <div class="row slick-carousel" data-slick='{"slidesToShow": 2, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                <div class="slick-slide-item">
                    <div class="testimonial-inner">
                        <div class="text-box">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <span>( 4 Reviews )</span>
                            </div>
                        </div>
                        <div class="user">
                            <div class="photo">
                                <img class="media-object" src="img/avatar/avatar-1.jpg" alt="user">
                            </div>
                            <div class="detail">
                                <h5>Maikel Alisa</h5>
                                <p>Web Designer, New York</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slick-slide-item">
                    <div class="testimonial-inner">
                        <div class="text-box">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <span>( 4 Reviews )</span>
                            </div>
                        </div>

                        <div class="user">
                            <div class="photo">
                                <img class="media-object" src="img/avatar/avatar-1.jpg" alt="user">
                            </div>
                            <div class="detail">
                                <h5>Maikel Alisa</h5>
                                <p>Creative Director, New York</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slick-slide-item">
                    <div class="testimonial-inner">
                        <div class="text-box">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <span>( 4 Reviews )</span>
                            </div>
                        </div>

                        <div class="user">
                            <div class="photo">
                                <img class="media-object" src="img/avatar/avatar-2.jpg" alt="user">
                            </div>
                            <div class="detail">
                                <h5>Auro Navanth</h5>
                                <p>Office Manager, New York</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="slick-prev slick-arrow-buton">
                <i class="fa fa-angle-left"></i>
            </div>
            <div class="slick-next slick-arrow-buton">
                <i class="fa fa-angle-right"></i>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial end -->

<!-- Blog start -->
<div class="blog content-area">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Our Blog</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <!-- Slick slider area start -->
        <div class="slick-slider-area clearfix">
            <div class="row slick-carousel" data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                <div class="slick-slide-item">
                    <div class="blog-1">
                        <div class="blog-photo">
                            <img src="img/blog/blog-2.jpg" alt="small-blog" class="img-fluid">
                            <div class="date-box">
                                <span>14</span>Nov
                            </div>
                        </div>
                        <div class="detail">
                            <h4>
                                <a href="blog-details.html">Elegant Audi Car</a>
                            </h4>
                            <div class="post-meta clearfix">
                                <span><a href="#"><i class="flaticon-user-1"></i></a>Admin</span>
                                <span><a href="#"><i class="flaticon-comment"></i></a>17K</span>
                                <span><a href="#"><i class="flaticon-calendar"></i></a>73k</span>
                            </div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry</p>
                        </div>
                    </div>
                </div>
                <div class="slick-slide-item">
                    <div class="blog-1">
                        <div class="blog-photo">
                            <img src="img/blog/blog-3.jpg" alt="small-blog" class="img-fluid">
                            <div class="date-box">
                                <span>14</span>Nov
                            </div>
                        </div>
                        <div class="detail">
                            <h4>
                                <a href="blog-details.html">2018 Lexus GS F</a>
                            </h4>
                            <div class="post-meta clearfix">
                                <span><a href="#"><i class="flaticon-user-1"></i></a>Admin</span>
                                <span><a href="#"><i class="flaticon-comment"></i></a>17K</span>
                                <span><a href="#"><i class="flaticon-calendar"></i></a>73k</span>
                            </div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry</p>
                        </div>
                    </div>
                </div>
                <div class="slick-slide-item">
                    <div class="blog-1">
                        <div class="blog-photo">
                            <img src="img/blog/blog-1.jpg" alt="small-blog" class="img-fluid">
                            <div class="date-box">
                                <span>14</span>Nov
                            </div>
                        </div>
                        <div class="detail">
                            <h4>
                                <a href="blog-details.html">Audi R8</a>
                            </h4>
                            <div class="post-meta clearfix">
                                <span><a href="#"><i class="flaticon-user-1"></i></a>Admin</span>
                                <span><a href="#"><i class="flaticon-comment"></i></a>17K</span>
                                <span><a href="#"><i class="flaticon-calendar"></i></a>73k</span>
                            </div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry</p>
                        </div>
                    </div>
                </div>
                <div class="slick-slide-item">
                    <div class="blog-1">
                        <div class="blog-photo">
                            <img src="img/blog/blog-1.jpg" alt="small-blog" class="img-fluid">
                            <div class="date-box">
                                <span>14</span>Nov
                            </div>
                        </div>
                        <div class="detail">
                            <h4>
                                <a href="blog-details.html">Audi R8</a>
                            </h4>
                            <div class="post-meta clearfix">
                                <span><a href="#"><i class="flaticon-user-1"></i></a>Admin</span>
                                <span><a href="#"><i class="flaticon-comment"></i></a>17K</span>
                                <span><a href="#"><i class="flaticon-calendar"></i></a>73k</span>
                            </div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slick-prev slick-arrow-buton">
                <i class="fa fa-angle-left"></i>
            </div>
            <div class="slick-next slick-arrow-buton">
                <i class="fa fa-angle-right"></i>
            </div>
        </div>
    </div>
</div>
<!-- Blog end -->

<!-- Intro section start -->
<div class="intro-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-12">
                <div class="intro-text">
                    <h3>Do You Have Questions ?</h3>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12">
                <a href="contact.html" class="btn btn-md">Get in Touch</a>
            </div>
        </div>
    </div>
</div>
<!-- Intro section end -->

<!-- Footer start -->
<footer class="footer">
    <div class="container footer-inner">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="footer-item clearfix">
                    <img src="img/logos/logo.png" alt="logo" class="f-logo">
                    <ul class="contact-info">
                        <li>
                            <i class="flaticon-pin"></i>20/F Green Road, Dhanmondi, Dhaka
                        </li>
                        <li>
                            <i class="flaticon-mail"></i><a href="mailto:sales@hotelempire.com">info@themevessel.com</a>
                        </li>
                        <li>
                            <i class="flaticon-phone"></i><a href="tel:+55-417-634-7071">+0477 85X6 552</a>
                        </li>
                        <li>
                            <i class="flaticon-fax"></i>+0477 85X6 552
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                    <div class="social-list-2">
                        <ul>
                            <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                <div class="footer-item">
                    <h4>
                        Useful Links
                    </h4>
                    <ul class="links">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="about.html">About Us</a>
                        </li>
                        <li>
                            <a href="services.html">Services</a>
                        </li>
                        <li>
                            <a href="faq.html">Faq</a>
                        </li>
                        <li>
                            <a href="contact.html">Contact Us</a>
                        </li>
                        <li>
                            <a href="car-comparison.html">Car Compare</a>
                        </li>
                        <li>
                            <a href="car-reviews.html">Car Reviews</a>
                        </li>
                        <li>
                            <a href="elements.html">Elements</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                <div class="recent-posts footer-item">
                    <h4>Recent Posts</h4>
                    <div class="media mb-4">
                        <a class="pr-3" href="car-details.html">
                            <img class="media-object" src="img/car/small-car-3.jpg" alt="small-car">
                        </a>
                        <div class="media-body align-self-center">
                            <h5>
                                <a href="car-details.html">Bentley Continental GT</a>
                            </h5>
                            <div class="listing-post-meta">
                                $345,00 | <a href="#"><i class="fa fa-calendar"></i> Jan 12, 2019</a>
                            </div>
                        </div>
                    </div>
                    <div class="media mb-4">
                        <a class="pr-3" href="car-details.html">
                            <img class="media-object" src="img/car/small-car-1.jpg" alt="small-car">
                        </a>
                        <div class="media-body align-self-center">
                            <h5>
                                <a href="car-details.html">Fiat Punto Red</a>
                            </h5>
                            <div class="listing-post-meta">
                                $745,00 | <a href="#"><i class="fa fa-calendar"></i> Feb 26, 2019</a>
                            </div>
                        </div>
                    </div>
                    <div class="media">
                        <a class="pr-3" href="car-details.html">
                            <img class="media-object" src="img/car/small-car-2.jpg" alt="small-car">
                        </a>
                        <div class="media-body align-self-center">
                            <h5>
                                <a href="car-details.html">Nissan Micra Gen5</a>
                            </h5>
                            <div class="listing-post-meta">
                                $745,00 | <a href="#"><i class="fa fa-calendar"></i> Feb 14, 2019</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="footer-item clearfix">
                    <h4>Subscribe</h4>
                    <div class="Subscribe-box">
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.</p>
                        <form class="form-inline" action="#" method="GET">
                            <input type="text" class="form-control mb-sm-0" id="inlineFormInputName3" placeholder="Email Address">
                            <button type="submit" class="btn"><i class="fa fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12">
                <p class="copy sub-footer">© 2019 <a href="#">Theme Vessel.</a> Trademarks and brands are the property of their respective owners.</p>
            </div>
        </div>
    </div>
</footer>
<!-- Footer end -->

<!-- Full Page Search -->
<div id="full-page-search">
    <button type="button" class="close">×</button>
    <form action="index.html#">
        <input type="search" value="" placeholder="type keyword(s) here" />
        <button type="submit" class="btn btn-sm button-theme">Search</button>
    </form>
</div>

<script src="js/jquery-2.2.0.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script  src="js/bootstrap-submenu.js"></script>
<script  src="js/rangeslider.js"></script>
<script  src="js/jquery.mb.YTPlayer.js"></script>
<script  src="js/bootstrap-select.min.js"></script>
<script  src="js/jquery.easing.1.3.js"></script>
<script  src="js/jquery.scrollUp.js"></script>
<script  src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script  src="js/leaflet.js"></script>
<script  src="js/leaflet-providers.js"></script>
<script  src="js/leaflet.markercluster.js"></script>
<script  src="js/dropzone.js"></script>
<script  src="js/slick.min.js"></script>
<script  src="js/jquery.filterizr.js"></script>
<script  src="js/jquery.magnific-popup.min.js"></script>
<script  src="js/jquery.countdown.js"></script>
<script  src="js/maps.js"></script>
<script  src="js/app.js"></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script  src="js/ie10-viewport-bug-workaround.js"></script>
<!-- Custom javascript -->
<script  src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>