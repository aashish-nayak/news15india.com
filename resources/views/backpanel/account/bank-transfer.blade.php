@extends('layouts.backpanel.master')
@section('title', 'Bank Transfer')
@push('css')
@endpush
@section('sections')
<div class="col-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div class="col-md-6">
                <h4 class="card-title m-0 d-flex align-items-center">
                    <i class="bx bx-transfer fs-3 mt-1 me-2"></i>
                    <span>Bank Transfer</span>
                </h4>
            </div>
            <div class="col-md-6 col-12">
                <div class="d-flex justify-content-end align-items-center gap-2 flex-wrap">
                    <a href="{{route('admin.account.bank-transfer.create')}}"
                        class="btn btn-primary btn-sm">Transfer</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="accounts" class="w-100 table table-striped table-bordered align-middle border table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>From Account</th>
                        <th>To Account</th>
                        <th>Amount</th>
                        <th>Reference</th>
                        <th>Description</th>
                        <th data-orderable="false">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transfers as $key => $transfer)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$transfer->date}}</td>
                        <td>{{!empty($transfer->fromBankAccount())? $transfer->fromBankAccount()->bank_name.'
                            '.$transfer->fromBankAccount()->holder_name:''}}</td>
                        <td>{{!empty( $transfer->toBankAccount())? $transfer->toBankAccount()->bank_name.' '.
                            $transfer->toBankAccount()->holder_name:''}}</td>
                        <td>{{$transfer->amount}}</td>
                        <td>{{$transfer->reference}}</td>
                        <td>{{$transfer->description}}</td>
                        <td>
                            <div class="row row-cols-3 order-actions justify-content-center gap-1">
                                <a href="{{route('admin.account.bank-transfer.edit',$transfer->id)}}"
                                    class="col border border-dark" title="Edit"><i class="bx bxs-edit"></i></a>
                                <form action="{{route('admin.account.bank-transfer.destroy',$transfer->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="javascript:void(0)" class="delete text-danger border border-dark" title="Delete">
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
@endsection
@push('scripts')
<script>
    $('#accounts').DataTable();
    $(document).on("click",".delete",function (e) {
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
                e.target.closest('form').submit();
            }
        });
    });
</script>
@endpush