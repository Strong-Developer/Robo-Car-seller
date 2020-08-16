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

    <!-- Bootstrap core CSS -->    <link href="<?php echo e(asset('css/mycss/form-validation.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('css/mycss/bootstrap.min.css')); ?>" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo e(asset('css/mycss/styles.css?v1=400')); ?>" rel="stylesheet">

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
        /* .title-header-section{
            background: url('../../images/demo-header-02.jpg') center center / cover no-repeat;
            background: url('../../images/demo-header-01.jpg') center center / cover no-repeat;
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
            text-shadow: 0 0 10px #000;
            letter-spacing: 0.2rem;
            margin: 0 0;
        } */
        .input-group-text{
            background-color: transparent;
            border: 0;
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
            background: url('../../images/demo2.jpg') top center / cover no-repeat;
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

        @media  screen and (max-width: 767px){
            
            /* .title-header {
                padding: 70px 0;
                margin-bottom: 0px;
            }
            
            .title-header h1 {
                font-size: 48px;
            } */
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

    <!-- <div class="title-header-section">
        <div class="title-header">
            <h1>Negotiaton</h1>
        </div>
    </div> -->
    
    <div class="container">
        <div class="col-12">
            <div class="py-4 text-center" style="line-height: 20px;">






















                <?php if($request->role == 'Buyer'): ?>
                    <div class="card-default">
                        <p style="text-align: justify" class="p_style">You are about to begin negotiation with a seller for a given product. Now, let us make sure we have following information before negotiation starts:</p>
                        <p style="text-align: justify;color: #b04e07 !important;" class="p_style">Personal Details:</p>
                        <p style="text-align: justify" class="p_style">We would like your personal details like email address and text/cell number so we can send you progress and results by email/ texting.</p>
                        <p style="text-align: justify;color: #b04e07 !important;" class="p_style">Deal Commitment:</p>
                        <p style="text-align: justify" class="p_style">Because online negotiation requires you to commit the price/counteroffer you make, we would like to you to specify following information:</p>
                        <p style="text-align: justify" class="p_style">1) Committed Offer/ Highest Offer: If you want to negotiate yourself (in classic mode), you just need to provide “Committed Offer”. However, if you want RoboNegotiator to negotiate for you (in automatic mode), we need your highest offer in case we need to go above as part of negotiations.  We will try to get you a deal at your committed offer price, but we will need ceiling/ highest offer in our back pocket.</p>
                        <p style="text-align: justify" class="p_style">2) Purchase Quantity: Negotiation sometimes goes well if you are committing more than 1 quantity for a given deal. Specify number of units you want to buy at an offered price.</p>
                        <p style="text-align: justify;color: #b04e07 !important;" class="p_style">What to expect next?</p>
                        <ul><li><p style="text-align: justify" class="p_style">We will wait for seller’s deal (if s/he has not already uploaded to RoboNegotiator).</p></li></ul>
                        <ul><li><p style="text-align: justify" class="p_style">Assuming there is a seller’s deal, expect following things:</p></li>
                        <ul><li> <p style="text-align: justify" class="p_style">When we find a common, mutually agreed price, we will introduce both the parties by email and text messages while also revealing mutually agreed price for the product.</p></li></ul>
                        <ul><li><p style="text-align: justify" class="p_style">If you have chosen to negotiate in “classic” mode, we will notify if your offer is in negotiation range of a seller. We drop low ball offers.</p></li></ul></ul>
                        <ul><li><p style="text-align: justify" class="p_style">If there is no match or success or no offer from other party, no one will know about your offer and system will delete your offer after 90 days.</p></li></ul>
                        <p style="text-align: justify" class="p_style">Send an email to info@robonegotiator.com if you have any question.</p>
                    </div>
                <?php else: ?>
                    <div class="card-default">
                        <p style="text-align: justify" class="p_style">You are about to begin negotiation with a buyer for a given product. Now, let us make sure we have following information before negotiation starts:</p>
                        <p style="text-align: justify;color: #b04e07 !important;" class="p_style">Personal Details:</p>
                        <p style="text-align: justify" class="p_style">We would like your personal details like email address and text/cell number so we can send you progress and results by email/ texting.</p>
                        <p style="text-align: justify;color: #b04e07 !important;" class="p_style">Product Details:</p>
                        <p style="text-align: justify" class="p_style">We would need certain information about your product/service so we can make sure we match and find a buyer who is looking for exact similar product.
                            Please provide category (product type), Title and Few Attributes (like make, model, size, color, condition, etc.). Also specify how many units (quantity) you have for a given deal price.
                        </p>
                        <p style="text-align: justify;color: #b04e07 !important;" class="p_style">Deal Commitment:</p>
                        <p style="text-align: justify" class="p_style">Because online negotiation requires you to commit the deal price so we can find buyers for you, we would like to you to specify following information:</p>
                        <p style="text-align: justify" class="p_style">1) Target Sell Price/ Lowest Sell Price: If you want to negotiate yourself (in classic mode), you just need to provide us your “Target Sell Price”. However, if you want RoboNegotiator to negotiate for you (in automatic mode), we need your lowest sell price in our back pocket in case we need to go lower as part of negotiations.  We will try to get you a target sell price, but we will need floor/ lowest price.</p>
                        <p style="text-align: justify;color: #b04e07 !important;" class="p_style">What to expect next?</p>
                        <ul><li><p style="text-align: justify" class="p_style">We will wait for buyer’s offer for the same product (if s/he has not already uploaded to RoboNegotiator).</p></li></ul>
                        <ul><li><p style="text-align: justify" class="p_style">Assuming there is a buyer’s offer, expect following things:</p></li>
                        <ul><li><p style="text-align: justify" class="p_style">When we find a common, mutually agreed price, we will introduce both the parties by email and text messages while also revealing mutually agreed price for the product.</p></li></ul>
                        <ul><li><p style="text-align: justify" class="p_style">If you have chosen to negotiate in “classic” mode, we will notify you only if there is a buyer in negotiation range.  We drop low ball offers.</p></li></ul></ul>
                        <ul><li><p style="text-align: justify" class="p_style">If there is no match or success or no offer from other party, no one will know about your deal and system will delete it after 90 days.</p></li></ul>
                        <p style="text-align: justify" class="p_style">Send an email to info@robonegotiator.com if you have any question.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>


        <div class="col-12">
            <div class="card-default card-custom card-customInner py-5">
                <div class="row">
                    <div class="col-md-12  align-items-center d-flex">

    
                        <form class="needs-validation w-100" novalidate="" method="POST" action="<?php echo e(url('/api_call')); ?>">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" class="form-control" id="api_key" name="api_key" value="<?php echo e($request->api_key); ?>">
                            <input type="hidden" class="form-control" id="role" name="role" value="<?php echo e($request->role); ?>">
                            <input type="hidden" class="form-control" id="mode" name="mode" value="<?php echo e($request->mode); ?>">
                            <input type="hidden" class="form-control" id="upc_product_code" name="upc_product_code" value="<?php echo e($request->upc_product_code); ?>">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email-address">Name</label>
                                        <input type="text" class="form-control" id="name" name="first_name" placeholder="" required="">
                                        <div class="invalid-feedback">
                                            Name required.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email-address">Email Address</label>
                                        <input type="email" class="form-control" id="email-address" name="email_address" placeholder="" required="">
                                        <div class="invalid-feedback">
                                            Email address required.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="phone-number">Contact Number</label>
                                        <input type="number" class="form-control" id="phone-number" name="phone_number" placeholder="" required="">
                                        <div class="invalid-feedback">
                                            Phone number required.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="mb-3">
                                        <label for="qty">Quantity</label>
                                        <input onkeyup="change_qty()" type="number" class="form-control" id="qty" name="qty" placeholder="" required="">
                                        <span id="errmsg"></span>
                                        <div class="invalid-feedback">
                                            Quantity required.
                                        </div>
                                    </div>
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
                    <!-- <div class="col-md-6">
                        <div class="h-100 d-flex align-items-center">
                            <img src="<?php echo e(asset('images/demo2.jpg')); ?>" alt="" class="w-100 h-50">
                        </div>
                    </div> -->
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 mx-auto">
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
</script>
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
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-122868353-1"></script>
  <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-122868353-1');
  </script>

</body>
</html>
