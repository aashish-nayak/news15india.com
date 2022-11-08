@extends('layouts.backpanel.master')
@section('title', 'Complaints')
@push('css')
<style>
    .reply-date {
    background-color: #f7f7f7;
    position: absolute;
    top: -10px;
    padding: 0px 5px;
    font-size: 13px;
}
</style>
@endpush
@section('sections')
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="card mt-2">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="col-md-6">
                        <h5 class="card-title m-0 d-flex align-items-center"><i class="bx bx-message-square-edit fs-3 mt-1 me-2"></i>
                            <span>View Complaint</span>
                        </h5>
                    </div>
                    <div class="col-md-auto col-12">
                        <a type="button" class="view-actions btn btn-sm btn-secondary me-2 px-3"  data-bs-toggle="modal" data-bs-target="#replyModal">Reply</a>
                        <a type="button" class="view-actions btn btn-sm btn-secondary me-2 px-3">Print</a>
                        <a href="{{ route('admin.complaint.index') }}" class="view-actions btn btn-sm btn-secondary px-3">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Complaint Number :</label>
                            <div class="input-group input-group-sm">
                                {{-- <span class="input-group-text rounded-0" ><i class="bx bx-calendar"></i></span> --}}
                                <div class="preview-content form-control rounded-0">{{$complaint->complaint_id}}</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Complaint Date :</label>
                            <div class="input-group input-group-sm">
                                <span class="input-group-text rounded-0" ><i class="bx bx-calendar"></i></span>
                                <div class="preview-content form-control rounded-0">{{\Carbon\Carbon::create($complaint->created_at)->format('d-m-Y')}}</div>
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="form-label">Complaint Status :</label>
                            <div class="input-group input-group-sm">
                                <div class="preview-content form-control rounded-0">{{ucwords($complaint->status)}}</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Status Date :</label>
                            <div class="input-group input-group-sm">
                                <span class="input-group-text rounded-0" ><i class="bx bx-calendar"></i></span>
                                <div class="preview-content form-control rounded-0">{{\Carbon\Carbon::create($complaint->updated_at)->format('d-m-Y')}}</div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Name Of Complainant :</label>
                            <div class="input-group input-group-sm"> 
                                <span class="input-group-text rounded-0"><i class="bx bx-user"></i></span>
                                <div class="preview-content form-control rounded-0">{{$complaint->name}}</div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Mobile Number :</label>
                            <div class="input-group input-group-sm"> 
                                <span class="input-group-text rounded-0"><i class="bx bx-phone-incoming"></i></span>
                                <div class="preview-content form-control rounded-0">{{$complaint->user->details->phone_number}}</div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">E-Mail :</label>
                            <div class="input-group input-group-sm"> 
                                <span class="input-group-text rounded-0"><i class="bx bx-envelope"></i></span>
                                <div class="preview-content form-control rounded-0">{{$complaint->user->email}}</div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">City :</label>
                            <div class="input-group input-group-sm"> 
                                <span class="input-group-text rounded-0"><i class="bx bx-map"></i></span>
                                <div class="preview-content form-control rounded-0">{{$complaint->user->details->city->name}}</div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Complaint Subject :</label>
                            <div class="input-group input-group-sm"> 
                                <span class="input-group-text rounded-0"><i class="bx bx-user"></i></span>
                                <div class="preview-content form-control rounded-0">{{$complaint->subject}}</div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">News Link, Advertisement Number, Survey Link :</label>
                            <div class="input-group input-group-sm"> 
                                <span class="input-group-text rounded-0"><i class="bx bx-link"></i></span>
                                <div class="preview-content form-control rounded-0"><a href="{{$complaint->link}}" target="_blank" rel="noopener noreferrer">{{$complaint->link}}</a></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="d-flex align-items-center justify-content-end">
                                <div class="form-check me-3">
                                    <input class="form-check-input @if($complaint->status == 'pending') bg-warning @else complaint_status @endif border-warning" data-url="{{route('admin.complaint.status')}}" data-id="{{$complaint->id}}" type="radio" name="status" @checked($complaint->status == 'pending') value="pending" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">Pending</label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input @if($complaint->status == 'process') bg-info @else complaint_status @endif border-info" data-url="{{route('admin.complaint.status')}}" data-id="{{$complaint->id}}" type="radio" name="status" @checked($complaint->status == 'process') value="process" id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">Process</label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input @if($complaint->status == 'solve') bg-success @else complaint_status @endif border-success" data-url="{{route('admin.complaint.status')}}" data-id="{{$complaint->id}}" type="radio" name="status" @checked($complaint->status == 'solve') value="solve" id="flexRadioDefault3">
                                    <label class="form-check-label" for="flexRadioDefault3">Solve</label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input @if($complaint->status == 'reject') bg-danger @else complaint_status @endif border-danger" data-url="{{route('admin.complaint.status')}}" data-id="{{$complaint->id}}" type="radio" name="status" @checked($complaint->status == 'reject') value="reject" id="flexRadioDefault4">
                                    <label class="form-check-label" for="flexRadioDefault4">Reject</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 my-3 position-relative">
                            <label for="inputAddress3" class="form-label custom-label-float">Full Complaint:</label>
                            <div class="preview-content form-control rounded-0 pt-4" style="height: 120px;overflow: hidden;">
                                {{$complaint->complaint_message}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if (!empty($complaint->replies))
            <div class="card mt-2">
                <div class="card-header">
                    <h6 class="card-title m-0 ">
                        <span>Complaint Replying Comments</span>
                    </h6>
                </div>
                <div class="card-body">
                    @foreach ($complaint->replies as $reply)
                    <div class="border-top position-relative mb-3 border-start border-end border-bottom">
                        <span class="reply-date border">{{($reply->reference->id == auth('admin')->id()) ? 'You' : 'User'}}</span>
                        <span class="reply-date border" style="right:0px">{{date('h:i A | d M y',strtotime($reply->created_at))}}</span>
                        <p class="my-3 px-3">{{$reply->reply}}</p>
                    </div>
                    @endforeach
                    <a type="button" class="btn btn-sm mt-3 py-0" style="font-size: 13px;background-color: #dddddd;" data-bs-toggle="modal" data-bs-target="#replyModal">
                        Reply
                    </a>
                </div>
            </div>
            @endif
        </div>
    </div>
    <form action="{{route('admin.complaint.store-reply')}}" method="post">
        <div class="modal fade" id="replyModal" tabindex="-1" aria-labelledby="replyModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="replyModalLabel">Reply</h5>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="complaint_id" value="{{$complaint->id}}">
                        <div class="form-group">
                            <textarea name="reply" id="" class="form-control" rows="6" placeholder="Write Your Reply"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@push('plugin-scripts')
@includeIf('components.datatable.common-module-script',[
    'deleteMessage' => "You Want to Delete this Complaint !",
    'deleteConfirmMessage' => "Yes, Delete it!",
])
<script>
    $(document).ready(function () {
        
        $(document).on('change',".complaint_status",function () {
            var element = $(this);
            var id = $(this).data('id');
            var status = $(this).val();
            var url = $(this).data('url')+'?id='+id+'&status='+status;
            $.ajax({
                type: "GET",
                url: url,
                beforeSend: function() {
                    $(element).prop('disabled',true);
                },
                success: function(response) {
                    $(element).prop('disabled',false);
                    if(response.success){
                        
                    }
                }
            });
        });
    });
</script>
@endpush
