<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PluginHandler extends Controller
{



    public function loadStyleSheet(Request $request){

        return str_replace(array('.a','.b','.c','.d','.e','.f','.g','.h','.i','.j','.k','.l','.m','.n','.o','.p','.q','.s','.t','.u','.v','.w','.x','.y','.z'),
            array('.robo-a','.robo-b','.robo-c','.robo-d','.robo-e','.robo-f','.robo-g','.robo-h','.robo-i','
            .robo-j','.robo-k','.robo-l','.robo-m','.robo-n','.robo-o','.robo-p','.robo-q','.robo-s','.robo-t','.robo-u','.robo-v','.robo-w','.robo-x','.robo-y','.robo-z'),
            file_get_contents('https://robonegotiator.com/mdb/css/bootstrap.min.css'));


    }

    public function loadHtmlContent(Request $request)
    {

       ?><div class="container" id="chatbotrobo">
            <div class="row">
                <div class="offset-md-8 col-md-4 msg-window-container fixed-bottom" style="padding-right: 32px;">
                    <div class="card" id="msgWindow">
                        <div class="card-header"><span class="card-title float-left">Chat with Robonegotiator Sales Agent</span></div>
                        <div class="card-body" id="msgs" style="height:350px !important;overflow-y:scroll !important;overflow-x:hidden !important">
                            <div class="msg to">Welcome to RoboNegotiator. Brought to you by this seller. <a target="_blank" href="https://robonegotiator.com/" style="text-decoration:underline ;">RoboNegotiator</a> is an independent, unbiased, smart matching and negotiation service and will help you negotiate a deal if there is one.   </div>
                            <div style="margin-left:0px !important;" class="msg to text-danger"><img src="https://market.robonegotiator.com/img/robo.png" width="40px">&nbsp;Let’s begin negotiation with your counter-offer you can commit to</div></div>
                        <div class="card-footer">
                            <div class="input-group" id="msgFormh" data-sender="me">
                                <center> <button onclick="closeChatBotRobo()" class="btn btn-primary btn-sm ">End Chat</button><button onclick="restartChatBotRobo()" class="btn btn-primary btn-sm ">Restart Negotiation</button></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modal_pass_time2" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <div class="modal-body">



                            <form class="row">

                                <div class="col-md-12">
                                    <p>We are checking with seller.. Meanwhile can we know your preferences for following things </p>
                                    <br><p>Once seller agrees to your price, how would you claim and pay for this product at a new price? </p> <select class="form-control" style="display: block !important;">
                                        <option>Let seller charge me directly</option>
                                        <option>RoboNegotiator reserves the product by charging me directly.</option>



                                    </select><br>
                                    <p> Seller may want you to deposit $25 before agreeing to your counter-offer. Are you ready for paying this deposit? </p>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="deposit_yes" name="d_yes" value="yes">
                                        <label class="custom-control-label" for="deposit_yes">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="deposit_no" name="d_yes" value="no">
                                        <label class="custom-control-label" for="deposit_no">No</label>
                                    </div>


                                    <br>



                                </div>
                                <div class="col-md-12">

                                    <div class="form-group">

                                        <button id="robo_preference_btn2" type="button" class=" btn btn-primary
                                    float-right">Submit</button>

                                    </div>



                                </div>
                            </form>




                        </div>

                    </div>
                </div>
            </div>


            <div class="modal fade" id="modal_time_pass_1" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <div class="modal-body">



                            <form class="row" id="pre_form_1">

                                <div class="col-md-12">

                                    <p>We are checking with seller.. Meanwhile can we know your preferences for following things </p>
                                    <div class="form-group">
                                        <label>Choose your option to secure this deal</label>
                                        <select id="payment_amount_agreed" class="form-control" style="display: block !important;">
                                            <option value="25">Charge me deposit of $25 and reserve my deal.</option>
                                            <option value="-1">Let RoboNegotiator charge me payment and secure the deal</option>
                                            <option value="0">Let seller send me invoice for me to pay at deal price. I understand deal may be gone by then.</option> <option value="10">I am ready to pay RoboNegotiator $10 for finding me a deal</option>


                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Give us your comments how you felt about this negotiation process and how can we improve it?  </label>

                                        <input type="text" class="form-control">
                                    </div>



                                </div>

                                <div class="col-md-12">

                                    <div class="form-group">

                                        <button type="submit" id="robo_preference_btn1" class="form-control btn
                                    btn-primary">Submit</button>

                                    </div>



                                </div>


                            </form>




                        </div>

                    </div>
                </div>
            </div><div class="modal fade" id="modal_find_seller" tabindex="-1" role="dialog" aria-hidden="true" style="right:0 !important;top:200px !important;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <div class="modal-body">



                            <div class="row">

                                <form id="robo_find_seller_form">
                                    <div class="col-md-12">
                                        <p>There is no deal from any seller yet. Would you like to provide your offer so we can find a seller for you? </p>
                                        <br>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="find_seller_yes" name="robo_find_seller" value="yes">
                                            <label class="custom-control-label" for="find_seller_yes">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="find_seller_no" name="robo_find_seller" value="no">
                                            <label class="custom-control-label" for="find_seller_no">No</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">

                                        <div class="form-group">

                                            <button type="button" class=" btn btn-primary float-right" id="find_seller_btn">Submit</button>

                                        </div>



                                    </div>

                                </form>



                            </div>




                        </div>

                    </div>
                </div>
            </div>

            <div class="modal fade" id="modal_find_seller_yes" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog  modal-bottom-left" role="document">
                    <div class="modal-content">

                        <div class="modal-body">




                            <form class="row" id="robo_add_buyer_offer_form">


                                <div class="col-md-12">


                                    <div class="form-group form-inline">

                                        <p>Please Enter Your Name &nbsp;</p><input required="" type="text" class="form-control  input-sm" name="buyer_name" id="buyer_name" placeholder="Your Name">

                                    </div>

                                </div><div class="col-md-12">


                                    <div class="form-group  form-inline">

                                        <p>Please Enter Your Email &nbsp;</p><input required="" type="email" class="form-control  input-sm" name="buyer_email" id="buyer_email" placeholder="Your Email">

                                    </div>

                                </div>
                                <div class="col-md-12">

                                    <div class="form-group  form-inline">

                                        <p>Please Enter Your Phone Number &nbsp;</p><input required="" type="text" class="form-control  input-sm" name="buyer_phone" placeholder="Your Phone Number " id="buyer_phone">

                                    </div>

                                </div>

                                <div class="col-md-12">


                                    <div class="form-group  form-inline">

                                        <p>Your Location/Zip &nbsp;</p><input required="" type="text" class="form-control  input-sm" name="buyer_zip" id="buyer_zip" placeholder="Your
  Location/Zip  ">

                                    </div>

                                </div>
                                <div class="col-md-12">

                                    <div class="form-group  form-inline">

                                        <p>Your Offer Validity (Expires on) &nbsp;</p><input required="" type="text" class="form-control input-sm hasDatepicker" name="expiry_date" id="datePicker" placeholder="Your Offer Validity (Expires on): ">

                                    </div>

                                </div>


                                <div class="col-md-12">


                                    <div class="form-group  form-inline">

                                        <p>Quantity  &nbsp;</p><input required="" type="number" class="form-control input-sm" name="buyer_original_quantity" placeholder="Quantity you want to buy">

                                    </div>

                                </div>


                                <input type="hidden" name="currency" value="USD">



                                <div class="col-md-12">


                                    <button type="submit" class="btn btn-black btn-block" id="robo_add_buyer_offer_btn">
                                        <i class="fa fa-rocket"></i> Commit My Offer/ Negotiate
                                    </button>

                                </div>


                            </form>








                        </div>

                    </div>
                </div>
            </div>



            <div class="modal fade" id="modal_highest_offer" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document" style="right:0 !important;top:50px !important;">
                    <div class="modal-content">

                        <div class="modal-body">



                            <form class="row" id="update_offer_form">

                                <div class="col-md-12">

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="highest_offer_robo" placeholder="Enter your final/highest offer">
                                    </div>


                                </div>

                                <div class="col-md-12">

                                    <div class="form-group">

                                        <button type="submit" id="highest_offer_btn" class="form-control btn
                                    btn-primary">UPDATE OFFER</button>

                                    </div>



                                </div>


                            </form>




                        </div>

                    </div>
                </div>
            </div>
            <div class="modal fade show" id="modal_counter_offer" tabindex="-1" role="dialog" aria-modal="true" style="padding-right: 17px; display: block;">
                <div class="modal-dialog robo-modal-dial" style="right:0 !important;top:50px !important;" role="document">
                    <div class="modal-content">

                        <div class="modal-body">



                            <form class="row" id="init_offer_form" >

                                <div class="col-md-9">

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="robo_counter_price"
                                               placeholder="Please enter counter offer ...">
                                    </div>


                                </div>

                                <div class="col-md-3">

                                    <div class="form-group">

                                        <button type="submit"
                                                id="send_counter_price_btn"
                                                class="form-control btn
                                        btn-primary">Send</button>

                                    </div>



                                </div>


                            </form>




                        </div>

                    </div>
                </div>
            </div></div>

        <style type="text/css">
            #msgWindow {
                margin-top: 20px;
            }

            #msgs {

                min-height: 200px;
                display: flex;
                flex-flow: column nowrap;padding-top:40px !important;
                align-items: flex-start;
            }

            .msg {

                border: 1px solid silver;
                padding: 3px 7px;
                display: inline-block;
                position: relative;font-size:15px !important;
                border-radius: 10px;top:-35px;margin-top:4px !important;
            }#chatbotrobo card-body{padding-left:4px !important;}
            #chatbotrobo .modal-dialog{margin-right:5px !important;top:0px !important;}#chatbotrobo .modal .modal-dialog .modal-content p{margin-top:10px !important;padding-bottom:0 !important;font-size:13px !important;line-height:1.5 !important;}#chatbotrobo .modal .modal-dialog .modal-content .form-control{font-size:13px !important;line-height:15px !important;}
            .msg.from {
                align-self: flex-end;
            }
            .msg.to {
                align-self: flex-start;
            }
            .msg.to::before {
                right: inherit;
                left: -20px;
            }
            .msg.to::after {
                right: inherit;
                left: -35px;
            }
            .msg.typing {
                color: silver;
            }

            #msgForm input:focus, #msgForm button:focus {
                box-shadow: none;
            }

        </style>
       <?php

    }
}
