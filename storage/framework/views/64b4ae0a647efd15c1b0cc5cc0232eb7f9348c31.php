<div class="container-fluid ">
   <div class="row">
      <div class="col-md-12 " style="margin: 0 !important;padding: 0 !important;">
         <div class="view">
            <!-- <div id="overlay-bg">
            </div> -->
            <div class="mask  rgba-black-strong">
               <div class="container">
                  <div class="row" ng-controller="RegisterCTRL">

                     <!-- <div class="col-md-5 col-sm-12" id="seller_div" style="background-color: #00aeef; padding-top: 120px;">
                        <center><img src="img/login_img.png" alt="login_img" style=""></center>
                     </div>  -->
                    <div class="for-m p-0 col-lg-5 col-md-5 appear-animation d-sm-down" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="200">
                        <div class="border  p-5" style="background-color: #00aeef;">
                           <!-- <span class="top-sub-title text-color-primary">DON'T HAVE AN ACCOUNT?</span> -->
                           <!-- <h2 class="font-weight-light text-color-light text-4 mb-4">Test Negotiation in Marketplace/Demo Subscription (Integrate in my Website)</h2> -->
                           <img src="img/shop/login-top.png" alt="img" width="100%" >
                           <div class="bg-light p-4">
                              <div class="triangle-right"></div>
                              <h3 class="mb-4">Login</h3>
                              <h4 style="color: #000850"><strong>Automate Sales</strong></h4>
                              <ul style="font-size: 14px; font-weight: 600; color: #000;">
                                 <li>Decide Products, Quantity & Selling Prices</li>
                                 <li>Setup Negotiation Parameters/Rules</li>
                              </ul>
                              <h4 style="color: #000850"><strong>Dashboard/Reports</strong></h4>
                              <ul style="font-size: 14px; font-weight: 600; color: #000; overflow: hidden;">
                                 <li>Check Market Data</li>
                                 <li>Check Historical Data</li>
                                 <li>Manage My Deals</li>
                                 <li>View Negotiation Progress</li>
                                 <li>Negotiation Prediction/Forecasting</li>
                              </ul>
                           </div>
                        </div>
                     </div>

                     <!-- <div class="col-md-7  col-sm-12" id="buyer_div" style="background-color: #000850; padding: 100px 70px;">
                        <div class="row">
                           <div class="col-12">
                              <h2 class="font-weight-bold text-white">
                                 Login
                              </h2>
                           </div>
                           <div class="col-12">
                              <form action="<?php echo e(route('login.submit')); ?>" method="post">
                                 <?php echo e(csrf_field()); ?>

                                 <div class="row">
                                    <div class="col-md-12">
                                       <?php echo e(\App\Http\Controllers\PagesHandler::notification()); ?>

                                       <div class="md-form">
                                          <input type="email" name="email" placeholder="Enter email address" class="form-control">
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="md-form">
                                          <input type="password" name="password" placeholder="Enter password" class="form-control">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-12">
                                       <button class="button_login btn btn- btn-inline-block btn-white btn-right  waves-effect waves-light" style="background-color: #fff;">
                                       Login
                                       </button>
                                       </div>

                                 </div>
                                 <center><div class="col-12 copy-text" style="margin-top:30px; text-align: center; color: #fff;">New User ! <a href="<?php echo e(route('cms.pages.register')); ?>">Register now</a></div></center>
                              </form>
                           </div>
                        </div>
                     </div> -->

                      <div class="p-0 col-lg-7 mb-5 mb-lg-0 col-md-7 appear-animation" data-appear-animation="fadeInRightShorter">
                        <div class="login p-5" style="background-color: #000850; height: 855px; ">
                           <!-- <span class="top-sub-title text-color-light-2 small">NOT A MEMBER?</span> -->
                           <div class="login-right" style="margin-top: 200px;">
                              <h2 class="text-color-light font-weight-bold text-6 mb-4">Log In</h2>
                              <div class="alert alert-info" role="alert">
                                 Login/ Register below to sell your product(s)/ service through negotiation. Buyers can directly visit our<a href="<?php echo e(route('home.catalog')); ?>" class="alert-link"> Product Catalog</a>
                              </div>
                              <form action="<?php echo e(route('login.submit')); ?>" id="frmSignIn" method="post">
                                 <?php echo e(csrf_field()); ?>

                                 <div class="form-row">
                                    <?php echo e(\App\Http\Controllers\PagesHandler::notification()); ?>

                                    <div class="form-group col mb-2">
                                       <label class="text-color-light-2" for="frmSignInEmail">EMAIL / USERNAME</label>
                                       <input type="email" value=""  placeholder="Enter email address" maxlength="100" class="form-control bg-light rounded border-0 text-1" name="email" id="frmSignInEmail" required style="background: none!important; border-bottom: 1px solid #fff!important; border-radius: 0!important;">
                                    </div>
                                 </div>
                                 <div class="form-row">
                                    <div class="form-group col">
                                       <label class="text-color-light-2" for="frmSignInPassword">PASSWORD</label>
                                       <input type="password" placeholder="Enter password" class="form-control bg-light rounded border-0 text-1" name="password" id="frmSignInPassword" required style="background: none!important; border-bottom: 1px solid #fff!important; border-radius: 0!important;">
                                    </div>
                                 </div>
                                 <div class="form-row mb-3">
                                    <div class="form-group col">
                                       <div class="form-check checkbox-custom checkbox-custom-transparent checkbox-default">
                                          <input class="form-check-input" type="checkbox" name="remember_me" value="1" id="frmSignInRemember">
                                          <label class="form-check-label text-color-light-2" for="frmSignInRemember">
                                          Remember me
                                          </label>
                                       </div>
                                    </div>
                                    <div class="form-group col text-right">
                                       <a href="#" class="forgot-pw text-color-light-2 d-block">Forgot Your password?</a>
                                    </div>
                                 </div>
                                 <div class="row align-items-center">
                                    <div class="col text-right">
                                       <button type="submit" class="btn hover-color btn-light btn-rounded btn-v-3 btn-h-3 font-weight-bold">LOG IN</button>
                                    </div>
                                 </div>
                              </form>
                              <center><div class="col-12 copy-text"><a href="<?php echo e(route('cms.pages.register')); ?>"><span style="margin-top:30px; text-align: center; color: #fff !important;">Register now!</span></a></div></center>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>


   <style type="text/css">
      .input{ background-color: none!important; }
      .form-control{ border:none!important; }
      .category-sec-left {
      border-right: 1px solid #fff !important;
      border-bottom: 1px solid #fff !important;
      }
      .category-sec-right {
      border-bottom: 1px solid #fff !important;
      }
     .btn {
      /*border-radius: 50px !important;*/
      float: right;
      }
      #overlay-bg {
      height: 500px!important;
      }
      .custom-control-label {
      position: initial !important;
      margin-bottom: 0;
      vertical-align: top;
      }
      .btn-outline-success:hover {
      background: green !important;
      }
      input[type=text] , input[type=password] , input[type=email] , input[type=email]:active,
      input[type=email]:focus  {
      background: transparent !important;
      color: #fff !important;
      border-bottom: 1px solid #746fd4 !important;
      }
      ::placeholder {
      color: #fff !important;
      }
      @media (max-width: 480px) {
      .category-sec-left {
      border-right: 0 !important;
      border-bottom: 1px solid #fff !important;
      }
      .category-sec-right {
      border-right: 0 !important;
      border-bottom: 1px solid #fff !important;
      }
    /*  #overlay-bg {
      height: 1600px !important;
      }
      }*/
      .button_login{border:none; transition: 0.5s;}
      .button_login:hover{ background-color: #00aeef; color: #fff; }
   </style>

   <style>
         .hover-color:hover{background-color: #00aeef; border-color: #00aeef; color: #fff;}
         .triangle-right {
         width: 0;
         height: 0;
         border-top: 15px solid transparent;
         border-left: 20px solid #fff;
         border-bottom: 15px solid transparent;
         position: absolute;
         z-index: 100;
         left: 454px;
         top: 585px;
         }
         /* Small devices (portrait tablets and large phones, 600px and up) */
         @media  only screen and (min-width: 600px) {
         .for-m{display: none;}
         .login-right{margin-top: 60px!important;}
         .login{height: 640px!important;}
         }
         /* Medium devices (landscape tablets, 768px and up) */
         @media  only screen and (min-width: 768px) {
         .for-m{display: block;}
         .login{height: 710px!important;}
         .login-right{margin-top: 100px!important;}
         .border{ padding-left: 20px!important; padding-right: 20px!important;
         padding-bottom: 20px!important; padding-top: 20px!important;}
         .triangle-right {
         width: 0;
         height: 0;
         border-top: 15px solid transparent;
         border-left: 20px solid #fff;
         border-bottom: 15px solid transparent;
         position: absolute;
         z-index: 100;
         left: 279px;
         top: 453px;
         }
         }
         /* Large devices (laptops/desktops, 992px and up) */
         @media  only screen and (min-width: 992px) {
         .for-m{display: block;}
         .login{height: 750px!important;}
         .login-right{margin-top: 150px!important;}
         .triangle-right {
         width: 0;
         height: 0;
         border-top: 15px solid transparent;
         border-left: 20px solid #fff;
         border-bottom: 15px solid transparent;
         position: absolute;
         z-index: 100;
         left: 379px;
         top: 523px;
         }
         }
         /* Extra large devices (large laptops and desktops, 1200px and up) */
         @media  only screen and (min-width: 1200px) {
         .for-m{display: block;}
         .login{height: 816px!important;}
         .triangle-right {
         width: 0;
         height: 0;
         border-top: 15px solid transparent;
         border-left: 20px solid #fff;
         border-bottom: 15px solid transparent;
         position: absolute;
         z-index: 100;
         left: 454px;
         top: 590px;
         }
         }
      </style>
</div>
