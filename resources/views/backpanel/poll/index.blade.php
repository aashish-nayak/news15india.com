@extends('layouts.backpanel.master')
@section('title', 'Polls')
@push('css')
    <style>
        .poll-preview {
            height: 125px;
            max-height: 125px;
            max-width: 100%;
            min-height: 100px;
            min-width: 100%;
        }
        .option-vote{
            background-color:#cdcdcd;
            height:20px;
        }
    </style>
@endpush
@section('sections')
    <div class="col-12 mt-4 text-end">
        <a href="javascript:void(0)" class="btn btn-primary mr-3 btn-sm" data-bs-toggle="modal"
            data-bs-target="#exampleLargeModal">Create Poll</a>
        <a href="{{ route('admin.news.trash-news') }}" class="btn btn-danger mr-3 btn-sm">View Trash</a>
    </div>
    <div class="col-12 mt-2">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title m-0">Polls</h4>
            </div>
            <div class="card-body">
                <div class="">
                    <table id="poll"
                        class="w-100 table responsive display table-striped table-bordered align-middle border table-hover"
                        cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th data-priority="1">#</th>
                                <th data-priority="2">Survey_Date</th>
                                <th data-priority="3">Organized</th>
                                <th data-priority="4" data-width="35%" class="text-center">Question</th>
                                <th data-priority="5">Options</th>
                                <th data-priority="6">Votes</th>
                                <th data-priority="7">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($polls as $key=>$poll)
                                <tr>
                                    <td>{{ $poll->id }}</td>
                                    <td>{{ \Carbon\Carbon::parse($poll->starts_at)->format('d.m.Y') }}</td>
                                    <td>{{ $poll->organized_by }}</td>
                                    <td class="text-primary fw-bold text-center">{{ $poll->question }}</td>
                                    <td>
                                        @foreach ($poll->options as $option)
                                            <span class="badge bg-secondary">{{$option->name}}</span>
                                        @endforeach
                                    </td>
                                    <td>{{ $poll->votes->count() }}</td>
                                    <td>
                                        <div class="row row-cols-3 order-actions justify-content-center gap-1">
                                            <a href="{{$poll->lock_link}}" class="col text-dark border border-dark" title="Edit"><i class="bx bxs-show"></i></a>
                                            <a href="{{$poll->edit_link}}" class="col edit-category border border-dark" title="Edit"><i class="bx bxs-edit"></i></a>
                                            <form method="POST" action="{{ $poll->delete_link }}" class="col p-0">
                                                @csrf
                                                @method('delete')
                                                <a href="javascript:void(0)" onclick="event.preventDefault(); this.closest('form').submit();" class="delete text-danger border border-dark" title="Delete">
                                                    <i class="bx bxs-trash"></i>
                                                </a>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <form @if(!isset($edit)) action="{{route('admin.poll.store')}}" @else action="{{route('admin.poll.update',$edit->id)}}" @endif method="post">
        <div class="modal fade" id="exampleLargeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header py-0">
                        <h6 class="modal-title d-flex align-items-center">@if(isset($edit))<i class="bx bx-show fs-4 me-2"></i>  View Survey @else<i class="bx bx-edit fs-4 me-2"></i>  Add New Survey @endif</h6>
                        <a type="button" data-bs-dismiss="modal" aria-label="Close"><i class="bx bx-x fs-3"></i></a>
                    </div>
                    <div class="modal-body">
                        @csrf
                        @if(isset($edit))
                        @method('PATCH')
                        @endif
                        <h6 class="text-center py-1 fw-bold" style="border: 1px solid #c7c7c7be">RAJASTHAN ELECTION SURVEY 2022</h6>
                        <div class="row mt-3 justify-content-between align-items-center">
                            <div class="col-md-6 mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Survey Start Date :</label>
                                        <input type="date" required name="starts_at" class="form-control form-control-sm" value="@if(isset($edit)){{\Carbon\Carbon::parse($edit->starts_at)->format('Y-m-d')}}@else{{old('starts_at')}}@endif" />
                                        @error('starts_at')
                                            <span class="text-danger d-inline-flex text-capitalize" style="font-size: 11px">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Survey End Date :</label>
                                        <input type="date" required name="ends_at" class="form-control form-control-sm" value="@if(isset($edit)){{\Carbon\Carbon::parse($edit->ends_at)->format('Y-m-d')}}@else{{old('ends_at')}}@endif" />
                                        @error('ends_at')
                                            <span class="text-danger d-inline-flex text-capitalize" style="font-size: 11px">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 mb-3">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Survey Organized By :</label>
                                <select class="form-select form-select-sm" required name="organized_by" aria-label="Default select example">
                                    <option  @if(!isset($edit)) selected @endif disabled>Select One</option>
                                    @foreach ($creators as $creator)
                                    <option @if(isset($edit) && $edit->organized_by == $creator->name) selected @endif value="{{$creator->name}}">{{$creator->name}}</option>
                                    @endforeach
                                </select>
                                @error('organized_by')
                                    <span class="text-danger d-inline-flex text-capitalize" style="font-size: 11px">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-8 mb-3">
                                <label for="inputAddress3" class="form-label">Survey Question</label>
                                <textarea class="form-control" required name="question" id="inputAddress3" placeholder="Enter Question here" rows="4">@if(isset($edit)){{$edit->question}}@else{{old('question')}}@endif</textarea>
                                @error('question')
                                    <span class="text-danger d-inline-flex text-capitalize" style="font-size: 11px">{{$message}}</span>
                                @enderror
                                <label class="custom-label d-flex justify-content-start align-items-center d-none">
                                    <input id="canVisitors" checked name="canVisitorsVote" type="checkbox" class="hidden" value="0">
                                    <span class="ms-2">Allow guests to vote on the question</span><br>
                                </label>
                                @error('canVisitorsVote')
                                    <span class="text-danger d-inline-flex text-capitalize" style="font-size: 11px">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="preview-image-wrapper poll-preview cursor-pointer m-0" data-bs-toggle="modal" data-bs-target="#media-box">
                                    <img src="@if(isset($edit) && isset($edit->pollImage->filename)){{asset('storage/media/'.$edit->pollImage->filename)}}@else https://cms.botble.com/vendor/core/core/base/images/placeholder.png @endif" alt="Preview image" id="bannerPreview" style="width: 100%;height: inherit;object-fit: scale-down;" class="preview_image">
                                    <a href="javascript:void(0)" class="btn_remove_image" id="removeBanner" title="Remove image">X</a>
                                </div>
                                <input type="hidden" required name="image" id="bannerId" value="@if(isset($edit)){{$edit->image}}@else{{old('image')}}@endif">
                                @error('image')
                                    <span class="text-danger d-inline-flex text-capitalize" style="font-size: 11px">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label class="form-label mb-1">Option A</label>
                                <div class="input-group input-group-sm"> <span class="input-group-text px-3 rounded-0" id="inputGroup-sizing-sm">1</span>
                                    <input type="text" required name="options[]" value="@if(isset($edit)){{$edit->options[0]->name}}@elseif(isset(old('options')[0])){{old('options')[0]}}@endif" class="form-control rounded-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                                <div class="border mt-1 position-relative d-none">
                                    <div class="option-vote" style="width:74%">
                                        <div class="d-flex align-items-center justify-content-center position-absolute top-0 left-0 w-100">
                                            <span class="text-dark me-2">566 Vote</span> <span class="text-dark">(74%)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label class="form-label mb-1">Option B</label>
                                <div class="input-group input-group-sm"> <span class="input-group-text px-3 rounded-0" id="inputGroup-sizing-sm">2</span>
                                    <input type="text" required name="options[]" value="@if(isset($edit)){{$edit->options[1]->name}}@elseif(isset(old('options')[1])){{old('options')[1]}}@endif" class="form-control rounded-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                                <div class="border mt-1 position-relative d-none">    
                                    <div class="option-vote" style="width:56%">
                                        <div class="d-flex align-items-center justify-content-center position-absolute top-0 left-0 w-100">
                                            <span class="text-dark me-2">12 Vote</span> <span class="text-dark">(7%)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label class="form-label mb-1">Option C</label>
                                <div class="input-group input-group-sm"> <span class="input-group-text px-3 rounded-0" id="inputGroup-sizing-sm">3</span>
                                    <input type="text" required name="options[]" value="@if(isset($edit)){{$edit->options[2]->name}}@elseif(isset(old('options')[2])){{old('options')[2]}}@endif" class="form-control rounded-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                                <div class="border mt-1 position-relative d-none">    
                                    <div class="option-vote" style="width:25%">
                                        <div class="d-flex align-items-center justify-content-center position-absolute top-0 left-0 w-100">
                                            <span class="text-dark me-2">123 Vote</span> <span class="text-dark">(21%)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label class="form-label mb-1">Option D</label>
                                <div class="input-group input-group-sm"> <span class="input-group-text px-3 rounded-0" id="inputGroup-sizing-sm">4</span>
                                    <input type="text" required name="options[]" value="@if(isset($edit)){{$edit->options[3]->name}}@elseif(isset(old('options')[3])){{old('options')[3]}}@endif" class="form-control rounded-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                                <div class="border mt-1 position-relative d-none">    
                                    <div class="option-vote" style="width:19%">
                                        <div class="d-flex align-items-center justify-content-center position-absolute top-0 left-0 w-100">
                                            <span class="text-dark me-2">88 Vote</span> <span class="text-dark">(19%)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Publish</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @include('backpanel.includes.media-model')
@endsection
@push('scripts')
@include('backpanel.includes.media-model-script')
@if($errors->any() || isset($edit))
    <script>
        $(document).ready(function () {
            $("#exampleLargeModal").modal('show');
        });
    </script>
@endif
@isset($edit)
<script>
    $(document).ready(function () {
        var myModalEl = document.getElementById('exampleLargeModal')
        myModalEl.addEventListener('hidden.bs.modal', function (event) {
            location.href= "{{route('admin.poll.index')}}";
        });
    });
</script>
@endisset
<script>
    $(document).ready(function() {
        $('#poll').DataTable();
    });
</script>
@endpush
