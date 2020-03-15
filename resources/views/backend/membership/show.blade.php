<div class="modal fade" id="membership-details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">membership Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->

                    <div class="card-footer p-0">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="javascript:void(0)" class="nav-link">
                                    Name <span class="float-right badge bg-primary">{{$membership->name}}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0)" class="nav-link">
                                    Mobile <span class="float-right badge bg-info">{{$membership->mobile}}</span>
                                </a>
                            </li><li class="nav-item">
                                <a href="javascript:void(0)" class="nav-link">
                                    Telephone <span class="float-right badge bg-info">{{$membership->telephone}}</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="javascript:void(0)" class="nav-link">
                                    Email <span class="float-right badge bg-success">{{$membership->email}}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0)" class="nav-link">
                                    Address <span class="float-right badge bg-success">{{$membership->address}}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0)" class="nav-link">
                                    Postal Code <span class="float-right badge bg-success">{{$membership->postal_code}}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0)" class="nav-link">
                                    Dob <span class="float-right badge bg-success">{{$membership->dob}}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0)" class="nav-link">
                                    Fee <span class="float-right badge bg-success">{{$membership->fee}}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0)" class="nav-link">
                                    Membership <span class="float-right badge bg-success">{{$membership->membership}}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0)" class="nav-link">
                                    Gender <span class="float-right badge bg-success">{{$membership->gender}}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0)" class="nav-link">
                                    Message
                                </a>
                                <p style="padding: 20px 20px;">{{$membership->message}}</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
