@extends('app.layout')
@section('stylesheet')

<style type="text/css">
/**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
.StripeElement {
  box-sizing: border-box;

  width: 100%;

  height: 40px;

  padding: 10px 12px;

  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}
.form-control{
	border-color: #ced4da!important;
	border-radius: 2px!important;
}
tr {
    border-bottom: 1px solid #ced4da!important;
}
th{
	
	text-transform: capitalize!important;
}

</style>

@endsection
@section('content')
<?php 
  $currrentUPCCode = '';
?>
<div role="main" class="main">
  <div class="container">

    <div class="row">
      <div class="col">
        <ul class="breadcrumb mt-3">
          <li><a href="<?php echo URL::to("/"); ?>">Home</a></li>
          <li><a href="<?php echo URL::to("/catalogue"); ?>">Catalogue</a></li>
          <li class="active" id="breadcrumbLastNode">Catalogue</li>
        </ul>
      </div>
    </div>
    <div class="row">
      <aside class="sidebar col-md-4 col-lg-3 order-2">
        <div class="accordion accordion-default accordion-toggle accordion-style-1" role="tablist">
      
          <div class="card">
            <div class="card-header accordion-header" role="tab" id="categories">
              <h5 class="mb-0">
                <a href="#" data-toggle="collapse" data-target="#toggleCategories" aria-expanded="false" aria-controls="toggleCategories">CATEGORIES</a>
              </h5>
            </div>
            <div id="toggleCategories" class="accordion-body collapse show" role="tabpanel" aria-labelledby="categories">
              <div class="card-body">
                <ul class="list list-unstyled mb-0">

                  <li><a href="<?php echo URL::to("/catalogue"); ?>">Automobiles</a></li>

                  <li><a href="<?php echo URL::to("/catalogue"); ?>">Equity Offering</a></li>

                  <li><a href="<?php echo URL::to("/catalogue"); ?>">Real Estate</a></li>

                  <li><a href="<?php echo URL::to("/catalogue"); ?>">Electronics</a></li>
                </ul>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header accordion-header" role="tab" id="price">
              <h5 class="mb-0">
                <a href="#" data-toggle="collapse" data-target="#togglePrice" aria-expanded="false" aria-controls="togglePrice">FEATURED PRODUCTS</a>
              </h5>
            </div>
            <div id="togglePrice" class="accordion-body collapse show" role="tabpanel" aria-labelledby="price">
              <div class="card-body">
                No Feaured Products
                <!-- <div class="product row align-items-center mb-4">
                  <div class="col-5 pr-0">
                    <div class="image-frame image-frame-border image-frame-style-1 image-frame-effect-1">
                      <span class="image-frame-wrapper">
                        <img src="_nwAssets/img/products/product-1.jpg" class="img-fluid" alt="">
                        <span class="image-frame-action image-frame-action-style-2 image-frame-action-effect-1 image-frame-action-md">
                          <a href="shop-product-detail-right-sidebar.html">
                            <span class="image-frame-action-icon">
                              <i class="lnr lnr-link text-color-light"></i>
                            </span>
                          </a>
                        </span>
                      </span>
                    </div>
                  </div>
                  <div class="col-7">
                    <h3 class="font-secondary text-color-default text-2 mb-0"><a href="#">Long Hoddie</a></h3>
                    <div class="product-info-rate product-info-rate-sm py-1 d-flex">
                      <i class="fas fa-star text-color-default mr-1"></i>
                      <i class="fas fa-star text-color-default mr-1"></i>
                      <i class="fas fa-star text-color-default mr-1"></i>
                      <i class="fas fa-star text-color-default mr-1"></i>
                      <i class="far fa-star-half text-color-default"></i>                 
                    </div>
                    <span class="price font-primary text-2"><strong class="text-color-dark">$59</strong></span>
                  </div>
                </div>

                <div class="product row align-items-center mb-4">
                  <div class="col-5 pr-0">
                    <div class="image-frame image-frame-border image-frame-style-1 image-frame-effect-1">
                      <span class="image-frame-wrapper">
                        <img src="_nwAssets/img/products/product-2.jpg" class="img-fluid" alt="">
                        <span class="image-frame-action image-frame-action-style-2 image-frame-action-effect-1 image-frame-action-md">
                          <a href="shop-product-detail-right-sidebar.html">
                            <span class="image-frame-action-icon">
                              <i class="lnr lnr-link text-color-light"></i>
                            </span>
                          </a>
                        </span>
                      </span>
                    </div>
                  </div>
                  <div class="col-7">
                    <h3 class="font-secondary text-color-default text-2 mb-0"><a href="#">Leather Belt</a></h3>
                    <div class="product-info-rate product-info-rate-sm py-1 d-flex">
                      <i class="fas fa-star text-color-default mr-1"></i>
                      <i class="fas fa-star text-color-default mr-1"></i>
                      <i class="fas fa-star text-color-default mr-1"></i>
                      <i class="fas fa-star text-color-default mr-1"></i>
                      <i class="far fa-star-half text-color-default"></i>                 
                    </div>
                    <span class="price font-primary text-2"><strong class="text-color-dark">$19</strong></span>
                  </div>
                </div>

                <div class="product row align-items-center mb-4">
                  <div class="col-5 pr-0">
                    <div class="image-frame image-frame-border image-frame-style-1 image-frame-effect-1">
                      <span class="image-frame-wrapper">
                        <img src="_nwAssets/img/products/product-3.jpg" class="img-fluid" alt="">
                        <span class="image-frame-action image-frame-action-style-2 image-frame-action-effect-1 image-frame-action-md">
                          <a href="shop-product-detail-right-sidebar.html">
                            <span class="image-frame-action-icon">
                              <i class="lnr lnr-link text-color-light"></i>
                            </span>
                          </a>
                        </span>
                      </span>
                    </div>
                  </div>
                  <div class="col-7">
                    <h3 class="font-secondary text-color-default text-2 mb-0"><a href="#">Jack Sandals</a></h3>
                    <div class="product-info-rate product-info-rate-sm py-1 d-flex">
                      <i class="fas fa-star text-color-default mr-1"></i>
                      <i class="fas fa-star text-color-default mr-1"></i>
                      <i class="fas fa-star text-color-default mr-1"></i>
                      <i class="fas fa-star text-color-default mr-1"></i>
                      <i class="far fa-star-half text-color-default"></i>                 
                    </div>
                    <span class="price font-primary text-2"><strong class="text-color-dark">$30</strong></span>
                  </div>
                </div> -->

              </div>
            </div>
          </div>
		  
		  <div class="card" id="FinCals">
		  <div class="card-header accordion-header" role="tab" id="price">
              <h5 class="mb-0">
                <a href="#" data-toggle="collapse" data-target="#togglePrice" aria-expanded="false" aria-controls="togglePrice">EMI Calculator</a>
              </h5>
            </div>
            <div id="toggleSizes" class="accordion-body collapse show" role="tabpanel" aria-labelledby="sizes">
              <div class="card-body pt-4 FinCals">
                
              </div>
            </div>
          </div> 
		  
          <!-- <div class="card">
            <div id="toggleSizes" class="accordion-body collapse show" role="tabpanel" aria-labelledby="sizes">
              <div class="card-body pt-4">
                <div class="image-frame">
                  <div class="image-frame-wrapper align-items-start">
                    <img src="_nwAssets/img/shop/product-bg-15.jpg" class="img-fluid" alt="">
                    <div class="image-frame-info image-frame-info-show flex-column align-items-center mt-5">
                      <span class="text-color-dark font-primary font-weight-semibold text-2 line-height-1">Amazing</span>
                      <h2 class="text-color-dark font-weight-bold text-3 mb-2">LADIES DRESSES</h2>
                    </div>
                    <a href="#" class="btn btn-primary btn-outline btn-rounded font-weight-bold btn-h-2 btn-v-3 d-block absolute-x-center align-self-end shop-now-bottom">SHOP NOW!</a>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
        </div>
      </aside>
      <div class="col-md-8 col-lg-9 order-1 mb-5 mb-md-0">
        <div class="row mb-5">
          <div class="col-lg-5 mb-5 mb-lg-0">
            <div class="owl-carousel owl-theme manual dots-style-2 nav-style-2 nav-color-dark mb-3" id="thumbGalleryDetail">
              @foreach($product->images as $key => $image)
                  <div>
                      <img src="{{$image->main_file_path}}" class="img-fluid" alt="">
                  </div>
              @endforeach
            </div>
            <div class="owl-carousel owl-theme manual thumb-gallery-thumbs mt" id="thumbGalleryThumbs">
              @foreach($product->images as $key => $image)
                  <div>
                    <span class="d-block">
                      <img alt="Product Image" src="{{$image->main_file_path}}" class="img-fluid">
                    </span>
                  </div>
              @endforeach
            </div>
          </div>
          <div class="col-lg-7">
            <h2 class="line-height-1 font-weight-bold mb-2 vehicle-Title">{{$product->product_title}}</h2>
            <!-- <div class="product-info-rate d-flex mb-3">
              <i class="fas fa-star text-color-dark mr-1"></i>
              <i class="fas fa-star text-color-dark mr-1"></i>
              <i class="fas fa-star text-color-dark mr-1"></i>
              <i class="fas fa-star text-color-dark mr-1"></i>
              <i class="fas fa-star-half text-color-dark"></i>                  
            </div> -->
            <span class="price font-primary text-4"><strong class="text-color-dark invoicePrice">${{$product->price}}</strong></span>
            <!-- <span class="old-price font-primary text-line-trough text-2"><strong class="text-color-default">$20</strong></span> -->
            <p class="mt-4">{{substr($product->product_description, 0, 50)}}</p>
            <hr class="my-4">
            <ul class="list list-unstyled">
              <li>Quantity: <strong>{{$product->seller_original_quantity}}</strong></li>
              <li>SKU/UPC: <strong>{{$product->upc_product_code}}</strong></li>
              <?php
                $currrentUPCCode = $product->upc_product_code;
              ?>
              <input type="hidden" id="category" value="{{$product->category}}">
            </ul>
            <hr class="my-4">
            <form class="shop-cart d-flex align-items-center" method="post" enctype="multipart/form-data">
              <div class="quantity">
                <input type="button" value="-" class="cart-btn minus">
                <input type="number" step="1" min="1" name="quantity" max="{{$product->seller_original_quantity}}" value="1" title="Qty" class="qty" size="2">
                <input type="button" value="+" class="cart-btn plus">
              </div>
              <input type="hidden" name="upcCode"  id="upcCode" value="{{$product->upc_product_code}}">
              <button type="submit" id="Add_to_cart" class="add-to-cart btn btn-primary mr-2 font-weight-semibold btn-v-4 btn-h-2 btn-fs-2 ml-3" style="background-color: #38c1f3;  border-color: #38c1f3">ADD TO CART</button>
            </form>
            <hr class="my-4">
            <!-- <div class="d-flex align-items-center">
              <span class="text-2">SHARE</span>
              <ul class="social-icons social-icons-dark social-icons-1 ml-3">
                <li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                <li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                <li class="social-icons-instagram"><a href="http://www.instagram.com/" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a></li>
              </ul>
            </div> -->
          </div>
        </div>


        <div class="row mb-5">
          <div class="col">
            <ul class="nav nav-tabs nav-tabs-default" id="productDetailTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link font-weight-bold" id="productDetailDescTab" data-toggle="tab" href="#productDetailDesc" role="tab" aria-controls="productDetailDesc" aria-expanded="true">DESCRIPTION</a>
              </li>
              <li class="nav-item">
                <a class="nav-link font-weight-bold active" id="productDetailMoreInfoTab" data-toggle="tab" href="#productDetailMoreInfo" role="tab" aria-controls="productDetailMoreInfo">SPECIFICATIONS</a>
              </li>
			   <li class="nav-item">
                <a class="nav-link font-weight-bold" id="productDetailAccidentTab" data-toggle="tab" href="#productDetailAccident" role="tab" aria-controls="productDetailAccident">ACCIDENT</a>
              </li>
			  
              <!-- <li class="nav-item">
                <a class="nav-link font-weight-bold" id="productDetailReviewsTab" data-toggle="tab" href="#productDetailReviews" role="tab" aria-controls="productDetailReviews">REVIEWS (3)</a>
              </li> -->
            </ul>
            <div class="tab-content" id="contentTabProductDetail">
              <div class="tab-pane fade pt-4 pb-4" id="productDetailDesc" role="tabpanel" aria-labelledby="productDetailDescTab">
                {{$product->product_description}}
              </div>
              <div class="tab-pane fade pt-4 pb-4 show active" id="productDetailMoreInfo" role="tabpanel" aria-labelledby="productDetailMoreInfoTab">
                <table class="table">
                  <tbody>
                    <tr>
                      <th class="border-top-0" scope="row">UPC (Universal Product Code)</th>
                      <td class="border-top-0">{{$product->upc_product_code}}</td>
                    </tr>
                    <tr>
                      <th scope="row" id="attributeSet_1">Make</th>
                      <td>{{$product->make}}</td>
                    </tr>                         
                    <tr>
                      <th scope="row" id="attributeSet_2">Model</th>
                      <td>{{$product->model}}</td>
                    </tr>
                    <tr>
                      <th scope="row" id="attributeSet_3">Condition</th>
                      <td>{{$product->condition}}</td>
                    </tr>
                    <tr>
                      <th scope="row" id="attributeSet_4">Color</th>
                      <td>{{$product->color}}</td>
                    </tr>
                    <tr>
                      <th scope="row" id="attributeSet_5">Size</th>
                      <td>{{$product->size}}</td>
                    </tr>
                    <tr>
                      <th scope="row">Related URL</th>
                      <td><a href="{{$product->url}}" target="_blank">  {{$product->url}}</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>
			   <div class="tab-pane fade pt-4 pb-4" role="tabpanel" id="productDetailAccident" aria-labelledby="productDetailAccidentTab">
			   test
			   </div>
              <!-- <div class="tab-pane fade pt-4 pb-4" id="productDetailReviews" role="tabpanel" aria-labelledby="productDetailReviewsTab">
                <ul class="comments">
                  <li>
                    <div class="comment">
                      <div class="d-none d-sm-block">
                        <img class="avatar rounded-circle" alt="" src="_nwAssets/img/authors/author-2.jpg">
                      </div>
                      <div class="comment-block">
                        <span class="comment-by">
                          <span class="comment-rating">
                            <i class="fas fa-star text-color-dark mr-1"></i>
                            <i class="fas fa-star text-color-dark mr-1"></i>
                            <i class="fas fa-star text-color-dark mr-1"></i>
                            <i class="fas fa-star text-color-dark mr-1"></i>
                            <i class="fas fa-star text-color-dark"></i> 
                          </span>
                          <strong class="comment-author text-color-dark">Robert Doe</strong>
                          <span class="comment-date border-right-0 text-color-light-3">MARCH 5, 2018 at 2:28 pm</span>
                        </span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae. </p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="comment">
                      <div class="d-none d-sm-block">
                        <img class="avatar rounded-circle" alt="" src="_nwAssets/img/authors/author-1.jpg">
                      </div>
                      <div class="comment-block">
                        <span class="comment-by">
                          <span class="comment-rating">
                            <i class="fas fa-star text-color-dark mr-1"></i>
                            <i class="fas fa-star text-color-dark mr-1"></i>
                            <i class="fas fa-star text-color-dark mr-1"></i>
                            <i class="fas fa-star text-color-dark mr-1"></i>
                            <i class="fas fa-star-half text-color-dark"></i>  
                          </span>
                          <strong class="comment-author text-color-dark">John Doe</strong>
                          <span class="comment-date border-right-0 text-color-light-3">MARCH 5, 2018 at 2:28 pm</span>
                        </span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae. </p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="comment">
                      <div class="d-none d-sm-block">
                        <img class="avatar rounded-circle" alt="" src="_nwAssets/img/authors/author-3.jpg">
                      </div>
                      <div class="comment-block">
                        <span class="comment-by">
                          <span class="comment-rating">
                            <i class="fas fa-star text-color-dark mr-1"></i>
                            <i class="fas fa-star text-color-dark mr-1"></i>
                            <i class="fas fa-star text-color-dark mr-1"></i>
                            <i class="fas fa-star text-color-dark mr-1"></i>
                          </span>
                          <strong class="comment-author text-color-dark">Jessica Doe</strong>
                          <span class="comment-date border-right-0 text-color-light-3">MARCH 5, 2018 at 2:28 pm</span>
                        </span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae. </p>
                      </div>
                    </div>
                  </li>
                </ul>

                <div class="row mt-4 pt-2">
                  <div class="col">
                    <h2 class="font-weight-bold text-3 mb-3">LEAVE A REVIEW</h2>
                    <form class="form-style-2" action="#" method="post">
                      <div class="form-row">
                        <div class="form-group">
                          <div class="rating p-1">
                            <label>
                              <input type="radio" name="rating" value="5" title="5 stars"> 5
                            </label>
                            <label>
                              <input type="radio" name="rating" value="4" title="4 stars"> 4
                            </label>
                            <label>
                              <input type="radio" name="rating" value="3" title="3 stars"> 3
                            </label>
                            <label>
                              <input type="radio" name="rating" value="2" title="2 stars"> 2
                            </label>
                            <label>
                              <input type="radio" name="rating" value="1" title="1 star"> 1
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col">
                          <textarea class="form-control bg-light-5 border-0 rounded-0" placeholder="Review" rows="6" name="review" required></textarea>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <input type="text" value="" class="form-control border-0 rounded-0" name="name" placeholder="Name" required>
                        </div>
                        <div class="form-group col-md-6">
                          <input type="email" value="" class="form-control border-0 rounded-0" name="email" placeholder="E-mail" required>
                        </div>
                      </div>
                      <div class="form-row mt-2">
                        <div class="col">
                          <input type="submit" value="POST REVIEW" class="btn btn-primary btn-rounded btn-h-2 btn-v-2 font-weight-bold">
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div> -->
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <h2 class="font-weight-bold text-4 mb-4">Related Products</h2>
          </div>
        </div>
        <div class="row">

          @php ($i = 1)
          @foreach($related_products as $product)
            <?php
              if ($product->upc_product_code != $currrentUPCCode) {
                ?>
                  <div class="col-sm-4 col-md-3 mb-3">
                    <div class="product portfolio-item portfolio-item-style-2">
                      <div class="image-frame image-frame-style-1 image-frame-effect-2 mb-3">
                        <span class="image-frame-wrapper">
                          <a href="{{route('buyer.product.details')}}?upc_product_code={{$product->upc_product_code}}">
                            <?php
                              $fileUrl= '';
                              if (file_exists('storage/app/'.$product->images[0]->file_path)) {
                                $fileUrl = 'storage/app/'.$product->images[0]->file_path;
                              }
                              else{
                                $fileUrl = $product->images[0]->file_path;
                              }
                            ?>
                            <img src="<?php echo $fileUrl; ?>" class="img-fluid" alt="">
                          </a>
                        </span>
                      </div>
                      <!-- <div class="product-info d-flex flex-column flex-lg-row justify-content-between">
                        <div class="product-info-title">
                          <h3 class="text-color-default text-2 line-height-1 mb-1"><a href="#">{{$product->product_title}}</a></h3>
                          <span class="price font-primary text-4"><strong class="text-color-dark">${{$product->special_deal_price}}</strong></span>
                          <span class="old-price font-primary text-line-trough text-1"><strong class="text-color-default">${{$product->price}}</strong></span>
                        </div>
                      </div> -->
                    </div>
                  </div>
                <?php
              }
            ?>
          @endforeach
         <!--  <div class="col-sm-4 mb-4">
            <div class="product portfolio-item portfolio-item-style-2">
              <div class="image-frame image-frame-style-1 image-frame-effect-2 mb-3">
                <span class="image-frame-wrapper image-frame-wrapper-overlay-bottom image-frame-wrapper-overlay-light image-frame-wrapper-align-end">
                  <a href="shop-product-detail-right-sidebar.html">
                    <img src="_nwAssets/img/products/product-2.jpg" class="img-fluid" alt="">
                  </a>
                  <span class="image-frame-action">
                    <a href="#" class="btn btn-primary btn-rounded font-weight-semibold btn-v-3 btn-fs-2">ADD TO CART</a>
                  </span>
                </span>
              </div>
              <div class="product-info d-flex flex-column flex-lg-row justify-content-between">
                <div class="product-info-title">
                  <h3 class="text-color-default text-2 line-height-1 mb-1"><a href="shop-product-detail-right-sidebar.html">Leather Belt</a></h3>
                  <span class="price font-primary text-4"><strong class="text-color-dark">$19</strong></span>
                  <span class="old-price font-primary text-line-trough text-1"><strong class="text-color-default">$29</strong></span>
                </div>
                <div class="product-info-rate d-flex">
                  <i class="fas fa-star text-color-default mr-1"></i>
                  <i class="fas fa-star text-color-default mr-1"></i>
                  <i class="fas fa-star text-color-default mr-1"></i>
                  <i class="fas fa-star text-color-default mr-1"></i>
                  <i class="fas fa-star text-color-default"></i>                  
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-4 mb-4">
            <div class="product portfolio-item portfolio-item-style-2">
              <div class="image-frame image-frame-style-1 image-frame-effect-2 mb-3">
                <span class="image-frame-wrapper image-frame-wrapper-overlay-bottom image-frame-wrapper-overlay-light image-frame-wrapper-align-end">
                  <a href="shop-product-detail-right-sidebar.html">
                    <img src="_nwAssets/img/products/product-3.jpg" class="img-fluid" alt="">
                  </a>
                  <span class="image-frame-action">
                    <a href="#" class="btn btn-primary btn-rounded font-weight-semibold btn-v-3 btn-fs-2">ADD TO CART</a>
                  </span>
                </span>
              </div>
              <div class="product-info d-flex flex-column flex-lg-row justify-content-between">
                <div class="product-info-title">
                  <h3 class="text-color-default text-2 line-height-1 mb-1"><a href="shop-product-detail-right-sidebar.html">Jack Sandals</a></h3>
                  <span class="price font-primary text-4"><strong class="text-color-dark">$30</strong></span>
                  <span class="old-price font-primary text-line-trough text-1"><strong class="text-color-default">$40</strong></span>
                </div>
                <div class="product-info-rate d-flex">
                  <i class="fas fa-star text-color-default mr-1"></i>
                  <i class="fas fa-star text-color-default mr-1"></i>
                  <i class="fas fa-star text-color-default mr-1"></i>
                  <i class="fas fa-star text-color-default mr-1"></i>
                  <i class="fas fa-star text-color-default"></i>                  
                </div>
              </div>
            </div>
          </div> -->
        </div>
      </div>
    </div>
  </div>
  @include('notification');
</div>
@endsection
@section('config-js')
<script src="https://js.stripe.com/v3/"></script>

<script type="text/javascript">
  var baseapiurl='https://vinapi.bwaystechnomedia.in/';
  var category = '';
  /* For Owl Carousel */
  $( document ).ready(function() {
	 
		 //Start- VIN# Search Integration
		  var vin=$('#upcCode').val();
		if ($('#category').val() == 'Automobiles') {	 
		   $.ajax({
            type: 'GET',
            url: baseapiurl+"/Home/VINSpecs?vin="+vin,
            success:function(data)
			{
				 
				$('#productDetailMoreInfo').empty();
				
				var html='<table class="table">';
				
				  jQuery.each(data.dataset.attributes, function (i, val) {
					  html=html+'<tr><th class="border-top-0" scope="row">' + i.replace("_", " ") + '</th><td class="border-top-0">' + val + '&nbsp;</td></tr>';
					     
                  });
				  
				  html=html+"</table>";
				  $('#productDetailMoreInfo').html(html);
			
				$('.vehicle-Title').html(data.dataset.attributes.make + ' ' + data.dataset.attributes.model + ' ' + data.dataset.attributes.type + ' ' + data.dataset.attributes.trim);
				$('.invoicePrice').html(data.dataset.attributes.invoice_price);
				$('#loan1').val(data.dataset.attributes.invoice_price.replace(",", "").replace("$", ""));
				//$('#thumbGalleryDetail').empty();
				//$('#thumbGalleryThumbs').empty();
				//if (data.dataset.photos.length > 0)
				//{
				//	$('#thumbGalleryDetail').append('<div><div class="dlab-thum-bx"> <img src="' + data.dataset.photos[0].url + '" alt="" class="img-fluid"> </div></div>');
				//}

				var price=data.dataset.attributes.invoice_price.replace(",", "").replace("$", "");
				  $.get(baseapiurl+'Home/FinCalc?invoiceamount='+price,  // url
						function (data) {
							$('.FinCals').append(data);
						}
				  );
				  
			},
			error(er){
				alert('error');
				
			}
			});
		}else{
			$('#FinCals').hide();
		}
	  
      (function($) {
      'use strict';
      var $thumbGalleryDetail = $('#thumbGalleryDetail'),
        $thumbGalleryThumbs = $('#thumbGalleryThumbs'),
        flag = false,
        duration = 300;

      $thumbGalleryDetail
        .owlCarousel({
          items: 1,
          margin: 10,
          nav: true,
          dots: false,
          loop: false,
          navText: [],
          rtl: ( $('html').attr('dir') == 'rtl' ) ? true : false
        })
        .on('changed.owl.carousel', function(e) {
          if (!flag) {
            flag = true;
            $thumbGalleryThumbs.trigger('to.owl.carousel', [e.item.index-1, duration, true]);
            flag = false;
          }
        });

      $thumbGalleryThumbs
        .owlCarousel({
          margin: 15,
          items: 4,
          nav: false,
          center: false,
          dots: false,
          rtl: ( $('html').attr('dir') == 'rtl' ) ? true : false
        })
        .on('click', '.owl-item', function() {
          $thumbGalleryDetail.trigger('to.owl.carousel', [$(this).index(), duration, true]);
        })
        .on('changed.owl.carousel', function(e) {
          if (!flag) {
            flag = true;
            $thumbGalleryDetail.trigger('to.owl.carousel', [e.item.index, duration, true]);
            flag = false;
          }
        });

    }).apply(this, [jQuery]);
      category = document.getElementById('category').value;
      $('#breadcrumbLastNode').html(category);
      setAttributeCategories(category);
	
	  
  });

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
      var attributePassingId = '#attributeSet_'+i;
      $(attributePassingId).html(autoArray[i-1]);
    }
  }

  $(function() {
	 
	  
    $(".cart-btn").on("click", function() {
     var $button = $(this);
     var $parent = $button.parent(); 
     var oldValue = $parent.find('.qty').val();
     var maxValue = $parent.find('.qty').attr('max');
     var minvalue = 1;
      if ($button.val() == "+") {
        var newVal = parseFloat(oldValue) + 1;
        if (newVal > maxValue) {
          $(".plus").attr("disabled", true);
        }
      } 
      else {
        // Don't allow decrementing below zero
        if (oldValue > 1) {
          var newVal = parseFloat(oldValue) - 1;
          } else {
          newVal = 1;
        }
        if (newVal < maxValue) {
          $(".plus").attr("disabled", false);
        }
        if (newVal == 0) {
          $(".minus").attr("disabled", true); 
        }
      }
      /*$parent.find('a.add-to-cart').attr('data-quantity', newVal);
      $parent.find('.qty').val(newVal);*/
    });
	
	
	
  });
  
  
</script>

<script type="text/javascript">
  var clientSetCategory = '{{$product->category}}';
   // required fields ...
   var ROBO_API_KEY = 'f07862522e9585ffd7ca6a6138ec262480b0d91f';
   var ROBO_PRODUCT_NAME_IDENTIFIER_TYPE = 'class'; // id or class
   var ROBO_PRODUCT_NAME_IDENTIFIER_NAME = 'product-title'; // id name or class name here ...
   var ROBO_SELLER_EMAIL = '{{ $product->seller->email_address}}';
   var ROBO_NEGOTIATION_MODE = 'auto' ;
   var ADD_TO_CART_BTN_IDENTIFIER_TYPE  = 'id'; // class or id;
   var ADD_TO_CART_BTN_IDENTIFIER_NAME  = 'Add_to_cart'; // class or id;
   var inputName = 'upcCode';
   // optional fields ...
   var ROBO_BTN_CLASS = 'btn-blue'; //here write custom class name to load in the button
   var ROBO_BTN_PREFIX_ELEMENT = '<br/>' ;// here you can write any html tag you want to load before the button ;
   var ROBO_BTN_STYLE = 'width:400px;height:50px;'; // here write your custom style
   var ROBO_BTN_CUSTOM_TEXT = 'Negotiate through Robonegotiator' // write button text here ...
   /*var ROBO_UPC_CODE = '{{$product->upc_product_code}}' ;*/
   
   window.onbeforeunload = function() {
       return conf();
   }
   
   function  conf() {
       window.alert("If you leave this page, you will lose any unsaved changes.");
       console.log('checking');
   }
   
</script>
@endsection