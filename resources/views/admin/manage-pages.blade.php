@extends('admin.cms.layout')

@section('content')

    <div class="row">

        <div class="col-12">







            <div class="card mb-5">

                <div class="card-header">

                    <p class="font-weight-bold float-left"> Manage Pages</p>

                    <a class="btn btn-primary float-right" href="{{route('admin.cms.edit_page',['post_type' =>
                    'header'])}}">Edit Header</a>
                    <a class="btn btn-primary float-right" href="{{route('admin.cms.edit_page',['post_type' =>
                    'footer'])}}">Edit Footer</a>
                    <a class="btn btn-primary float-right" href="{{route('admin.cms.create_page')}}">Create New Page</a>
                </div>

                <div class="card-body">


                    <div class="row">

                        <div class="col-12">

                            <div class="table-responsive">

                                <table class="table table-bordered">

                                    <thead>

                                    <tr>

                                        <th>Page ID</th>
                                        <th>Name</th>
                                        <th>Created at </th>
                                        <th>Last updated at </th>


                                        <th>Preview</th>
                                        <th>Edit</th>

                                        <th>Delete</th>

                                    </tr>

                                    </thead>

                                    <tbody>


                                    @foreach($pages as $page)

                                        <tr>
                                           <td>{{$page->id}}</td>
                                            <td>{{$page->name}}</td>
                                            <td>{{$page->created_at}}</td>
                                            <td>{{$page->updated_at}}</td>

                                            <td>
                                                @if($page->deletable != null)
                                                <a class="btn btn-success" href="{{route('page.custom',['page_url' =>
                                                 $page->page_url])}}" target="_blank">

                                                    Preview

                                                </a>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('admin.cms.edit_page',['post_type' => 'page' ,
                                                'post_id'
                                                 =>
                                                $page->id ])}}"
                                                   class="btn btn-primary"
                                                >
                                                    Edit
                                                </a>
                                            </td>
                                            <td>
                                                <a onclick="return confirm('Are you sure to delete this page ?')"
                                                   href="{{route
                                                ('admin.cms.edit_page',
                                                ['action'
                                                 =>
                                                'delete',
                                                'page_id' => $page->id ])}}"
                                                   class="btn btn-danger"
                                                >
                                                    Delete
                                                </a>
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
