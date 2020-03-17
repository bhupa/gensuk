<div class="modal fade" id="contact-emails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Contact Reply Email</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->

                    <div class="card-footer p-0">
                        {!! Form::open(['route'=>'contacts.store','class'=>'needs-validation"','enctype'=>   "multipart/form-data"])!!}

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">To</label>
                                <input type="text" class="form-control" name="email" id="validationCustom01" placeholder="Email" value="{{ $contact->email}}" >
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Description</label>
                                {!! Form::textarea('description', null, ['class'=>'form-control wt-resize editor']) !!}
                                @if ($errors->has('description'))
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
                            </div>

                        </div>

                        {{Form::hidden('id',$contact->id)}}





                        <div class="form-row">
                        </div>


                        <button class="btn btn-primary" type="submit">Submit form</button>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
