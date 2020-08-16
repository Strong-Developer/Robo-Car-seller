<?php $__env->startSection('content'); ?>
<div role="main" class="main">
<!--   <section class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul class="breadcrumb">
            <li><a href="index-2.html">Home</a></li>
            <li class="active">Shop</li>
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <h1 class="font-weight-bold">4 Columns - Left Sidebar</h1>

        </div>
      </div>
    </div>
  </section> -->
 
    <div class="row pt-4" ng-controller="ProductCTRL" ng-init="getSearchResult()">
      <aside class="sidebar col-md-2 col-lg-2 order-2 order-md-1">
        <div class="accordion accordion-default accordion-toggle accordion-style-1" role="tablist">
          <form ng-submit="getSearchResult">
            <div class="card">
              <div class="card-header accordion-header" role="tab" id="categories">
                <h5 class="mb-0">
                  <a href="#" data-toggle="collapse" data-target="#toggleCategories" aria-expanded="false" aria-controls="toggleCategories" id="attribute_Listing_1">Category</a>
                </h5>
              </div>
              <div id="toggleCategories" class="accordion-body collapse show" role="tabpanel" aria-labelledby="categories">
                <div class="card-body">
                  <div class="custom-select-1">
                    <select ng-model="products.terms.category" ng-change="getSearchResult()" onchange="setAttributeCategories(this.value)" class="form-control border">
                      <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($cate->category); ?>">
                          <?php echo e($cate->category); ?>

                        </option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-header accordion-header" role="tab" id="categories">
                <h5 class="mb-0">
                  <a href="#" data-toggle="collapse" data-target="#toggleCategories" aria-expanded="false" aria-controls="toggleCategories" id="attribute_Listing_2">Condition</a>
                </h5>
              </div>
              <div id="toggleCategories" class="accordion-body collapse show" role="tabpanel" aria-labelledby="categories">
                <div class="card-body">
                  <div class="custom-select-1">
                    <select ng-model="products.terms.condition" ng-change="getSearchResult()" class="form-control border">
                      <?php $__currentLoopData = $conditions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $condition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($condition->condition); ?>">
                          <?php echo e($condition->condition); ?>

                        </option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>  
                </div>
              </div>
            </div>

            <!-- <div class="card">
              <div class="card-header accordion-header" role="tab" id="price">
                <h5 class="mb-0">
                  <a href="#" data-toggle="collapse" data-target="#togglePrice" aria-expanded="false" aria-controls="togglePrice">PRICE</a>
                </h5>
              </div>
              <div id="togglePrice" class="accordion-body collapse show" role="tabpanel" aria-labelledby="price">
                <div class="card-body">
                  <div class="slider-range-wrapper">
                    <div class="slider-range mb-3" data-plugin-slider-range></div>
                    <form class="d-flex align-items-center justify-content-between" method="get">
                      <span>
                        Price $<span class="price-range-low">0</span> - $<span class="price-range-high">0</span>
                      </span>
                      <input type="hidden" class="hidden-price-range-low" name="priceLow" value="" />
                      <input type="hidden" class="hidden-price-range-high" name="priceHigh" value="" />
                      <button type="submit" class="btn btn-primary btn-h-1 font-weight-bold rounded-0">FILTER</button>
                    </form>
                  </div>
                </div>
              </div>
            </div> -->
            
            <div class="card">
              <div class="card-header accordion-header" role="tab" id="sizes">
                <h5 class="mb-0">
                  <a href="#" data-toggle="collapse" data-target="#toggleSizes" aria-expanded="false" aria-controls="toggleSizes" id="attribute_Listing_3">SIZES</a>
                </h5>
              </div>
              <div id="toggleSizes" class="accordion-body collapse show" role="tabpanel" aria-labelledby="sizes">
                <div class="card-body">
                  <div class="custom-select-1">
                    <select ng-model="products.terms.model" ng-change="getSearchResult()" class="form-control border">
                      <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <option value="<?php echo e($model->model); ?>">
                          <?php echo e($model->model); ?>

                       </option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div> 
                </div>
              </div>
            </div> 

            <div class="card">
              <div class="card-header accordion-header" role="tab" id="categories">
                <h5 class="mb-0">
                  <a href="#" data-toggle="collapse" data-target="#toggleCategories" aria-expanded="false" aria-controls="toggleCategories" id="attribute_Listing_4">Model</a>
                </h5>
              </div>
              <div id="toggleCategories" class="accordion-body collapse show" role="tabpanel" aria-labelledby="categories">
                <div class="card-body">
                  <div class="custom-select-1">
                    <select ng-model="products.terms.make" ng-change="getSearchResult()" class="form-control border">
                      <?php $__currentLoopData = $makes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $make): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <option value="<?php echo e($make->make); ?>">
                          <?php echo e($make->make); ?>

                       </option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-header accordion-header" role="tab" id="categories">
                <h5 class="mb-0">
                  <a href="#" data-toggle="collapse" data-target="#toggleCategories" aria-expanded="false" aria-controls="toggleCategories" id="attribute_Listing_5">Make</a>
                </h5>
              </div>
              <div id="toggleCategories" class="accordion-body collapse show" role="tabpanel" aria-labelledby="categories">
                <div class="card-body">
                  <div class="custom-select-1">
                    <select ng-model="products.terms.order" ng-change="getSearchResult()" class="form-control border">
                      <option>50 Miles</option>
                      <option>100 Miles</option>
                      <option>150 Miles</option>
                      <option>200 Miles</option>
                      <option>250 Miles</option>
                      <option>300 Miles</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>

            <!-- <div class="card">
              <div class="card-header accordion-header" role="tab" id="brands">
                <h5 class="mb-0">
                  <a href="#" data-toggle="collapse" data-target="#toggleBrands" aria-expanded="false" aria-controls="toggleBrands">BRANDS</a>
                </h5>
              </div>
              <div id="toggleBrands" class="accordion-body collapse show" role="tabpanel" aria-labelledby="brands">
                <div class="card-body">
                  <ul class="list list-unstyled mb-0">
                    <li><a href="#">Adidas <span class="float-right">18</span></a></li>
                    <li><a href="#">Camel <span class="float-right">22</span></a></li>
                    <li><a href="#">Samsung Galaxy <span class="float-right">05</span></a></li>
                    <li><a href="#">Seiko <span class="float-right">68</span></a></li>
                    <li><a href="#">Sony <span class="float-right">03</span></a></li>
                  </ul>
                </div>
              </div>
            </div> -->
          </form>
        </div>
      </aside>
      <div class="col-md-10 col-lg-10 order-1 order-md-2 mb-5 mb-md-0">
        <div class="row align-items-center justify-content-between mb-4">
          <!-- <div class="col-auto mb-3 mb-sm-0">
            <form ng-submit="getSearchResult">
              <div class="custom-select-1">
                <select ng-model="products.terms.order" ng-change="getSearchResult()" class="form-control border">
                  <option value="asc">Sort by Oldest </option>
                  <option value="desc">Sort by Newest </option>
                </select>
              </div>  
            </form>
          </div> -->
          <div class="col-auto">
            <div class="d-flex align-items-center">
              <span ng-bind-html="pagination"></span>
              <a href="#" class="text-color-dark text-3 ml-2" data-toggle="tooltip" data-placement="top" title="Grid"><i class="fas fa-th"></i></a>
              <!-- <a href="#" class="text-color-dark text-3 ml-2" data-toggle="tooltip" data-placement="top" title="List"><i class="fas fa-list-ul"></i></a> -->
            </div>
          </div>
        </div>
        <span class="top-sub-title text-color-primary" ng-bind-html="categoryName"></span>
        <!-- <div class="row">
          <div class="col-sm-6 col-md-3 col-lg-4" ng-repeat="x in products.data track by $index">
            <div class="product portfolio-item portfolio-item-style-2">
              <div class="image-frame image-frame-style-1 image-frame-effect-2 mb-3">
                <span class="image-frame-wrapper image-frame-wrapper-overlay-bottom image-frame-wrapper-overlay-light image-frame-wrapper-align-end">
                    <a href="<?php echo e(route('buyer.product.details')); ?>?upc_product_code={{ x.upc_product_code}}">
                    <img style="max-width:100%;height:auto" src="{{ x.images[0].main_file_path}}" class="img-fluid" alt="">
                  </a>
                  <span class="image-frame-action">
                    <a href="<?php echo e(route('buyer.product.details')); ?>?upc_product_code={{ x.upc_product_code}}" class="btn btn-primary btn-rounded font-weight-semibold btn-v-3 btn-fs-2">Details</a>
                  </span>
                </span>
              </div>

              <div class="product-info d-flex flex-column flex-lg-row justify-content-between">
                <div class="product-info-title">
                  <h3 class="text-color-default text-2 line-height-1 mb-1"><a href="<?php echo e(route('buyer.product.details')); ?>?upc_product_code={{ x.upc_product_code}}">{{ x.category}} : {{ x.product_title }}</a></h3>
                  <span class="price font-primary text-4"><strong class="text-color-dark">${{ x.price}}</strong></span>
                </div>
              </div>
            </div>
          </div>
        </div> -->
        <div class="row" >
          <div class="col-sm-6 col-md-3 col-lg-3" ng-repeat="x in products.data track by $index" >
            <a href="<?php echo e(route('buyer.product.details')); ?>?upc_product_code={{ x.upc_product_code}}">
              <div class="car-box " style="padding: 10px !important;">
                <div class="car-thumbnail  row d-block d-sm-none " style="height: 250px
                  !important;
                  border-top-left-radius: 8px !important;
                  border-top-right-radius: 8px !important;
                  background-image: url('{{ x.images[0].main_file_path}}') ;
                  background-size:cover !important ;
                  background-position:center center !important;
                  ">
                </div>
                <div class="car-thumbnail  row  d-none d-sm-block  " style="height: 200px
                  !important;border-top-left-radius: 8px !important;
                  border-top-right-radius: 8px !important;
                  background-image: url('{{ x.images[0].main_file_path}}') ;
                  background-size:cover !important ;
                  background-position:center center !important;
                  " >
                </div>
                
                <div class="detail">
                   <div class="row mb-2 rounded-bottom" style="padding-bottom: 8px;">
                      <div class=" col-md-12 overflow-hidden">
                          <div class="row ">
                            <div class="col-md-12 flex-left">
                               <br/>
                               <p class="text-sm text-left font-weight-bold">{{ x.category}} : {{ x.product_title }} , <span class="makeName"></span> {{ x.make }} <!-- , {{ x.model }} , {{ x.size }} , {{ x.condition }} --></p>
                            </div>
                            <div class="col-md-12 flex-left">
                               <p ng-if="x.price !== 0" class=" text-sm text-left"><b>Price</b> :
                                  <b>${{ x.price}}</b>
                               </p>
                            </div>
                            <div class="col-md-12 flex-left">
                               <p class=" text-sm text-left"> </p>
                            </div>
                         </div>
                      </div>
                      <div class="col-md-12 flex-right float-right" style="padding: 0 !important; color: #fff; margin-top: -35px !important; display: inline-block;">
                         <a href="<?php echo e(route('buyer.product.details')); ?>?upc_product_code={{ x.upc_product_code}}" class="btn btn-primary btn-flat float-right">View details &nbsp;<i style="margin-top: 3px !important;" class="fa fa-angle-right"></i>
                         </a>
                      </div>
                   </div>
                </div>
              </div>
            </a>
          </div>
        </div>


        <hr class="mt-5 mb-4">
        <div class="row align-items-center justify-content-between">
          <div class="col-auto mb-3 mb-sm-0">
            <span ng-bind-html="pagination"></span>
          </div>
          <div class="col-auto">
            <nav aria-label="Page navigation example">
                <ul class="pagination mb-0">
                  <!-- <li class="page-item">
                      <a class="page-link prev" href="#" aria-label="Previous">
                        <span><i class="fas fa-angle-left" aria-label="Previous"></i></span>
                      </a>
                  </li> -->
                  <li class="page-item active"><a class="page-link" href="#">1</a></li>
                  <!-- <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">...</li>
                  <li class="page-item"><a class="page-link" href="#">15</a></li>
                  <li class="page-item">
                      <a class="page-link next" href="#" aria-label="Next">
                        <span><i class="fas fa-angle-right" aria-label="Next"></i></span>
                      </a>
                  </li> -->
                </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
 

  <?php echo $__env->make('notification', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
</div>
<?php $__env->stopSection(); ?>

<style>
    .btn1{ background-color: #00aeef!important; box-shadow: none; color: #fff!important; border:none;}
    .btn1:hover{ background-color: #1b1e5b!important; }
</style>

<script type="text/javascript">
  setAttributeCategories('Automobiles');
  function setAttributeCategories(category){
    autoArray = ['','','','',''];
    if (category == 'Automobiles') {
      autoArray = ['Make','Model','Miles','Year','Color'];
    }
    else if(category == 'Electronics'){
      autoArray = ['Subcategory','Brand','Model','Condition','Other Info'];
    }
    else if(category == 'Equity Offering'){
      autoArray = ['Company','Funding Round','Industry','Patents','Revenue'];
    }
    else if(category == 'Appliances'){
      autoArray = ['Make','Model','Size','Color','Condition'];
    }
    else if(category == 'Industrial'){
      autoArray = ['Make','Model','Condition','Color','Size'];
    }
    else if(category == 'Furniture'){
      autoArray = ['Make','Model','Condition','Color','Size'];
    }
    else if(category == 'Miscellaneous'){
      autoArray = ['Attribute1','Attribute2','Attribute3','Attribute4','Attribute5'];
    }
    for (var i = 1; i <= 5; i++) {
      var attributePassingId = '#attribute_Listing_'+i;
      $(attributePassingId).html(autoArray[i-1]);
    }
    $('.makeName').html(autoArray[1]+':');
  }

</script>
<?php echo $__env->make('app.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>