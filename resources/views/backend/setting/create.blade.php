@extends('backend.home')
@section('title','Add-Setting')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('settings.index')}}"> View Setting </a></li>
                            <li class="breadcrumb-item active">Dashboard </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-8 ">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add Setting </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            {!! Form::open(['route'=>'settings.store','class'=>'needs-validation"','enctype'=>   "multipart/form-data"])!!}

                            <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Title</label>
                                        <input type="text" class="form-control" name="title" placeholder="Enter Title" value="{{old('title')}}">

                                        @if ($errors->has('title'))
                                            <span class="text-danger">{{ $errors->first('title') }}</span>
                                        @endif </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Value</label>
                                    <input type="text" class="form-control" name="value" placeholder="Enter Value" value="{{old('value')}}">

                                    @if ($errors->has('title'))
                                        <span class="text-danger">{{ $errors->first('value') }}</span>
                                    @endif </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                           {!! Form::close() !!}
                        </div>
                    </div>

                </div>

                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>


        @endsection
        @section('js_script')
            <script>
                $(document).ready( function () {
                    $('#upload-image').on('change',function(){

                        readImgUrlAndPreview(this);
                        function readImgUrlAndPreview(input){
                            $('#output').css('display','block');
                            $('.cover').css('display','block');
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    $('#output').attr('src', e.target.result);
                                }
                            };
                            reader.readAsDataURL(input.files[0]);
                        }
                    })

                    $('#clear-image').on('click',function(){
                        var logo = $('#upload-image-details').attr('data-logo');

                        if(logo == 1){
                            $('#upload-image-details').attr('data-image','0');
                            $( '#upload-image-details').css('margin-bottom','200px');
                        }
                        else{
                            $('#upload-image-details').attr('data-image','0');
                            $( '#upload-image-details').css('margin-bottom','0px');
                        }
                        $('#output').css('display','none');
                        $('.cover').css('display','none');
                        $('#output').attr('src', '');
                    })


                });
            </script>
@endsection
