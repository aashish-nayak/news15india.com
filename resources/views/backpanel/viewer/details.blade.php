@extends('layouts.backpanel.master')
@section('title', 'User Details')
@push('plugin-css')
@endpush
@section('sections')
    <div class="col-12">
        <div class="card mt-2">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="col-md-6">
                    <h5 class="card-title m-0 d-flex align-items-center"><i class="bx bx-message-square-edit fs-3 mt-1 me-2"></i>
                        <span>User Details</span>
                    </h5>
                </div>
                <div class="col-md-auto col-12">
                    <a type="button" class="view-actions btn btn-sm btn-secondary me-2 px-3">Print</a>
                    @if ($page == 'index')
                    <a href="{{route('admin.viewer.delete',$data->id)}}" class="view-actions btn btn-sm btn-danger me-2 px-3">Block</a>
                    @else
                    <a href="{{route('admin.viewer.restore',$data->id)}}" class="view-actions btn btn-sm btn-primary me-2 px-3">Restore</a>
                    <a href="{{route('admin.viewer.destroy',$data->id)}}" class="view-actions btn btn-sm btn-danger me-2 px-3">Delete</a>
                    @endif
                    <a href="{{route('admin.viewer.index')}}" class="view-actions btn btn-sm btn-secondary px-3">Back</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md-9">
                        <div class="row align-items-center">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Name :</label>
                                <div class="input-group input-group-sm"> 
                                    <span class="input-group-text rounded-0"><i class="bx bx-user"></i></span>
                                    <div class="preview-content form-control rounded-0">{{$data->name}}</div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">E-Mail :</label>
                                <div class="input-group input-group-sm"> 
                                    <span class="input-group-text rounded-0"><i class="bx bx-envelope"></i></span>
                                    <div class="preview-content form-control rounded-0">{{$data->email}}</div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Mobile Number :</label>
                                <div class="input-group input-group-sm"> 
                                    <span class="input-group-text rounded-0"><i class="bx bx-phone-incoming"></i></span>
                                    <div class="preview-content form-control rounded-0">{{$data->details->phone_number ?? '--'}}</div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Mobile Number :</label>
                                <div class="input-group input-group-sm"> 
                                    <span class="input-group-text rounded-0"><i class="lni lni-whatsapp"></i></span>
                                    <div class="preview-content form-control rounded-0">{{$data->details->whatsapp_number ?? '--'}}</div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Pincode :</label>
                                <div class="input-group input-group-sm"> 
                                    <span class="input-group-text rounded-0"><i class="bx bx-map"></i></span>
                                    <div class="preview-content form-control rounded-0">{{$data->details->zip ?? '--'}}</div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">City :</label>
                                <div class="input-group input-group-sm"> 
                                    <span class="input-group-text rounded-0"><i class="bx bx-map"></i></span>
                                    <div class="preview-content form-control rounded-0">{{$data->details->city->name ?? '--'}}</div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">State :</label>
                                <div class="input-group input-group-sm"> 
                                    <span class="input-group-text rounded-0"><i class="bx bx-map"></i></span>
                                    <div class="preview-content form-control rounded-0">{{$data->details->state->name ?? '--'}}</div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Country :</label>
                                <div class="input-group input-group-sm"> 
                                    <span class="input-group-text rounded-0"><i class="bx bx-map-alt"></i></span>
                                    <div class="preview-content form-control rounded-0">{{$data->details->country->name ?? '--'}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <img src="{{$data->getAvatar()}}" class="img-fluid w-100 border" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('plugin-scripts')
@endpush
