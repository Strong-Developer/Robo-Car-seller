
<!doctype html>
<html class="no-js" lang="en" ng-app="app">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>RoboNegotiator | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="afterlogin_assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="afterlogin_assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="afterlogin_assets/css/themify-icons.css">
    <link rel="stylesheet" href="afterlogin_assets/css/metisMenu.css">
    <link rel="stylesheet" href="afterlogin_assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="afterlogin_assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="afterlogin_assets/css/typography.css">
    <link rel="stylesheet" href="afterlogin_assets/css/default-css.css">
    <link rel="stylesheet" href="afterlogin_assets/css/styles.css">
    <link rel="stylesheet" href="afterlogin_assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="afterlogin_assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <!-- jquery latest version -->
    <script src="afterlogin_assets/js/vendor/jquery-2.2.4.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="<?php echo e(route('home.main')); ?>" style="max-width: 300px;"><img src="afterlogin_assets/images/icon/logo.png" alt="logo" width="500px;"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li <?php if(\Request::is('dashboard')): ?> class="active" <?php endif; ?> >
                                <a href="<?php echo e(route('dashboard')); ?>" aria-expanded="true"><i class="ti-home"></i><span>dashboard</span></a>
                               </li>
                            <li <?php if(\Request::is('manage-products')): ?> class="active" <?php endif; ?> >
                                <a href="<?php echo e(route('products.manage')); ?>" aria-expanded="true"><i class="fa fa-list-ul " aria-hidden="true"></i><span>Manage Products/Deals</span></a>
                            </li>










                            <li  <?php if(\Request::is('manage-discounts-rebates')): ?> class="active" <?php endif; ?> >
                                <a href="<?php echo e(url('manage-discounts-rebates')); ?>" aria-expanded="true"><i class="fa fa-list-ul" aria-hidden="true"></i><span>
                                Manage Discounts/Rebates
                                </span></a>
                            </li>
                            <li  <?php if(\Request::is('manage-lease-parameters')): ?> class="active" <?php endif; ?> >
                                <a href="<?php echo e(url('manage-lease-parameters')); ?>" aria-expanded="true"><i class="fa fa-list-ul" aria-hidden="true"></i><span>
                                Manage Lease Parameters
                                </span></a>
                            </li>
                            <li  <?php if(\Request::is('manage-finance-parameters')): ?> class="active" <?php endif; ?> >
                                <a href="<?php echo e(url('manage-finance-parameters')); ?>" aria-expanded="true"><i class="fa fa-list-ul" aria-hidden="true"></i><span>
                                Manage finance Parameters
                                </span></a>
                            </li>
                            <li <?php if(\Request::is('set-rules')): ?> class="active" <?php endif; ?> >
                                <a href="<?php echo e(route('setrules')); ?>" aria-expanded="true"><i class="ti-pie-chart"></i><span>Set Negotiation Parameters /Rules</span></a>
                            </li>

                            <li <?php if(\Request::is('getTranscription')): ?> class="active" <?php endif; ?> >
                                <a href="<?php echo e(route('getTranscription')); ?>" aria-expanded="true"><i class="fa fa-key" aria-hidden="true"></i><span>View Transcriptions</span></a>
                            </li>
                            <li>
                                <a href="#" aria-expanded="true"><i class="fa fa-key" aria-hidden="true"></i><span>Get API Key</span></a>
                            </li>
                            <li>
                                <a href="#" aria-expanded="true"><i class="fa fa-cogs" aria-hidden="true"></i><span>My Plugin Settings</span></a>
                            </li>
                            <li  <?php if(\Request::is('customer')): ?> class="active" <?php endif; ?> >
                                <a href="<?php echo e(route('customer')); ?>" aria-expanded="true"><i class="fa fa-user" aria-hidden="true"></i><span>Customer Profile</span></a>
                            </li>

                            <li>
                                <a href="<?php echo e(route('logout')); ?>" aria-expanded="true"><i class="fa fa-sign-out" aria-hidden="true"></i><span>Logout</span></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li id="full-view"><i class="ti-fullscreen"></i></li>
                            <li id="full-view-exit"><i class="ti-zoom-out"></i></li>

                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <!-- <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="#">Home</a></li>
                                <li><span>Dashboard</span></li>
                            </ul> -->
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="afterlogin_assets/images/author/avatar.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><small>Welcome</small><br/><?php echo e(Auth::user()->first_name); ?> <?php echo e(Auth::user()->last_name); ?><i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="container-fluid p-0 m-0 mt-3">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </div>

        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <?php echo $__env->make('cms.layout.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <!--Footer-->
    <?php echo e(\App\Http\Controllers\PagesHandler::importAngular()); ?>


    <!-- bootstrap 4 js -->
    <script src="afterlogin_assets/js/popper.min.js"></script>
    <script src="afterlogin_assets/js/bootstrap.min.js"></script>
    <script src="afterlogin_assets/js/owl.carousel.min.js"></script>
    <script src="afterlogin_assets/js/metisMenu.min.js"></script>
    <script src="afterlogin_assets/js/jquery.slimscroll.min.js"></script>
    <script src="afterlogin_assets/js/jquery.slicknav.min.js"></script>
    <script src="afterlogin_assets/js/dashboard.js"></script>
    <script src="afterlogin_assets/js/scripts.js"></script>
    <script src="afterlogin_assets/js/datatablemanager.js"></script>
    <?php echo $__env->yieldContent('my-script'); ?>
</body>

</html>
