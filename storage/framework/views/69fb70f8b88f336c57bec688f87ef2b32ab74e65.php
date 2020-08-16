<?php $__env->startSection('content'); ?>

    <style type="text/css">

        .box {
            padding: 40px !important;
        }
    </style>
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />

    <div class="row">
        <div class="form-group col-lg-4">
            <select class="custom-select" id="product" onchange="getNegotiatinProgress(this.value)">
                <option value="BMW_328i_White">BMW_328i_White</option>
                <option value="lexus_es330_green">Lexus_ES330_Green</option>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($product->upc_product_code); ?>"><?php echo e($product->upc_product_code); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="form-group col-lg-4">
            <p><b id="demoData"></b></p>
        </div>
    </div>

    <div class="row">
    	<div style="text-align: center;" class="col-lg-6 mt-5">
            <div class="card">
                <legened>Deal Intelligence</legened>
                <div class="card-body">
                    <div id="ambarchart6"></div>
                </div>
            </div>
        </div>

        <!-- <div class="col-lg-6">
            <div class="card">
                <div style="text-align: center;" class="card-body">
                    <h5 class="card-title">Seller's Offer</h5>
                    <table class="table table-borderless">
                      <tbody>
                        <tr>
                          <td class="text-left">Name:</td>
                          <td class="text-right"></td>
                        </tr>
                        <tr>
                          <td class="text-left">Email:</td>
                          <td class="text-right seller_email"></td>
                        </tr>
                        <tr>
                          <td class="text-left">Phone:</td>
                          <td class="text-right"></td>
                        </tr>
                        <tr>
                          <td class="text-left">Negotiation Mode:</td>
                          <td class="text-right"></td>
                        </tr>
                        <tr>
                          <td class="text-left">Minimum Expected Price:</td>
                          <td class="text-right"></td>
                        </tr>
                      </tbody>
                    </table>    
                </div>
            </div>
        </div>
        <div class="col-lg-6" style="padding-top: 10px;">
            <div class="card">
                <div style="text-align: center;" class="card-body">
                    <h5 class="card-title">Negotiation Progress</h5>
                    <table class="table table-borderless">
                      <tbody>
                        <tr>
                          <td class="text-left">Final Result:</td>
                          <td class="text-right final_result"></td>
                        </tr>
                        <tr>
                          <td class="text-left">Matched Quentity:</td>
                          <td class="text-right matched_qty"></td>
                        </tr>
                        <tr>
                          <td class="text-left">Negotiation Amount:</td>
                          <td class="text-right negotiation_amt"></td>
                        </tr>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div style="text-align: center;" class="card-body">
                    <h5 class="card-title">Buyer's Offer</h5>
                     <table class="table table-borderless">
                      <tbody>
                        <tr>
                          <td class="text-left">Name:</td>
                          <td class="text-right"></td>
                        </tr>
                        <tr>
                          <td class="text-left">Email:</td>
                          <td class="text-right buyer_email"></td>
                        </tr>
                        <tr>
                          <td class="text-left">Phone:</td>
                          <td class="text-right"></td>
                        </tr>
                        <tr>
                          <td class="text-left">Negotiation Mode:</td>
                          <td class="text-right"></td>
                        </tr>
                        <tr>
                          <td class="text-left">Maximum Offer Price:</td>
                          <td class="text-right"></td>
                        </tr>
                      </tbody>
                    </table> 
                </div>
            </div>
        </div> -->
        <div style="text-align: center;" class="col-md-6 col-lg-6 col-sm-12 col-xs-12 mt-5">
            <div class="card">
                <legened>Highest vs Individual Demographic</legened>
                <div class="card-body">
                    <div id="ambarchart1"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div id="deal-int" style="margin-top: 10px; padding: 20px; background: #fff">
        <div class="row">
            <div class="col-lg-12">
                <h5>Deal Intelligence Result</h5>
                <br>
                <p>Following Tables shows</p>
                <br>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card" style="background: #ccc">
                            <div style="text-align: center;" class="card-body">
                                <p>Deals Closed in buyer favor(Pro-Buyer): <span class="deal-1">0</span></p>
                                <p>Deals Closed in seller favor(Pro-Seller): <span class="deal-2">0</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card" style="background: #ccc">
                            <div style="text-align: center;" class="card-body">
                                <p>Mean Price of buyer Negotiation/Closed Deal: $<span class="deal-3">0</span></p>
                                <p>Mean Price of seller Negotiation/Closed Deal: $<span class="deal-4">0</span></p>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="col-md-12 text-center">
                        <p>Avarage Deal/Negotiation Price: <span class="deal-5">0</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <div class="row">
        <!-- <div class="col-lg-6 mt-5">
            <div class="card">
                <div style="text-align: center;" class="card-body">
                    <legened>Average Counter Offers</legened>
                    <div id="verview-shart"></div>
                </div>
            </div>
        </div> -->

        
        

        <!-- <div style="text-align: center;" class="col-lg-6 mt-5">
            <div class="card">
                <legened>MIN, MAX and AVERAGE Price Offers Recived</legened>
                <div id="ampiechart1"></div>
            </div>
        </div> -->
        <div class="col-md-12 pt-5 mb-5">
            <div class="card">
                <div class="card-body">
                    <div class="row flex-center">
                        <div class="col-md-12">
                            <p class="font-weight-bold">
                                Welcome to RoboNegotiator.  You want to find more buyers matching your needs and we are committed to find them.  Please follow these steps:
                            </p>
                            <br/>
                            <span class="font-weight-bold"> (1) Upload a Product/ Deal–</span>
                            <br/> <br/>
                            i.  As a seller, we would like you to first upload some special deals (hidden) to RoboNegotiator
                            so we can find buyers matching your needs. <br/>
                            ii. Decide products (uniquely identifiable), quanity and Minimum Selling Price for your products.  We will hide “special price and negotiation related input” so they won’t be visible to end buyer.
                            <br/>
                            iii.    We will also prepare a normal “Product Catalog” where buyer can see your products and decide to purchase them (or negotiate with you)
                            <br/><br/>
                            <span class="font-weight-bold"> (2) Define Negotiation Rules/Parameters: </span> For a given product, you can take care of your customers
                            or revenue/ profit by defining some rules/ parameters that we must follow in automated
                                negotiations.<br/>
                            <br/>
                            <span class="font-weight-bold">(3)  Check Negotiation/Deal Progress –</span> This will allow you
                                to see status of your uploaded deals and find results if RoboNegotiator found a
                                matching buyer. You will also see texts/ emails though when matching occurs.
                            <br/><br/>
                            <span class="font-weight-bold"> (4) Artificial Intelligence/ Machine Learning – </span> Ask for a special demo. Coming Soon to this site.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg">
	    <div class="modal-dialog modal-lg">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title">Deal Details</h5>
	                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
	            </div>
	            <div class="modal-body modal-xl">
	            	<div class="container" style="overflow-x: scroll;">
	            		<div class="row" style="font-size: 10px;" id="modal_body"></div>
	            	</div>
	            </div>
	        </div>
	    </div>
	</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('my-script'); ?>
<script src="afterlogin_assets/GaugePlugins/GaugeJs/gauge.min.js"></script> 
<script src="afterlogin_assets/GaugePlugins/Plotly/plotly.min.js"></script> 
<!-- <script src="afterlogin_assets/GaugePlugins/highcharts/highcharts.js"></script>
<script src="afterlogin_assets/GaugePlugins/highcharts/highcharts-more.js"></script>
<script src="afterlogin_assets/GaugePlugins/highcharts/solid-gauge.js"></script>
<script src="afterlogin_assets/GaugePlugins/highcharts/exporting.js"></script>
<script src="afterlogin_assets/GaugePlugins/highcharts/export-data.js"></script>
<script src="afterlogin_assets/GaugePlugins/highcharts/accessibility.js"></script> -->
<script type="text/javascript">
    $( document ).ready(function() {
        getNegotiatinProgress('BMW_328i_White');
    });
    
    var currentMarketPrice = 0;
    function getNegotiatinProgress(pro_code){
        document.getElementById('demoData').innerHTML = "SHOWING DATA FOR "+pro_code;
        //alert(pro_code);
        $.ajax({
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
        });

        $.ajax({
            url :"<?php echo e(route('get.marketprice')); ?>",
            method:"POST",
            data:{upc_product_code:pro_code},
            dataType:"JSON",
            success:function(data){
            	currentMarketPrice = data[0];
                console.log(data);
                //market_chart(data);
            }
        });

        $.ajax({
            url :"<?php echo e(route('deal.intelligence')); ?>",
            method:"POST",
            data:{upc_product_code:pro_code},
            dataType:"JSON",
            success:function(data){
                console.log('Deal Intelligence '+data);
                ambarchart6(data);
                //getDealIntelligenceCockpit(data);
                $(".deal-1").text(data.pro_buyer_output);
                $(".deal-2").text(data.pro_seller_output);
                $(".deal-3").text(data.pro_buyer_mean_S_Deal);
                $(".deal-4").text(data.pro_seller_mean_S_Deal);
                $(".deal-5").text(data.master_average);
            }, 
            error:function(){
                //$(".seller_email").text("");
            }
        });

        $.ajax({
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
        });

        $.ajax({
            url :"<?php echo e(route('get.intelligenceReport')); ?>",
            method:"POST",
            data:{upc_product_code:pro_code},
            dataType:"JSON",
            success:function(data){
                console.log(data);
                //ampiechart1(data);
                maxminavg(data);
            }
        });


    }

    var dateArray = [];
    for (var date = 2020; date >= 2010; date--) {
        dateArray.push(date);
    }

    /*function market_chart(data){
        //if ($('#ambarchart4').length) {
            var chart = AmCharts.makeChart("ambarchart4", {
                "type": "serial",
                "theme": "light",
                "marginRight": 70,
                "dataProvider": [{
                    "country": dateArray[0],
                    "visits": data[0],
                    "color": "#8918FE"
                }, {
                    "country": dateArray[1],
                    "visits": data[1],
                    "color": "#7474F0"
                }, {
                    "country": dateArray[2],
                    "visits": data[2],
                    "color": "#C5C5FD"
                }, {
                    "country": dateArray[3],
                    "visits": data[3],
                    "color": "#952FFE"
                }, {
                    "country": dateArray[4],
                    "visits": data[4],
                    "color": "#7474F0"
                }, {
                    "country": dateArray[5],
                    "visits": data[5],
                    "color": "#CBCBFD"
                }, {
                    "country": dateArray[6],
                    "visits": data[6],
                    "color": "#FD9C21"
                }, {
                    "country": dateArray[7],
                    "visits": data[7],
                    "color": "#0D8ECF"
                }, {
                    "country": dateArray[8],
                    "visits": data[8],
                    "color": "#0D52D1"
                }, {
                    "country": dateArray[9],
                    "visits": data[9],
                    "color": "#2A0CD0"
                },],
                "valueAxes": [{
                    "axisAlpha": 0,
                    "position": "left",
                    "title": false
                }],
                "startDuration": 1,
                "graphs": [{
                    "balloonText": "<b>[[category]]: [[value]]</b>",
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
       // }
    }
*/
    function ampiechart1(data){
        if ($('#ampiechart1').length) {
            var chart = AmCharts.makeChart("ampiechart1", {
                "type": "pie",
                "labelRadius": -35,
                "labelText": "[[percents]]%",
                "dataProvider": [{
                    "country": "Maximum Offer",
                    "litres": data['max_buyer_highest_offer_price'],
                    "backgroundColor": "#815DF6"
                }, {
                    "country": "Average Offer",
                    "litres": data['avg_buyer_highest_offer_price'],
                    "backgroundColor": "#67B7DC"
                }, {
                    "country": "Minimum Offer",
                    "litres": data['min_buyer_highest_offer_price'],
                    "backgroundColor": "#9c82f4"
                }],
                "color": "#fff",
                "colorField": "backgroundColor",
                "valueField": "litres",
                "titleField": "country"
            });
        }
    }

    function ambarchart6(data){
        if ($('#ambarchart6').length) {
            var chart = AmCharts.makeChart("ambarchart6", {
                "type": "serial",
                "theme": "light",
                "handDrawn": true,
                "handDrawScatter": 3,
                "legend": {
                    "useGraphSettings": true,
                    "markerSize": 3,
                    "valueWidth": 0,
                    "verticalGap": 0
                },
                "dataProvider": [{
                    "year": 'Market Price',
                    "Product-Sale": currentMarketPrice,
                    "Avg-Price": currentMarketPrice,
                    "color": "#952FFE"
                }, {
                    "year": 'Average Selling Price',
                    "Product-Sale": data.master_average,
                    "Avg-Price": data.master_average,
                    "color": "#5182DE"
                }],
                "valueAxes": [{
                    "minorGridAlpha": 0.08,
                    "minorGridEnabled": true,
                    "position": "top",
                    "axisAlpha": 0
                }],
                "startDuration": 1,
                "graphs": [{
                    "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b></span>",
                    "title": "Parameters",
                    "type": "column",
                    "fillAlphas": 1,
                    "fillColorsField": "color",
                    "valueField": "Product-Sale"
                }, {
                    "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b></span>",
                    "bullet": "round",
                    "bulletBorderAlpha": 1,
                    "lineColor": "#AA59FE",
                    "bulletColor": "#FFFFFF",
                    "useLineColorForBulletBorder": true,
                    "fillAlphas": 0,
                    "lineThickness": 2,
                    "lineAlpha": 1,
                    "bulletSize": 7,
                    "title": "Price Tally",
                    "valueField": "Avg-Price"
                }],
                "rotate": true,
                "categoryField": "year",
                "categoryAxis": {
                    "gridPosition": "start"
                },
                "export": {
                    "enabled": false
                }

            });
        }
    }

    function ambarchart1(data){
        if ($('#ambarchart1').length) {
            var chart = AmCharts.makeChart("ambarchart1", {
                "theme": "light",
                "type": "serial",
                "balloon": {
                    "adjustBorderColor": false,
                    "horizontalPadding": 10,
                    "verticalPadding": 4,
                    "color": "#fff"
                },
                "dataProvider": [{
                    "country": "Minimum Age",
                    "year2004": data.min_age_highest_demo,
                    "year2005": data.min_age_indiviual_demo,
                    "color": "#bfbffd",
                    "color2": "#7474F0"
                }, {
                    "country": "Maximum Age",
                    "year2004": data.max_age_highest_demo,
                    "year2005": data.max_age_indiviual_demo,
                    "color": "#bfbffd",
                    "color2": "#7474F0"
                }, {
                    "country": "Minimum Annual Income",
                    "year2004": data.min_price_highest_demo,
                    "year2005": data.min_price_indiviual_demo,
                    "color": "#bfbffd",
                    "color2": "#7474F0"
                }, {
                    "country": "Maximum Annual Income",
                    "year2004": data.max_price_highest_demo,
                    "year2005": data.max_price_indiviual_demo,
                    "color": "#bfbffd",
                    "color2": "#7474F0"
                }],
                "valueAxes": [{
                    "unit": "%",
                    "position": "left",
                }],
                "startDuration": 1,
                "graphs": [{
                    "balloonText": "Demographic Report [[category]] (2017): <b>[[value]]</b>",
                    "fillAlphas": 0.9,
                    "fillColorsField": "color",
                    "lineAlpha": 0.2,
                    "title": "2017",
                    "type": "column",
                    "valueField": "year2004"
                }, {
                    "balloonText": "Demographic Report in [[category]] (2018): <b>[[value]]</b>",
                    "fillAlphas": 0.9,
                    "fillColorsField": "color2",
                    "lineAlpha": 0.2,
                    "title": "2018",
                    "type": "column",
                    "clustered": false,
                    "columnWidth": 0.5,
                    "valueField": "year2005"
                }],
                "plotAreaFillAlphas": 0.1,
                "categoryField": "country",
                "categoryAxis": {
                    "gridPosition": "start"
                },
                "export": {
                    "enabled": false
                }

            });
        }
    }

    function maxminavg(data){
    	console.log(data);
    	var maxPrice = minPrice = AvgPrice = 0;
    	if (typeof data === 'undefined') {
    		var maxPrice = 100;
    		var minPrice = 0;
    		var AvgPrice = 50;
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
			   {strokeStyle: "#EEFF18", min: minArray[0], max: maxArray[1]}, // Red from 100 to 130
			   {strokeStyle: "#B1F902", min: minArray[2], max: maxArray[3]}, // Yellow
			   {strokeStyle: "#02F911", min: minArray[4], max: maxArray[5]}, // Green
			   {strokeStyle: "#02F9EA", min: minArray[6], max: maxArray[7]}, // Yellow
			   {strokeStyle: "#025BF9", min: minArray[8], max: maxArray[9]},  // Red
			   {strokeStyle: "#F90267", min: minArray[10], max: maxPrice}  // Red
			]
		};
		var target = document.getElementById('minMaxAvgCanvas'); // your canvas element
		var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
		gauge.maxValue = maxPrice; // set max gauge value
		gauge.setMinValue(minPrice);  // Prefer setter over gauge.minValue = 0
		gauge.animationSpeed = 50; // set animation speed (32 is default value)
		gauge.set(AvgPrice); // set actual value
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
    	var dealModal = '<table class="table table-sm"> <thead><tr><th>Deal Id</th><th>Seller Email</th><th>Buyer Email</th><th>Matched Qty</th><th>Buyer Negotiation Value</th><th>Seller Negotiation Value</th><th>Buyer Final Value</th><th>Seller Final Value</th><th>Comment</th> </tr></thead> <tbody>';
    	for (var i = 0; i < valueResult.length; i++) {
    		_intquantity = _intquantity + parseInt(valueResult[i].matched_quantity);
    		_intTotalPrice = _intTotalPrice + parseInt(valueResult[i].type2_final_amount);
    		_intArrPrice.push(valueResult[i].type2_final_amount);
    		dealModal += '<tr><th scope="row">'+(i+1)+'</th><td>'+valueResult[i].seller_email+'</td><td>'+valueResult[i].buyer_email+'</td><td'+valueResult[i].type1_negotiation_mode+'</td><td>'+valueResult[i].matched_quantity+'</td><td>'+valueResult[i].type1_negotiation_value+'</td><td>'+valueResult[i].type2_negotiation_value+'</td><td>'+valueResult[i].type1_final_amount+'</td><td>'+valueResult[i].type2_final_amount+'</td><td>'+valueResult[i].comment+'</td></tr>';
    	}
    	dealModal += '</tbody></table>';
    	var ArrayAsc = _intArrPrice.sort();
    	 _intLowestPrice = ArrayAsc[0];
    	 _intHeighestPrice = ArrayAsc[valueResult.length-1];
    	 _intavgPrice = _intTotalPrice/valueResult.length;
    	 $('#dealInt_data').html("Seller Deal Price <b style='color: cyan'>Min($"+_intLowestPrice+")</b> and <b style='color: royalblue'>Max($"+_intHeighestPrice+")</b> For <a href='#' data-toggle='modal' data-target='.bd-example-modal-lg'>("+valueResult.length+") Deals </a> Having Total Quantity "+_intquantity);
    	 $('#modal_body').html(dealModal);
    	var jsonData = '{ "quantity" : "'+_intquantity+'", "heighestPrice" : "'+parseInt(_intHeighestPrice)+'", "lowestPrice" : "'+parseInt(_intLowestPrice)+'", "avgPrice" : "'+parseInt(_intavgPrice)+'"}'; 
    	//console.log('Formated Data '+jsonData);
    	return jsonData;
    }
    
   
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout-old', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>