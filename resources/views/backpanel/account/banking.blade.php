@extends('layouts.backpanel.master')
@section('title', 'Banking')
@push('css')
<style>
    .nav-primary.nav-tabs .nav-link.active {
        border-color: #fff #fff #0d6efd #fff;
    }

    .nav-tabs .nav-link:focus,
    .nav-tabs .nav-link:hover {
        border-color: transparent;
    }
</style>
@endpush
@section('sections')
<div class="col-12">
    <ul class="nav nav-tabs nav-primary mb-2 bg-white" role="tablist">
        <li class="nav-item w-25" role="presentation">
            <a class="nav-link active" href="#primaryhome">
                <div class="d-flex align-items-center justify-content-center">
                    <div class="tab-icon"><i class="bx bx-home font-18 me-1"></i> </div>
                    <div class="tab-title">Bank Accounts</div>
                </div>
            </a>
        </li>
        <li class="nav-item w-25" role="presentation">
            <a class="nav-link" href="#primaryprofile">
                <div class="d-flex align-items-center justify-content-center">
                    <div class="tab-icon"><i class="bx bx-transfer font-18 me-1"></i> </div>
                    <div class="tab-title">Transfer</div>
                </div>
            </a>
        </li>
    </ul>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div class="col-md-6">
                <h4 class="card-title m-0 d-flex align-items-center">
                    <i class="bx bx-home fs-3 mt-1 me-2"></i>
                    <span>Bank Accounts</span>
                </h4>
            </div>
            <div class="col-md-6 col-12">
                <div class="d-flex justify-content-end align-items-center gap-2 flex-wrap">
                    <a href="{{route('admin.account.banking.create')}}" class="btn btn-primary btn-sm">Add Account</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="accounts" class="w-100 table table-striped table-bordered align-middle border table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Holder Name</th>
                        <th>Bank</th>
                        <th>Account Number</th>
                        <th>Current Balance</th>
                        <th>Contact Number</th>
                        <th>Bank Branch</th>
                        <th data-orderable="false">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bankAccounts as $key => $bank)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$bank->holder_name}}</td>
                        <td>{{$bank->bank_name}}</td>
                        <td>{{$bank->account_number}}</td>
                        <td>{{$bank->opening_balance}}</td>
                        <td>{{$bank->contact_number}}</td>
                        <td>{{$bank->bank_address}}</td>
                        <td>
                            <div class="row row-cols-3 order-actions justify-content-center gap-1">
                                <a href="{{route('admin.account.banking.edit',$bank->id)}}"
                                    class="col border border-dark" title="Edit"><i class="bx bxs-edit"></i></a>
                                <a href="{{route('admin.account.banking.delete',$bank->id)}}"
                                    class="delete text-danger border border-dark" title="Delete">
                                    <i class="bx bxs-trash"></i>
                                </a>
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