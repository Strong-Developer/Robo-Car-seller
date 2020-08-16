<div class="container-fluid ">
   <div class="row">
      <div class="col-md-12 " style="margin: 0 !important;padding: 0 !important;">
         <div class="view">
            <div id="overlay-bg">
            </div>
            <div class="mask  rgba-black-strong">
               <div class="container">
                  <div class="row" ng-controller="RegisterCTRL">

                     <div class="col-md-6" id="seller_div" style="background-color: #746fd4; padding-top: 120px;">
                        <center><img src="img/login_img.png" alt="login_img" style=""></center>
                     </div>


                     <div class="col-md-6" id="buyer_div" style="background-color: #000850; padding: 100px 70px;">
                        <div class="row">
                           <div class="col-12">
                              <h2 class="font-weight-bold text-white"><i class="fa fa-user"></i>&nbsp;
                                 Login
                              </h2>
                           </div>
                           <div class="col-12">
                              <form action="{{route('login.submit')}}" method="post">
                                 {{csrf_field()}}
                                 <div class="row">
                                    <div class="col-md-12">
                                       {{\App\Http\Controllers\PagesHandler::notification()}}
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
                                       <p style="color: #fff;">Forgot your password?</p>
                                       <button class="btn btn- btn-inline-block btn-white btn-right  waves-effect waves-light">
                                       Login
                                       </button>
                                       </div>
                                       <h6 style="text-align: center; color: #fff;"> </h6>
                                       <center><div class="copy-text">New User! <a href="">Register now</a></div></center>

                                 </div>
                              </form>
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
      border-bottom: 2px solid #fff !important;
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
   </style>
</div>
