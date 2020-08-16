@extends('layout-old')

@section('content')


    <div class="row">


        <div class="offset-md-3 col-md-6">

            <div class="card">

                <div class="card-header">



                    <p class="font-weight-bold"><i class="fa fa-user"></i>&nbsp; Login</p>


                </div>

                <form action="{{route('login.submit')}}" method="post">{{csrf_field()}}
                    <div class="card-body">


                        <div class="row">

                            <div class="col-md-12">

                                {{\App\Http\Controllers\PagesHandler::notification()}}
                                <div class="md-form">

                                    <input type="email" name="email" placeholder="Enter email address" class="form-control">

                                </div>

                            </div>

                            <div class="col-md-12">

                                <div class="md-form">

                                    <input type="password" name="password" placeholder="Enter password" class="form-control">

                                </div>

                            </div>

                        </div>


                    </div>

                    <div class="card-footer">

                        <button  class="btn btn-lg btn-grey btn-block btn-black "><i
                                    class="fa
                            fa-lock"></i>
                            Login
                        </button>


                    </div>

                </form>

            </div>


        </div>


    </div>



@endsection