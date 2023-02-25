@extends('layouts.backpanel.master')
@section('title', 'Transactions')
@push('css')
@endpush
@section('sections')
<div class="col-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div class="col-md-6">
                <h4 class="card-title m-0 d-flex align-items-center">
                    <i class="bx bx-transfer fs-3 mt-1 me-2"></i>
                    <span>Transactions</span>
                </h4>
            </div>
        </div>
        <div class="card-body">
            <table id="Transactions" class="w-100 table table-responsive table-striped table-bordered align-middle border table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Reason</th>
                        <th>Date</th>
                        <th>Bank Account</th>
                        <th>Amount</th>
                        <th>Type</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $key => $transactions)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$transactions->reason}}</td>
                        <td>{{$transactions->date}}</td>
                        <td>{{$transactions->bankAccount->bank_name}}</td>
                        <td>
                            @if ($transactions->type == 'credit')
                                <span class="text-success">₹{{$transactions->amount}}</span>
                                @else
                                <span class="text-danger">₹{{$transactions->amount}}</span>
                            @endif
                        </td>
                        <td>
                            @if ($transactions->type == 'credit')
                                <span class="badge badge-sm bg-success">Credit</span>                                
                            @else
                                <span class="badge badge-sm bg-danger">Debit</span>                                
                            @endif
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
    $('#Transactions').DataTable();
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