@extends('layouts.backpanel.master')
@section('title', 'Revenue')
@push('css')
@endpush
@section('sections')
<div class="col-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div class="col-md-6">
                <h4 class="card-title m-0 d-flex align-items-center">
                    <i class="bx bx-money fs-3 mt-1 me-2"></i>
                    <span>Revenue</span>
                </h4>
            </div>
            <div class="col-md-6 col-12">
                <div class="d-flex justify-content-end align-items-center gap-2 flex-wrap">
                    {{-- <a href="{{route('admin.account.banking.create')}}" class="btn btn-primary btn-sm">Add Account</a> --}}
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="payments" class="w-100 table table-responsive table-striped table-bordered align-middle border table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>OrderID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Payment From</th>
                        <th>Payment Method</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th data-orderable="false">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payments as $key => $payment)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$payment->order_id}}</td>
                        <td>{{$payment->user->name}}</td>
                        <td>{{$payment->user->email}}</td>
                        <td>{{$payment->user->details->phone_number}}</td>
                        <td>{{$payment->reference->getMorphClass()}}</td>
                        <td>{{$payment->payment_method}}</td>
                        <td>₹{{$payment->amount}}</td>
                        <td>
                            @if ($payment->payment_status == 1)
                                <span class="badge badge-sm bg-success">Paid</span>                                
                            @else
                                <span class="badge badge-sm bg-danger">Fail</span>                                
                            @endif
                        </td>
                        <td>
                            <div class="row row-cols-3 order-actions justify-content-center gap-1">
                                <a href="{{route('admin.account.payments.view',$payment->id)}}" class="col border border-dark" title="View"><i class="bx bxs-show"></i></a>
                            </div>
                        </td>
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
    $('#payments').DataTable();
    $(document).on("click",".delete",function (e) {
        var url = $(this).attr("href");
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You Want to Delete Permanently this Bank Account!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    });
</script>
@endpush