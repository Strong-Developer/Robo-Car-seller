//Developed By RoboNegotiator
//Version 1.0
//Developed On: 15-04-2020
//Configuration JS file for RoboNegotiator

if (typeof clientSetCategory === 'undefined') {
	//If No Category is Set
	clientSetCategory = 'others';
	//For Every Page Make this as Mandetory Field
}
var category = clientSetCategory;
var API_ENDPOINT = 'https://ui.robonegotiator.com';
if (typeof clientSetRoboUPCCode === 'undefined') {
	//Identifier As CMS Or Other Dynamic Platforms
	if (inputName === 'undefined') {
		var inputName = 'upcCode';
	}
}
else{
	var ROBO_UPC_CODE = clientSetRoboUPCCode;
}
if (typeof ROBO_API_KEY === 'undefined') {
	var ROBO_API_KEY = 'd3b049426bfa6b3891d3c2b7c78d3d68f5f0137d';
}
//Added ROBO_PASS_COLOR,ROBO_LOGO_URL,ROBO_STORE_NAME  by Alpana
/* if (typeof ROBO_PASS_COLOR === 'undefined') {
	var ROBO_PASS_COLOR = 'linear-gradient(40deg, #45cafc, #303f9f)';

}
*/

//Modify LOGO URL
/*if (typeof ROBO_LOGO_URL === 'undefined') {
    var ROBO_LOGO_URL = 'http://sandbox.robonegotiator.com/js/plugins/assets/img/chat2.png';

}*/
if (typeof ROBO_LOGO_URL === 'undefined') {
    var ROBO_LOGO_URL = 'https://ui.robonegotiator.com/js/plugins/new-js/Toyota-square.png';
}
//ROBO_STORE_NAME Modify
/*if (typeof ROBO_STORE_NAME === 'undefined') {
	var ROBO_STORE_NAME = 'RoboNegotiator Salesbot';
}*/
//ROBO_STORE_NAME Modify
if (typeof ROBO_STORE_NAME === 'undefined') {
	var ROBO_STORE_NAME = "Andy Mohr Toyota Salesbot";
}
//Powered by: RoboNegotiator
if (typeof ROBO_POWERED_BY === 'undefined') {
	var ROBO_POWERED_BY = 'Powered by: RoboNegotiator';
}
//Input Background-color
if (typeof ROBO_PASS_COLOR === 'undefined') {
	var ROBO_PASS_COLOR = '#ed052b';
}
//Input text-color
if (typeof ROBO_PASS_TEXTCOLOR === 'undefined') {
	var ROBO_PASS_TEXTCOLOR = '#fffff';
}

if (typeof ROBO_SELLER_EMAIL === 'undefined') {
	var ROBO_SELLER_EMAIL ="seller@robonegotiator.com";
}
if (typeof ROBO_NEGOTIATION_MODE === 'undefined') {
	var ROBO_NEGOTIATION_MODE ="auto";
}
if(typeof ROBO_CURRENCY === 'undefined') {
    var ROBO_CURRENCY = 'USD';
}
if(typeof ROBO_QUANTITY === 'undefined') {
    var ROBO_QUANTITY = 1;
}
if (typeof is_cms === 'undefined') {
	var is_cms = 1;
}
if (typeof ADD_TO_CART_BTN_IDENTIFIER_TYPE === 'undefined') {
	var ADD_TO_CART_BTN_IDENTIFIER_TYPE ="class";
}
if (typeof ADD_TO_CART_BTN_IDENTIFIER_NAME === 'undefined') {
	var ADD_TO_CART_BTN_IDENTIFIER_NAME ="single_add_to_cart_button";
}
if (typeof ROBO_PRODUCT_NAME_IDENTIFIER_TYPE === 'undefined') {
	var ROBO_PRODUCT_NAME_IDENTIFIER_TYPE = 'class'; //Optional
}
if (typeof ROBO_PRODUCT_NAME_IDENTIFIER_NAME === 'undefined') {
	var ROBO_PRODUCT_NAME_IDENTIFIER_NAME = 'product-title'; //Optional
}
if (typeof ROBO_BTN_CLASS === 'undefined') {
	var ROBO_BTN_CLASS ="button"; //Optional
}
if (typeof ROBO_BTN_PREFIX_ELEMENT === 'undefined') {
	var ROBO_BTN_PREFIX_ELEMENT =""; //Optional
}
if (typeof ROBO_BTN_STYLE === 'undefined') {
	var ROBO_BTN_STYLE ="width:305px;height:50px;margin-top: 15px;color:#fff;background-color:#000080;"; //Optional
}
if (typeof ROBO_BTN_CUSTOM_TEXT === 'undefined') {
	var ROBO_BTN_CUSTOM_TEXT ="NEGOTIATE FOR A DEAL"; //Optional
}
//Use Stripe or Paypal for Switching between Sripe or Paypal
var payment_gateway = ROBO_PAYMENT_GATEWAY="paypal";
//Paypal Config Files
var stripe_config = 'sandbox';

//Stripe Configuration URL
var StripConfigURl = document.createElement('script');
StripConfigURl.src = 'https://js.stripe.com/v3/';
document.head.appendChild(StripConfigURl, function(){
	if(stripe_config=="live"){
	    var secret_key = 'sk_live_UmSjGHPoRxrbKCNPCMLTVJIf00GFfUGvhb';
	    var stripe = Stripe('pk_live_CzuMwBkOxuU0xTq1K9H8ILHh00f4creJC1');
	}else{
	    var secret_key = 'sk_test_z7C7Q8KMIGRjx1a1szcECjMI00V3yr1zrS';
	    var stripe = Stripe('pk_test_GxYxvWVCpkH3cAEz5EPSi0z200YN6o8naK');
	}
}) ;

/*

$.getScript('https://js.stripe.com/v3/', function()
{
	if(stripe_config=="live"){
	    var secret_key = 'sk_live_UmSjGHPoRxrbKCNPCMLTVJIf00GFfUGvhb';
	    var stripe = Stripe('pk_live_CzuMwBkOxuU0xTq1K9H8ILHh00f4creJC1');
	}else{
	    var secret_key = 'sk_test_z7C7Q8KMIGRjx1a1szcECjMI00V3yr1zrS';
	    var stripe = Stripe('pk_test_GxYxvWVCpkH3cAEz5EPSi0z200YN6o8naK');
	}
});
*/

var ROBO_SET_CURRENCY = 'USD';

//Use Live more or Beta Mode
if(typeof ROBO_PLUGIN_MODE === "undefined"){ var ROBO_PLUGIN_MODE = "sandbox" ; }
//Paypal Config Files
var config = {
    paypal_client_id : 'AaC8hFNNBgIhnl3JYzBqEfSCvb_IhHrn7t6C0ep4tEPtDAzDmulzMwZgZoK6esq98fR62XbkwHPem2zQ'
} ;
var stripePaymentMerchantAuthCode = '';//Stripe Auth Code

// modification date 27-04-2020
if(typeof inputName !== "undefined"){ROBO_UPC_CODE = document.querySelector("[name='"+inputName+"']").value; }
if(typeof inputClass !== "undefined"){ROBO_UPC_CODE = document.getElementsByClassName(inputClass)[0].value; }
if(typeof inputID !== "undefined"){ROBO_UPC_CODE = document.getElementById(inputID).value; }
if(typeof htmlElementClass !== "undefined"){ ROBO_UPC_CODE = document.getElementsByClassName(htmlElementClass)[0].innerText; }
if(typeof htmlElementID !== "undefined"){ ROBO_UPC_CODE = document.getElementById(htmlElementID).innerText; }
// end modification date 27-04-2020
if(parseInt(ROBO_QUANTITY) >= 1) {
if(ROBO_NEGOTIATION_MODE === 'auto') {
    if(clientSetCategory === 'car' || clientSetCategory === 'automobile' || clientSetCategory === 'vehicle' || clientSetCategory === 'Automobiles'){

        
			var autojsLoad = document.createElement('script');
            autojsLoad.src = API_ENDPOINT+'/js/plugins/new-js/robonegotiator.auto-new-ford.js'; //1.1
            document.head.appendChild(autojsLoad);
            // Following uncommented by DPS on 8/7/2020
            //ROBO_PASS_COLOR = '#5c6871'; //search optics
		    //ROBO_LOGO_URL = 'https://ui.robonegotiator.com/js/plugins/new-js/Searchoptics.png';
			//ROBO_STORE_NAME = 'Search Optics Salesbot';
			//ROBO_PASS_TEXTCOLOR = '#ffffff';
     
    }
    else{
        
            var otherJsLoad = document.createElement('script');
            otherJsLoad.src = API_ENDPOINT+'/js/plugins/new-js/robonegotiator.other-new.js';
            // otherJsLoad.src = 'robonegotiator.other.js';
            document.head.appendChild(otherJsLoad);

            ROBO_PASS_COLOR = '#febb2f';
            ROBO_LOGO_URL = 'https://ui.robonegotiator.com/js/plugins/new-js/Walmart-Logo.png';
            ROBO_STORE_NAME = 'Walmart Salesbot';
            ROBO_PASS_TEXTCOLOR = '#ffffff';
       
            
    }
} else {
    var autojsLoad = document.createElement('script');
    autojsLoad.src = API_ENDPOINT+'/js/plugins/new-js/robonegotiator.other-new.js'; // 2.0
    document.head.appendChild(autojsLoad);
}
}
