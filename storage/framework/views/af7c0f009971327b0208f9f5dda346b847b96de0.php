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
        #errmsg{
            color: red;
            font-size: 14px;
        }
        .loader {
            border: 4px solid #03aeef;
            border-radius: 50%;
            border-top: 4px solid #ffffff;
            width: 20px;
            height: 20px;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }

        /* Safari */
        @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes  spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        @media (max-width: 767px) {
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
            <p style="text-align: justify">Welcome to RoboNegotiator.  This is our demo page to show how a buyer and a seller can negotiate with each other through “<strong>salesperson-assisted</strong>” mode (also known as classic mode) as well as through “<strong>automatic</strong>” mode.</p>
            <p style="text-align: justify">•	In classic mode, we will relay buyer’s offer to the seller and seller’s deal price to buyer when we believe they are in negotiation range. Our emails and text messages will let you change your amount and we believe this way you can negotiate in expedited way.</p>
            <p style="text-align: justify">•	In automatic mode, we would like you to provide your highest committed offer (in case of buyer) and lowest sales price (in case of seller) so we can negotiate for you.</p>
            <p style="text-align: justify">When we find a successful match between the buyer and the seller, we will introduce both the parties while revealing mutually agreed price for the product.
                If you are negotiating with another party you already know, you both can use to negotiate with each other. Just make sure you both use same “Product Code” (you can come up with a random/long string) and we will make sure you get matched to other party you are dealing with. Product Code is one of the ways we match buyers and sellers.</p>
        </div>

        <div class="row">
            <div class="col-sm-6 mx-auto">

                <form class="needs-validation" novalidate="" method="POST" action="<?php echo e(url('/api_call')); ?>">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" class="form-control" id="api_key" name="api_key" value="<?php echo e($request->api_key); ?>">
                    <input type="hidden" class="form-control" id="role" name="role" value="<?php echo e($request->role); ?>">
                    <input type="hidden" class="form-control" id="mode" name="mode" value="<?php echo e($request->mode); ?>">
                    <input type="hidden" class="form-control" id="upc_product_code" name="upc_product_code" value="<?php echo e($request->upc_product_code); ?>">
                    <div class="mb-3">
                        <label for="email-address">Name</label>
                        <input type="text" class="form-control" id="name" name="first_name" placeholder="" required="">
                        <div class="invalid-feedback">
                            Name required.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email-address">Email Address</label>
                        <input type="email" class="form-control" id="email-address" name="email_address" placeholder="" required="">
                        <div class="invalid-feedback">
                            Email address required.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="phone-number">Contact Number</label>
                        <input type="number" class="form-control" id="phone-number" name="phone_number" placeholder="" required="">
                        <div class="invalid-feedback">
                            Phone number required.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="qty">Quantity</label>
                        <input onkeyup="change_qty()" type="number" class="form-control" id="qty" name="qty" placeholder="" required="">
                        <span id="errmsg"></span>
                        <div class="invalid-feedback">
                            Quantity required.
                        </div>
                    </div>
                    <?php if($request->role == "Seller"): ?>
                    <div class="mb-3">
                        <label for="category">Category</label>
                        <input type="text" class="form-control" id="category" name="category" placeholder="" required="">
                        <div class="invalid-feedback">
                            Categoryrequired.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="" required="">
                        <div class="invalid-feedback">
                            Title required.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="product-attirbute-1">Product Attribute 1:</label>
                        <input type="text" class="form-control" id="product-attirbute-1" name="parameter1" placeholder="" required="">
                        <div class="invalid-feedback">
                            Product Attribute 1 required.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="product-attirbute-2">Product Attribute 2:</label>
                        <input type="text" class="form-control" id="product-attirbute-2" name="parameter2" placeholder="" required="">
                        <div class="invalid-feedback">
                            Product Attribute 2 required.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="product-attirbute-3">Product Attribute 3:</label>
                        <input type="text" class="form-control" id="product-attirbute-3" name="parameter3" placeholder="" required="">
                        <div class="invalid-feedback">
                            Product Attribute 3 required.
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="target-sell-price">Target Sell Price</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                                <input onkeyup="change_sell_price()" type="number" class="form-control" id="target-sell-price" name="seller_deal_price" placeholder="" required="">
                            </div>
                            <div class="invalid-feedback">
                                Target Sell Price required.
                            </div>
                        </div>
                        <?php if($request->mode == "Auto"): ?>
                        <div class="col-md-6">
                            <label for="lowest-sell-price">Lowest Sell Price</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                                <input onkeyup="change_low_sell_price()" type="number" class="form-control" id="lowest-sell-price" name="seller_lowest_deal_price" placeholder="" required="">
                            </div>
                            <div class="invalid-feedback">
                                Lowest Sell Price required.
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>

















                    <?php elseif($request->role == "Buyer"): ?>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="committed-offer">Committed Offer</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control" id="committed-offer" name="committed_offer" placeholder="" required="">
                            </div>
                            <div class="invalid-feedback">
                                Committed Offer required.
                            </div>
                        </div>
                        <?php if($request->mode == "Auto"): ?>
                        <div class="col-md-6">
                            <label for="highest-offer">Highest Offer</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control" id="highest-offer" name="highest_offer" placeholder="" required="">
                            </div>
                            <div class="invalid-feedback">
                                Highest Offer required.
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                    <hr class="my-4">
                    <button onclick="myFunction() "class="btn btn-primary btn-lg btn-block btn-custom d-flex justify-content-center align-items-center" id="submit_button" type="submit">
                        <span class="submit-tbn">Submit</span>
                        <span class="ml-3">
                           <div style="display: none" class="loader"></div>
                        </span>
                    </button>
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

        $("#qty").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                return false;
            }
        });

        var selected_role = "<?php echo e($request->role); ?>";
        if(selected_role == "Buyer"){
            //light blue
            $('#submit_button').css("background", "#00aeef");
        }else if(selected_role == "Seller"){
            // navy blue
            $('#submit_button').css("background", "#1b1e5b");
            $('#submit_button').css("color", "#ffffff");
        }

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

    function change_qty(){
        var qty = $('#qty').val();
        if(qty != "") {
            if (qty <= 0) {
                alert('Quantity must be greater then 0.');
                $('#qty').val('');
            }
        }
    }
    function change_sell_price(){
        var price = $('#target-sell-price').val();
        if(price != ""){
            if(price <= 0){
                alert('Target Sell Price must be greater then 0.');
                $('#target-sell-price').val('');
            }
        }
    }
    function change_low_sell_price(){
        // var low_price = $('#lowest-sell-price').val();
        // if(low_price != ""){
        //     var target_price = $('#target-sell-price').val();
        //     if(target_price == ""){
        //         alert('Enter Target Sell Price first.');
        //         $('#lowest-sell-price').val('');
        //     } else if(low_price <= 0 || low_price >= target_price){
        //         alert('Lowest Sell Price must be greater then 0 and less then Target Sell Price.');
        //         $('#lowest-sell-price').val('');
        //     }
        // }
    }
    function myFunction() {
        $('.loader').css('display', 'block');
        setTimeout(function(){ $('.loader').css('display', 'none'); }, 2000);

    }
</script>
</body>
</html>
