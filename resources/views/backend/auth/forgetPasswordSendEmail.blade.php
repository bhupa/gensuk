@extends('backend.app')
@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="{{route('home')}}"><b>Gens Uk</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Forget Password </p>

                {{--                <form action="../../index3.html" method="post">post--}}
                {!! Form::open(['route'=>'password.email','method'=>'post']) !!}


                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! \Session::get('success') !!}</li>
                        </ul>
                    </div>
                @endif
                @if (Session::has('flash_error'))
                    <div class="alert alert-danger alert-styled-left alert-arrow-left alert-bordered">
                        {{ Session::get('flash_error') }}
                    </div>
                @endif
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <!-- /.col -->
                    <div class="col-12 mb-4">
                        <button type="submit" class="btn btn-primary btn-block">Send Your Email</button>
                    </div>

                    <!-- /.col -->
                </div>
            {{--                </form>--}}

            {{ Form::close() }}

            <!-- /.social-auth-links -->

                <div class="row">

                    <!-- /.col -->

                    <div class="col-12 mb-4">
                        <a href="{{route('login')}}" class="btn btn-success btn-block">Login</a>
                    </div>
                    <!-- /.col -->
                </div>

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
@endsection
