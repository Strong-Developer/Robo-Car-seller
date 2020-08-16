document.getElementsByTagName("head")[0].insertAdjacentHTML(
    "afterbegin",
    "<link rel='stylesheet' href='"+API_ENDPOINT+"/alpana/css/stylebotn.css' />");
document.getElementsByTagName("head")[0].insertAdjacentHTML(
        "afterbegin",
        "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css' />");
document.getElementsByTagName("head")[0].insertAdjacentHTML(
        "afterbegin",
        "<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans' />");
document.getElementsByTagName("head")[0].insertAdjacentHTML(
    "afterbegin",
    "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.3/jquery.mCustomScrollbar.min.css' />");

var chatElement = '<div class="chatwindow"><div class="dropdownbot"><select class="dropbotbtn" id="mySelect" onchange="dropdownselect()"><div class="dropdownbot-content"><option value="Ecommerce 0">Default</option><option value="Ecommerce 1">CDK  Global</option><option value="Ecommerce 2">Dominion</option><option value="Ecommerce 3">Search Optics</option></div></select></div><button type="button" id="chat-bot-widget-open" class="chat-bot-widget-open" onclick="openChat()"></button><div class="chatbotn" id="BotWindow"><div id="heading d-flex justify-content-start" class="chatbotn-title" ><div id="botavatar" class="chatbotnavatar"/><img id="bottitleImg" src="http://sandbox.robonegotiator.com/alpana/img/a3.png" class="chatbotnavatar"/></div><div id="companyName" class="chatbotn-title"><h1>Robo BOT</h1></div><div id="closebot"><button type="button" id="closebotbtn"  onclick="closeChatSec()"  class="chat-bot-widget-close"></div></div><div class="messagesbot"><div class="messages-contentbot"></div></div><div class="message-box"></div></div></div>';

var div = document.createElement('div');
document.getElementsByTagName("body")[0].appendChild(div);
div.innerHTML = chatElement;

var otherJsLoad1 = document.createElement('script');
otherJsLoad1.src = 'http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js';
document.head.appendChild(otherJsLoad1);

var otherJsLoad2 = document.createElement('script');
otherJsLoad2.src = API_ENDPOINT+'/alpana/js/index.js';
document.head.appendChild(otherJsLoad2);

var otherJsLoad3 = document.createElement('script');
otherJsLoad3.src = 'https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.3/jquery.mCustomScrollbar.concat.min.js';
document.head.appendChild(otherJsLoad3);
