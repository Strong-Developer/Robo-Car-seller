<style>
::placeholder {
  color: rgb(94,112,102);
  opacity: 0.5; /* Firefox */
}

:-ms-input-placeholder { /* Internet Explorer 10-11 */
 color: rgb(94,112,102);
}

::-ms-input-placeholder { /* Microsoft Edge */
 color: rgb(94,112,102);
}
</style>


 <div class="container-fluid ">
   <div class="row">
      <div class="col-md-12 " style="margin: 0 !important;padding: 0 !important;">
         <div class="view" ng-controller="RegisterCTRL">
          <!--   <div id="overlay-bg" >
            </div> -->
            <div class="mask  rgba-black-strong">
              <div class="container">
                  <div class="row">
                     <div class="register-top p-0 col-lg-4 col-md-0 mb-lg-0 appear-animation" data-appear-animation="fadeInRightShorter" style="background-color: #00aeef; background-image: url('_nwAssets/img/backend-e-commerce-register.png'); background-position: center; background-repeat: no-repeat; width: 100%; ">
                        <div class="left-sec p-4"style="">
                           <!-- <h2 class="text-color-light font-weight-bold text-4 mb-4">Sign In</h2> -->
                           <div class="register-lefttop p-4 mb-1" style="opacity: 0.8; background-color: #fff; background-image: url(img/shop/how_it_work.jpeg);">
                              <div class="" style="">
                                 <span style="font-size: 16px; font-weight: bold;">Welcome! to Step 1 </span>
                                 <h3 class="padding mb-4">Register</h3>
                                 <ul style="font-size: 14px; font-weight: 600; color: #000;">
                                    <li class="mb-1">Test Negotiation in <strong style="color: #000850;">Marketplace</strong>/Demo</li>
                                    <li><strong style="color: #000850;">Subscribe/Integrate </strong> in Website/App (coming soon)</li>
                                 </ul>
                              </div>
                              <div class="triangle-right"></div>
                           </div>
                           <div class="padding2 bg-light p-4 mt-4" style="opacity: 0.8">
                              <h3 class="mb-4">
                              Login</h4>
                              <span style="font-size: 16px; font-weight: bold;"> Step 2 </span>
                              <h4 style="color: #000850"><strong>Automate Sales</strong></h4>
                              <ul style="font-size: 14px; font-weight: 600; color: #000;">
                                 <li>Decide Products, Quantity & Selling Prices</li>
                                 <li>Setup Negotiation Parameters/Rules</li>
                              </ul>
                              <span style="font-size: 16px; font-weight: bold;"> Step 3 </span>
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
                     <div class=" full-width p-0 col-lg-8 mb-5 mb-lg-0 col-md-12 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="200"  style="background-color: #000850;">
                        <div class="border p-5">
                           <!-- <span class="top-sub-title text-color-light">DON'T HAVE AN ACCOUNT?</span> -->
                           <h2 class="font-light text-color-light text-5">Register Now</h2>
                           <h6 class="text-color-light-2 pb-4" style="font-size: 12px; line-height: 15px;">Please sign up with your information so we can help you upload special deals to RoboNegotiator and introduce more customers</h6>
                           <form ng-submit="registration()" class="pb-4">
                              <!-- <div class="form-row">
                                 <div class="form-group col mb-2">
                                    <label for="frmRegisterEmail">EMAIL / USERNAME</label>
                                    <input type="email"  maxlength="100" class="form-control bg-light-5 rounded border-0 text-1" name="email" id="frmRegisterEmail" required>
                                 </div>
                                 </div> -->
                              <div class="form-row mb-2">
                                 <div class="col-md-12" ng-if="register.response !== undefined &amp;&amp; register.response.errors  !== undefined &amp;&amp; register.response.errors.first_name !== undefined">
                                    <div class="alert alert-danger" ng-bind="register.response.errors.first_name[0]"></div>
                                 </div>
                                 <div class="form-group col-lg-6 col-md-6">
                                    <label for="frmRegisterEmail" class="text-color-light-2">First Name *</label>
                                    <input type="text" class="form-control border-bottom boder-cl text-1" placeholder="" required name="first_name" ng-model="register.data.first_name">
                                 </div>
                                 <div class="form-group col-lg-6 col-md-6">
                                    <label for="frmRegisterPassword2" class="text-color-light-2">Last Name (optional)</label>
                                    <input type="text" name="last_name" class="form-control border-bottom boder-cl text-1" placeholder="" ng-model="register.data.last_name">
                                 </div>
                              </div>
                              <div class="form-row mb-2">
                                 <div class="form-group col-lg-6 col-md-6">
                                    <label for="frmRegisterPassword" class="text-color-light-2">Company Name (optional)</label>
                                    <input type="text" class="form-control border-bottom boder-cl text-1" placeholder="" name="company_name" ng-model="register.data.company_name">
                                 </div>
                                 <div class="col-md-6" ng-if="register.response !== undefined &amp;&amp; register.response.errors
                                       !== undefined &amp;&amp; register.response.errors.zip !== undefined">
                                    <div class="alert alert-danger" ng-bind="register.response.errors.zip[0]"></div>
                                 </div>
                                 <div class="form-group col-lg-6 col-md-6">
                                    <label for="frmRegisterPassword2" class="text-color-light-2">Zip Code *</label>
                                    <input type="text" class="form-control border-bottom boder-cl text-1" placeholder="" name="zip" required="" ng-model="register.data.zip">
                                 </div>
                              </div>
                              <div class="form-row mb-2">
                                 <div class="col-md-6" ng-if="register.response !== undefined &amp;&amp; register.response.errors
                                       !== undefined &amp;&amp; register.response.errors.email_id !== undefined">
                                    <div class="alert alert-danger" ng-bind="register.response.errors.email_id[0]"></div>
                                 </div>
                                 <div class="form-group col-lg-6 col-md-6">
                                    <label for="frmRegisterPassword" class="text-color-light-2">Email Address *</label>
                                    <input type="email" class="form-control border-bottom boder-cl text-1" placeholder="" required="" name="email_id" ng-model="register.data.email_id">
                                 </div>
                                 <div class="col-md-6" ng-if="register.response !== undefined &amp;&amp; register.response.errors
                                       !== undefined &amp;&amp; register.response.errors.contact_number !== undefined">
                                    <div class="alert alert-danger" ng-bind="register.response.errors.contact_number[0]"></div>
                                 </div>
                                 <div class="form-group col-lg-6 col-md-6">
                                    <label for="frmRegisterPassword2" class="text-color-light-2">Phone No *</label>
                                    <input type="text" maxlength="14" class="form-control border-bottom boder-cl text-1" placeholder="" required="" name="contact_number" ng-model="register.data.contact_number">
                                 </div>
                              </div>
                              <div class="form-row mb-2">
                                  <div class="col-md-6" ng-if="register.response !== undefined &amp;&amp; register.response.errors
                                       !== undefined &amp;&amp; register.response.errors.password !== undefined">
                                    <div class="alert alert-danger" ng-bind="register.response.errors.password[0]"></div>
                                 </div>
                                 <div class="form-group col-lg-6 col-md-6">
                                    <label for="frmRegisterPassword" class="text-color-light-2">Create Password *</label>
                                    <input type="password" class="form-control border-bottom boder-cl text-1" placeholder="" required="" name="password" ng-model="register.data.password">
                                 </div>
                                 <div class="form-group col-lg-6 col-md-6">
                                    <label for="frmRegisterPassword2" class="text-color-light-2">Confirm Password *</label>
                                    <input type="password" class="form-control border-bottom boder-cl text-1" placeholder="" required="" name="password_confirmation" ng-model="register.data.password_confirmation">
                                 </div>
                              </div>
                              <?php
                              $cuurency = ['USD','EUR','JPY','CAD','INR','GBP','CHF','AUD'];
                              ?>
                              <div class="form-row mb-2">
                                <div class="form-group col-lg-6 col-md-6">
                                <label for="frmRegisterPassword2" class="text-color-light-2">Currency</label>

                                    <select id="currency" class="form-control" ng-init="register.data.currency ='Select Currency'" name="currency" ng-model="register.data.currency">
                                        <option value="Select Currency">Select Currency</option>
                                        <?php $__currentLoopData = $cuurency; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $curr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($curr); ?>"><?php echo e($curr); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                              </div>
                               <div class="col-md-6" ng-if="register.response !== undefined &amp;&amp; register.response.errors
                                       !== undefined &amp;&amp; register.response.errors.currency !== undefined">
                                   <div class="alert alert-danger" ng-bind="register.response.errors.currency[0]"></div>
                               </div>
                              <!-- <div class="row align-items-center">
                                 <div class="form-group col text-left">
                                    <a href="#" class="forgot-pw text-color-light-2 font-weight-bold d-block">Negotiation</a>
                                 </div>
                              </div>
                              <div class="radio mb-0 pb-0">
                                 <label><input type="radio" disabled name="negotiation" ng-model="register.data.negotiation" value="classic" checked style="padding-right: 5px; color: #fff;"> I would like to negotiate myself.</label>
                              </div>
                              <div class="radio mt-0 pt-0">
                                 <label><input type="radio" name="negotiation" ng-model="register.data.negotiation" value="auto" checked style="padding-right: 5px; color: #fff"> I would like RoboNegotiator to expedite/do negotiations</label>
                              </div> -->

                              <div class="row align-items-center">
                                 <div class="col text-right">
                                    <button ng-if="register.progress === false" name="add_seller" value="1" class="btn btn-primary btn-rounded btn-v-3 btn-h-3 font-weight-bold">
                                       REGISTER NOW
                                    </button>
                                 </div>
                              </div>
                              <center>
                                 <md-progress-circular md-mode="indeterminate" ng-if="register.progress === true">
                                 </md-progress-circular>
                              </center>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>


   <style type="text/css">
      .form-control{ border:none!important; border-radius: none!important;}
      .category-sec-left {
      border-right: 1px solid #fff !important;
      border-bottom: 1px solid #fff !important;
      }
      .category-sec-right {
      border-bottom: 1px solid #fff !important;
      }
     /* .btn {
      border-radius: 50px !important;
      }*/
      #overlay-bg {
      height: 1300px;!important;
      background-color: #f2f2f2;
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
      #overlay-bg {
      height: 1600px !important;
      }
      }
      .button_sign{ border:none; transition: 0.5s;}
      .button_sign:hover{ background-color: #00aeef; color: #fff; }
      .custom-control-input{ border-bottom: 1px solid #000!important; }

   </style>

    <style>
         .boder-cl{ background:none; color: #fff;}
         .triangle-right {
         width: 0;
         height: 0;
         border-top: 15px solid transparent;
         border-left: 25px solid #fff;
         border-bottom: 15px solid transparent;
         position: absolute;
         z-index: 200;
         left: 356px;
         top: 115px;
         }
         /* Extra small devices (phones, 600px and down) */
         @media  only screen and (max-width: 600px) {
         .register-top{display: none;}
         }
         /* Small devices (portrait tablets and large phones, 600px and up) */
         @media  only screen and (min-width: 600px) {
         .register-top{display: none;}
         }
         /* Medium devices (landscape tablets, 768px and up) */
         @media  only screen and (min-width: 768px) {
         .register-top{display: none;}
         .register-lefttop{padding: 10px;}
         .full-width{ width: 100%;}
         /*.padding2{padding: 0!important;}
         .padding{ padding: 0!important;}
         }*/
         /* Large devices (laptops/desktops, 992px and up) */
         @media  only screen and (min-width: 992px) {
         .register-top{display: block; padding: 0!important;}
         .triangle-right {
         width: 0;
         height: 0;
         border-top: 15px solid transparent;
         border-left: 25px solid #fff;
         border-bottom: 15px solid transparent;
         position: absolute;
         z-index: 200;
         left: 295px;
         top: 115px;
         }
         /* Extra large devices (large laptops and desktops, 1200px and up) */
         @media  only screen and (min-width: 1200px) {
         .register-top{display: block;}
         .triangle-right {
         width: 0;
         height: 0;
         border-top: 15px solid transparent;
         border-left: 25px solid #fff;
         border-bottom: 15px solid transparent;
         position: absolute;
         z-index: 200;
         left: 355px;
         top: 115px;
         }
         }
      </style>
</div>
