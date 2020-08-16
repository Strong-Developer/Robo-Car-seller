<div class="row">



    <div class="col-md-12">

        <div class="card">

            <div class="card-header">



                <p class="font-weight-bold"><i class="fa fa-upload"></i>&nbsp; Upload a Product and Deal</p>


            </div>

            <div class="card-body">
                <div class="card-body">


                    <div class="row">

                        <div class="col-md-5">

                            <img src="{{asset('img/process_1.png')}}" class="img-fluid">
                        </div>

                        <div class="col-md-7">

                            <p class="font-weight-bold">
                                Welcome to RoboNegotiator.  You want to find more buyers matching your needs and we are committed to find them.  Please follow these steps:
                            </p>
                            <br>


                            (1)	Upload a Product/ Deal–
                            <br> <br>
                            i.	As a seller, we would like you to first upload some special deals (hidden) to RoboNegotiator
                            so we can find buyers matching your needs. <br>
                            ii.	Decide products (uniquely identifiable), quanity and Minimum Selling Price for your products.  We will hide “special price and negotiation related input” so they won’t be visible to end buyer.
                            <br>
                            iii.	We will also prepare a normal “Product Catalog” where buyer can see your products and decide to purchase them (or negotiate with you)
                            <br><br>
                            (2)	Define Negotiation Rules/Parameters: For a given product, you can take care of your customers
                            or revenue/ profit by defining some rules/ parameters that we must follow in automated
                            negotiations. <br>
                            <br>
                            (3)	Check Negotiation/Deal Progress – This will allow you to see status of your uploaded deals and find results if RoboNegotiator found a matching buyer. You will also see texts/ emails though when matching occurs.
                            <br><br>
                            (4)	Artificial Intelligence/ Machine Learning – Ask for a special demo. Coming Soon to this site.


                        </div>

                    </div>




                </div>

            </div>


            {{csrf_field()}}
            <div class="card-body">

                <div class="row">

                    {{\App\Http\Controllers\PagesHandler::notification()}}

                    <div class="col-md-12">


                        <div class="form-group">


                            @if($errors-&gt;has('category'))

                                <div class="alert alert-danger">
                                    {{$errors-&gt;first('category')}}
                                </div>
                            @endif
                            <select required="" name="category" class="form-control" style="display: block
                                    !important;">
                                <option value="">Select Category *</option>

                                <option>Automobiles</option><option> Electronics</option><option> Real Estate</option><option>Jewelry</option>
                                <option>Industrial</option>
                                <option> Furniture</option>
                                <option> Miscellaneous
                                </option>
                            </select>

                        </div>

                    </div>


                    <div class="col-md-12">
                        <p class="font-weight-bold">Upload 5-6 photos ( at least 1 photo is required)</p>

                    </div>
                    <div class="col-md-4">


                        <div class="md-form">


                            <input type="file" required="" name="product_img[]" accept="image/*" value="Choose
                                    Image">


                        </div>

                    </div>
                    <div class="col-md-4">


                        <div class="md-form">


                            <input type="file" name="product_img[]" accept="image/*" value="Choose Image">


                        </div>

                    </div>
                    <div class="col-md-4">


                        <div class="md-form">


                            <input type="file" name="product_img[]" accept="image/*" value="Choose Image">


                        </div>

                    </div>
                    <div class="col-md-4">


                        <div class="md-form">


                            <input type="file" name="product_img[]" accept="image/*" value="Choose Image">


                        </div>

                    </div>
                    <div class="col-md-4">


                        <div class="md-form">


                            <input type="file" name="product_img[]" accept="image/*" value="Choose Image">


                        </div>

                    </div>
                    <div class="col-md-4">


                        <div class="md-form">


                            <input type="file" name="product_img[]" accept="image/*" value="Choose Image">


                        </div>

                    </div>

                    <div class="col-md-6">


                        <div class="form-group">
                            @if($errors-&gt;has('product_title'))

                                <div class="alert alert-danger">
                                    {{$errors-&gt;first('product_title')}}
                                </div>
                            @endif

                            <input type="text" class="form-control" placeholder="Product Title *" required="" value="{{old('product_title')}}" name="product_title">

                        </div>

                    </div>
                    <div class="col-md-6">



                        <div class="form-group">
                            @if($errors-&gt;has('upc_product_code'))

                                <div class="alert alert-danger">
                                    {{$errors-&gt;first('upc_product_code')}}
                                </div>
                            @endif

                            <input type="text" class="form-control" placeholder="Product Code (UPC or SKU or  VIN) *" value="{{old('upc_product_code')}}" required="" name="upc_product_code">

                        </div>

                    </div>

                    <div class="col-md-12">
                        <p class="font-weight-bold">
                            Product Attributes
                        </p>

                    </div>
                    <div class="col-md-3">


                        <div class="form-group">


                            <input type="text" class="form-control" placeholder="Attribute 1 / Make  (Optional)" name="make" value="{{old('make')}}">

                        </div>

                    </div>

                    <div class="col-md-3">


                        <div class="form-group">


                            <input type="text" class="form-control" placeholder="Attribute 2 / Model(Optional)" name="model" value="{{old('model')}}">

                        </div>

                    </div>
                    <div class="col-md-3">


                        <div class="form-group">


                            <input type="text" class="form-control" placeholder="Attribute 3/Condition (Optional)" name="condition" value="{{old('condition')}}">

                        </div>

                    </div>
                    <div class="col-md-3">


                        <div class="form-group">


                            <input type="text" class="form-control" placeholder="Attribute 4/Color (Optional)" name="color" value="{{old('color')}}">

                        </div>

                    </div>
                    <div class="col-md-3">


                        <div class="form-group">


                            <input type="text" class="form-control" placeholder="Attribute 5/Size (Optional)" name="size" value="{{old('size')}}">

                        </div>

                    </div>
                    <div class="col-md-9">


                        <div class="form-group">


                            <input type="text" class="form-control" placeholder="URL(More Information)
 (Optional)" name="url" value="{{old('url')}}">

                        </div>

                    </div>
                    <div class="col-md-12">


                        <div class="form-group">


                            @if($errors-&gt;has('price'))

                                <div class="alert alert-danger">
                                    {{$errors-&gt;first('price')}}
                                </div>
                            @endif
                            <input type="text" class="form-control" placeholder="Listing Price (USD) *" name="price" required="" value="{{old('price')}}">

                        </div>

                    </div>

                    <div class="col-md-12">


                        <div class="form-group">


                            <input type="text" class="form-control" placeholder="Special RoboNegotiator Deal  Price *" name="special_deal_price" value="{{old('special_deal_price')}}">

                        </div>

                    </div>

                    <div class="col-md-12">


                        <div class="form-group">

                            @if($errors-&gt;has('lowest_price'))

                                <div class="alert alert-danger">
                                    {{$errors-&gt;first('lowest_price')}}
                                </div>
                            @endif


                            <input type="text" class="form-control" placeholder="Provide us the lowest price  at which you would like to sell if we need to  negotiate further? @if(Auth::user
                                    ()->negotiation !== 'auto') (Optional) @else  *  @endif" name="lowest_price" @if(auth::user()-="">negotiation === 'auto') required  @endif   value="{{old
                                           ('lowest_price')
                                           }}"&gt;

                        </div>

                    </div>

                    <div class="col-md-6">


                        <div class="form-group">

                            @if($errors-&gt;has('seller_original_quantity'))

                                <div class="alert alert-danger">
                                    {{$errors-&gt;first('seller_original_quantity')}}
                                </div>
                            @endif

                            <input type="text" class="form-control" placeholder="Quantity Available for this
 deal *" required="" name="seller_original_quantity" value="{{old('seller_original_quantity')}}">

                        </div>

                    </div>

                    <div class="col-md-6">


                        <div class="form-group">

                            @if($errors-&gt;has('deal_expiry_date'))

                                <div class="alert alert-danger">
                                    {{$errors-&gt;first('deal_expiry_date')}}
                                </div>
                            @endif

                            <input type="text" class="form-control" placeholder="Deal Expiry Date *" id="datePicker" name="expiry_date" value="{{old('expiry_date')}}" required="">

                        </div>

                    </div>





                </div>


            </div>

            <div class="card-footer">

                <button class="btn btn-lg btn-grey btn-block btn-black  waves-effect waves-light"><i class="fa
                            fa-check"></i>
                    UPLOAD DEAL
                </button>


            </div>



        </div>


    </div>




</div>
