<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
    <title>RoboNegotiator</title>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-122868353-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-122868353-1');
    </script>


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-122868353-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-122868353-1');
    </script>







    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">

    <!-- External CSS libraries -->

    <link rel="stylesheet" type="text/css"
          href="{{asset('css/mdb.css')}}">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">


    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,600,700%7CUbuntu:300,400,700" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css"
          rel="stylesheet">



    <style type="text/css">
        .navbar .navbar-brand img {
            height: 60px;
        }



        .md-form textarea[type=text]:focus:not([readonly]) + label {
            color: #b87333; }
        .md-form textarea[type=text]:focus:not([readonly]) {
            box-shadow: 0 1px 0 0 #b87333 !important;
            border-bottom: 1px solid #b87333 !important; }

        .md-form input[type=text]:focus:not([readonly]) {
            box-shadow: 0 1px 0 0 #b87333 !important;
            border-bottom: 1px solid #b87333 !important; }



        @media (min-width: 992px) {
            .modal-lg, .modal-xl {
                max-width: 1200px !important;
            }
        }

        /* Media Query for Mobile Devices */
        @media (max-width: 480px) {
            .pro-img {
                width: 400px!important;
                height : 270px!important;
            }
        }

        /* Media Query for low resolution  Tablets, Ipads */
        @media (min-width: 481px) and (max-width: 767px) {
            .pro-img {
                width: 400px!important;
                height : 270px!important;
            }
        }

        /* Media Query for Tablets Ipads portrait mode */
        @media (min-width: 768px) and (max-width: 1024px){
            .pro-img {
                width: 450px!important;
                height : 350px!important;
            }
        }

        /* Media Query for Laptops and Desktops */
        @media (min-width: 1025px) and (max-width: 1280px){
            .pro-img {
                width: 450px!important;
                height : 400px!important;
            }
        }

        @media (min-width: 1280px){
            .pro-img {
                width: 450px!important;
                height : 400px!important;
            }
        }

        /* Media Query for Large screens */


    </style>

    <style type="text/css">
        .content-area {
            padding: 40px 0 70px !important;
        }
    </style>
</head>
<body>



@yield('content')












<script src="js/jquery-2.2.0.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>





<script type="text/javascript">
    // Normal Brain: Designing a cool lil chat widget in CSS with some time between projects.
    // Big Brain: Make a functional jQuery form submit and simulate a response.
    // Galactic Brain: Do it in React.
    // Multiversal Brain: Make a React Native chat app.

    // Version: Big Brain, but with a headache.
    // Headache: Needed to include babel polyfill to work with Promises.
    $(function () {

        // Define some elements from the DOM and utility methods.
        let $form = $("#msgForm"),
            $newMsg = $form.find("input"),
            $sendBtn = $form.find("button"),
            $feed = $("#msgs"),
            _wait = ms => new Promise((r, j) => setTimeout(r, ms)), // See [0]
            _secs = (a, b) => Math.floor(Math.random() * (b - a + 1)) + a;

        // Define our send method.
        var _send = data => {
            // Send data to a new .msg
            let $msg = $('<div class="msg"></div>'),
                { sender, typing } = data;
            if (sender !== "me") {
                $msg.addClass("to");
            } else {
                $msg.addClass("from");
            }
            $msg.text(data.msg);
            if (typing) $msg.addClass("typing");
            $msg.appendTo($feed);
            // If sending was successful, clear the text field.
            $newMsg.val("");
            // And simulate a reply from our agent.
            if (sender === "me") setTimeout(_agentReply, 1000);
            if (typing) return $msg; // ref to new DOM .msg
        };



        var _agentReply = () => {
            // After a few seconds, the agent starts to type a message.
            let waitAfew = _wait(_secs(3000, 5000)),
                showAgentTyping = async () => {
                    console.log("agent is typing...");
                    // Let the user know the agent is typing
                    let $agentMsg = _send({ msg: "Agent is typing...", typing: true, sender: false });
                    // and in a few seconds show the typed message.
                    waitAfew.then(() => {
                        // @TODO: Simulate actual typing by removing the typing message when the agent isn't typing, and before the agent sends the typed message. Also allow typing to continue a number of times with breaks in between.
                        $agentMsg.text("Lorem ipsum dolor sit amet.");
                        $agentMsg.removeClass("typing");
                    });

                };
            waitAfew.then(showAgentTyping());
        };

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
        $sendBtn.on("click", function (e) {
            // Stop the prop
            e.stopPropagation();e.preventDefault();
            // Wrap the msg and send!
            let theEnvelope = {
                msg: $newMsg.val(),
                sender: "me" };

            return _send(theEnvelope);
        });
    });

    /**
     * Roadmap / TODO / Bugs to be fixed
     *
     * 1) add max-height and overflow scrolling.
     * 2) add debounce/throttle to agent reply, so that when the user sends a new message before the agent has replied it wont create a new agent reply process. [big brain version only]
     *
     */

    /**
     * Credits
     *
     * [0] wait() method from: https://hackernoon.com/lets-make-a-javascript-wait-function-fa3a2eb88f11
     *
     */
</script>


{{\App\Http\Controllers\PagesHandler::importAngular()}}

<style type="text/css">
    .navbar-nav ul li a {
        font-size: 20px !important;
        font-weight: bold !important;
    }

    .main-header .navbar-expand-lg .navbar-nav .nav-link {
        padding: 30px 15px !important;
        background: #000 !important;
    }

    .setting-button {
        display: none !important;
    }
    .copper-color  {
        color: #b87333 !important;
    }

    @media only screen and (max-width: 480px) {
    }

    .custom-control-label {
        position: initial !important;
        margin-bottom: 0;
        vertical-align: top;
    }

</style>

<script type="text/javascript">

    $('#datePicker').pickadate() ;


</script>

<script type="text/javascript">

    $('#seller-div').hover(function () {
        $('#seller-div').addClass('rgba-black-light') ;
    }).mouseleave(function () {
        $('#seller-div').removeClass('rgba-black-light') ;
    });

    $('#buyer-div').hover(function () {
        $('#buyer-div').addClass('rgba-black-light') ;
    }).mouseleave(function () {
        $('#buyer-div').removeClass('rgba-black-light') ;
    })



</script>
<script type="text/javascript">



    app.controller('ProductCTRL' , function ($scope , $http , $q) {


        $scope.products = {

            data : {} ,
            response : undefined ,
            progress : false ,
            terms : {
                category : 'Automobiles'
            }


        } ;

        $scope.getInstantCheckResult = function () {

            alert('checking deals ..') ;

            $scope.products.progress = true ;

            var q = $q.defer() ;

            $http.get('{{route('negotiate.instantDealCheck',['upc_product_code' => app('request')->get('upc_product_code')])}}' )
                .then(
                function (resp) {

                    q.resolve(resp);
                    console.log(resp.data) ;
                    $scope.products.data = resp.data ;
                } , function (reason) {

                    q.reject(reason);
                    console.log(reason) ;
                }
            ).catch(function (error) {

            }).finally(function (data) {
                $scope.products.progress = false ;

            });


            return q.promise ;




        };



    });


</script>
</body>
</html>