@extends('layout-old')

@section('content')


    <div class="row" >


        <form action="" method="get" class="col-md-12">



            <div class="card">



                <div class="card-body">




                        <div class="row">

                            <div class="col-md-12">

                                {{App\Http\Controllers\PagesHandler::notification()}}
                                <div class="form-group">

                                    <p>Please select a product</p>

                                    <select required name="upc_product_code" class="form-control" style="display: block
                                    !important;">
                                        <option value="">Select</option>
                                        @foreach($products as $product)
                                        <option
                                                value="{{$product->upc_product_code}}">{{$product->product_title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">

                                    <button class="btn btn-black">Submit</button>

                                </div>

                            </div>
                            @if( ! empty($data) && $data !== null)

                                @foreach($data as $key => $value)

                                <div class="col-md-6 mb-3">

                                    <div class="card">

                                        <div class="card-header">

                                           <p class="font-weight-bold float-left">(# {{$key+1}} ) @if(array_key_exists
                                           ('buyer_email' , $value)){{$value['buyer_email']}}
                                            @endif

                                            <p class="float-right">
                                                UPC ({{app('request')->get('upc_product_code')}})
                                            </p>
                                        </div>

                                        <div class="card-body">

                                            <div class="table-responsive">

                                                <table class="table table-bordered">


                                                    <thead>
                                                    <tr>


                                                        <td class="font-weight-bold">Buyer Email</td>
                                                        <td class="font-weight-bold">
                                                            @if(array_key_exists('buyer_email' , $value)){{$value['buyer_email']}}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <!--<tr>
                                                        <td class="font-weight-bold">Seller Negotiation Mode</td>
                                                        <td class="font-weight-bold">
                                                            @if(array_key_exists('type1_negotiation_mode' , $value)){{$value['type1_negotiation_mode']}}
                                                            @endif
                                                        </td>

                                                    </tr>-->
                                                   <!-- <tr>
                                                        <td class="font-weight-bold">Buyer Negotiation Mode</td>
                                                        <td class="font-weight-bold">
                                                            @if(array_key_exists('type2_negotiation_mode' , $value)){{$value['type2_negotiation_mode']}}
                                                            @endif
                                                        </td>

                                                    </tr>-->
                                                  <!--  <tr>
                                                        <td class="font-weight-bold">Seller Negotiation Value</td>
                                                        <td class="font-weight-bold">
                                                            @if(array_key_exists('type1_negotiation_value' , $value)) $ {{$value['type1_negotiation_value']}} USD
                                                            @endif
                                                        </td>

                                                    </tr>-->
                                                   <!-- <tr>
                                                        <td class="font-weight-bold">Buyer Negotiation Value</td>
                                                        <td class="font-weight-bold">
                                                            @if(array_key_exists('type2_negotiation_value' , $value)) $ {{$value['type2_negotiation_value']}} USD
                                                            @endif
                                                        </td>

                                                    </tr>-->

                                                    <tr>
                                                        <td class="font-weight-bold">Final Amount </td>
                                                        <td class="font-weight-bold">
                                                            @if(array_key_exists('type2_final_amount' , $value)) ${{$value['type2_final_amount']}} USD
                                                            @endif
                                                        </td>

                                                    </tr>

                                                    <tr>
                                                        <td class="font-weight-bold">Matched Quantity</td>
                                                        <td class="font-weight-bold">
                                                            @if(array_key_exists('matched_quantity' , $value)){{$value['matched_quantity']}}
                                                            @endif
                                                        </td>

                                                    </tr>
                                                   <!-- <tr>
                                                        <td class="font-weight-bold">Seller Last Updated at</td>
                                                        <td class="font-weight-bold">
                                                            @if(array_key_exists('type1_timestamp' , $value)){{$value['type1_timestamp']}}
                                                            @endif
                                                        </td>

                                                    </tr>-->
                                                   <!-- <tr>
                                                        <td class="font-weight-bold">Buyer Last Updated at</td>
                                                        <td class="font-weight-bold">
                                                            @if(array_key_exists('type2_timestamp' , $value))
                                                                {{$value['type2_timestamp']}}
                                                            @endif
                                                        </td>

                                                    </tr>-->
                                                    <!--<tr>
                                                        <td class="font-weight-bold">Comment</td>
                                                        <td class="font-weight-bold">
                                                            @if(array_key_exists('comment' , $value))
                                                                {{$value['comment']}}
                                                            @endif
                                                        </td>

                                                    </tr>-->

                                                    @if(array_key_exists('buyer_phone' , $value))
                                                        <tr>
                                                            <td class="font-weight-bold">Buyer Phone</td>
                                                            <td class="font-weight-bold">
                                                                {{$value['buyer_phone']}}

                                                            </td>

                                                        </tr>

                                                    @endif
                                                    </thead>



                                                </table>


                                            </div>


                                        </div>


                                    </div>


                            </div>

                                @endforeach

                            @endif




                        </div>




                </div>



            </div>





        </form>




    </div>


@endsection