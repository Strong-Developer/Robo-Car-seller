@extends('app.layout')

@section('content')

    <div class="container-fluid pb-5">

    <!-- Sub Banner end -->
    @if(app('request')->get('confirm') !== null)
        <div class="col-md-12 mb-5">


            <div class="card">

                <div class="card-header">

                    <p class="font-weight-bold float-left">
                        Negotiate through RoboNegotiator
                    </p>



                </div>

                <div class="card-body">


                    <p>RoboNegotiator can negotiate with one or more sellers to get this product  within your
                        budget. Please provide your details and preferences and we will match your offer with
                        special deals in our database and help in negotiation if possible. Low-ball offer is ignored usually so please provide compelling offer to close the deal.</p>
                    <form class="row" action="{{route('buyer.offer.add')}}" method="post">
                        {{csrf_field()}}

                        <div class="col-md-12">
                            {{\App\Http\Controllers\PagesHandler::notification()}}
                        </div>
                        <div class="col-md-3">

                            @if($errors->has('buyer_email'))

                                <div class="alert alert-danger">
                                    {{$errors->first('buyer_email')}}
                                </div>
                            @endif
                            <div class="md-form">

                                <input required type="email" class="form-control" name="buyer_email"
                                       placeholder="Your Email" value="{{old('buyer_email')}}">

                            </div>

                        </div>
                        <div class="col-md-5">
                            @if($errors->has('buyer_phone'))

                                <div class="alert alert-danger">
                                    {{$errors->first('buyer_phone')}}
                                </div>
                            @endif
                            <div class="md-form">

                                <input required type="text" class="form-control" name="buyer_phone" placeholder="Your Phone Number (Where we can send you a text message)" value="{{old('buyer_phone')}}">

                            </div>

                        </div>

                        <div class="col-md-4">

                            @if($errors->has('buyer_zip'))

                                <div class="alert alert-danger">
                                    {{$errors->first('buyer_zip')}}
                                </div>
                            @endif
                            <div class="md-form">

                                <input required type="text" class="form-control" name="buyer_zip" value="{{old
                                ('buyer_zip')}}"
                                       placeholder="Your
  Location/Zip so we find local sellers first ">

                            </div>

                        </div>

                        <div class="col-md-3">

                            @if($errors->has('buyer_negotiation_mode'))

                                <div class="alert alert-danger">
                                    {{$errors->first('buyer_negotiation_mode')}}
                                </div>
                            @endif
                            <p class="font-weight-bold">Would you like to negotiate yourself ?</p>
                        </div>
                        <div class="col-md-9">
                            <div class="custom-control custom-radio">

                                <input required type="radio" class="custom-control-input" id="defaultUnchecked"
                                       name="buyer_negotiation_mode"
                                       value="classic"  @if($product->seller->negotiation !== 'classic') disabled @else checked @endif>
                                <label class="custom-control-label" for="defaultUnchecked">	Yes (RoboNegotiator will relay information and you will directly negotiate with seller via text/ email) </label>
                            </div>

                            <!-- Default checked -->
                            <div class="custom-control custom-radio">
                                <input required type="radio" class="custom-control-input" id="defaultChecked"
                                       name="buyer_negotiation_mode"
                                       value="auto"  @if($product->seller->negotiation !== 'auto') disabled @else checked @endif>
                                <label class="custom-control-label" for="defaultChecked">		No (RoboNegotiator will apply latest strategies to close the deal in your favor. We will need some more information from you so we can negotiate on your behalf)</label>
                            </div>

                        </div>

                        <div class="col-md-3">

                            @if($errors->has('buyer_offer_price'))

                                <div class="alert alert-danger">
                                    {{$errors->first('buyer_offer_price')}}
                                </div>
                            @endif
                            <div class="md-form">

                                <input required type="text" class="form-control" name="buyer_offer_price"
                                       value="{{old('buyer_offer_price')}}"
                                       placeholder="Offer you can commit for this product">

                            </div>

                        </div>
                        <div class="col-md-3">
                            @if($errors->has('buyer_highest_offer_price'))

                                <div class="alert alert-danger">
                                    {{$errors->first('buyer_highest_offer_price')}}
                                </div>
                            @endif
                            <div class="md-form">

                                <input @if($product->seller->negotiation !== 'classic') required @endif type="text"
                                       class="form-control"
                                       name="buyer_highest_offer_price"
                                       value="{{old('buyer_highest_offer_price')}}"
                                       placeholder="Your Highest Offer (in $): @if($product->seller->negotiation === 'classic') (Optional) @endif ">

                            </div>

                        </div>
                        <div class="col-md-3">

                            @if($errors->has('buyer_original_quantity'))

                                <div class="alert alert-danger">
                                    {{$errors->first('buyer_original_quantity')}}
                                </div>
                            @endif
                            <div class="md-form">

                                <input required type="number" class="form-control" name="buyer_original_quantity"
                                       value="{{old('buyer_original_quantity')}}"
                                       placeholder="Quantity you want to buy">

                            </div>

                        </div>

                        <div class="col-md-3">
                            @if($errors->has('expiry_date'))

                                <div class="alert alert-danger">
                                    {{$errors->first('expiry_date')}}
                                </div>
                            @endif
                            <div class="md-form">

                                <input required type="text" class="form-control" name="expiry_date" id="datePicker"
                                       value="{{old('expiry_date')}}"
                                       placeholder="Your Offer Validity (Expires on): ">

                            </div>

                        </div>

                        <input type="hidden" name="currency" value="USD">

                        <input type="hidden" name="upc_product_code" value="{{$product->upc_product_code}}">


                        <div class="col-md-12">


                            <button type="submit" class="btn btn-black btn-block">
                                <i class="fa fa-rocket"></i> Commit My Offer/ Negotiate
                            </button>

                        </div>


                    </form>


                </div>



            </div>




        </div>

    @endif
    <!-- Car details page start -->
    <div class="car-details-page content-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-7">
                    <div class="card">

                        <div class="card-header">

                            <h2 class="font-weight-bold">
                                {{$product->product_title}}
                            </h2>


                        </div>
                        <div class="card-body">

                            <!--Carousel Wrapper-->
                            <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">
                                <!--Slides-->
                                <div class="carousel-inner" role="listbox">

                                    @foreach($product->images as $key => $image)

                                        <div class="carousel-item @if($key === 0)active @endif">
                                            <div class="row" style="padding: 15px !important;">

                                                <div  class="pro-img col-md-12 rounded z-depth-5 " style="
                                                        ;
                                                        background-image: url('{{$image->main_file_path}}');

                                                        background-size: cover !important;background-position: center center
                                                        !important;
                                                        background-repeat: no-repeat !important;" >



                                                </div>

                                            </div>


                                        </div>


                                    @endforeach
                                </div>
                                <!--/.Slides-->
                                <!--Controls-->
                                <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                                <!--/.Controls-->
                                <div class="carousel-indicators row ">
                                    @foreach($product->images as $key => $image)



                                        <div  data-target="#carousel-thumb" data-slide-to="{{$key}}"  @if($key === 0)
                                        active @endif class="col-md-3 d-none d-lg-block" style="padding: 10px !important;" >


                                            <div class="row" style="padding: 15px !important;">

                                                <div class="col-md-12 rounded z-depth-2" style="height:
                                                        120px
                                                        !important;
                                                        background-image: url('{{$image->file_path}}');

                                                        background-size: cover !important;background-position: center center
                                                        !important;
                                                        background-repeat: no-repeat !important;" >


                                                </div>

                                            </div>


                                        </div>



                                    @endforeach
                                </div>
                            </div>
                            <!--/.Carousel Wrapper-->

                        </div>



                    </div>
                </div>

                <div class="col-md-5">

                    <div class="card">


                        <div class="card-body">

                            <div class="row">

                                <div class="col-lg-12 mb-2">
                                    <h2 class="font-weight-bold">Car Details</h2>
                                </div>
                                <div class="col-md-12">

                                    <p class="font-weight-bold">Listing Price : ${{$product->price}} (USD)</p>

                                    <p class="font-weight-bold">UPC (Universal Product Code): {{$product->upc_product_code}}</p>


                                    <p class="font-weight-bold">Attribute 1: {{$product->make}}</p>



                                    <p class="font-weight-bold">Attribute 2: {{$product->model}}</p>


                                    <p class="font-weight-bold">Attribute 3: {{$product->condition}}</p>

                                    <p class="font-weight-bold">Attribute 4: {{$product->color}}</p>

                                    <p class="font-weight-bold">Attribute 5: {{$product->size}}</p>

                                    <p class="font-weight-bold">Related URL: {{$product->url}}</p>

                                    <a class="btn btn-black disabled btn-block">
                                        <i class="fa fa-cart-plus"></i> Add to Cart
                                    </a>

                                    @if(app('request')->get('confirm') === null)
                                        <a data-toggle="modal" data-target="#basicExampleModal" class="btn btn-black btn-block">
                                            <i class="fa fa-rocket"></i> Negotiate Through RoboNegotiator
                                        </a>
                                    @endif

                                </div>

                            </div>




                        </div>

                    </div>




                </div>
            </div>
        </div>
    </div>

    <div class="row" >






            <!-- Modal -->
            <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">

                        <div class="modal-body">

                            <div class="row">



                                <div class="card">

                                    <div class="card-header">

                                        <div class="col-md-12 mb-1">

                                            <img src="{{asset('img/rsz_logo-transparent.png')}}" width="220px"
                                                 class="float-left">


                                            <a href="https://youtu.be/P9xxNRaWbCI" target="_blank" class="btn btn-blue float-right">
                                                <i class="fa fa-play"></i> Watch Video
                                            </a>
                                        </div>

                                    </div>

                                    <div class="card-body">


                                        <div class="row">

                                            <div class="col-md-6">


                                                <h5 class="font-weight-bold copper-color">Negotiation via
                                                    RoboNegotiator</h5>


                                                <p class=""> <span class="font-weight-bold
                                                copper-color">Why</span> :  The
                                                    economy is tough,
                                                    and
                                                    consumers
                                                    have leveled up their tactics. While small-ticket items are bought immediately and on a regular basis, higher-end items sit idle in inventory for far too long. An outside-the-box approach is required to get these items sold. Coupons, discounts, auctions and sales all lose their meaning when consumers need to match the seller’s minimum price. Many buyers want the gratification of knowing that they saved money by making a deal, and they’re willing to delay purchases and look elsewhere to get that gratification.</p>


                                                <p> <span class="font-weight-bold  copper-color">How</span>: Once you find your
                                                    perfect
                                                    product, you
                                                    can commit your interest while providing your best counter offer through RoboNegotiator. If you have a question or feedback to give, let’s do that too. We will find matching deal (if any) from a seller and if it is close to your offer, you will get the opportunity to negotiate further.</p>

                                            </div>

                                            <div class="col-md-6">

                                                <h5 class="font-weight-bold copper-color">What is RoboNegotiator</h5>


                                                <p>RoboNegotiator finds your perfect seller, you can negotiate through our system or we can negotiate for you. We will introduce you the seller with the negotiated price. Connect with the seller and you finish the remaining formalities.</p>

                                                <h5 class="font-weight-bold copper-color">Next Steps</h5>

                                                <p>We would get your counter-offer and commitment if you decide to continue. Once we get your offer, we will match with seller's offer (if any) and help with negotiation based on your preference. On success, you will be introduced to seller with mutually agreed price. Otherwise, your offer remains unmatched until it expires and we purge them at the end.  Wait and get your price instead of walking away.

                                                </p>


                                                <h5 class="font-weight-bold copper-color">Concerns / Questions </h5>


                                                <p class="font-weight-bold"> Phone: (937) 969-7626<br/>
                                                    Email: info@robonegotiator.com

                                                    <br/>
                                                    <a href="https://robonegotiator.com" target="_blank">
                                                        https://robonegotiator.com</a>
                                                    <br/>

                                                </p>



                                            </div>
                                            <div class="col-md-12 text-center">
                                                <a class="btn btn-black" href="{{route('buyer.product.details',['upc_product_code' =>
                            $product->upc_product_code , 'confirm' => true])}}">Continue Committing Offer</a>

                                                <a class="btn btn-black" data-dismiss="modal">Cancel</a>
                                            </div>

                                        </div>


                                    </div>

                                   <!-- <div class="card-footer">


                                        <div class="row">

                                          <div class="col-md-6">


                                                <h4 class="font-weight-bold copper-color">Concerns / Questions </h4>
                                                <br/>

                                                <p class="font-weight-bold"> Phone: (937) 969-7626<br/>
                                                    Email: info@robonegotiator.com

                                                    <br/>
                                                    <a href="https://robonegotiator.com" target="_blank">
                                                        https://robonegotiator.com</a>
                                                    <br/>

                                                </p>

                                            </div>

                                          <div class="col-md-6">

                                                <img src="https://robonegotiator.com/wp-content/uploads/2018/11/066.jpg" width="200px">
                                                <img src="https://robonegotiator.com/wp-content/uploads/2018/11/work1.png"
                                                     width="200px ">

                                            </div>

                                        </div>


                                    </div>-->

                                </div>



                            </div>
                        </div>

                    </div>
                </div>
            </div>





    </div>

    </div>

@endsection