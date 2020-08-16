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
    <script type="text/javascript">
        var DEBUG = false;
        if(!DEBUG){
            if(!window.console) window.console = {};
            var methods = ["log", "debug", "warn", "info", "error"];
            for(var i=0;i<methods.length;i++){
                console[methods[i]] = function(){};
            }
        }
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

    <!-- New Interface Integration -->
    <!-- Importing of Data From Local Resource -->
    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,300,400,500,600,700,900%7COpen+Sans:300,400,600,700,800" rel="stylesheet" type="text/css">
    <script src="_nwAssets/vendor/jquery/jquery.min.js"></script>
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="_nwAssets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="_nwAssets/vendor/font-awesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="_nwAssets/vendor/animate/animate.min.css">
    <link rel="stylesheet" href="_nwAssets/vendor/linear-icons/css/linear-icons.min.css">
    <link rel="stylesheet" href="_nwAssets/vendor/owl.carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="_nwAssets/vendor/owl.carousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="_nwAssets/vendor/magnific-popup/magnific-popup.min.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="_nwAssets/css/theme.css">
    <link rel="stylesheet" href="_nwAssets/css/theme-elements.css">

    <!-- Skin CSS -->
    <link rel="stylesheet" href="_nwAssets/css/skins/default.css">
    <script src="_nwAssets/master/style-switcher/style.switcher.localstorage.js"></script>

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="_nwAssets/css/custom.css">

	<?php echo $__env->yieldContent('stylesheet'); ?>

    <!-- Head Libs -->
    <script src="_nwAssets/vendor/modernizr/modernizr.min.js"></script>

    <!-- Importing Header Ends -->
</head>
<?php $header_top = \App\CMS\Header::find(2) ;
$footer = \App\CMS\Footer::find(1)
?>

<body>
<div class="body">
    <!-- Main header start -->
    <?php echo $__env->make('cms.layout.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- Main header end -->

        <?php echo $__env->yieldContent('content'); ?>


    <!-- Footer start -->
    <?php echo $__env->make('cms.layout.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>


<?php echo e(\App\Http\Controllers\PagesHandler::importAngular()); ?>

<!-- Footer end -->

<!-- Full Page Search -->


<!-- Vendor -->
<script src="_nwAssets/vendor/jquery.appear/jquery.appear.min.js"></script>
<script src="_nwAssets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="_nwAssets/vendor/jquery-cookie/jquery-cookie.min.js"></script>
<script src="_nwAssets/master/style-switcher/style.switcher.js" id="styleSwitcherScript" data-base-path="" data-skin-src=""></script>
<script src="_nwAssets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="_nwAssets/vendor/common/common.min.js"></script>
<script src="_nwAssets/vendor/jquery.validation/jquery.validation.min.js"></script>
<script src="_nwAssets/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.min.js"></script>
<script src="_nwAssets/vendor/jquery.gmap/jquery.gmap.min.js"></script>
<script src="_nwAssets/vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
<script src="_nwAssets/vendor/isotope/jquery.isotope.min.js"></script>
<script src="_nwAssets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="_nwAssets/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="_nwAssets/vendor/vide/vide.min.js"></script>
<script src="_nwAssets/vendor/vivus/vivus.min.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="_nwAssets/js/theme.js"></script>

<!-- Current Page Vendor and Views -->
<script src="_nwAssets/vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script src="_nwAssets/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

<!-- Theme Custom -->
<script src="_nwAssets/js/custom.js"></script>

<!-- Theme Initialization Files -->
<script src="_nwAssets/js/theme.init.js"></script>


<script type="text/javascript">

    //$('#datePicker').pickadate() ;


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

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript">

    app.controller('RegisterCTRL' , function ($scope , $http , $q , $timeout) {


        $scope.register = {
            data : {
                negotiation : 'auto'
            } ,
            response : undefined ,
            progress : false,


        } ;

        $scope.registration = function () {


            $scope.register.progress = true ;

            var q = $q.defer() ;
            $http.post('<?php echo e(route('register.submit')); ?>' , $scope.register.data).then(
                function (resp) {

                    q.resolve(resp);
                    console.log(resp.data) ;
                    $scope.register.response = resp.data ;



                } , function (reason) {

                    q.reject(reason);
                    console.log(reason) ;
                }
            ).catch(function (error) {

            }).finally(function (data) {
                $scope.register.progress = false ;
                if($scope.register.response.success !== undefined && $scope.register.response.success === true){

                    $timeout(
                        window.location.href = '<?php echo e(route('dashboard')); ?>' , 2000
                    )

                }
            });



            return q.promise ;




        };



    });


    app.controller('ProductCTRL' , function ($scope , $http , $q) {


            $scope.products = {

                data: {},
                response: undefined,
                progress: false,
                terms: {
                    category: 'Automobiles',
                    order : 'desc'
                }


            };


            $scope.getSearchResult = function () {

                $scope.products.progress = true;

                var q = $q.defer();

                $http.post('<?php echo e(route('products.search')); ?>', $scope.products.terms).then(
                    function (resp) {
                        q.resolve(resp);
                        console.log(resp.data);
                        $scope.products.data = resp.data.data;
                        $scope.pagination = "Showing "+resp.data.to+" of "+resp.data.total+" results";
                        $scope.categoryName = "<b>Showing Listing From "+$scope.products.terms.category+"</b>";
                    }, function (reason) {

                        q.reject(reason);
                        console.log(reason);
                    }
                ).catch(function (error) {

                }).finally(function (data) {
                    $scope.products.progress = false;

                });


                return q.promise;


            }

        }
    ) ;

</script>


<?php echo $__env->yieldContent('config-js'); ?>

<!-- <script type="text/javascript" src="<?php echo e(asset('js/plugins/robonegotiator-sales-plugin.js?ver=2.0')); ?>"></script> -->
<!-- <script type="text/javascript" src="<?php echo e(asset('js/plugins/robonegotiator.plugin.js?ver=2.0')); ?>"></script> -->
<!-- <script type="text/javascript" src="<?php echo e(asset('js/plugins/robonegotiator.auto.js?ver=2.0')); ?>"></script> -->
<script type="text/javascript" src="<?php echo e(asset('js/plugins/roboconfig.js')); ?>"></script>




<?php if(Request::route()->getName() === 'buyer.product.details'): ?>

    <script type="text/javascript">
        $('#get_price').click(function () {

            $('#modal_get_price').modal('show');

        });

        $('#get_price_form').submit(function () {
            $('#modal_get_price').modal('hide');
            triggerNegotiationBar(ROBO_API_KEY, ROBO_UPC_CODE, ROBO_SELLER_EMAIL, ROBO_NEGOTIATION_MODE);
        }) ;
        $('#get_price_form_im').submit(function () {
            $('#modal_get_price_immediately').modal('hide');
            triggerNegotiationBar(ROBO_API_KEY, ROBO_UPC_CODE, ROBO_SELLER_EMAIL, ROBO_NEGOTIATION_MODE);
        }) ;

        function  preventUserFromExit() {
            $('#modal_get_price').modal('hide');

            $('#modal_get_price_immediately').modal('show');
        }

        window.addEventListener('beforeunload', function (e) {

            if(typeof needForcePrevent !== "undefined") {
                if (typeof chatBotUsed === "undefined" || chatBotUsed === false) {

                    e.preventDefault();
                    e.returnValue = '';
                    $('#modal_get_price_immediately').modal('show');

                }
            }


        });
    </script>

<?php endif; ?>

</body>
</html>
