@extends('backend.dashboard')
@section('title','Edit-teams')
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
                            <li class="breadcrumb-item"><a href="{{route('teams.index')}}"> View Executive Committee</a></li>
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
                                <h3 class="card-title">Add Content Banner</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            {!! Form::model($teams,['route'=>['teams.update',$teams->id],'class'=>'needs-validation','method'=>'PUT','enctype'=>   "multipart/form-data"])!!}

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter Name" value="{{$teams->name}}">

                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Date</label>
                                    <input class="form-control enchilada" type="date"  name="date" data-placeholder="Start Date" placeholder="2018-03-05" id="datepicker" value="{{ $teams->date }}">
                                    @if ($errors->has('date'))
                                        <span class="text-danger">{{ $errors->first('date') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Position</label>
                                    <input type="text" class="form-control" name="position" placeholder="Enter Position" value="{{$teams->position}}">

                                    @if ($errors->has('position'))
                                        <span class="text-danger">{{ $errors->first('position') }}</span>
                                    @endif </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter Email" value="{{$teams->email}}">

                                    @if ($errors->has('twitter'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Facebook</label>
                                    <input type="text" class="form-control" name="facebook" placeholder="Enter Facebook" value="{{$teams->facebook}}">

                                    @if ($errors->has('facebook'))
                                        <span class="text-danger">{{ $errors->first('facebook') }}</span>
                                    @endif </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Twitter</label>
                                    <input type="text" class="form-control" name="twitter" placeholder="Enter Twitter" value="{{$teams->twitter}}">

                                    @if ($errors->has('twitter'))
                                        <span class="text-danger">{{ $errors->first('twitter') }}</span>
                                    @endif </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Instagram</label>
                                    <input type="text" class="form-control" name="insta" placeholder="Enter Instagram" value="{{$teams->insta}}">

                                    @if ($errors->has('twitter'))
                                        <span class="text-danger">{{ $errors->first('insta') }}</span>
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
                                    <div class="cover edit-cover" >
                                        <a href="#">
                                            @if(file_exists('storage/'.$teams->image) && $teams->image != '')
                                                <img id="edit-logo-output"
                                                     src="{{asset('storage/'.$teams->image)}}"
                                                     title="{{$teams->name}}"
                                                     data-toggle="tooltip"/>

                                            @endif

                                            <img id="output" title="click to delete image" data-toggle="tooltip">

                                        </a>
                                        <div class="details edit-delete-img">
                                            <a href="javascript:void(0)" id="clear-image"><i class="fa fa-trash"></i></a>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Short Description</label>
                                    {{Form::textarea('short_description',$teams->short_description,['class'=>'form-control','id'=>'short_description'])}}
                                    {{--                                        <textarea class="form-control" rows="3" placeholder="Enter ..." style="margin-top: 0px; margin-bottom: 0px; height: 115px;"></textarea>--}}
                                    @if ($errors->has('short_description'))
                                        <span class="text-danger">{{ $errors->first('short_description') }}</span>
                                    @endif
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            {{Form::hidden('id',$teams->id)}}
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
                    $('#edit-logo-output').css('display','none');
                    $('.edit-delete-img').css('display','block');
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
                $('#edit-logo-output').css('display','block');;
                $('.edit-delete-img').css('display','none');
                $('#output').css('display','none');


            })


        });
    </script>
@endsection
