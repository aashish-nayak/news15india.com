@extends('layouts.backpanel.master')
@section('title', 'Transaction View')

@section('sections')
<div class="col-10 mx-auto">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div class="col-md-6">
                <h4 class="card-title m-0 d-flex align-items-center">
                    <i class="bx bx-money fs-3 mt-1 me-2"></i>
                    <span>Transaction View</span>
                </h4>
            </div>
            <div class="col-md-6 col-12">
                <div class="d-flex justify-content-end align-items-center gap-2 flex-wrap">
                    <a href="{{route('admin.account.payments.index')}}" class="btn btn-primary btn-sm">Back</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <tr class="bg-light">
                    <th>Key</th>
                    <th>Value</th>
                </tr>
                <tr>
                    <th>DP</th>
                    <td><img src="{{$payment->user->getAvatar()}}" style="width:100px;height:auto;" alt=""></td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{$payment->user->name}}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{$payment->user->email}}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{$payment->user->details->phone_number}}</td>
                </tr>
                <tr>
                    <th>State</th>
                    <td>{{$payment->user->details->state->name}}</td>
                </tr>
                <tr>
                    <th>City</th>
                    <td>{{$payment->user->details->city->name}}</td>
                </tr>
                <tr>
                    <th>Pincode</th>
                    <td>{{$payment->user->details->zip}}</td>
                </tr>
                <tr>
                    <th>Order Id</th>
                    <td>{{$payment->order_id}}</td>
                </tr>
                <tr>
                    <th>Payment Method</th>
                    <td>{{$payment->payment_method}}</td>
                </tr>
                <tr>
                    <th>Amount</th>
                    <td>₹{{$payment->amount}}</td>
                </tr>
                <tr>
                    <th>Payment Status</th>
                    <td>
                    @if ($payment->payment_status == 1)
                        <span class="badge badge-sm bg-success">Paid</span>                                
                    @else
                        <span class="badge badge-sm bg-danger">Fail</span>                                
                    @endif
                    </td>
                </tr>
                <tr>
                    <th>CreatedAt</th>
                    <td>{{$payment->created_at->format('h:iA d-M-Y')}}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
@push('plugin-scripts')

@endpush