@extends('backend.home')
@section('title','Add-Gallery')
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
                            <li class="breadcrumb-item"><a href="{{route('gallerys.index')}}"> View Gallery</a></li>
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
                                <h3 class="card-title">Add Gallery</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            {!! Form::open(['route'=>'gallerys.store','class'=>'needs-validation"','enctype'=>   "multipart/form-data"])!!}

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Title</label>
                                    <input type="text" class="form-control" name="title" placeholder="Enter Title" value="{{old('title')}}">

                                    @if ($errors->has('title'))
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    @endif </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Upload Image</label>
                                    <div class="upload-btn-wrapper">
                                        <button type="button" class="btn">Upload a file</button>
                                        <input type="file" class="form-control" accept="image/*" id="upload-image" name="image">

                                    </div>
                                    @if ($errors->has('image'))
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                    @endif
                                    <div class="cover">
                                        <a href="#">

                                            <img id="output" title="click to delete image" data-toggle="tooltip">

                                        </a>
                                        <div class="details">
                                            <a href="javascript:void(0)" id="clear-image"><i class="fa fa-trash"></i></a>
                                        </div>

                                    </div>
                                </div>

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
