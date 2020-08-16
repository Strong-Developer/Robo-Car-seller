var $messages = $('.messages-contentbot'),
    d, h, m,
    i = 0;

$(window).load(function() {
    $messages.mCustomScrollbar();
    setTimeout(function() {
        BotMessage();
    }, 100);
});

function updateScrollbar() {
    $messages.mCustomScrollbar("update").mCustomScrollbar('scrollTo', 'bottom', {
        scrollInertia: 10,
        timeout: 0
    });
}

function setDate() {
    d = new Date()
    if (m != d.getMinutes()) {
        m = d.getMinutes();
        $('<div class="timestamp">' + d.getHours() + ':' + m + '</div>').appendTo($('.messagebot:last'));
    }
}

function insertMessage() {
    msg = $('.message-input').val();
    if ($.trim(msg) == '') {
        return false;
    }
    $('<div class="messagebot message-personal"><figure class="avatarusr"><img src="http://sandbox.robonegotiator.com/alpana/img/a7.png" /></figure>' + msg + '</div>').appendTo($('.mCSB_container')).addClass('new');
    setDate();
    $('.message-input').val(null);
    updateScrollbar();
    setTimeout(function() {
        BotMessage();
    }, 1000 + (Math.random() * 20) * 100);
}

$('.message-submit').click(function() {
    insertMessage();
});

$(window).on('keydown', function(e) {
    if (e.which == 13) {
        insertMessage();
        return false;
    }
})

var BMessages = [

    'I am your Sales Assistant. Unlike support chatbots, I have some special powers to get you a special deal. We can also close a deal if you are ready to commit. Please choose your option.',
    'It was a pleasure chat with you Bye'
]

function BotMessage() {
    if ($('.message-input').val() != '') {
    }
    $('<div class="messagebot loading new"><figure class="chatbotavatar"><img src="http://sandbox.robonegotiator.com/alpana/img/a3.png" /></figure><span></span></div>').appendTo($('.mCSB_container'));
    updateScrollbar();

    setTimeout(function() {
        $('.messagebot.loading').remove();
		if(i != 0)
		{
			 if ($('.message-input').val() == 'Hi') {
				initoptions();
			}
			$('<div class="messagebot new"><figure class="chatbotavatar"><img src="http://sandbox.robonegotiator.com/alpana/img/a3.png" /></figure>We Will get back to you later!</div>').appendTo($('.mCSB_container')).addClass('new');
		}else{
			$('<div class="messagebot new"><figure class="chatbotavatar"><img src="http://sandbox.robonegotiator.com/alpana/img/a3.png" /></figure>' + BMessages[i] + '</div>').appendTo($('.mCSB_container')).addClass('new');
		}


        setDate();
        if (i == 0) {
            $('<div id="outer"><br/><br/><br/>  <div class="inner"><button type="button" id="closebotbtn"  onclick="option1()" class="chat-bot-default-option">Sending a Question/Comment & Feedback about this Product</button><br/><br/></div><div class="inner"><button type="button" id="closebotbtn"  onclick="option2()"  class="chat-bot-default-option">Checking and Negotiating a Special Deal</button><br/><br/> </div> <div class="inner"><button type="button" id="closebotbtn"  onclick="option3()"  class="chat-bot-default-option">Next Steps if you have Special Needs </button><br/> <br/> </div><div class="inner"><button type="button" id="closebotbtn"  onclick="option4()"  class="chat-bot-default-option">Additional Product Details </button></div></div>').appendTo($('.mCSB_container')).addClass('new');
        }
        updateScrollbar();
        i++;
    }, 1000 + (Math.random() * 20) * 100);

}


function initoptions() {

    $('<div id="outer"><br/><br/><br/>  <div class="inner"><button type="button" id="closebotbtn"  onclick="option1()" class="chat-bot-default-option">1.Sending a Question/Comment & Feedback</button><br/><br/></div><div class="inner"><button type="button" id="closebotbtn"  onclick="option2()"  class="chat-bot-default-option"> 2.Checking and Negotiating a Special Deal</button><br/><br/> </div> <div class="inner"><button type="button" id="closebotbtn"  onclick="option3()"  class="chat-bot-default-option">3.Next Steps if you have Special Needs </button><br/> <br/> </div><div class="inner"><button type="button" id="closebotbtn"  onclick="option4()"  class="chat-bot-default-option">4.Additional Product Details </button></div></div>').appendTo($('.mCSB_container')).addClass('new');
    setDate();
    updateScrollbar();
}

function sentId() {
    $('<div class="messagebot new"><figure class="chatbotavatar"><img src="http://sandbox.robonegotiator.com/alpana/img/a3.png" /></figure> Email is sent to the seller.  Our seller will get back to you. Thanks</div>').appendTo($('.mCSB_container')).addClass('new');
    setDate();
    updateScrollbar();
setTimeout(function() {
       closeChat();
    }, 5000);



}

function option1() {
    $('<div class="messagebot new"><figure class="chatbotavatar"><img src="http://sandbox.robonegotiator.com/alpana/img/a3.png" /></figure><span style="font-weight: 400;">Product:</span><span style="font-weight: 400;">&nbsp;VIN: 2T2ZFMCA2GC001437</span><span style="font-weight: 400;"><br /></span><span style="font-weight: 400;">Your Name:&nbsp;<input type="textarea" id="validtaion1" class="form-control card-text" placeholder="Enter Your Name"></span><span style="font-weight: 400;"><br /></span><span style="font-weight: 400;">Your Email Address:&nbsp;<input type="textarea" id="validtaion2" class="form-control card-text" placeholder="Enter Email Id"></span><span style="font-weight: 400;"><br /></span><span style="font-weight: 400;">Your Question/ Comment:&nbsp;<input type="textarea" id="validtaion3" class="form-control card-text" placeholder="Enter your comments"></span><span style="font-weight: 400;"><br /></span><button type="button" id="closebotbtn"  class="chat-bot-default-option" onclick="sentId()" align="right">Submit</button></div>').appendTo($('.mCSB_container')).addClass('new');
    setDate();
    updateScrollbar();
}

function option3() {
    $('<div class="messagebot new"><figure class="chatbotavatar"><img src="http://sandbox.robonegotiator.com/alpana/img/a3.png" /></figure>Great! Please select the below options<div id="outer"><br/><br/><br/>  <div class="inner"><button type="button" id="closebotbtn"  onclick="option31()" class="chat-bot-default-option">How to Trade-In</button><br/><br/></div><div class="inner"><button type="button" id="closebotbtn"  onclick="option31()"  class="chat-bot-default-option">How to Finance/Loan Options</button><br/><br/> </div> <div class="inner"><button type="button" id="closebotbtn"  onclick="option31()"  class="chat-bot-default-option">Test Drive Process</button><br/> <br/> </div><div class="inner"><button type="button" id="closebotbtn"  onclick="option31()"  class="chat-bot-default-option">Home Delivery</button><button type="button" id="closebotbtn"  onclick="option31()"  class="chat-bot-default-option">Others</button></div></div></div>').appendTo($('.mCSB_container')).addClass('new');
    setDate();
    updateScrollbar();
}

function option31() {
    $('<div class="messagebot new"><figure class="chatbotavatar"><img src="http://sandbox.robonegotiator.com/alpana/img/a3.png" /></figure> Our Internet Sales Department would love to work with you for your special needs and can help you figure out the next step.  Is it okay if they call you or email you? <br /> <div id="outer"><br/><br/><br/>  <div class="inner"><button type="button" id="closebotbtn"  onclick="option311(1)" class="chat-bot-default-option">Email Me</button><br/><br/></div><div class="inner"><button type="button" id="closebotbtn"  onclick="option311(2)"  class="chat-bot-default-option">Call Me</button><br/><br/> </div> <div class="inner"><button type="button" id="closebotbtn"  onclick="option311(3)"  class="chat-bot-default-option">Text Me</button><br/> <br/> </div><div class="inner"><button type="button" id="closebotbtn"  onclick="option311(4)"  class="chat-bot-default-option">Never Mind</button></div></div> </div>').appendTo($('.mCSB_container')).addClass('new');
    setDate();
    updateScrollbar();
}

function option311(data) {
    if (data == "1") {
        $('<div class="messagebot new"><figure class="chatbotavatar"><img src="http://sandbox.robonegotiator.com/alpana/img/a3.png" /></figure><span style="font-weight: 400;">Enter your Email :&nbsp;<input type="textarea" id="validtaion1" class="form-control card-text" placeholder="Email Address"></span><span style="font-weight: 400;"><br /><button type="button" id="closebotbtn"  class="chat-bot-default-option" onclick="sentId()" align="right">Submit</button></div>').appendTo($('.mCSB_container')).addClass('new');
    } else if (data == "2") {
        $('<div class="messagebot new"><figure class="chatbotavatar"><img src="http://sandbox.robonegotiator.com/alpana/img/a3.png" /></figure><span style="font-weight: 400;">Enter your number to callback:&nbsp;<input type="textarea" id="validtaion1" class="form-control card-text" placeholder="Enter your number"></span><span style="font-weight: 400;"><br /><button type="button" id="closebotbtn"  class="chat-bot-default-option" onclick="sentId()" align="right">Submit</button></div>').appendTo($('.mCSB_container')).addClass('new');
    } else if (data == "3") {
        $('<div class="messagebot new"><figure class="chatbotavatar"><img src="http://sandbox.robonegotiator.com/alpana/img/a3.png" /></figure><span style="font-weight: 400;">Enter your number to callback:&nbsp;<input type="textarea" id="validtaion1" class="form-control card-text" placeholder="Enter your number"></span><span style="font-weight: 400;"><br /><button type="button" id="closebotbtn"  class="chat-bot-default-option" onclick="sentId()" align="right">Submit</button></div>').appendTo($('.mCSB_container')).addClass('new');
    } else {
        initoptions();
    }

    setDate();
    updateScrollbar();
}

function option4() {
    $('<div class="messagebot new"><figure class="chatbotavatar"><img src="http://sandbox.robonegotiator.com/alpana/img/a3.png" /></figure><span style="font-weight: 400;">Product:</span><span style="font-weight: 400;">&nbsp;VIN: 2T2ZFMCA2GC001437</span><span style="font-weight: 400;"></span></div>').appendTo($('.mCSB_container')).addClass('new');

    $('<div id="outer"><br/><br/><br/>  <div class="inner"><button type="button" id="closebotbtn"  class="chat-bot-default-option" onclick="vehiclespecs()" align="right">VEHICLE SPECS</button><button type="button" id="closebotbtn"  class="chat-bot-default-option" onclick="TOTALCOSTOFOWNERSHIP()" align="right">TOTAL COST OF OWNERSHIP</button><button type="button" id="closebotbtn"  class="chat-bot-default-option" onclick="accident()" align="right">TITLE/LIEN/ACCIDENT</button><button type="button" id="closebotbtn"  class="chat-bot-default-option" onclick="MARKETDATA()" align="right">MARKET DATA</button><button type="button" id="closebotbtn"  class="chat-bot-default-option" onclick="FULLREPORT()" align="right">FULL REPORT</button></div></div>').appendTo($('.mCSB_container')).addClass('new');
    updateScrollbar();
}

function FULLREPORT(datavindetails) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            var result1 = JSON.parse(this.responseText);
            var result2 = JSON.stringify(result1.dataset)
            result2 = result2.replace(/["']/g, "");

            window.open(result2, "_self");
        }
    }
    xhr.open('GET', 'https://vinapi.bwaystechnomedia.in/Home/ViewFullReport?vin=2T2ZFMCA2GC001437 ', true);
    xhr.send(null);
}

function MARKETDATA(datavindetails) {
	 var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            var result1 = JSON.parse(this.responseText);
			            var result2 = JSON.stringify(result1.dataset.prices);

            $('<div class="messagebot new"><figure class="chatbotavatar"><img src="http://sandbox.robonegotiator.com/alpana/img/a3.png" /></figure><div id="piechart">Your data is loading...</div></div>').appendTo($('.mCSB_container')).addClass('new');
            setDate();

  var options = {
          title: 'Price Range for the selected product'
        };
   var data =  new google.visualization.DataTable(result2);
 var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    chart.draw(data, options);


            updateScrollbar();

        }
    }
    xhr.open('GET', 'https://vinapi.bwaystechnomedia.in/Home/VehicleMarketValue?vin=1FTEW1E44LFA20145', true);
    xhr.send(null);

}

function accident(datavindetails) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            var result1 = this.responseText;
            $('<div class="messagebot new"><figure class="chatbotavatar"><img src="http://sandbox.robonegotiator.com/alpana/img/a3.png" /></figure>' + result1 + '</div>').appendTo($('.mCSB_container')).addClass('new');
            setDate();

            updateScrollbar();

        }
    }
    xhr.open('GET', 'https://vinapi.bwaystechnomedia.in/Home/VehicleLienAccidentTitlesPartial?vin=1FTEW1E44LFA20145', true);
    xhr.send(null);
}

function TOTALCOSTOFOWNERSHIP(datavindetails) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            var result1 = this.responseText;
            $('<div class="messagebot new"><figure class="chatbotavatar"><img src="http://sandbox.robonegotiator.com/alpana/img/a3.png" /></figure>' + result1 + '</div>').appendTo($('.mCSB_container')).addClass('new');
            setDate();

            updateScrollbar();
        setTimeout(function() {
       initoptions();
      }, 3000);

        }
    }
    xhr.open('GET', 'https://vinapi.bwaystechnomedia.in/Home/VehicleOwnershipCostPartial?vin=1FTEW1E44LFA20145', true);
    xhr.send(null);
}

function vehiclespecs(datavindetails) {
    //alert("datavindetails");
}

function openChat() {
    $("#BotWindow").show();
}

function closeChatSec() {
    $("#BotWindow").hide();
}

function option21() {
    $('<div class="messagebot new"><figure class="chatbotavatar"><img src="http://sandbox.robonegotiator.com/alpana/img/a3.png" /></figure><span style="font-weight: 400;">Let us start.  First, I would like you to give me your counteroffer you can commit.My Counteroffer: </span><span style="font-weight: 400;">&nbsp;VIN: 2T2ZFMCA2GC001437</span><span style="font-weight: 400;"></span><div class="wrapper"><form class="form-inline"><label class="sr-only" for="inlineFormInputGroup">Amount</label><div class="input-group mb-2 mr-sm-2 mb-sm-0"><div class="input-group-addon currency-symbol">$</div><input type="text" class="form-control currency-amount" id="inlineFormInputGroup" placeholder="0.00" size="8"><div class="input-group-addon currency-addon"><select class="currency-selector"><option data-symbol="$" data-placeholder="0.00" selected>USD</option><option data-symbol="€" data-placeholder="0.00">EUR</option><option data-symbol="£" data-placeholder="0.00">GBP</option><option data-symbol="¥" data-placeholder="0">JPY</option> <option data-symbol="$" data-placeholder="0.00">CAD</option><option data-symbol="$" data-placeholder="0.00">AUD</option></select></div></div></form></div><div id="outer"><br/><div class="inner"><button type="button" id="closebotbtn"  class="chat-bot-default-option" onclick="Commitmyoffer()" align="right">Commit  My Offer</button></div></div></div>').appendTo($('.mCSB_container')).addClass('new');

    $(".currency-selector").on("change", updateSymbol);

    updateScrollbar();
}

function updateSymbol(e) {
    var selected = $(".currency-selector option:selected");
    $(".currency-symbol").text(selected.data("symbol"))
    $(".currency-amount").prop("placeholder", selected.data("placeholder"))
    $('.currency-addon-fixed').text(selected.text())
}

function Commitmyoffer() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            var result1 = JSON.parse(this.responseText);
            var result2 = JSON.stringify(result1.deal_exist)
            result2 = result2.replace(/["']/g, "");
            if (result2 == "yes") {
                dealyes();
            } else {
                dealno();
            }
        }
    }
    xhr.open('GET', 'https://market.robonegotiator.com/api-786-instant-deal-check?plugin_mode=sandbox&api_key=f07862522e9585ffd7ca6a6138ec262480b0d91f&upc_product_code=1FTEW1E44LFA20145&seller_email=seller@robonegotiator.com', true);
    xhr.send(null);



}

function dealno() {
    $('<div class="messagebot new"><figure class="chatbotavatar"><img src="http://sandbox.robonegotiator.com/alpana/img/a3.png" /></figure><span style="font-weight: 400;">We do not have any special deal from this dealer; however, we can get your offer and inform you when we have a matching dealer’s deal.<br/><br/> Do you want to provide your offer so we can find a dealer matching your offer? .</span><span style="font-weight: 400;"></span></div>').appendTo($('.mCSB_container')).addClass('new');
    $('<div id="outer"><br/><br/><br/>  <div class="inner"><button type="button" id="closebotbtn"  class="chat-bot-default-option" onclick="optiondealnoyes()" align="right">Yes</button><button type="button" id="closebotbtn"  class="chat-bot-default-option" onclick="optiondealnono()" align="right">No</button></div></div>').appendTo($('.mCSB_container')).addClass('new');
    updateScrollbar();
}

function dealyes() {
    $('<div class="messagebot new"><figure class="chatbotavatar"><img src="http://sandbox.robonegotiator.com/alpana/img/a3.png" /></figure><span style="font-weight: 400;">Good News!! We do have a special deal for this vehicle: 2T2ZFMCA2GC001437  <br/> <br/> Let us check if you qualify for a special discount, rebate, incentive, or coupon. We will automatically apply applicable amount to your deal.</span><span style="font-weight: 400;"></span></div>').appendTo($('.mCSB_container')).addClass('new');
    updateScrollbar();

 var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            var result1 = JSON.parse(this.responseText);
            var result2 = JSON.stringify(result1.deal_exist)
            result2 = result2.replace(/["']/g, "");
            if (result2 == "yes") {
                dealyes();
            } else {
                dealno();
            }
        }
    }
    xhr.open('GET', 'http://my.robonegotiator.com/api-786-get-product-discounts?&api_key=f07862522e9585ffd7ca6a6138ec262480b0d91f&upc_product_code=2FMPK4K92LBA12113&seller_email=seller@robonegotiator.com&plugin_mode=sandbox&json_result=1', true);
    xhr.send(null);

    setTimeout(function() {
        $('<div class="messagebot new"><figure class="chatbotavatar"><img src="http://sandbox.robonegotiator.com/alpana/img/a3.png" /></figure><span style="font-weight: 400;">You are in luck. We do have some special rebates/ incentives/ discounts/ coupons as shown below. Are you qualified for?  </span><span style="font-weight: 400;"></span></div>').appendTo($('.mCSB_container')).addClass('new');
        updateScrollbar();
    }, 5000);

}

function option22() {
    initoptions();
}

function option2() {
    $('<div class="messagebot new"><figure class="chatbotavatar"><img src="http://sandbox.robonegotiator.com/alpana/img/a3.png" /></figure><span style="font-weight: 400;">Wonderful.Let\’s make sure we are checking for a deal and negotiating for Product:</span><span style="font-weight: 400;">&nbsp;VIN: 2T2ZFMCA2GC001437</span><span style="font-weight: 400;"></span></div>').appendTo($('.mCSB_container')).addClass('new');

    $('<div id="outer"><br/><br/><button type="button" id="closebotbtn"  class="chat-bot-dealselection" onclick="option21()" align="right">Yes</button><button type="button" id="closebotbtn"  class="chat-bot-dealselection" onclick="option22()" align="right">No</button></div>').appendTo($('.mCSB_container')).addClass('new');
    updateScrollbar();
}

function dropdownselect() {

    var x = document.getElementById("mySelect").value;

    if (x == "Ecommerce 0") {
        var x = "Bot";
        $(".messagebot.new").css("background", "linear-gradient(40deg, #45cafc, #303f9f)");
        $(".chatbotn-title.h2").css("color", "#212529");
        $("#bottitleImg").attr("src", "http://sandbox.robonegotiator.com/alpana/img/a3.png");
        document.getElementById("companyName").innerHTML = x;
        $(".chat-bot-default-option").css("background", "linear-gradient(40deg, #45cafc, #303f9f)");

    } else if (x == "Ecommerce 1") {
        var x = "CDK Global Solutions";
        $(".messagebot.new").css("background", "linear-gradient(40deg, #6baf49, #303f9f)");
        $("#bottitleImg").attr("src", "http://sandbox.robonegotiator.com/alpana/img/cdkglobal.png");
        $(".chatbotn-title.h2").css("color", "#212529");
        document.getElementById("companyName").innerHTML = x;
        $(".chat-bot-default-option").css("background", "linear-gradient(40deg, #6baf49, #303f9f)");


    } else if (x == "Ecommerce 2") {
        var x = "Dominion Dealer Solutions";
        $(".messagebot.new").css("background", "linear-gradient(40deg,#ffd86f,#fc6262)");
        document.getElementById("companyName").innerHTML = x;
        $("#bottitleImg").attr("src", "http://sandbox.robonegotiator.com/alpana/img/dominion.png");
        $(".chatbotn-title.h2").css("color", "#212529");
        $(".chat-bot-default-option").css("background", "linear-gradient(40deg,#ffd86f,#fc6262)");

    } else if (x == "Ecommerce 3") {
        var x = "Search Optics";
        $(".messagebot.new").css("background", "linear-gradient(40deg,#9e9e9e,#4c4d4e)");
        document.getElementById("companyName").innerHTML = x;
        $("#bottitleImg").attr("src", "http://sandbox.robonegotiator.com/alpana/img/Searchoptics.png");
        $(".chatbotn-title.h2").css("color", "#212529");
        $(".chat-bot-default-option").css("background", "linear-gradient(40deg,#9e9e9e,#4c4d4e)");

    }
}
