var imported = document.createElement('script');
imported.src = 'https://www.paypal.com/sdk/js?client-id=sb&currency=USD';
document.head.appendChild(imported);

var product_code , seller_email ;


if(typeof ROBO_PRODUCT_NAME_IDENTIFIER_TYPE !== "undefined"){
    if(typeof ROBO_PRODUCT_NAME_IDENTIFIER_NAME !== "undefined"){

        if(ROBO_PRODUCT_NAME_IDENTIFIER_TYPE === 'class'){
            var ROBO_UPC_CODE = $('.'+ROBO_PRODUCT_NAME_IDENTIFIER_NAME).text();
        } else if(ROBO_PRODUCT_NAME_IDENTIFIER_TYPE === 'id'){
            var ROBO_UPC_CODE = $('#'+ROBO_PRODUCT_NAME_IDENTIFIER_NAME).text();
        }
    }
}

if (typeof ADD_TO_CART_BTN_CLASS !== "undefined") {
    console.log('add_to_cart_btnclass defined ');
    if (typeof ROBO_BTN_CLASS === 'undefined') {
        var ROBO_BTN_CLASS = 'robo_custom_btn' ;
    }
    if (typeof ROBO_BTN_CUSTOM_TEXT === 'undefined') {
        var ROBO_BTN_CUSTOM_TEXT = '' ;
    }
    if (typeof ROBO_BTN_PREFIX_ELEMENT === 'undefined') {
        var ROBO_BTN_PREFIX_ELEMENT = '' ;
    }
    if (typeof ROBO_BTN_STYLE === 'undefined') {
        var ROBO_BTN_STYLE = "background-image:url('http://robonegotiator.com/img/logos/1robo-btn.png');" +
            "background-size:cover;width:150px;height:50px;border:none;" ;
    }


    var ROBO_BTN_ELEMENT = ROBO_BTN_PREFIX_ELEMENT+'<button type="button" id="robonegotiator_btn_xyz" class="'+ROBO_BTN_CLASS+'" ' +
        'style='+ROBO_BTN_STYLE+' ' +
        '>'+ROBO_BTN_CUSTOM_TEXT+'</button>';
    $(ROBO_BTN_ELEMENT).insertAfter('.'+ADD_TO_CART_BTN_CLASS);

    if(typeof ROBO_API_KEY !== 'undefined' && typeof ROBO_UPC_CODE !== 'undefined' && typeof ROBO_SELLER_EMAIL !==
        'undefined' && typeof ROBO_NEGOTIATION_MODE !== 'undefined' ){



        $('#robonegotiator_btn_xyz').click(function () {
            triggerNegotiationBar(ROBO_API_KEY ,ROBO_UPC_CODE ,ROBO_SELLER_EMAIL, ROBO_NEGOTIATION_MODE ) ;
        });


    }

}

function triggerNegotiationBar($api_key  , $product_code , $seller_email , $negotiation_mode = 'auto'  ) {

    product_code = $product_code ; seller_email = $seller_email ;

    var api_key = $api_key;

    var div  = $('body').append('    <div class="container" id="chatbotrobo">\n' +
        '        <div class="row">\n' +
        '            <div class="offset-md-8 col-md-4 msg-window-container fixed-bottom">\n' +
        '                <div class="card" id="msgWindow">\n' +
        '                    <div class="card-header"><span class="card-title float-left">Chat with ' +
        'Robonegotiator ' +
        'Sales ' +
        'Agent</span></div>\n' +
        '                    <div class="card-body" id="msgs" style="height:350px !important;' +
        'overflow-y:scroll !important;overflow-x:hidden !important">\n' +
        '                        <div class="msg to">Welcome to RoboNegotiator. Brought to you by this seller. <a' +
        ' ' +
        'target="_blank" href="https://robonegotiator.com/" style="text-decoration:underline ;' +
        '">RoboNegotiator</a> is an ' +
        'independent, ' +
        'unbiased, ' +
        'smart matching and negotiation service ' +
        'and ' +
        'will help you negotiate a deal if there is one.   </div>\n' +
        '                    </div>\n' +
        '                    <div class="card-footer">\n' +
        '                        <div class="input-group" id="msgFormh" data-sender="me">\n' +
        '                          <center> <button onclick="closeChatBotRobo()" class="btn btn-primary btn-sm ' +
        '">End Chat</button><button onclick="restartChatBotRobo()" class="btn btn-primary btn-sm ' +
        '">Restart Negotiation</button></center>\n' +
        '                        </div>\n' +
        '                    </div>\n' +
        '                </div>\n' +
        '            </div>\n' +
        '        </div>\n' +
        '      <div class="modal fade" id="modal_pass_time2" tabindex="-1" role="dialog"\n' +
        '             aria-hidden="true">\n' +
        '            <div class="modal-dialog" role="document">\n' +
        '                <div class="modal-content">\n' +
        '\n' +
        '                    <div class="modal-body">\n' +
        '\n' +
        '\n' +
        '\n' +
        '                        <form class="row">\n' +
        '\n' +
        '                            <div class="col-md-12">\n' +
        '                                <p>We are checking with seller.. Meanwhile can we know your preferences for following things </p>\n' +
        '                                <br/><p>Once seller agrees to your price, how would you claim and pay for this product at a new price? </p> <select class="form-control" style="display: block !important;">\n' +
        '                                        <option>Let seller charge me directly</option>\n' +
        '                                        <option>RoboNegotiator reserves the product by charging me directly.</option>\n' +
        '                                       \n' +
        '\n' +
        '\n' +
        '                                    </select><br/>\n' +
        '                                <p> Seller may want you to deposit $25 before agreeing to your counter-offer. Are you ready for paying this deposit? </p>\n' +
        '                                <div class="custom-control custom-radio">\n' +
        '                                    <input type="radio" class="custom-control-input" id="deposit_yes"\n' +
        '                                           name="d_yes"\n' +
        '                                           value="yes">\n' +
        '                                    <label class="custom-control-label" for="deposit_yes">Yes</label>\n' +
        '                                </div>\n' +
        '                                <div class="custom-control custom-radio">\n' +
        '                                    <input type="radio" class="custom-control-input" id="deposit_no"\n' +
        '                                           name="d_yes"\n' +
        '                                           value="no">\n' +
        '                                    <label class="custom-control-label" for="deposit_no">No</label>\n' +
        '                                </div>\n' +
        '\n' +
        '\n' +
        '                                <br/>\n' +
        '                                \n' +
        '                                \n' +
        '\n' +
        '                            </div>\n' +
        '                            <div class="col-md-12">\n' +
        '\n' +
        '                                <div class="form-group">\n' +
        '\n' +
        '                                    <button id="robo_preference_btn2"  type="button" class=" btn ' +
        'btn-primary\n' +
        '                                    float-right">Submit</button>\n' +
        '\n' +
        '                                </div>\n' +
        '\n' +
        '\n' +
        '\n' +
        '                            </div>\n' +
        '                        </form>\n' +
        '\n' +
        '\n' +
        '\n' +
        '\n' +
        '                    </div>\n' +
        '\n' +
        '                </div>\n' +
        '            </div>\n' +
        '        </div>\n' +
        '\n' +
        '\n' +
        '                <div class="modal fade" id="modal_time_pass_1" tabindex="-1" role="dialog"\n' +
        '             aria-hidden="true">\n' +
        '            <div class="modal-dialog" role="document">\n' +
        '                <div class="modal-content">\n' +
        '\n' +
        '                    <div class="modal-body">\n' +
        '\n' +
        '\n' +
        '\n' +
        '                        <form class="row" id="pre_form_1">\n' +
        '\n' +
        '                            <div class="col-md-12">\n' +
        '\n' +
        '                                <p>We are checking with seller.. Meanwhile can we know your preferences for following things </p>\n' +
        '                                <div class="form-group">\n' +
        '                                    <label>Choose your option to secure this deal</label>\n' +
        '                                    <select id="payment_amount_agreed" class="form-control" ' +
        'style="display: ' +
        'block !important;' +
        '">\n' +
        '                                        <option value="25">Charge me deposit of $25 and reserve my deal' +
        '.</option>\n' +
        '                                        <option value="-1">Let RoboNegotiator charge me payment and ' +
        'secure ' +
        'the deal</option>\n' +
        '                                        <option value="0">Let seller send me invoice for me to pay at ' +
        'deal ' +
        'price. ' +
        'I understand deal may be gone by then.</option> <option value="10">I am ready to pay RoboNegotiator $10 ' +
        'for ' +
        'finding me a deal</option>\n' +
        '\n' +
        '\n' +
        '                                    </select>\n' +
        '                                </div>\n' +
        '                                <div class="form-group">\n' +
        '                                    <label>Give us your comments how you felt about this negotiation process and how can we improve it?  </label>\n' +
        '\n' +
        '                                    <input type="text" class="form-control">\n' +
        '                                </div>\n' +
        '\n' +
        '\n' +
        '\n' +
        '                            </div>\n' +
        '\n' +
        '                            <div class="col-md-12">\n' +
        '\n' +
        '                                <div class="form-group">\n' +
        '\n' +
        '                                    <button type="submit" id="robo_preference_btn1" class="form-control ' +
        'btn\n' +
        '                                    btn-primary">Submit</button>\n' +
        '\n' +
        '                                </div>\n' +
        '\n' +
        '\n' +
        '\n' +
        '                            </div>\n' +
        '\n' +
        '\n' +
        '                        </form>\n' +
        '\n' +
        '\n' +
        '\n' +
        '\n' +
        '                    </div>\n' +
        '\n' +
        '                </div>\n' +
        '            </div>\n' +
        '        </div><div class="modal fade" id="modal_find_seller" tabindex="-1" role="dialog"\n' +
        '             aria-hidden="true"  style="right:0 !important;top:200px !important;">\n' +
        '            <div class="modal-dialog" role="document">\n' +
        '                <div class="modal-content">\n' +
        '\n' +
        '                    <div class="modal-body">\n' +
        '\n' +
        '\n' +
        '\n' +
        '                        <div class="row">\n' +
        '\n' +
        '                            <form id="robo_find_seller_form">\n' +
        '                                <div class="col-md-12">\n' +
        '                                    <p>There is no deal from any seller yet. Would you like to provide your offer so we can find a seller for you? </p>\n' +
        '                                    <br/>\n' +
        '                                <div class="custom-control custom-radio">\n' +
        '                                    <input type="radio" class="custom-control-input" id="find_seller_yes"\n' +
        '                                           name="robo_find_seller"\n' +
        '                                           value="yes">\n' +
        '                                    <label class="custom-control-label" for="find_seller_yes">Yes</label>\n' +
        '                                </div>\n' +
        '                                <div class="custom-control custom-radio">\n' +
        '                                    <input type="radio" class="custom-control-input" id="find_seller_no"\n' +
        '                                           name="robo_find_seller"\n' +
        '                                           value="no">\n' +
        '                                    <label class="custom-control-label" for="find_seller_no">No</label>\n' +
        '                                </div>\n' +
        '                                </div>\n' +
        '                                <div class="col-md-12">\n' +
        '\n' +
        '                                    <div class="form-group">\n' +
        '\n' +
        '                                        <button type="button" class=" btn btn-primary float-right" id="find_seller_btn">Submit</button>\n' +
        '\n' +
        '                                    </div>\n' +
        '\n' +
        '\n' +
        '\n' +
        '                                </div>\n' +
        '\n' +
        '                            </form>\n' +
        '\n' +
        '\n' +
        '\n' +
        '                        </div>\n' +
        '\n' +
        '\n' +
        '\n' +
        '\n' +
        '                    </div>\n' +
        '\n' +
        '                </div>\n' +
        '            </div>\n' +
        '        </div>\n' +
        '\n' +
        '        <div class="modal fade" id="modal_find_seller_yes" tabindex="-1" role="dialog"\n' +
        '             aria-hidden="true"  >\n' +
        '            <div class="modal-dialog  modal-bottom-left" role="document">\n' +
        '                <div class="modal-content">\n' +
        '\n' +
        '                    <div class="modal-body">\n' +
        '\n' +
        '\n' +
        '\n' +
        '\n' +
        '                            <form class="row" id="robo_add_buyer_offer_form">\n' +
        '\n' +
        '\n' +

        '                                <div class="col-md-12">\n' +
        '\n' +
        '\n' +
        '                                    <div class="form-group form-inline">\n' +
        '\n' +
        '                                        <p>Please Enter Your Name &nbsp;</p><input required type="text" ' +
        'class="form-control  input-sm"' +
        ' ' +
        'name="buyer_name"\n' +
        '                                               id="buyer_name"\n' +
        '                                               placeholder="Your Name" >\n' +
        '\n' +
        '                                    </div>\n' +
        '\n' +
        '                                </div>' +
        '<div class="col-md-12">\n' +
        '\n' +
        '\n' +
        '                                    <div class="form-group  form-inline">\n' +
        '\n' +
        '                                        <p>Please Enter Your Email &nbsp;</p><input required ' +
        'type="email" ' +
        'class="form-control  input-sm" name="buyer_email"\n' +
        '                                               id="buyer_email"\n' +
        '                                               placeholder="Your Email" >\n' +
        '\n' +
        '                                    </div>\n' +
        '\n' +
        '                                </div>\n' +
        '                                <div class="col-md-12">\n' +
        '\n' +
        '                                    <div class="form-group  form-inline">\n' +
        '\n' +
        '                                        <p>Please Enter Your Phone Number &nbsp;</p><input required ' +
        'type="text"' +
        ' ' +
        'class="form-control  input-sm" name="buyer_phone"\n' +
        '                                               placeholder="Your Phone Number "\n' +
        '                                               id="buyer_phone" >\n' +
        '\n' +
        '                                    </div>\n' +
        '\n' +
        '                                </div>\n' +
        '\n' +
        '                                <div class="col-md-12">\n' +
        '\n' +
        '\n' +
        '                                    <div class="form-group  form-inline">\n' +
        '\n' +
        '                                        <p>Your Location/Zip &nbsp;</p><input required type="text" ' +
        'class="form-control  input-sm" name="buyer_zip" id="buyer_zip"\n' +
        '                                               placeholder="Your\n' +
        '  Location/Zip  ">\n' +
        '\n' +
        '                                    </div>\n' +
        '\n' +
        '                                </div>\n' +
        '                                <div class="col-md-12">\n' +
        '\n' +
        '                                    <div class="form-group  form-inline">\n' +
        '\n' +
        '                                        <p>Your Offer Validity (Expires on) &nbsp;</p><input required ' +
        'type="text" class="form-control  input-sm" name="expiry_date" id="datePicker"\n' +

        '                                               placeholder="Your Offer Validity (Expires on): ">\n' +
        '\n' +
        '                                    </div>\n' +
        '\n' +
        '                                </div>\n' +
        '\n' +
        '\n' +

        '                                <div class="col-md-12">\n' +
        '\n' +
        '\n' +
        '                                    <div class="form-group  form-inline">\n' +
        '\n' +
        '                                        <p>Quantity  &nbsp;</p><input required ' +
        'type="number" ' +
        'class="form-control input-sm" name="buyer_original_quantity"\n' +
        '\n' +
        '                                               placeholder="Quantity you want to buy">\n' +
        '\n' +
        '                                    </div>\n' +
        '\n' +
        '                                </div>\n' +
        '\n' +
        '\n' +
        '                                <input type="hidden" name="currency" value="USD">\n' +
        '\n' +
        '\n' +
        '\n' +
        '                                <div class="col-md-12">\n' +
        '\n' +
        '\n' +
        '                                    <button type="submit" class="btn btn-black btn-block"\n' +
        '                                            id="robo_add_buyer_offer_btn">\n' +
        '                                        <i class="fa fa-rocket"></i> Commit My Offer/ Negotiate\n' +
        '                                    </button>\n' +
        '\n' +
        '                                </div>\n' +
        '\n' +
        '\n' +
        '                            </form>\n' +
        '\n' +
        '\n' +
        '\n' +
        '\n' +
        '\n' +
        '\n' +
        '\n' +
        '\n' +
        '                    </div>\n' +
        '\n' +
        '                </div>\n' +
        '            </div>\n' +
        '        </div>\n' +
        '\n' +
        '\n' +
        '\n         <div class="modal fade" id="modal_highest_offer" tabindex="-1" role="dialog"\n' +
        '             aria-hidden="true" >\n' +
        '            <div class="modal-dialog" role="document" style="right:0 !important;top:50px !important;">\n' +
        '                <div class="modal-content">\n' +
        '\n' +
        '                    <div class="modal-body">\n' +
        '\n' +
        '\n' +
        '\n' +
        '                        <form class="row" id="update_offer_form">\n' +
        '\n' +
        '                            <div class="col-md-12">\n' +
        '\n' +
        '                                <div class="form-group">\n' +
        '                                    <input type="text" class="form-control" id="highest_offer_robo" ' +
        'placeholder="Enter your final/highest offer">\n' +
        '                                </div>\n' +
        '\n' +
        '\n' +
        '                            </div>\n' +
        '\n' +
        '                            <div class="col-md-12">\n' +
        '\n' +
        '                                <div class="form-group">\n' +
        '\n' +
        '                                    <button type="submit" id="highest_offer_btn" class="form-control ' +
        'btn\n' +
        '                                    btn-primary">UPDATE OFFER</button>\n' +
        '\n' +
        '                                </div>\n' +
        '\n' +
        '\n' +
        '\n' +
        '                            </div>\n' +
        '\n' +
        '\n' +
        '                        </form>\n' +
        '\n' +
        '\n' +
        '\n' +
        '\n' +
        '                    </div>\n' +
        '\n' +
        '                </div>\n' +
        '            </div>\n' +
        '        </div>\n<div class="modal fade" id="modal_counter_offer" tabindex="-1" role="dialog"\n' +
        '             aria-hidden="true">\n' +
        '            <div class="modal-dialog robo-modal-dial" style="right:0 !important;top:50px !important;" ' +
        'role="document">\n' +
        '                <div class="modal-content">\n' +
        '\n' +
        '                    <div class="modal-body">\n' +
        '\n' +
        '\n' +
        '\n' +
        '                        <form class="row" id="init_offer_form" >\n' +
        '\n' +
        '                            <div class="col-md-9">\n' +
        '\n' +
        '                                <div class="form-group">\n' +
        '                                    <input type="text" class="form-control" id="robo_counter_price" ' +
        'placeholder="Please ' +
        'enter counter offer">\n' +
        '                                </div>\n' +
        '\n' +
        '\n' +
        '                            </div>\n' +
        '\n' +
        '                            <div class="col-md-3">\n' +
        '\n' +
        '                                <div class="form-group">\n' +
        '\n' +
        '                                    <button type="submit" id="send_counter_price_btn" ' +
        'class="form-control btn btn-primary" ' +
        ' ' +
        '>Send</button>\n' +
        '\n' +
        '                                </div>\n' +
        '\n' +
        '\n' +
        '\n' +
        '                            </div>\n' +
        '\n' +
        '\n' +
        '                        </form>\n' +
        '\n' +
        '\n' +
        '\n' +
        '\n' +
        '                    </div>\n' +
        '\n' +
        '                </div>\n' +
        '            </div>\n' +
        '        </div></div>'+
        '\n<style type="text/css">\n' +
        '        #msgWindow {\n' +
        '            margin-top: 20px;\n' +
        '        }\n' +
        '\n' +
        '        #msgs {\n' +
        '           \n' +
        '            min-height: 200px;\n' +
        '            display: flex;\n' +
        '            flex-flow: column nowrap;padding-top:40px !important;\n' +

        '            align-items: flex-start;\n' +
        '        }\n' +
        '\n' +
        '        .msg {\n' +
        '            \n' +
        '            border: 1px solid silver;\n' +
        '            padding: 3px 7px;\n' +
        '            display: inline-block;\n' +
        '            position: relative;font-size:15px !important;\n' +
        '            border-radius: 10px;top:-35px;margin-top:4px !important;\n' +
        '        }#chatbotrobo card-body{padding-left:4px !important;}\n' +
        '        #chatbotrobo .modal-dialog{margin-right:5px !important;top:0px !important;}#chatbotrobo .modal ' +
        '.modal-dialog .modal-content p{margin-top:10px !important;padding-bottom:0 !important;font-size:13px ' +
        '!important;line-height:1.5 ' +
        '!important;}#chatbotrobo .modal .modal-dialog .modal-content .form-control{font-size:13px !important;' +
        'line-height:15px !important;}' +
        '\n' +
        '        .msg.from {\n' +
        '            align-self: flex-end;\n' +

        '        }\n' +
        '        .msg.to {\n' +
        '            align-self: flex-start;\n' +
        '        }\n' +
        '        .msg.to::before {\n' +
        '            right: inherit;\n' +
        '            left: -20px;\n' +
        '        }\n' +
        '        .msg.to::after {\n' +
        '            right: inherit;\n' +
        '            left: -35px;\n' +
        '        }\n' +
        '        .msg.typing {\n' +
        '            color: silver;\n' +
        '        }\n' +
        '\n' +
        '        #msgForm input:focus, #msgForm button:focus {\n' +
        '            box-shadow: none;\n' +
        '        }\n' +
        '\n' +
        '    </style>\n');



    if (typeof $('#datePicker').datepicker  === 'function') {
        $('#datePicker').datepicker() ;
    } else {
        // if they dont exist
    }


    var hasDeal = null ;

    let $form = $("#msgForm"),
        $newMsg = $form.find("input"),
        $sendBtn = $form.find("button"),
        $counter_price_btn = $('#send_counter_price_btn') ,
        $feed = $("#msgs"),
        _wait = ms => new Promise((r, j) => setTimeout(r, ms)), // See [0]
        _secs = (a, b) => Math.floor(Math.random() * (b - a + 1)) + a;

    var count_progress = 1 ;
    // Define our send method.
    var textClass = null ;
    var _send = data => {
        // Send data to a new .msg


        let $msg = $('<div class="msg '+textClass+'"></div>'),
            { sender, typing } = data;
        if (sender !== "me") {
            $msg.addClass("to");
        } else {
            $msg.addClass("from");
        }

        $msg.addClass(textClass) ;
        textClass = null ;

        $msg.html(data.msg);
        if (typing) $msg.addClass("typing");
        if(data.msg.length > 1) {
            $msg.appendTo($feed);
        }
        $("#msgs").animate({ scrollTop: $('#msgs').prop("scrollHeight")}, 1000);

        // If sending was successful, clear the text field.
        $newMsg.val("");
        // And simulate a reply from our agent.
        if (sender === "me") setTimeout(_agentReply, 1000);
        if (typing) return $msg; // ref to new DOM .msg
    };

    var _autoSend = data => {
        // Send data to a new .msg
        let $msg = $('' +
            '<div style="margin-left:0px !important;"' +
            'class="msg"></div>'),
            { sender, typing } = data;
        if (sender !== "me") {
            $msg.addClass("to");
        } else {
            $msg.addClass("from");
        }
        $msg.addClass(textClass) ;
        textClass = null ;

        $msg.html( '<img src="https://market.robonegotiator.com/img/robo.png" width="40px" ' +
            '>&nbsp;'+data.msg);
        $msg.appendTo($feed);
        // If sending was successful, clear the text field.

        $("#msgs").animate({ scrollTop: $('#msgs').prop("scrollHeight")}, 1000);


    };






    var counterPrice = undefined ;
    var _agentReply = () => {
        let waitAfew = _wait(_secs(200, 300)),
            showAgentTyping = async () => {

                if(count_progress < 3) {
                    let $agentMsg = _send({msg: " ", typing: true, sender: false});
                    waitAfew.then(() => {

                        if (count_progress === 1) {

                            // $agentMsg.text();
                            textClass = 'text-danger' ;
                            let theEnvelope = {
                                msg:"Let’s begin negotiation with your " +
                                    "counter-offer you can " +
                                    "commit to",

                                sender: false };

                            _autoSend(theEnvelope);

                            setTimeout(function(){
                                    $('#modal_counter_offer').modal('show')
                                }
                                , 2000);

                            count_progress++;
                        } else if (count_progress === 2) {


                            if (counterPrice !== undefined) {

                                textClass = 'text-success' ;

                                let theEnvelope = {
                                    msg: "Sending your initial offer <b> - $"+counterPrice+" </b>",
                                    sender: false };

                                _autoSend(theEnvelope);
                                var instantDealCheck = undefined;
                                $.ajax("https://market.robonegotiator" +
                                    ".com/instant-deal-check?api_key="+api_key+"&upc_product_code=" +
                                    $product_code +
                                    '&seller_email' +
                                    '=' + $seller_email,
                                    function (data) {
                                        console.log(data);

                                    }).done(function (data) {
                                    console.log(data);

                                    instantDealCheck = data;
                                    if (instantDealCheck.deal_exist === 'no') {
                                        // $agentMsg.text("");


                                        textClass = 'text-danger' ;

                                        let theEnvelope = {
                                            msg: "We checked our database. Unfortunately, there is no deal from any seller.  Would you like to provide your offer so we can find a seller for you? ",
                                            sender: false };

                                        _autoSend(theEnvelope);


                                        setTimeout(function(){
                                                $('#modal_find_seller').modal('show')
                                            }
                                            , 2500);
                                        //$('#').modal('show');

                                    } else if(instantDealCheck.deal_exist === 'yes' &&
                                        instantDealCheck.same_seller === 'no' ){

                                        hasDeal = true ;

                                        textClass = 'text-danger' ;
                                        // $agentMsg.text();
                                        let theEnvelope = {
                                            msg: "We don’t have any deal from this seller, but we can match you with other potential sellers meeting your offer. Would you like RoboNegotiator to find a seller for you? We will find, match and introduce to you by email and text#. ",
                                            sender: false };

                                        _autoSend(theEnvelope);


                                        setTimeout(function(){
                                                $('#modal_find_seller').modal('show')
                                            }
                                            , 2500);
                                        // $('#').modal('show');



                                    }else if(instantDealCheck.deal_exist === 'yes' &&
                                        instantDealCheck.same_seller === 'yes' ){

                                        hasDeal = true ;
                                        textClass = 'text-danger' ;
                                        // $agentMsg.text();
                                        let theEnvelope = {
                                            msg: "Good News! We have a special deal from this seller.  Please enter additional details. ",
                                            sender: false };

                                        _autoSend(theEnvelope);

                                        setTimeout(function(){
                                                $('#modal_find_seller_yes').modal('show')
                                            }
                                            , 2500);
                                        //  $('#').modal('show');



                                    }
                                })
                                    .fail(function () {
                                        console.log("error");
                                    })
                                    .always(function () {
                                        console.log("complete");
                                    });


                            }


                        }

                        $agentMsg.removeClass("typing");


                    });

                }

                $("#msgs").animate({ scrollTop: $('#msgs').prop("scrollHeight")}, 1000);


            };
        waitAfew.then(showAgentTyping());
    };

    _agentReply() ;

    // Define event handlers: Hitting Enter or Send should send the form.
    $newMsg.on("keypress", function (e) {
        // @TODO: Allow [mod] + [enter] to expand field & insert a <BR>
        if (e.which === 13) {
            // Stop the prop
            e.stopPropagation();e.preventDefault();
            // Wrap the msg and send!
            let theEnvelope = {
                msg: $newMsg.val(),
                sender: "me" };

            return _send(theEnvelope);
        } else {
            // goggles
        }
    });

    var buyer_offer_form = $('#robo_add_buyer_offer_form') ;

    var buyer_offer_request_id = null ;

    var checkDeal = false ;

    var add_buyer_offer_data = null ;

    var final_offer_submitted = 0 ;
    $('#update_offer_form').on("submit",function (e) {
        e.preventDefault();
        counterPrice = $('#highest_offer_robo').val() ;
        add_buyer_offer_data = {
            'api_key' : api_key ,
            'request_id' : buyer_offer_request_id ,
            'buyer_email': buyer_offer_form.find('input[name="buyer_email"]').val() ,
            'buyer_phone' : buyer_offer_form.find('input[name="buyer_phone"]').val() ,
            'buyer_original_quantity' : buyer_offer_form.find('input[name="buyer_original_quantity"]').val() ,

            'buyer_offer_price' : counterPrice ,

            'buyer_negotiation_mode' : $negotiation_mode ,

            'buyer_highest_offer_price' : counterPrice ,

            'upc_product_code' : $product_code ,

            'buyer_currency' : 'USD' ,

            'buyer_zip' :  buyer_offer_form.find('input[name="buyer_zip"]').val() ,

            'expiry_date': buyer_offer_form.find('input[name="expiry_date"]').val() ,
            'json_result' : 1

        } ;

        final_offer_submitted++ ;
        send_buyer_offer();

    });


    buyer_offer_form.on("submit" , function (e) {

        e.preventDefault();

        add_buyer_offer_data = {
            'api_key' : api_key ,
            'request_id' : buyer_offer_request_id ,
            'buyer_email': buyer_offer_form.find('input[name="buyer_email"]').val() ,
            'buyer_phone' : buyer_offer_form.find('input[name="buyer_phone"]').val() ,
            'buyer_original_quantity' : buyer_offer_form.find('input[name="buyer_original_quantity"]').val() ,

            'buyer_offer_price' : counterPrice ,

            'buyer_negotiation_mode' : $negotiation_mode ,

            'buyer_highest_offer_price' : counterPrice ,

            'upc_product_code' : $product_code ,

            'buyer_currency' : 'USD' ,

            'buyer_zip' :  buyer_offer_form.find('input[name="buyer_zip"]').val() ,

            'expiry_date': buyer_offer_form.find('input[name="expiry_date"]').val() ,
            'json_result' : 1

        } ;

        send_buyer_offer() ;







    });

    var final_message = undefined ;

    var need_update = undefined ;

    var preferences = undefined ;

    var closedDeal = undefined ;

    var closedDealEmail = undefined ;

    var closedDealFinalAmount = undefined ;

    function send_buyer_offer(){
        console.log(add_buyer_offer_data) ;

        textClass = 'text-success' ;

        let theEnvelope = {
            msg: 'Sending your details and offer to RoboNegotiator for further matching.',
            sender: false };

        _autoSend(theEnvelope);

        $('#modal_find_seller_yes').modal('hide') ;

        $('#modal_highest_offer').modal('hide');

        $.post("https://market.robonegotiator.com/add-buyer-offer",
            add_buyer_offer_data,
            function(data, status){
                console.log(data) ;

                buyer_offer_request_id = data.request_id ;

                if(hasDeal === null) {
                    textClass = 'text-danger' ;

                    $mesg = 'We have sent your offer to RoboNegotiator. You will hear directly from RoboNegotiator. You can close this session.' ;


                    let theEnvelope = {
                        msg: $mesg ,
                        sender: false
                    };

                    _autoSend(theEnvelope);
                    setTimeout(closeChatBotRobo , 20000) ;


                }
                else if(data.success !== undefined && data.success === true) {

                    textClass = 'text-danger' ;

                    if(final_offer_submitted < 1) {
                        $mesg = 'Your offer submitted to RoboNegotiator. Please wait. It may take a while. ' +
                            'Meanwhile please let us know your preferences.';

                        setTimeout(function(){
                                $('#modal_time_pass_1').modal('show')
                            }
                            , 100);
                    }else {
                        $mesg = 'Thanks for your updated offer.  We are hopeful seller will come down OR your new offer may close the deal. Please wait.  Checking…' ;
                    }

                    let theEnvelope = {
                        msg: $mesg ,
                        sender: false
                    };

                    _autoSend(theEnvelope);




                    checkDeal = true ;





                    // $('#').modal('show') ;
                    setTimeout(getDealStatus , 1000) ;



                }

                else if(data.success !== undefined && data.success === false ) {

                    if(data.errors !== undefined){
                        $.each( data.errors, function( index, value ){
                            if(value[0] !== undefined){
                                console.log(value[0]) ;
                                textClass = 'text-danger' ;

                                let theErr = {
                                    msg: value[0],
                                    sender: false };

                                _autoSend(theErr);
                            }
                        });

                        setTimeout(function () {
                            $('#modal_find_seller_yes').modal('show');
                        } , 3000);
                    }
                }


            });

        var countStat = 1 ;
        function getDealStatus(){

            $.get("https://market.robonegotiator.com/get-deal-status?api_key="+api_key+"&upc_product_code=" +
                $product_code +
                "&request_id=" + buyer_offer_request_id,


                function (data2, status) {


                    console.log('getting status');
                    console.log(data2);

                    if (data2.message !== undefined) {
                        console.log(data2.message);

                        if (data2.message !== undefined) {


                            if (data2.message === 'failed') {



                                textClass = 'text-danger' ;

                                final_message = {
                                    msg: '<span class="text-danger">We have sent your offer to RoboNegotiator. You will hear ' +
                                        'directly from RoboNegotiator. You can close this session.</span>',
                                    sender: false
                                };



                                if(preferences !== undefined) {

                                    _autoSend(final_message) ;

                                    setTimeout(closeChatBotRobo , 20000) ;

                                }



                            }
                            else if (data2.message === 'too_low') {


                                textClass = 'text-danger' ;
                                final_message = {
                                    msg: '<span class="text-danger">Your offer is too low for further ' +
                                        'negotiation. Thanks ' +
                                        'for using ' +
                                        'RoboNegotiator. Goodbye!</span>',
                                    sender: false
                                };




                                if(preferences !== undefined) {

                                    _autoSend(final_message) ;

                                    setTimeout(closeChatBotRobo , 20000) ;

                                }



                            }


                            else if (data2.message === 'deal_closed') {

                                finResp();

                                function finResp() {




                                    textClass = 'text-danger';

                                    getFinalAmount();





                                }

                            } else if (data2.message === 'deal_closed') {


                                textClass = 'text-danger' ;

                                final_message = {
                                    msg: '<span class="text-danger">Congratulations!! Your offer has been accepted. Contact seller at: <b>'+
                                        closedDeal.closed_deal.seller_email
                                        +'</b> with your purchase  offer # '+buyer_offer_request_id+' and final ' +
                                        'negotiated ' +
                                        'amount:  <b>' +
                                        closedDeal.closed_deal.final_amount+' </b></span>' ,
                                    sender: false
                                };

                                if(preferences !== undefined) {

                                    _autoSend(final_message) ;

                                    setTimeout(closeChatBotRobo , 20000) ;

                                }


                            } else if (data2.message === 'negotiation_with_no_mode') {

                                if(final_offer_submitted < 1) {

                                    need_update = 1 ;
                                    textClass = 'text-danger' ;
                                    final_message = {
                                        msg: '<span class="text-danger">Your offer is close to seller’s deal.  We' +
                                            ' would like you to give your final/highest offer so we can match ' +
                                            'with seller’s lowest offer</span>',
                                        sender: false
                                    };




                                    if(preferences !== undefined) {

                                        _autoSend(final_message) ;

                                        setTimeout(function () {
                                            $('#modal_highest_offer').modal('show') ;
                                        } , 2000) ;

                                    }

                                    // $('#').modal('show');


                                } else {


                                    need_update  = undefined ;
                                    textClass = 'text-danger' ;
                                    $exit_msg = '<span class="text-danger">Your offer is lower than seller’s ' +
                                        'final deal amount. We will stop negotiation. Thanks for using ' +
                                        'RoboNegotiation. Goodbye! !</span>';

                                    final_message = {
                                        msg: $exit_msg, sender: false
                                    };


                                    if(preferences !== undefined) {

                                        _autoSend(final_message) ;

                                        setTimeout(closeChatBotRobo , 20000) ;

                                    }

                                }


                            }


                        }

                    }




                });

        }




    }

    function save_buyer_payment($paymentObj){

        $paymentObj.api_key = api_key ;
        textClass = 'text-success' ;

        let theEnvelope = {
            msg: 'Your payment of '+$paymentObj.amount+' USD has been successful ! We have secured the deal for ' +
                'you , thank you !',
            sender: false };

        // _autoSend(theEnvelope);



        $.post("https://market.robonegotiator.com/save-payment",
            $paymentObj,
            function(data, status){
                console.log(data) ;



                _autoSend(theEnvelope);


                setTimeout(closeChatBotRobo , 20000) ;

            });




    }

    var agreedAmount = undefined ;

    function getFinalAmount(){


        setTimeout( getAmount , 30000) ;
        function getAmount() {
            $.get("https://market.robonegotiator.com/getDealStatus?api_key="+api_key+"&upc_product_code=" +
                $product_code +
                "&request_id=" + buyer_offer_request_id,


                function (data, status) {


                    console.log('getting final amount');
                    console.log(data);
                    console.log('closed deal...');
                    // console.log(data.closed_deal[0]);

                    if(data.closed_deal === undefined){
                        getAmount();
                    }

                    if(data.closed_deal[0] !== undefined){

                        closedDealEmail = data.closed_deal[0].seller_email;

                    } else {
                        closedDealEmail = $seller_email;
                    }

                    if(data.closed_deal[0] !== undefined){

                        closedDealFinalAmount = data.closed_deal[0].final_amount;

                    } else {
                        closedDealFinalAmount = undefined;
                    }



                    final_message = {
                        msg: '<span class="text-danger">Congratulations!! Your offer has been accepted. Contact seller at: <b>' +
                            closedDealEmail
                            + '</b> with your purchase offer #' + buyer_offer_request_id + ' and final ' +
                            'negotiated ' +
                            'amount: <b> $' +
                            closedDealFinalAmount + ' </b></span>',
                        sender: false
                    };


                    if (preferences !== undefined) {

                        _autoSend(final_message);



                        agreedAmount = $('#payment_amount_agreed').val() ;

                        agreedAmount = parseInt(agreedAmount) ;

                        if(agreedAmount !== 0) {

                            if(agreedAmount === -1){
                                agreedAmount = closedDealFinalAmount ;
                            }
                            var depositMessage = {
                                msg: '<span class="text-success">Please <b>pay $'+agreedAmount+' deposit</b> to lock this ' +
                                    'special ' +
                                    'deal ' +
                                    'and to claim this special price deal.  Seller will send instructions for ' +
                                    'remaining balance. RoboNegotiator will automatically refund this deposit if seller doesn’t offer you a special deal</span>',
                                sender: false
                            };


                            _autoSend(depositMessage);

                            setTimeout(
                                function () {
                                    $('#modal_payment_confirm').modal('show');

                                    executePaypalPayment(agreedAmount);

                                }, 3000
                            )

                        } else {
                            setTimeout(closeChatBotRobo, 20000);
                        }


                    }


                });

        }

    }



    function executePaypalPayment(amount){


        paypal.Buttons({

            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: amount
                        }
                    }]
                });
            },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    // Show a success message to the buyer
                    //alert('Transaction completed by ' + details.payer.name.given_name + '!');

                    $('#modal_payment_confirm').modal('hide') ;
                    let theEnvelope = {
                        msg: 'Transaction completed by ' + details.payer.name.given_name + '!',
                        sender: false };

                    _autoSend(theEnvelope);


                    console.log(data) ;

                    var paymentObject = {
                        'buyer_email' : add_buyer_offer_data.buyer_email ,
                        'upc_product_code' : product_code ,
                        'payment_id' : details.id  ,
                        'payer_id' : details.payer.payer_id  ,
                        'payment_token' : details.id  ,
                        'transaction_id' : details.id   ,
                        'amount' : amount ,
                    };

                    save_buyer_payment(paymentObject) ;


                });
            }


        }).render('#robo-paypal-btn');
    }




    $('#pre_form_1').on('submit',function (e) {

        e.preventDefault();
        preferences = 1 ;
        $('#modal_time_pass_1').modal('hide') ;


        let theEnvelope = {
            msg: '<span class="text-success">Thanks for your answers.  RoboNegotiator is still checking with a ' +
                'seller.</span>',
            sender: false };

        _autoSend(theEnvelope);

        if(final_message !== undefined){
            _autoSend(final_message);

            if(need_update !== undefined ){


                setTimeout(function(){
                        $('#modal_highest_offer').modal('show')
                    }
                    , 2500);
            } else {

                setTimeout(closeChatBotRobo , 20000) ;

            }

        }


    });

    $('#robo_preference_btn2').click(function () {
        $('#modal_pass_time2').modal('hide') ;

        textClass = 'text-success' ;
        let theEnvelope = {
            msg: 'Thanks for your answers.  RoboNegotiator is checking with a seller. We would let you know the outcome ASAP.',
            sender: false };

        _autoSend(theEnvelope);



    });

    $('#find_seller_btn').on("click" , function (e) {
        var find_seller_user_choice =   $('input[name=robo_find_seller]:checked', '#robo_find_seller_form').val() ;

        console.log(find_seller_user_choice) ;

        count_progress++ ;

        if(find_seller_user_choice === 'yes') {


            $('#modal_find_seller_yes').modal('show') ;

        } else {
            let theEnvelope = {
                msg: 'Thank you !',
                sender: false };

            _autoSend(theEnvelope);
            setTimeout(closeChatBotRobo , 20000) ;


        }

        $('#modal_find_seller').modal('hide');

    });

    $('#init_offer_form').on("submit", function (e) {
        // Stop the prop
        e.stopPropagation();e.preventDefault();
        $('#modal_counter_offer').modal('hide');
        // Wrap the msg and send!
        e.stopPropagation();e.preventDefault();
        // Wrap the msg and send!
        let theEnvelope = {
            msg: '',
            sender: "me" };

        counterPrice = $('#robo_counter_price').val() ;
        return _send(theEnvelope);

    });


    $sendBtn.on("click", function (e) {
        // Stop the prop
        e.stopPropagation();e.preventDefault();
        // Wrap the msg and send!
        let theEnvelope = {
            msg: $newMsg.val(),
            sender: "me" };

        return _send(theEnvelope);

    });


}



function closeChatBotRobo() {

    $('#modal_counter_offer').remove();
    $('#modal_find_seller').remove();
    $('#modal_find_seller_yes').remove();

    $('#modal_highest_offer').remove();
    $('#modal_pass_time').remove();
    $('#chatbotrobo').remove() ;


    //triggerNegotiationBar(product_code , seller_email) ;
}