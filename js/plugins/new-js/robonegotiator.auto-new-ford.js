////////    /////////  ///////   //////  ///////
//          //     //  //    \\  //      //    \\
//          //     //  //    //  ////    //    // BY UBINIUM TECH SOLUTIONS PVT LTD
////////    /////////  ///////   //      //////
                                 //////

/* Get UPC Code from Different Platforms */
var product_code , seller_email ;
var isAgreeCalled = 0;
var showsendBuyerMssg = 0;
var highCounter = 1;
var couponCodes = [];
var fyiMessages = [];
var intitialOfferPrice = 0;
leaseCheckAgainCustom = 0;
couponSection = 0;
fyiSection = 0;
var contactdetailsform;
var roboCurrency = ROBO_CURRENCY;
var currencyArray = ['USD','EUR','JPY','CAD','INR','GBP','CHF','AUD'];
appliedCouponCode = '';
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

	// document.getElementsByTagName("head")[0].insertAdjacentHTML(
    //     "afterbegin",
    //      "<link rel='stylesheet' href='"+API_ENDPOINT+"/alpana/css/stylebotn.css' />");

    //For Jquery No Confilict Check that is Javascript loaded or not then import Jquery
    if(!window.jQuery)
    {
        var imported3 = document.createElement('script');
        imported3.src = API_ENDPOINT+'/mdb/js/jquery-3.4.1.min.js';
        document.head.appendChild(imported3);

       /* if(typeof $('#datePicker').datepicker === "function" ){
            $('#datePicker').datepicker() ;
        }*/
    }


    var imported = document.createElement('script');
    imported.src = 'https://www.paypal.com/sdk/js?client-id='+config.paypal_client_id+'&currency='+roboCurrency;
    document.head.appendChild(imported);

    var imported1 = document.createElement('script');
    imported1.src = 'https://www.gstatic.com/charts/loader.js';
    document.head.appendChild(imported1);

    var imported2 = document.createElement('script');
    imported2.src = 'https://www.google.com/jsapi';
    document.head.appendChild(imported2);


    var imported3 = document.createElement('script');
    imported3.src = 'https://smtpjs.com/v3/smtp.js';
    document.head.appendChild(imported3);

    /*var imported2 = document.createElement('script');
    imported2.src = 'https://code.jquery.com/ui/1.12.1/jquery-ui.js';
    document.head.appendChild(imported2);*/

    /*document.getElementsByTagName("head")[0].insertAdjacentHTML(
        "beforeend",
        "<link rel='stylesheet' href='https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css'/>");*/
		
	document.getElementsByTagName("head")[0].insertAdjacentHTML(
        "beforeend",
        "<link rel='stylesheet' href='"+API_ENDPOINT+"/js/plugins/new-js/style.css' />");
}
// "<link rel='stylesheet' href='"+API_ENDPOINT+"/js/plugins/new-js/style.css' />");
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
        newButton.setAttribute('id','dha_robonegotiator_btn_start');
        newButton.setAttribute('class',ROBO_BTN_CLASS);
        newButton.setAttribute('style',ROBO_BTN_STYLE);
        newButton.innerHTML = ROBO_BTN_CUSTOM_TEXT ;
        //Make New Sibling
        var newLine = document.createElement("br");
        function insertAfter(el, referenceNode) {
            referenceNode.parentNode.insertBefore(el, referenceNode.nextSibling);
        }
        /*insertAfter(newLine,addCart);
        insertAfter(newButton, newLine);*/
        insertAfter(newButton, addCart);
        if(typeof ROBO_API_KEY !== 'undefined' && typeof ROBO_UPC_CODE !== 'undefined' && typeof ROBO_SELLER_EMAIL !==
            'undefined' && typeof ROBO_NEGOTIATION_MODE !== 'undefined' ){
            var dha_robonegotiator_btn_start = document.getElementById('dha_robonegotiator_btn_start');
            dha_robonegotiator_btn_start.onclick = function (e) {
                ForceCloseChatBotRobo();
                callProductCode();
                isAgreeCalled = 0;
                couponSection = 0;
                showsendBuyerMssg = 0;
                appliedCouponCode ='';
                fyiMessages = [];
                couponCodes = [];
                fyiSection = 0;
                intitialOfferPrice = 0;
                roboCurrency = ROBO_CURRENCY;
                setTimeout(function(){
					triggerNegotiationBar(ROBO_API_KEY, ROBO_UPC_CODE, ROBO_SELLER_EMAIL, ROBO_NEGOTIATION_MODE,ROBO_WEB_URL,ROBO_PASS_COLOR,ROBO_LOGO_URL,ROBO_STORE_NAME);

                }, 500);
                // ch ltr
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
/*Chatbot UI Layout*/
chatWrapperStart +='<div id="dha_robo_negotiator"><div class="dha-chatbot-container" id="RN_chatForm" style=""><div class="dha-chatbot-header"><div class="dha-chatbot-header-left"><img class="dha-chatbot-logo" src="'+ROBO_LOGO_URL+'"><div class="dha-chatbot-logo-text"><h5 class="dha-chatbot-header-left-top">'+ROBO_STORE_NAME+'</h5>';
if (ROBO_STORE_NAME!='RoboNegotiator Salesbot') {
	chatWrapperStart +='<h6 class="dha-chatbot-header-left-middle">'+ROBO_POWERED_BY+'</h6>';
}
chatWrapperStart +='<div class="dha-chatbot-header-left-bottom"></div> </div> </div> <div class="dha-chatbot-header-right"> <a href="javascript:void(0);" id="dha_robonegotiator_btn_exit" onclick="ForceCloseChatBotRobo()" class="dha-chatbot-close"></a> </div> </div> <div id="dha-msgs" class="dha-chatbot-body"> <div id="gifloader" style="display:none"><img id="gifloaderImg" src="'+API_ENDPOINT+'/js/plugins/assets/img/RNLoader.gif"></div>';
chatWrapperStart +='</div> <div class="dha-chatbot-footer"> </div> </div> </div>';
var html_elements = chatWrapperStart;

/*Currency Selector*/
var selectCurrency = '<select disabled onchange="setCurrency(this)" id="robo-currency" class="dha-robo-currency-select">';
for(var count=0;count<currencyArray.length;count++) {
    var sel = '';
    if(roboCurrency == currencyArray[count]){
        sel = 'selected="selected"';
    }
    selectCurrency += '<option '+sel+' value="'+currencyArray[count]+'">'+currencyArray[count]+'</option>';
}
selectCurrency += '</select>';

function setCurrency(elem) {
    roboCurrency = elem.options[elem.selectedIndex].value;
}
//show initial options
function initoptions()
{
    initoption = ['<div class="inner"><button type="button" id="closebotbtn"  onclick="option1()" class="dha-choose-button">Sending a Question/Feedback about this Product</button></div><div class="inner"><button type="button" id="closebotbtn"  onclick="option2()"  class="dha-choose-button">Checking and Negotiating a Special Deal</button> </div> <div class="inner"><button type="button" id="closebotbtn"  onclick="option3()"  class="dha-choose-button">Next Steps if you have Special Needs </button></div><div class="inner"><button type="button" id="closebotbtn"  onclick="option4()"  class="dha-choose-button">Additional Product Details </button></div>'];

	setTimeout(function () {
        let theEnvelope = {
            msg: initoption,
            sender: "me"
        };
        _sendoptions(theEnvelope);
    }, 2000);
}
// if user selected option 4 - Additional Product Details
function option4() {
    let theEnvelop = {
        msg: "Additional Product Details ",
        sender: false
    };
    _customerReply(theEnvelop);

    let theEnvelope = {
        msg: "Additional Product Details",
        sender: "me"
    };
    _send(theEnvelope);

    chatMsgs[0][1][4] = ['Product:&nbsp;VIN: ' +product_code];
    let theEnvelopeusr = {
        msg: chatMsgs[0][1][4],
        sender: false
    };

    _autoSend(theEnvelopeusr);
    setTimeout(displayoptions4, 3000);
}
function displayoptions4()
{
	chatMsgs[0][1][41] = ['<div id="outer"><br/> <div class="inner"><button type="button" id="displayoptions4btn"  onclick="vehiclespecs(product_code)" class="dha-choose-button">VEHICLE SPECS</button><button type="button" id="displayoptions4btn"  onclick="TOTALCOSTOFOWNERSHIP(product_code)"  class="dha-choose-button">TOTAL COST OF OWNERSHIP</button> <button type="button" id="displayoptions4btn"  onclick="accident(product_code)"  class="dha-choose-button">TITLE/LIEN/ACCIDENT</button> <button type="button" id="displayoptions4btn"  onclick="MARKETDATA(product_code)"  class="dha-choose-button">MARKET DATA</button><button type="button" id="displayoptions4btn"  onclick="FULLREPORT(product_code)"  class="dha-choose-button">FULL REPORT</button></div></div>'];
	 let theEnvelope = {
			msg: chatMsgs[0][1][41],
			sender: "me"
		};
		_sendoptions(theEnvelope);
}

function MARKETDATA(datavindetails) {
	let theEnvelope = {
                msg: "MARKET DATA",
                sender: "me"
            };
            _send(theEnvelope);
	google.charts.load('current', {'packages':['corechart']});

	var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
		if (xhr.readyState == XMLHttpRequest.DONE) {
			var result1 = JSON.parse(this.responseText);
			//var result2 = JSON.stringify(result1.dataset.prices);

			chatMsgs[0][1][4][4] = ['<div id="chart1" style="width: 450px; height: 350px;">Chart loading...<div id="chartouterline" ></div></div>'];
			let theEnvelope = {
                msg: chatMsgs[0][1][4][4],
                sender: false,

            };
			_autoSend(theEnvelope);

			setTimeout(function() {
				var options = {
				title: 'Price Range for the selected product'
				};

				var data = new google.visualization.DataTable();
				data.addColumn('string', 'Product');
				data.addColumn('number', 'Percentage');
				data.addRows([
				['Min Price',Number( JSON.stringify(result1.dataset.prices.below))],
				['Avg Price', Number( JSON.stringify(result1.dataset.prices.average))],
				['Max Price',Number( JSON.stringify(result1.dataset.prices.above))]
				]);


			var chart = new google.visualization.PieChart(document.getElementById('chart1'));
			chart.draw(data, options);
			}, 3000);

        }
    }
    xhr.open('GET', 'http://site4.gst-ready.in/Home/VehicleMarketValue?vin='+datavindetails, true);
    xhr.send(null);
    setTimeout(()=>{
        let theEnvelope = {
            msg: "We have the following additional information regarding this vehicle. Would you like to view any of them? If not, Select \"I Still Have a Question\" <div class=\"inner\"><button type=\"button\" id=\"closebotbtn\" onclick='vehiclespecs(product_code)'   class=\"dha-choose-button\">Vehicle Specifications</button></div><div class=\"inner\"><button type=\"button\" id=\"closebotbtn\"  onclick='TOTALCOSTOFOWNERSHIP(product_code)' class=\"dha-choose-button\">Cost Of OwnerShip</button> </div> <div class=\"inner\"><button type=\"button\" id=\"closebotbtn\"  onclick='accident(product_code)'  class=\"dha-choose-button\">Title/Lien/Accident Report</button></div><div class=\"inner\"><button type=\"button\" id=\"closebotbtn\"  onclick='MARKETDATA(product_code)' class=\"dha-choose-button\">Market Data</button></div><div class=\"inner\"><button type=\"button\" id=\"closebotbtn\"  onclick='FULLREPORT(product_code)' class=\"dha-choose-button\">Full Report</button></div><div class=\"inner\"><button type=\"button\" id=\"closebotbtn\"  onclick=\"option_custom()\" class=\"dha-choose-button\">I Still Have a Question</button></div><div class=\"inner\"><button type=\"button\" id=\"closebotbtn\"  onclick=\"document.getElementById('dha_robonegotiator_btn_start').click()\" class=\"dha-choose-button\">Go Back</button></div>",
            sender: false
        }
         _autoSend(theEnvelope);     
      
    }, 7500);
}

function accident(datavindetails) {
	let theEnvelope = {
                msg: "TITLE/LIEN/ACCIDENT",
                sender: "me"
            };
            _send(theEnvelope);
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            var result1 = this.responseText;
			//chatMsgs[0][1][4][4] = ['<div id="accident">result1</div>'];
			let theEnvelope = {
                msg: result1,
                sender: false
            };
            _autoSend(theEnvelope);
        }
    }
    xhr.open('GET', 'http://site4.gst-ready.in/Home/VehicleLienAccidentTitlesPartial?vin='+datavindetails, true);
    xhr.send(null);
	setTimeout(()=>{
        let theEnvelope = {
            msg: "We have the following additional information regarding this vehicle. Would you like to view any of them? If not, Select \"I Still Have a Question\" <div class=\"inner\"><button type=\"button\" id=\"closebotbtn\" onclick='vehiclespecs(product_code)'   class=\"dha-choose-button\">Vehicle Specifications</button></div><div class=\"inner\"><button type=\"button\" id=\"closebotbtn\"  onclick='TOTALCOSTOFOWNERSHIP(product_code)' class=\"dha-choose-button\">Cost Of OwnerShip</button> </div> <div class=\"inner\"><button type=\"button\" id=\"closebotbtn\"  onclick='accident(product_code)'  class=\"dha-choose-button\">Title/Lien/Accident Report</button></div><div class=\"inner\"><button type=\"button\" id=\"closebotbtn\"  onclick='MARKETDATA(product_code)' class=\"dha-choose-button\">Market Data</button></div><div class=\"inner\"><button type=\"button\" id=\"closebotbtn\"  onclick='FULLREPORT(product_code)' class=\"dha-choose-button\">Full Report</button></div><div class=\"inner\"><button type=\"button\" id=\"closebotbtn\"  onclick=\"option_custom()\" class=\"dha-choose-button\">I Still Have a Question</button></div><div class=\"inner\"><button type=\"button\" id=\"closebotbtn\"  onclick=\"document.getElementById('dha_robonegotiator_btn_start').click()\" class=\"dha-choose-button\">Go Back</button></div>",
            sender: false
        }
         _autoSend(theEnvelope);     
      
    }, 7500);
}

function TOTALCOSTOFOWNERSHIP(datavindetails) {
	let theEnvelope = {
                msg: "TOTAL COST OF OWNERSHIP",
                sender: "me"
            };
            _send(theEnvelope);
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            var result1 = this.responseText;
            //chatMsgs[0][1][4][4] = ['<div id="accident">result1</div>'];
			let theEnvelope = {
                msg: result1,
                sender: false
            };
            _autoSend(theEnvelope);
        }
    }
    xhr.open('GET', 'http://site4.gst-ready.in/Home/VehicleOwnershipCostPartial?vin='+datavindetails, true);
    xhr.send(null);
	setTimeout(()=>{
        let theEnvelope = {
            msg: "We have the following additional information regarding this vehicle. Would you like to view any of them? If not, Select \"I Still Have a Question\" <div class=\"inner\"><button type=\"button\" id=\"closebotbtn\" onclick='vehiclespecs(product_code)'   class=\"dha-choose-button\">Vehicle Specifications</button></div><div class=\"inner\"><button type=\"button\" id=\"closebotbtn\"  onclick='TOTALCOSTOFOWNERSHIP(product_code)' class=\"dha-choose-button\">Cost Of OwnerShip</button> </div> <div class=\"inner\"><button type=\"button\" id=\"closebotbtn\"  onclick='accident(product_code)'  class=\"dha-choose-button\">Title/Lien/Accident Report</button></div><div class=\"inner\"><button type=\"button\" id=\"closebotbtn\"  onclick='MARKETDATA(product_code)' class=\"dha-choose-button\">Market Data</button></div><div class=\"inner\"><button type=\"button\" id=\"closebotbtn\"  onclick='FULLREPORT(product_code)' class=\"dha-choose-button\">Full Report</button></div><div class=\"inner\"><button type=\"button\" id=\"closebotbtn\"  onclick=\"option_custom()\" class=\"dha-choose-button\">I Still Have a Question</button></div><div class=\"inner\"><button type=\"button\" id=\"closebotbtn\"  onclick=\"document.getElementById('dha_robonegotiator_btn_start').click()\" class=\"dha-choose-button\">Go Back</button></div>",
            sender: false
        }
         _autoSend(theEnvelope);     
      
    }, 7500);
}

function vehiclespecs(datavindetails) {
	let theEnvelope = {
                msg: "VEHICLE SPECS",
                sender: "me"
            };
            _send(theEnvelope);
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
			var result1 = JSON.parse(this.responseText);
            //chatMsgs[0][1][4][4] = ['<div id="vehiclespec></div>'];
			var html='<table class="table">';
		    jQuery.each(result1.dataset.attributes, function (i, val) {
			html=html+'<tr><th class="border-top-0" scope="row">' + i.replace("_", " ") + '</th><td class="border-top-0">' + val + '&nbsp;</td></tr>';});
		    html=html+"</table>";

			let theEnvelope = {
                msg: html,
                sender: false
            };
			_autoSend(theEnvelope);
        }
    }
    xhr.open('GET', 'http://site4.gst-ready.in/Home/VINSpecs?vin='+datavindetails, true);
    xhr.send(null);
	setTimeout(()=>{
        let theEnvelope = {
            msg: "We have the following additional information regarding this vehicle. Would you like to view any of them? If not, Select \"I Still Have a Question\" <div class=\"inner\"><button type=\"button\" id=\"closebotbtn\" onclick='vehiclespecs(product_code)'   class=\"dha-choose-button\">Vehicle Specifications</button></div><div class=\"inner\"><button type=\"button\" id=\"closebotbtn\"  onclick='TOTALCOSTOFOWNERSHIP(product_code)' class=\"dha-choose-button\">Cost Of OwnerShip</button> </div> <div class=\"inner\"><button type=\"button\" id=\"closebotbtn\"  onclick='accident(product_code)'  class=\"dha-choose-button\">Title/Lien/Accident Report</button></div><div class=\"inner\"><button type=\"button\" id=\"closebotbtn\"  onclick='MARKETDATA(product_code)' class=\"dha-choose-button\">Market Data</button></div><div class=\"inner\"><button type=\"button\" id=\"closebotbtn\"  onclick='FULLREPORT(product_code)' class=\"dha-choose-button\">Full Report</button></div><div class=\"inner\"><button type=\"button\" id=\"closebotbtn\"  onclick=\"option_custom()\" class=\"dha-choose-button\">I Still Have a Question</button></div><div class=\"inner\"><button type=\"button\" id=\"closebotbtn\"  onclick=\"document.getElementById('dha_robonegotiator_btn_start').click()\" class=\"dha-choose-button\">Go Back</button></div>",
            sender: false
        }
         _autoSend(theEnvelope);     
      
    }, 7500);
}


function FULLREPORT(datavindetails) {
	let theEnvelope = {
                msg: "FULL REPORT",
                sender: "me"
            };
            _send(theEnvelope);
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            var result1 = JSON.parse(this.responseText);
            var result2 = JSON.stringify(result1.dataset)
            result2 = result2.replace(/["']/g, "");

			var win = window.open(result2, '_blank');
			win.location();
            //window.open(result2, "_blank");
        }
    }
    xhr.open('GET', 'http://site4.gst-ready.in/Home/ViewFullReport?vin='+datavindetails, true);
    xhr.send(null);
	setTimeout(()=>{
        let theEnvelope = {
            msg: "We have the following additional information regarding this vehicle. Would you like to view any of them? If not, Select \"I Still Have a Question\" <div class=\"inner\"><button type=\"button\" id=\"closebotbtn\" onclick='vehiclespecs(product_code)'   class=\"dha-choose-button\">Vehicle Specifications</button></div><div class=\"inner\"><button type=\"button\" id=\"closebotbtn\"  onclick='TOTALCOSTOFOWNERSHIP(product_code)' class=\"dha-choose-button\">Cost Of OwnerShip</button> </div> <div class=\"inner\"><button type=\"button\" id=\"closebotbtn\"  onclick='accident(product_code)'  class=\"dha-choose-button\">Title/Lien/Accident Report</button></div><div class=\"inner\"><button type=\"button\" id=\"closebotbtn\"  onclick='MARKETDATA(product_code)' class=\"dha-choose-button\">Market Data</button></div><div class=\"inner\"><button type=\"button\" id=\"closebotbtn\"  onclick='FULLREPORT(product_code)' class=\"dha-choose-button\">Full Report</button></div><div class=\"inner\"><button type=\"button\" id=\"closebotbtn\"  onclick=\"option_custom()\" class=\"dha-choose-button\">I Still Have a Question</button></div><div class=\"inner\"><button type=\"button\" id=\"closebotbtn\"  onclick=\"document.getElementById('dha_robonegotiator_btn_start').click()\" class=\"dha-choose-button\">Go Back</button></div>",
            sender: false
        }
         _autoSend(theEnvelope);     
      
    }, 7500);
}

function option1() {
    let theEnvelop = {
        msg: "Show me more about this vehicle",
        sender: false
    };

    _customerReply(theEnvelop);
    let theEnvelope = {
        msg: "We have the following additional information regarding this vehicle. Would you like to view any of them? If not, Select \"I Still Have a Question\" <div class=\"inner\"><button type=\"button\" id=\"closebotbtn\" onclick='vehiclespecs(product_code)'   class=\"dha-choose-button\">Vehicle Specifications</button></div><div class=\"inner\"><button type=\"button\" id=\"closebotbtn\"  onclick='TOTALCOSTOFOWNERSHIP(product_code)' class=\"dha-choose-button\">Cost Of OwnerShip</button> </div> <div class=\"inner\"><button type=\"button\" id=\"closebotbtn\"  onclick='accident(product_code)'  class=\"dha-choose-button\">Title/Lien/Accident Report</button></div><div class=\"inner\"><button type=\"button\" id=\"closebotbtn\"  onclick='MARKETDATA(product_code)' class=\"dha-choose-button\">Market Data</button></div><div class=\"inner\"><button type=\"button\" id=\"closebotbtn\"  onclick='FULLREPORT(product_code)' class=\"dha-choose-button\">Full Report</button></div><div class=\"inner\"><button type=\"button\" id=\"closebotbtn\"  onclick=\"option_custom()\" class=\"dha-choose-button\">I Still Have a Question</button></div><div class=\"inner\"><button type=\"button\" id=\"closebotbtn\"  onclick=\"document.getElementById('dha_robonegotiator_btn_start').click()\" class=\"dha-choose-button\">Go Back</button></div>",
        sender: false
    }
    setTimeout(function () {
        _autoSend(theEnvelope);     
    }, 2000);
    // var option1Message = "<div id='option1Form'><form class='msg-width'  id='robo_send_to_seller_form'><div class='has-valid-err' id='has-valid-option1'></div><input type='text' id='option1-vin' class='dha-input-count-offer' name='option1_vin' value='VIN : "+product_code+"' placeholder='VIN NUMBER'><input type='text' maxlength='20' class='dha-input-count-offer' placeholder='Your Name' name='option1_buyer_name'><input type='email' id='option1_buyer_email' class='dha-input-count-offer' name='option1_buyer_email'  placeholder='Your Email'><textarea class='dha-input-count-offer' id='option1_buyer_message' placeholder='Please enter message.' name='option1_buyer_message'> </textarea><button type='button' id='robo-option1-sendmail-to-seller' onClick='sendMailToSeller(event)'  class='dha-find-seller-button'>Submit</button></form></div>";
    // setTimeout(function () {
    //     let theEnvelope = {
    //     msg: option1Message,
    //     sender: false
    //     };
    //     _autoSend(theEnvelope);
    // }, 2000);
}

function option_custom() {
    var option1Message = "<div id='option1Form'><form class='msg-width'  id='robo_send_to_seller_form'><div class='has-valid-err' id='has-valid-option1'></div><input type='text' id='option1-vin' class='dha-input-count-offer' name='option1_vin' value='VIN : "+product_code+"' placeholder='VIN NUMBER'><input type='text' maxlength='20' class='dha-input-count-offer' placeholder='Your Name' name='option1_buyer_name'><input type='email' id='option1_buyer_email' class='dha-input-count-offer' name='option1_buyer_email'  placeholder='Your Email'><textarea class='dha-input-count-offer' id='option1_buyer_message' placeholder='Please enter message.' name='option1_buyer_message'> </textarea><button type='button' id='robo-option1-sendmail-to-seller' onClick='sendMailToSeller(event)'  class='dha-find-seller-button'>Submit</button></form></div>";
    setTimeout(function () {
        let theEnvelope = {
        msg: option1Message,
        sender: false
        };
        _autoSend(theEnvelope);
    }, 2000);
}

function option2() {
    let theEnvelop = {
        msg: "Checking and Negotiating a Special Deal",
        sender: false
    };
    _customerReply(theEnvelop);
    var option2Message = "Wonderful.  Just to confirm, you want to negotiate for the following vihicle:<br> VIN# "+product_code+"<div class='robo-custom-control custom-radio'><input id='agree_option2_yes' type='radio' class='inline-radio' name='agree_option2_select' value='yes'><label for='agree_option2_yes'><span>&nbsp;</span>Yes</label>&nbsp;&nbsp;&nbsp;<input id='agree_option2_no' type='radio' class='inline-radio' name='agree_option2_select' value='no'><label for='agree_option2_no'><span>&nbsp;</span>No</label></div><div align='right'><button type='button' class='dha-find-seller-button' id='check_option2_btn' onclick='confirmProduct(event)'>Submit <i class='fa fa-arrow-right' aria-hidden='true'></i></button><span id='agree_error' style='color:red;'></span></div>";
    setTimeout(function () {
        let theEnvelope = {
        msg: option2Message,
        sender: false
        };
        _autoSend(theEnvelope);
    }, 2000);
}

function option_coupon() {
        var discount_data = {
            'api_key': api_key,
            'upc_product_code': product_code,
            'seller_email': seller_email,
            'plugin_mode' : ROBO_PLUGIN_MODE,
            'json_result': 1
        };
    
        var postURLDiscount = API_ENDPOINT+"/api-786-get-product-discounts?";
        var xmlHttpDiscount = new XMLHttpRequest();
        var urlPostfixDiscount= '';
        for (const key in discount_data) {
            if (discount_data[key] !== undefined && discount_data[key] !== null) {
                urlPostfixDiscount = urlPostfixDiscount + '&' + key + '=' + discount_data[key];
            }
        }
        postURLDiscount = postURLDiscount + urlPostfixDiscount;
        xmlHttpDiscount.open("POST", postURLDiscount);
        xmlHttpDiscount.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200){
                var data = JSON.parse(this.responseText);
                if (data.success !== undefined && data.success === false) {
                    if (data.errors !== undefined) {
                        Object.keys(data.errors).forEach(function(key) {
                            // textClass = 'text-danger';
                            let theErr = {
                                msg: data.errors[key],
                                sender: false ,
                                elementId : 'robo-xcdgbg-discount-error'
                            };
                            _autoSend(theErr);
                        });
                        setTimeout(function () {
                            displayModal('modal_find_seller_yes');
                        }, 3000);
                    }
                } else {
                    if (Array.isArray(data.data) && data.data.length) {
                        discountData = data.data;console.log(discountData)
                        var specificAvailable = 0;
                        for (let i = 0; i < discountData.length; i++) {
                            if( discountData[i].applicability === 'specific') {
                                var discountTitle = discountData[i].title.toLowerCase();
                                var isDiscountFYIAvailable = 0;
                                if(discountTitle.substring(0, 6) === 'coupon') {
                                    couponCodes.push(discountTitle.substring(7, discountTitle.length));
                                    isDiscountFYIAvailable = 1;
                                }
                                if(discountTitle.substring(0, 3) === 'fyi') {
                                    var enteredFyimssg = discountTitle.substring(4, discountTitle.length);
                                    if(discountData[i].expiry_date == '') {
                                        var fyimsg = 'We also offer this special incentive: '+enteredFyimssg+' for limited time.';
                                    } else {
                                        var fyimsg = 'We also offer this special incentive: '+enteredFyimssg+' until '+ discountData[i].expiry_date;
                                    }
                                    fyiMessages.push(fyimsg);
                                    isDiscountFYIAvailable = 1;
                                }
                                if(isDiscountFYIAvailable == 0) {
                                    specificAvailable = 1;
                                }
                            }
                        }
                       
                        if(specificAvailable === 1) {
                            let theEnvelop = {
                                msg: "Great! I can help with that. Currently, we have the following discounts: <br/> "+discountData[0]['title']+" until "+discountData[0]['expiry_date']+" <br/> "+discountData[1]['title']+" until "+discountData[1]['expiry_date']+" etc.",
                                sender: false
                            };
                            _autoSend(theEnvelop);
                            var option2Message = "We also have the following rebates: <br> "+discountData[0]['title']+" until "+discountData[0]['expiry_date']+" <br>"+discountData[1]['title']+" until "+discountData[1]['expiry_date']+"";
                         
                            let theEnvelope = {
                            msg: option2Message,
                            sender: false
                            };
                            _autoSend(theEnvelope);
                            // textClass = 'text-danger';
                            var slectDisT = "This vehicle also supports coupon codes if you have one. "
                            theEnvelope = {
                                msg: slectDisT,
                                sender: false ,
                                elementId : 'robo-alert-discount-title'
                            };

                            if(Array.isArray(couponCodes) && couponCodes.length) {
                                _autoSend(theEnvelope);
                            }
    
                            for (let i = 0; i < discountData.length; i++) {
                                if( discountData[i].applicability === 'specific') {
                                    var discountTitle = discountData[i].title.toLowerCase();
    
                                    if(discountTitle.substring(0, 6) === 'coupon') {
                                    } else if(discountTitle.substring(0, 3) === 'fyi') {
                                    } else {
                                        var slectDisTAv = "I am qualified for  '"+ discountData[i].title+"' : <div class='robo-custom-control custom-radio'><input id='discount_terms_yes_"+ discountData[i].id+"' type='radio' class='inline-radio' name='av_discount"+discountData[i].id+"' value='yes'><label for='discount_terms_yes_"+ discountData[i].id+"'><span>&nbsp;</span>Yes</label>&nbsp;&nbsp;&nbsp;<input id='discount_terms_no_"+ discountData[i].id+"' type='radio' class='inline-radio' name='av_discount"+discountData[i].id+"' value='no'><label for='discount_terms_no_"+ discountData[i].id+"'><span>&nbsp;</span>No</label></div>"
                                        theEnvelope = {
                                            msg: slectDisTAv,
                                            sender: false ,
                                            elementId : 'robo-alert-discount-av-'+discountData[i].id
                                        };
                                        // _autoSend(theEnvelope);
                                    }
                                }
                            }
                            
                            setTimeout(() => {
                                var slectDisTAv = "Would you like to negotiate for a deal?<div class='robo-custom-control custom-radio'><input id='discount_terms_yes_' type='radio' class='inline-radio' name='av_discount_custom' value='yes'><label for='discount_terms_yes_'><span>&nbsp;</span>Yes</label>&nbsp;&nbsp;&nbsp;<input id='discount_terms_no_' type='radio' class='inline-radio' name='av_discount_custom' value='no'><label for='discount_terms_no_'><span>&nbsp;</span>No</label><div align='right'><button type='button' class='dha-find-seller-button' id='apply_buyer_discount_btn' onclick='av_discount_custom()'>Submit <i class='fa fa-arrow-right' aria-hidden='true'></i></button><span id='seller_error' style='color:red;'></span></div></div>"
                                theEnvelope = {
                                    msg: slectDisTAv,
                                    sender: false ,
                                    elementId : 'robo-alert-discount-av-'
                                };
                                _autoSend(theEnvelope);
                            }, 2000)
                            

                        } else {
                            sleep(2000);
                            // textClass = 'text-danger';
                            var alertmssg = "We didn't find any rebate.";
                            theEnvelope = {
                                msg: alertmssg,
                                sender: false ,
                                elementId : 'robo-alert-no-discount-mssg'
                            };
                            _autoSend(theEnvelope);
                            if(couponCodes.length > 0 && couponSection == 0) {
                                applyBuyerDiscount();
                            } else {
                                // textClass = 'text-success';
                                let theEnvelope2 = {
                                    msg: 'Sending your details and offer to our system for further matching.',
                                    sender: false
                                };
                                _autoSend(theEnvelope2);
                                displayModal('modal_time_pass_1');
                                preferences =1;
                                send_buyer_offer();
                                showsendBuyerMssg = 1;
                            }
                        }
    
                    } else {
                        sleep(2000);
                        // textClass = 'text-danger';
                        var alertmssg = "We didn't find any rebate.";
                        theEnvelope = {
                            msg: alertmssg,
                            sender: false ,
                            elementId : 'robo-alert-no-discount-mssg'
                        };
                        _autoSend(theEnvelope);
                        if(couponCodes.length > 0 && couponSection == 0) {
                            applyBuyerDiscount();
                        } else {
                            // textClass = 'text-success';
                            let theEnvelope2 = {
                                msg: 'Sending your details and offer to our system for further matching.',
                                sender: false
                            };
                            _autoSend(theEnvelope2);
                            displayModal('modal_time_pass_1');
                            preferences =1;
                            send_buyer_offer();
                            showsendBuyerMssg = 1;
                        }
                    }
                }
            }
        };
        xmlHttpDiscount.send();
        xmlHttpDiscount.onerror = function() { // only triggers if the request couldn't be made at all
            final_message = {
                msg: 'Technical error: system under maintenance - please revisit us after couple of hours.',
                sender: false ,
                elementId : 'robo-ohnhfcthn-eroor0custom-mssg'
    
            };
            _autoSend(final_message);
            closeChat = 1 ;
            setTimeout(closeChatBotRobo , 35000);
        };
 
}

function av_discount_custom() {
    var dd = document.querySelector('input[name="av_discount_custom"]:checked').value;
    if(dd == "yes") {
         option2();
    } else {
        ForceCloseChatBotRobo();
    }
}

function confirmProduct(e){
    var buyerResponseOption2 = document.querySelector('input[name="agree_option2_select"]:checked').value;
    if(buyerResponseOption2 === 'yes') {
        let theEnvelop = {
            msg: "Yes. It's true.",
            sender: false
        };
        _customerReply(theEnvelop);
        var buyerYesMessage = 'I can help with negotiating a special deal for these options. How will you be purchasing the vehicle?<br/><div class="inner"><button type="button"  onclick="purchasingAndPayingOption()" class="dha-choose-button">Paying Cash</button></div><div class="inner"><button type="button"  onclick="purchasingAndFinancingOption()"  class="dha-choose-button">Financing </button> </div> <div class="inner"><button type="button"  onclick="leasingOption()" class="dha-choose-button">Leasing </button> </div>';
        // textClass = 'text-danger';
        setTimeout(function(){
            let theEnvelope = {
                msg: buyerYesMessage,
                sender: false
            };
            _autoSend(theEnvelope);
        }, 2000);
       
    } 
    else{
        let theEnvelop = {
            msg: "No. It is not same",
            sender: false
        };
        _customerReply(theEnvelop);

        // textClass = 'text-danger';
        let theEnvelope = {
            msg: chatMsgs[0][1],
            sender: false
        };
        _sendoptions(theEnvelope);
    }
}

function purchasingAndPayingOption() {
    let theEnvelop = {
        msg: "Paying Cash",
        sender: false
    };
    _customerReply(theEnvelop);
    // textClass = 'text-danger';
    setTimeout (function(){
        let theEnvelope = {
            msg: chatMsgs[1][1],
            sender: false
        };
        _autoSend(theEnvelope);
    }, 2000);
}

function purchasingAndFinancingOption() {
    let theEnvelop = {
        msg: "Financing",
        sender: false
    };
    _customerReply(theEnvelop);
    // textClass = 'text-danger';
    setTimeout (function() {
        // let theEnvelope = {
        //     msg: 'Coming soon ....',
        //     sender: false
        // };
        // _autoSend(theEnvelope);
        purchasingAndFinancingOptionNext();
    }, 2000);
}

function purchasingAndFinancingOptionNext() {
    IsPurchasingAndFinanceSection = 1;
    textClass = 'text-danger';
    let theEnvelope = {
        msg: "Let’s start. I will help you get monthly installment for your purchase needs. ",
        sender: false
    };
    _autoSend(theEnvelope);
    var financeOptionAvailable = 0;
    var sellerFinaceParameterUrl = API_ENDPOINT+"/api-786-get-seller-finance-parameters?";
    var xmlHttpSellerfinance = new XMLHttpRequest();
    var urlPostFinance= '';
    var finance_data = {
        'api_key': api_key,
        'upc_product_code': product_code,
        'seller_email': seller_email,
        'plugin_mode' : ROBO_PLUGIN_MODE,
        'json_result': 1
    };
    for (const key in finance_data) {
        if (finance_data[key] !== undefined && finance_data[key] !== null) {
            urlPostFinance = urlPostFinance + '&' + key + '=' + finance_data[key];
        }
    }
    var FinanceParameterArray = [];
    var optionfinanceHtml = '';
    var postURLFinance = sellerFinaceParameterUrl + urlPostFinance;
    xmlHttpSellerfinance.open("POST", postURLFinance);
    xmlHttpSellerfinance.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200){
            if(this.responseText != null && this.responseText != ''){
                var data = JSON.parse(this.responseText);
                if(data.seller_finance_parameters) {
                    prodFinanceParameters = data.seller_finance_parameters.seller_finance_sub_parameters;
                    for(var lCount=0;lCount<prodFinanceParameters.length;lCount++) {
                        if(!FinanceParameterArray.includes(prodFinanceParameters[lCount].duration_in_month)){
                            FinanceParameterArray.push(prodFinanceParameters[lCount].duration_in_month);
                            financeOptionAvailable = 1;
                            optionfinanceHtml += "<input id='finance_month_options_"+prodFinanceParameters[lCount].duration_in_month+"' type='radio' class='inline-radio' name='finance_options' value='"+prodFinanceParameters[lCount].duration_in_month+"'>&nbsp;<label for='finance_month_options_"+prodFinanceParameters[lCount].duration_in_month+"'><span></span>"+prodFinanceParameters[lCount].duration_in_month+"</label>&nbsp;&nbsp;";
                        }
                    }
                    if(financeOptionAvailable == 1){
                        var chooseMonthtMessage = "Please select the terms (number of months) for your finance/loan options. <div class='robo-custom-control custom-radio'>"+optionfinanceHtml+"</div><div align='right'><button type='button' class='dha-find-seller-button' id='confirm_finance_month_options' onclick='confirmFinanceMonthOptions(event)'>Submit <i class='fa fa-arrow-right' aria-hidden='true'></i></button></div>";
                        textClass = 'text-danger';
                        let theEnvelope = {
                            msg: chooseMonthtMessage,
                            sender: false
                        };
                        _autoSend(theEnvelope);
                    } else{
                        final_message = {
                            msg: 'Dealer is not offering finance options for this vehicle at this time. Please check directly with the dealer.',
                            sender: false ,
                            elementId : 'robo-ohnhfcthn-eroor0custom-mssg-finance'

                        };
                        _autoSend(final_message);
                        closeChat = 1 ;
                        setTimeout(closeChatBotRobo , 35000);
                    }
                }
            }else {
                final_message = {
                    msg: 'Dealer is not offering finance options for this vehicle at this time. Please check directly with the dealer',
                    sender: false ,
                    elementId : 'robo-ohnhfcthn-eroor0custom-mssg-lease'

                };
                _autoSend(final_message);
                closeChat = 1 ;
                setTimeout(closeChatBotRobo , 35000);
            }
        }
    };
    xmlHttpSellerfinance.send();
    xmlHttpSellerfinance.onerror = function() { // only triggers if the request couldn't be made at all
        final_message = {
            msg: 'Technical error: system under maintenance - please revisit us after couple of hours.',
            sender: false ,
            elementId : 'robo-ohnhfcthn-eroor0custom-mssg-finance'

        };
        _autoSend(final_message);
        closeChat = 1 ;
        setTimeout(closeChatBotRobo , 35000);
    };
}

function confirmFinanceMonthOptions() {
    buyerFinanceOptionsValueMonth = document.querySelector('input[name="finance_options"]:checked').value;
    if(buyerFinanceOptionsValueMonth != ''){
        document.getElementById('confirm_finance_month_options').style.display='none';
        var optionFinanceCreditScoreHtml = '';
        for(var lCount=0;lCount<prodFinanceParameters.length;lCount++) {
            if(buyerFinanceOptionsValueMonth == prodFinanceParameters[lCount].duration_in_month){
                financeOptionAvailable = 1;
                optionFinanceCreditScoreHtml += "<input id='finance_credi_score_options_"+prodFinanceParameters[lCount].credit_score+"' type='radio' class='inline-radio' name='finance_options_credit_score' value='"+prodFinanceParameters[lCount].seller_finance_param_id+"|"+prodFinanceParameters[lCount].duration_in_month+"|"+prodFinanceParameters[lCount].credit_score+"|"+prodFinanceParameters[lCount].interest_rate+"'>&nbsp;<label for='finance_credi_score_options_"+prodFinanceParameters[lCount].credit_score+"'><span></span>"+prodFinanceParameters[lCount].credit_score+"</label>&nbsp;&nbsp;";
            }
        }
        var chooseMonthMiletMessage = "Please select your credit score/ history level (* This will help us to offer you appropriate interest rate): <div class='robo-custom-control custom-radio'>"+optionFinanceCreditScoreHtml+"</div><div align='right'><button type='button' class='dha-find-seller-button' id='confirm_finance_credit_score_options' onclick='confirmFinanceCreditScoreOptions(event)'>Submit <i class='fa fa-arrow-right' aria-hidden='true'></i></button></div>";
        textClass = 'text-danger';
        let theEnvelope = {
            msg: chooseMonthMiletMessage,
            sender: false
        };
        _autoSend(theEnvelope);
    }
}

function confirmFinanceCreditScoreOptions() {
    buyerFinanceOptionsValueCreditScore = document.querySelector('input[name="finance_options_credit_score"]:checked').value;
    if(buyerFinanceOptionsValueCreditScore != ''){
        document.getElementById('confirm_finance_credit_score_options').style.display='none';
        var estimatedDownPaymentMessage = "Thanks.  Let’s get your estimated down payment/security deposit you can pay.  More you pay upfront, lower your monthly installment would be. Some dealers want first payment and other fees to be covered as part of this so your actual principle payment will be lower than this. ";
        textClass = 'text-danger';
        let theEnvelope = {
            msg: estimatedDownPaymentMessage,
            sender: false
        };
        _autoSend(theEnvelope);
        setTimeout(function () {
            var leaseTadeInMessage = "Enter your upfront payment / security deposit/ down payment: <div id='finance_options_tradein_mssg'><div class='inline-box'>"+selectCurrency+"<input style='width:75%;font-size: 18px;' type='text' class='dha-input-count-offer' name='finance_upfront_payment'  placeholder='Please enter value' id='finance_upfront_payment_text'> <button type='button' id='finance_upfront_payment_text_bttn' onClick='goToFinanceTradeIn()' class='dha-find-seller-button'>Submit</button></div> </div>";
            textClass = 'text-danger';
            let theEnvelope = {
                msg: leaseTadeInMessage,
                sender: false
            };
            _autoSend(theEnvelope);
        }, 1000);
    }
}

function goToFinanceTradeIn() {
    financeUpfrontPayment = document.getElementById('finance_upfront_payment_text').value;
    if(financeUpfrontPayment != '') {
        document.getElementById('finance_upfront_payment_text_bttn').style.display='none';
        var leaseTadeInMessage = "Are you planning to trade in a car?<div class='robo-custom-control custom-radio'><input id='finance_tradein_option2_yes' type='radio' class='inline-radio' name='finance_tradein_option2_select' value='yes'>&nbsp;<label for='finance_tradein_option2_yes'><span></span>Yes</label>&nbsp;&nbsp;<input id='finance_tradein_option2_no' type='radio' class='inline-radio' name='finance_tradein_option2_select' value='no'><label for='finance_tradein_option2_no'><span></span>No</label></div><div align='right'><button type='button' class='dha-find-seller-button' id='finance_mssg_confirm_lease_tradein' onclick='confirmFinanceTradeIn(event)'>Submit <i class='fa fa-arrow-right' aria-hidden='true'></i></button></span></div>";
        textClass = 'text-danger';
        let theEnvelope = {
            msg: leaseTadeInMessage,
            sender: false
        };
        _autoSend(theEnvelope);
    }
}

function confirmFinanceTradeIn() {
    var financeTradeInConfirm = document.querySelector('input[name="finance_tradein_option2_select"]:checked').value;
    if(financeTradeInConfirm === 'yes') {
        document.getElementById('finance_mssg_confirm_lease_tradein').style.display='none';
        var mssg = "Please enter an estimated trade in value for your car:  <div id='estimated_trade_in_value'><div class='inline-box'>"+selectCurrency+"<input style='width:75%;font-size: 18px;' type='text' class='dha-input-count-offer' name='finance_estimated_trade_in'  placeholder='Please enter value' id='finance_upfront_payment_text_estimated_trade_in'> <button type='button' id='finance_upfront_payment_estimated_tadein_bttn' onClick='goToMonthlyPaymentFinance()' class='dha-find-seller-button'>Submit</button></div><br>(* This is estimated and will be used for your monthly lease calculations only) </div>";
        textClass = 'text-danger';
        let theEnvelope = {
            msg: mssg,
            sender: false
        };
        _autoSend(theEnvelope);

    }else{
        document.getElementById('finance_mssg_confirm_lease_tradein').style.display='none';
        goToMonthlyPaymentFinance();
    }
}

function goToMonthlyPaymentFinance() {
    if(document.getElementById('finance_upfront_payment_text_estimated_trade_in')) {
        financeTradeInValueCust = document.getElementById('finance_upfront_payment_text_estimated_trade_in').value;
        document.getElementById('finance_upfront_payment_estimated_tadein_bttn').style.display='none';
    }else {
        financeTradeInValueCust = 0;
    }
    var mssg = "Enter your estimated monthly payment you are willing to pay for this vehicle:  <div id='estimated_monthly_install_section'><div class='inline-box'>"+selectCurrency+"<input style='width:75%;font-size: 18px;' type='text' class='dha-input-count-offer' name='estimated_monthly_payment'  placeholder='Please enter value' id='finance_estimated_monthly_payment'> <button type='button' id='finance_estimated_monthly_payment_bttn' onClick='showFinanceOptionMssgsecond()' class='dha-find-seller-button'>Submit</button></div></div>";
    textClass = 'text-danger';
    let theEnvelope = {
        msg: mssg,
        sender: false
    };
    _autoSend(theEnvelope);
}

function showFinanceOptionMssgsecond() {
    financeEstimatedMonthlyPayment = document.getElementById('finance_estimated_monthly_payment').value;
    if(financeEstimatedMonthlyPayment != '') {
        document.getElementById('finance_estimated_monthly_payment_bttn').style.display='none';
        var mssg = "For negotiating a great deal, we would like to find out your highest monthly installment limit (we will use it only if needed) so we can close this deal.  Naturally, your actual payment could be lower than your highest committed monthly installment offer:";
        textClass = 'text-danger';
        let theEnvelope = {
            msg: mssg,
            sender: false
        };
        _autoSend(theEnvelope);

        var mssg33 = "Please enter your highest monthly installment amount:   <div id='highest_monthly_install_section'><div class='inline-box'>"+selectCurrency+"<input style='width:75%;font-size: 18px;' type='text' class='dha-input-count-offer' name='highest_monthly_payment'  placeholder='Please enter value' id='highest_monthly_payment_finance'> <button type='button' id='highest_monthly_payment_finance_bttn' onClick='financeAboutToCheck()' class='dha-find-seller-button'>Submit</button></div></div>";
         theEnvelope = {
            msg: mssg33,
            sender: false
        };
        _autoSend(theEnvelope);
    }
}

function financeAboutToCheck() {
    financehighestMonthlyPayment = document.getElementById('highest_monthly_payment_finance').value;
    if(financehighestMonthlyPayment != '') {
        document.getElementById('highest_monthly_payment_finance_bttn').style.display='none';
        var mssg = "We are about to check with this dealer if they can match your offer/ price range.  Please provide following information:<div id='buyer_financeInfo_form'><form class='msg-width'  id='buyer_financeInfo_form_data'><div class='has-valid-err' style='color: red' id='finance_buyer_error'></div><input type='text' style='border: aliceblue;margin-bottom: 10px;font-size: 17px;' id='finance_buyer_name' class='dha-input-count-offer' name='finance_buyer_name'  placeholder='Your Name'><input type='email' id='finance_buyer_email' style='border: aliceblue;margin-bottom: 10px;font-size: 17px;' class='dha-input-count-offer' name='finance_buyer_email'  placeholder='Your Email'><input type='text' id='finance_buyer_phone' class='dha-input-count-offer' style='border: aliceblue;margin-bottom: 10px;font-size: 17px;' name='finance_buyer_phone'  placeholder='Your Contact No'><input type='text' id='finance_buyer_zip' maxlength='6' style='border: aliceblue;margin-bottom: 10px;font-size: 17px;' class='dha-input-count-offer' name='finance_buyer_zip'  placeholder='Your ZipCode'><button type='button' style='width: 93%' id='robo_finance_buyer_info' onClick='submitFinanceBuyerInfo(event)'  class='dha-find-seller-button'>Submit</button></form><br/>I am ok to receive email and text messages for this deal only.  <br/>Dealer can contact me for further information if we can not close the deal here. </div>";
        textClass = 'text-danger';
        let theEnvelope = {
            msg: mssg,
            sender: false
        };
        _autoSend(theEnvelope);
    }
}

function submitFinanceBuyerInfo() {
    buyer_finance_info_form = document.getElementById('buyer_financeInfo_form_data');
    var err=false;
    var errMsg="";
    if(buyer_finance_info_form.finance_buyer_name.value =='' ){
        err=true;
        errMsg +="<span>Please Enter Name</span><br/>";
    }
    if(buyer_finance_info_form.finance_buyer_email.value =='' || !robo_validateEmail(buyer_finance_info_form.finance_buyer_email.value)){
        err=true;
        errMsg +="<span>Enter Valid Email</span><br/>";
    }
    if(buyer_finance_info_form.finance_buyer_phone.value =='' || (buyer_finance_info_form.finance_buyer_phone.value.length < 10 || buyer_finance_info_form.finance_buyer_phone.value.length > 10)){
        err=true;
        errMsg +="<span>Enter Valid Contact No</span><br/>";
    }
    if(buyer_finance_info_form.finance_buyer_zip.value.toString() =='' || buyer_finance_info_form.finance_buyer_zip.value.toString().length > 6 || buyer_finance_info_form.finance_buyer_zip.value.toString().length < 5){
        err=true;
        errMsg +="<span>Enter Valid ZipCode</span><br/>";
    }
    if(err){
        document.getElementById('finance_buyer_error').innerHTML=errMsg;
        return false;
    }else{
        document.getElementById('finance_buyer_error').innerHTML='';
    }
    document.getElementById("robo_finance_buyer_info").style.display = "none";
    var financeParamValues = buyerFinanceOptionsValueCreditScore.split('|');
    add_finance_buyer_data = {
        'api_key': api_key,
        'buyer_name' : buyer_finance_info_form.finance_buyer_name.value,
        'buyer_email': buyer_finance_info_form.finance_buyer_email.value,
        'buyer_phone': buyer_finance_info_form.finance_buyer_phone.value,
        'buyer_negotiation_mode': negotiation_mode,
        'upc_product_code': product_code,
        'buyer_currency': roboCurrency,
        'buyer_zip': buyer_finance_info_form.finance_buyer_zip.value.toString(),
        'down_payment': financeUpfrontPayment,
        'interest_rate': financeParamValues[3],
        'duration_in_month': financeParamValues[1],
        'credti_score': financeParamValues[2],
        'buyer_finance_offer_price': financeEstimatedMonthlyPayment,
        'buyer_highest_finance_offer_price': financehighestMonthlyPayment,
        'seller_finance_parameter_id': financeParamValues[0],
        'json_result': 1,
        'plugin_mode': ROBO_PLUGIN_MODE
    };
    var sellerFinanceBuyerParameterUrl = API_ENDPOINT+"/api-786-add-buyer-finance-parameters?";
    var xmlHttAddBuyerFinanceParam = new XMLHttpRequest();
    var urlPostBuyerFinance= '';
    for (const key in add_finance_buyer_data) {
        if (add_finance_buyer_data[key] !== undefined && add_finance_buyer_data[key] !== null) {
            urlPostBuyerFinance = urlPostBuyerFinance + '&' + key + '=' + add_finance_buyer_data[key];
        }
    }
    postURLBuyerFinance = sellerFinanceBuyerParameterUrl + urlPostBuyerFinance;
    xmlHttAddBuyerFinanceParam.open("POST", postURLBuyerFinance);
    xmlHttAddBuyerFinanceParam.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200){
            var data = JSON.parse(this.responseText);
            if (data.success) {
                buyerFinanceParamId = data.details.request_id;
                // buyerLeaseParameterToUpdateId = data.buyer_lease_details.id;
                buyerFinanceParameterToUpdateId = data.buyer_finance_details.service_request_id;
                var mssg = "Thanks.  Let me work with our dealer and get the best lease payment/ option for you within your price range.  While I check with a dealer, can you let us know your preferences:";
                textClass = 'text-danger';
                let theEnvelope = {
                    msg: mssg,
                    sender: false
                };
                _autoSend(theEnvelope);

                setTimeout(function () {
                    var mssg = "<div class='msg-width' id='modal_finance_assuming_deal'><legend style='font-size:14px;width: 256px'>Assuming deal goes through, how would you secure / reserve this deal? <form id='assumin_deal_form' onsubmit='form_assuming_deal()' ><select id='assuming_deal_pay_option_finace' style='width: 100%' class='dha-input-count-offer'><option value='100_deposit_by_credit_card'>I will pay $100 deposit through credit card.</option><option value='voucher_by_email'>I would like to get a voucher by email so I can work out arrangement with a dealer. </option><option value='let_seller_contact_me'>Let Dealer/Salesperson contact me by my contact details provided before.</option></select><button type='button' id='assuming-deal-bttn-finance' onClick='assuming_deal_bttn_finance()' class='dha-find-seller-button'>Submit</button></form></div>";
                    textClass = 'text-danger';
                    let theEnvelope = {
                        msg: mssg,
                        sender: false
                    };
                    _autoSend(theEnvelope);
                }, 1000);
            }else {
                final_message = {
                    msg: 'Technical error: system under maintenance - please revisit us after couple of hours.',
                    sender: false ,
                    elementId : 'robo-ohnhfcthn-eroor0custom-mssg-lease'

                };
                _autoSend(final_message);
                closeChat = 1 ;
                setTimeout(closeChatBotRobo , 35000);
            }
        }
    }
    xmlHttAddBuyerFinanceParam.send();
    xmlHttAddBuyerFinanceParam.onerror = function() { // only triggers if the request couldn't be made at all
        final_message = {
            msg: 'Technical error: system under maintenance - please revisit us after couple of hours.',
            sender: false ,
            elementId : 'robo-ohnhfcthn-eroor0custom-mssg-lease'

        };
        _autoSend(final_message);
        closeChat = 1 ;
        setTimeout(closeChatBotRobo , 35000);
    };
}

function assuming_deal_bttn_finance() {
    assumingPayOptionValFinace = document.getElementById('assuming_deal_pay_option_finace').value;
    if(assumingPayOptionValFinace != '') {
        document.getElementById("assuming-deal-bttn-finance").style.display = "none";
        var alertmssg = "Please acknowledge that seller may ask additional income verification and/or credit report before they agree to finance further: <div class='robo-custom-control custom-radio'><input id='finance_acknowledge1_yes' type='radio' class='inline-radio' name='finance_acknowledge1' value='yes'>&nbsp;<label for='finance_acknowledge1_yes'><span></span>I agree</label>&nbsp;&nbsp;<input id='finance_acknowledge1_no' type='radio' class='inline-radio' name='finance_acknowledge1' value='no'><label for='finance_acknowledge1_no'><span></span>I donot agree</label></div><div align='right'><button type='button' class='dha-find-seller-button' id='finance_acknowledge1_button' onclick='financeAcknowledge1(event)'>Submit <i class='fa fa-arrow-right' aria-hidden='true'></i></button></div>";
        theEnvelope = {
            msg: alertmssg,
            sender: false ,
            elementId : 'robo-alert-assuming-deal1'
        };
        _autoSend(theEnvelope);
    }
}

function financeAcknowledge1() {
    var financeAcknowledge1Value = document.querySelector('input[name="finance_acknowledge1"]:checked').value;
    if(financeAcknowledge1Value == 'yes') {
        document.getElementById("finance_acknowledge1_button").style.display = "none";
        var alertmssg = "Please acknowledge that we are negotiating based on applicable sales tax for the seller’s zip code. Local state laws may dictate changes based on your residence and hence there will be minor changes in final monthly calculations for the taxes: <div class='robo-custom-control custom-radio'><input id='finance_acknowledge2_yes' type='radio' class='inline-radio' name='finance_acknowledge2' value='yes'>&nbsp;<label for='finance_acknowledge2_yes'><span></span>I agree</label>&nbsp;&nbsp;<input id='finance_acknowledge2_no' type='radio' class='inline-radio' name='finance_acknowledge2' value='no'><label for='finance_acknowledge2_no'><span></span>I donot agree</label></div><div align='right'><button type='button' class='dha-find-seller-button' id='finance_acknowledge2_button' onclick='financeAcknowledge2(event)'>Submit <i class='fa fa-arrow-right' aria-hidden='true'></i></button></div>"
        theEnvelope = {
            msg: alertmssg,
            sender: false ,
            elementId : 'robo-alert-assumingdeal2'
        };
        _autoSend(theEnvelope);
    } else {
        document.getElementById("finance_acknowledge1_button").style.display = "none";
        textClass = 'text-danger';
        var mesgalert = 'Based on your counteroffer, credit history, financial needs, and trade-in needs, we would recommend that you go to our dealership and our friendly staff will be able to help you to serve your needs. Thanks for trying our automated chatbot.';
        theEnvelope = {
            msg: mesgalert,
            sender: false ,
            elementId : 'robo-alert-assuming-exit'
        };
        _autoSend(theEnvelope);
        closeChat = 1 ;
        setTimeout(closeChatBotRobo, 20000);
    }
}

function financeAcknowledge2() {
    var financeAcknowledge2Value = document.querySelector('input[name="finance_acknowledge2"]:checked').value;
    if(financeAcknowledge2Value == 'yes') {
        document.getElementById("finance_acknowledge2_button").style.display = "none";
        var alertmssg = "Please acknowledge that we are negotiating based on cap cost, residual cost, lease term, finance charges and all major charges. There may be additional documentation/ registration fees, additional mileage fees (in case of leasing) and lease/ finance related fees. Those administrative and DMV related fees are not counted in these negotiations.<div class='robo-custom-control custom-radio'><input id='finance_acknowledge3_yes' type='radio' class='inline-radio' name='finance_acknowledge3' value='yes'>&nbsp;<label for='finance_acknowledge3_yes'><span></span>I agree</label>&nbsp;&nbsp;<input id='finance_acknowledge3_no' type='radio' class='inline-radio' name='finance_acknowledge3' value='no'><label for='finance_acknowledge3_no'><span></span>I donot agree</label></div><div align='right'><button type='button' class='dha-find-seller-button' id='finance_acknowledge3_button' onclick='financeAcknowledge3(event)'>Submit <i class='fa fa-arrow-right' aria-hidden='true'></i></button></div>"
        theEnvelope = {
            msg: alertmssg,
            sender: false ,
            elementId : 'robo-alert-assumingdeal4-ooo'
        };
        _autoSend(theEnvelope);
    } else {
        document.getElementById("finance_acknowledge2_button").style.display = "none";
        textClass = 'text-danger';
        var mesgalert = 'Based on your counteroffer, credit history, financial needs, and trade-in needs, we would recommend that you go to our dealership and our friendly staff will be able to help you to serve your needs. Thanks for trying our automated chatbot.';
        theEnvelope = {
            msg: mesgalert,
            sender: false ,
            elementId : 'robo-alert-agree-assumingdeal-uui9'
        };
        _autoSend(theEnvelope);
        closeChat = 1 ;
        setTimeout(closeChatBotRobo, 20000);
    }
}

function financeAcknowledge3(){
    var financeAcknowledge3Value = document.querySelector('input[name="finance_acknowledge3"]:checked').value;
    if(financeAcknowledge3Value == 'yes') {
        document.getElementById("finance_acknowledge3_button").style.display = "none";
        var mssgLeaseAuto = "Please acknowledge that we are negotiating based on down payment & trade in value as entered. Any deviation from user entered data will result in a different monthly cost<div class='robo-custom-control custom-radio'><input id='finance_acknowledge4_yes' type='radio' class='inline-radio' name='finance_acknowledge4' value='yes'>&nbsp;<label for='finance_acknowledge4_yes'><span></span>I agree</label>&nbsp;&nbsp;<input id='finance_acknowledge4_no' type='radio' class='inline-radio' name='finance_acknowledge4' value='no'><label for='finance_acknowledge4_no'><span></span>I donot agree</label></div><div align='right'><button type='button' class='dha-find-seller-button' id='finance_acknowledge4_button' onclick='financeGetDealStatus(event)'>Submit <i class='fa fa-arrow-right' aria-hidden='true'></i></button></div>";
        textClass = 'text-danger';
        theEnvelope = {
            msg: mssgLeaseAuto,
            sender: false ,
            elementId : 'robo-alert-assumingdeal4-ooo-8888'
        };
        _autoSend(theEnvelope);
    } else {
        document.getElementById("finance_acknowledge3_button").style.display = "none";
        textClass = 'text-danger';
        var mesgalert = 'Based on your counteroffer, credit history, financial needs, and trade-in needs, we would recommend that you go to our dealership and our friendly staff will be able to help you to serve your needs. Thanks for trying our automated chatbot.';
        theEnvelope = {
            msg: mesgalert,
            sender: false ,
            elementId : 'robo-alert-agree-assumingdeal-uui9'
        };
        _autoSend(theEnvelope);
        closeChat = 1 ;
        setTimeout(closeChatBotRobo, 20000);
    }
}

var financeLoopCount = 1;
var timerInc = 2000;
function financeGetDealStatus() {
    //start
    var financeAcknowledge4Value = document.querySelector('input[name="finance_acknowledge4"]:checked').value;
    if(financeAcknowledge4Value == 'yes') {
        financeLoopCount++;
        var url = API_ENDPOINT+"/api-786-check-deal-status?plugin_mode="+ROBO_PLUGIN_MODE+"&api_key=" + api_key + "&upc_product_code=" +
        product_code + "&request_id=" + buyerFinanceParamId;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", url, true);
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                var data2 = JSON.parse(this.responseText);
                if (data2.message !== undefined) {
                    if (data2.message === 'failed') {
                        textClass = 'text-danger';
                        final_message = {
                            msg: 'Based on your counteroffer, credit history, financial needs, and trade-in needs, we would recommend that you go to our dealership and our friendly staff will be able to help you to serve your needs. Thanks for trying our automated chatbot.',
                            sender: false ,
                            elementId : 'robo-xcdgbgrt-lllll-dddghg'
                        };

                        _autoSend(final_message);
                        closeChat = 1 ;
                        setTimeout(closeChatBotRobo, 20000);

                    } else if (data2.message === 'too_low' || data2.message === 'negotiation_with_no_mode') {
                        if( leaseCheckAgainCustom == 1) {
                            textClass = 'text-danger';
                            final_message = {
                                msg: 'Sorry. We tried one more time but we could not close the deals with your defined requirements.  Our friendly and knowledgeable staff can help you further.  Please contact our sales department for further needs.',
                                sender: false ,
                                elementId : 'robo-ohnhfcthn'

                            };
                            _autoSend(final_message);
                            closeChat = 1 ;
                            setTimeout(closeChatBotRobo , 35000);
                        } else {
                            textClass = 'text-danger';
                            final_message = {
                                msg: 'Thanks for your patience. We just heard from our independent match engine service and it seems your monthly installment range will not work for our dealer given your selection of various terms, security deposit, trade in value and monthly installment offers.  We can try one more time to check with dealer if there can be a match.',
                                sender: false ,
                                elementId : 'robo-xcdgbgrt-lllll-9898hjhh'
                            };

                            _autoSend(final_message);

                            var mssg33898 = "Give your final/ highest monthly installment offer: <div id='highest_monthly_install_section_again'><div class='inline-box'>"+selectCurrency+"<input style='width:75%;font-size: 18px;' type='text' class='dha-input-count-offer' name='highest_monthly_payment_again'  placeholder='Please enter value' id='highest_monthly_payment_finance_again'> <button type='button' id='highest_monthly_payment_finance_bttn_again' onClick='updateBuyerFinanceParam()' class='dha-find-seller-button'>Submit</button></div></div>";
                            theEnvelope = {
                                msg: mssg33898,
                                sender: false
                            };
                            _autoSend(theEnvelope);
                        }
                    } else if (data2.message === 'deal_closed') {
                        var urlFinanceClose = API_ENDPOINT+"/api-786-get-deal-results?plugin_mode="+ROBO_PLUGIN_MODE+"&api_key=" + api_key + "&upc_product_code=" +product_code +"&request_id=" + buyerFinanceParamId;
                        var xmlhttpFinanceClose = new XMLHttpRequest();
                        xmlhttpFinanceClose.open("GET", urlFinanceClose, true);
                        xmlhttpFinanceClose.onreadystatechange = function () {
                            if (this.readyState === 4 && this.status === 200) {
                                var data = JSON.parse(this.responseText);
                                if (data.closed_deal === undefined) {
                                    if(financeLoopCount < 8){
                                        timerInc = timerInc*2;
                                        setTimeout(function () {
                                            financeGetDealStatus();
                                        }
                                        , timerInc);
                                    }else{
                                        final_message = {
                                            msg: 'Technical error: system under maintenance - please revisit us after couple of hours.',
                                            sender: false ,
                                            elementId : 'robo-ohnhfcthn-eroor0custom-mssg'

                                        };
                                        _autoSend(final_message);
                                        closeChat = 1 ;
                                        setTimeout(closeChatBotRobo , 35000);
                                    }
                                } else{
                                    var financeFAmount = data.closed_deal[0].final_amount;

                                    var financeParamValues = buyerFinanceOptionsValueCreditScore.split('|');
                                    var offerMessage = '<span style="color: #3da911">Congratulations!! ';
                                    offerMessage += 'Our dealer has agreed with your offer. ';
                                    offerMessage +=  'While resident location and local governance rules may change some taxes and fees (acquisition fees, documentation fees), we are confident that you will be able to secure this deal with following terms.<br/><br/>';
                                    offerMessage += 'Request Id: #'+buyerFinanceParameterToUpdateId+'<br/>';
                                    offerMessage += "Seller’s Email Address: "+seller_email+"<br/>";
                                    offerMessage += 'Vehicle Leased under this agreement:  VIN#:'+ROBO_UPC_CODE+'<br/>';
                                    offerMessage += 'Mutually Agreed Monthly Installment: '+roboCurrency+' '+data.closed_deal[0].type1_final_amount+'<br/>';
                                    offerMessage += 'Total Finance Terms:  '+financeParamValues[1]+' months<br/>';
                                    offerMessage += 'Final Vehicle Cost:  '+ roboCurrency +' '+ financeFAmount +' <br/>';
                                    offerMessage += 'Discounts/Rebates Applied:  '+ roboCurrency +' 0 <br/>';
                                    offerMessage += 'Security Deposit/ Down Payment: '+roboCurrency+' '+financeUpfrontPayment+'  * This may cover fees and first installment in some cases.<br/>';
                                    offerMessage += 'Trade-In  Credit (estimated): '+roboCurrency+' '+ financeTradeInValueCust +'<br/>';
                                    offerMessage += 'Your Reported Credit History Range: '+financeParamValues[2] +'<br/>';

                                    offerMessage += '<br/><br/> * Please contact our dealer for getting additional information, exact tax, fees and other charges.   You have 7 days to cancel this contract and get your deposit back.';
                                    offerMessage += '</span>';

                                    financeSuccessMssg = {
                                        msg: offerMessage,
                                        sender: false ,
                                        elementId : 'rohffbnhfggt-discount-leasseee'
                                    };
                                    _autoSend(financeSuccessMssg);
                                    if (assumingPayOptionValFinace == '100_deposit_by_credit_card') {
                                        agreedAmount = 100;
                                        var depositMessage = {
                                            msg: '<span class="text-success">Now, let\'s pay a deposit <b> '+roboCurrency +' '+ agreedAmount + '</b> to secure this deal with this dealer.</span>',
                                            sender: false ,
                                            elementId : 'gdgdfgdhsdhdyyyy'
                                        };
                                        _autoSend(depositMessage);
                                        setTimeout(
                                            function () {
                                                displayModal('modal_payment_confirm');
                                                if (ROBO_PAYMENT_GATEWAY == 'paypal') {
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
                                        leaseSuccessMssg = {
                                            msg: 'You will hear more from our dealer.Thanks',
                                            sender: false ,
                                            elementId : 'rohffbnhfggt-discount-leasseee-final-mssg'
                                        };
                                        _autoSend(leaseSuccessMssg);
                                    }
                                }
                            }
                        }
                        xmlhttpFinanceClose.send();
                        xmlhttpFinanceClose.onerror = function() { // only triggers if the request couldn't be made at all
                            final_message = {
                                msg: 'Technical error: system under maintenance - please revisit us after couple of hours.',
                                sender: false ,
                                elementId : 'robo-ohnhfcthn-eroor0custom-mssg'

                            };
                            _autoSend(final_message);
                            closeChat = 1 ;
                            setTimeout(closeChatBotRobo , 35000);
                        };
                    } else {
                        textClass = 'text-danger';
                        final_message = {
                            msg: 'Based on your counteroffer, credit history, financial needs, and trade-in needs, we would recommend that you go to our dealership and our friendly staff will be able to help you to serve your needs. Thanks for trying our automated chatbot.',
                            sender: false ,
                            elementId : 'robo-ohnhfcthn'

                        };
                        _autoSend(final_message);
                        closeChat = 1 ;
                        setTimeout(closeChatBotRobo , 35000);
                    }
                }
            }
        }
        xmlhttp.send();
        xmlhttp.onerror = function() { // only triggers if the request couldn't be made at all
            final_message = {
                msg: 'Technical error: system under maintenance - please revisit us after couple of hours.',
                sender: false ,
                elementId : 'robo-ohnhfcthn-eroor0custom-mssg'

            };
            _autoSend(final_message);
            closeChat = 1 ;
            setTimeout(closeChatBotRobo , 35000);
        };
    } else {
        document.getElementById("finance_acknowledge4_button").style.display = "none";
        textClass = 'text-danger';
        var mesgalert = 'Based on your counteroffer, credit history, financial needs, and trade-in needs, we would recommend that you go to our dealership and our friendly staff will be able to help you to serve your needs. Thanks for trying our automated chatbot.';
        theEnvelope = {
            msg: mesgalert,
            sender: false ,
            elementId : 'robo-alert-agree-assumingdeal-uui9889'
        };
        _autoSend(theEnvelope);
        closeChat = 1 ;
        setTimeout(closeChatBotRobo, 20000);
    }
    //end
}

function updateBuyerFinanceParam() {
    var highest_monthly_payment_finance_again  = document.getElementById('highest_monthly_payment_finance_again').value;
    if(highest_monthly_payment_finance_again != '') {
        document.getElementById("highest_monthly_payment_finance_bttn_again").style.display = "none";
        var sellerFinanceParameterUrlUpdate = API_ENDPOINT+"/api-786-update-buyer-finance-parameters?";
        var xmlHttpSellerFinanceUpdate = new XMLHttpRequest();
        var urlPostFinanceUpdate= '';
        var update_finance_data = {
            'api_key': api_key,
            'buyer_name' : buyer_finance_info_form.finance_buyer_name.value,
            'buyer_email': buyer_finance_info_form.finance_buyer_email.value,
            'buyer_phone': buyer_finance_info_form.finance_buyer_phone.value,
            'buyer_negotiation_mode': negotiation_mode,
            'upc_product_code': product_code,
            'buyer_currency': roboCurrency,
            'buyer_zip': buyer_finance_info_form.finance_buyer_zip.value.toString(),
            'buyer_highest_finance_offer_price': highest_monthly_payment_finance_again,
            'json_result': 1,
            'plugin_mode': ROBO_PLUGIN_MODE,
            'service_request_id': buyerFinanceParameterToUpdateId
        };
        for (const key in update_finance_data) {
            if (update_finance_data[key] !== undefined && update_finance_data[key] !== null) {
                urlPostFinanceUpdate = urlPostFinanceUpdate + '&' + key + '=' + update_finance_data[key];
            }
        }
        postURLFinanceUpdate = sellerFinanceParameterUrlUpdate + urlPostFinanceUpdate;
        xmlHttpSellerFinanceUpdate.open("POST", postURLFinanceUpdate);
        xmlHttpSellerFinanceUpdate.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200){
                var data = JSON.parse(this.responseText);
                if (data.success) {
                    leaseCheckAgainCustom = 1;
                    textClass = 'text-danger';
                    final_message = {
                        msg: 'Thanks.  Let me check with the dealer one more time. While we are checking with a dealer, can you give us comments on how you find this online negotiation method? ',
                        sender: false ,
                        elementId : 'robo-xcdgbgrt-lllll-9898hjhh-878787-98977434'
                    };

                    _autoSend(final_message);

                    var askForCommentMssg ="<div class='robo-custom-control custom-radio'><textarea class='dha-input-count-offer' id='askForFinanceComment' placeholder='Please enter message.' style='color:#000;font-size: 18px;' name='option1_buyer_message'></textarea></div><div align='right'><button type='button' class='dha-find-seller-button' id='finance_ask_for_comment' onclick='checkDealAgainFunctionFinance(event)'>Submit <i class='fa fa-arrow-right' aria-hidden='true'></i></button></span></div>";
                    textClass = 'text-danger';
                    final_message = {
                        msg: askForCommentMssg,
                        sender: false ,
                        elementId : 'robo-xcdgbgrt-lllll-9898hjhh-878787-98977434-jhjhjh'
                    };

                    _autoSend(final_message);
                }
            }
        }
        xmlHttpSellerFinanceUpdate.send();
        xmlHttpSellerFinanceUpdate.onerror = function() { // only triggers if the request couldn't be made at all
            final_message = {
                msg: 'Technical error: system under maintenance - please revisit us after couple of hours.',
                sender: false ,
                elementId : 'robo-ohnhfcthn-eroor0custom-mssg-lease'

            };
            _autoSend(final_message);
            closeChat = 1 ;
            setTimeout(closeChatBotRobo , 35000);
        };
    }
}

function checkDealAgainFunctionFinance() {
    var askForFinanceComment  = document.getElementById('askForFinanceComment').value;
    if(askForFinanceComment != '') {
        document.getElementById("finance_ask_for_comment").style.display = "none";
        financeGetDealStatus();
    }
}

function leasingOption() {
    let theEnvelop = {
        msg: "Leasing",
        sender: false
    };
    _customerReply(theEnvelop);
    // textClass = 'text-danger';
    setTimeout (function() {
        // let theEnvelope = {
        //     msg: 'Coming soon ....',
        //     sender: false
        // };
        // _autoSend(theEnvelope);
        confirmLeaseProduct();
    }, 2000);
}

function confirmLeaseProduct(e){
    // var buyerResponseLeaseOption2 = document.querySelector('input[name="leasing_first_option2_select"]:checked').value;
    var buyerResponseLeaseOption2 = 'yes';
     if(buyerResponseLeaseOption2 === 'yes') {
         //document.getElementById('lease_mssg_option2_btn').style.display='none';
         var LeaseParameterArray = [];
         var leaseOptionAvailable = 0;
         var optionLeaseHtml = '';
         var sellerLeaseParameterUrl = API_ENDPOINT+"/api-786-get-seller-lease-parameters?";
         var xmlHttpSellerLease = new XMLHttpRequest();
         var urlPostLease= '';
         var lease_data = {
             'api_key': api_key,
             'upc_product_code': product_code,
             'seller_email': seller_email,
             'plugin_mode' : ROBO_PLUGIN_MODE,
             'json_result': 1
         };
         for (const key in lease_data) {
             if (lease_data[key] !== undefined && lease_data[key] !== null) {
                 urlPostLease = urlPostLease + '&' + key + '=' + lease_data[key];
             }
         }
         postURLLease = sellerLeaseParameterUrl + urlPostLease;
         xmlHttpSellerLease.open("POST", postURLLease);
         xmlHttpSellerLease.onreadystatechange = function () {
             if (this.readyState === 4 && this.status === 200){
                     if(this.responseText != null && this.responseText != ''){
                     var data = JSON.parse(this.responseText);
                     //if (data.success) {
                     prodLeaseParameters = data.seller_lease_parameters.seller_lease_sub_parameters;
                     leaseTaxRate = data.seller_lease_parameters.tax_rate;
                     for(var lCount=0;lCount<prodLeaseParameters.length;lCount++) {
                         if(!LeaseParameterArray.includes(prodLeaseParameters[lCount].duration_in_month)){
                             LeaseParameterArray.push(prodLeaseParameters[lCount].duration_in_month);
                             leaseOptionAvailable = 1;
                             optionLeaseHtml += "<input id='lease_month_options_"+prodLeaseParameters[lCount].duration_in_month+"' type='radio' class='inline-radio' name='lease_options' value='"+prodLeaseParameters[lCount].duration_in_month+"'><label for='lease_month_options_"+prodLeaseParameters[lCount].duration_in_month+"'><span></span>"+prodLeaseParameters[lCount].duration_in_month+"</label>&nbsp;&nbsp;&nbsp;";
                         }
                     }
                     if(leaseOptionAvailable == 1){
                         var chooseMonthtMessage = "I will help you get the perfect lease arrangement with this dealer.Please select the terms (number of months) you want to lease this vehicle for: <div class='robo-custom-control custom-radio'>"+optionLeaseHtml+"</div><div align='right'><button type='button' class='dha-find-seller-button' id='confirm_lease_month_options' onclick='confirmLeaseMonthOptions(event)'>Submit <i class='fa fa-arrow-right' aria-hidden='true'></i></button></div>";
                         textClass = 'text-danger';
                         let theEnvelope = {
                             msg: chooseMonthtMessage,
                             sender: false
                         };
                         _autoSend(theEnvelope);
                     } else{
                         final_message = {
                             msg: 'Dealer is not offering lease options for this vehicle at this time. Please check directly with the dealer.',
                             sender: false ,
                             elementId : 'robo-ohnhfcthn-eroor0custom-mssg-lease'
 
                         };
                         _autoSend(final_message);
                         closeChat = 1 ;
                         setTimeout(closeChatBotRobo , 35000);
                     }
                     } else {
                     final_message = {
                         msg: 'Dealer is not offering lease options for this vehicle at this time. Please check directly with the dealer',
                         sender: false ,
                         elementId : 'robo-ohnhfcthn-eroor0custom-mssg-lease'
 
                     };
                     _autoSend(final_message);
                     closeChat = 1 ;
                     setTimeout(closeChatBotRobo , 35000);
                 }
             }
         };
         xmlHttpSellerLease.send();
         xmlHttpSellerLease.onerror = function() { // only triggers if the request couldn't be made at all
             final_message = {
                 msg: 'Technical error: system under maintenance - please revisit us after couple of hours.',
                 sender: false ,
                 elementId : 'robo-ohnhfcthn-eroor0custom-mssg-lease'
 
             };
             _autoSend(final_message);
             closeChat = 1 ;
             setTimeout(closeChatBotRobo , 35000);
         };
 
     } else{
         document.getElementById('lease_mssg_option2_btn').style.display='none';
         textClass = 'text-danger';
         let theEnvelope = {
             msg: chatMsgs[0][1],
             sender: false
         };
         _autoSend(theEnvelope);
     }
 }

 function confirmLeaseMonthOptions() {
    buyerLeaseOptionsValueMonth = document.querySelector('input[name="lease_options"]:checked').value;
    if(buyerLeaseOptionsValueMonth != ''){
        document.getElementById('confirm_lease_month_options').style.display='none';
        var optionLeaseMilesHtml = '';
        for(var lCount=0;lCount<prodLeaseParameters.length;lCount++) {
            if(buyerLeaseOptionsValueMonth == prodLeaseParameters[lCount].duration_in_month){
                leaseOptionAvailable = 1;
                optionLeaseMilesHtml += "<input id='lease_month_options_"+prodLeaseParameters[lCount].miles_allowed_per_year+"' type='radio' class='inline-radio' name='lease_options_miles' value='"+prodLeaseParameters[lCount].seller_lease_parameter_id+"|"+prodLeaseParameters[lCount].duration_in_month+"|"+prodLeaseParameters[lCount].miles_allowed_per_year+"|"+prodLeaseParameters[lCount].residual_value+"'><label for='lease_month_options_"+prodLeaseParameters[lCount].miles_allowed_per_year+"'><span></span>"+prodLeaseParameters[lCount].miles_allowed_per_year+"</label>&nbsp;&nbsp;&nbsp;";
            }
        }
        var chooseMonthMiletMessage = "Please select annual miles limit you need (* please check with dealer for additional miles cost): <div class='robo-custom-control custom-radio'>"+optionLeaseMilesHtml+"</div><div align='right'><button type='button' class='dha-find-seller-button' id='confirm_lease_mile_options' onclick='confirmLeaseMileOptions(event)'>Submit <i class='fa fa-arrow-right' aria-hidden='true'></i></button></div>";
        textClass = 'text-danger';
        let theEnvelope = {
            msg: chooseMonthMiletMessage,
            sender: false
        };
        _autoSend(theEnvelope);
    }
}

function confirmLeaseMileOptions(){
    buyerLeaseOptionsValueMiles = document.querySelector('input[name="lease_options_miles"]:checked').value;
    if(buyerLeaseOptionsValueMiles != ''){
        document.getElementById('confirm_lease_mile_options').style.display='none';
        var estimatedDownPaymentMessage = "Thanks.  Let’s get your estimated down payment/security deposit you can pay.  More you pay upfront, lower your monthly installment would be. Some dealers want first payment and other fees to be covered as part of this so your actual principle payment will be lower than this.";
        textClass = 'text-danger';
        let theEnvelope = {
            msg: estimatedDownPaymentMessage,
            sender: false
        };
        _autoSend(theEnvelope);
        setTimeout(function () {
            var leaseTadeInMessage = "Enter your upfront payment / security deposit/ down payment: <div id='lease_options_tradein_mssg'><div class='inline-box'>"+selectCurrency+"<input style='width:75%;font-size: 18px;' type='text' class='dha-input-count-offer' name='lease_upfront_payment'  placeholder='Please enter value' id='lease_upfront_payment_text'> <button type='button' id='lease_upfront_payment_text_bttn' onClick='goToLeaseTradeIn()' class='dha-find-seller-button'>Submit</button></div> </div>";
            textClass = 'text-danger';
            let theEnvelope = {
                msg: leaseTadeInMessage,
                sender: false
            };
            _autoSend(theEnvelope);
        }, 1000);
    }
}


function goToLeaseTradeIn() {
    leaseUpfrontPayment = document.getElementById('lease_upfront_payment_text').value;
    if(leaseUpfrontPayment != '') {
        document.getElementById('lease_upfront_payment_text_bttn').style.display='none';
        var leaseTadeInMessage = "Are you planning to trade in a car?<div class='robo-custom-control custom-radio'><input id='leasing_tradein_option2_yes' type='radio' class='inline-radio' name='leasing_tradein_option2_select' value='yes'><label for='leasing_tradein_option2_yes'><span></span>Yes</label>&nbsp;&nbsp;&nbsp;<input id='leasing_tradein_option2_no' type='radio' class='inline-radio' name='leasing_tradein_option2_select' value='no'><label for='leasing_tradein_option2_no'><span></span>No</label></div><div align='right'><button type='button' class='dha-find-seller-button' id='lease_mssg_confirm_lease_tradein' onclick='confirmLeaseTradeIn(event)'>Submit <i class='fa fa-arrow-right' aria-hidden='true'></i></button></span></div>";
        textClass = 'text-danger';
        let theEnvelope = {
            msg: leaseTadeInMessage,
            sender: false
        };
        _autoSend(theEnvelope);
    }
}

function confirmLeaseTradeIn() {
    var leaseTradeInConfirm = document.querySelector('input[name="leasing_tradein_option2_select"]:checked').value;
    if(leaseTradeInConfirm === 'yes') {
        document.getElementById('lease_mssg_confirm_lease_tradein').style.display='none';
        var mssg = "Please enter an estimated trade in value for your car:  <div id='estimated_trade_in_value'><div class='inline-box'>"+selectCurrency+"<input style='width:75%;font-size: 18px;' type='text' class='dha-input-count-offer' name='lease_estimated_trade_in'  placeholder='Please enter value' id='lease_upfront_payment_text_estimated_trade_in'> <button type='button' id='lease_upfront_payment_estimated_tadein_bttn' onClick='goToMonthlyPayment()' class='dha-find-seller-button'>Submit</button></div><br>(* This is estimated and will be used for your monthly lease calculations only) </div>";
        textClass = 'text-danger';
        let theEnvelope = {
            msg: mssg,
            sender: false
        };
        _autoSend(theEnvelope);

    }else{
        document.getElementById('lease_mssg_confirm_lease_tradein').style.display='none';
        goToMonthlyPayment();
    }
}

function goToMonthlyPayment() {
    if(document.getElementById('lease_upfront_payment_text_estimated_trade_in')) {
        leaseTradeInValueCust = document.getElementById('lease_upfront_payment_text_estimated_trade_in').value;
        document.getElementById('lease_upfront_payment_estimated_tadein_bttn').style.display='none';
    }else {
        leaseTradeInValueCust = 0;
    }
    var mssg = "Enter your estimated monthly payment you are willing to pay for this vehicle:  <div id='estimated_monthly_install_section'><div class='inline-box'>"+selectCurrency+"<input style='width:75%;font-size: 18px;' type='text' class='dha-input-count-offer' name='estimated_monthly_payment'  placeholder='Please enter value' id='lease_estimated_monthly_payment'> <button type='button' id='lease_estimated_monthly_payment_bttn' onClick='showLeaseOptionMssgsecond()' class='dha-find-seller-button'>Submit</button></div></div>";
    textClass = 'text-danger';
    let theEnvelope = {
        msg: mssg,
        sender: false
    };
    _autoSend(theEnvelope);
}

function showLeaseOptionMssgsecond() {
    leaseEstimatedMonthlyPayment = document.getElementById('lease_estimated_monthly_payment').value;
    if(leaseEstimatedMonthlyPayment != '') {
        document.getElementById('lease_estimated_monthly_payment_bttn').style.display='none';
        var mssg = "For negotiating a great deal, we would like to find out your highest monthly installment limit so we can check with dealer if we can close this deal.  Naturally your actual lease payment could be lower than your highest committed offer:";
        textClass = 'text-danger';
        let theEnvelope = {
            msg: mssg,
            sender: false
        };
        _autoSend(theEnvelope);

        var mssg33 = "Please enter your highest monthly installment amount:   <div id='highest_monthly_install_section'><div class='inline-box'>"+selectCurrency+"<input style='width:75%;font-size: 18px;' type='text' class='dha-input-count-offer name='highest_monthly_payment'  placeholder='Please enter value' id='highest_monthly_payment_lease'> <button type='button' id='highest_monthly_payment_lease_bttn' onClick='leaseAboutToCheck()' class='dha-find-seller-button'>Submit</button></div></div>";
         theEnvelope = {
            msg: mssg33,
            sender: false
        };
        _autoSend(theEnvelope);
    }
}

function leaseAboutToCheck() {
    leasehighestMonthlyPayment = document.getElementById('highest_monthly_payment_lease').value;
    if(leasehighestMonthlyPayment != '') {
        document.getElementById('highest_monthly_payment_lease_bttn').style.display='none';
        var mssg = "We are about to check with this dealer if they can match your offer/ price range.  Please provide following information:<div id='buyer_leaseInfo_form'><form class='msg-width'  id='buyer_leaseInfo_form_data'><div class='has-valid-err' id='lease_buyer_error' style='color: red'></div><input type='text' id='lease_buyer_name' style='border: aliceblue;margin-bottom: 10px;font-size: 17px;' class='dha-input-count-offer' name='lease_buyer_name'  placeholder='Your Name'><input type='email' id='Lease_buyer_email' style='border: aliceblue;margin-bottom: 10px;font-size: 17px;' class='dha-input-count-offer' name='lease_buyer_email'  placeholder='Your Email'><input type='text' id='lease_buyer_phone' style='border: aliceblue;margin-bottom: 10px;font-size: 17px;' class='dha-input-count-offer' name='lease_buyer_phone'  placeholder='Your Contact No'><input type='text' id='lease_buyer_zip' maxlength='6' style='border: aliceblue;margin-bottom: 10px;font-size: 17px;' class='dha-input-count-offer' name='lease_buyer_zip'  placeholder='Your ZipCode'><button type='button' id='robo_lease_buyer_info' onClick='submitLeaseBuyerInfo(event)'  class='dha-find-seller-button' style='width: 93%;'>Submit</button></form><br/></div>";
        textClass = 'text-danger';
        let theEnvelope = {
            msg: mssg,
            sender: false
        };
        _autoSend(theEnvelope);
    }
}

function submitLeaseBuyerInfo() {
    buyer_lease_info_form = document.getElementById('buyer_leaseInfo_form_data');
    var err=false;
    var errMsg="";
    if(buyer_lease_info_form.lease_buyer_name.value =='' ){
        err=true;
        errMsg +="<span>Please Enter Name</span><br/>";
    }
    if(buyer_lease_info_form.lease_buyer_email.value =='' || !robo_validateEmail(buyer_lease_info_form.lease_buyer_email.value)){
        err=true;
        errMsg +="<span>Enter Valid Email</span><br/>";
    }
    if(buyer_lease_info_form.lease_buyer_phone.value =='' || (buyer_lease_info_form.lease_buyer_phone.value.length < 10 || buyer_lease_info_form.lease_buyer_phone.value.length > 10)){
        err=true;
        errMsg +="<span>Enter Valid Contact No</span><br/>";
    }
    if(buyer_lease_info_form.lease_buyer_zip.value.toString() =='' || buyer_lease_info_form.lease_buyer_zip.value.toString().length > 6 || buyer_lease_info_form.lease_buyer_zip.value.toString().length < 5){
        err=true;
        errMsg +="<span>Enter Valid ZipCode</span><br/>";
    }
    if(err){
        document.getElementById('lease_buyer_error').innerHTML=errMsg;
        return false;
    }else{
        document.getElementById('lease_buyer_error').innerHTML='';
    }
    document.getElementById("robo_lease_buyer_info").style.display = "none";
    var leaseParamValues = buyerLeaseOptionsValueMiles.split('|');
    add_lease_buyer_data = {
        'api_key': api_key,
        'buyer_name' : buyer_lease_info_form.lease_buyer_name.value,
        'buyer_email': buyer_lease_info_form.lease_buyer_email.value,
        'buyer_phone': buyer_lease_info_form.lease_buyer_phone.value,
        'buyer_negotiation_mode': negotiation_mode,
        'upc_product_code': product_code,
        'buyer_currency': roboCurrency,
        'buyer_zip': buyer_lease_info_form.lease_buyer_zip.value.toString(),
        'down_payment': leaseUpfrontPayment,
        'trade_in_value': leaseTradeInValueCust,
        'duration_in_month': leaseParamValues[1],
        'residual_value': leaseParamValues[3],
        'miles_allowed_per_year': leaseParamValues[2],
        'buyer_lease_offer_price': leaseEstimatedMonthlyPayment,
        'buyer_highest_lease_offer_price': leasehighestMonthlyPayment,
        'seller_lease_parameter_id': leaseParamValues[0],
        'json_result': 1,
        'plugin_mode': ROBO_PLUGIN_MODE
    };
    var sellerLeaseBuyerParameterUrl = API_ENDPOINT+"/api-786-add-buyer-lease-parameters?";
    var xmlHttAddBuyerLeaseParam = new XMLHttpRequest();
    var urlPostBuyerLease= '';
    for (const key in add_lease_buyer_data) {
        if (add_lease_buyer_data[key] !== undefined && add_lease_buyer_data[key] !== null) {
            urlPostBuyerLease = urlPostBuyerLease + '&' + key + '=' + add_lease_buyer_data[key];
        }
    }
    postURLBuyerLease = sellerLeaseBuyerParameterUrl + urlPostBuyerLease;
    xmlHttAddBuyerLeaseParam.open("POST", postURLBuyerLease);
    xmlHttAddBuyerLeaseParam.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200){
            var data = JSON.parse(this.responseText);
            if (data.success) {
                buyerLeaseParamId = data.details.request_id;
                // buyerLeaseParameterToUpdateId = data.buyer_lease_details.id;
                 buyerLeaseParameterToUpdateId = data.buyer_lease_details.service_request_id;
                var mssg = "Thanks.  Let me work with our dealer and get the best lease payment/ option for you within your price range.  While I check with a dealer, can you let us know your preferences:";
                textClass = 'text-danger';
                let theEnvelope = {
                    msg: mssg,
                    sender: false
                };
                _autoSend(theEnvelope);

                setTimeout(function () {
                    var chooseMonthMiletMessage = "How’s your credit rating overall:  <div class='robo-custom-control custom-radio'><input id='credit_rating_overall_excellent' type='radio' class='inline-radio' name='credit_overall_rating' value='Excellent'><label for='credit_rating_overall_excellent'><span></span>Excellent</label>&nbsp;&nbsp;<input id='credit_rating_overall_good' type='radio' class='inline-radio' name='credit_overall_rating' value='Good'><label for='credit_rating_overall_good'><span></span>Good</label>&nbsp;&nbsp;<input id='credit_rating_overall_average' type='radio' class='inline-radio' name='credit_overall_rating' value='Average'><label for='credit_rating_overall_average'><span></span>Average</label><br/><input id='credit_rating_overall_somewhatpoor' type='radio' class='inline-radio' name='credit_overall_rating' value='Somewhat poor'><label for='credit_rating_overall_somewhatpoor'><span></span>Somewhat poor</label>&nbsp;&nbsp;<input id='credit_rating_overall_verypoor' type='radio' class='inline-radio' name='credit_overall_rating' value='Very poor'><label for='credit_rating_overall_verypoor'><span></span>Very poor</label>&nbsp;&nbsp;</div><div align='right'><button type='button' class='dha-find-seller-button' id='credit_rating_overall_bttn' onclick='afterCreditRatingConfirm(event)'>Submit <i class='fa fa-arrow-right' aria-hidden='true'></i></button></div>";
                    textClass = 'text-danger';
                    let theEnvelope = {
                        msg: chooseMonthMiletMessage,
                        sender: false
                    };
                    _autoSend(theEnvelope);
                }, 1000);
            }else {
                final_message = {
                    msg: 'Technical error: system under maintenance - please revisit us after couple of hours.',
                    sender: false ,
                    elementId : 'robo-ohnhfcthn-eroor0custom-mssg-lease'

                };
                _autoSend(final_message);
                closeChat = 1 ;
                setTimeout(closeChatBotRobo , 35000);
            }
        }
    }
    xmlHttAddBuyerLeaseParam.send();
    xmlHttAddBuyerLeaseParam.onerror = function() { // only triggers if the request couldn't be made at all
        final_message = {
            msg: 'Technical error: system under maintenance - please revisit us after couple of hours.',
            sender: false ,
            elementId : 'robo-ohnhfcthn-eroor0custom-mssg-lease'

        };
        _autoSend(final_message);
        closeChat = 1 ;
        setTimeout(closeChatBotRobo , 35000);
    };
}


function afterCreditRatingConfirm() {
    var creditOverallValue = document.querySelector('input[name="credit_overall_rating"]:checked').value;
    if(creditOverallValue != '') {
        document.getElementById('credit_rating_overall_bttn').style.display='none';
        var mssg = "<div class='msg-width' id='modal_lease_assuming_deal'><legend style='font-size:14px;width: 260px'>Assuming deal goes through, how would you secure / reserve this deal? <form id='assumin_deal_form' onsubmit='form_assuming_deal()' ><select id='assuming_deal_pay_option' style='width: 100%' class='dha-input-count-offer'><option value='100_deposit_by_credit_card'>I will pay $100 deposit through credit card.</option><option value='voucher_by_email'>I would like to get a voucher by email so I can work out arrangement with a dealer. </option><option value='let_seller_contact_me'>Let Dealer/Salesperson contact me by my contact details provided before.</option></select><button type='button' id='assuming-deal-bttn' onClick='assuming_deal_bttn()' class='dha-find-seller-button'>Submit</button></form></div>";
        textClass = 'text-danger';
        let theEnvelope = {
            msg: mssg,
            sender: false
        };
        _autoSend(theEnvelope);
    }
}


function assuming_deal_bttn() {
    assumingPayOptionVal = document.getElementById('assuming_deal_pay_option').value;
    if(assumingPayOptionVal != '') {
        document.getElementById("assuming-deal-bttn").style.display = "none";
        var alertmssg = "Please acknowledge that seller may ask additional income verification and/or credit report before they agree to finance further: <div class='robo-custom-control custom-radio'><input id='lease_acknowledge1_yes' type='radio' class='inline-radio' name='lease_acknowledge1' value='yes'>&nbsp;<label for='lease_acknowledge1_yes'><span></span>I agree</label>&nbsp;&nbsp;<input id='lease_acknowledge1_no' type='radio' class='inline-radio' name='lease_acknowledge1' value='no'><label for='lease_acknowledge1_no'><span></span>I donot agree</label></div><div align='right'><button type='button' class='dha-find-seller-button' id='lease_acknowledge1_button' onclick='leaseAcknowledge1(event)'>Submit <i class='fa fa-arrow-right' aria-hidden='true'></i></button></div>"
        theEnvelope = {
            msg: alertmssg,
            sender: false ,
            elementId : 'robo-alert-assuming-deal1'
        };
        _autoSend(theEnvelope);
    }
}

function leaseAcknowledge1() {
    var leaseAcknowledge1Value = document.querySelector('input[name="lease_acknowledge1"]:checked').value;
    if(leaseAcknowledge1Value == 'yes') {
        document.getElementById("lease_acknowledge1_button").style.display = "none";
        var alertmssg = "Please acknowledge that we are negotiating based on applicable sales tax for the seller’s zip code. Local state laws may dictate changes based on your residence and hence there will be minor changes in final monthly calculations for the taxes: <div class='robo-custom-control custom-radio'><input id='lease_acknowledge2_yes' type='radio' class='inline-radio' name='lease_acknowledge2' value='yes'>&nbsp;<label for='lease_acknowledge2_yes'><span></span>I agree</label>&nbsp;&nbsp;<input id='lease_acknowledge2_no' type='radio' class='inline-radio' name='lease_acknowledge2' value='no'><label for='lease_acknowledge2_no'><span></span>I donot agree</label></div><div align='right'><button type='button' class='dha-find-seller-button' id='lease_acknowledge2_button' onclick='leaseAcknowledge2(event)'>Submit <i class='fa fa-arrow-right' aria-hidden='true'></i></button></div>"
        theEnvelope = {
            msg: alertmssg,
            sender: false ,
            elementId : 'robo-alert-assumingdeal2'
        };
        _autoSend(theEnvelope);
    } else {
        document.getElementById("lease_acknowledge1_button").style.display = "none";
        textClass = 'text-danger';
        var mesgalert = 'Based on your counteroffer, credit history, financial needs, and trade-in needs, we would recommend that you go to our dealership and our friendly staff will be able to help you to serve your needs. Thanks for trying our automated chatbot.';
        theEnvelope = {
            msg: mesgalert,
            sender: false ,
            elementId : 'robo-alert-assuming-exit'
        };
        _autoSend(theEnvelope);
        closeChat = 1 ;
        setTimeout(closeChatBotRobo, 20000);
    }
}

function leaseAcknowledge2() {
    var leaseAcknowledge2Value = document.querySelector('input[name="lease_acknowledge2"]:checked').value;
    if(leaseAcknowledge2Value == 'yes') {
        document.getElementById("lease_acknowledge2_button").style.display = "none";
        var alertmssg = "Please acknowledge that we are negotiating based on cap cost, residual cost, lease term, finance charges and all major charges. There may be additional documentation/ registration fees, additional mileage fees (in case of leasing) and lease/ finance related fees. Those administrative and DMV related fees are not counted in these negotiations.<div class='robo-custom-control custom-radio'><input id='lease_acknowledge3_yes' type='radio' class='inline-radio' name='lease_acknowledge3' value='yes'>&nbsp;<label for='lease_acknowledge3_yes'><span></span>I agree</label>&nbsp;&nbsp;<input id='lease_acknowledge3_no' type='radio' class='inline-radio' name='lease_acknowledge3' value='no'><label for='lease_acknowledge3_no'><span></span>I donot agree</label></div><div align='right'><button type='button' class='dha-find-seller-button' id='lease_acknowledge3_button' onclick='leaseAcknowledge3(event)'>Submit <i class='fa fa-arrow-right' aria-hidden='true'></i></button></div>"
        theEnvelope = {
            msg: alertmssg,
            sender: false ,
            elementId : 'robo-alert-assumingdeal4-ooo'
        };
        _autoSend(theEnvelope);
    } else {
        document.getElementById("lease_acknowledge2_button").style.display = "none";
        textClass = 'text-danger';
        var mesgalert = 'Based on your counteroffer, credit history, financial needs, and trade-in needs, we would recommend that you go to our dealership and our friendly staff will be able to help you to serve your needs. Thanks for trying our automated chatbot.';
        theEnvelope = {
            msg: mesgalert,
            sender: false ,
            elementId : 'robo-alert-agree-assumingdeal-uui9'
        };
        _autoSend(theEnvelope);
        closeChat = 1 ;
        setTimeout(closeChatBotRobo, 20000);
    }
}

function leaseAcknowledge3(){
    var leaseAcknowledge3Value = document.querySelector('input[name="lease_acknowledge3"]:checked').value;
    if(leaseAcknowledge3Value == 'yes') {
        document.getElementById("lease_acknowledge3_button").style.display = "none";
        var mssgLeaseAuto = "Please acknowledge that we are negotiating based on down payment & trade in value as entered. Any deviation from user entered data will result in a different monthly cost<div class='robo-custom-control custom-radio'><input id='lease_acknowledge4_yes' type='radio' class='inline-radio' name='lease_acknowledge4' value='yes'>&nbsp;<label for='lease_acknowledge4_yes'><span></span>I agree</label>&nbsp;&nbsp;<input id='lease_acknowledge4_no' type='radio' class='inline-radio' name='lease_acknowledge4' value='no'><label for='lease_acknowledge4_no'><span></span>I donot agree</label></div><div align='right'><button type='button' class='dha-find-seller-button' id='lease_acknowledge4_button' onclick='leaseGetDealStatus(event)'>Submit <i class='fa fa-arrow-right' aria-hidden='true'></i></button></div>";
        textClass = 'text-danger';
        theEnvelope = {
            msg: mssgLeaseAuto,
            sender: false ,
            elementId : 'robo-alert-assumingdeal4-ooo-8888'
        };
        _autoSend(theEnvelope);
    } else {
        document.getElementById("lease_acknowledge3_button").style.display = "none";
        textClass = 'text-danger';
        var mesgalert = 'Based on your counteroffer, credit history, financial needs, and trade-in needs, we would recommend that you go to our dealership and our friendly staff will be able to help you to serve your needs. Thanks for trying our automated chatbot.';
        theEnvelope = {
            msg: mesgalert,
            sender: false ,
            elementId : 'robo-alert-agree-assumingdeal-uui9'
        };
        _autoSend(theEnvelope);
        closeChat = 1 ;
        setTimeout(closeChatBotRobo, 20000);
    }
}

var leaseLoopCount = 1;
var leasetCount = 2000;
function leaseGetDealStatus() {
    var leaseAcknowledge4Value = document.querySelector('input[name="lease_acknowledge4"]:checked').value;
    if(leaseAcknowledge4Value == 'yes') {
        leaseLoopCount++;
        var url = API_ENDPOINT+"/api-786-check-deal-status?plugin_mode="+ROBO_PLUGIN_MODE+"&api_key=" + api_key + "&upc_product_code=" +
        product_code + "&request_id=" + buyerLeaseParamId;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", url, true);
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                var data2 = JSON.parse(this.responseText);console.log(data2)
                if (data2.message !== undefined) {
                    if (data2.message === 'failed') {console.log('failed')
                        textClass = 'text-danger';
                        final_message = {
                            msg: 'Based on your counteroffer, credit history, financial needs, and trade-in needs, we would recommend that you go to our dealership and our friendly staff will be able to help you to serve your needs. Thanks for trying our automated chatbot.',
                            sender: false ,
                            elementId : 'robo-xcdgbgrt-lllll-dddghg'
                        };

                        _autoSend(final_message);
                        closeChat = 1 ;
                        setTimeout(closeChatBotRobo, 20000);

                    } else if (data2.message === 'too_low' || data2.message === 'negotiation_with_no_mode') {console.log('too_low');
                        console.log(typeof leaseCheckAgainCustom)
                        if( leaseCheckAgainCustom == 1) {
                            textClass = 'text-danger';
                            final_message = {
                                msg: 'Sorry. We tried one more time but we could not close the deals with your defined requirements.  Our friendly and knowledgeable staff can help you further.  Please contact our sales department for further needs.',
                                sender: false ,
                                elementId : 'robo-ohnhfcthn'

                            };
                            _autoSend(final_message);
                            closeChat = 1 ;
                            setTimeout(closeChatBotRobo , 35000);
                        } else {
                            textClass = 'text-danger';
                            final_message = {
                                msg: 'Thanks for your patience. We just heard from our independent match engine service and it seems your monthly installment range will not work for our dealer given your selection of various terms, security deposit, trade in value and monthly installment offers.  We can try one more time to check with dealer if there can be a match.',
                                sender: false ,
                                elementId : 'robo-xcdgbgrt-lllll-9898hjhh'
                            };
                            console.log(typeof final_message)
                            _autoSend(final_message);

                            var mssg33898 = "Give your final/ highest monthly installment offer: <div id='highest_monthly_install_section_again'><div class='inline-box'>"+selectCurrency+"<input style='width:75%;font-size: 18px;border: 1px solid #84b3a9;border-radius: 5px;' type='text' class='form-control oracle-search' name='highest_monthly_payment_again'  placeholder='Please enter value' id='highest_monthly_payment_lease_again'> <button type='button' id='highest_monthly_payment_lease_bttn_again' onClick='updateBuyerLeaseParam()' class='dha-find-seller-button'>Submit</button></div></div>";
                            theEnvelope = {
                                msg: mssg33898,
                                sender: false
                            };
                            _autoSend(theEnvelope);
                        }
                    } else if (data2.message === 'deal_closed') {console.log('deal_closed')
                        var urlLeaseClose = API_ENDPOINT+"/api-786-get-deal-results?plugin_mode="+ROBO_PLUGIN_MODE+"&api_key=" + api_key + "&upc_product_code=" +product_code +"&request_id=" + buyerLeaseParamId;
                        var xmlhttpLeaseClose = new XMLHttpRequest();
                        xmlhttpLeaseClose.open("GET", urlLeaseClose, true);
                        xmlhttpLeaseClose.onreadystatechange = function () {
                            if (this.readyState === 4 && this.status === 200) {
                                var data = JSON.parse(this.responseText);
                                if (data.closed_deal === undefined) {
                                    leasetCount = leasetCount*2;
                                    if(leaseLoopCount < 8){
                                        setTimeout(function () {
                                            leaseGetDealStatus();
                                        }
                                        , leasetCount);
                                    }else{
                                        final_message = {
                                            msg: 'Technical error: system under maintenance - please revisit us after couple of hours.',
                                            sender: false ,
                                            elementId : 'robo-ohnhfcthn-eroor0custom-mssg'

                                        };
                                        _autoSend(final_message);
                                        closeChat = 1 ;
                                        setTimeout(closeChatBotRobo , 35000);
                                    }
                                } else{
                                    var fleaseTaxRate = leaseTaxRate*100;
                                    var leaseFAmount = data.closed_deal[0].final_amount;
                                    var leaseParamValues = buyerLeaseOptionsValueMiles.split('|');
                                    var offerMessage = '<span style="color:##3da911;">Congratulations!! ';
                                    if(leaseCheckAgainCustom == 1){
                                        offerMessage += 'Our dealer has agreed with your offer. ';
                                    }else{
                                        offerMessage += 'Our dealer has agreed with your offer. ';
                                    }
                                    offerMessage +=  'While resident location and local governance rules may change some taxes and fees (acquisition fees, documentation fees), we are confident that you will be able to secure this deal with following terms.<br/><br/>';
                                    offerMessage += 'Request Id: #'+buyerLeaseParameterToUpdateId+'<br/>';
                                    offerMessage += "Seller’s Email Address: "+seller_email+"<br/>";
                                    offerMessage += 'Vehicle Leased under this agreement:  VIN#:'+ROBO_UPC_CODE+'<br/>';
                                    offerMessage += 'Total Lease Terms: '+leaseParamValues[1]+' months<br/>Total Residual Amount: '+roboCurrency+' '+leaseParamValues[3]+' at the end of lease terms<br/>Total Cap Cost (Vehicle Cost): '+ roboCurrency +' '+ leaseFAmount +'<br/>';
                                    offerMessage += 'Discounts/Rebates Applied from MSRP: '+roboCurrency+' 0 <br/>';
                                    offerMessage += 'State Tax Fees Calculated based on: '+fleaseTaxRate+'% * Actual may change <br/>';
                                    offerMessage += 'Security Deposit/ Down Payment: '+roboCurrency+' '+leaseUpfrontPayment+' * This may cover fees and first installment in some cases<br/>';
                                    offerMessage += 'Trade-In Cost Estimated: '+roboCurrency+' '+leaseTradeInValueCust+'<br/>';
                                    offerMessage += 'Annual Miles allowed: '+leaseParamValues[2]+'<br/>';
                                    offerMessage += 'Negotiated Lease Price: '+roboCurrency+' '+data.closed_deal[0].type1_final_amount+'<br/>';
                                    offerMessage += '<br/><br/> * Please contact our dealer for getting additional information, exact tax, fees and other charges.   You have 7 days to cancel this contract and get your deposit back.';

                                    offerMessage += '</span>';
                                    leaseSuccessMssg = {
                                        msg: offerMessage,
                                        sender: false ,
                                        elementId : 'rohffbnhfggt-discount-leasseee'
                                    };
                                    _autoSend(leaseSuccessMssg);
                                    if (assumingPayOptionVal == '100_deposit_by_credit_card') {
                                        agreedAmount = 100;
                                        var depositMessage = {
                                            msg: '<span class="text-success">Now, let\'s pay a deposit <b> '+roboCurrency +' '+ agreedAmount + '</b> to secure this deal with this dealer.</span>',
                                            sender: false ,
                                            elementId : 'gdgdfgdhsdhdyyyy'
                                        };
                                        _autoSend(depositMessage);
                                        setTimeout(
                                            function () {
                                                displayModal('modal_payment_confirm');
                                                if (ROBO_PAYMENT_GATEWAY == 'paypal') {
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
                                        leaseSuccessMssg = {
                                            msg: 'You will hear more from our dealer.Thanks',
                                            sender: false ,
                                            elementId : 'rohffbnhfggt-discount-leasseee-final-mssg'
                                        };
                                        _autoSend(leaseSuccessMssg);
                                    }
                                }
                            }
                        }
                        xmlhttpLeaseClose.send();
                        xmlhttpLeaseClose.onerror = function() { // only triggers if the request couldn't be made at all
                            final_message = {
                                msg: 'Technical error: system under maintenance - please revisit us after couple of hours.',
                                sender: false ,
                                elementId : 'robo-ohnhfcthn-eroor0custom-mssg'

                            };
                            _autoSend(final_message);
                            closeChat = 1 ;
                            setTimeout(closeChatBotRobo , 35000);
                        };
                    } else {console.log('the rest of case')
                        textClass = 'text-danger';
                        final_message = {
                            msg: 'Based on your counteroffer, credit history, financial needs, and trade-in needs, we would recommend that you go to our dealership and our friendly staff will be able to help you to serve your needs. Thanks for trying our automated chatbot.',
                            sender: false ,
                            elementId : 'robo-ohnhfcthn'

                        };
                        _autoSend(final_message);
                        closeChat = 1 ;
                        setTimeout(closeChatBotRobo , 35000);
                    }
                }
            }
        }
        xmlhttp.send();
        xmlhttp.onerror = function() { // only triggers if the request couldn't be made at all
            final_message = {
                msg: 'Technical error: system under maintenance - please revisit us after couple of hours.',
                sender: false ,
                elementId : 'robo-ohnhfcthn-eroor0custom-mssg'

            };
            _autoSend(final_message);
            closeChat = 1 ;
            setTimeout(closeChatBotRobo , 35000);
        };
    } else {
        document.getElementById("lease_acknowledge4_button").style.display = "none";
        textClass = 'text-danger';
        var mesgalert = 'Based on your counteroffer, credit history, financial needs, and trade-in needs, we would recommend that you go to our dealership and our friendly staff will be able to help you to serve your needs. Thanks for trying our automated chatbot.';
        theEnvelope = {
            msg: mesgalert,
            sender: false ,
            elementId : 'robo-alert-agree-assumingdeal-uui9889'
        };
        _autoSend(theEnvelope);
        closeChat = 1 ;
        setTimeout(closeChatBotRobo, 20000);
    }
}

function updateBuyerLeaseParam() {
    var highest_monthly_payment_lease_again  = document.getElementById('highest_monthly_payment_lease_again').value;
    if(highest_monthly_payment_lease_again != '') {
        document.getElementById("highest_monthly_payment_lease_bttn_again").style.display = "none";
        var sellerLeaseParameterUrlUpdate = API_ENDPOINT+"/api-786-update-buyer-lease-parameters?";
        var xmlHttpSellerLeaseUpdate = new XMLHttpRequest();
        var urlPostLeaseUpdate= '';
        var leaseParamValues = buyerLeaseOptionsValueMiles.split('|');
        var update_lease_data = {
            'api_key': api_key,
            'buyer_name' : buyer_lease_info_form.lease_buyer_name.value,
            'buyer_email': buyer_lease_info_form.lease_buyer_email.value,
            'buyer_phone': buyer_lease_info_form.lease_buyer_phone.value,
            'buyer_negotiation_mode': negotiation_mode,
            'upc_product_code': product_code,
            'buyer_currency': roboCurrency,
            'buyer_zip': buyer_lease_info_form.lease_buyer_zip.value.toString(),
            'down_payment': leaseUpfrontPayment,
            'trade_in_value': leaseTradeInValueCust,
            'duration_in_month': leaseParamValues[1],
            'residual_value': leaseParamValues[3],
            'miles_allowed_per_year': leaseParamValues[2],
            'buyer_lease_offer_price': leaseEstimatedMonthlyPayment,
            'buyer_highest_lease_offer_price': highest_monthly_payment_lease_again,
            'seller_lease_parameter_id': leaseParamValues[0],
            'json_result': 1,
            'plugin_mode': ROBO_PLUGIN_MODE,
            'service_request_id': buyerLeaseParameterToUpdateId
        };
        for (const key in update_lease_data) {
            if (update_lease_data[key] !== undefined && update_lease_data[key] !== null) {
                urlPostLeaseUpdate = urlPostLeaseUpdate + '&' + key + '=' + update_lease_data[key];
            }
        }
        postURLLeaseUpdate = sellerLeaseParameterUrlUpdate + urlPostLeaseUpdate;
        xmlHttpSellerLeaseUpdate.open("POST", postURLLeaseUpdate);
        xmlHttpSellerLeaseUpdate.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200){
                var data = JSON.parse(this.responseText);
                if (data.success) {
                    leaseCheckAgainCustom = 1;
                    textClass = 'text-danger';
                    final_message = {
                        msg: 'Thanks.  Let me check with the dealer one more time. While we are checking with a dealer, can you give us comments on how you find this online negotiation method? ',
                        sender: false ,
                        elementId : 'robo-xcdgbgrt-lllll-9898hjhh-878787-98977434'
                    };

                    _autoSend(final_message);

                    var askForCommentMssg ="<div class='robo-custom-control custom-radio'><textarea class='form-control oracle-search' style='width:75%;font-size: 18px;border: 1px solid #84b3a9;border-radius: 5px;color: black' id='askForLeaseComment' placeholder='Please enter message.' style='color:#fff;' name='option1_buyer_message'></textarea></div><div align='right'><button type='button' class='dha-find-seller-button' id='lease_ask_for_comment' onclick='checkDealAgainFunction(event)'>Submit <i class='fa fa-arrow-right' aria-hidden='true'></i></button></span></div>";
                    textClass = 'text-danger';
                    final_message = {
                        msg: askForCommentMssg,
                        sender: false ,
                        elementId : 'robo-xcdgbgrt-lllll-9898hjhh-878787-98977434-jhjhjh'
                    };

                    _autoSend(final_message);
                }
            }
        }
        xmlHttpSellerLeaseUpdate.send();
        xmlHttpSellerLeaseUpdate.onerror = function() { // only triggers if the request couldn't be made at all
            final_message = {
                msg: 'Technical error: system under maintenance - please revisit us after couple of hours.',
                sender: false ,
                elementId : 'robo-ohnhfcthn-eroor0custom-mssg-lease'

            };
            _autoSend(final_message);
            closeChat = 1 ;
            setTimeout(closeChatBotRobo , 35000);
        };
    }
}

function checkDealAgainFunction() {
    var askForLeaseComment  = document.getElementById('askForLeaseComment').value;
    if(askForLeaseComment != '') {
        document.getElementById("lease_ask_for_comment").style.display = "none";
        leaseGetDealStatus();
    }
}

function sendMailToSeller(e) {
    send_email_seller_form = document.getElementById('robo_send_to_seller_form');
    var err=false;
    var errMsg="";
    if(send_email_seller_form.option1_buyer_name.value =='' ){
        err=true;
        errMsg +="<span>Please Enter Name</span>";
    }
    if(send_email_seller_form.option1_buyer_email.value =='' || !robo_validateEmail(send_email_seller_form.option1_buyer_email.value)){
        err=true;
        errMsg +="<span>Enter Valid Email</span>";
    }
    if(send_email_seller_form.option1_buyer_message.value =='' || send_email_seller_form.option1_buyer_message.value.length > 2000){
        err=true;
        errMsg +="<span>Please enter message.</span>";
    }
    if(err){
        document.getElementById('has-valid-option1').innerHTML=errMsg;
        return false;
    }else{
        document.getElementById('has-valid-option1').innerHTML='';
    }
    var option1DataString = '&buyer_name='+send_email_seller_form.option1_buyer_name.value+'&buyer_email='+send_email_seller_form.option1_buyer_email.value+'&mssg='+send_email_seller_form.option1_buyer_message.value;
    var url = API_ENDPOINT +'/api-786-send-mail-seller?plugin_mode='+ROBO_PLUGIN_MODE+'&api_key='+api_key+'&upc_product_code=' + product_code +'&seller_email' +'=' + seller_email+option1DataString;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            var data = JSON.parse(this.responseText);
            document.getElementById('robo-option1-sendmail-to-seller').style.display='none';
            if (data.success !== undefined && data.success === true) {
                var option1Message = "Thanks for your message.  The dealer will get back to you as soon as possible.";
                let theEnvelope = {
                    msg: option1Message,
                    sender: false
                };
                _autoSend(theEnvelope);
                setTimeout(function(){ ForceCloseChatBotRobo() }, 1500);
                
            } else {
                // textClass = 'text-danger';
                var mesgalert = 'Technical error: system under maintenance - please revisit us after couple of hours.';
                theEnvelope = {
                    msg: mesgalert,
                    sender: false ,
                    elementId : 'robo-alert-agree-second-jio-error'
                };
                _autoSend(theEnvelope);
            }
        }
    };
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
    xmlhttp.onerror = function() { // only triggers if the request couldn't be made at all
        final_message = {
            msg: 'Technical error: system under maintenance - please revisit us after couple of hours.',
            sender: false ,
            elementId : 'robo-ohnhfcthn-eroor0custom-mssg'

        };
        _autoSend(final_message);
        closeChat = 1 ;
        setTimeout(closeChatBotRobo , 35000);
    };
}
// if user selected option 3 - Next Steps if you have Special Needs
function option3() {
    let theEnvelop = {
        msg: "Next Steps if you have Special Needs",
        sender: false
    };
    _customerReply(theEnvelop);
    
    let theEnvelope = {
        msg: "Next Steps if you have Special Needs",
        sender: "me"
    };
    _send(theEnvelope);
    chatMsgs[0][1][3] = ['Great! Please select the below options'];
        let theEnvelopeusr = {
            msg: chatMsgs[0][1][3],
            sender: false
        };
        _autoSend(theEnvelopeusr);
    setTimeout(displayoptions3, 3000);
}
function displayoptions3()
{
	chatMsgs[0][1][31] = ['<div id="outer"><br/> <div class="inner"><button type="button" value="How to Trade-In" id="displayoptions3btn"  onclick="option31(this.value)" class="dha-choose-button">I have a Trade-In.</button><button type="button" value="How to Finance/Loan Options" id="displayoptions3btn"  onclick="option31(this.value)"  class="dha-choose-button">I want to finance.</button> <button type="button" value="Test Drive Process" id="displayoptions3btn"  onclick="option31(this.value)"  class="dha-choose-button">I want a test-drive. </button> <button type="button" value="Home Delivery" id="displayoptions3btn"  onclick="option31(this.value)"  class="dha-choose-button">I need the vehicle delivered.</button><button type="button" value="Others" id="displayoptions3btn"  onclick="option31(this.value)"  class="dha-choose-button">Other</button></div></div>'];
	 let theEnvelope = {
			msg: chatMsgs[0][1][31],
			sender: "me"
		};
		_sendoptions(theEnvelope);
}
function option31(e) {console.log(e)
    // let theEnvelop = {
    //     msg: "How to Trade-In",
    //     sender: false
    // };
    let theEnvelope = {
        msg:   e,
        sender: "me"
    };
    // _customerReply(theEnvelop);

    _send(theEnvelope);


   chatMsgs[0][1][3][1] = ['We’ll let our Sales department know. How would you like to be contacted? <div id=\'modal_trade\'> <div class=\'robo-custom-control custom-radio\'><input id=\'trade_yes\' type=\'radio\' class=\'inline-radio\' name=\'trading_option_selector\' value=\'Call Me\'><label for=\'trade_yes\'><span>&nbsp;</span>Phone</label>&nbsp;&nbsp;&nbsp;<input id=\'trade_no\' type=\'radio\' class=\'inline-radio\' name=\'trading_option_selector\' value=\'Email Me\'><label for=\'trade_no\'><span>&nbsp;</span>Email</label>&nbsp;&nbsp;&nbsp;<input id=\'trade_no\' type=\'radio\' class=\'inline-radio\' name=\'trading_option_selector\' value=\'Text Me\'><label for=\'trade_no\'><span>&nbsp;</span>Text</label></div><div align=\'right\'><button type=\'button\' class=\'dha-find-seller-button\' id=\'trading_yes_no_btn\' onclick=\'option33(event)\'>Submit <i class=\'fa fa-arrow-right\' aria-hidden=\'true\'></i></button><span id=\'seller_error\' style=\'color:red;\'></span></div></div>'];
    let theEnvelope1 = {
        msg: chatMsgs[0][1][3][1],
        sender: false
    };
    _autoSend(theEnvelope1);
    // setTimeout(displayoptions31, 3000);
}

function option33() {
    var type = document.querySelector('input[name="trading_option_selector"]:checked').value;
    option311(type);
}
function displayoptions31()
{
	chatMsgs[0][1][311] = ['<div id="outer"><br/> <div class="inner"><button type="button" value="Email Me" id="closebotbtn"  onclick="option311(this.value)" class="dha-choose-button">Email Me</button><button type="button" id="closebotbtn" value="Call Me"  onclick="option311(this.value)"  class="dha-choose-button">Call Me</button><button type="button" value="Text Me" id="closebotbtn"  onclick="option311(this.value)"  class="dha-choose-button">Text Me</button></div></div>'];
	 let theEnvelope = {
			msg: chatMsgs[0][1][311],
			sender: "me"
		};
		_sendoptions(theEnvelope);

}
function option311(e) {
	 	let theEnvelope = {
                msg:   e,
                sender: "me"
            };
            _send(theEnvelope);
		 var text1;
		 contactdetailsform = e;
switch (e) {
  case "Email Me":
    text1 = "Your Email";
    break;
  case "Call Me":
    text1 = "Your Contact number";
    break;
  case "Text Me":
    text1 = "Your Contact number";
    break;
}

	chatMsgs[0][1][3][1][1] = ["<div id='option1Form'><form class='msg-width'  id='robo_send_to_seller_form_contactdetail'><div class='has-valid-err' id='has-valid-option11'></div><input type='email' id='option1_buyer_email1' class='dha-input-count-offer' name='option1_buyer_email1'  placeholder='"+text1+"'><button type='button' id='robo-option1-sendmail-to-seller' onClick='sendcontactdetailToSeller(event)'  class='dha-find-seller-button'>Submit</button></form></div>"];
  /*  chatMsgs[0][1][3][1][1] = ['<div id="contactdetail">   <div class="inline-box"><legend style="font-size:14px;">Provide us your contact details to reach out you</legend><input type="text" id="options3contactdetail" class="dha-input-count-offer" name="options3contactdetail"  placeholder="Enter your details"> <button type="button" id="robo_preference_btn1" onClick="sendcontactdetailToSeller()" class="dha-find-seller-button"><img src="http://sandbox.robonegotiator.com/js/plugins/assets/img/icon_send.png" width="30px;"></button></div></div>']; */
			let theEnvelope1 = {
                msg: chatMsgs[0][1][3][1][1],
                sender: false
            };
            _autoSend(theEnvelope1);
}
//Coder will send an email with this option/choice from buyer to seller’s email address
function sendcontactdetailToSeller(valut) {
    robo_send_to_seller_form_contactdetail = document.getElementById('robo_send_to_seller_form_contactdetail');
	 var text1;console.log(contactdetailsform, robo_send_to_seller_form_contactdetail)
switch (contactdetailsform) {
  case "Email Me":
    text1 = "Enter Valid Email";
    break;
  case "Call Me":
    text1 = "Enter Valid Contact number";
    break;
  case "Text Me":
    text1 = "Enter Valid Contact number";
    break;
}
    var err=false;
    var errMsg="";
    if(robo_send_to_seller_form_contactdetail.option1_buyer_email1.value =='' || !robo_validateEmail(robo_send_to_seller_form_contactdetail.option1_buyer_email1.value)){
        err=true;
        errMsg +="<span>"+text1+"</span>";
    }
    if(err){
        document.getElementById('has-valid-option11').innerHTML=errMsg;
        return false;
    }else{
        document.getElementById('has-valid-option11').innerHTML='';
    }
    Email.send({
		  Host: "smtp.gmail.com",
		  Port:"25",
		  Username : "alexpatrick2020ap@gmail.com",
		  Password : "Welcome@123",
		  To : 'finesseme945@gmail.com',
		  From : "robonegotiator@gmail.com",
		  Subject : "Contact details for the product - "+product_code,
		  Body : robo_send_to_seller_form_contactdetail.option1_buyer_email1.value,
	}).then(
  //	message => alert("mail sent successfully")
	);
		let theEnvelopeusr = {
                msg: 'Seller will contact you soon',
                sender: false
            };
			_autoSend(theEnvelopeusr);
        closeChat = 1 ;
                            setTimeout(closeChatBotRobo, 7000);

}
function option312(e) {
    let theEnvelope = {
        msg:   e,
        sender: "me"
    };
    _send(theEnvelope);
    let theEnvelope1 = {
        msg: "Thanks for trying the sales bot",
        sender: false
    };
    _autoSend(theEnvelope1);
    closeChat = 1 ;
    setTimeout(closeChatBotRobo, 7000);
}
// Message Declarations
function initChatMsgs(){
    curStep = 1;
	chatMsgs[0]=[];
	chatMsgs[0][1] = ['<div class="inner"><button type="button" id="closebotbtn"  onclick="option1()" class="dha-choose-button">I want to know more about the vehicle.</button></div><div class="inner"><button type="button" id="closebotbtn"  onclick="option_coupon()"  class="dha-choose-button">I want to check for any discounts.</button> </div> <div class="inner"><button type="button" id="closebotbtn"  onclick="option3()"  class="dha-choose-button">I have special vehicle needs. </button>  </div> <div class="inner"><button type="button" id="closebotbtn"  onclick="option2()"  class="dha-choose-button">I want to buy, finance, or lease this vehicle.</button></div>'];
    chatMsgs[1]=[];
    chatMsgs[1][0] = ['Hi! Welcome to RoboNegotiator.<br>I am your Sales Assistant. I can help with anything you need . What do you need help with today?'];
    chatMsgs[1][2] = ['You have Selected to Negotiate on the Product with '+ROBO_NEGOTIATION_MODE+' Mode. For the Seller '+ROBO_SELLER_EMAIL+''];
    chatMsgs[1][1] = ["Let’s get started then. Please enter your counteroffer below:<div id='counterOffer'><div class='dha-has-valid-err' id='robo_err_counterOffer'></div><div class='inline-box'><input type='text' class='dha-input-count-offer' name='counterPrice'  placeholder='Please enter counter offer' id='robo_counter_price'>"+selectCurrency+"<button type='button' id='send_counter_price_btn' onClick='formTestsubmit()' class='dha-choose-button'>Submit</button></div></div>"];
    chatMsgs[1][3] = ["We're sorry, but it seems that we do not have a deal from this seller. Do you still want to provide your offer so that we can try and find a matching seller? <div class='robo-custom-control custom-radio'><input id='find_seller_yes' type='radio' class='inline-radio' name='robo_find_seller' value='yes'><label for='find_seller_yes'><span>&nbsp;</span>Yes</label>&nbsp;&nbsp;&nbsp;<input id='find_seller_no' type='radio' class='inline-radio' name='robo_find_seller' value='no'><label for='find_seller_no'><span>&nbsp;</span>No</label></div><div align='right'><button type='button' class='dha-find-seller-button' id='find_seller_btn' onclick='find_seller_btnonclick(event)'>Submit to Find a New Seller <i class='fa fa-arrow-right' aria-hidden='true'></i></button><span id='seller_error' style='color:red;'></span></div>"];
    chatMsgs[2] = [];
    chatMsgs[2][0] = ["Good News! We have a special deal from this seller. Please enter additional details <br/><hr/>"];
    chatMsgs[2][1] = ["<div id='robo_buyer_data_formdiv'><form class='msg-width'  id='robo_add_buyer_offer_form'><div class='has-valid-err' id='RN_err_negoForm' style='color: red'></div><input type='text' id='buyer_name' class='dha-input-count-offer' name='buyer_name'  placeholder='Your Name'><input type='email' id='buyer_email' class='dha-input-count-offer' name='buyer_email'  placeholder='Your Email'><input type='text' id='buyer_phone' class='dha-input-count-offer' name='buyer_phone'  placeholder='Your Contact No'><input type='text' id='buyer_zip' maxlength='6' class='dha-input-count-offer' name='buyer_zip'  placeholder='Your ZipCode'><input type='text' id='buyer_original_quantity' class='dha-input-count-offer' name='buyer_original_quantity'  placeholder='How many cars you need?'><button type='button' id='robo_add_buyer_offer_btn' onClick='submitBuyerOfferForm(event)'  class='dha-find-seller-button'>Commit My Offer / Negotiate</button></form></div>"];
    chatMsgs[3] = [];
    chatMsgs[3][0] = ["Thanks. Before we process this offer, we would like to know following:"];
    chatMsgs[3][1] = "<div class='msg-width' id='modal_time_pass_1_formdiv'><legend>We provided your committed offer to a third-party independent matching service. While we get results, please provide us following information <br/> Choose Your Option to secure the deal</legend><form id='pre_form_1' onsubmit='pre_form_1onsubmit()' ><select id='payment_amount_agreed' class='dha-input-count-offer'><option value='100'>I am willing to pay deposit of $100 to secure the deal</option><option value='-1'>I would like dealer to show & drop the car to me so I can test drive and pay the dealer.</option><option value='0'>I would like dealer to call me so we can finalize remaining formalities.</option></select><legend>Give us your comment on how you feel about this negotiation process and how can we improve it?</legend><input type='text' id='PredCommentsNego' class='dha-input-count-offer' name='PredCommentsNego'  placeholder='Your Comments Please'> <button type='button' id='robo_preference_btn1' onClick='pre_form_1onsubmit()' class='dha-button-offer-submit'>Submit</button></form></div>"
    chatMsgs[3][2] = "<div id='modal_trade'>Do you have a trade-in vehicle before we can match your request? <div class='robo-custom-control custom-radio'><input id='trade_yes' type='radio' class='inline-radio' name='trading_option_selector' value='yes'><label for='trade_yes'><span>&nbsp;</span>Yes</label>&nbsp;&nbsp;&nbsp;<input id='trade_no' type='radio' class='inline-radio' name='trading_option_selector' value='no'><label for='trade_no'><span>&nbsp;</span>No</label></div><div align='right'><button type='button' class='dha-find-seller-button' id='trading_yes_no_btn' onclick='find_trading(event)'>Submit <i class='fa fa-arrow-right' aria-hidden='true'></i></button><span id='seller_error' style='color:red;'></span></div></div>"
    chatMsgs[3][3] = "<div id='modal_trading_price_range'>Would you like to finance for the purchase OR pay the price (Cash/Credit Card/Check)? <div class='robo-custom-control custom-radio'><input id='trading_price_range_finance' type='radio' class='inline-radio' name='trading_price_type_Selector' value='finance'><label for='trading_price_range_finance'><span>&nbsp;</span>Borrow</label>&nbsp;&nbsp;&nbsp;<input id='trading_price_range_pay_cash' type='radio' class='inline-radio' name='trading_price_type_Selector' value='pay_cash'><label for='trading_price_range_pay_cash'><span>&nbsp;</span>Pay</label></div><div align='right'><button type='button' class='dha-find-seller-button' id='trading_price_range_btn' onclick='find_tradin_price_range(event)'>Submit <i class='fa fa-arrow-right' aria-hidden='true'></i></button><span id='seller_error' style='color:red;'></span></div></div>"
    chatMsgs[4] = [];
    chatMsgs[4][0] = ["<div class='msg-width'  id='modal_payment_confirm'><div id='robo-paypal-btn'></div></div>"];
    chatMsgs[4][1] = ["<div class='msg-width' id='modal_payment_confirm'><form method='post' id='payment-form'><div class='form-row'><label for='card-element'>Credit or debit card</label><div id='card-element'></div><div id='card-errors' role='alert'></div></div><button class='button btn robo-btn-primary btn-primary'>Submit Payment</button><span id='stripe_error_messages' style='color:red;'></span></form></div>"];
    chatMsgs[5] = [];
    chatMsgs[5][0] = ["This is your final chance. Please give your highest/ final offer <br/><div class='msg-width' id='modal_highest_offer'><div class='has-valid-err' id='robo_err_highestOffer'></div><div class='inline-box'><input type='text' class='dha-input-count-offer' name='highest_offer_robo'  placeholder='Enter your final/highest offer' id='highest_offer_robo'> <button type='button' id='send_highest_offer' onClick='updateMyOffer()' class='dha-button-offer-submit'>Submit</button></div> </div>"];
    chatMsgs[5][2] = "<div id='modal_wish_for_highest_offer'>Do you want to upgrade your counteroffer?: <div class='robo-custom-control custom-radio'><input id='procees_for_height_offer_yes' type='radio' class='inline-radio' name='finalPriceProgressSelector' value='Yes'><label for='procees_for_height_offer_yes'><span>&nbsp;</span>Yes</label>&nbsp;&nbsp;&nbsp;<input id='procees_for_height_offer_no' type='radio' class='inline-radio' name='finalPriceProgressSelector' value='No'><label for='procees_for_height_offer_no'><span>&nbsp;</span>No</label></div><div align='right'><button type='button' class='dha-find-seller-button' id='process_for_last_offer_valD' onclick='processForHeighestOffer(event)'>Submit <i class='fa fa-arrow-right' aria-hidden='true'></i></button><span id='final_ofer_error' style='color:red;'></span></div></div>";
}

function setCounterOfferData(counterOffer){
    if(document.getElementById('counterOffer')){
        var counterOfferData = "<div class='inline-box'>"+selectCurrency+"<input style='width:75%' type='text' disabled='disabled' class='dha-input-count-offer'  placeholder='Please Enter Counter Offer' value='"+counterOffer+"'></div>";
        document.getElementById('counterOffer').innerHTML=counterOfferData;
        document.getElementById('counterOffer').removeAttribute('id');
    }
}


function setBuyerDetailsFormData(robo_buyer_offer_data){
    if(document.getElementById('robo_buyer_data_formdiv')){
        var buyerFormData='';
        if(robo_buyer_offer_data!=''){
          buyerFormData = "<div class='msg-width'><input type='text' disabled='disabled' class='dha-input-count-offer' placeholder='Your Name' value='"+robo_buyer_offer_data.buyer_name+"'><input type='email' disabled='disabled' class='dha-input-count-offer' placeholder='Your Email' value='"+robo_buyer_offer_data.buyer_email+"'><input type='text' disabled='disabled' class='dha-input-count-offer' placeholder='Your Contact No' value='"+robo_buyer_offer_data.buyer_phone+"'><input type='text' disabled='disabled' maxlength='6' class='dha-input-count-offer' placeholder='Your ZipCode' value='"+robo_buyer_offer_data.buyer_zip+"'><input type='text' disabled='disabled' class='dha-input-count-offer' placeholder='How many cars you need?' value='"+robo_buyer_offer_data.buyer_original_quantity+"'></div>"
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
        var counterSelectData = "<div class='msg-width'><hr/><legend>We are checking with seller. Meanwhile can we know your preferences for following things: <br/> Choose your option to secure the deal</legend><div ><select class='dha-input-count-offer'><option>"+prefSelected+"</option></select><legend>Give us your comment on how you feel about this negotiation process and how can we improve it?</legend><input type='text' disabled='disabled' class='dha-input-count-offer'  placeholder='Your Comments Please' value='"+txtVal+"'></div></div>";
        document.getElementById('modal_time_pass_1_formdiv').innerHTML=counterSelectData;
        document.getElementById('modal_time_pass_1_formdiv').removeAttribute('id');
    }
}

function setHighestOfferData(highestOffer){
    if(document.getElementById('modal_highest_offer')){
        var highestOfferData = "<div class='msg-width' class='inline-box'>"+selectCurrency+"<input style='width:75%' type='text' disabled='disabled' class='dha-input-count-offer'  placeholder='Please Enter Counter Offer' value='"+highestOffer+"'></div>";
        document.getElementById('modal_highest_offer').innerHTML=highestOfferData;
        document.getElementById('modal_highest_offer').removeAttribute('id');
    }
}

var closeChat = 0 ;
var msg_div = null ;

//First Action for sending the Deal Price
function triggerNegotiationBar($api_key , $product_code , $seller_email , $negotiation_mode = 'auto',$catalog_url ,$store_color , $logo_url , $store_name) {
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
    $feed = document.getElementById("dha-msgs");
    _wait = ms => new Promise((r, j) => setTimeout(r, ms)); // See [0]
    _secs = (a, b) => Math.floor(Math.random() * (b - a + 1)) + a;
    count_progress = 1;
    msg_div = document.getElementById('dha-msgs');
    _agentReply();
	//alert($store_color+$logo_url+$store_name);
}


var hasDeal = null;

//Define First Quote Send Button
$counter_price_btn = document.getElementById('send_counter_price_btn'),
    $feed = document.getElementById("dha-msgs"),
    _wait = ms => new Promise((r, j) => setTimeout(r, ms)), // See [0]
    _secs = (a, b) => Math.floor(Math.random() * (b - a + 1)) + a;
count_progress = 1;

// Define our send method.
var textClass = null;
function _sendoptions (data) {
    
    // Send data to a new .msg
    let msg = document.createElement('div'),
        {sender, typing} = data;
    if (sender !== "me") {
        msg.classList.add("to");
    } else {
        msg.classList.add("from");
    }
	msg.classList.add('dha-chat-message-wrapper');
	msg.classList.add('message-options');
	msg.classList.add('robo-'+textClass);
    textClass = null;
    msg.innerHTML =  data.msg;
	// msg.innerHTML =  '<figure class="avataroptionsusr"><img src="http://sandbox.robonegotiator.com/js/plugins/assets/img/a13.png"></figure>' +data.msg;
    var feed = document.getElementById("dha-msgs") ;
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
    //Set option button color
    $(".dha-choose-button").css("color", ROBO_PASS_COLOR);
    $(".dha-choose-button").css("border-color",ROBO_PASS_COLOR);
    $(".dha-choose-button").hover(function(){
        $(this).css("background-color", ROBO_PASS_COLOR);
        $(this).css("color", "#fff");
    }, function(){
        $(this).css("background-color", "#f5f5f5");
        $(this).css("color", ROBO_PASS_COLOR);
    });


    return msg ;
    // And simulate a reply from our agent.
   // if (sender === "me") setTimeout(_agentReply, 2000);
    // ref to new DOM .msg
}
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
    msg.classList.add('dha-chat-message-wrapper');
    msg.classList.add('new');

    msg.innerHTML = data.msg;
    if (data.msg.length > 1) {
        $feed.appendChild(msg);
    }
    // And simulate a reply from our agent.
    if (sender === "me") setTimeout(_agentReply, 2000);
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

    msg.classList.add('dha-chat-message-wrapper');
    msg.classList.add('new');
    msg.classList.add('robo-'+textClass);
    textClass = null;
	msg.innerHTML = '<div class="dha-chat-user-avatar"><img class="dha-chat-user-image" src="https://umpdemo.robonegotiator.com/js/plugins/new-js/dha-logo.png"></div><ul class="dha-chat-message"><li><p><span class="dha-chat-message-username">Salesbot:</span><br>' + data.msg + '</p></li></ul>';

    var feed = document.getElementById("dha-msgs") ;
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

	$("ul.dha-chat-message-right > li").css("background", ROBO_PASS_COLOR);
    $("ul.dha-chat-message-right > li").css("color",ROBO_PASS_TEXTCOLOR);
    $(".dha-choose-button").css("color",ROBO_PASS_COLOR);
    $(".dha-choose-button").css("border-color",ROBO_PASS_COLOR);
    $("span.dha-chat-message-username").css("color",ROBO_PASS_COLOR);
    $(".dha-find-seller-button").css("color", ROBO_PASS_COLOR);
    $(".dha-find-seller-button").css("border-color",ROBO_PASS_COLOR);
    $(".dha-find-seller-button").hover(function(){
        $(this).css("background-color", ROBO_PASS_COLOR);
        $(this).css("color", "#f5f5f5");
    }, function(){
        $(this).css("background-color", "#f5f5f5");
        $(this).css("color", ROBO_PASS_COLOR);
    });
    $(".dha-choose-button").css("color", ROBO_PASS_COLOR);
    $(".dha-choose-button").css("border-color",ROBO_PASS_COLOR);
    $(".dha-choose-button").hover(function(){
        $(this).css("background-color", ROBO_PASS_COLOR);
        $(this).css("color", "#fff");
    }, function(){
        $(this).css("background-color", "#f5f5f5");
        $(this).css("color", ROBO_PASS_COLOR);
    });
    $(".dha-input-count-offer").hover(function(){
        $(this).css("border-color", ROBO_PASS_COLOR);
    }, function(){
        $(this).css("border-color", "#ccc");
    });
    $(".dha-input-count-offer").focus(function(){
        $(this).css("border-color", ROBO_PASS_COLOR);
    });
    $(".dha-input-count-offer").blur(function(){
        $(this).css("border-color", "#ccc");
    });
    $(".dha-button-offer-submit").css("color", ROBO_PASS_COLOR);
    $(".dha-button-offer-submit").hover(function(){
        $(this).css("color", "#333");
    }, function(){
        $(this).css("color", ROBO_PASS_COLOR);
    });
    
    return msg ;

}

//2020-07-10 Added by Yev

function _customerReply (data) {
    
    // Send data to a new .msg
    let msg = document.createElement('div') ;
    if (data.sender !== "me") {
        msg.classList.add("to");
    } else {
        msg.classList.add("from");
    }
  
    msg.classList.add('dha-chat-message-wrapper-right');
    msg.classList.add('new');
    msg.classList.add('robo-'+textClass);
    textClass = null;
    msg.innerHTML = '<ul class="dha-chat-message-right"><li><p>' + data.msg + '</p></li></ul>';
	  //  msg.innerHTML = '<figure class="avatar"><img src="'+API_ENDPOINT+'/js/plugins/assets/img/chat.png"></figure>' + data.msg;
    var feed = document.getElementById("dha-msgs") ;
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

    $("ul.dha-chat-message-right > li").css("background", ROBO_PASS_COLOR);
    $("ul.dha-chat-message-right > li").css("color",ROBO_PASS_TEXTCOLOR);
    $("ul.dha-chat-message-right > li p").css("color",ROBO_PASS_TEXTCOLOR);

    return msg ;
}

var counterPrice = undefined;
var _agentReply = function () {
    if (count_progress < 3) {
        //let $agentMsg = _send({msg: " ", typing: true, sender: false});
        if (count_progress === 1) {
            // textClass = 'text-danger';
            let theEnvelope = {
                msg: chatMsgs[1][0],
                sender: false
            };
            _autoSend(theEnvelope);
            setTimeout(function () {
            //textClass = 'text-danger';
            let theEnvelope = {
                msg: chatMsgs[0][1],
                sender: "me"
            };
            _sendoptions(theEnvelope);
            //formInitialised('counter_offer');
            }, 2000);
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
                // textClass = 'text-success';
                counterPrice = parseInt(counterPrice.replace(/[^0-9.]/g, ''));
                let theEnvelope = {
                    msg: "Thanks for your offer of<b> -  "+ counterPrice + " </b>",
                    sender: false
                };
                _autoSend(theEnvelope);
                document.getElementById('gifloader').style.display='block';
                var instantDealCheck = undefined;
                var url = API_ENDPOINT +
                    '/api-786-instant-deal-check?plugin_mode='+ROBO_PLUGIN_MODE+'&api_key='+api_key+'&upc_product_code=' +
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
                            // textClass = 'text-danger';
                            // let theEnvelope = {
                            //     msg: "We're sorry, but it seems that we do not have a deal from this seller. ",
                            //     sender: false
                            // };
                            // _autoSend(theEnvelope);
                            theEnvelope = {
                                msg: chatMsgs[1][3],
                                sender: false
                            };
                            _autoSend(theEnvelope);
                            setTimeout(function () {
                                displayModal('modal_find_seller');
                            }
                            , 2000);
                        }
                        else if (instantDealCheck.deal_exist === 'yes' &&
                            instantDealCheck.same_seller === 'no') {
                            hasDeal = true;
                            // textClass = 'text-danger';
                            // $agentMsg.text();
                            // let theEnvelope = {
                            //     msg: "We're sorry, but it seems that we do not have a deal from this seller.",
                            //     sender: false
                            // };
                            // _autoSend(theEnvelope);
                            theEnvelope = {
                                msg: chatMsgs[1][3],
                                sender: false
                            };
                            _autoSend(theEnvelope);
                            setTimeout(function () {
                                displayModal('modal_find_seller');
                            }
                            , 2000);
                        }
                        else if (instantDealCheck.deal_exist === 'yes' &&
                            instantDealCheck.same_seller === 'yes') {
                            hasDeal = true;
                            // textClass = 'text-danger';
                            let theEnvelope = {
                                msg: "It looks like we have a special deal from this seller. We'll need  you details in order to match your offer with the seller. Please enter them below.",
                                sender: false
                            };
                            _autoSend(theEnvelope);
                            setTimeout(function () {
                                displayModal('modal_find_seller_yes');
                            }
                            , 2000);
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
                xmlhttp.onerror = function() { // only triggers if the request couldn't be made at all
                    final_message = {
                        msg: 'Technical error: system under maintenance - please revisit us after couple of hours.',
                        sender: false ,
                        elementId : 'robo-ohnhfcthn-eroor0custom-mssg'

                    };
                    _autoSend(final_message);
                    closeChat = 1 ;
                    setTimeout(closeChatBotRobo , 35000);
                };
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
    let theEnvelope = {
        msg: "<b> " + roboCurrency +" "+ robo_counter_offer_price + " </b>",
        sender: false
    };
    _customerReply(theEnvelope);
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
            'buyer_offer_price': intitialOfferPrice,
            'buyer_negotiation_mode': negotiation_mode,
            'buyer_highest_offer_price': counterPrice,
            'upc_product_code': product_code,
            'buyer_currency': roboCurrency,
            'buyer_zip': buyer_offer_form.buyer_zip.value,
            //'expiry_date': buyer_offer_form.expiry_date.value,
            'json_result': 1,'catalog_url': catalog_url,
            'plugin_mode' : ROBO_PLUGIN_MODE
        };
        final_offer_submitted++;
        send_buyer_offer();
        setTimeout(function () {
            getDealStatus();
        }
        , 2000);
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
        errMsg +="<span>Please Enter Name</span><br>";
    }
    if(buyer_offer_form.buyer_email.value =='' || !robo_validateEmail(buyer_offer_form.buyer_email.value)){
        err=true;
        errMsg +="<span>Enter Valid Email</span><br>";
    }
    if(buyer_offer_form.buyer_phone.value =='' || (buyer_offer_form.buyer_phone.value.length < 10 || buyer_offer_form.buyer_phone.value.length > 10)){
        err=true;
        errMsg +="<span>Enter Valid Contact No</span><br>";
    }
    if(buyer_offer_form.buyer_zip.value.toString() =='' || buyer_offer_form.buyer_zip.value.toString().length > 6 || buyer_offer_form.buyer_zip.value.toString().length < 5){
        err=true;
        errMsg +="<span>Enter Valid ZipCode</span><br>";
    }
    if(buyer_offer_form.buyer_original_quantity.value =='' || parseInt(buyer_offer_form.buyer_original_quantity.value) <= 0){
        err=true;
        errMsg +="<span>Enter Valid Quantity</span><br>";
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
        'buyer_currency': roboCurrency,
        'buyer_zip': buyer_offer_form.buyer_zip.value.toString(),
        //'expiry_date': buyer_offer_form.expiry_date.value,
        'json_result': 1,
        'catalog_url': catalog_url,
        'plugin_mode': ROBO_PLUGIN_MODE
    };
    if(isAgreeCalled == 1){
        send_buyer_offer();
    }else{
        // textClass = 'text-danger';
        var alertmssg5 = 'Thanks for your information. <br/> Before we Submit further, let us make sure we get your special needs covered';
        theEnvelope = {
            msg: alertmssg5,
            sender: false ,
            elementId : 'robo-alert-agree-new-cust-mssg'
        };
        _autoSend(theEnvelope);
        callAgree();
        isAgreeCalled = 1;
    }
    //modified ashwini send_buyer_offer();
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
            // textClass = 'text-danger';
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
            // textClass = 'text-danger';
            let theEnvelope = {
                msg: chatMsgs[3][1],
                sender: false
            };
            _autoSend(theEnvelope);
            formInitialised('modal_time_pass_1');
        }

    }else if(querySelector == 'modal_payment_confirm'){
        if(!document.getElementById('modal_payment_confirm')){
            // textClass = 'text-danger';
            var chat1;
            if(ROBO_PAYMENT_GATEWAY=="paypal"){
                chat1 = chatMsgs[4][0];
            }else{
                chat1 = chatMsgs[4][1];
            }
            let theEnvelope = {
                msg: chat1,
                sender: false,
                elementId : 'payment-box'
            };
            _autoSend(theEnvelope);
            formInitialised('modal_payment_confirm');
        }

    }
    else if(querySelector == 'modal_highest_offer'){
        if(!document.getElementById('modal_highest_offer')){
            // textClass = 'text-danger';
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
            // textClass = 'text-success';
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
            // textClass = 'text-success';
            let theEnvelope = {
                msg: chatMsgs[3][3],
                sender: false
            };
            _autoSend(theEnvelope);
            formInitialised('modal_trading_price_range');
        }
    }
    else if (querySelector == 'modal_wish_for_highest_offer') {
        //if(!document.getElementById('modal_wish_for_highest_offer')){

            var highestOffer = "<div id='modal_wish_for_highest_offer'>Do you want to upgrade your counteroffer?: <div class='robo-custom-control custom-radio'><input id='procees_for_height_offer_yes"+highCounter+"' type='radio' class='inline-radio' name='finalPriceProgressSelector' value='Yes'><label for='procees_for_height_offer_yes"+highCounter+"'><span>&nbsp;</span>Yes</label>&nbsp;&nbsp;&nbsp;<input id='procees_for_height_offer_no"+highCounter+"' type='radio' class='inline-radio' name='finalPriceProgressSelector' value='No'><label for='procees_for_height_offer_no"+highCounter+"'><span>&nbsp;</span>No</label></div><div align='right'><button type='button' class='dha-find-seller-button' id='process_for_last_offer_valD' onclick='processForHeighestOffer(event)'>Submit <i class='fa fa-arrow-right' aria-hidden='true'></i></button><span id='final_ofer_error' style='color:red;'></span></div></div>";
            // textClass = 'text-success';
            let theEnvelope = {
                msg: highestOffer,
                sender: false
            };
            _autoSend(theEnvelope);
            formInitialised('modal_wish_for_highest_offer');
            highCounter++;
        //}
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

// for agree condition
function callAgree() {
    // textClass = 'text-danger';
    var alertmssg = "I agree to receive emails and text messages for this negotiation request. <div class='robo-custom-control custom-radio'><input id='agree_terms_yes' type='radio' class='inline-radio' name='agree_terms_select' value='yes'><label for='agree_terms_yes'><span>&nbsp;</span>Yes</label>&nbsp;&nbsp;&nbsp;<input id='agree_terms_no' type='radio' class='inline-radio' name='agree_terms_select' value='no'><label for='agree_terms_no'><span>&nbsp;</span>No</label></div><div align='right'><button type='button' class='dha-find-seller-button' id='check_agree_btn' onclick='onClickAgree(event)'>Submit <i class='fa fa-arrow-right' aria-hidden='true'></i></button><span id='agree_error' style='color:red;'></span></div>"
    theEnvelope = {
        msg: alertmssg,
        sender: false ,
        elementId : 'robo-alert-agree'
    };
    _autoSend(theEnvelope);

}

function onClickAgree(e) {
    var buyerResponse = document.querySelector('input[name="agree_terms_select"]:checked').value;
    if(buyerResponse === 'yes') {
        theEnvelope = {
            msg: "<b>Yes, I agree.</b>",
            sender: false
        };
        _customerReply(theEnvelope);
        displayModal('modal_trade');
    } else{
        theEnvelope = {
            msg: "<b>No, I don't agree.</b>",
            sender: false
        };
        _customerReply(theEnvelope);
        // textClass = 'text-danger';
        var mesgalert = 'Based on your counteroffer, credit history, financial needs, and trade-in needs, we would recommend that you go to our dealership and our friendly staff will be able to help you to serve your needs. Thanks for trying our automated chatbot.';
        theEnvelope = {
            msg: mesgalert,
            sender: false ,
            elementId : 'robo-alert-agree-second'
        };
        _autoSend(theEnvelope);
        closeChat = 1 ;
        setTimeout(closeChatBotRobo, 20000);
    }
    //document.getElementById("check_agree_btn").style.display = "none";
    hideModal('alertmssg');
}
// end agree condition

function send_buyer_offer() {
    if(add_buyer_offer_data.request_id === undefined || add_buyer_offer_data.request_id === null){
        final_offer_submitted = 0 ;
    }
    var add_buyer_offer_array = Object.values(add_buyer_offer_data);
    document.getElementById('gifloader').style.display='block';
    hideModal('modal_find_seller_yes');
    hideModal('modal_highest_offer');
    var postURL = API_ENDPOINT+"/api-786-add-buyer-offer?";
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
           if(showsendBuyerMssg === 1) {
        var data = JSON.parse(this.responseText);
        buyer_offer_request_id = data.request_id;
        document.getElementById('gifloader').style.display='none';
        var $mesg;
        if (hasDeal === null) {
            setTimeout(function () {
                displayModal('modal_trade');
            }
            , 100);
        } else if (data.success !== undefined && data.success === true) {
            // textClass = 'text-danger';
            if (final_offer_submitted < 1) {
                $mesg = '';
                //$mesg = 'Thanks for your information. <br/> Before we Submit further, let us make sure we get your special needs covered';
                // setTimeout(function () {
                //     displayModal('modal_time_pass_1');
                // }
                // , 100);
                setTimeout(function () {
                    displayModal('modal_trade');
                }
                , 100);
            } else {
                $mesg = 'Thanks for your updated offer.  We are hopeful seller will come down OR your new offer may close the deal. Please wait.  Checking ...';
            }
            if($mesg !== '') {
                theEnvelope = {
                    msg: $mesg,
                    sender: false,
                    elementId : 'robo-xcdgbgtg'
                };
                _autoSend(theEnvelope);
            }
            checkDeal = true;
            setTimeout(function () {
               // getDealStatus();
            }
            , 2000);
           // setTimeout(getDealStatus, 2000);
        } else if (data.success !== undefined && data.success === false) {
            if (data.errors !== undefined) {
                Object.keys(data.errors).forEach(function(key) {
                    // textClass = 'text-danger';
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
        }
    };
    xmlHttp.send();
    xmlHttp.onerror = function() { // only triggers if the request couldn't be made at all
        final_message = {
            msg: 'Technical error: system under maintenance - please revisit us after couple of hours.',
            sender: false ,
            elementId : 'robo-ohnhfcthn-eroor0custom-mssg'

        };
        _autoSend(final_message);
        closeChat = 1 ;
        setTimeout(closeChatBotRobo , 35000);
    };
}


var countStat = 1;
function getDealStatus() {
    document.getElementById('gifloader').style.display='block';
    var url = API_ENDPOINT+"/api-786-check-deal-status?plugin_mode="+ROBO_PLUGIN_MODE+"&api_key=" + api_key + "&upc_product_code=" +
        product_code +
        "&request_id=" + buyer_offer_request_id;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", url, true);
    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById('gifloader').style.display='none';
            var proferenceAgreedAmt = document.getElementById('payment_amount_agreed').value;
            var data2 = JSON.parse(this.responseText);
            if (data2.message !== undefined) {
                if (data2.message !== undefined) {
                    if (data2.message === 'failed') {
                        // textClass = 'text-danger';
                        final_message = {
                            msg: '<span>Based on your counteroffer, credit history, financial needs, and trade-in needs, we would recommend that you go to our dealership and our friendly staff will be able to help you to serve your needs. Thanks for trying our automated chatbot.',
                            sender: false ,
                            elementId : 'robo-xcdgbgrt'
                        };
                        if (preferences !== undefined) {
                            _autoSend(final_message);
                            closeChat = 1 ;
                            setTimeout(closeChatBotRobo, 20000);
                        }
                    } else if (data2.message === 'too_low') {
                       // alert('tetette');
                        // textClass = 'text-danger';
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
                            msg: '<span>Your offer is too low for us to move forward.  Would you like to upgrade your offer one more time? This is your last chance.</span>',
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
                    else if (data2.message === 'deal_closed' && proferenceAgreedAmt > 0) {
                        let theEnvelope = {
                            msg: '<span style="color: #3da911">Congratulations!! We have a matching deal from our dealer, and we would like to close the deal. Our dealer has agreed to meet your needs. Before we reveal mutually agreed price (unbiased), our dealer would like to make sure we do a credit check on your so seller has confidence and can prepare the vehicle for delivery.</span>',
                            sender: false
                        };
                        _autoSend(theEnvelope);
                        let credit_report = {
                            msg: '<span>Do we have your permission to check your credit report? There is no cost to you.<br/><div id="credit_ssn"><div class="has-valid-err" id="robo_credit_report"></div><div class="inline-box"><input type="text" class="dha-input-count-offer" name="ssn_number"  placeholder="Please enter your Social Security Number" id="robo_ssn"> <button type="button" id="send_ssn_btn" onClick="ssn_credit()" class="dha-button-offer-submit">Submit</button></div></div></span>',
                            sender: false ,
                        };
                        _autoSend(credit_report);

                        function finResp() {
                            // textClass = 'text-success';
                            getFinalAmount();
                        }
                    } else if (data2.message === 'deal_closed'  && proferenceAgreedAmt <= 0) {
                        // textClass = 'text-success';
                        final_message = {
                            msg: '<span style="color: #3da911">Congratulations!! Your offer has been accepted. Contact seller at: <b>' +
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
                            // textClass = 'text-danger';
                            final_message = {
                                msg: '<span>Your offer did not match with our seller’s deal. In order to continue further, please give us your final offer one more time.</span>',
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
                            // textClass = 'text-danger';
                            $exit_msg = '<span>Based on your counteroffer, credit history, financial needs, and trade-in needs, we would recommend that you go to our dealership and our friendly staff will be able to help you to serve your needs. Thanks for trying our automated chatbot.</span>';
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
                    } else {
                        // textClass = 'text-danger';
                        final_message = {
                            msg: '<span>Contact seller at: <b>' +
                                seller_email
                                + '</b><br/>We are really sorry to say that server is' +
                                ' too busy to respond with the final amount at this time so could not retrieve the final amount , please contact us for that !',
                            sender: false ,
                            elementId : 'robo-ohnhfcthn'

                        };
                        _autoSend(final_message);
                        closeChat = 1 ;
                        setTimeout(closeChatBotRobo , 35000);
                    }
                }
            }
        }
    };
    xmlhttp.send();
    xmlhttp.onerror = function() { // only triggers if the request couldn't be made at all
        final_message = {
            msg: 'Technical error: system under maintenance - please revisit us after couple of hours.',
            sender: false ,
            elementId : 'robo-ohnhfcthn-eroor0custom-mssg'

        };
        _autoSend(final_message);
        closeChat = 1 ;
        setTimeout(closeChatBotRobo , 35000);
    };
}

function save_buyer_payment($paymentObj) {
    $paymentObj.api_key = api_key;
    // textClass = 'text-success';
    var urlPostfix = '';
    for (var key in $paymentObj) {
        urlPostfix = urlPostfix + '&' + key + '=' + $paymentObj[key];
    }
    let theEnvelope = {
        msg: 'Your payment of ' + $paymentObj.amount + ' '+roboCurrency+' has been successful ! We have secured the deal for ' +
            'you , thank you !',
        sender: false ,
        elementId : 'robo-xcdgbgpm'
    };
    var url = API_ENDPOINT+"/api-786-save-payment-info?plugin_mode="+ROBO_PLUGIN_MODE+"&" + urlPostfix;
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
    xmlhttp.onerror = function() { // only triggers if the request couldn't be made at all
        final_message = {
            msg: 'Technical error: system under maintenance - please revisit us after couple of hours.',
            sender: false ,
            elementId : 'robo-ohnhfcthn-eroor0custom-mssg'

        };
        _autoSend(final_message);
        closeChat = 1 ;
        setTimeout(closeChatBotRobo , 35000);
    };
}

var agreedAmount = undefined;
var finalAmountCheckedTimes = 0 ;

function getFinalAmount() {
    document.getElementById('gifloader').style.display='block';
    setTimeout(getAmount, 3000);
    function getAmount() {
        var url = API_ENDPOINT+"/api-786-get-deal-results?plugin_mode="+ROBO_PLUGIN_MODE+"&api_key=" + api_key + "&upc_product_code=" +
            product_code +
            "&request_id=" + buyer_offer_request_id;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", url, true);
        xmlhttp.onreadystatechange = function () {
            document.getElementById('gifloader').style.display='none';
            if (this.readyState === 4 && this.status === 200) {
                var data = JSON.parse(this.responseText);
                if (data.closed_deal === undefined) {
                    var timerInc = 1000 ;
                    finalAmountCheckedTimes++;
                    if (finalAmountCheckedTimes <= 8) {
                        timerInc = timerInc*2 ;
                        setTimeout(function () {
                            getAmount();
                        }, timerInc);

                    } else {
                        if (preferences !== undefined) {
                            final_message = {
                                msg: '<span style="color: #3da911"> Congratulations!! Your offer has been accepted. Contact seller at: <b>' +
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
                    var offerMessage = '<span style="color: #3da911">Congratulations!! Our dealer and you have agreed on: <br/><br/>Product - VIN No. <b style="color:red;">'+ROBO_UPC_CODE+'</b><br/>Mutually agreed sale price: <b style="color:red;">'+roboCurrency+' '+closedDealFinalAmount+' *</b><br/>';
                    if (preferences !== undefined) {
                        //_autoSend(final_message);
                        if(parseInt(data.closed_deal[0].total_discounted_amount) > 0) {
                            var discountAmount = parseInt(data.closed_deal[0].total_discounted_amount);
                            var actualAmount = parseInt(closedDealFinalAmount) - parseInt(data.closed_deal[0].total_discounted_amount);
                            offerMessage += 'Seller paid discounts/rebates: <b style="color:red;">'+roboCurrency+' '+discountAmount+'</b><br/>';
                            offerMessage += 'Buyer’s responsibility: <b style="color:red;">'+roboCurrency+' '+actualAmount+'</b><br/>';

                        }
                        offerMessage += 'Confirmation code: <b style="color:red;">DEAL ID: #'+buyer_offer_request_id+'</b><br/>';
                        offerMessage += 'Please contact our dealer at: <b style="color:red;">'+closedDealEmail+'</b><br/><br/>';
                        offerMessage += '* This is a conditional deal. Buyer has one week to check this vehicle (incl. a test drive) before this deal can be enforced.  Sales Tax/Documentation Fees/Registration are separate and not part of this negotiated amount.';
                        offerMessage += '</span>';
                        discountMssg = {
                            msg: offerMessage,
                            sender: false ,
                            elementId : 'rohffbnhfggt-discount'
                        };
                        _autoSend(discountMssg);
                        agreedAmount = document.getElementById('payment_amount_agreed').value;
                        agreedAmount = parseInt(agreedAmount);
                        setPrefSelectData();
                        if (agreedAmount !== 0) {
                            if (agreedAmount === -1) {
                                agreedAmount = closedDealFinalAmount;
                            }
                            var depositMessage = {
                                msg: '<span>Now, let\'s pay a deposit <b> '+roboCurrency +' '+ agreedAmount + '</b> to secure this deal with this dealer.</span>',
                                sender: false ,
                                elementId : 'gdgdfgdhsdhdyyyy'
                            };
                            _autoSend(depositMessage);
                            setTimeout(
                                function () {
                                    displayModal('modal_payment_confirm');
                                    if (ROBO_PAYMENT_GATEWAY == 'paypal') {
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
        xmlhttp.onerror = function() { // only triggers if the request couldn't be made at all
            final_message = {
                msg: 'Technical error: system under maintenance - please revisit us after couple of hours.',
                sender: false ,
                elementId : 'robo-ohnhfcthn-eroor0custom-mssg'

            };
            _autoSend(final_message);
            closeChat = 1 ;
            setTimeout(closeChatBotRobo , 35000);
        };
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
    var testamount = 0.55;
    paypal.Buttons({
        // Set up the transaction
        createOrder: function (data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: testamount
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
                    'currency': roboCurrency
                };
                save_buyer_payment(paymentObject);
            });
        }
    }).render('#robo-paypal-btn');
};

function executeStripePayment(amount){

    // Create a Stripe client.
    //var stripe = Stripe('pk_test_GxYxvWVCpkH3cAEz5EPSi0z200YN6o8naK');

    //var stripe = Stripe('pk_live_CzuMwBkOxuU0xTq1K9H8ILHh00f4creJC1');



    // Create an instance of Elements.
    var elements = stripe.elements();

    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)
    var style = {
      base: {
        color: '#32325d',
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: 'antialiased',
        fontSize: '16px',
        '::placeholder': {
          color: '#aab7c4'
        }
      },
      invalid: {
        color: '#fa755a',
        iconColor: '#fa755a'
      }
    };

    // Create an instance of the card Element.
    var card = elements.create('card', {style: style});

    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');

    // Handle real-time validation errors from the card Element.
    card.addEventListener('change', function(event) {
      var displayError = document.getElementById('card-errors');
      if (event.error) {
        displayError.textContent = event.error.message;
      } else {
        displayError.textContent = '';
      }
    });

    // Handle form submission.
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
    event.preventDefault();

      stripe.createToken(card).then(function(result) {
        if (result.error) {
          // Inform the user if there was an error.
          var errorElement = document.getElementById('card-errors');
          errorElement.textContent = result.error.message;
        } else {
          // Send the token to your server.

          //stripeTokenHandler(result.token);
          var host = API_ENDPOINT+'/';
          $.ajax({
                url : host+"get_strip_payment",
                method:"POST",
                data:{amount:amount, secret_key:secret_key, currency: ROBO_SET_CURRENCY, token:result.token.id, description : 'Deposit Against Request Id #'+buyer_offer_request_id},
                dataType:"JSON",
                success:function(data){
                    console.log(data);
                    if(data.captured){
                        var paymentObject = {
                            'buyer_email': add_buyer_offer_data.buyer_email,
                            'upc_product_code': product_code,
                            'payment_id': data.id,
                            'payer_id': data.created,
                            'payment_token': data.id,
                            'transaction_id': data.id,
                            'amount': amount,
                            'currency': roboCurrency
                        };
                        save_buyer_payment(paymentObject);
                        //alert("Payment is successful");
                        //location.reload();
                    }else{
                        //alert("Payment is not successful!");
                        //location.reload();
                    }
                },
                error:function(data){
                    console.log(data);
                    $('#stripe_error_messages').html(data.message);
                }
            });
        }
      });
    });


}
var pre_form_1 = document.getElementById('pre_form_1');

function pre_form_1onsubmit(e) {
    if (hasDeal === null) {
        setTimeout(function () {
            displayModal('modal_trade');
        }
        , 100);
        // textClass = 'text-danger';
        $mesg = 'Based on your counteroffer, credit history, financial needs, and trade-in needs, we would recommend that you go to our dealership and our friendly staff will be able to help you to serve your needs. Thanks for trying our automated chatbot.';
        theEnvelope = {
            msg: $mesg,
            sender: false ,
            elementId : 'robo-xcdgbg'
        };
        _autoSend(theEnvelope);
        closeChat = 1 ;
        setTimeout(closeChatBotRobo, 20000);
    }else{
        preferences = 1;
        hideModal('modal_time_pass_1');
        document.getElementById('payment_amount_agreed').setAttribute('disabled','disabled');
        document.getElementById("robo_preference_btn1").style.display = "none";
        let theEnvelope = {
            msg: '<span>We heard from our matching service.</span>',
            sender: false
        };
        //alert("hello");
        _autoSend(theEnvelope);
        setTimeout(function () {
            getDealStatus();
        }
        , 2000);
        //send_buyer_offer();
        if (final_message !== undefined) {
            _autoSend(final_message);
            if (need_update !== undefined) {
                setTimeout(function () {
                    displayModal('modal_highest_offer');
                }
                , 2000);
            }
            else if (prompt_requed_heighest_offer !== undefined){
                setTimeout(function () {
                    displayModal('modal_wish_for_highest_offer');
                }
                , 2000);
            }
            else {
                let theEnvelope = {
                    msg: 'Based on your counteroffer, credit history, financial needs, and trade-in needs, we would recommend that you go to our dealership and our friendly staff will be able to help you to serve your needs. Thanks for trying our automated chatbot.',
                    sender: false
                };
                _autoSend(theEnvelope);
                closeChat = 1 ;
                setTimeout(closeChatBotRobo, 20000);
            }
        }
        else{

            setTimeout(function () {
                //getDealStatus();
            }
            , 2000);
        }
    }
};


var find_seller_btn = document.getElementById('find_seller_btn');

function find_seller_btnonclick(e){
    var find_seller_user_choice = document.querySelector('input[name="robo_find_seller"]:checked').value;
    count_progress++;
    if (find_seller_user_choice === 'yes') {
        let theEnvelope = {
            msg: "<b>Yes, I would.</b>",
            sender: false
        };
        _customerReply(theEnvelope);
        setTimeout(displayModal('modal_find_seller_yes'), 1500);
        // displayModal('modal_find_seller_yes');
    } else {
        let theEnvelope = {
            msg: "<b>No, I wouldn't.</b>",
            sender: false
        };
        _customerReply(theEnvelope);
        setTimeout(function(){
            let theEnvelope = {
                msg: 'Based on your counteroffer, credit history, financial needs, and trade-in needs, we would recommend that you go to our dealership and our friendly staff will be able to help you to serve your needs. Thanks for trying our automated chatbot.',
                sender: false
            };
            _autoSend(theEnvelope);
        }, 1500);
        closeChat = 1 ;
        setTimeout(closeChatBotRobo, 20000);
    }
    hideModal('modal_find_seller');
}

function find_trading(e){
    var find_trading_bool = document.querySelector('input[name="trading_option_selector"]:checked').value;
    //count_progress++;
    if (find_trading_bool === 'no' || find_trading_bool === 'No') {
        let theEnvelope = {
            msg: "<b>No, I haven't.</b>",
            sender: false
        };
        _customerReply(theEnvelope);
        displayModal('modal_trading_price_range');
    } else {
        let theEnvelope = {
            msg: "<b>Yes, I have.</b>",
            sender: false
        };
        _customerReply(theEnvelope);
        setTimeout (function() {
            let theEnvelope = {
                msg: "Based on your counteroffer, credit history, financial needs, and trade-in needs, we would recommend that you go to our dealership and our friendly staff will be able to help you to serve your needs. Thanks for trying our automated chatbot.",
                sender: false
            };
            _autoSend(theEnvelope);
        }, 2000);
        closeChat = 1 ;
        setTimeout(closeChatBotRobo, 20000);
    }
    //hideModal('modal_trading_price_range');
}

function get_discounts() {
    // textClass = 'text-danger';
    var alertmssg = "Let us check if you qualify for some special rebates and/or factory discounts. Please select where you qualify for special discounts. We will apply all other discounts & rebates automatically."
    theEnvelope = {
        msg: alertmssg,
        sender: false ,
        elementId : 'robo-alert-discount-mssg'
    };
    _autoSend(theEnvelope);
    var discount_data = {
        'api_key': api_key,
        'upc_product_code': product_code,
        'seller_email': seller_email,
        'plugin_mode' : ROBO_PLUGIN_MODE,
        'json_result': 1
    };

    var postURLDiscount = API_ENDPOINT+"/api-786-get-product-discounts?";
    var xmlHttpDiscount = new XMLHttpRequest();
    var urlPostfixDiscount= '';
    for (const key in discount_data) {
        if (discount_data[key] !== undefined && discount_data[key] !== null) {
            urlPostfixDiscount = urlPostfixDiscount + '&' + key + '=' + discount_data[key];
        }
    }
    postURLDiscount = postURLDiscount + urlPostfixDiscount;
    xmlHttpDiscount.open("POST", postURLDiscount);
    xmlHttpDiscount.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200){
            var data = JSON.parse(this.responseText);
            if (data.success !== undefined && data.success === false) {
                if (data.errors !== undefined) {
                    Object.keys(data.errors).forEach(function(key) {
                        // textClass = 'text-danger';
                        let theErr = {
                            msg: data.errors[key],
                            sender: false ,
                            elementId : 'robo-xcdgbg-discount-error'
                        };
                        _autoSend(theErr);
                    });
                    setTimeout(function () {
                        displayModal('modal_find_seller_yes');
                    }, 3000);
                }
            } else {
                if (Array.isArray(data.data) && data.data.length) {
                    discountData = data.data;
                    var specificAvailable = 0;
                    for (let i = 0; i < discountData.length; i++) {
                        if( discountData[i].applicability === 'specific') {
                            var discountTitle = discountData[i].title.toLowerCase();
                            var isDiscountFYIAvailable = 0;
                            if(discountTitle.substring(0, 6) === 'coupon') {
                                couponCodes.push(discountTitle.substring(7, discountTitle.length));
                                isDiscountFYIAvailable = 1;
                            }
                            if(discountTitle.substring(0, 3) === 'fyi') {
                                var enteredFyimssg = discountTitle.substring(4, discountTitle.length);
                                if(discountData[i].expiry_date == '') {
                                    var fyimsg = 'We also offer this special incentive: '+enteredFyimssg+' for limited time.';
                                } else {
                                    var fyimsg = 'We also offer this special incentive: '+enteredFyimssg+' until '+ discountData[i].expiry_date;
                                }
                                fyiMessages.push(fyimsg);
                                isDiscountFYIAvailable = 1;
                            }
                            if(isDiscountFYIAvailable == 0) {
                                specificAvailable = 1;
                            }
                        }
                    }
                    if(specificAvailable === 1) {
                        // textClass = 'text-danger';
                        var slectDisT = "Please select ONLY IF you qualify for this discount: "
                        theEnvelope = {
                            msg: slectDisT,
                            sender: false ,
                            elementId : 'robo-alert-discount-title'
                        };
                        _autoSend(theEnvelope);

                        for (let i = 0; i < discountData.length; i++) {
                            if( discountData[i].applicability === 'specific') {
                                var discountTitle = discountData[i].title.toLowerCase();

                                if(discountTitle.substring(0, 6) === 'coupon') {
                                } else if(discountTitle.substring(0, 3) === 'fyi') {
                                } else {
                                    var slectDisTAv = "I am qualified for  '"+ discountData[i].title+"' : <div class='robo-custom-control custom-radio'><input id='discount_terms_yes_"+ discountData[i].id+"' type='radio' class='inline-radio' name='av_discount"+discountData[i].id+"' value='yes'><label for='discount_terms_yes_"+ discountData[i].id+"'><span>&nbsp;</span>Yes</label>&nbsp;&nbsp;&nbsp;<input id='discount_terms_no_"+ discountData[i].id+"' type='radio' class='inline-radio' name='av_discount"+discountData[i].id+"' value='no'><label for='discount_terms_no_"+ discountData[i].id+"'><span>&nbsp;</span>No</label></div>"
                                    theEnvelope = {
                                        msg: slectDisTAv,
                                        sender: false ,
                                        elementId : 'robo-alert-discount-av-'+discountData[i].id
                                    };
                                    _autoSend(theEnvelope);
                                }
                            }
                        }
                        var SubmitWithDiscount = "<div align='right'><button type='button' class='dha-find-seller-button' id='apply_buyer_discount_btn' onclick='applyBuyerDiscount(event)'>Submit <i class='fa fa-arrow-right' aria-hidden='true'></i></button><span id='seller_error' style='color:red;'></span></div>";
                        theEnvelope = {
                            msg: SubmitWithDiscount,
                            sender: false ,
                            elementId : 'robo-alert-discount-av-Submit-with-discount'
                        };
                        _autoSend(theEnvelope);
                    } else {
                        sleep(2000);
                        // textClass = 'text-danger';
                        var alertmssg = "We didn't find any rebate.";
                        theEnvelope = {
                            msg: alertmssg,
                            sender: false ,
                            elementId : 'robo-alert-no-discount-mssg'
                        };
                        _autoSend(theEnvelope);
                        if(couponCodes.length > 0 && couponSection == 0) {
                            applyBuyerDiscount();
                        } else {
                            // textClass = 'text-success';
                            let theEnvelope2 = {
                                msg: 'Sending your details and offer to our system for further matching.',
                                sender: false
                            };
                            _autoSend(theEnvelope2);
                            displayModal('modal_time_pass_1');
                            preferences =1;
                            send_buyer_offer();
                            showsendBuyerMssg = 1;
                        }
                    }

                } else {
                    sleep(2000);
                    // textClass = 'text-danger';
                    var alertmssg = "We didn't find any rebate.";
                    theEnvelope = {
                        msg: alertmssg,
                        sender: false ,
                        elementId : 'robo-alert-no-discount-mssg'
                    };
                    _autoSend(theEnvelope);
                    if(couponCodes.length > 0 && couponSection == 0) {
                        applyBuyerDiscount();
                    } else {
                        // textClass = 'text-success';
                        let theEnvelope2 = {
                            msg: 'Sending your details and offer to our system for further matching.',
                            sender: false
                        };
                        _autoSend(theEnvelope2);
                        displayModal('modal_time_pass_1');
                        preferences =1;
                        send_buyer_offer();
                        showsendBuyerMssg = 1;
                    }
                }
            }
        }
    };
    xmlHttpDiscount.send();
    xmlHttpDiscount.onerror = function() { // only triggers if the request couldn't be made at all
        final_message = {
            msg: 'Technical error: system under maintenance - please revisit us after couple of hours.',
            sender: false ,
            elementId : 'robo-ohnhfcthn-eroor0custom-mssg'

        };
        _autoSend(final_message);
        closeChat = 1 ;
        setTimeout(closeChatBotRobo , 35000);
    };
    ///////////kkk
}

function customSendBuyerOffer() {
    send_buyer_offer();
}
function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

function askForCoupon() {
    var askCouponMssg = "Do you have any coupon code? : <div class='robo-custom-control custom-radio'><input id='coupon_message_yes' type='radio' class='inline-radio' name='av_coupon_mssg' value='yes'><label for='coupon_message_yes'><span>&nbsp;</span>Yes</label>&nbsp;&nbsp;&nbsp;<input id='coupon_message_no' type='radio' class='inline-radio' name='av_coupon_mssg' value='no'><label for='coupon_message_no'><span>&nbsp;</span>No</label></div><div align='right'><button type='button' class='dha-find-seller-button' onclick='couponNextStep(event)'>Submit <i class='fa fa-arrow-right' aria-hidden='true'></i></button><span id='seller_error' style='color:red;'></span></div>";
    // textClass = 'text-danger';
    let theEnvelope = {
        msg: askCouponMssg,
        sender: false
    };
    _autoSend(theEnvelope);
}

function couponNextStep() {
    var buyerResponseForCoupon = document.querySelector('input[name="av_coupon_mssg"]:checked').value;
    if(buyerResponseForCoupon === 'yes') {
        callCouponSection();
    } else{
        addCouponCode();
    }
}

function callCouponSection() {
    var couponMessage = "Enter the coupon code if you have one here <div id='couponcodehere'><div class='has-valid-err' id='robo_err_co'></div><div class='inline-box'><input type='text' class='dha-input-count-offer' name='coupon_code'  placeholder='Please enter coupon code' maxlength='15' id='robo_coupon_code'> <button type='button' id='robo-sendcouponcode' onClick='addCouponCode()' class='dha-button-offer-submit'>Submit</button></div> </div>";
    // textClass = 'text-danger';
    let theEnvelope = {
        msg: couponMessage,
        sender: false
    };
    _autoSend(theEnvelope);
}

function addCouponCode() {
    if(document.getElementById('robo_coupon_code')) {
        var userCouponCode = document.getElementById('robo_coupon_code').value;
        document.getElementById("robo-sendcouponcode").style.display = "none";
        if(userCouponCode != '') {
            if(couponCodes.includes(userCouponCode.toLowerCase())){
                var couponaddmssg = "Thanks. We will apply coupon value in final settlement if your offer is matched with the seller's.";
                appliedCouponCode = userCouponCode.toLowerCase();
            } else {
                var couponaddmssg = "Sorry - this product or your coupon code didn't qualify for additional discount.";
            }
            document.getElementById("robo-sendcouponcode").style.display = "none";
            // textClass = 'text-danger';
            let theEnvelope = {
                msg: couponaddmssg,
                sender: false ,
                elementId : 'robo-alert-coupon-add-mssg'
            };
            _autoSend(theEnvelope);
        }
    }
    couponSection = 1;
    setTimeout(function () {
        applyBuyerDiscount();
    }
    , 2000);
}


function applyBuyerDiscount(e) {
    if(document.getElementById("robo-alert-discount-av-Submit-with-discount")) {
        document.getElementById("robo-alert-discount-av-Submit-with-discount").style.display = "none";
    }
    if(couponCodes.length > 0 && couponSection == 0) {
        askForCoupon();
    } else {
        var buyerOfferForm = document.getElementById('robo_add_buyer_offer_form');

        var buyerDiscountQty =  buyerOfferForm.buyer_original_quantity.value;
        var selectedBuyerDiscount = {
            'api_key': api_key,
            'buyer_email': buyerOfferForm.buyer_email.value,
            'json_result':1
        }
        var isSelected = 0;
        for (let i = 0; i < discountData.length; i++) {
            if( discountData[i].applicability === 'specific') {
                var discountTitle = discountData[i].title.toLowerCase();
                var coupnTit = 'coupon-'+appliedCouponCode;
                if((appliedCouponCode != '') && (discountTitle === coupnTit)) {
                    selectedBuyerDiscount['product_discounts['+discountData[i].id+'][id]'] = discountData[i].id;
                    selectedBuyerDiscount['product_discounts['+discountData[i].id+'][qty]'] = buyerDiscountQty;
                    isSelected = 1;
                    discountAdded = 1;
                } else {
                    if(discountTitle.substring(0, 3) != 'fyi') {
                        var ele = document.getElementById("discount_terms_yes_"+discountData[i].id);
                        if(ele){
                            var b_dis = document.querySelector('input[name="av_discount'+discountData[i].id+'"]:checked').value;
                            if(b_dis === 'yes') {
                                selectedBuyerDiscount['product_discounts['+discountData[i].id+'][id]'] = discountData[i].id;
                                selectedBuyerDiscount['product_discounts['+discountData[i].id+'][qty]'] = buyerDiscountQty;
                                isSelected = 1;
                            }
                        }
                    }
                }
            }
        }
        if(fyiMessages.length > 0 && fyiSection == 0) {
            for(let u=0; u < fyiMessages.length; u++) {
                // textClass = 'text-danger';
                let theEnvelope = {
                    msg: fyiMessages[u],
                    sender: false ,
                    elementId : 'robo-alert-coupon-add-mssg-'+u
                };
                _autoSend(theEnvelope);
            }
            fyiSection = 1;
        }
        if(isSelected == 1) {
            var postURLDiscount = API_ENDPOINT+"/api-786-product-buyer-store?";
            var xmlHttpDiscount = new XMLHttpRequest();
            var urlPostfixDiscount= '';
            for (const key in selectedBuyerDiscount) {
                if (selectedBuyerDiscount[key] !== undefined && selectedBuyerDiscount[key] !== null) {
                    urlPostfixDiscount = urlPostfixDiscount + '&' + key + '=' + selectedBuyerDiscount[key];
                }
            }
            postURLDiscount = postURLDiscount + urlPostfixDiscount;
            xmlHttpDiscount.open("POST", postURLDiscount);
            xmlHttpDiscount.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200){
                    var data = JSON.parse(this.responseText);
                    if (data.success !== undefined && data.success === false) {
                        if (data.errors !== undefined) {
                            Object.keys(data.errors).forEach(function(key) {
                                // textClass = 'text-danger';
                                let theErr = {
                                    msg: data.errors[key],
                                    sender: false ,
                                    elementId : 'robo-xcdgbg-discount-error'
                                };
                                _autoSend(theErr);
                            });
                            setTimeout(function () {
                                displayModal('modal_find_seller_yes');
                            }, 3000);
                        }
                    } else {
                        if (Array.isArray(data.data) && data.data.length) {
                            setTimeout(function () {
                                // textClass = 'text-success';
                                let theEnvelope = {
                                    msg: 'Sending your details and offer to our system for further matching.',
                                    sender: false
                                };
                                _autoSend(theEnvelope);
                                displayModal('modal_time_pass_1');
                                preferences =1;
                                send_buyer_offer();
                                showsendBuyerMssg = 1;
                            }, 2000);
                        }
                    }
                }
            }
            xmlHttpDiscount.send();
            xmlHttpDiscount.onerror = function() { // only triggers if the request couldn't be made at all
                final_message = {
                    msg: 'Technical error: system under maintenance - please revisit us after couple of hours.',
                    sender: false ,
                    elementId : 'robo-ohnhfcthn-eroor0custom-mssg'

                };
                _autoSend(final_message);
                closeChat = 1 ;
                setTimeout(closeChatBotRobo , 35000);
            };
        } else {
            setTimeout(function () {
                // textClass = 'text-success';
                let theEnvelope = {
                    msg: 'Sending your details and offer to our system for further matching.',
                    sender: false
                };
                _autoSend(theEnvelope);
                displayModal('modal_time_pass_1');
                preferences =1;
                send_buyer_offer();
                showsendBuyerMssg = 1;
            }, 2000);
        }
    }
}

function find_tradin_price_range(e){
    var trading_is_finance_is_pay_cash = document.querySelector('input[name="trading_price_type_Selector"]:checked').value;
    //count_progress++;
    if (trading_is_finance_is_pay_cash === 'pay_cash' || trading_is_finance_is_pay_cash === 'pay_cash') {
        let theEnvelope = {
            msg: "<b>I would like to pay.</b>",
            sender: false
        };
        _customerReply(theEnvelope);
        get_discounts();
        //commented on 27th April 2020
        // setTimeout(function () {
        //     displayModal('modal_time_pass_1');
        // }
        // , 100);
    } else {
        let theEnvelope = {
            msg: "<b>I would like to finance.</b>",
            sender: false
        };
        _customerReply(theEnvelope);
        setTimeout (function() {
            let theEnvelope = {
                msg: 'Based on your counteroffer, credit history, financial needs, and trade-in needs, we would recommend that you go to our dealership and our friendly staff will be able to help you to serve your needs. Thanks for trying our automated chatbot.',
                sender: false
            };
            _autoSend(theEnvelope);
        }, 2000);
        closeChat = 1 ;
        setTimeout(closeChatBotRobo, 20000);
    }
    //hideModal('modal_trading_price_range');
}

function ssn_credit(){
    var ssn_id = document.getElementById('robo_ssn').value;
    let theEnvelope = {
        msg: "<b> " + roboCurrency +" "+ ssn_id + " </b>",
        sender: false
    };
    _customerReply(theEnvelope);
    if (ssn_id == '' || ssn_id === null) {
        document.getElementById('robo_credit_report').innerHTML = 'SSN Cannot Be Null';
    }
    else{
        document.getElementById("send_ssn_btn").style.display = "none";
        document.getElementById('robo_credit_report').innerHTML = '';
        let ssnCreditMessage = {
            msg: '<span>Thanks!, We are generating your credit report and we will share with you and seller soon.</span>',
            sender: false ,
            elementId : 'robo-xcdgbgrt'
        };
        _autoSend(ssnCreditMessage);
        setTimeout(function () {
            // textClass = 'text-success';
            getFinalAmount();
        }, 200);
    }
}

function processForHeighestOffer(e){
    need_update = 1;
    var trading_is_finance_is_pay_cash = document.querySelector('input[name="finalPriceProgressSelector"]:checked').value;
    //count_progress++;
    if (trading_is_finance_is_pay_cash === 'Yes') {
        let theEnvelope = {
            msg: "Yes, I do.",
            sender: false
        };
        _customerReply(theEnvelope);
        setTimeout(function () {
            displayModal('modal_highest_offer');
        }
        , 100);
    } else {
        let theEnvelope = {
            msg: "No, I don't.",
            sender: false
        };
        _customerReply(theEnvelope);
        setTimeout(function() {
            let theEnvelope = {
                msg: 'Based on your counteroffer, credit history, financial needs, and trade-in needs, we would recommend that you go to our dealership and our friendly staff will be able to help you to serve your needs. Thanks for trying our automated chatbot.',
                sender: false
            };
            _autoSend(theEnvelope);
        }, 2000);
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
    intitialOfferPrice = robo_counter_offer_price;
    if(robo_counter_offer_price !='' && parseInt(robo_counter_offer_price)>0){
        document.getElementById('robo_err_counterOffer').innerHTML='';
        let theEnvelope = {
            msg: "<b> " + roboCurrency +" "+ robo_counter_offer_price + " </b>",
            sender: false
        };
        _customerReply(theEnvelope);
        send_initial_price();
    } else {
        document.getElementById('robo_err_counterOffer').innerHTML= '<span>Enter valid Counteroffer</span>';
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
        if(document.getElementById('dha_robo_negotiator'))document.getElementById('dha_robo_negotiator').remove();
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
    if(document.getElementById('dha_robo_negotiator'))document.getElementById('dha_robo_negotiator').remove();
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

        }, 2000);
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
            //if(document.getElementById("datePicker")){
                /*if(typeof $('#datePicker').datepicker === "function" ){
                    $('#datePicker').datepicker() ;
                }*/
            //}
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
