<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>RoboNegotiator</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo e(asset('css/mycss/bootstrap.min.css')); ?>" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo e(asset('css/mycss/form-validation.css')); ?>" rel="stylesheet">

    <style>
        body{
            position: relative;
            padding-bottom: 120px;
            min-height: 100vh;

        }
        .top-navigation{
            background: #2E3237;
            border-bottom: 0;
            height: 35px;
            overflow: visible;
            min-height: 0px;
            color: #fff;
            /* font-size: 10.5px; */
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

        }
        .sticky-footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            /* height: 60px; */
            background-color: #000850;
            padding: 15px;
            color: #fff !important;
        }
        .sticky-footer ul{
            list-style-type: none;
        }
        .sticky-footer ul li,
        .sticky-footer ul a{
            color: #fff;
            font-size: 14px;
        }
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
        }
    </style>
</head>

<body class="">
<header class=" fixed-top">
    <div class="top-navigation">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="mailto:info@abc.com">info@abc.com</a>
                </div>
            </div>
        </div>
    </div>
    <div class="main-navigation">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-md p-0">
                        <a class="navbar-brand logo-main p-0" href="#">
                            <img src="<?php echo e(asset('images/logo.png')); ?>" alt="logo" >
                        </a>
                        <button class="navbar-toggler navbarTBtn" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbarT-icon"></span>
                            <span class="navbarT-icon"></span>
                            <span class="navbarT-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">About Us</a>
                                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                                        <a class="dropdown-item" href="#">About Us</a>
                                        <a class="dropdown-item" href="#">How it works</a>
                                        <a class="dropdown-item" href="#">Integrate with Us</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Contact Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Product Catalog</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>

    </div>
</header>

<div class="main-section">
    <div class="container">
        <div class="py-4 text-center">
            <p style="text-align: justify">Welcome to RoboNegotiator.  This is our demo page to show how a buyer and a seller can negotiate with each other through “<strong>salesperson-assisted</strong>” mode (also known as classic mode) as well as through “<strong>automatic</strong>” mode.  In classic mode, we will relay buyer’s offer to the seller and seller’s deal price to buyer when we believe they are in negotiation range. Our emails and text messages will let you change your amount and we believe this way you can negotiate in expedited way.</p>
            <p style="text-align: justify">In automatic mode, we would like you to provide your highest committed offer (in case of buyer) and lowest sales price (in case of seller) so we can negotiate for you.</p>
            <p style="text-align: justify">When we find a successful match between the buyer and the seller, we will introduce both the parties while revealing mutually agreed price for the product.</p>
                <p style="text-align: justify">If you are negotiating with other party you know, you both can use this page to negotiate with each other. Just make sure you both use same “Product Code” (you can come up with a random/long string) and we will make sure you get matched to other party you are dealing with.</p>
        </div>

        <div class="row">
            <div class="col-sm-6 mx-auto">
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
                        <label for="role">Negotiation needs a buyer or a seller, I am:</label>
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
        </div>

    </div>
</div>

<footer class="sticky-footer">
    <div class="container">
        <div class="col-md-12">
            <ul class="m-0 p-0 d-flex justify-content-between align-items-center flex-md-wrap">
                <li>© 2020 Copyright: RoboNegotiator</li>
                <li><a href="">Privacy Policy</a></li>
                <li><a href="">Terms of Use</a></li>
            </ul>
        </div>
    </div>
</footer>

<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="<?php echo e(asset('js/myjs/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/myjs/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/myjs/holder.min.js')); ?>"></script>
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


</body>
</html>
