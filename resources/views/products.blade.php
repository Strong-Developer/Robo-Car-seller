@extends('layout-old')

@section('content')


    <div class="row h" ng-controller="ProductCTRL" ng-init="getSearchResult()">


        <div class="col-md-3 text-sm font-weight-bold">

            <div class="card">

                <div class="card-header">



                    <p class="font-weight-bold"><i class="fa fa-search"></i>&nbsp; Search deals</p>


                </div>

                <form ng-submit="getSearchResult" >

                    <div class="card-body">

                        <div class="row">


                            <div class="col-md-12">


                                <div class="form-group">

                                    <label>
                                        Category
                                    </label>

                                    <select ng-model="products.terms.category" ng-change="getSearchResult()"
                                            class="form-control"
                                            style="display:
                                    block
                                    !important;">

                                        @foreach($categories as $cate)
                                            <option value="{{$cate->category}}">
                                                {{$cate->category}}
                                            </option>

                                        @endforeach
                                    </select>

                                </div>


                            </div>

                            <div class="col-md-12">


                                <div class="form-group">

                                    <label>
                                        Condition
                                    </label>

                                    <select ng-model="products.terms.condition" ng-change="getSearchResult()"
                                            class="form-control" style="display: block !important;">

                                        @foreach($conditions as $condition)
                                            <option value="{{$condition->condition}}">
                                                {{$condition->condition}}
                                            </option>

                                        @endforeach
                                    </select>

                                </div>


                            </div>


                            <div class="col-md-12">


                                <div class="form-group">

                                    <label>
                                        Model
                                    </label>

                                    <select ng-model="products.terms.model" ng-change="getSearchResult()"
                                            class="form-control" style="display: block !important;">

                                        @foreach($models as $model)
                                            <option value="{{$model->model}}">
                                                {{$model->model}}
                                            </option>

                                        @endforeach
                                    </select>

                                </div>


                            </div>


                            <div class="col-md-12">


                                <div class="form-group">

                                    <label>
                                        Make
                                    </label>

                                    <select ng-model="products.terms.make" ng-change="getSearchResult()"
                                            class="form-control" style="display: block !important;">

                                        @foreach($makes as $make)
                                            <option value="{{$make->make}}">
                                                {{$make->make}}
                                            </option>

                                        @endforeach
                                    </select>

                                </div>


                            </div>

                            <div class="col-md-12">
                                <label>
                                    Location
                                </label>

                            </div>

                            <div class="col-md-6">


                                <div class="form-group">

                                 <label>Distance</label>

                                    <select disabled ng-model="products.terms.miles" ng-change="getSearchResult()"
                                            class="form-control" style="display: block !important;">


                                        <option>50 Miles</option>
                                        <option>100 Miles</option>
                                        <option>150 Miles</option>
                                        <option>200 Miles</option>
                                        <option>250 Miles</option>
                                        <option>300 Miles</option>








                                    </select>

                                </div>


                            </div>

                            <div class="col-md-6">


                                <div class="form-group">

                                    <label>Zip Code</label>


                                    <input disabled type="text" class="form-control" >

                                </div>


                            </div>



                        <!--  <div class="col-md-12">


                                <div class="form-group">

                                    <label>
                                        Size
                                    </label>

                                    <select ng-model="products.terms.size" ng-change="getSearchResult()"
                                            class="form-control" style="display: block !important;">

                                        @foreach($sizes as $size)
                                            <option value="{{$size->size}}">
                                                {{$size->size}}
                                            </option>

                                        @endforeach
                                    </select>

                                </div>


                            </div>

                            <div class="col-md-12">


                                <div class="form-group">

                                    <label>
                                        Color
                                    </label>

                                    <select ng-model="products.terms.color" ng-change="getSearchResult()"
                                            class="form-control" style="display: block !important;">

                                        @foreach($colors as $color)
                                            <option value="{{$color->color}}">
                                                {{$color->color}}
                                            </option>

                                        @endforeach
                                    </select>

                                </div>


                            </div> -->





                        </div>


                    </div>

                    <div class="card-footer">

                        <button class="btn btn-block btn-black "><i
                                    class="fa
                            fa-search"></i>
                           Search
                        </button>


                    </div>

                </form>

            </div>


        </div>

        <div class="col-md-9">

            <div class="card">

                <div class="card-header">


                    <div class="col-md-3">

                        <p class="font-weight-bold text-sm float-left"><i class="fa fa-bars"></i>&nbsp; Search Results</p>


                    </div>

                    <div class="offset-md-6 col-md-3 float-right">

                        <div class="form-group form-inline">

                            <label>Sort by &nbsp;</label>
                            <select ng-model="products.terms.order" ng-change="getSearchResult()"
                                    class="form-control form-inline float-right" style="display: block
                                                !important;">
                                <option value="asc">Oldest </option>

                                <option value="desc">Newest </option>


                            </select>

                        </div>

                    </div>


                </div>
                <div class="card-body">


                    <div class="row" >

                        <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-3" ng-repeat="x in products.data track by
 $index">



                            <div class="card">

                                <div class="card-body overflow-hidden" style="height: 360px !important;">


                                    <div class="row mb-2">

                                        <div class=" col-md-12">

                                            <div class="row d-block d-sm-none " style="padding: 10px !important;
                                            margin: 0
                                            !important;">
                                                <a href="{{route('buyer.product.details')}}?upc_product_code=@{{ x.upc_product_code}}" >
                                                    <center>
                                                        <div  class="col-12  rounded
                                                    z-depth-2
                                                    zoom
                                                    hoverable" style="height: 250px!important; width:300px!important;background-image: url('{{url('storage/app')}}/@{{ x.images[0].file_path}}') ;background-size:cover !important ;background-position:center center !important;" >

                                                        </div>
                                                    </center>

                                                </a>
                                            </div>

                                            <div class="row  d-none d-sm-block  " style="padding: 0px !important;
                                            margin: 0
                                            !important;margin-bottom: 15px !important;">
                                                <a href="{{route('buyer.product.details')}}?upc_product_code=@{{ x.upc_product_code}}" >
                                                  <center>
                                                      <div  class="col-12 mb-2  rounded
                                                    z-depth-2
                                                    zoom
                                                    hoverable" style="height: 200px
                                                            !important;
                                                            width:260px!important;background-image: url('{{url
                                                            ('storage/app')}}/@{{ x.images[0].file_path}}') ;background-size:cover !important ;
                                                            background-position:center center !important;
                                                            " >

                                                    </div>
                                                  </center>

                                                </a>
                                            </div>

                                            <div class="row ">

                                                    <div class="col-md-12 flex-center">

                                                        <br/>
                                                        <p class="text-sm text-left font-weight-bold">@{{ x.category}} : @{{ x.product_title }}</p>

                                                    </div>

                                                    <div class="col-md-12 flex-center">


                                                        <p class=" text-sm text-left">Price : $@{{ x.price}} USD</p>

                                                    </div>

                                                    <div class="col-md-12 flex-center">


                                                        <p class=" text-sm text-left"> @{{ x.make }} / @{{ x.model }}/ @{{ x.size }} / @{{ x.condition }}</p>

                                                    </div>




                                            </div>



                                        </div>


                                    </div>


                                </div>

                                <div class="card-footer">

                                    <div class="col-md-12 flex-center" style="padding: 0 !important;margin: 0 !important;">


                                        <a href="{{route('buyer.product.details')
                                            }}?upc_product_code=@{{ x
                                            .upc_product_code
                                    }}" class="btn
                                    btn-grey  btn-sm float-left
                                   ">
                                            View details <i class="fa fa-angle-right"></i>
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



@endsection