
@extends('app.layout')


@section('content')


    <div class="container-fluid ">


        <div class="row">

            <div class="col-md-12 " style="margin: 0 !important;padding: 0 !important;">
                <div class="view">

                    <div id="overlay-bg" style="width: 100% !important;background: url('{{asset('img/car-2.jpg')}}');
                            background-size: cover !important;background-position: center center; ">

                    </div>
                    <div class="mask  rgba-black-strong">

                        <div class="container-fluid pt-5">

                            <div class="row ">

                                <div class="col-md-4 flex-center py-4" id="buyer-div">

                                    <div class="row">

                                        <div class="col-md-12">

                                            <h2 class="font-weight-bold text-success text-center">
                                                I'm a Car Buyer
                                            </h2>

                                        </div>
                                        <div class="col-md-12">

                                            <p class="text-center text-white">I want to buy a car within my budget and would
                                                like to
                                                negotiate with seller if required. I can commit to purchase in return</p>



                                        </div>

                                        <div class="col-md-12  py-4 mb-4 rounded text-center  text-sm">



                                            <a class="btn btn-outline-success  btn-rounded btn-sm  italic z-depth-3 "
                                               href="{{route('home.cars')}}"
                                               style="border-radius: 50px
                        !important;
                       ">

                                                <h6 class="text-white text-center font-italic "><i
                                                            class="fa fa-search"></i>
                                                   Search Car</h6>




                                            </a>

                                            <a class="btn btn-outline-success  btn-rounded btn-sm italic z-depth-3 disabled"
                                               style="border-radius: 50px
                        !important;
                       ">
                                                <h6 class="text-white text-center font-italic "><i class="fa fa-calculator"></i>
                                                    Finance Calculator</h6>


                                            </a>

                                            <a class=" btn btn-outline-success btn-sm btn-rounded  italic z-depth-3
                                            disabled"
                                               style="border-radius: 50px
                        !important;
                       ">
                                                <h6 class="text-white text-center font-italic "><i class="fa fa-check"></i>
                                                    Car Fax / VIN Check</h6>


                                            </a>


                                        </div>









                                    </div>

                                </div>
                                <div class="d-none d-md-block col-md-4 flex-center py-4 mt-2 ">


                                    <div class="row pt-1 flex-center">

                                        <div class="col-md-12">

                                            <h4 class="text-white font-weight-bold text-center">
                                               Automatic Negotiation
                                            </h4>

                                            <br/>

                                            <p class="text-white text-center">
                                                RoboNegotiator connects two or more parties anonymously and closes deals through unbiased & expedited negotiations.
                                                Parties can negotiate themselves or let RoboNegotiator negotiate for them.
                                                Sellers can automate sales process, increase sales and clear their inventory. Ask us for demo.
                                            </p>
                                            <br/>
                                        </div>
                                        <div class="col-md-12">


                                            <img src="{{asset('img/rsz_logo-transparent.png')}}" class="img-fluid">


                                        </div>



                                    </div>


                                </div>
                                <div class="col-md-4 py-4 " id="seller-div" >



                                    <div class="row">

                                        <div class="col-md-12">

                                            <h2 class="font-weight-bold text-success text-center">
                                                I'm a Car Seller
                                            </h2>

                                        </div>
                                        <div class="col-md-12">

                                            <p class="text-center text-white">I want to sell a car and would negotiate with the buyer .
                                                Get me a buyer paying above the minimum price</p>



                                        </div>

                                        <div class="col-md-12  py-4 mb-4 rounded text-center  text-sm">



                                            <a class="btn btn-outline-success  btn-rounded btn-sm  italic z-depth-3 "
                                               href="{{route('addProduct')}}"
                                               style="border-radius: 50px
                        !important;
                       ">

                                                <h6 class="text-white text-center font-italic "><i
                                                            class="fa fa-car"></i>
                                                    Upload a special deal
                                                </h6>




                                            </a>

                                            <a class="btn btn-outline-success  btn-rounded btn-sm italic z-depth-3"
                                               href="{{route('setrules')}}"
                                               style="border-radius: 50px
                        !important;
                       ">
                                                <h6 class="text-white text-center font-italic "><i class="fa fa-cog"></i>
                                                    Set negotiation parameters</h6>


                                            </a>

                                            <a class="btn btn-outline-success btn-sm btn-rounded  italic z-depth-3"
                                               href="{{route('viewProgress')}}"
                                               style="border-radius: 50px
                        !important;
                       ">
                                                <h6 class="text-white text-center font-italic "><i class="fa fa-check"></i>
                                                    Check Deal Progress</h6>


                                            </a>

                                            <a class="btn btn-outline-success btn-sm btn-rounded  italic z-depth-3 disabled"
                                               style="border-radius: 50px
                        !important;
                       ">
                                                <h6 class="text-white text-center font-italic "><i class="fa fa-bars"></i>
                                                    Market price for this car
                                                </h6>


                                            </a>

                                            <a class="btn btn-outline-success btn-sm btn-rounded  italic z-depth-3 disabled"
                                               style="border-radius: 50px
                        !important;
                       ">
                                                <h6 class="text-white text-center font-italic "><i class="fa
                                                fa-history"></i>
                                                    Past trends

                                                </h6>


                                            </a>


                                        </div>




                                    </div>


                            </div>

                        </div>

                        </div>
                    </div>
                </div>
            </div>





        </div>

    </div>

    <style type="text/css">

        .category-sec-left {
            border-right: 1px solid #fff !important;
            border-bottom: 1px solid #fff !important;

        }
        .category-sec-right {
            border-bottom: 1px solid #fff !important;

        }

        #overlay-bg {
            height: 700px;!important;
        }



        .btn-outline-success:hover {
            background: green !important;
        }

        @media (max-width: 480px) {

            .category-sec-left {
                border-right: 0 !important;
                border-bottom: 1px solid #fff !important;

            }
            .category-sec-right {
                border-right: 0 !important;
                border-bottom: 1px solid #fff !important;

            }

            #overlay-bg {
                height: 1200px !important;
            }
        }


    </style>
@endsection
