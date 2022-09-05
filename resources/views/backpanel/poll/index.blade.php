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
            data-bs-target="#exampleLargeModal">Create Survey</a>
    </div>
    <div class="col-12 mt-2">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title m-0 d-flex align-items-center"><i class="bx bx-poll me-2" style="font-size: 30px"></i> All Surveys</h4>
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
                                <th data-priority="5">Option-A</th>
                                <th data-priority="5">Option-B</th>
                                <th data-priority="5">Option-C</th>
                                <th data-priority="5">Option-D</th>
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
                                    @foreach ($poll->options as $option)
                                    <td>
                                        {{$option->name}}
                                    </td>
                                    @endforeach
                                    <td>{{ $poll->votes->count() }}</td>
                                    <td>
                                        <div class="row row-cols-3 order-actions justify-content-center gap-1">
                                            <a type="button" class="col view-survey border border-dark" title="View" data-id="{{$poll->id}}"><i class="bx bxs-show"></i></a>
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
    {{-- <form @if(!isset($edit)) action="{{route('admin.poll.store')}}" @else action="{{route('admin.poll.update',$edit->id)}}" @endif method="post">
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
                        <label class="form-label">Survey Topic:</label>
                        <input type="text" required name="topic" value="@if(isset($edit)){{$edit->topic}}@else{{old('topic')}}@endif" class="form-control form-control-sm rounded-0" placeholder="Enter a Poll Topic; exm: RAJASTHAN ELECTION SURVEY 2022" >
                        <div class="row mt-3 justify-content-between align-items-center">
                            <div class="col-md-6 mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Survey Start Date :</label>
                                        <div class="input-group input-group-sm"> <span class="input-group-text rounded-0" id="inputGroup-sizing-sm"><i class="bx bx-calendar"></i></span>
                                            <input type="date" required name="starts_at" value="@if(isset($edit)){{\Carbon\Carbon::parse($edit->starts_at)->format('Y-m-d')}}@else{{old('starts_at')}}@endif" class="form-control rounded-0" />
                                        </div>
                                        @error('starts_at')
                                            <span class="text-danger d-inline-flex text-capitalize" style="font-size: 11px">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Survey End Date :</label>
                                        <div class="input-group input-group-sm"> <span class="input-group-text rounded-0" id="inputGroup-sizing-sm"><i class="bx bx-calendar"></i></span>
                                            <input type="date" required name="ends_at" value="@if(isset($edit)){{\Carbon\Carbon::parse($edit->ends_at)->format('Y-m-d')}}@else{{old('ends_at')}}@endif" class="form-control rounded-0" />
                                        </div>
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
                                <div class="input-group input-group-sm"> <span class="input-group-text rounded-0" id="inputGroup-sizing-sm"><i class="bx bx-user"></i></span>
                                    <input type="text" required name="organized_by" value="@if(isset($edit)){{$edit->organized_by}}@else{{old('organized_by')}}@endif" class="form-control rounded-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                                @error('organized_by')
                                    <span class="text-danger d-inline-flex text-capitalize" style="font-size: 11px">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-8 mb-3">
                                <label for="inputAddress3" class="form-label">Survey Question</label>
                                <textarea class="form-control" required name="question" id="inputAddress3" placeholder="Enter Question here" rows="5">@if(isset($edit)){{$edit->question}}@else{{old('question')}}@endif</textarea>
                                @error('question')
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
                            <div class="col-md-12 mb-2">
                                <div class="row row-cols-md-2">
                                    <div class="col">
                                        <label class="custom-label d-flex justify-content-start align-items-center">
                                            <input id="canVoterSeeResult" @if(isset($edit) && $edit->canVoterSeeResult == 1) checked @elseif(!isset($edit)) checked @endif name="canVoterSeeResult" type="checkbox" value="1">
                                            <span class="ms-2">Allow Voters to See Results</span><br>
                                        </label>
                                        @error('canVoterSeeResult')
                                            <span class="text-danger d-inline-flex text-capitalize" style="font-size: 11px">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label class="custom-label d-flex justify-content-start align-items-center">
                                            <input id="canVisitors" @if(isset($edit) && $edit->canVisitorsVote == 1) checked @endif name="canVisitorsVote" type="checkbox" value="1">
                                            <span class="ms-2">Allow guests to vote on the question</span><br>
                                        </label>
                                        @error('canVisitorsVote')
                                            <span class="text-danger d-inline-flex text-capitalize" style="font-size: 11px">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label class="form-label mb-1">Option A</label>
                                <div class="input-group input-group-sm"> <span class="input-group-text px-3 rounded-0" id="inputGroup-sizing-sm">1</span>
                                    <input type="text" required name="options[]" value="@if(isset($edit)){{$edit->options[0]->name}}@elseif(isset(old('options')[0])){{old('options')[0]}}@endif" class="form-control rounded-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                                @isset($edit)
                                <div class="border mt-1 position-relative">
                                    <div class="option-vote" style="width:{{$options[0]->percent}}%">
                                        <div class="d-flex align-items-center justify-content-center position-absolute top-0 left-0 w-100">
                                            <span class="text-dark me-2">{{$options[0]->votes}} Votes</span> <span class="text-dark">({{$options[0]->percent}}%)</span>
                                        </div>
                                    </div>
                                </div>
                                @endisset
                            </div>
                            <div class="col-md-6 mb-2">
                                <label class="form-label mb-1">Option B</label>
                                <div class="input-group input-group-sm"> <span class="input-group-text px-3 rounded-0" id="inputGroup-sizing-sm">2</span>
                                    <input type="text" required name="options[]" value="@if(isset($edit)){{$edit->options[1]->name}}@elseif(isset(old('options')[1])){{old('options')[1]}}@endif" class="form-control rounded-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                                @isset($edit)
                                <div class="border mt-1 position-relative">    
                                    <div class="option-vote" style="width:{{$options[1]->percent}}%">
                                        <div class="d-flex align-items-center justify-content-center position-absolute top-0 left-0 w-100">
                                            <span class="text-dark me-2">{{$options[1]->votes}} Votes</span> <span class="text-dark">({{$options[1]->percent}}%)</span>
                                        </div>
                                    </div>
                                </div>
                                @endisset
                            </div>
                            <div class="col-md-6 mb-2">
                                <label class="form-label mb-1">Option C</label>
                                <div class="input-group input-group-sm"> <span class="input-group-text px-3 rounded-0" id="inputGroup-sizing-sm">3</span>
                                    <input type="text" required name="options[]" value="@if(isset($edit)){{$edit->options[2]->name}}@elseif(isset(old('options')[2])){{old('options')[2]}}@endif" class="form-control rounded-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                                @isset($edit)
                                <div class="border mt-1 position-relative">    
                                    <div class="option-vote" style="width:{{$options[2]->percent}}%">
                                        <div class="d-flex align-items-center justify-content-center position-absolute top-0 left-0 w-100">
                                            <span class="text-dark me-2">{{$options[2]->votes}} Votes</span> <span class="text-dark">({{$options[2]->percent}}%)</span>
                                        </div>
                                    </div>
                                </div>
                                @endisset
                            </div>
                            <div class="col-md-6 mb-2">
                                <label class="form-label mb-1">Option D</label>
                                <div class="input-group input-group-sm"> <span class="input-group-text px-3 rounded-0" id="inputGroup-sizing-sm">4</span>
                                    <input type="text" required name="options[]" value="@if(isset($edit)){{$edit->options[3]->name}}@elseif(isset(old('options')[3])){{old('options')[3]}}@endif" class="form-control rounded-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                                @isset($edit)
                                <div class="border mt-1 position-relative">    
                                    <div class="option-vote" style="width:{{$options[3]->percent}}%">
                                        <div class="d-flex align-items-center justify-content-center position-absolute top-0 left-0 w-100">
                                            <span class="text-dark me-2">{{$options[3]->votes}} Votes</span> <span class="text-dark">({{$options[3]->percent}}%)</span>
                                        </div>
                                    </div>
                                </div>
                                @endisset
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">@if(!isset($edit))Publish @else Update @endif</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </form> --}}
    <form action="{{route('admin.poll.store')}}" method="post">
        <div class="modal fade" id="exampleLargeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title d-flex align-items-center fw-bold"><i class="bx bx-edit fs-4 me-2"></i>  Add New Survey</h6>
                        <a type="button" data-bs-dismiss="modal" aria-label="Close"><i class="bx bx-x fs-3"></i></a>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <label class="form-label">Survey Topic:</label>
                        <input type="text" required name="topic" value="{{old('topic')}}" class="form-control form-control-sm rounded-0" placeholder="Enter a Poll Topic; exm: RAJASTHAN ELECTION SURVEY 2022" >
                        <div class="row mt-3 justify-content-between align-items-center">
                            <div class="col-md-6 mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Survey Start Date :</label>
                                        <div class="input-group input-group-sm"> <span class="input-group-text rounded-0" id="inputGroup-sizing-sm"><i class="bx bx-calendar"></i></span>
                                            <input type="date" required name="starts_at" value="{{old('starts_at')}}" class="form-control rounded-0" />
                                        </div>
                                        @error('starts_at')
                                            <span class="text-danger d-inline-flex text-capitalize" style="font-size: 11px">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Survey End Date :</label>
                                        <div class="input-group input-group-sm"> <span class="input-group-text rounded-0" id="inputGroup-sizing-sm"><i class="bx bx-calendar"></i></span>
                                            <input type="date" required name="ends_at" value="{{old('ends_at')}}" class="form-control rounded-0" />
                                        </div>
                                        @error('ends_at')
                                            <span class="text-danger d-inline-flex text-capitalize" style="font-size: 11px">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 mb-3">
                                <label class="form-label">Survey Organized By :</label>
                                <div class="input-group input-group-sm"> <span class="input-group-text rounded-0" id="inputGroup-sizing-sm"><i class="bx bx-user"></i></span>
                                    <input type="text" required name="organized_by" value="{{old('organized_by')}}" class="form-control rounded-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                                @error('organized_by')
                                    <span class="text-danger d-inline-flex text-capitalize" style="font-size: 11px">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-8 my-3 position-relative">
                                <label for="inputAddress3" class="form-label custom-label-float">Survey Question</label>
                                <textarea class="form-control rounded-0 pt-4" required name="question" id="inputAddress3" placeholder="Enter Question here" rows="5">{{old('question')}}</textarea>
                                @error('question')
                                    <span class="text-danger d-inline-flex text-capitalize" style="font-size: 11px">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="preview-image-wrapper poll-preview cursor-pointer m-0" data-bs-toggle="modal" data-bs-target="#media-box">
                                    <img src="https://cms.botble.com/vendor/core/core/base/images/placeholder.png" alt="Preview image" id="bannerPreview" style="width: 100%;height: inherit;object-fit: scale-down;" class="preview_image">
                                    <a href="javascript:void(0)" class="btn_remove_image" id="removeBanner" title="Remove image">X</a>
                                </div>
                                <input type="hidden" required name="image" id="bannerId" value="{{old('image')}}">
                                @error('image')
                                    <span class="text-danger d-inline-flex text-capitalize" style="font-size: 11px">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-2">
                                <div class="row row-cols-md-2">
                                    <div class="col">
                                        <label class="custom-label d-flex justify-content-start align-items-center">
                                            <input id="canVoterSeeResult" checked name="canVoterSeeResult" type="checkbox" value="1">
                                            <span class="ms-2">Allow Voters to See Results</span><br>
                                        </label>
                                        @error('canVoterSeeResult')
                                            <span class="text-danger d-inline-flex text-capitalize" style="font-size: 11px">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label class="custom-label d-flex justify-content-start align-items-center">
                                            <input id="canVisitors" name="canVisitorsVote" type="checkbox" value="1">
                                            <span class="ms-2">Allow guests to vote on the question</span><br>
                                        </label>
                                        @error('canVisitorsVote')
                                            <span class="text-danger d-inline-flex text-capitalize" style="font-size: 11px">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label class="form-label mb-1">Option A</label>
                                <div class="input-group input-group-sm"> <span class="input-group-text px-3 rounded-0" id="inputGroup-sizing-sm">1</span>
                                    <input type="text" required name="options[]" value="@if(isset(old('options')[0])){{old('options')[0]}}@endif" class="form-control rounded-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label class="form-label mb-1">Option B</label>
                                <div class="input-group input-group-sm"> <span class="input-group-text px-3 rounded-0" id="inputGroup-sizing-sm">2</span>
                                    <input type="text" required name="options[]" value="@if(isset(old('options')[1])){{old('options')[1]}}@endif" class="form-control rounded-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label class="form-label mb-1">Option C</label>
                                <div class="input-group input-group-sm"> <span class="input-group-text px-3 rounded-0" id="inputGroup-sizing-sm">3</span>
                                    <input type="text" required name="options[]" value="@if(isset(old('options')[2])){{old('options')[2]}}@endif" class="form-control rounded-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label class="form-label mb-1">Option D</label>
                                <div class="input-group input-group-sm"> <span class="input-group-text px-3 rounded-0" id="inputGroup-sizing-sm">4</span>
                                    <input type="text" required name="options[]" value="@if(isset(old('options')[3])){{old('options')[3]}}@endif" class="form-control rounded-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
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
    <div class="modal fade" id="viewSurvey" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col-md-4">
                        <h6 class="modal-title d-flex align-items-center fw-bold"><i class="bx bx-show fs-4 me-2"></i>  View Survey</h6>
                    </div>
                    <div class="col text-end">
                        <a href="#" class="btn btn-sm btn-secondary me-2 px-3" id="poll-users_link">User List</a>
                        <a type="button" class="btn btn-sm btn-secondary me-2 px-3">Print</a>
                        <a type="button" class="btn btn-sm btn-secondary me-2 px-3" id="pollEdit">Edit</a>
                        <a type="button" class="btn btn-sm btn-secondary px-3" data-bs-dismiss="modal" aria-label="Close">Close</a>
                    </div>
                </div>
                <div class="modal-body">
                    <label class="form-label">Survey Topic:</label>
                    <input type="text" required name="topic" value="" class="form-control form-control-sm rounded-0 d-none" placeholder="Enter a Poll Topic; exm: RAJASTHAN ELECTION SURVEY 2022" >
                    <div class="preview-content form-control rounded-0 fw-bold" id="poll-topic">
                        RAJASTHAN ELECTION SURVEY 2022
                    </div>
                    <div class="row mt-3 justify-content-between align-items-center">
                        <div class="col-md-6 mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Survey Start Date :</label>
                                    <div class="input-group input-group-sm"> <span class="input-group-text rounded-0" id="inputGroup-sizing-sm"><i class="bx bx-calendar"></i></span>
                                        <input type="date" required name="starts_at" value="" class="form-control rounded-0 d-none" />
                                        <div class="preview-content form-control rounded-0" id="poll-starts_at">
                                            25.07.2022
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Survey End Date :</label>
                                    <div class="input-group input-group-sm"> <span class="input-group-text rounded-0" id="inputGroup-sizing-sm"><i class="bx bx-calendar"></i></span>
                                        <input type="date" required name="ends_at" value="" class="form-control rounded-0 d-none" />
                                        <div class="preview-content form-control rounded-0" id="poll-ends_at">
                                            25.07.2022
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label class="form-label">Survey Organized By :</label>
                            <div class="input-group input-group-sm"> <span class="input-group-text rounded-0" id="inputGroup-sizing-sm"><i class="bx bx-user"></i></span>
                                <input type="text" required name="organized_by" value="" class="form-control rounded-0 d-none" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                <div class="preview-content form-control rounded-0" id="poll-organized_by">
                                    NEWS15INDIA/Abdul Malik
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 my-3 position-relative">
                            <label for="inputAddress3" class="form-label custom-label-float">Survey Question</label>
                            <textarea class="form-control pt-4 d-none" required name="question" id="inputAddress3" placeholder="Enter Question here" rows="5"></textarea>
                            <div class="preview-content form-control rounded-0 pt-4" style="height: 140px" id="poll-question">
                                वो चीज़ क्या है जो आज के आधुनिक युग मेंभी दुनिया के कु छ नहस्ोों में
                                एक प्राचीि आनवष्कार का उपयोग नकया जाता है.
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="preview-image-wrapper poll-preview cursor-pointer m-0" >
                                <img src="https://cms.botble.com/vendor/core/core/base/images/placeholder.png" alt="Preview image" style="width: 100%;height: inherit;object-fit: scale-down;" class="preview_image poll-image_path">
                                <a href="javascript:void(0)" class="btn_remove_image" title="Remove image">X</a>
                            </div>
                            <input type="hidden" required name="image" value="" class="poll-image">
                        </div>
                        <div class="col-md-12 mb-2 d-none">
                            <div class="row row-cols-md-2">
                                <div class="col">
                                    <label class="custom-label d-flex justify-content-start align-items-center">
                                        <input id="canVoterSeeResult" checked name="canVoterSeeResult" type="checkbox" value="1">
                                        <span class="ms-2">Allow Voters to See Results</span><br>
                                    </label>
                                </div>
                                <div class="col">
                                    <label class="custom-label d-flex justify-content-start align-items-center">
                                        <input id="canVisitors" name="canVisitorsVote" type="checkbox" value="1">
                                        <span class="ms-2">Allow guests to vote on the question</span><br>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label mb-1">Option A</label>
                            <div class="input-group input-group-sm"> <span class="input-group-text px-3 rounded-0" id="inputGroup-sizing-sm">1</span>
                                <input type="text" required name="options[]" value="" class="form-control rounded-0 d-none" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                <div class="preview-content form-control rounded-0 poll-options_result" data-type="name-0">
                                    दूरबीि
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label mb-1">Option B</label>
                            <div class="input-group input-group-sm"> <span class="input-group-text px-3 rounded-0" id="inputGroup-sizing-sm">2</span>
                                <input type="text" required name="options[]" value="" class="form-control rounded-0 d-none" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                <div class="preview-content form-control rounded-0 poll-options_result" data-type="name-1">
                                    दूरबीि
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label mb-1">Option C</label>
                            <div class="input-group input-group-sm"> <span class="input-group-text px-3 rounded-0" id="inputGroup-sizing-sm">3</span>
                                <input type="text" required name="options[]" value="" class="form-control rounded-0 d-none" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                <div class="preview-content form-control rounded-0 poll-options_result" data-type="name-2">
                                    दूरबीि
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label mb-1">Option D</label>
                            <div class="input-group input-group-sm"> <span class="input-group-text px-3 rounded-0" id="inputGroup-sizing-sm">4</span>
                                <input type="text" required name="options[]" value="" class="form-control rounded-0 d-none" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                <div class="preview-content form-control rounded-0 poll-options_result" data-type="name-3">
                                    दूरबीि
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3 justify-content-between align-items-center" id="votes">
                        <div class="col-md-3 mb-2">
                            <label class="form-label mb-1">Option (A) Vote</label>
                            <div class="form-control rounded-0 text-center py-1 poll-options_result" data-type="votes-0">
                                50
                            </div>
                        </div>
                        <div class="col-md-3 mb-2">
                            <label class="form-label mb-1">Option (B) Vote</label>
                            <div class="form-control rounded-0 text-center py-1 poll-options_result" data-type="votes-1">
                                50
                            </div>
                        </div>
                        <div class="col-md-3 mb-2">
                            <label class="form-label mb-1">Option (C) Vote</label>
                            <div class="form-control rounded-0 text-center py-1 poll-options_result" data-type="votes-2">
                                50
                            </div>
                        </div>
                        <div class="col-md-3 mb-2">
                            <label class="form-label mb-1">Option (D) Vote</label>
                            <div class="form-control rounded-0 text-center py-1 poll-options_result" data-type="votes-3">
                                50
                            </div>
                        </div>
                        <div class="col-md-3 mb-2">
                            <label class="form-label mb-1">Option (A) %</label>
                            <div class="form-control rounded-0 text-center py-1 poll-options_result" data-type="percent-0">
                                50%
                            </div>
                        </div>
                        <div class="col-md-3 mb-2">
                            <label class="form-label mb-1">Option (B) %</label>
                            <div class="form-control rounded-0 text-center py-1 poll-options_result" data-type="percent-1">
                                50%
                            </div>
                        </div>
                        <div class="col-md-3 mb-2">
                            <label class="form-label mb-1">Option (C) %</label>
                            <div class="form-control rounded-0 text-center py-1 poll-options_result" data-type="percent-2">
                                50%
                            </div>
                        </div>
                        <div class="col-md-3 mb-2">
                            <label class="form-label mb-1">Option (D) %</label>
                            <div class="form-control rounded-0 text-center py-1 poll-options_result" data-type="percent-3">
                                50%
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="pollUpdate" class="btn btn-success d-none">Update</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @include('backpanel.includes.media-model')
@endsection
@push('scripts')
@include('backpanel.includes.media-model-script')
@if($errors->any())
    <script>
        $(document).ready(function () {
            $("#exampleLargeModal").modal('show');
        });
    </script>
@endif
<script>
    $(document).ready(function() {
        $('#poll').DataTable();
        $(document).on('click','.view-survey',function (e) {
            let pollId = $(this).data('id');
            let url = "{{ route('admin.poll.view',':id') }}";
            url = url.replace(':id', pollId);
            $.ajax({
                url: url,
                type: "GET",
                success: function(response) {
                    console.log(response);
                    $('#poll-users_link').attr('href',response.users_link);
                    $('#poll-topic').html(response.topic);
                    $('#poll-starts_at').html(response.starts_at);
                    $('#poll-ends_at').html(response.ends_at);
                    $('#poll-organized_by').html(response.organized_by);
                    $('#poll-question').html(response.question);
                    $(".poll-image_path").attr('src',response.image_path);
                    $(".poll-image").val(response.image);
                    $.each(response.options_result, function (index2, option) {
                        $.each(option, function (index3, optionValue) {
                            if($(document).find(`.poll-options_result[data-type='${index3}-${index2}']`).length > 0){
                                $(document).find(`.poll-options_result[data-type='${index3}-${index2}']`).html(optionValue);
                            }
                        });
                    });
                    $('#viewSurvey').modal('show');
                }
            });
        });
        $("#viewSurvey").on("hidden.bs.modal", function () {
            $.each($(document).find(".preview-content"), function (index, ele) { 
                 $(ele).prev('input').val('');
                 $(ele).prev().addClass('d-none');
                 $(ele).removeClass('d-none');
                 $(ele).html('');
            });
            $('#pollUpdate').addClass('d-none');
            $('#votes').removeClass('d-none');
            $(document).find('#cancel-edit').parent().children().removeClass('d-none');
            $(document).find('#cancel-edit').remove();
        });
        $(document).on('click','#pollEdit',function (e) {
            $.each($(document).find(".preview-content"), function (index, ele) { 
                 $(ele).prev('input').val($(ele).text());
                 $(ele).prev('textarea').html($(ele).text());
                 $(ele).prev().removeClass('d-none');
                 $(ele).addClass('d-none');
            });
            $('#pollUpdate').removeClass('d-none');
            $('#votes').addClass('d-none');
            $(this).addClass('d-none');
            $(this).prev().addClass('d-none');
            $(this).prev().prev().addClass('d-none');
            $(this).after(`
            <a type="button" class="btn btn-sm btn-secondary me-2 px-3" id="cancel-edit">Cancel</a>
            `);
        });
        $(document).on('click','#cancel-edit',function (e) {
            $.each($(document).find(".preview-content"), function (index, ele) { 
                 $(ele).prev('input').val('');
                 $(ele).prev().addClass('d-none');
                 $(ele).removeClass('d-none');
            });
            $('#pollUpdate').addClass('d-none');
            $('#votes').removeClass('d-none');
            $(this).parent().children().removeClass('d-none');
            $(this).remove();
        });
    });
</script>
@endpush
