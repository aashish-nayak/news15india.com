@extends('layouts.backpanel.master')
@section('title', 'News')
@push('plugin-css')

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
                        <h6 class="bg-light-info px-3 py-1 d-inline" style="font-size: 14px">Survey Details</h6>
                        <div class="d-flex justify-content-between align-content-center my-2 border p-2">
                            <div class="form-group me-1">
                                <label class="form-label">Survey Start Date :</label>
                                <div class="input-group input-group-sm"> <span class="input-group-text rounded-0 bg-danger text-light" id="inputGroup-sizing-sm">C</span>
                                    <input type="date" readonly value="{{\Carbon\Carbon::parse($poll->starts_at)->format('Y-m-d')}}" class="form-control rounded-0" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Survey Organized By :</label>
                                <div class="input-group input-group-sm"> <span class="input-group-text rounded-0" id="inputGroup-sizing-sm"><i class="bx bx-user"></i></span>
                                    <input type="text" readonly value="{{$poll->organized_by}}" class="form-control rounded-0" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h6 class="bg-light-info px-3 py-1 d-inline" style="font-size: 14px">Survey Question</h6>
                        <div class=" my-2 border p-1">
                            <textarea readonly class="form-control form-control-sm" rows="2" style="min-height: 70px">{{$poll->question}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <h6 class="bg-light-info px-3 py-1 d-inline" style="font-size: 14px">Survey Options</h6>
                        <div class="row row-cols-md-2 g-1 justify-content-between align-content-center my-2 border p-1">
                            @php
                                $abc = ["A","B","C","D"];
                            @endphp
                            @foreach ($poll->options as $key =>$optionArr)
                            <div class="col">
                                <div class="input-group input-group-sm"> <span class="input-group-text rounded-0" id="inputGroup-sizing-sm">{{$abc[$key]}}</span>
                                    <input type="text" readonly value="{{$optionArr->name}}" class="form-control rounded-0" >
                                </div>
                            </div>
                            @endforeach
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
                            <td>{{\Carbon\Carbon::parse($user->pivot->created_at)->diffForHumans()}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->details->phone_number}}</td>
                            <td>{{$user->details->zip}}</td>
                            <td>{{$user->details->city->name}}</td>
                            <td>{{$user->details->state->name}}</td>
                            <td>{{$user->details->country->name}}</td>
                            <td>{{$user->options[0]->name}}</td>
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
