////////    /////////  ///////   //////  ///////
//          //     //  //    \\  //      //    \\
//          //     //  //    //  ////    //    // BY UBINIUM TECH SOLUTIONS PVT LTD
////////    /////////  ///////   //      //////
                                 //////

/* Get UPC Code from Different Platforms */
var product_code , seller_email ;
if(typeof ROBO_UPC_CODE === "undefined"){ var ROBO_UPC_CODE = null ; }
function silentErrorHandler() {return true;}
window.onerror=silentErrorHandler;
//Call Product Code Function
callProductCode();
function callProductCode(){
    if(typeof inputName !== "undefined"){ROBO_UPC_CODE = document.querySelector("[name='"+inputName+"']").value; }
    if(typeof inputClass !== "undefined"){ROBO_UPC_CODE = document.getElementsByClassName(inputClass)[0].value; }
    if(typeof inputID !== "undefined"){ROBO_UPC_CODE = document.getElementById(inputID).value; }
    if(typeof htmlElementClass !== "undefined"){ ROBO_UPC_CODE = document.getElementsByClassName(htmlElementClass)[0].innerText; }
    if(typeof htmlElementID !== "undefined"){ ROBO_UPC_CODE = document.getElementById(htmlElementID).innerText; }
}

if(typeof ROBO_PLUGIN_MODE === "undefined"){ var ROBO_PLUGIN_MODE = "sandbox" ; }

/* Check the Robo UPC Code Validation and Set Required Links on the Page */

if(typeof ROBO_UPC_CODE !== "undefined" && ROBO_UPC_CODE !== null){
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
}

//Set Robo UPC Code in General Case for the System

if(typeof ROBO_UPC_CODE === "undefined") {
    ROBO_UPC_CODE = encodeURIComponent(window.location.href);
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

        if(typeof ROBO_API_KEY !== 'undefined' && typeof ROBO_UPC_CODE !== 'undefined' && typeof ROBO_SELLER_EMAIL !==
            'undefined' && typeof ROBO_NEGOTIATION_MODE !== 'undefined' ){
            var html_elements ='<form id="classic-form-robo" action="http://my.robonegotiator.com/demo1" method="POST"><input type="hidden" class="form-control" id="classic_robo_api_key" name="api_key" value="'+ROBO_API_KEY+'"><input type="hidden" class="form-control" id="classic_robo_role" name="role" value="Buyer"><input type="hidden" class="form-control" id="classic_robo_mode" name="mode" value="Classic"><input type="hidden" class="form-control" id="classic_robo_upc_product_code" name="upc_product_code" value="'+ROBO_UPC_CODE+'"></form>';
            insertAfter(newButton, addCart);
            var div = document.createElement('div');
            document.getElementsByTagName("body")[0].appendChild(div);
            div.innerHTML = html_elements;
            var RoboNegotiator_btn_xyz = document.getElementById('RoboNegotiator_btn_xyz');
            RoboNegotiator_btn_xyz.onclick = function (e) {
                document.getElementById("classic-form-robo").submit();
            };

        }
        else { }
    }
}
