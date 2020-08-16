
document.getElementsByTagName("head")[0].insertAdjacentHTML(
    "beforeend",
    "<link rel='stylesheet' href='https://robonegotiator.com/css/plugin/robo-plugin.css' />");

var imported = document.createElement('script');
imported.src = 'https://www.paypal.com/sdk/js?client-id=sb&currency=USD';
document.head.appendChild(imported);

var product_code , seller_email ;

if(typeof ROBO_UPC_CODE === "undefined" ) {
    if (typeof ROBO_PRODUCT_NAME_IDENTIFIER_TYPE !== "undefined") {
        if (typeof ROBO_PRODUCT_NAME_IDENTIFIER_NAME !== "undefined") {

            if (ROBO_PRODUCT_NAME_IDENTIFIER_TYPE === 'class') {
                var ROBO_UPC_CODE = $('.' + ROBO_PRODUCT_NAME_IDENTIFIER_NAME).text();
            } else if (ROBO_PRODUCT_NAME_IDENTIFIER_TYPE === 'id') {
                var ROBO_UPC_CODE = $('#' + ROBO_PRODUCT_NAME_IDENTIFIER_NAME).text();
            }

        }
    } else {
        ROBO_UPC_CODE = window.location.href ;
    }
}


if(typeof ADD_TO_CART_BTN_IDENTIFIER_TYPE !== "undefined"){
if (typeof ADD_TO_CART_BTN_IDENTIFIER_NAME !== "undefined") {
    if(ADD_TO_CART_BTN_IDENTIFIER_TYPE === 'class'){
        var addCart = document.getElementsByClassName(ADD_TO_CART_BTN_IDENTIFIER_NAME)[0];

    }else {
        var addCart = document.getElementById(ADD_TO_CART_BTN_IDENTIFIER_NAME);

    }
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

    var newButton = document.createElement("button");
    newButton.setAttribute('type','button');
    newButton.setAttribute('id','robonegotiator_btn_xyz');
    newButton.setAttribute('class',ROBO_BTN_CLASS);
    newButton.setAttribute('style',ROBO_BTN_STYLE);
    newButton.innerHTML = ROBO_BTN_CUSTOM_TEXT ;


    console.log(addCart) ;
    function insertAfter(el, referenceNode) {
        referenceNode.parentNode.insertBefore(el, referenceNode.nextSibling);
    }

    insertAfter(newButton, addCart);



    if(typeof ROBO_API_KEY !== 'undefined' && typeof ROBO_UPC_CODE !== 'undefined' && typeof ROBO_SELLER_EMAIL !==
        'undefined' && typeof ROBO_NEGOTIATION_MODE !== 'undefined' ){


        console.log(ROBO_UPC_CODE);

        var robonegotiator_btn_xyz = document.getElementById('robonegotiator_btn_xyz');
        robonegotiator_btn_xyz.onclick = function (e) {

            triggerNegotiationBar(ROBO_API_KEY ,ROBO_UPC_CODE ,ROBO_SELLER_EMAIL, ROBO_NEGOTIATION_MODE ) ;
        };


    }

}

}

var chatBotUsed = false ;

var api_key  , negotiation_mode ;
var $counter_price_btn = null,
    $feed = null,
    _wait = null , // See [0]
    _secs = null ;

var count_progress = 1;
var html_elements =
    '    <div class="robo-container" id="chatbotrobo">\n' +
    '        <div class="robo-row">\n' +
    '            <div class="robo-offset-md-8 robo-col-md-4 msg-window-container robo-fixed-bottom">\n' +
    '                <div class="robo-card" id="msgWindow">\n' +
    '                    <div class="robo-card-header"><span class="robo-card-title robo-float-left"><img' +
    ' src="https://robonegotiator.com/img/CircleLogo.png" width="50px">Chat' +
    ' with ' +
    'Robonegotiator ' +
    ' ' +
    '</span></div>\n' +
    '                    <div class="robo-card-body" id="msgs" style="height:350px !important;' +
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
    '                    <div class="robo-card-footer">\n' +
    '                        <div class="input-group" id="msgFormh" data-sender="me">\n' +
    '                          <center> <button onclick="closeChatBotRobo()" class="robo-btn robo-btn-primary robo-btn-sm ' +
    '">End Chat</button></center>\n' +
    '                        </div>\n' +
    '                    </div>\n' +
    '                </div>\n' +
    '            </div>\n' +
    '        </div>\n' +
    '      <div class="robo-modal robo-fade" id="modal_pass_time2" tabindex="-1" role="dialog"\n' +
    '             aria-hidden="true">\n' +
    '            <div class="robo-modal-dialog" role="document">\n' +
    '                <div class="robo-modal-content">\n' +
    '\n' +
    '                    <div class="robo-modal-body">\n' +
    '\n' +
    '\n' +
    '\n' +
    '                        <form class="robo-row">\n' +
    '\n' +
    '                            <div class="robo-col-md-12">\n' +
    '                                <p>We are checking with seller.. Meanwhile can we know your preferences for following things </p>\n' +
    '                                <br/><p>Once seller agrees to your price, how would you claim and pay for this product at a new price? </p> <select class="form-control" style="display: block !important;">\n' +
    '                                        <option>Let seller charge me directly</option>\n' +
    '                                        <option>RoboNegotiator reserves the product by charging me directly.</option>\n' +
    '                                       \n' +
    '\n' +
    '\n' +
    '                                    </select><br/>\n' +
    '                                <p> Seller may want you to deposit $25 before agreeing to your counter-offer. Are you ready for paying this deposit? </p>\n' +
    '                                <div class="robo-custom-control robo-custom-radio">\n' +
    '                                    <input type="radio" class="robo-custom-control-input" id="deposit_yes"\n' +
    '                                           name="d_yes"\n' +
    '                                           value="yes">\n' +
    '                                    <label class="robo-custom-control-label" for="deposit_yes">Yes</label>\n' +
    '                                </div>\n' +
    '                                <div class="robo-custom-control custom-radio">\n' +
    '                                    <input type="radio" class="robo-custom-control-input" id="deposit_no"\n' +
    '                                           name="d_yes"\n' +
    '                                           value="no">\n' +
    '                                    <label class="robo-custom-control-label" for="deposit_no">No</label>\n' +
    '                                </div>\n' +
    '\n' +
    '\n' +
    '                                <br/>\n' +
    '                                \n' +
    '                                \n' +
    '\n' +
    '                            </div>\n' +
    '                            <div class="robo-col-md-12">\n' +
    '\n' +
    '                                <div class="robo-form-group">\n' +
    '\n' +
    '                                    <button id="robo_preference_btn2"  type="button" class=" robo-btn ' +
    'robo-btn-primary\n' +
    '                                    robo-float-right">Submit</button>\n' +
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
    '                <div class="robo-modal fade" id="modal_time_pass_1" tabindex="-1" role="dialog"\n' +
    '             aria-hidden="true">\n' +
    '            <div class="robo-modal-dialog" role="document">\n' +
    '                <div class="robo-modal-content">\n' +
    '\n' +
    '                    <div class="robo-modal-body">\n' +
    '\n' +
    '\n' +
    '\n' +
    '                        <form class="robo-row" id="pre_form_1" onsubmit="pre_form_1onsubmit(event)">\n' +
    '\n' +
    '                            <div class="robo-col-md-12">\n' +
    '\n' +
    '                                <p>We are checking with seller.. Meanwhile can we know your preferences for following things </p>\n' +
    '                                <div class="robo-form-group">\n' +
    '                                    <label>Choose your option to secure this deal</label>\n' +
    '                                    <select id="payment_amount_agreed" class="robo-form-control" ' +
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
    '                                <div class="robo-form-group">\n' +
    '                                    <label>Give us your comments how you felt about this negotiation process and how can we improve it?  </label>\n' +
    '\n' +
    '                                    <input type="text" class="form-control">\n' +
    '                                </div>\n' +
    '\n' +
    '\n' +
    '\n' +
    '                            </div>\n' +
    '\n' +
    '                            <div class="robo-col-md-12">\n' +
    '\n' +
    '                                <div class="robo-form-group">\n' +
    '\n' +
    '                                    <button type="submit" id="robo_preference_btn1" class="robo-form-control ' +
    'robo-btn\n' +
    '                                    robo-btn-primary">Submit</button>\n' +
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
    '        </div><div class="robo-modal robo-fade" id="modal_find_seller" tabindex="-1" role="dialog"\n' +
    '             aria-hidden="true"  style="right:0 !important;top:200px !important;">\n' +
    '            <div class="robo-modal-dialog" role="document">\n' +
    '                <div class="robo-modal-content">\n' +
    '\n' +
    '                    <div class="robo-modal-body">\n' +
    '\n' +
    '\n' +
    '\n' +
    '                        <div class="robo-row">\n' +
    '\n' +
    '                            <form id="robo_find_seller_form">\n' +
    '                                <div class="robo-col-md-12">\n' +
    '                                    <p>There is no deal from any seller yet. Would you like to provide your offer so we can find a seller for you? </p>\n' +
    '                                    <br/>\n' +
    '                                <div class="robo-custom-control custom-radio">\n' +
    '                                    <input type="radio" class="robo-custom-control-input" id="find_seller_yes"\n' +
    '                                           name="robo_find_seller"\n' +
    '                                           value="yes">\n' +
    '                                    <label class="robo-custom-control-label" for="find_seller_yes">Yes</label>\n' +
    '                                </div>\n' +
    '                                <div class="robo-custom-control robo-custom-radio">\n' +
    '                                    <input type="radio" class="robo-custom-control-input" id="find_seller_no"\n' +
    '                                           name="robo_find_seller"\n' +
    '                                           value="no">\n' +
    '                                    <label class="robo-custom-control-label" for="find_seller_no">No</label>\n' +
    '                                </div>\n' +
    '                                </div>\n' +
    '                                <div class="col-md-12">\n' +
    '\n' +
    '                                    <div class="form-group">\n' +
    '\n' +
    '                                        <button type="button" class=" robo-btn robo-btn-primary robo-float-right" id="find_seller_btn" onclick="find_seller_btnonclick(event)">Submit</button>\n' +
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
    '        <div class="robo-modal robo-fade" id="modal_find_seller_yes" tabindex="-1" role="dialog"\n' +
    '             aria-hidden="true"  >\n' +
    '            <div class="robo-modal-dialog  robo-modal-bottom-left" role="document">\n' +
    '                <div class="robo-modal-content">\n' +
    '\n' +
    '                    <div class="robo-modal-body">\n' +
    '\n' +
    '\n' +
    '\n' +
    '\n' +
    '                            <form class="robo-row" id="robo_add_buyer_offer_form" onsubmit="submitBuyerOfferForm(event)">\n' +
    '\n' +
    '\n' +

    '                                <div class="robo-col-md-12">\n' +
    '\n' +
    '\n' +
    '                                    <div class="robo-form-group robo-form-inline">\n' +
    '\n' +
    '                                        <p>Please Enter Your Name &nbsp;</p><input required type="text" ' +
    'class="robo-form-control  robo-input-sm"' +
    ' ' +
    'name="buyer_name"\n' +
    '                                               id="buyer_name"\n' +
    '                                               placeholder="Your Name" >\n' +
    '\n' +
    '                                    </div>\n' +
    '\n' +
    '                                </div>' +
    '<div class="robo-col-md-12">\n' +
    '\n' +
    '\n' +
    '                                    <div class="robo-form-group  robo-form-inline">\n' +
    '\n' +
    '                                        <p>Please Enter Your Email &nbsp;</p><input required ' +
    'type="email" ' +
    'class="robo-form-control  robo-input-sm" name="buyer_email"\n' +
    '                                               id="buyer_email"\n' +
    '                                               placeholder="Your Email" >\n' +
    '\n' +
    '                                    </div>\n' +
    '\n' +
    '                                </div>\n' +
    '                                <div class="robo-col-md-12">\n' +
    '\n' +
    '                                    <div class="robo-form-group  robo-form-inline">\n' +
    '\n' +
    '                                        <p>Please Enter Your Phone Number &nbsp;</p><input required ' +
    'type="text"' +
    ' ' +
    'class="robo-form-control  robo-input-sm" name="buyer_phone"\n' +
    '                                               placeholder="Your Phone Number "\n' +
    '                                               id="buyer_phone" >\n' +
    '\n' +
    '                                    </div>\n' +
    '\n' +
    '                                </div>\n' +
    '\n' +
    '                                <div class="robo-col-md-12">\n' +
    '\n' +
    '\n' +
    '                                    <div class="robo-form-group  robo-form-inline">\n' +
    '\n' +
    '                                        <p>Your Location/Zip &nbsp;</p><input required type="text" ' +
    'class="robo-form-control  robo-input-sm" name="buyer_zip" id="buyer_zip"\n' +
    '                                               placeholder="Your\n' +
    '  Location/Zip  ">\n' +
    '\n' +
    '                                    </div>\n' +
    '\n' +
    '                                </div>\n' +
    '                                <div class="robo-col-md-12">\n' +
    '\n' +
    '                                    <div class="robo-form-group  robo-form-inline">\n' +
    '\n' +
    '                                        <p>Your Offer Validity (Expires on) &nbsp;</p><input required ' +
    'type="text" class="robo-form-control  robo-input-sm" name="expiry_date" id="datePicker"\n' +

    '                                               placeholder="Your Offer Validity (Expires on): ">\n' +
    '\n' +
    '                                    </div>\n' +
    '\n' +
    '                                </div>\n' +
    '\n' +
    '\n' +

    '                                <div class="robo-col-md-12">\n' +
    '\n' +
    '\n' +
    '                                    <div class="robo-form-group  robo-form-inline">\n' +
    '\n' +
    '                                        <p>Quantity  &nbsp;</p><input required ' +
    'type="number" ' +
    'class="robo-form-control robo-input-sm" name="buyer_original_quantity"\n' +
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
    '                                <div class="robo-col-md-12">\n' +
    '\n' +
    '\n' +
    '                                    <button type="submit" class="robo-btn robo-btn-primary robo-btn-block"\n' +
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
    '\n         <div class="robo-modal robo-fade" id="modal_highest_offer" tabindex="-1" role="dialog"\n' +
    '             aria-hidden="true" >\n' +
    '            <div class="robo-modal-dialog" role="document" style="right:0 !important;top:50px !important;">\n' +
    '                <div class="robo-modal-content">\n' +
    '\n' +
    '                    <div class="robo-modal-body">\n' +
    '\n' +
    '\n' +
    '\n' +
    '                        <form class="robo-row" id="update_offer_form">\n' +
    '\n' +
    '                            <div class="robo-col-md-12">\n' +
    '\n' +
    '                                <div class="robo-form-group">\n' +
    '                                    <input type="text" class="robo-form-control" id="highest_offer_robo" ' +
    'placeholder="Enter your final/highest offer">\n' +
    '                                </div>\n' +
    '\n' +
    '\n' +
    '                            </div>\n' +
    '\n' +
    '                            <div class="robo-col-md-12">\n' +
    '\n' +
    '                                <div class="robo-form-group">\n' +
    '\n' +
    '                                    <button type="submit" id="highest_offer_btn" class="robo-form-control ' +
    'robo-btn\n' +
    '                                    robo-btn-primary">UPDATE OFFER</button>\n' +
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
    '        </div>\n<div class="robo-modal fade" id="modal_counter_offer" tabindex="-1" role="dialog"\n' +
    '             aria-hidden="true">\n' +
    '            <div class="robo-modal-dialog robo-modal-dial" style="right:0 !important;top:50px !important;" ' +
    'role="document">\n' +
    '                <div class="robo-modal-content">\n' +
    '\n' +
    '                    <div class="robo-modal-body">\n' +
    '\n' +
    '\n' +
    '\n' +
    '                        <form class="robo-row" id="init_offer_form" onsubmit="formTestsubmit(event)"   >\n' +
    '\n' +
    '                            <div class="robo-col-md-9">\n' +
    '\n' +
    '                                <div class="robo-form-group">\n' +
    '                                    <input type="text" class="robo-form-control" id="robo_counter_price" ' +
    'placeholder="Please ' +
    'enter counter offer">\n' +
    '                                </div>\n' +
    '\n' +
    '\n' +
    '                            </div>\n' +
    '\n' +
    '                            <div class="robo-col-md-3">\n' +
    '\n' +
    '                                <div class="robo-form-group">\n' +
    '\n' +
    '                                    <button type="submit" id="send_counter_price_btn" ' +
    'class="form-control robo-btn robo-btn-primary" ' +
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
    '        </div></div>' +
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
    'line-height:15px !important;}.robo-form-group {\n' +
    '     margin-bottom: 12px !important; \n' +
    '}' +
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
    '        }.robo-display{display:block !important;}.robo-modal-focus {\n' +
    '    position: fixed;\n' +
    '    top: 0;\n' +
    '    left: 0;\n' +
    '    z-index: 1050;\n' +
    '    display: block !important;\n' +
    '    width: 100%;\n' +
    '    height: 100%;\n' +
    '    overflow: hidden;\n' +
    '    outline: 0;background-color: rgba(0,0,0,0.5)\n' +
    '}.robo-modal-dialog, .robo-modal-dial{margin-right:0 !important ;font-size:15px !important;}.robo-modal-dialog' +
    ' input,.robo-modal-dialog select ,.robo-modal-dialog .robo-form-control {font-size:13px !important;height:40px' +
    ' !important}robo-modal-dialog .robo-form-group {padding:0 !important;padding-bottom:12px' +
    ' !important;}.robo-overlay{\n' +
    '  position: absolute;\n' +
    '  top: 0;\n' +
    '  left: 0;\n' +
    '  width: 100%;\n' +
    '  height: 100%;\n' +
    '  z-index: 10;\n' +
    '  background-color: rgba(0,0,0,0.5); /*dim the background*/\n' +
    '}\n' +
    '\n' +
    '    </style>\n';


var msg_div = null ;

function triggerNegotiationBar($api_key , $product_code , $seller_email , $negotiation_mode = 'auto' ) {

    api_key = $api_key;

    chatBotUsed = true;
    product_code = $product_code;
    seller_email = $seller_email;
    negotiation_mode = $negotiation_mode;




    //  $('#datePicker').datepicker() ;




    var div = document.createElement('div');
    document.getElementsByTagName("body")[0].appendChild(div);

    div.innerHTML = html_elements;


    $counter_price_btn = document.getElementById('send_counter_price_btn');
    $feed = document.getElementById("msgs");
    _wait = ms => new Promise((r, j) => setTimeout(r, ms)); // See [0]
    _secs = (a, b) => Math.floor(Math.random() * (b - a + 1)) + a;

    count_progress = 1;
    msg_div = document.getElementById('msgs');

    _agentReply();

}


var hasDeal = null;

$counter_price_btn = document.getElementById('send_counter_price_btn'),
    $feed = document.getElementById("msgs"),
    _wait = ms => new Promise((r, j) => setTimeout(r, ms)), // See [0]
    _secs = (a, b) => Math.floor(Math.random() * (b - a + 1)) + a;

count_progress = 1;
// Define our send method.
var textClass = null;
function _send (data) {


    // Send data to a new .msg


    let msg = document.createElement('div'),
        {sender, typing} = data;
    if (sender !== "me") {
        msg.classList.add("to");
    } else {
        msg.classList.add("from");
    }

    msg.classList.add('robo-'+textClass);
    textClass = null;

    msg.classList.add('msg');

    msg.innerHTML = data.msg;
    if (data.msg.length > 1) {
        $feed.appendChild(msg);
    }

    msg_div.scrollTop = msg_div.scrollHeight - msg_div.clientHeight;


    // And simulate a reply from our agent.
    if (sender === "me") setTimeout(_agentReply, 1000);
    // ref to new DOM .msg
}

function _autoSend (data) {
    // Send data to a new .msg
    let msg = document.createElement('div') ;

    if (data.sender !== "me") {
        msg.classList.add("to");
    } else {
        msg.classList.add("from");
    }

    msg.classList.add('msg');

    msg.classList.add('robo-'+textClass);
    textClass = null;

    msg.innerHTML = '<img src="https://market.robonegotiator.com/img/robo.png" width="40px" ' +
        '>&nbsp;' + data.msg;

    var feed = document.getElementById("msgs") ;
    if(data.elementId === undefined) {
        feed.appendChild(msg);

        console.log(data.elementId);
    } else {

        var existing_div = document.getElementById(data.elementId);

        if(existing_div === null){
            msg.setAttribute('id', data.elementId);
            feed.appendChild(msg);

        }


    }
    // If sending was successful, clear the text field.
    feed.scrollTop = feed.scrollHeight - feed.clientHeight;

    return msg ;

}


var counterPrice = undefined;
var _agentReply = function () {

    if (count_progress < 3) {
        let $agentMsg = _send({msg: " ", typing: true, sender: false});


        if (count_progress === 1) {

            // $agentMsg.text();
            textClass = 'text-danger';
            let theEnvelope = {
                msg: "Let’s begin negotiation with your " +
                    "counter-offer you can " +
                    "commit to",

                sender: false
            };

            _autoSend(theEnvelope);

            setTimeout(function () {


                    displayModal('modal_counter_offer');

                }
                , 2000);

            count_progress++;
        } else if (count_progress === 2) {


            var responseData = null;
            if (counterPrice !== undefined) {

                textClass = 'text-success';

                let theEnvelope = {
                    msg: "Sending your initial offer <b> - $" + counterPrice + " </b>",
                    sender: false
                };

                _autoSend(theEnvelope);
                var instantDealCheck = undefined;


                var url = 'https://market.robonegotiator' +
                    '.com/instant-deal-check?api_key="+api_key+"&upc_product_code=' +
                    product_code +
                    '&seller_email' +
                    '=' + seller_email;

                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState === 4 && this.status === 200) {
                        instantDealCheck = JSON.parse(this.responseText);
                        console.log(instantDealCheck);

                        if (instantDealCheck.deal_exist === 'no') {
                            // $agentMsg.text("");


                            textClass = 'text-danger';

                            let theEnvelope = {
                                msg: "We checked our database. Unfortunately, there is no deal from any seller.  Would you like to provide your offer so we can find a seller for you? ",
                                sender: false
                            };

                            _autoSend(theEnvelope);


                            setTimeout(function () {

                                    displayModal('modal_find_seller');

                                }
                                , 2500);
                            //$('#').modal('show');

                        } else if (instantDealCheck.deal_exist === 'yes' &&
                            instantDealCheck.same_seller === 'no') {

                            hasDeal = true;

                            textClass = 'text-danger';
                            // $agentMsg.text();
                            let theEnvelope = {
                                msg: "We don’t have any deal from this seller, but we can match you with other potential sellers meeting your offer. Would you like RoboNegotiator to find a seller for you? We will find, match and introduce to you by email and text#. ",
                                sender: false
                            };

                            _autoSend(theEnvelope);


                            setTimeout(function () {
                                    displayModal('modal_find_seller');

                                }
                                , 2500);
                            // $('#').modal('show');


                        } else if (instantDealCheck.deal_exist === 'yes' &&
                            instantDealCheck.same_seller === 'yes') {

                            hasDeal = true;
                            textClass = 'text-danger';
                            // $agentMsg.text();
                            let theEnvelope = {
                                msg: "Good News! We have a special deal from this seller.  Please enter additional details. ",
                                sender: false
                            };

                            _autoSend(theEnvelope);

                            setTimeout(function () {

                                    displayModal('modal_find_seller_yes');

                                }
                                , 2500);
                            //  $('#').modal('show');


                        }

                    }
                };
                xmlhttp.open("GET", url, true);
                xmlhttp.send();


            }


        }




    }



};

_agentReply();


// Define event handlers: Hitting Enter or Send should send the form.

var buyer_offer_form = document.getElementById('robo_add_buyer_offer_form');

var buyer_offer_request_id = null;

var checkDeal = false;

var add_buyer_offer_data = null;

var final_offer_submitted = 0;
$('#update_offer_form').on("submit", function (e) {
    e.preventDefault();
    counterPrice = $('#highest_offer_robo').val();
    add_buyer_offer_data = {
        'api_key': api_key,
        'request_id': buyer_offer_request_id,
        'buyer_email': buyer_offer_form.buyer_email.value,
        'buyer_phone': buyer_offer_form.buyer_phone.value,
        'buyer_original_quantity': buyer_offer_form.buyer_original_quantity.value,

        'buyer_offer_price': counterPrice,

        'buyer_negotiation_mode': negotiation_mode,

        'buyer_highest_offer_price': counterPrice,

        'upc_product_code': product_code,

        'buyer_currency': 'USD',

        'buyer_zip': buyer_offer_form.buyer_zip.value,

        'expiry_date': buyer_offer_form.expiry_date.value,
        'json_result': 1

    };

    final_offer_submitted++;
    send_buyer_offer();

});


function submitBuyerOfferForm(e) {

    e.preventDefault();

    buyer_offer_form = document.getElementById('robo_add_buyer_offer_form');

    add_buyer_offer_data = {
        'api_key': api_key,
        'buyer_email': buyer_offer_form.buyer_email.value,
        'buyer_phone': buyer_offer_form.buyer_phone.value,
        'buyer_original_quantity': buyer_offer_form.buyer_original_quantity.value,

        'buyer_offer_price': counterPrice,

        'buyer_negotiation_mode': negotiation_mode,

        'buyer_highest_offer_price': counterPrice,

        'upc_product_code': product_code,

        'buyer_currency': 'USD',

        'buyer_zip': buyer_offer_form.buyer_zip.value.toString(),

        'expiry_date': buyer_offer_form.expiry_date.value,
        'json_result': 1

    };

    send_buyer_offer();

}


var final_message = undefined;

var need_update = undefined;

var preferences = undefined;

var closedDeal = undefined;

var closedDealEmail = undefined;

var closedDealFinalAmount = undefined;


function displayModal(querySelector) {

    var modal = document.getElementById(querySelector);

    modal.classList.remove('fade');
    modal.classList.remove('robo-fade');


    modal.classList.remove('robo-hide');
    modal.classList.remove('robo-modal');
    modal.classList.add('robo-modal-focus');


}

function hideModal(querySelector) {

    var modal = document.getElementById(querySelector);

    modal.classList.add('fade');

    modal.classList.add('robo-hide');
    modal.classList.add('robo-modal');
    modal.classList.remove('robo-modal-focus');


}

function send_buyer_offer() {
    console.log(add_buyer_offer_data);


    if(add_buyer_offer_data.request_id === undefined || add_buyer_offer_data.request_id === null){
        final_offer_submitted = 0 ;
    }
    var add_buyer_offer_array = Object.values(add_buyer_offer_data);
    textClass = 'text-success';

    let theEnvelope = {
        msg: 'Sending your details and offer to RoboNegotiator for further matching.',
        sender: false
    };

    _autoSend(theEnvelope);

    hideModal('modal_find_seller_yes');

    hideModal('modal_highest_offer');

    var postURL = "https://robonegotiator.com/add-buyer-offer?";


    var xmlHttp = new XMLHttpRequest();
    var urlPostfix = '';
    for (const key in add_buyer_offer_data) {

        console.log(key, add_buyer_offer_data[key]);
        if (add_buyer_offer_data[key] !== undefined && add_buyer_offer_data[key] !== null) {
            urlPostfix = urlPostfix + '&' + key + '=' + add_buyer_offer_data[key];
        }
    }

    postURL = postURL + urlPostfix;
    console.log(postURL);
    xmlHttp.open("GET", postURL);

    xmlHttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200)
            console.log('data resp is ...');

        console.log(this);
        var data = JSON.parse(this.responseText);

        console.log('data is ...');
        console.log(data);

        buyer_offer_request_id = data.request_id;

        var $mesg;
        if (hasDeal === null) {
            textClass = 'text-danger';

            $mesg = 'We have sent your offer to RoboNegotiator. You will hear directly from RoboNegotiator. You can close this session.';


             theEnvelope = {
                msg: $mesg,
                sender: false ,
                 elementId : 'robo-xcdgbg'
            };

            _autoSend(theEnvelope);
            console.log('sent gfgddgg...');
            setTimeout(closeChatBotRobo, 20000);


        } else if (data.success !== undefined && data.success === true) {

            textClass = 'text-danger';

            if (final_offer_submitted < 1) {
                $mesg = 'Your offer submitted to RoboNegotiator. Please wait. It may take a while. ' +
                    'Meanwhile please let us know your preferences.';

                setTimeout(function () {
                        displayModal('modal_time_pass_1');
                    }
                    , 100);
            } else {
                $mesg = 'Thanks for your updated offer.  We are hopeful seller will come down OR your new offer may close the deal. Please wait.  Checking…';
            }

             theEnvelope = {
                msg: $mesg,
                sender: false,
                 elementId : 'robo-xcdgbgtg'
            };

            _autoSend(theEnvelope);

            console.log('sending gggsd1111....');


            checkDeal = true;


            // $('#').modal('show') ;
            setTimeout(getDealStatus, 1000);


        } else if (data.success !== undefined && data.success === false) {

            if (data.errors !== undefined) {



                Object.keys(data.errors).forEach(function(key) {

                    console.log(data.errors[key][0]);
                    textClass = 'text-danger';

                    let theErr = {
                        msg: data.errors[key][0],
                        sender: false ,
                        elementId : 'robo-xcdgbg4852'
                    };

                    _send(theErr);



                });



                setTimeout(function () {

                    displayModal('modal_find_seller_yes');
                }, 3000);
            }
        }

    };


    xmlHttp.send();


}

var countStat = 1;

function getDealStatus() {

    var url = "https://market.robonegotiator.com/get-deal-status?api_key=" + api_key + "&upc_product_code=" +
        product_code +
        "&request_id=" + buyer_offer_request_id;


    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", url, true);

    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {

            console.log('getting status');
            var data2 = JSON.parse(this.responseText);

            console.log(data2);

            if (data2.message !== undefined) {
                console.log(data2.message);

                if (data2.message !== undefined) {


                    if (data2.message === 'failed') {


                        textClass = 'text-danger';

                        final_message = {
                            msg: '<span class="text-danger">We have sent your offer to RoboNegotiator. You will hear ' +
                                'directly from RoboNegotiator. You can close this session.</span>',
                            sender: false ,
                            elementId : 'robo-xcdgbgrt'
                        };


                        if (preferences !== undefined) {

                            _autoSend(final_message);

                            setTimeout(closeChatBotRobo, 20000);

                        }


                    } else if (data2.message === 'too_low') {


                        textClass = 'text-danger';
                        final_message = {
                            msg: '<span class="text-danger">Your offer is too low for further ' +
                                'negotiation. Thanks ' +
                                'for using ' +
                                'RoboNegotiator. Goodbye!</span>',
                            sender: false ,
                            elementId : 'robo-xcdgbg666'
                        };


                        if (preferences !== undefined) {

                            _autoSend(final_message);

                            setTimeout(closeChatBotRobo, 20000);

                        }


                    } else if (data2.message === 'deal_closed') {

                        finResp();

                        function finResp() {


                            textClass = 'text-danger';

                            getFinalAmount();


                        }

                    } else if (data2.message === 'deal_closed') {


                        textClass = 'text-danger';

                        final_message = {
                            msg: '<span class="text-danger">Congratulations!! Your offer has been accepted. Contact seller at: <b>' +
                                closedDeal.closed_deal.seller_email
                                + '</b> with your purchase  offer # ' + buyer_offer_request_id + ' and final ' +
                                'negotiated ' +
                                'amount:  <b>' +
                                closedDeal.closed_deal.final_amount + ' </b></span>',
                            sender: false ,
                            elementId : 'robo-xcdgbgsdw'
                        };

                        if (preferences !== undefined) {

                            _autoSend(final_message);

                            setTimeout(closeChatBotRobo, 20000);

                        }


                    } else if (data2.message === 'negotiation_with_no_mode') {

                        if (final_offer_submitted < 1) {

                            need_update = 1;
                            textClass = 'text-danger';
                            final_message = {
                                msg: '<span class="text-danger">Your offer is close to seller’s deal.  We' +
                                    ' would like you to give your final/highest offer so we can match ' +
                                    'with seller’s lowest offer</span>',
                                sender: false ,
                                elementId : 'robo-xcdgbger'
                            };


                            if (preferences !== undefined) {

                                _autoSend(final_message);

                                setTimeout(function () {
                                    $('#modal_highest_offer').modal('show');
                                }, 2000);

                            }

                            // $('#').modal('show');


                        } else {


                            need_update = undefined;
                            textClass = 'text-danger';
                            $exit_msg = '<span class="text-danger">Your offer is lower than seller’s ' +
                                'final deal amount. We will stop negotiation. Thanks for using ' +
                                'RoboNegotiation. Goodbye! !</span>';

                            final_message = {
                                msg: $exit_msg, sender: false ,
                                elementId : 'robo-xcdgbgeryy'
                            };


                            if (preferences !== undefined) {

                                _autoSend(final_message);

                                setTimeout(closeChatBotRobo, 20000);

                            }

                        }


                    }


                }

            }


        }

    };


    xmlhttp.send();


}

function save_buyer_payment($paymentObj) {

    $paymentObj.api_key = api_key;
    textClass = 'text-success';

    var urlPostfix = '';
    for (var key in $paymentObj) {

        console.log(key, $paymentObj.key);
        urlPostfix = urlPostfix + '&' + key + '=' + $paymentObj[key];

    }
    let theEnvelope = {
        msg: 'Your payment of ' + $paymentObj.amount + ' USD has been successful ! We have secured the deal for ' +
            'you , thank you !',
        sender: false ,
        elementId : 'robo-xcdgbgpm'
    };

    // _autoSend(theEnvelope);


    var url = "https://market.robonegotiator.com/save-payment-info?" + urlPostfix;

    console.log(url);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", url);

    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {

            var data = JSON.parse(this.responseText);
            console.log(data);


            _autoSend(theEnvelope);


            setTimeout(closeChatBotRobo, 20000);

        }


    };


    xmlhttp.send();

}

var agreedAmount = undefined;

function getFinalAmount() {


    setTimeout(getAmount, 30000);

    function getAmount() {
        var url = "https://market.robonegotiator.com/getDealStatus?api_key=" + api_key + "&upc_product_code=" +
            product_code +
            "&request_id=" + buyer_offer_request_id;


        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", url, true);

        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {


                console.log('getting final amount');
                var data = JSON.parse(this.responseText);
                console.log(data);
                console.log('closed deal...');
                // console.log(data.closed_deal[0]);

                if (data.closed_deal === undefined) {
                    getAmount();
                }

                if (data.closed_deal[0] !== undefined) {

                    closedDealEmail = data.closed_deal[0].seller_email;

                } else {
                    closedDealEmail = seller_email;
                }

                if (data.closed_deal[0] !== undefined) {

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


                    agreedAmount = document.getElementById('payment_amount_agreed').value;

                    agreedAmount = parseInt(agreedAmount);

                    if (agreedAmount !== 0) {

                        if (agreedAmount === -1) {
                            agreedAmount = closedDealFinalAmount;
                        }
                        var depositMessage = {
                            msg: '<span class="text-success">Please <b>pay $' + agreedAmount + ' deposit</b> to lock this ' +
                                'special ' +
                                'deal ' +
                                'and to claim this special price deal.  Seller will send instructions for ' +
                                'remaining balance. RoboNegotiator will automatically refund this deposit if seller doesn’t offer you a special deal</span>',
                            sender: false
                        };


                        _autoSend(depositMessage);

                        setTimeout(
                            function () {


                                displayModal('modal_payment_confirm');
                                executePaypalPayment(agreedAmount);

                            }, 3000
                        )

                    } else {
                        setTimeout(closeChatBotRobo, 20000);
                    }


                }


            }

        };

        xmlhttp.send();
    }


}


function executePaypalPayment(amount) {


    paypal.Buttons({

        // Set up the transaction
        createOrder: function (data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: amount
                    }
                }]
            });
        },

        // Finalize the transaction
        onApprove: function (data, actions) {
            return actions.order.capture().then(function (details) {
                // Show a success message to the buyer
                //alert('Transaction completed by ' + details.payer.name.given_name + '!');
                hideModal('modal_payment_confirm');
                let theEnvelope = {
                    msg: 'Transaction completed by ' + details.payer.name.given_name + '!',
                    sender: false
                };

                _autoSend(theEnvelope);


                console.log(data);

                var paymentObject = {
                    'buyer_email': add_buyer_offer_data.buyer_email,
                    'upc_product_code': product_code,
                    'payment_id': details.id,
                    'payer_id': details.payer.payer_id,
                    'payment_token': details.id,
                    'transaction_id': details.id,
                    'amount': amount,
                };

                save_buyer_payment(paymentObject);


            });
        }


    }).render('#robo-paypal-btn');
}


var pre_form_1 = document.getElementById('pre_form_1');


function pre_form_1onsubmit(e) {

    e.preventDefault();
    preferences = 1;

    hideModal('modal_time_pass_1');

    let theEnvelope = {
        msg: '<span class="text-success">Thanks for your answers.  RoboNegotiator is still checking with a ' +
            'seller.</span>',
        sender: false
    };

    _autoSend(theEnvelope);

    if (final_message !== undefined) {
        _autoSend(final_message);

        if (need_update !== undefined) {


            setTimeout(function () {

                    displayModal('modal_highest_offer');

                }
                , 2500);
        } else {

            setTimeout(closeChatBotRobo, 20000);

        }

    }


};

var robo_preference_btn2 = document.getElementById('robo_preference_btn2');


robo_preference_btn2.onclick = function (e) {


    hideModal('modal_pass_time2');

    textClass = 'text-success';
    let theEnvelope = {
        msg: 'Thanks for your answers.  RoboNegotiator is checking with a seller. We would let you know the outcome ASAP.',
        sender: false
    };

    _autoSend(theEnvelope);


};

var find_seller_btn = document.getElementById('find_seller_btn');

function find_seller_btnonclick(e){
    var find_seller_user_choice =
        document.querySelector('input[name="robo_find_seller"]:checked').value;


    console.log(find_seller_user_choice);

    count_progress++;

    if (find_seller_user_choice === 'yes') {


        displayModal('modal_find_seller_yes');

    } else {
        let theEnvelope = {
            msg: 'Thank you !',
            sender: false
        };

        _autoSend(theEnvelope);
        setTimeout(closeChatBotRobo, 20000);


    }


    hideModal('modal_find_seller');

}







function send_initial_price() {


    hideModal('modal_counter_offer');

    // Wrap the msg and send!

    // Wrap the msg and send!
    let theEnvelope = {
        msg: '',
        sender: "me"
    };

    counterPrice = document.getElementById('robo_counter_price').value;
    return _send(theEnvelope);
}









function formTestsubmit(e) {



    e.preventDefault();
    console.log('form submitting ...') ;
    send_initial_price();
}


function closeChatBotRobo() {

    document.getElementById('modal_counter_offer').remove() ;
    document.getElementById('modal_find_seller').remove();
    document.getElementById('modal_find_seller_yes').remove();

    document.getElementById('modal_highest_offer').remove();
    document.getElementById('modal_pass_time2').remove();
    document.getElementById('chatbotrobo').remove();


    //triggerNegotiationBar(product_code , seller_email) ;
}

function restartChatBotRobo() {

    closeChatBotRobo();

    setTimeout(
        function restartChat() {
            triggerNegotiationBar(product_code, seller_email);

        }, 1000);


}


