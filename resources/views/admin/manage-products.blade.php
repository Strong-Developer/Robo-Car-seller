@extends('admin.layout')

@section('content')

    <div class="row">

        <div class="col-12">







            <div class="card mb-5">

                <div class="card-header">

                    <p class="font-weight-bold"> Manage Products</p>

                </div>
                <div class="card-header">

                    <button class="danger-color"><a href="{{route('admin.products.delete')}}" style="color: white">Delete All Products</a></button>

                </div>
                <div class="card-body">


                    <div class="row">

                        <div class="col-12">

                            <div class="table-responsive">

                                <table class="table table-bordered">

                                    <thead>

                                    <tr>

                                        <th>UPC</th>
                                        <th>Title</th>
                                        <th>Seller</th>
                                        <th>Category</th>
                                        <th>Special Deal Price</th>
                                        <th>Lowest Price</th>
                                        <th>Deal Expiry Date</th>
                                        <th>Delete</th>

                                    </tr>

                                    </thead>

                                    <tbody>


                                    @foreach($products as $product)
                                        <tr>

                                            <td>{{$product->upc_product_code}}</td>
                                            <td>{{$product->product_title}} </td>
                                            <td>{{$product->seller->email_address}}</td>
                                            <th>{{$product->category}}</th>
                                            <td>{{$product->special_deal_price}}</td>
                                            <td>{{$product->lowest_price}}</td>
                                            <td>{{$product->deal_expiry_date}}</td>

                                            <td>
                                                <a href="{{route('admin.product.delete',['id' => $product->id ])}}"
                                                   onclick="return  confirm
                                                ('All data  of ' +
                                                 'this ' +
                                                 'product ' +
                                                 'will' +
                                                 ' be deleted , are you sure to perform this action ?')" class="btn
                                                 btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach


                                    </tbody>
                                </table>

                            </div>

                            {{$products->links()}}
                        </div>

                    </div>

                </div>

            </div>


        </div>


    </div>

@endsection
