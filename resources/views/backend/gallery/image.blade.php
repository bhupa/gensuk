@extends('backend.home')
@section('title','Gallerys-Lists')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{!! \Session::get('success') !!}</li>
                                </ul>
                            </div>

                        @endif
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('gallerys.index')}}">Gallery Album</a></li>
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
{{--                <div class="single-table">--}}


{{--                <div class="row justify-content-center">--}}

{{--                            @if($images->isNotEmpty())--}}
{{--                        <div class="col-10" >--}}

{{--                            <div class="row">--}}
{{--                                @foreach($images as $image)--}}

{{--                                    <div class="col-4">--}}
{{--                                        <div class="card">--}}
{{--                                                                                        <div class="card-img-actions m-1">--}}
{{--                                                                                            <img class="card-img img-fluid" src="{{ asset('storage/'.$image->image) }}" alt=""--}}
{{--                                                                                                 style="width: 300px; height:150px;">--}}
{{--                                                                                            <div class="card-img-actions-overlay card-img">--}}
{{--                                                                                                <a href="{{ asset('storage/'.$image->image) }}"--}}
{{--                                                                                                   class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round"--}}
{{--                                                                                                   data-popup="lightbox" rel="group">--}}
{{--                                                                                                    <i class="fa fa-eye"></i>--}}
{{--                                                                                                </a>--}}

{{--                                                                                                <a href="javascript:void(0)" data-type="{{ $image->id  }}" data-gallery = "{{ $gallery->id }}"--}}
{{--                                                                                                   class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round ml-2 delete-galleries-image">--}}
{{--                                                                                                    <i class="fa fa-trash"></i>--}}

{{--                                                                                                </a>--}}
{{--                                                                                            </div>--}}
{{--                                                                                        </div>--}}


{{--                                    </div>--}}
{{--                                </div>--}}


{{--                                @endforeach--}}
{{--                            </div>--}}
{{--                         </div>--}}
{{--                            @else--}}

{{--                                    <div class="col-sm-10 col-lg-10">--}}
{{--                                        <div class="card">--}}
{{--                                            <p style="text-align: center; padding:50px 50px;">--}}
{{--                                            Sorry, no image has been uploaded yet.--}}
{{--                                            </p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}


{{--                            @endif--}}
{{--                        </div>--}}


{{--                </div>--}}
                <!-- /.row -->
    <div class="row">
        <!-- table primary start -->
        <div class="col-lg-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">View Gallery Images</h4>
                    <a href="{{route('gallery-image.create',[$gallery->slug])}}" class="btn btn-success float-right" style="margin-top: -44px;display: inline-block;margin-bottom: 22px;">Upload Images</a>
                    <div class="single-table">
                        <div class="row">
                            <div class="panel panel-flat">


                                <div class="panel-body gallery">

                                    <div class="row">
                                        @if($images->isNotEmpty())
                                            @foreach($images as $image)
                                               <div class=" col-3" id="imageItem-{{$image->id}}">
                                            <div class="card">
                                                <div class="card-img-actions m-1">
                                                    <img class="card-img img-fluid" src="{{asset('storage/'.$image->image)}}"  alt="{{$image->gallery->title}}" style="width: 300px; height:150px;">

                                                        <div class="card-img-actions-overlay card-img">
                                                            <a href="{{asset('storage/'.$image->image)}}" data-toggle="lightbox" data-gallery="gallery" class=" gallery-image btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round">

{{--                                                            <a href="{{asset('storage/'.$image->image)}}" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round" data-popup="lightbox" rel="group">--}}
                                                            <i class="fa fa-eye"></i>
                                                        </a>

                                                        <a href="javascript:void(0)" data-type="{{$image->id}}" data-gallery="{{$image->id}}" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round ml-2 delete-galleries-image">
                                                            <i class="fa fa-trash"></i>

                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            @endforeach
                                        @else
                                            <div class="card">
                                               <p style="display: block;text-align: center;padding:50px 50px;">Sorry, no image has been uploaded yet.</p>
                                            </div>
                                        @endif

                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- table primary end -->
        <!-- table success start -->

        <!-- Contextual Classes end -->
    </div>

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>

@endsection
@section('js_script')
    <script>
        $(document).ready( function () {

            $('.gallery').on('click','.delete-galleries-image',function(event){
                event.preventDefault();
                $object = $(this);
                console.log($object);
                var id  = $(this).attr('data-type');
                var gallery = $object.data('gallery');
                swal({
                    title: 'Are you sure?',
                    text: 'You will not be able to recover this !',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, keep it'
                }).then((result) => {
                    if (result.value
                    )
                    {

                        $.ajax({
                            type: "Delete",
                            url: baseUrl + "/gallery/image" + "/" + gallery + "/" + id,
                            data: {
                                id: id,
                                _method: 'DELETE'
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function (response) {
                                swal("Deleted!", response.message, "success");


                                $('#imageItem-'+id).remove();
                            },
                            error: function (e) {
                                if (e.responseJSON.message) {
                                    swal('Error', e.responseJSON.message, 'error');
                                } else {
                                    swal('Error', 'Something went wrong while processing your request.', 'error')
                                }
                            }
                        });
                    }
                })
            })





        });

    </script>
@endsection
