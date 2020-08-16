@extends('admin.layout')

@section('content')

    <div class="row">

        <div class="col-12">







            <div class="card mb-5">

                <div class="card-header">

                    <p class="font-weight-bold"> Manage Sellers</p>

                </div>
                <div class="card-header">

                    <button class="danger-color"><a href="{{route('admin.sellers.delete')}}" style="color: white">Delete All Sellers</a></button>

                </div>

                <div class="card-body">


                    <div class="row">

                        <div class="col-12">

                            <div class="table-responsive">

                                <table class="table table-bordered">

                                    <thead>

                                    <tr>

                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Company</th>
                                        <th>Email</th>
                                        <th>Cell No</th>
                                        <th>Negotiation Mode</th>
                                        <th>Delete</th>

                                    </tr>

                                    </thead>

                                    <tbody>


                                    @foreach($sellers as $seller)
                                        <tr>

                                            <td>{{$seller->id}}</td>
                                            <td>{{$seller->first_name}} {{$seller->last_name}}</td>
                                            <td>{{$seller->company_name}}</td>
                                            <td>{{$seller->email_address}}</td>
                                            <td>{{$seller->cell_no}}</td>
                                            <td>{{$seller->negotiation}}</td>

                                            <td>
                                                <a href="{{route('admin.seller.delete',['seller_id' => $seller->id ])}}"
                                                   onclick="return  confirm
                                                ('All data and ' +
                                                 'products of ' +
                                                 'this ' +
                                                 'seller ' +
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

                            {{$sellers->links()}}
                        </div>

                    </div>

                </div>

            </div>


        </div>


    </div>

@endsection
