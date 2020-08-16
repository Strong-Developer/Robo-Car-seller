@extends('admin.layout')

@section('content')

    <div class="row">

        <div class="col-12">



            <div class="card mb-5">

                <div class="card-header">

                    <p class="font-weight-bold">Add categories</p>

                </div>

                <div class="card-body">

                    <form class="row" method="post" action="{{route('admin.category.add')}}"> {{csrf_field()}}

                        <div class="col-12">
                            <div class="form-group">

                                <label>Enter categories separated by ( | )</label>

                                <textarea required name="categories" class="md-textarea form-control"></textarea>

                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">

                                <button type="submit" class="btn btn-blue disabled float-right">
                                    Add
                                </button>

                            </div>
                        </div>

                    </form>

                </div>

            </div>




            <div class="card mb-5">

                <div class="card-header">

                    <p class="font-weight-bold"> Categories added</p>

                </div>

                <div class="card-body">


                    <div class="row">

                        <div class="col-12">

                            <div class="table-responsive">

                                <table class="table table-bordered">

                                    <thead>

                                    <tr>

                                        <th>Name</th>
                                        <th>Added at</th>
                                        <th>Edit</th>
                                        <th>Delete</th>

                                    </tr>

                                    </thead>

                                    <tbody>

                                    @foreach($categories as $category)

                                        <tr>

                                            <td>{{$category->name}}</td>
                                            <td>{{$category->created_at->diffForHumans()}}</td>

                                            <td>

                                                <a href="{{route('admin.category.edit',['cat_id' => $category->id ])
                                                }}"
                                                   class="btn btn-blue">

                                                    <i class="fa fa-edit"></i>

                                                </a>

                                            </td>

                                            <td>

                                                <form action="{{route('admin.category.delete')}}" method="post">
                                                    {{csrf_field()}}

                                                    <input type="hidden" name="cat_id" value="{{$category->id}}">
                                                    <button class="btn btn-danger" type="submit" onclick="return    confirm('Are you sure to delete this category ?')">

                                                        <i class="fa fa-trash"></i>

                                                    </button>

                                                </form>

                                            </td>

                                        </tr>


                                    @endforeach
                                    </tbody>
                                </table>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


        </div>


    </div>

@endsection
