@extends('backend.app')
@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="{{route('home')}}"><b>Gens Uk</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Change Password </p>

                {{--                <form action="../../index3.html" method="post">post--}}
                {!! Form::open(['route'=>'password.reset','method'=>'post']) !!}
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
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @if ($errors->has('confirmpassword'))
                        <span class="text-danger">{{ $errors->first('confirmpassword') }}</span>
                    @endif
                </div>
                <div class="row">

                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Change Password</button>
                    </div>
                    <!-- /.col -->
                </div>
            {{--                </form>--}}
            {{ Form::hidden('token', $tokenData->token) }}
            {{ Form::close() }}

            <!-- /.social-auth-links -->



            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
@endsection
