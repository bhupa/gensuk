@extends('backend.app')
@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="{{route('home')}}"><b>Gens Uk</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in </p>

{{--                <form action="../../index3.html" method="post">post--}}
                {!! Form::open(['route'=>'login','method'=>'post']) !!}
                @if (Session::has('success'))
                    <div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
                        {{ Session::get('success') }}
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
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
{{--                </form>--}}

                {{ Form::close() }}

                <!-- /.social-auth-links -->

                <p class="mb-1">
                    <a href="{{route('password.reset')}}">I forgot my password</a>
                </p>

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
@endsection
