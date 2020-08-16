<!DOCTYPE html>
<html lang="en" >
<head>
    <title>RoboNegotiator</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">

    <!-- External CSS libraries -->

    <style>
        body {
            margin: 0;
            padding: 0;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="{{asset('mdb/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('mdb/css/mdb.min.css')}}"><style></style>
    <link rel="stylesheet" type="text/css" href="{{asset('mdb/css/style.min.css')}}">

    <script src="https://use.fontawesome.com/7e7451fd03.js"></script>

</head>
<body >
<div class="page_loader"></div>

<!-- Main header start -->
<header class="main-header  header-with-top font-weight-bold black z-depth-3" >
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand company-logo" href="{{route('admin.cms.edit_page')}}"  style="padding: 0 !important;margin:  0
            !important;">

            <img src="https://robonegotiator.com/img/rsz_logo-transparent.png" alt="RoboNegotiator" width="200px" >
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse w-100" id="navbar">










                <ul class="navbar-nav ml-auto black">

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
                    <li class="nav-item dropdown black">
                        <a class="nav-link font-weight-bold text-white" href="{{route('admin.cms.pages')}}">Manage Pages</a>
                    </li>
                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">Edit Headers and menus</a>
                        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{route('admin.cms.edit_page',['post_type' => 'header',
                            'header_id' => 2])
                            }}">Header for logged in users</a>
                            <a class="dropdown-item" href="{{route('admin.cms.edit_page',['post_type' => 'header'])}}">Header for non-logged in guests</a>

                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a  href="{{route('admin.cms.edit_page',['post_type' => 'footer'])}}" class="nav-link nav-link
                        font-weight-bold text-white">
                            <i class="fa fa-file-code"></i> Footer
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" href="{{route('logout')}}" ><i
                                    class="fa fa-sign-out"></i> Logout</a>
                    </li>



                </ul>








        </div>
    </nav>


</header>
<!-- Main header end -->




{{\App\Http\Controllers\PagesHandler::notification()}}
@yield('content')









<!-- Footer start -->
<footer class="page-footer text-center font-small wow fadeIn " style="background: transparent !important;">

    <!--/.Call to action-->



    <!-- Social icons -->
    <div class="pb-4">
        <a href="https://www.facebook.com/RoboNegotiator/posts/"  target="_blank">
            <i class="fa fa-facebook-f mr-3"></i>
        </a>



        <a href="https://www.youtube.com/channel/UCnv2DwGybzLNmwDBAUS-XxA" target="_blank">
            <i class="fa fa-youtube mr-3"></i>
        </a>


    </div>
    <!-- Social icons -->

    <!--Copyright-->
    <div class="footer-copyright py-3">
        &#xA9; 2019 Copyright:
        <a href="" target="_blank">  RoboNegotiator </a>
    </div>
    <!--/.Copyright-->

</footer>

<!-- Footer end -->

<!-- Full Page Search -->

<script src="{{asset('mdb/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('mdb/js/popper.min.js')}}"></script>

<script src="{{asset('mdb/js/bootstrap.min.js')}}"></script>
<script src="{{asset('mdb/js/mdb.min.js')}}"></script>

@yield('extra-js')
</body>
