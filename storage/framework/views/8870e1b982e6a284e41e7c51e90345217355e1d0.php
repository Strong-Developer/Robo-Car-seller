<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>RoboNegotiator</title>
    <link rel="icon" href="../images/favicon.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,300&display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?php echo e(asset('css/mycss/form-validation.css')); ?>" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo e(asset('css/mycss/bootstrap.min.css')); ?>" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo e(asset('css/mycss/styles.css?v1=001')); ?>" rel="stylesheet">

    <style>
         body{
            font-size: 18px;
             font-family: "Hind",-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Oxygen-Sans,Ubuntu,Cantarell,'Helvetica Neue',sans-serif;
             font-weight: 400;
             font-style: normal;
             /*font-size: 17px;*/
             text-transform: none;
             letter-spacing: 0;
             line-height: 30px;
             color: #000 !important;
             -moz-osx-font-smoothing: grayscale;
        }
         .p_style {
             color: #000 !important;;
         }
         /*
        .top-navigation{
            background: #2E3237;
            border-bottom: 0;
            height: 35px;
            overflow: visible;
            min-height: 0px;
            color: #fff;
        }
        .top-navigation a{color: #fff;font-size: 14px;}

        .main-navigation{
            background-color: #fff;
            border-bottom: 1px solid #ccc;
            box-shadow: 0 0 5px #ccc;
        }
        img{
            max-width: 100%;
        }
        .logo-main{
            max-width: 200px;
        }

        .navbar-nav .nav-item{

        }
        .navbar-nav .nav-item .nav-link{
            color: #777;
        }
        .navbar-nav .nav-item.active .nav-link{
            color: #2388ed;
        }

        .main-section{
            padding-top: 105px;
        }

        .form-control{

        } */
        /*.sticky-footer {*/
        /*    position: absolute;*/
        /*    bottom: 0;*/
        /*    width: 100%;*/
        /*    !* height: 60px; *!*/
        /*    background-color: #000850;*/
        /*    padding: 15px;*/
        /*    color: #fff !important;*/
        /*}*/
        /*.sticky-footer ul{*/
        /*    list-style-type: none;*/
        /*}*/
        /*.sticky-footer ul li,*/
        /*.sticky-footer ul a{*/
        /*    color: #fff;*/
        /*    font-size: 14px;*/
        /*}*/
        .btn-custom{
            background: transparent;
            border: 1px solid #1b1e5b;
            color: #1b1e5b;
            border-radius: 8rem;
            transition: 0.4s ease all;
        }
        .btn-custom:hover{
            background: #1b1e5b;
            border: 1px solid #1b1e5b;
            color: #fff;
            border-radius: 8rem;
        }
/* 
        @media (max-width: 767px) {
            .navbarT-icon{
                width: 30px;
                height: 3px;
                background: #1b1e5b;
                display: block;
            }
            .navbarTBtn{outline: 0;}
            .navbarTBtn .navbarT-icon:nth-last-of-type(2){
                margin: 5px 0;
            }
        }
        @media (max-width: 567px) {

            .sticky-footer ul{
                justify-content: center;
                flex-flow: wrap;
                text-align: center;
            }
            .sticky-footer ul li{
                flex: 0 0 100%;
                max-width: 100%;
                font-size: 12px;
            }

        } */
        .b-item1{
            background: url('../images/slide2.jpg') center center / cover no-repeat;
        }
        .b-item2{
            background: url('../images/slide3.jpg') center center / cover no-repeat;
        }
        .b-item3{
            background: url('../images/slide1.jpg') center center / cover no-repeat;
        }

        .p_style{
            color: #1b1e5b;
        }

        .title-header-section{
            background: url('../../images/header-bg01.jpg') center center / cover no-repeat;
            background: url('../../images/header-title-bg02.jpg') center center / cover no-repeat;
            position: relative;
        }
        .title-header-section:before {
            position: absolute;
            content: '';
            left: 0;
            top: 0;
            bottom: 0;
            right: 0;
            background: #00000040;
            z-index: 0;
        }
        .title-header {
            padding: 100px 0;
            text-align: center;
            position: relative;
            z-index: 1;
            margin-bottom: 20px;
        }
        .title-header h1 {
            font-size: 72px;
            color: #fff;
            /* font-family: Verdana,Geneva,sans-serif; */
            text-shadow: 0 0 10px #000;
            /* text-transform: uppercase; */
            letter-spacing: 0.2rem;
            margin: 0 0;
        }


        .card-custom{
            /* background: url('../../images/demo2.jpg') center / cover no-repeat; */
            position: relative;
        }
        .card-default.card-custom:before {
            position: absolute;
            content: '';
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('../../images/demo1.jpeg') 100px 0px / cover no-repeat;
            /* background: url('../../images/demo2.jpg') top center / cover no-repeat; */
            /* opacity: 0.8; */
            opacity: 0.5;
        }
        
        .card-customInner{
            background: rgba(255, 255, 255, 0.4);
            /* background: #9dc8cebd;
            background: #0000004d; */
            box-shadow: 0 0 5px #000;
            padding: 10px 20px;
            border-radius: 10px;
            min-height: 400px;
        }
        .card-customInner label{
            /* color: #fff;
            text-shadow: 0 0 5px #000; */
        }
        .card-customInner .form-control{
            background: transparent;
            /* border-bottom: 1px solid #fff; */
        }

        .card-customInner .custom-select{
            background: transparent !important;
            border: 0;
            border-bottom: 1px solid #6c757c;
            border-radius: 0;
        }
        @media  screen and (max-width: 767px){

            .title-header {
                padding: 70px 0;
                margin-bottom: 0px;
            }

            .title-header h1 {
                font-size: 48px;
            }
            
        }

        @media  screen and (max-width: 586px){


            .card-default.card-custom:before {
                display: none;
            }

        }

    </style>
</head>

<body class="">
    
  <header class=" fixed-top">
    <!-- <div class="top-navigation">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="mailto:info@robonegotiator.com">info@robonegotiator.com</a>
          </div>
        </div>
      </div>
    </div> -->
    <div class="main-navigation">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <nav class="navbar navbar-expand-lg p-0">
              <a class="navbar-brand logo-main p-0" href="http://robonegotiator.com">
                <img src="images/logo.png" alt="logo">
              </a>
              <button class="navbar-toggler navbarTBtn" type="button" data-toggle="collapse"
                data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbarT-icon"></span>
                <span class="navbarT-icon"></span>
                <span class="navbarT-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto">


                  <li class="nav-item">
                    <a class="nav-link" href="https://www.robonegotiator.com/solutions-products/">Solution & Products</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="https://www.robonegotiator.com/industries/" id="dropdown01" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">Industries</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                      <a class="dropdown-item" href="https://www.robonegotiator.com/industries/automobile-dealership/">Auto Dealership</a>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="https://www.robonegotiator.com/integrations/">Integrations</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="https://www.robonegotiator.com/pricing/">Pricing</a>
                  </li>
                  
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="https://www.robonegotiator.com/about" id="dropdown01" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">Company</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                      <a class="dropdown-item" href="https://www.robonegotiator.com/company/">About Us</a>
                      <a class="dropdown-item" href="https://www.robonegotiator.com/contact/">Contact</a>
                    </div>
                  </li>
                  

                  <!-- <li class="nav-item active">
                    <a class="nav-link" href="http://integrate.robonegotiator.com/">Home <span
                        class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">About Us</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                      <a class="dropdown-item" href="http://market.robonegotiator.com/about-us">About Us</a>
                      <a class="dropdown-item" href="http://market.robonegotiator.com/how-it-works">How it
                        works</a>
                      <a class="dropdown-item" href="http://market.robonegotiator.com/integrate-with-us">Integrate with Us</a>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="http://market.robonegotiator.com/contact-us">Contact Us</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="https://my.robonegotiator.com/catalog">Product Catalog</a>
                  </li> -->
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>

    </div>
  </header>

<div class="main-section">
    <div class="title-header-section">
        <div class="title-header">
            <h1>Negotiation</h1>
        </div>
    </div>


    <div class="container">
        <div class="col-12">
            <div class="py-4 text-center" style="line-height: 20px;">
                <div class="card-default">
                    <p style="text-align: justify" class="p_style">Welcome to RoboNegotiator. This is our demo page to show how a buyer and a seller can negotiate with each other through “classic” mode (also known as salesperson-assist mode) as well as through “automatic” mode.</p>
                    <p style="text-align: justify;color: #b04e07;" class="p_style">How It Works:</p>
                    <p style="text-align: justify" class="p_style">1.	Role:</p>
                    <ul><li><p style="text-align: justify" class="p_style">Enter your details for an assumed role.  We need one party to play a role of a buyer while other party will act as a seller. We will send you an email and a text message when we receive your initial offer.</p></li></ul>
                    <p style="text-align: justify" class="p_style">2.	Negotiation Mode:</p>
                    <ul><li><p style="text-align: justify" class="p_style">In <span style="color: #b04e07;">classic</span> (OR <span style="color: #b04e07;">salesperson-assist</span>) mode, we will relay buyer’s offer to the seller and seller’s deal price to the buyer when we believe they are in negotiation range.  You expedite negotiations while you are in control. Our emails and text messages will let you change your amount during negotiation phase.</p></li></ul>
                    <ul><li><p style="text-align: justify" class="p_style">In <span style="color: #b04e07;">automatic mode</span>, we negotiate on your behalf and hence we would need your highest committed offer (if you are a buyer) OR lowest sales price (if you are a seller).</p></li></ul>
                    <p style="text-align: justify" class="p_style">3.	Product Code:</p>
                    <ul><li><p style="text-align: justify" class="p_style">Enter alpha numeric product code (DEAL_0001 for example) so we can find a buyer/seller for the same product code.</p></li></ul>
                    <ul><li><p style="text-align: justify" class="p_style"><span style="color: #b04e07;">If you are negotiating with other party you already know</span>, make sure you both use same Product Code (you two can come up with a random alphanumeric code of your own too) and we will make sure you get matched with your own party.</p></li></ul>
                    <p style="text-align: justify" class="p_style">4.	Result:</p>
                    <ul><li><p style="text-align: justify" class="p_style">When we find a common, mutually agreed price, we will introduce both the parties by email and text messages while also revealing mutually agreed price for the product.</p></li></ul>
                    <ul><li><p style="text-align: justify" class="p_style">If there is no match or success or no offer from other party, no one will know about your offer and system will delete your offer after 90 days.</p></li></ul>
                    <p style="text-align: justify" class="p_style">Send an email to info@robonegotiator.com if you have any question.</p>




                </div>
            </div>
        </div>
            
        <div class="col-12">
            <div class="card-default card-custom card-customInner py-5">
                <div class=" row align-items-center d-flex">
                    <div class="col-md-6">
                        <?php if(session()->has('error')): ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <?php $__currentLoopData = json_decode(session()->get('error')); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $one): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <strong>Alert !</strong><span> <?php echo e($one[0]); ?></span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>
                        <?php if(session()->has('success')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success !</strong><span> <?php echo e(session()->get('success')); ?></span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <form class="needs-validation" novalidate="" method="POST" action="<?php echo e(url('/demo1')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="mb-3">
                                <input type="hidden" class="form-control" id="api-key" name="api_key" value="f07862522e9585ffd7ca6a6138ec262480b0d91f">
                            </div>
                            <div class="mb-3">
                                <label for="role">Negotiation needs a buyer or a seller, I am a:</label>
                                <select class="custom-select d-block w-100 role" id="role" name="role" required="">
                                    <option value="" selected disabled>Choose..</option>
                                    <option value="Buyer">Buyer</option>
                                    <option value="Seller">Seller</option>
                                </select>
                                <div class="invalid-feedback">
                                    Role required.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="mode">Negotiation Mode</label>
                                <select class="custom-select d-block w-100" id="mode" name="mode" required="">
                                    <option value="" selected disabled>Choose..</option>
                                    <option value="Auto">Automatic</option>
                                    <option value="Classic">Classic</option>
                                </select>
                                <div class="invalid-feedback">
                                    Mode required.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="product-code">Product Code</label>
                                <input type="text" class="form-control" id="product-code" placeholder="Please enter unique product code." name="upc_product_code" required="">
                                <div class="invalid-feedback">
                                    Product code required.
                                </div>
                            </div>

                            <hr class="my-4">
                            <button class="btn btn-primary btn-lg btn-block btn-custom" id="submit_button" type="submit">Submit</button>
                        </form>
                    </div>
                    <!-- <div class="col-md-6">
                        <div class="h-100 d-flex align-items-center">
                            <img src="<?php echo e(asset('images/demo1.jpeg')); ?>" alt="" class="w-100">
                        </div>
                    </div> -->
                </div>
            </div>
        </div>

    </div>
</div>

<footer class="sticky-footer">
    <div class="container">
        <div class="row padding-01">
            <div class="col-md-3 col-sm-6 mb-4">
                <a href="http://my.robonegotiator.com/" class="footer-logo">
                    <img src="images/logo.png" alt="">

                </a>
            </div>
            <div class="col-md-3 col-sm-6 mb-4">
            <ul class="m-0 p-0 ul-style">
                <li><a href="https://www.robonegotiator.com/solutions-products/"><i class="fa fa-angle-right" aria-hidden="true"></i> Solutions & Products</a></li>
                <li><a href="https://www.robonegotiator.com/industries/"><i class="fa fa-angle-right" aria-hidden="true"></i> Industries</a></li>
                <li><a href="https://www.robonegotiator.com/integrations/"><i class="fa fa-angle-right" aria-hidden="true"></i> Integrations</a></li>
                <li><a href="https://www.robonegotiator.com/pricing/"><i class="fa fa-angle-right" aria-hidden="true"></i> Pricing</a></li>
            </ul>
            </div>
            <div class="col-md-3 col-sm-6 mb-4 ">
            <ul class="m-0 p-0 ul-style">
                <li><a href="https://www.robonegotiator.com/about"><i class="fa fa-angle-right" aria-hidden="true"></i> Company</a></li>
                <li><a href="https://www.robonegotiator.com/careers"><i class="fa fa-angle-right" aria-hidden="true"></i> Careers</a></li>
                <li><a title="About" href="https://www.robonegotiator.com/company"><i class="fa fa-angle-right" aria-hidden="true"></i> About</a></li>
                <li><a href="https://www.robonegotiator.com/contact"><i class="fa fa-angle-right" aria-hidden="true"></i> Contact</a></li>
            </ul>
            </div>
            <div class="col-md-3 col-sm-6 mb-4">
                <ul class="p-0 m-0">
                    <li><a href="tel:+1-937-9MY-ROBO" class=""><i class="fa fa-headphones" aria-hidden="true"></i> +1-937-9MY-ROBO</a></li>
                    <li><a href="mailto:info@robonegotiator.com"><i class="fa fa-envelope-o" aria-hidden="true"></i> info@robonegotiator.com</a></li>
                </ul>


                <ul class="m-0 mt-4 p-0 ul-style d-flex justify-content-start social-links">
                    <li><a href="">Privacy Policy</a></li>
                    <li><a href="">Terms of Use</a></li>
                </ul>
            </div>
        </div>

        <div class="">
            <p class="" style="font-size: 12px;">Use of this site is subject to express terms of use. By using this site, you agree to be bound by the Terms of use.</p>
        </div>
        <hr>
        <!-- <div class="col-12"> -->
        <div class="row no-gutters">
            <div class="col-sm-10 col-12 text-center text-sm-left">
                <p>© 2020 RoboNegotiator Inc. All Rights Reserved</p>
            </div>
            <div class="col-sm-2 col-12 text-sm-right text-center">
                <ul class="m-0 p-0 ul-style d-flex justify-content-end social-links">
                    <li><a href=""><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                    <li><a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    <li><a href=""><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                    <li><a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>

    </div>
</footer>


<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="<?php echo e(asset('js/myjs/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/myjs/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/myjs/holder.min.js')); ?>"></script>


<script>

    $(document).ready(function () {


        $(".dropdown").hover(function(){
            var dropdownMenu = $(this).children(".dropdown-menu");
            if(dropdownMenu.is(":visible")){
            dropdownMenu.parent().toggleClass("open");
            }
        });

        if ($(window).width() > 991) {
        
            $(".dropdown .dropdown-toggle").click(function(){
                // $(this).attr('')
                location.href = $(this).attr('href');
            });
            

        }
        else {

            $(".dropdown .dropdown-toggle").dblclick(function(){
                // $(this).attr('')
                location.href = $(this).attr('href');
            });
        
        }


    });
    // $('.owl-carousel').owlCarousel({
    //     items:1,
    //     loop:true,
    //     margin:0,
    //     autoplay:true,
    //     autoplayTimeout:25000,
    //     autoplayHoverPause:true,
    //     nav: true
    // });
</script>

<script>

    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';

        $("select.role").change(function(){
            var selected_role = $(this).children("option:selected").val();
            if(selected_role == "Buyer"){
                //light blue
                $('#submit_button').css("background", "#00aeef");
            }else if(selected_role == "Seller"){
                // navy blue
                $('#submit_button').css("background", "#1b1e5b");
                $('#submit_button').css("color", "#ffffff");
            }
        });

        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');

            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-122868353-1"></script>
  <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-122868353-1');
  </script>

</body>
</html>
