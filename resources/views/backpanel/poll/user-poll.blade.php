@extends('layouts.backpanel.master')
@section('title', 'News')
@push('plugin-css')
<style>
    .preview-content{
        white-space: nowrap;
        overflow-x: hidden;
    }
    .form-label{
        font-size: 12px;
    }
</style>
@endpush
@section('sections')
    <div class="col-12 mt-4 text-end">
        <a href="{{route('admin.poll.index')}}" class="btn btn-info mr-3 btn-sm">View Polls</a>
    </div>
    <div class="col-12 mt-2">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title m-0">Survey User List</h4>
            </div>
            <div class="card-body">
                <div class="row mb-3 g-2">
                    <div class="col-md-4">
                        <div class="position-relative">
                            <label for="inputAddress3" class="form-label custom-label-float">Survey Details</label>
                            <div class="d-flex justify-content-between align-content-center my-2 border p-2 pt-4">
                                <div class="form-group me-1 mb-1">
                                    <label class="form-label">Survey Start Date :</label>
                                    <div class="input-group input-group-sm"> <span class="input-group-text rounded-0" id="inputGroup-sizing-sm"><i class="bx bx-calendar"></i></span>
                                        <div class="preview-content form-control rounded-0">
                                            <p class="m-0">
                                                {{\Carbon\Carbon::parse($poll->starts_at)->format('d-m-Y')}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-7">
                                    <label class="form-label">Survey Organized By :</label>
                                    <div class="input-group input-group-sm"> <span class="input-group-text rounded-0" id="inputGroup-sizing-sm"><i class="bx bx-calendar"></i></span>
                                        <div class="preview-content form-control rounded-0">
                                            <p class="m-0">
                                                {{$poll->organized_by}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="position-relative my-2">
                            <label for="inputAddress3" class="form-label custom-label-float">Survey Question</label>
                            <div class="preview-content form-control rounded-0 pt-4" style="height: 100px" id="poll-question">
                                {{$poll->question}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="position-relative my-2 ">
                            <label for="inputAddress3" class="form-label custom-label-float">Survey Options</label>
                            <div class="row row-cols-md-2 g-1 justify-content-between align-content-center border p-1 pt-4 m-0">
                                @php
                                    $abc = ["A","B","C","D"];
                                @endphp
                                @foreach ($poll->options as $key =>$optionArr)
                                <div class="col">
                                    <div class="input-group input-group-sm"> <span class="input-group-text rounded-0" id="inputGroup-sizing-sm">{{$abc[$key]}}</span>
                                        <div class="preview-content form-control rounded-0" >
                                            {{$optionArr->name}}
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <table id="userData" class="w-100 table responsive display table-striped table-bordered align-middle border table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Time/Date</th>
                            <th>Name</th>
                            <th>Mobile No.</th>
                            <th>Pincode</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Country</th>
                            <th>Vote</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{\Carbon\Carbon::parse($user->voted_created_at)->diffForHumans()}}</td>
                            <td>{{(isset($user->name))? $user->name : $user->ip}}</td>
                            <td>{{(isset($user->details->phone_number))? $user->details->phone_number : '--'}}</td>
                            <td>{{(isset($user->details->zip))? $user->details->zip : '--'}}</td>
                            <td>{{(isset($user->details->city->name))? $user->details->city->name : '--'}}</td>
                            <td>{{(isset($user->details->state->name))? $user->details->state->name : '--'}}</td>
                            <td>{{(isset($user->details->country->name))? $user->details->country->name : '--'}}</td>
                            <td>{{$user->voted_to}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        $('#userData').DataTable();
    });
</script>
@endpush
