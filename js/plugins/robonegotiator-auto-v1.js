////////    /////////  ///////   //////  ///////
//          //     //  //    \\  //      //    \\
//          //     //  //    //  ////    //    // BY UBINIUM TECH SOLUTIONS PVT LTD 
////////    /////////  ///////   //      //////
                                 //////

//////////////Installation Guide///////////////////////////////
/*
1. Change ROBO_UPC_CODE to ROBO_VIN_CODE

*/
///////////////////////////////////////////////////////////////


//Paypal Config Files

var config = {
    paypal_client_id : 'sb'
} ;

var payment_gateway = 'paypal';

/* Get UPC Code from Different Platforms */
var product_code , seller_email ;
if(typeof ROBO_VIN_CODE === "undefined"){ var ROBO_VIN_CODE = null ; }
function silentErrorHandler() {return true;}
window.onerror=silentErrorHandler;
//Call Product Code Function
callProductCode();
function callProductCode(){
    if(typeof inputName !== "undefined"){ROBO_VIN_CODE = document.querySelector("[name='"+inputName+"']").value; }
    if(typeof inputClass !== "undefined"){ROBO_VIN_CODE = document.getElementsByClassName(inputClass)[0].value; }
    if(typeof inputID !== "undefined"){ROBO_VIN_CODE = document.getElementById(inputID).value; }
    if(typeof htmlElementClass !== "undefined"){ ROBO_VIN_CODE = document.getElementsByClassName(htmlElementClass)[0].innerText; }
    if(typeof htmlElementID !== "undefined"){ ROBO_VIN_CODE = document.getElementById(htmlElementID).innerText; }
}

if(typeof ROBO_PLUGIN_MODE === "undefined"){ var ROBO_PLUGIN_MODE = "sandbox" ; }

/* Check the Robo UPC Code Validation and Set Required Links on the Page */

if(typeof ROBO_VIN_CODE !== "undefined" && ROBO_VIN_CODE !== null){
    /*document.getElementsByTagName("head")[0].insertAdjacentHTML(
        "afterbegin",
        "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' />");*/

    document.getElementsByTagName("head")[0].insertAdjacentHTML(
        "afterbegin",
        "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' />");
    
    document.getElementsByTagName("head")[0].insertAdjacentHTML(
        "afterbegin",
        "<link rel='stylesheet' href='https://umpdemo.robonegotiator.com/js/plugins/assets/css/style.css' />");
    //For Jquery No Confilict Check that is Javascript loaded or not then import Jquery
    if(!window.jQuery)
    {
        var imported3 = document.createElement('script');
        imported3.src = 'https://market.robonegotiator.com/mdb/js/jquery-3.4.1.min.js';
        document.head.appendChild(imported3);   

       /* if(typeof $('#datePicker').datepicker === "function" ){
            $('#datePicker').datepicker() ;
        }*/
    }

    var imported = document.createElement('script');
    imported.src = 'https://www.paypal.com/sdk/js?client-id='+config.paypal_client_id+'&currency=USD';
    document.head.appendChild(imported);

    /*var imported2 = document.createElement('script');
    imported2.src = 'https://code.jquery.com/ui/1.12.1/jquery-ui.js';
    document.head.appendChild(imported2);*/
    
    /*document.getElementsByTagName("head")[0].insertAdjacentHTML(
        "beforeend",
        "<link rel='stylesheet' href='https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css'/>");*/
}

//Set Robo UPC Code in General Case for the System

if(typeof ROBO_VIN_CODE === "undefined") {
    ROBO_VIN_CODE = encodeURIComponent(window.location.href);
}

//Set CAtalogue URL in General Case for the System
var ROBO_WEB_URL= encodeURIComponent(window.location.href);


//Add dynamic Button On the Target Script
if(typeof ADD_TO_CART_BTN_IDENTIFIER_TYPE !== "undefined"){
    if (typeof ADD_TO_CART_BTN_IDENTIFIER_NAME !== "undefined") {
        if(ADD_TO_CART_BTN_IDENTIFIER_TYPE === 'class'){
            var addCart = document.getElementsByClassName(ADD_TO_CART_BTN_IDENTIFIER_NAME)[0];
        }else {
            var addCart = document.getElementById(ADD_TO_CART_BTN_IDENTIFIER_NAME);
        }
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
            var ROBO_BTN_STYLE = "background-image:url('http://RoboNegotiator.com/img/logos/1robo-btn.png');" +
                "background-size:cover;width:150px;height:50px;border:none;" ;
        }
        var newButton = document.createElement("button");
        newButton.setAttribute('type','button');
        if (typeof is_cms === 'undefined' || is_cms != 1) {
            newButton.setAttribute('class','custom_robo_nego_button'); 
        }
        newButton.setAttribute('id','RoboNegotiator_btn_xyz');
        newButton.setAttribute('class',ROBO_BTN_CLASS);
        newButton.setAttribute('style',ROBO_BTN_STYLE);
        newButton.innerHTML = ROBO_BTN_CUSTOM_TEXT ;
        //Make New Sibling
        var newLine = document.createElement("br");
        function insertAfter(el, referenceNode) {
            referenceNode.parentNode.insertBefore(el, referenceNode.nextSibling);
        }
        insertAfter(newLine,addCart);
        insertAfter(newButton, newLine);
        if(typeof ROBO_API_KEY !== 'undefined' && typeof ROBO_VIN_CODE !== 'undefined' && typeof ROBO_SELLER_EMAIL !==
            'undefined' && typeof ROBO_NEGOTIATION_MODE !== 'undefined' ){
            var RoboNegotiator_btn_xyz = document.getElementById('RoboNegotiator_btn_xyz');
            RoboNegotiator_btn_xyz.onclick = function (e) {
                ForceCloseChatBotRobo();
                callProductCode();
                setTimeout(function(){
                    triggerNegotiationBar(ROBO_API_KEY ,ROBO_VIN_CODE ,ROBO_SELLER_EMAIL, ROBO_NEGOTIATION_MODE,ROBO_WEB_URL ) ;
                }, 500);
            };

        } 
        else { }
    }
}

// Variable Declarations
var chatBotUsed = false ;
var api_key  , negotiation_mode ;
var $counter_price_btn = null,
    $feed = null,
    _wait = null , // See [0]
    _secs = null ;
var count_progress = 1;
var chatMsgs = [];
var chatWrapperStart ="";
var curStep=1;
chatWrapperStart +='<div id="chatbotrobo"><div class="chat" id="RN_chatForm" style=""><div class="chat-title"><h1>robonegotiater</h1><h2>lets negotiate &amp; get you a good price</h2><figure class="avatar"><img src="http://umpdemo.robonegotiator.com/js/plugins/assets/img/chat2.png"></figure> <div class="r-nav"> <ul> <li> <a href="javascript:void(0);" id="RN_closeChat" onclick="ForceCloseChatBotRobo()" style="color: #000;"><i class="fa fa-times" aria-hidden="true"></i></a></li> </ul> </div> </div> <div class="messages"> <div id="msgs" class="messages-content" style="overflow-y:scroll !important;overflow-x:hidden !important" ><div id="gifloader" style="display:none"><img id="gifloaderImg" src="http://umpdemo.robonegotiator.com/js/plugins/assets/img/RNLoader.gif"></div>';
chatWrapperStart +='</div> </div> </div></div>';
var html_elements = chatWrapperStart;


// Message Declarations
function initChatMsgs(){
    curStep = 1;
    chatMsgs[1]=[];
    chatMsgs[1][0] = ['Thanks for checking our product catalog.  Our purpose is to give you a seamless, quick access to most information and get you a confirmed deal through this automated chatbot so we can save you time. Only in complex cases, we may suggest you see one of our sales advisers. <ul><li> We have this automobile available.</li><li> We have <b>VIN Check/ Car History Report</b> if you wish.</li></ul>'];
    chatMsgs[1][2] = ['You have Selected to Negotiate on the Product with '+ROBO_NEGOTIATION_MODE+' Mode. For the Seller '+ROBO_SELLER_EMAIL+''];
    chatMsgs[1][1] = ["Let\'s get started to make a deal. Please give us your confirmed <b>counteroffer</b> <div id='counterOffer'><div class='has-valid-err' id='robo_err_counterOffer'></div><div class='inline-box'><input type='text' class='form-control oracle-search' name='counterPrice'  placeholder='Please enter counter offer' id='robo_counter_price'> <button type='button' id='send_counter_price_btn' onClick='formTestsubmit()' class='inline-submit sound-on-click'><img src='http://umpdemo.robonegotiator.com/js/plugins/assets/img/icon_send.png' width='30px;'></button></div> </div>"];
    chatMsgs[1][3] = ["There is no deal from any seller yet. Would you like to provide your offer so we can find a seller for you? <div class='robo-custom-control custom-radio'><input id='find_seller_yes' type='radio' class='inline-radio' name='robo_find_seller' value='yes'><label for='find_seller_yes'><span></span>Yes</label><input id='find_seller_no' type='radio' class='inline-radio' name='robo_find_seller' value='no'><label for='find_seller_no'><span></span>No</label></div><div align='right'><button type='button' class=' robo-btn robo-btn-primary float-right' id='find_seller_btn' onclick='find_seller_btnonclick(event)'>Proceed to Find a New Seller <i class='fa fa-arrow-right' aria-hidden='true'></i></button><span id='seller_error' style='color:red;'></span></div>"];
    chatMsgs[2] = [];
    chatMsgs[2][0] = ["Good News! We have a special deal from this seller. Please enter additional details <br/><hr/>"];
    chatMsgs[2][1] = ["<div id='robo_buyer_data_formdiv'><form class='msg-width'  id='robo_add_buyer_offer_form' onsubmit='submitBuyerOfferForm(event)'><div class='has-valid-err' id='RN_err_negoForm'></div><input type='text' id='buyer_name' class='form-control oracle-search' name='buyer_name'  placeholder='Your Name'><input type='email' id='buyer_email' class='form-control oracle-search' name='buyer_email'  placeholder='Your Email'><input type='text' id='buyer_phone' class='form-control oracle-search' name='buyer_phone'  placeholder='Your Contact No'><input type='text' id='buyer_zip' maxlength='6' class='form-control oracle-search' name='buyer_zip'  placeholder='Your ZipCode'><input type='date' autocomplete='off' id='datePicker' class='form-control oracle-search' name='expiry_date'  placeholder='Counter-Offer Expires on'><input type='text' id='buyer_original_quantity' class='form-control oracle-search' name='buyer_original_quantity'  placeholder='How many cars you need?'><button type='button' id='robo_add_buyer_offer_btn' onClick='submitBuyerOfferForm()'  class='form-submit-button sound-on-click form-submit-button2'>Commit My Offer / Negotiate</button></form></div>"];
    chatMsgs[3] = [];
    chatMsgs[3][0] = ["Thanks. Before we process this offer, we would like to know following:"];
    chatMsgs[3][1] = "<div class='msg-width' id='modal_time_pass_1_formdiv'><legend style='font-size:14px;'>We provided your committed offer to a third-party independent matching service. While we get results, please provide us following information <br/> <b> Choose Your Option to secure the deal</legend><form id='pre_form_1' onsubmit='pre_form_1onsubmit()' ><select id='payment_amount_agreed' class='form-control oracle-search'><option value='100'>I am willing to pay deposit of $100 to secure the deal</option><option value='-1'>I would like dealer to show & drop the car to me so I can test drive and pay the dealer.</option><option value='0'>I would like dealer to call me so we can finalize remaining formalities.</option></select><legend style='font-size:14px;'>Give us your comment on how you feel about this negotiation process and how can we improve it?</legend><input type='text' id='PredCommentsNego' class='form-control oracle-search' name='PredCommentsNego'  placeholder='Your Comments Please'> <button type='button' id='robo_preference_btn1' onClick='pre_form_1onsubmit()' class='form-submit-button sound-on-click'><img src='http://umpdemo.robonegotiator.com/js/plugins/assets/img/icon_send.png' width='30px;'></button></form></div>"
    chatMsgs[3][2] = "<div id='modal_trade'>Do you have a trade-in vehicle before we can match your request? <div class='robo-custom-control custom-radio'><input id='trade_yes' type='radio' class='inline-radio' name='trading_option_selector' value='yes'><label for='trade_yes'><span></span>Yes</label><input id='trade_no' type='radio' class='inline-radio' name='trading_option_selector' value='no'><label for='trade_no'><span></span>No</label></div><div align='right'><button type='button' class=' robo-btn robo-btn-primary float-right' id='trading_yes_no_btn' onclick='find_trading(event)'>Proceed <i class='fa fa-arrow-right' aria-hidden='true'></i></button><span id='seller_error' style='color:red;'></span></div></div>"
    chatMsgs[3][3] = "<div id='modal_trading_price_range'>Assuming we get you a special deal matching your counteroffer/price, would you like to borrow from one of our lenders or pay for this car by a credit card/check/cash? <div class='robo-custom-control custom-radio'><input id='trading_price_range_finance' type='radio' class='inline-radio' name='trading_price_type_Selector' value='finance'><label for='trading_price_range_finance'><span></span>Borrow</label><input id='trading_price_range_pay_cash' type='radio' class='inline-radio' name='trading_price_type_Selector' value='pay_cash'><label for='trading_price_range_pay_cash'><span></span>Pay</label></div><div align='right'><button type='button' class=' robo-btn robo-btn-primary float-right' id='trading_price_range_btn' onclick='find_tradin_price_range(event)'>Proceed <i class='fa fa-arrow-right' aria-hidden='true'></i></button><span id='seller_error' style='color:red;'></span></div></div>"
    chatMsgs[4] = [];
    chatMsgs[4][0] = ["<div class='msg-width'  id='modal_payment_confirm'><div id='robo-paypal-btn'></div><button class='btn btn-danger form-submit-button payment-cancel-btn sound-on-click' id='close_payment' onclick='hidePaymentModal()'>No , thanks</button></div>"];
    chatMsgs[5] = [];
    chatMsgs[5][0] = ["This is your final chance before we quit. Please give your highest/ final offer <br/><div class='msg-width' id='modal_highest_offer'><div class='has-valid-err' id='robo_err_highestOffer'></div><div class='inline-box'><input type='text' class='form-control oracle-search' name='highest_offer_robo'  placeholder='Enter your final/highest offer' id='highest_offer_robo'> <button type='button' id='send_highest_offer' onClick='updateMyOffer()' class='inline-submit sound-on-click'><img src='http://umpdemo.robonegotiator.com/js/plugins/assets/img/icon_send.png' width='30px;'></button></div> </div>"];
    chatMsgs[5][2] = "<div id='modal_wish_for_highest_offer'>Do you want To proceed with final price?: <div class='robo-custom-control custom-radio'><input id='procees_for_height_offer_yes' type='radio' class='inline-radio' name='finalPriceProgressSelector' value='Yes'><label for='procees_for_height_offer_yes'><span></span>Yes</label><input id='procees_for_height_offer_no' type='radio' class='inline-radio' name='finalPriceProgressSelector' value='No'><label for='procees_for_height_offer_no'><span></span>No</label></div><div align='right'><button type='button' class=' robo-btn robo-btn-primary float-right' id='process_for_last_offer_valD' onclick='processForHeighestOffer(event)'>Proceed <i class='fa fa-arrow-right' aria-hidden='true'></i></button><span id='final_ofer_error' style='color:red;'></span></div></div>";
}

function setCounterOfferData(counterOffer){
    if(document.getElementById('counterOffer')){
        var counterOfferData = "<div class='inline-box'><input type='text' disabled='disabled' class='form-control oracle-search'  placeholder='Please Enter Counter Offer' value='"+counterOffer+"'></div>";
        document.getElementById('counterOffer').innerHTML=counterOfferData;
        document.getElementById('counterOffer').removeAttribute('id');
    }
}


function setBuyerDetailsFormData(robo_buyer_offer_data){
    if(document.getElementById('robo_buyer_data_formdiv')){
        var buyerFormData='';
        if(robo_buyer_offer_data!=''){
          buyerFormData = "<div class='msg-width'><input type='text' disabled='disabled' class='form-control oracle-search' placeholder='Your Name' value='"+robo_buyer_offer_data.buyer_name+"'><input type='email' disabled='disabled' class='form-control oracle-search' placeholder='Your Email' value='"+robo_buyer_offer_data.buyer_email+"'><input type='text' disabled='disabled' class='form-control oracle-search' placeholder='Your Contact No' value='"+robo_buyer_offer_data.buyer_phone+"'><input type='text' disabled='disabled' maxlength='6' class='form-control oracle-search' placeholder='Your ZipCode' value='"+robo_buyer_offer_data.buyer_zip+"'><input type='text'  disabled='disabled' class='form-control oracle-search' placeholder='Counter-Offer Expires on' value='"+robo_buyer_offer_data.expiry_date+"'><input type='text' disabled='disabled' class='form-control oracle-search' placeholder='How many cars you need?' value='"+robo_buyer_offer_data.buyer_original_quantity+"'></div>"
        }
        document.getElementById('robo_buyer_data_formdiv').innerHTML=buyerFormData;
        document.getElementById('robo_buyer_data_formdiv').removeAttribute('id');
    }
}

function setPrefSelectData(){
    if(document.getElementById('modal_time_pass_1_formdiv')){
        var e = document.getElementById("payment_amount_agreed");
        var prefSelected = e.options[e.selectedIndex].text;
        var txtVal = document.getElementById("PredCommentsNego").value;
        var counterSelectData = "<div class='msg-width'><hr/><legend style='font-size:14px;'>We are checking with seller. Meanwhile can we know your preferences for following things: <br/> <b> Choose your option to secure the deal</legend><div ><select class='form-control oracle-search'><option>"+prefSelected+"</option></select><legend style='font-size:14px;'>Give us your comment on how you feel about this negotiation process and how can we improve it?</legend><input type='text' disabled='disabled' class='form-control oracle-search'  placeholder='Your Comments Please' value='"+txtVal+"'></div></div>";
        document.getElementById('modal_time_pass_1_formdiv').innerHTML=counterSelectData;
        document.getElementById('modal_time_pass_1_formdiv').removeAttribute('id');
    }
}

function setHighestOfferData(highestOffer){
    if(document.getElementById('modal_highest_offer')){
        var highestOfferData = "<div class='msg-width' class='inline-box'><input type='text' disabled='disabled' class='form-control oracle-search'  placeholder='Please Enter Counter Offer' value='"+highestOffer+"'></div>";
        document.getElementById('modal_highest_offer').innerHTML=highestOfferData;
        document.getElementById('modal_highest_offer').removeAttribute('id');
    }
}

var closeChat = 0 ;
var msg_div = null ;

//First Action for sending the Deal Price
function triggerNegotiationBar($api_key , $product_code , $seller_email , $negotiation_mode = 'auto',$catalog_url ) {
    closeChat = 0 ;
    api_key = $api_key;
    chatBotUsed = true;
    product_code = $product_code;
    seller_email = $seller_email;
    negotiation_mode = $negotiation_mode;
    catalog_url = $catalog_url;
    initChatMsgs();
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

//Define First Quote Send Button
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
    msg.classList.add('message');
    msg.classList.add('new');

    msg.innerHTML = data.msg;
    if (data.msg.length > 1) {
        $feed.appendChild(msg);
    }
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
    msg.classList.add('message');
    msg.classList.add('new');
    msg.classList.add('robo-'+textClass);
    textClass = null;
    msg.innerHTML = '<figure class="avatar"><img src="http://umpdemo.robonegotiator.com/js/plugins/assets/img/chat.png"></figure>' + data.msg;
    var feed = document.getElementById("msgs") ;
    if(data.elementId === undefined) {
        if(feed !== undefined && feed !== null) {
            feed.appendChild(msg);
        }
    } 
    else {
        var existing_div = document.getElementById(data.elementId);
        if(existing_div === null){
            msg.setAttribute('id', data.elementId);
            feed.appendChild(msg);
        }
    }
    // If sending was successful, clear the text field.
    if(feed !== undefined && feed !== null) {
        feed.scrollTop = feed.scrollHeight - feed.clientHeight;
    }
    return msg ;
}


var counterPrice = undefined;
var _agentReply = function () {
    if (count_progress < 3) {
        let $agentMsg = _send({msg: " ", typing: true, sender: false});
        if (count_progress === 1) {
            textClass = 'text-danger';
            let theEnvelope = {
                msg: chatMsgs[1][0],
                sender: false
            };
            _autoSend(theEnvelope);
            setTimeout(function () {
            textClass = 'text-danger';
            let theEnvelope = {
                msg: chatMsgs[1][1],
                sender: false
            };
            _autoSend(theEnvelope);
            //formInitialised('counter_offer');
            }, 1000);
            /*setTimeout(function () {
            textClass = 'text-danger';
            let theEnvelope = {
                msg: chatMsgs[1][2],
                sender: false
            };
            _autoSend(theEnvelope);
            
            }, 2000); */
            count_progress++;
        } else if (count_progress === 2) {
            var responseData = null;
            if (counterPrice !== undefined) {
                textClass = 'text-success';
                counterPrice = parseInt(counterPrice.replace(/[^0-9.]/g, ''));
                let theEnvelope = {
                    msg: "Sending your initial offer <b> - $" + counterPrice + " </b>",
                    sender: false
                };
                _autoSend(theEnvelope);
                document.getElementById('gifloader').style.display='block';
                var instantDealCheck = undefined;
                var url = 'https://market.RoboNegotiator' +
                    '.com/api-786-instant-deal-check?plugin_mode='+ROBO_PLUGIN_MODE+'&api_key='+api_key+'&upc_product_code=' +
                    product_code +
                    '&seller_email' +
                    '=' + seller_email;
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState === 4 && this.status === 200) {
                        document.getElementById('gifloader').style.display='none';
                        instantDealCheck = JSON.parse(this.responseText);
                        setCounterOfferData(counterPrice);
                        if (instantDealCheck.deal_exist === 'no') {
                            textClass = 'text-danger';
                            let theEnvelope = {
                                msg: "Currently there is no Deal on this car. Would you like to provide your offer so we can find a offer for you?",
                                sender: false
                            };
                            _autoSend(theEnvelope);
                            theEnvelope = {
                                msg: chatMsgs[1][3],
                                sender: false
                            };
                            _autoSend(theEnvelope);
                            setTimeout(function () {
                                displayModal('modal_find_seller');
                            }
                            , 2500);
                        } 
                        else if (instantDealCheck.deal_exist === 'yes' &&
                            instantDealCheck.same_seller === 'no') {
                            hasDeal = true;
                            textClass = 'text-danger';
                            // $agentMsg.text();
                            let theEnvelope = {
                                msg: "We don't have any deal from this seller, but we can match you with other potential sellers meeting your offer. Would you like us to find a seller for you? We will find, match and introduce to you by email and text#. ",
                                sender: false
                            };
                            _autoSend(theEnvelope);
                            theEnvelope = {
                                msg: chatMsgs[1][3],
                                sender: false
                            };
                            _autoSend(theEnvelope);
                            setTimeout(function () {
                                displayModal('modal_find_seller');
                            }
                            , 2500);
                        } 
                        else if (instantDealCheck.deal_exist === 'yes' &&
                            instantDealCheck.same_seller === 'yes') {
                            hasDeal = true;
                            textClass = 'text-danger';
                            let theEnvelope = {
                                msg: "We indeed have a special deal from this seller",
                                sender: false
                            };
                            _autoSend(theEnvelope);
                            setTimeout(function () {
                                displayModal('modal_find_seller_yes');
                            }
                            , 2500);
                        }
                        else{
                            theEnvelope = {
                                msg: "Sorry! We have encountered an internal server problem.  We can not negotiate with the seller now. Please check after 12 hours",
                                sender: false
                            };
                            _autoSend(theEnvelope);
                            closeChat = 1 ;
                            setTimeout(closeChatBotRobo, 20000);
                        }

                    }
                };
                xmlhttp.open("GET", url, true);
                xmlhttp.send();
            }
        }
    }
};

// Define event handlers: Hitting Enter or Send should send the form.

var buyer_offer_form = document.getElementById('robo_add_buyer_offer_form');
var update_offer_form =     document.getElementById('update_offer_form');
var buyer_offer_request_id = null;
var checkDeal = false;
var add_buyer_offer_data = null;
var final_offer_submitted = 0;

// Update the Offer when Initially low bid offer.
function updateMyOffer(){
    var robo_counter_offer_price= document.getElementById('highest_offer_robo').value;
    if(robo_counter_offer_price !='' && parseInt(robo_counter_offer_price)>0){
        document.getElementById('robo_err_highestOffer').innerHTML='';
        counterPrice = robo_counter_offer_price;
        setHighestOfferData(counterPrice);
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
            'json_result': 1,'catalog_url': catalog_url,
            'plugin_mode' : ROBO_PLUGIN_MODE
        };
        final_offer_submitted++;
        send_buyer_offer();
    }else{
        document.getElementById('robo_err_highestOffer').innerHTML= '<span>Enter Valid Price</span>' ;
    }
};

//Buyers Validation amd Submit Section.
function submitBuyerOfferForm(e) {
    buyer_offer_form = document.getElementById('robo_add_buyer_offer_form');
    var err=false;
    var errMsg="";
    if(buyer_offer_form.buyer_name.value =='' ){
        err=true;
        errMsg +="<span>Please Enter Name</span>";
    }
    if(buyer_offer_form.buyer_email.value =='' || !robo_validateEmail(buyer_offer_form.buyer_email.value)){
        err=true;
        errMsg +="<span>Enter Valid Email</span>";
    }
    if(buyer_offer_form.buyer_phone.value =='' || (buyer_offer_form.buyer_phone.value.length < 6 || buyer_offer_form.buyer_phone.value.length > 15)){
        err=true;
        errMsg +="<span>Enter Valid Contact No</span>";
    }
    if(buyer_offer_form.buyer_zip.value.toString() =='' || buyer_offer_form.buyer_zip.value.toString().length > 6){
        err=true;
        errMsg +="<span>Enter Valid ZipCode</span>";
    }
    if(buyer_offer_form.expiry_date.value =='' ){
        err=true;
        errMsg +="<span>Enter Valid Expire Date</span>";
    }
    if(buyer_offer_form.buyer_original_quantity.value =='' || parseInt(buyer_offer_form.buyer_original_quantity.valuey) <= 0){
        err=true;
        errMsg +="<span>Enter Valid Quantity</span>";
    }
    if(err){
        document.getElementById('RN_err_negoForm').innerHTML=errMsg;
        return false;
    }else{
        document.getElementById('RN_err_negoForm').innerHTML='';
    }
    document.getElementById("robo_add_buyer_offer_btn").style.display = "none";
    var form  = document.getElementById("robo_add_buyer_offer_form");
    var allElements = form.elements;
    for (var i = 0, l = allElements.length; i < l; ++i) {
           allElements[i].disabled=true;
    }
    add_buyer_offer_data = {
        'api_key': api_key,
        'buyer_name' : buyer_offer_form.buyer_name.value,
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
        'json_result': 1,
        'catalog_url': catalog_url,
        'plugin_mode': ROBO_PLUGIN_MODE
    };
    send_buyer_offer();
}

//Response Handlers

var final_message = undefined;
var need_update = undefined;
var preferences = undefined;
var closedDeal = undefined;
var closedDealEmail = undefined;
var closedDealFinalAmount = undefined;


function displayModal(querySelector) {
    var modal = document.getElementById(querySelector);
    if(modal !== undefined && modal !== null) {
        modal.classList.remove('fade');
        modal.classList.remove('robo-fade');
        modal.classList.remove('robo-hide');
        modal.classList.remove('robo-modal');
        modal.classList.add('robo-modal-focus');
    }
    
    if(querySelector == 'modal_find_seller_yes'){
        if(!document.getElementById('robo_buyer_data_formdiv')){
            textClass = 'text-danger';
            let theEnvelope = {
                msg: chatMsgs[2][1],
                sender: false
            };
            _autoSend(theEnvelope);
            formInitialised('modal_find_seller_yes');
        }
    }
    else if(querySelector == 'modal_time_pass_1'){
        if(!document.getElementById('modal_time_pass_1_formdiv')){
            textClass = 'text-danger';
            let theEnvelope = {
                msg: chatMsgs[3][1],
                sender: false
            };
            _autoSend(theEnvelope);
            formInitialised('modal_time_pass_1');
        }
        
    }else if(querySelector == 'modal_payment_confirm'){
        if(!document.getElementById('modal_payment_confirm')){
            textClass = 'text-danger';
            let theEnvelope = {
                msg: chatMsgs[4][0],
                sender: false,
                elementId : 'payment-box'
            };
            _autoSend(theEnvelope);
            formInitialised('modal_payment_confirm');
        }
        
    }
    else if(querySelector == 'modal_highest_offer'){
        if(!document.getElementById('modal_highest_offer')){
            textClass = 'text-danger';
            let theEnvelope = {
                msg: chatMsgs[5][0],
                sender: false
            };
            _autoSend(theEnvelope);
            formInitialised('modal_highest_offer');
        }
    }
    else if (querySelector == 'modal_trade') {
        if(!document.getElementById('modal_trade')){
            textClass = 'text-success';
            let theEnvelope = {
                msg: chatMsgs[3][2],
                sender: false
            };
            _autoSend(theEnvelope);
            formInitialised('modal_trade');
        }
    }
    else if (querySelector == 'modal_trading_price_range') {
        if(!document.getElementById('modal_trading_price_range')){
            textClass = 'text-success';
            let theEnvelope = {
                msg: chatMsgs[3][3],
                sender: false
            };
            _autoSend(theEnvelope);
            formInitialised('modal_trading_price_range');
        }
    }
    else if (querySelector == 'modal_wish_for_highest_offer') {
        if(!document.getElementById('modal_wish_for_highest_offer')){
            textClass = 'text-success';
            let theEnvelope = {
                msg: chatMsgs[5][2],
                sender: false
            };
            _autoSend(theEnvelope);
            formInitialised('modal_wish_for_highest_offer');
        }
    }
}

function hideModal(querySelector) {
    var modal = document.getElementById(querySelector);
    if(modal !== undefined && modal !== null) {
        modal.classList.add('fade');
        modal.classList.add('robo-hide');
        modal.classList.add('robo-modal');
        modal.classList.remove('robo-modal-focus');
    }
    if(querySelector=='modal_payment_confirm'){
        document.getElementById('payment-box').remove();
    }
}

function send_buyer_offer() {
    if(add_buyer_offer_data.request_id === undefined || add_buyer_offer_data.request_id === null){
        final_offer_submitted = 0 ;
    }
    var add_buyer_offer_array = Object.values(add_buyer_offer_data);
    textClass = 'text-success';
    let theEnvelope = {
        msg: 'Sending your details and offer to our system for further matching.',
        sender: false
    };
    _autoSend(theEnvelope);
    document.getElementById('gifloader').style.display='block';
    hideModal('modal_find_seller_yes');
    hideModal('modal_highest_offer');
    var postURL = "https://market.RoboNegotiator.com/api-786-add-buyer-offer?";
    var xmlHttp = new XMLHttpRequest();
    var urlPostfix = '';
    for (const key in add_buyer_offer_data) {
        if (add_buyer_offer_data[key] !== undefined && add_buyer_offer_data[key] !== null) {
            urlPostfix = urlPostfix + '&' + key + '=' + add_buyer_offer_data[key];
        }
    }
    postURL = postURL + urlPostfix;
    setBuyerDetailsFormData(add_buyer_offer_data);
    xmlHttp.open("GET", postURL);
    xmlHttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200){
        var data = JSON.parse(this.responseText);
        buyer_offer_request_id = data.request_id;
        document.getElementById('gifloader').style.display='none';
        var $mesg;
        if (hasDeal === null) {
            textClass = 'text-danger';
            $mesg = 'Based on your counteroffer, credit history, financial needs and trade-in needs, we would recommend you go to our dealership and our friendly staff will be able to help you with all your needs. Thanks for trying our automated chatbot. ';
            theEnvelope = {
                msg: $mesg,
                sender: false ,
                elementId : 'robo-xcdgbg'
            };
            _autoSend(theEnvelope);
            closeChat = 1 ;
            setTimeout(closeChatBotRobo, 20000);
        } else if (data.success !== undefined && data.success === true) {
            textClass = 'text-danger';
            if (final_offer_submitted < 1) {
                $mesg = 'Thanks for your information. <br/> Some obvious questions so we can guide you better..';
                /*setTimeout(function () {
                    displayModal('modal_time_pass_1');
                }
                , 100);*/
                setTimeout(function () {
                    displayModal('modal_trade');
                }
                , 100);
            } else {
                $mesg = 'Thanks for your updated offer.  We are hopeful seller will come down OR your new offer may close the deal. Please wait.  Checking ...';
            }
            theEnvelope = {
                msg: $mesg,
                sender: false,
                elementId : 'robo-xcdgbgtg'
            };
            _autoSend(theEnvelope);
            checkDeal = true;
            setTimeout(getDealStatus, 1000);
        } else if (data.success !== undefined && data.success === false) {
            if (data.errors !== undefined) {
                Object.keys(data.errors).forEach(function(key) {
                    textClass = 'text-danger';
                    let theErr = {
                        msg: data.errors[key],
                        sender: false ,
                        elementId : 'robo-xcdgbg4852'
                    };
                    _autoSend(theErr);
                });
                setTimeout(function () {
                    displayModal('modal_find_seller_yes');
                }, 3000);
            }
        }
        }
    };
    xmlHttp.send();
}


var countStat = 1;
function getDealStatus() {
    document.getElementById('gifloader').style.display='block';
    var url = "https://market.RoboNegotiator.com/api-786-get-deal-status?plugin_mode="+ROBO_PLUGIN_MODE+"&api_key=" + api_key + "&upc_product_code=" +
        product_code +
        "&request_id=" + buyer_offer_request_id;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", url, true);

    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById('gifloader').style.display='none';
            var data2 = JSON.parse(this.responseText);
            if (data2.message !== undefined) {
                if (data2.message !== undefined) {
                    if (data2.message === 'failed') {
                        textClass = 'text-danger';
                        final_message = {
                            msg: '<span class="text-danger">Based on your counteroffer, credit history, financial needs and trade-in needs, we would recommend you go to our dealership and our friendly staff will be able to help you with all your needs. Thanks for trying our automated chatbot.',
                            sender: false ,
                            elementId : 'robo-xcdgbgrt'
                        };
                        if (preferences !== undefined) {
                            _autoSend(final_message); 
                            closeChat = 1 ;
                            setTimeout(closeChatBotRobo, 20000);  
                        }
                    } else if (data2.message === 'too_low') {
                        textClass = 'text-danger';
                        /*final_message = {
                            msg: '<span class="text-danger">Your offer is too low for further ' +
                                'negotiation. Thanks ' +
                                'for using ' +
                                'RoboNegotiator. Goodbye!</span>',
                            sender: false ,
                            elementId : 'robo-xcdgbg666'
                        };
                        if (preferences !== undefined) {
                            _autoSend(final_message);
                            closeChat = 1 ;
                            setTimeout(closeChatBotRobo, 20000);

                        }*/
                        prompt_requed_heighest_offer = 1;
                        final_message = {
                            msg: '<span class="text-danger">Your offer is almost $5000-$6000 below before we can help you.  Would you like to upgrade your offer one more time? This is your last chance.</span>',
                            sender: false ,
                            elementId : 'robo-xcdgbgrt'
                        };
                        if (preferences !== undefined) {
                            _autoSend(final_message);
                            //closeChat = 1 ;
                            //setTimeout(closeChatBotRobo, 20000);
                            setTimeout(function () {
                                displayModal('modal_wish_for_highest_offer');
                            }, 2000);
                        }
                    } 
                    else if (data2.message === 'deal_closed') {
                        let theEnvelope = {
                            msg: '<span class="text-danger">Before we reveal mutually agreed price (unbiased), our seller would like to make sure we do a credit check on your so seller has confidence and can prepare the vehicle for delivery.</span>',
                            sender: false
                        };
                        _autoSend(theEnvelope);
                        let credit_report = {
                            msg: '<span class="text-danger">Do we have your permission to check your credit report? There is no cost to you?<br/><div id="credit_ssn"><div class="has-valid-err" id="robo_credit_report"></div><div class="inline-box"><input type="text" class="form-control oracle-search" name="ssn_number"  placeholder="Please Enter your Social Security Number" id="robo_ssn"> <button type="button" id="send_ssn_btn" onClick="ssn_credit()" class="inline-submit sound-on-click"><img src="http://umpdemo.robonegotiator.com/js/plugins/assets/img/icon_send.png" width="30px;"></button></div></div></span>',
                            sender: false ,
                        };
                        _autoSend(credit_report);
                        
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
                            closeChat = 1 ;
                            setTimeout(closeChatBotRobo, 20000);
                        }

                    } else if (data2.message === 'negotiation_with_no_mode') {
                        if (final_offer_submitted < 1) {
                            need_update = 1;
                            textClass = 'text-danger';
                            final_message = {
                                msg: '<span class="text-danger">In order to continue further, please give us your final offer one more time and we should be able to get you a final deal.</span>',
                                sender: false ,
                                elementId : 'robo-xcdgbger'
                            };
                            if (preferences !== undefined) {
                                _autoSend(final_message);
                                /*setTimeout(function () {
                                    displayModal('modal_highest_offer');
                                }, 2000);*/
                                setTimeout(function () {
                                    displayModal('modal_wish_for_highest_offer');
                                }, 2000);
                            }
                        } else {
                            need_update = undefined;
                            textClass = 'text-danger';
                            $exit_msg = '<span class="text-danger">Based on your counteroffer, credit history, financial needs and trade-in needs, we would recommend you go to our dealership and our friendly staff will be able to help you with all your needs. Thanks for trying our automated chatbot.</span>';
                            final_message = {
                                msg: $exit_msg, sender: false ,
                                elementId : 'robo-xcdgbgeryy'
                            };
                            if (preferences !== undefined) {
                                _autoSend(final_message);
                                closeChat = 1 ;
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
        urlPostfix = urlPostfix + '&' + key + '=' + $paymentObj[key];
    }
    let theEnvelope = {
        msg: 'Your payment of ' + $paymentObj.amount + ' USD has been successful ! We have secured the deal for ' +
            'you , thank you !',
        sender: false ,
        elementId : 'robo-xcdgbgpm'
    };
    var url = "https://market.RoboNegotiator.com/api-786-save-payment-info?plugin_mode="+ROBO_PLUGIN_MODE+"&" + urlPostfix;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", url);
    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            var data = JSON.parse(this.responseText);
            _autoSend(theEnvelope);
            closeChat = 1 ;
            setTimeout(closeChatBotRobo, 20000);
        }
    };
    xmlhttp.send();
}

var agreedAmount = undefined;
var finalAmountCheckedTimes = 0 ;

function getFinalAmount() {
    document.getElementById('gifloader').style.display='block';
    setTimeout(getAmount, 3000);
    function getAmount() {
        var url = "https://market.RoboNegotiator.com/api-786-getDealStatus?plugin_mode="+ROBO_PLUGIN_MODE+"&api_key=" + api_key + "&upc_product_code=" +
            product_code +
            "&request_id=" + buyer_offer_request_id;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", url, true);
        xmlhttp.onreadystatechange = function () {
            document.getElementById('gifloader').style.display='none';
            if (this.readyState === 4 && this.status === 200) {
                var data = JSON.parse(this.responseText);
                if (data.closed_deal === undefined) {
                    finalAmountCheckedTimes++;
                    if (finalAmountCheckedTimes <= 5) {
                        getAmount();
                    } else {
                        if (preferences !== undefined) {
                            final_message = {
                                msg: '<span class="text-danger"> Congratulations!! Your offer has been accepted. Contact seller at: <b>' +
                                    seller_email
                                    + '</b> with your purchase offer #' + buyer_offer_request_id +'. <br/>We are really sorry to say that server is' +
                                    ' too busy to respond with the final amount at this time so could not retrieve the final amount , please contact us for that !',
                                sender: false ,
                                elementId : 'robo-ohnhfcthn'

                            };
                            _autoSend(final_message);
                            closeChat = 1 ;
                            setTimeout(closeChatBotRobo , 35000);
                        }
                    }
                } else {
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
                        msg: '<span class="text-danger">Seller and you have agreed to finalize the deal for this vehicle with VIN# at <b>$'+closedDealFinalAmount+'</b>. Please Contact Seller at Email Address :<b>' +closedDealEmail+ '</b> with deal Id #<b>' + buyer_offer_request_id + '</b></span>',
                        sender: false ,
                        elementId : 'rohffbnhfggt'
                    };
                    if (preferences !== undefined) {
                        _autoSend(final_message);
                        agreedAmount = document.getElementById('payment_amount_agreed').value;
                        agreedAmount = parseInt(agreedAmount);
                        setPrefSelectData();
                        if (agreedAmount !== 0) {
                            if (agreedAmount === -1) {
                                agreedAmount = closedDealFinalAmount;
                            }
                            var depositMessage = {
                                msg: '<span class="text-success">To secure a deal so it is guaranteed, please pay deposit <b> $' + agreedAmount + ' deposit</b> to Seller.</span>',
                                sender: false ,
                                elementId : 'gdgdfgdhsdhdyyyy'
                            };
                            _autoSend(depositMessage);
                            setTimeout(
                                function () {
                                    if (payment_gateway == 'paypal') {
                                        displayModal('modal_payment_confirm');
                                        var elements = document.getElementsByClassName('paypal-buttons');
                                        for (var i = 1; i <= elements.length; i++) {
                                            elements[i].style.display = 'none'; // Hide all elements.
                                        }
                                        executePaypalPayment(agreedAmount);    
                                    }
                                    else{
                                        executeStripePayment(agreedAmount);
                                    }
                                    

                                    
                                }, 3000
                            )

                        } else {
                            closeChat = 1;
                            setTimeout(closeChatBotRobo, 20000);
                        }
                    }
                }
            }
        };
        xmlhttp.send();
    }
}

function hidePaymentModal() {
    hideModal('modal_payment_confirm');
    let theEnvelope = {
        msg: 'Payment Cancelled ! Your Session will Expire in 20 Seconds',
        sender: false
    };
    _autoSend(theEnvelope);
    setTimeout(closeChatBotRobo, 20000);
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
                hideModal('modal_payment_confirm');
                let theEnvelope = {
                    msg: 'Transaction completed by ' + details.payer.name.given_name + '!',
                    sender: false
                };
                _autoSend(theEnvelope);
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
};

function executeStripePayment(amount){

}
var pre_form_1 = document.getElementById('pre_form_1');

function pre_form_1onsubmit(e) {
    preferences = 1;
    hideModal('modal_time_pass_1');
    document.getElementById('payment_amount_agreed').setAttribute('disabled','disabled');
    document.getElementById("robo_preference_btn1").style.display = "none";
    let theEnvelope = {
        msg: '<span class="text-success">We heard from our matching service.</span>',
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
        } 
        else if (prompt_requed_heighest_offer !== undefined){
            setTimeout(function () {
                displayModal('modal_wish_for_highest_offer');
            }
            , 2500);
        }
        else {
            let theEnvelope = {
                msg: 'Based on your counteroffer, credit history, financial needs and trade-in needs, we would recommend you go to our dealership and our friendly staff will be able to help you with all your needs. Thanks for trying our automated chatbot.',
                sender: false
            };
            _autoSend(theEnvelope);
            closeChat = 1 ;
            setTimeout(closeChatBotRobo, 20000);
        }
    }
};


var find_seller_btn = document.getElementById('find_seller_btn');

function find_seller_btnonclick(e){
    var find_seller_user_choice = document.querySelector('input[name="robo_find_seller"]:checked').value;
    count_progress++;
    if (find_seller_user_choice === 'yes') {
        displayModal('modal_find_seller_yes');
    } else {
        let theEnvelope = {
            msg: 'Based on your counteroffer, credit history, financial needs and trade-in needs, we would recommend you go to our dealership and our friendly staff will be able to help you with all your needs. Thanks for trying our automated chatbot.',
            sender: false
        };
        _autoSend(theEnvelope);
        closeChat = 1 ;
        setTimeout(closeChatBotRobo, 20000);
    }
    hideModal('modal_find_seller');
}

function find_trading(e){
    var find_trading_bool = document.querySelector('input[name="trading_option_selector"]:checked').value;
    //count_progress++;
    if (find_trading_bool === 'no' || find_trading_bool === 'No') {
        displayModal('modal_trading_price_range');
    } else {
        let theEnvelope = {
            msg: 'Based on your counteroffer, credit history, financial needs and trade-in needs, we would recommend you go to our dealership and our friendly staff will be able to help you with all your needs. Thanks for trying our automated chatbot.',
            sender: false
        };
        _autoSend(theEnvelope);
        closeChat = 1 ;
        setTimeout(closeChatBotRobo, 20000);
    }
    //hideModal('modal_trading_price_range');
}

function find_tradin_price_range(e){
    var trading_is_finance_is_pay_cash = document.querySelector('input[name="trading_price_type_Selector"]:checked').value;
    //count_progress++;
    if (trading_is_finance_is_pay_cash === 'pay_cash' || trading_is_finance_is_pay_cash === 'pay_cash') {
        setTimeout(function () {
            displayModal('modal_time_pass_1');
        }
        , 100);
    } else {
        let theEnvelope = {
            msg: 'Based on your counteroffer, credit history, financial needs and trade-in needs, we would recommend you go to our dealership and our friendly staff will be able to help you with all your needs. Thanks for trying our automated chatbot.',
            sender: false
        };
        _autoSend(theEnvelope);
        closeChat = 1 ;
        setTimeout(closeChatBotRobo, 20000);
    }
    //hideModal('modal_trading_price_range');
}

function ssn_credit(){
    var ssn_id = document.getElementById('robo_ssn').value;
    if (ssn_id == '' || ssn_id === null) {
        document.getElementById('robo_credit_report').innerHTML = 'SSN Cannot Be Null';
    }
    else{
        document.getElementById("send_ssn_btn").style.display = "none";
        document.getElementById('robo_credit_report').innerHTML = '';
        let ssnCreditMessage = {
            msg: '<span class="text-danger">Thanks! '+ssn_id+', We are generating your credit report and we will share with you and seller soon.In case of bad credit score/report</span>',
            sender: false ,
            elementId : 'robo-xcdgbgrt'
        };
        _autoSend(ssnCreditMessage);
        setTimeout(function () {
            textClass = 'text-danger';
            getFinalAmount();
        }, 200);
    }
}

function processForHeighestOffer(e){
    need_update = 1;
    var trading_is_finance_is_pay_cash = document.querySelector('input[name="finalPriceProgressSelector"]:checked').value;
    //count_progress++;
    if (trading_is_finance_is_pay_cash === 'Yes') {
        setTimeout(function () {
            displayModal('modal_highest_offer');
        }
        , 100);
    } else {
        let theEnvelope = {
            msg: 'Based on your counteroffer, credit history, financial needs and trade-in needs, we would recommend you go to our dealership and our friendly staff will be able to help you with all your needs. Thanks for trying our automated chatbot.',
            sender: false
        };
        _autoSend(theEnvelope);
        closeChat = 1 ;
        setTimeout(closeChatBotRobo, 20000);
    }
}

function send_initial_price() {
    document.getElementById('robo_counter_price').setAttribute('disabled','disabled');//.attributes['disabled'].value='disabled';
    document.getElementById("send_counter_price_btn").style.display = "none";
    // Wrap the msg and send!
    let theEnvelope = {
        msg: '',
        sender: "me"
    };
    var initCounterPrice = document.getElementById('robo_counter_price').value;
    initCounterPrice = initCounterPrice.replace(/[^0-9.]/g, '');
    counterPrice = parseInt(initCounterPrice);
    counterPrice = document.getElementById('robo_counter_price').value;
    return _send(theEnvelope);
}
//Initial Budget Submit For On Click Function
function formTestsubmit(e) {
    
    var robo_counter_offer_price = document.getElementById('robo_counter_price').value;
    robo_counter_offer_price = robo_counter_offer_price.replace(/[^0-9.]/g, '');
    robo_counter_offer_price = parseInt(robo_counter_offer_price);
    if(robo_counter_offer_price !='' && parseInt(robo_counter_offer_price)>0){
        document.getElementById('robo_err_counterOffer').innerHTML='';
        send_initial_price();
    }else{
        document.getElementById('robo_err_counterOffer').innerHTML= '<span>Enter valid Counteroffer</span>' ;
    }
}
//Close Chatbot
function closeChatBotRobo() {
    if(closeChat === 1) {
        if(document.getElementById('modal_counter_offer'))document.getElementById('modal_counter_offer').remove();
        if(document.getElementById('modal_find_seller'))document.getElementById('modal_find_seller').remove();
        if(document.getElementById('modal_find_seller_yes'))document.getElementById('modal_find_seller_yes').remove();
        if(document.getElementById('modal_highest_offer'))document.getElementById('modal_highest_offer').remove();
        if(document.getElementById('modal_pass_time2'))document.getElementById('modal_pass_time2').remove();
        if(document.getElementById('chatbotrobo'))document.getElementById('chatbotrobo').remove();
        if(document.getElementById('modal_trade'))document.getElementById('modal_trade').remove();
        preferences = undefined;
        final_message = undefined;
        need_update = undefined;
        preferences = undefined;
        prompt_requed_heighest_offer = undefined;
        closedDeal = undefined;
        closedDealEmail = undefined;
        closedDealFinalAmount = undefined;
        buyer_offer_request_id = null;
        checkDeal = false;
        add_buyer_offer_data = null;
        final_offer_submitted = 0;
        finalAmountCheckedTimes = 0 ;
        closeChat = 0 ;
    }
}

function ForceCloseChatBotRobo() {
    if(document.getElementById('modal_counter_offer'))document.getElementById('modal_counter_offer').remove();
    if(document.getElementById('modal_find_seller'))document.getElementById('modal_find_seller').remove();
    if(document.getElementById('modal_find_seller_yes'))document.getElementById('modal_find_seller_yes').remove();
    if(document.getElementById('modal_highest_offer'))document.getElementById('modal_highest_offer').remove();
    if(document.getElementById('modal_pass_time2'))document.getElementById('modal_pass_time2').remove();
    if(document.getElementById('chatbotrobo'))document.getElementById('chatbotrobo').remove();
    if(document.getElementById('modal_trade'))document.getElementById('modal_trade').remove();
    preferences = undefined;
    final_message = undefined;
    need_update = undefined;
    preferences = undefined;
    closedDeal = undefined;
    closedDealEmail = undefined;
    prompt_requed_heighest_offer = undefined;
    closedDealFinalAmount = undefined;
    buyer_offer_request_id = null;
    checkDeal = false;
    add_buyer_offer_data = null;
    final_offer_submitted = 0;
    finalAmountCheckedTimes = 0 ;
    closeChat = 0 ;
}

function restartChatBotRobo() {
    closeChatBotRobo();
    setTimeout(
        function restartChat() {
            triggerNegotiationBar(product_code, seller_email);

        }, 1000);
}

function formInitialised(formType){
    setTimeout(function() {
        if(formType=='counter_offer'){
            if(document.getElementById('robo_counter_price')){
                setInputFilter(document.getElementById('robo_counter_price'), function(value) {
                    return /^\d*$/.test(value); 
                });
            }
        }
        else if(formType=='modal_find_seller_yes'){
            if(document.getElementById("buyer_phone")){
                setInputFilter(document.getElementById("buyer_phone"), function(value) {
                    return /^\d*$/.test(value); 
                });
            }
            if(document.getElementById("buyer_zip")){
                setInputFilter(document.getElementById("buyer_zip"), function(value) {
                    return /^\d*$/.test(value); 
                });
            }
            if(document.getElementById("buyer_original_quantity")){
                setInputFilter(document.getElementById("buyer_original_quantity"), function(value) {
                    return /^\d*$/.test(value); 
                });
            }
            if(document.getElementById("datePicker")){
                /*if(typeof $('#datePicker').datepicker === "function" ){
                    $('#datePicker').datepicker() ;
                }*/
            }           
        }
    },500);
}

function robo_validateEmail(elementValue){      
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    return emailPattern.test(elementValue); 
}

function setInputFilter (textbox, inputFilter) {
  ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
    textbox.addEventListener(event, function() {
      if (inputFilter(this.value)) {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      } else {
        this.value = "";
      }
    });
  });
}