

<?php $__env->startSection('content'); ?>

<style type="text/css">
    #ambarchart3{
        height: 100px;
    }
    .badge{
        font-size: 100% !important;
    }
</style>

<section ng-init="getSearchResult()" ng-controller="ProductsCTRL">
    <?php $count = 1; $initProduct = '';?>
    <?php if(count($products)>0): ?>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h5 class="card-title">Select Product</h5>
                <div class="form-group col-md-12">
                    <select class="custom-select" id="product" onchange="getNegotiatinProgress(this.value)" ng-init=" products.terms = data[0]" ng-model="products.terms.upc_product_code" ng-change="getSearchResult()">
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php if($count == 1): ?> selected <?php endif; ?> value="<?php echo e($product->upc_product_code); ?>"><?php echo e($product->product_title); ?></option>
                            <?php
                                if ($count == 1) {
                                    $initProduct = $product->upc_product_code;
                                }
                                $count++; 
                            ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <!-- For Deals Section Only -->
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="card-title">Market Data</h5>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <b>Data For Zip Code: </b>
                                <span class="badge badge-primary badge-pill" id="totalDeals">91362</span>
                            </li>
                            <!-- <li class="list-group-item d-flex justify-content-between align-items-center">
                                <b>Negotiation Mode: </b>
                                <span class="badge badge-primary badge-pill" id="totalDeals">Auto</span>
                            </li> -->
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <b>Market Price: </b>
                                <span class="badge badge-primary badge-pill" id="marketPricePlaceholder">$0</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <b>Average Selling Price: </b>
                                <span class="badge badge-primary badge-pill" id="AverageSellingPricePlaceholder">$0</span>
                            </li>
                        </ul>
                        <div class="card-body">
                            <!-- <div id="ambarchart3"></div> -->
                            <!-- <div id="ambarchart4"></div> -->
                        </div>
                    </div>
                </div>
               
            </div>
            <div class="col-4">
                <!-- Product and Details -->
                <h5 class="card-title">Your Uploaded Deal</h5>
                <div class="col-md-12 mt-3">
                    <div class="mb-3">
                        <div id="carouselExampleControls" class="card-img-top carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100 img-responsive" ng-if="product.images" src="storage/app/{{product.images}}" alt="First slide">
                                    <img class="d-block w-100 img-responsive" ng-if="!product.images" src="storage/app/BMW_328i_White.jpg" alt="First slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <b><p style="font-size: 12px;" class="card-title">{{ product.product_title }}, {{ intelligenceReport.parameter2 }},{{ intelligenceReport.parameter4 }}</p></b>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <h4 class="header-title">Historical Data</h4>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <b>Total Amount in Past Deals</b>
                            <span class="badge badge-primary badge-pill" id="totalDeals">0</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <b>Average Negotiation Price</b>
                            <span class="badge badge-primary badge-pill" id="avgNegoPrice">0</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <b>Total Deals Closed</b>
                            <a href='#' data-toggle='modal' data-target='.bd-example-modal-lg'><span class="badge badge-primary badge-pill" id="totalDealCounts">0</span></a>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <b>Total Quantity Sold</b>
                            <a href='#' data-toggle='modal' data-target='.bd-example-modal-lg'><span class="badge badge-primary badge-pill" id="totalQuantitySold">0</span></a>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <b>Settled in Pro Buyer</b>
                            <span class="badge badge-primary badge-pill" id="SettledProBuyer">0</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <b>Settled in Pro Seller</b>
                            <span class="badge badge-primary badge-pill" id="SettledProSeller">0</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-4">
                <!-- Pricing Parameters -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- <h5 class="card-title">Offers Info</h5>
                        <canvas width="380" height="150" id="minMaxAvgCanvas"></canvas>
                        <div align="right" id="maxMinValue" class="preview-textfield reset"></div> -->

                        <h4 class="card-title">Offers Info</h4>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <b>Minimum Offer Price</b>
                                <span class="badge badge-primary badge-pill" id="minOfferInfo">$0</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <b>Average Offer Price</b>
                                <span class="badge badge-primary badge-pill" id="avgOfferInfo">$0</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <b>Maximum Offer Price</b>
                                <span class="badge badge-primary badge-pill" id="maxOfferInfo">$0</span>
                            </li>
                        </ul>
                        <br/><br/><br/>
                    </div> 
                    <div class="clearfix"></div>
                    <div class="col-md-12">
                        <h5 class="card-title">Deal Intelligence Report</h5>
                        <!-- <div class="row" style=" height:auto; width: 330px !important; margin: 0px !important; font-weight: bold;">
                            <canvas style="margin-top: -4%;" id="seolinechart8" height="338"></canvas>
                        </div> -->
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <b>Deals Closed Neutrally </b>
                                <span class="badge badge-primary badge-pill" id="neutralProductsId">0</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <b>Deals Closed Pro-Buyer</b>
                                <span class="badge badge-primary badge-pill" id="ProBuyerProductsId">0</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <b>Deals Closed Pro-Seller</b>
                                <span class="badge badge-primary badge-pill" id="ProSellerProductsid">0</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <b>Pro Buyer Output</b>
                                <span class="badge badge-primary badge-pill" id="probuyeroutputid">0</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <b>Pro Seller Output</b>
                                <span class="badge badge-primary badge-pill" id="ProSellerOutputId">0</span>
                            </li>
                        </ul>
                    </div>

                </div>
                
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-md-12"><h5 class="card-title">Demographics Intelligence (Prospective Buyers)</h5></div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <p class="header-title" style="font-size: 14px;"><b>Common Demographic Parameters (Majority of Deals)</b></p>
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        # of Deals:
                                        <span class="badge badge-primary badge-pill" ng-show="{{demographicsReport.no_of_Deals != undefined}}">{{demographicsReport.no_of_Deals}}</span>
                                        <span class="badge badge-primary badge-pill" ng-show="{{demographicsReport.no_of_Deals === undefined}}">0</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Buyer's Age:
                                        <span class="badge badge-primary badge-pill" ng-show="{{demographicsReport.Buyer_Age != undefined}}">{{demographicsReport.Buyer_Age}}</span>
                                        <span class="badge badge-primary badge-pill" ng-show="{{demographicsReport.Buyer_Age === undefined}}">0</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Buyer's Sex:
                                        <span class="badge badge-primary badge-pill" ng-show="{{demographicsReport.Buyer_Sex != undefined}}">{{demographicsReport.Buyer_Sex}}</span>
                                        <span class="badge badge-primary badge-pill" ng-show="{{demographicsReport.Buyer_Sex === undefined}}">0</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Buyer's Annual Income Range
                                        <span class="badge badge-primary badge-pill" ng-show="{{demographicsReport.Buyer_Annual_Income === undefined}}">{{demographicsReport.Buyer_Annual_Income}}</span>
                                        <span class="badge badge-primary badge-pill" ng-show="{{demographicsReport.Buyer_Annual_Income === undefined}}">$0</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <p class="header-title" style="font-size: 14px;"><b>Individual Demographic Parameters (Majority of Deals)</b></p>
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Sex Of Buyer:
                                        <span class="badge badge-primary badge-pill" ng-show="{{demographicsReport.percenage_distribution != undefined}}">{{demographicsReport.sex_of_buyer}} in {{demographicsReport.percenage_distribution}}% deals</span>
                                        <span class="badge badge-primary badge-pill" ng-show="{{demographicsReport.Buyer_Sex === undefined}}">0 in 0% deals</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Race/Ethnicity:
                                        <span class="badge badge-primary badge-pill" ng-show="{{demographicsReport.race != undefined}}">{{demographicsReport.race}}</span>
                                        <span class="badge badge-primary badge-pill" ng-show="{{demographicsReport.race === undefined}}">0</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Age Group Of Buyer:
                                        <span class="badge badge-primary badge-pill" ng-show="{{demographicsReport.age_group_of_buyer != undefined}}">{{demographicsReport.age_group_of_buyer}}</span>
                                        <span class="badge badge-primary badge-pill" ng-show="{{demographicsReport.age_group_of_buyer === undefined}}">0</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Income Group Of Buyer
                                        <span class="badge badge-primary badge-pill" ng-show="{{demographicsReport.income_group_of_buyer != undefined}}">${{demographicsReport.income_group_of_buyer}}</span>
                                        <span class="badge badge-primary badge-pill" ng-show="{{demographicsReport.income_group_of_buyer === undefined}}">$0</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- <div class="col-md-12 text-center">
                        <p>Avarage Deal/Negotiation Price: <span class="deal-5">0</span></p>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <?php else: ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        You have no Products to view. Please <a href="<?php echo e(route('addProduct')); ?>">Add New Product</a> To Continue
                    </div>
                </div>    
            </div>
        </div>
    </div>
    <?php endif; ?>



</section>

<div class="modal fade bd-example-modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Deal Details</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body modal-xl">
                <div class="container" style="overflow-x: scroll;">
                    <div class="row" style="font-size: 10px;" id="modal_body">
                        No Active Deals
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('my-script'); ?>
<script src="afterlogin_assets/GaugePlugins/GaugeJs/gauge.min.js"></script> 
<script src="afterlogin_assets/GaugePlugins/Plotly/plotly.min.js"></script> 
<script>
    var currentMarketPrice=0;
    var productUPCCode = '';
    $( document ).ready(function() {
        setTimeout(function(){ 
            getNegotiatinProgress('<?php echo $initProduct; ?>');
            productUPCCode = '<?php echo $initProduct; ?>'; 
            marketPriceTally();
        }, 3000);
    });

    function getNegotiatinProgress(pro_code){
        $('#product option:first-child').attr("selected", "selected");
        productUPCCode = pro_code;
        //alert(pro_code);
        /*$.ajax({
            url :"<?php echo e(route('get.progress')); ?>",
            method:"POST",
            data:{upc_product_code:pro_code},
            dataType:"JSON",
            success:function(data){
                console.log(data);
                if (typeof data === "undefined") {}
                else{
                    dealProgress(data);
                    $(".seller_email").text(data[0].seller_email);
                    $(".buyer_email").text(data[0].buyer_email);
                    $(".final_result").text(data[0].comment);
                    $(".matched_qty").text(data[0].matched_quantity);
                    $(".negotiation_amt").text("$"+data[0].type1_negotiation_value);
                }
            }, 
            error:function(){
                $(".seller_email").text("");
                $(".buyer_email").text("");
                $(".final_result").text("");
                $(".matched_qty").text("");
                $(".negotiation_amt").text("");
            }
        });*/

        $.ajax({
            url :"<?php echo e(route('deal.intelligence')); ?>",
            method:"POST",
            data:{upc_product_code:pro_code},
            dataType:"JSON",
            success:function(data){
                console.log('Deal Intelligence '+data);
                //$('#dealFigures').html('<small><b>Neutral Products : '+data.NeutralProducts+' <br/>Probuyer Products : '+data.ProBuyerProducts+'<br/> Proseller Products : '+data.ProSellerProducts+'<br/>Pro Buyer Output : '+data.pro_buyer_output+'<br/>Pro Seller Output : '+data.pro_seller_output+'</b></small>');
                //ambarchart6(data);
                //bi_deals(data);
                biDeals2(data);
                //getDealIntelligenceCockpit(data);
            }, 
            error:function(){
                //$(".seller_email").text("");
            }
        });

        /*$.ajax({
            url :"<?php echo e(route('get.demographicsReport')); ?>",
            method:"POST",
            data:{upc_product_code:pro_code},
            dataType:"JSON",
            success:function(data){
                console.log(data);
                ambarchart1(data);
            }, 
            error:function(){
                //$(".seller_email").text("");
            }
        });*/

        /*$.ajax({
            url :"<?php echo e(route('get.intelligenceReport')); ?>",
            method:"POST",
            data:{upc_product_code:pro_code},
            dataType:"JSON",
            success:function(data){
                console.log(data);
                //ampiechart1(data);
                maxminavg(data);
            }
        });*/


    }
    
    app.controller('ProductsCTRL' , function ($scope , $http , $q) {
            $scope.products = {
                data: {},
                response: undefined,
                progress: false,
                terms: {
                    upc_product_code: '',
                }
            };

            $scope.getSearchResult = function () {

                $http.post('<?php echo e(route('products.all')); ?>', $scope.products.terms).then(
                    function (resp) {
                        //q.resolve(resp);
                        console.log(resp.data.images);
                        $scope.product = resp.data;
                        if(resp.data){
                            $scope.product.images = resp.data.images[0].file_path;
                        }
                        
                    }, function (reason) {

                        //q.reject(reason);
                        console.log(reason);
                    }
                ).catch(function (error) {

                }).finally(function (data) {
                   // $scope.products.progress = false;

                });
                console.log($scope.products.terms+' tettete 888');
                $http.post('<?php echo e(route('deal.intelligence')); ?>', $scope.products.terms).then(
                    function (resp) {
                        //q.resolve(resp);
                        console.log(resp.data);
                        //ambarchart6(resp.data);
                        if (typeof resp.data != 'undefined') {
                            marketPriceTally(resp.data);    
                        }
                        else{
                            marketPriceTally(0);
                        }
                        
                        $scope.intelligence = resp.data;
                    }, function (reason) {

                        //q.reject(reason);
                        console.log(reason);
                    }
                ).catch(function (error) {

                }).finally(function (data) {
                   // $scope.products.progress = false;

                });

                $http.post('<?php echo e(route('get.marketprice')); ?>', $scope.products.terms).then(
                    function (resp) {
                        //q.resolve(resp);
                        console.log(resp.data);
                        currentMarketPrice = resp.data[0];
                        
                    }, function (reason) {

                        //q.reject(reason);
                        console.log(reason);
                    }
                ).catch(function (error) {

                }).finally(function (data) {
                   // $scope.products.progress = false;

                });

                $http.post('<?php echo e(route('get.progress')); ?>', $scope.products.terms).then(
                    function (resp) {
                        //q.resolve(resp);
                        console.log(resp.data);
                        dealProgress(resp.data);
                        
                    }, function (reason) {

                        //q.reject(reason);
                        console.log(reason);
                    }
                ).catch(function (error) {

                }).finally(function (data) {
                   // $scope.products.progress = false;

                });

                $http.post('<?php echo e(route('get.demographicsReport')); ?>', $scope.products.terms).then(
                    function (resp) {
                        //q.resolve(resp);
                        console.log(resp.data);
                        //dealProgress(resp.data);
                        $scope.demographicsReport = resp.data;
                    }, function (reason) {

                        //q.reject(reason);
                        console.log(reason);
                    }
                ).catch(function (error) {

                }).finally(function (data) {
                   // $scope.products.progress = false;

                });

                $http.post('<?php echo e(route('get.intelligenceReport')); ?>', $scope.products.terms).then(
                    function (resp) {
                        //q.resolve(resp);
                        console.log(resp.data);
                        maxminavg(resp.data);
                        $scope.intelligenceReport = resp.data;
                    }, function (reason) {

                        //q.reject(reason);
                        console.log(reason);
                    }
                ).catch(function (error) {

                }).finally(function (data) {
                   // $scope.products.progress = false;

                });

            }

    });
    
    function marketPriceTally(data){
        $.ajax({
            url :"<?php echo e(route('get.marketprice')); ?>",
            method:"POST",
            data:{upc_product_code:productUPCCode},
            dataType:"JSON",
            success:function(marketData){
                currentMarketPrice = marketData[0];
                if (typeof currentMarketPrice != 'object') {
                    $('#marketPricePlaceholder').html('$'+currentMarketPrice);    
                }
                else{
                    $('#marketPricePlaceholder').html('$0');
                }
                if(typeof data.master_average != 'undefined'){
                    $('#AverageSellingPricePlaceholder').html('$'+data.master_average);    
                }
                else{
                    $('#AverageSellingPricePlaceholder').html('$0');
                }
                /*if ($('#ambarchart4').length) {
                    var chart = AmCharts.makeChart("ambarchart4", {
                        "type": "serial",
                        "theme": "light",
                        "marginRight": 70,
                        "dataProvider": [{
                            "country": "Market Price ($"+currentMarketPrice+")",
                            "visits": currentMarketPrice,
                            "color": "#8918FE"
                        }, {
                            "country": "Avarage Selling Price ($"+data.master_average+")",
                            "visits": data.master_average,
                            "color": "#7474F0"
                        }],
                        "valueAxes": [{
                            "axisAlpha": 0,
                            "position": "left",
                            "title": false
                        }],
                        "startDuration": 1,
                        "graphs": [{
                            "balloonText": "<b>[[category]]: $[[value]]</b>",
                            "fillColorsField": "color",
                            "fillAlphas": 0.9,
                            "lineAlpha": 0.2,
                            "type": "column",
                            "valueField": "visits"
                        }],
                        "chartCursor": {
                            "categoryBalloonEnabled": false,
                            "cursorAlpha": 0,
                            "zoomable": false
                        },
                        "categoryField": "country",
                        "categoryAxis": {
                            "gridPosition": "start",
                            "labelRotation": 45
                        },
                        "export": {
                            "enabled": false
                        }

                    });
                }*/
            }
        });
    }

    function maxminavg(data){
        console.log(data);
        var maxPrice = minPrice = AvgPrice = 0;
        if (typeof data === 'undefined') {
            var maxPrice = 0;
            var minPrice = 0;
            var AvgPrice = 0;
        }
        else{
            maxPrice = data['max_buyer_highest_offer_price'];
            //console.log('Heighest Price'+maxPrice);
            minPrice = data['min_buyer_highest_offer_price'];
            //console.log('Heighest Price'+maxPrice);
            AvgPrice = data['avg_buyer_highest_offer_price'];
            $('#maxMinValue').html('<small>Average Offer Price :<b>$'+parseInt(AvgPrice)+'</b> <br/> Minimum Offer Price : <b>$'+parseInt(minPrice)+'</b><br/> Maximum Offer Price : <b>$'+parseInt(maxPrice)+'</b></small>');
            //console.log('Avg Price'+AvgPrice);
        }
        if (typeof minPrice === "undefined") {
            $('#minOfferInfo').html('$0');    
        }
        else{
            $('#minOfferInfo').html('$'+minPrice);
        }
        if (typeof AvgPrice === "undefined") {
            $('#minOfferInfo').html('$0');    
        }
        else{
            $('#minOfferInfo').html('$'+AvgPrice);
        }
        if (typeof AvgPrice === "undefined") {
            $('#maxOfferInfo').html('$0');
        }
        else{
            $('#maxOfferInfo').html('$'+maxPrice);
        }
        
        /*if (typeof data != 'undefined') {
            graphLabelDyn = [];
            var priceDiff = parseFloat(maxPrice)-parseFloat(minPrice);
            priceGaps = priceDiff/6;
            var totalMapings = parseInt(minPrice);
            var minArray = maxArray = [];
            graphLabelDyn.push(minPrice);
            for (var i = 0; i < 6; i++) {
                minArray.push(totalMapings);
                totalMapings = totalMapings + parseInt(priceGaps)
                graphLabelDyn.push(totalMapings);
                maxArray.push(totalMapings);
            }
            console.log('Arr Min'+minArray);
            console.log('Arr Max'+maxArray);
            console.log(graphLabelDyn);
            var opts = {
                angle: 0, // The span of the gauge arc
                lineWidth: 0.2, // The line thickness
                radiusScale: 1, // Relative radius
                pointer: {
                    length: 0.51, // // Relative to gauge radius
                    strokeWidth: 0.033, // The thickness
                    color: '#000000' // Fill color
                },
                limitMax: false,     // If false, max value increases automatically if value > maxValue
                limitMin: false,     // If true, the min value of the gauge will be fixed
                colorStart: '#6FADCF',   // Colors
                colorStop: '#8FC0DA',    // just experiment with them
                strokeColor: '#E0E0E0',  // to see which ones work best for you
                generateGradient: true,
                highDpiSupport: true,     // High resolution support
                // renderTicks is Optional
                renderTicks: {
                    divisions: 20,
                    divWidth: 1.6,
                    divLength: 0.47,
                    divColor: '#333333',
                    subDivisions: 3,
                    subLength: 0.52,
                    subWidth: 0.1,
                    subColor: '#666666'
                },
                percentColors : [[0.0, "#a9d70b" ], [0.50, "#f9c802"], [1.0, "#ff0000"]],
                staticLabels: {
                  font: "10px sans-serif",  // Specifies font
                  labels: graphLabelDyn,  // Print labels at these values
                  color: "#000000",  // Optional: Label text color
                  fractionDigits: 0  // Optional: Numerical precision. 0=round off.
                },
                staticZones: [
                   {strokeStyle: "#F90267", min: minArray[0], max: maxArray[4]},
                   {strokeStyle: "#EEFF18", min: minArray[4], max: maxArray[8]},
                   {strokeStyle: "#02F911", min: minArray[8], max: maxPrice}
                ]
            };
            var target = document.getElementById('minMaxAvgCanvas'); // your canvas element
            var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
            gauge.maxValue = maxPrice; // set max gauge value
            gauge.setMinValue(minPrice);  // Prefer setter over gauge.minValue = 0
            gauge.animationSpeed = 50; // set animation speed (32 is default value)
            gauge.set(AvgPrice); // set actual value
        }*/
    }

    function ambarchart6(data){
        if ($('#ambarchart3').length) {
            var chart = AmCharts.makeChart("ambarchart3", {
                "type": "serial",
                "theme": "light",
                "categoryField": "year",
                "rotate": true,
                "startDuration": 1,
                "categoryAxis": {
                    "gridPosition": "start",
                    "position": "left"
                },
                "trendLines": [],
                "graphs": [{
                        "balloonText": "Income:[[value]]",
                        "fillAlphas": 0.8,
                        "id": "AmGraph-1",
                        "lineAlpha": 0.2,
                        "title": "Income",
                        "type": "column",
                        "valueField": "income",
                        "fillColorsField": "color"
                    }
                ],
                "guides": [],
                "valueAxes": [{
                    "id": "ValueAxis-1",
                    "position": "top",
                    "axisAlpha": 0
                }],
                "allLabels": [],
                "balloon": {},
                "titles": [],
                "dataProvider": [{
                        "year": "Market Price",
                        "income": currentMarketPrice,
                        //"expenses": currentMarketPrice,
                        //"color": "#7474f0",
                        "color2": "#C5C5FD"
                    },
                    {
                        "year": "Avarage Selling Price",
                        "income": data.master_average,
                        //"expenses": 22.8,
                        //"color": "#7474f0",
                        "color2": "#C5C5FD"
                    }
                ],
                "export": {
                    "enabled": false
                }

            });
        }
    }

    function bi_deals(data){
        if ($('#ampiechart1').length) {
            var chart = AmCharts.makeChart("ampiechart1", {
                "type": "pie",
                "labelRadius": -35,
                "labelText": "[[percents]]%",
                "dataProvider": [{
                    "ProductType": "Neutral Products",
                    "value": data.NeutralProducts,
                    "backgroundColor": "#642CF7"
                }, {
                    "ProductType": "Pro Buyer Products",
                    "value": data.ProBuyerProducts,
                    "backgroundColor": "#EA1F4D"
                }, {
                    "ProductType": "Pro Seller Products",
                    "value": data.ProSellerProducts,
                    "backgroundColor": "#0C7C15"
                }, {
                    "ProductType": "Pro Buyer Output",
                    "value": data.pro_buyer_output,
                    "backgroundColor": "#B2CA2E"
                },
                {
                    "ProductType": "Pro Seller Output",
                    "value": data.pro_seller_output,
                    "backgroundColor": "#15B5CE"
                }],
                "color": "#fff",
                "colorField": "backgroundColor",
                "valueField": "value",
                "titleField": "ProductType"
            });
        }
    }

    function dealProgress(valueResult){
        var formatedaray = getAverageInteligence(valueResult)
        var formatedaray = JSON.parse(formatedaray);
        //console.log(' Format '+formatedaray.quantity);
        var data = [
          {
            type: "indicator",
            mode: "gauge+number+delta",
            value: formatedaray.avgPrice,
            title: { text: "Deal Progress", font: { size: 12 } },
            delta: { reference: formatedaray.heighestPrice, increasing: { color: "RebeccaPurple" } },
            gauge: {
              axis: { range: [formatedaray.lowestPrice, formatedaray.heighestPrice], tickwidth: 1, tickcolor: "darkblue" },
              bar: { color: "darkblue" },
              bgcolor: "transparent",
              borderwidth: 2,
              bordercolor: "gray",
              steps: [
                { range: [formatedaray.lowestPrice, formatedaray.avgPrice], color: "cyan" },
                { range: [formatedaray.avgPrice, formatedaray.heighestPrice], color: "royalblue" }
              ],
              threshold: {
                line: { color: "red", width: 4 },
                thickness: 0.75,
                value: formatedaray.avgPrice
              }
            }
          }
        ];

        var layout = {
          width: 300,
          height: 200,
          margin: { t: 25, r: 25, l: 25, b: 25 },
          paper_bgcolor: "transparent",
          font: { color: "darkblue", family: "Arial" }
        };

        Plotly.newPlot('dealInteligence', data, layout);
    }

    function getAverageInteligence(valueResult){
        var _intquantity = _intHeighestPrice = _intLowestPrice = _intavgPrice = _intTotalPrice = 0 ;
        var _intArrPrice = [];
        var dealModal = '<table class="table table-sm"> <thead><tr><th>Deal Id</th><th>Seller Email</th><th>Buyer Email</th><th>Matched Qty</th><th>Buyer Negotiation Value</th><th>Seller Negotiation Value</th><th>Final Value</th></tr></thead> <tbody>';
        for (var i = 0; i < valueResult.length; i++) {
            _intquantity = _intquantity + parseInt(valueResult[i].matched_quantity);
            _intTotalPrice = _intTotalPrice + parseInt(valueResult[i].type2_final_amount);
            _intArrPrice.push(valueResult[i].type2_final_amount);
            dealModal += '<tr><th scope="row">'+(i+1)+'</th><td>'+valueResult[i].seller_email+'</td><td>'+valueResult[i].buyer_email+'</td><td'+valueResult[i].type1_negotiation_mode+'</td><td>'+valueResult[i].matched_quantity+'</td><td>$'+valueResult[i].type1_negotiation_value+'</td><td>$'+valueResult[i].type2_negotiation_value+'</td><td>$'+valueResult[i].type1_final_amount+'</td></tr>';
        }
        dealModal += '</tbody></table>';
        if (valueResult.length == '0') {
            $('#modal_body').html('No Active Deals');
        }
        var ArrayAsc = _intArrPrice.sort();
         _intLowestPrice = ArrayAsc[0];
         _intHeighestPrice = ArrayAsc[valueResult.length-1];
         _intavgPrice = _intTotalPrice/valueResult.length;
         _intavgPrice = _intavgPrice.toFixed(2);
         if (isNaN(_intavgPrice)) {_intavgPrice = 0;}
         $('#totalDealCounts').html(valueResult.length);
         $('#totalDeals').html('$'+_intTotalPrice);
         $('#avgNegoPrice').html('$'+_intavgPrice);
         $('#totalQuantitySold').html(_intquantity);
         /*$('#dealInt_data').html("Seller Deal Price <b style='color: cyan'>Min($"+_intLowestPrice+")</b> and <b style='color: royalblue'>Max($"+_intHeighestPrice+")</b> For <a href='#' data-toggle='modal' data-target='.bd-example-modal-lg'>("+valueResult.length+") Deals </a> Having Total Quantity "+_intquantity);*/
         $('#modal_body').html(dealModal);
        var jsonData = '{ "quantity" : "'+_intquantity+'", "heighestPrice" : "'+parseInt(_intHeighestPrice)+'", "lowestPrice" : "'+parseInt(_intLowestPrice)+'", "avgPrice" : "'+parseInt(_intavgPrice)+'"}'; 
        //console.log('Formated Data '+jsonData);
        return jsonData;
    }
    
    function biDeals2(data){
        if ($('#seolinechart8').length) {
            var ctx = document.getElementById("seolinechart8").getContext('2d');
            $('#SettledProBuyer').html(data.pro_buyer_output);
            $('#SettledProSeller').html(data.pro_seller_output);
            $('#neutralProductsId').html(data.NeutralProducts);
            $('#ProBuyerProductsId').html(data.ProBuyerProducts);
            $('#ProSellerProductsid').html(data.ProSellerProducts);
            $('#probuyeroutputid').html(data.pro_buyer_output);
            $('#ProSellerOutputId').html(data.pro_seller_output);

            var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'doughnut',
                // The data for our dataset
                data: {
                    labels: ["Neutral Product("+data.NeutralProducts+")", "Pro Buyer Product("+data.ProBuyerProducts+")", "Pro Seller Product("+data.ProSellerProducts+")", "Pro Buyer O/P("+data.pro_buyer_output+")", "Pro Seller O/P("+data.pro_seller_output+")"],
                    datasets: [{
                        backgroundColor: [
                            "#8919FE",
                            "#12C498",
                            "#F8CB3F",
                            "#E36D68",
                            "#15B5CE"
                        ],
                        borderColor: '#fff',
                        data: [data.NeutralProducts, data.ProBuyerProducts, data.ProSellerProducts, data.pro_buyer_output, data.pro_seller_output],
                    }]
                },
                // Configuration options go here
                options: {
                    legend: {
                        display: true
                    },
                    animation: {
                        easing: "easeInOutBack"
                    }
                }
            });
        }
    }

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout-old', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>