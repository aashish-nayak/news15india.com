@extends('layouts.backpanel.master')
@section('title', 'Expenses')
@push('css')
@endpush
@section('sections')
<div class="col-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div class="col-md-6">
                <h4 class="card-title m-0 d-flex align-items-center">
                    <i class="bx bx-payment fs-3 mt-1 me-2"></i>
                    <span>Expenses</span>
                </h4>
            </div>
            <div class="col-md-6 col-12">
                <div class="d-flex justify-content-end align-items-center gap-2 flex-wrap">
                    <a href="{{route('admin.account.expenses.create')}}" class="btn btn-primary btn-sm">Add Expense</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="Expenses" class="w-100 table table-responsive table-striped table-bordered align-middle border table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Item Name</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>From Bank</th>
                        <th>Amount</th>
                        <th>Description</th>
                        <th data-orderable="false">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($expenses as $key => $expense)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$expense->item_name}}</td>
                        <td>{{$expense->category->name}}</td>
                        <td>{{$expense->date}}</td>
                        <td>{{$expense->account->bank_name}}</td>
                        <td>₹{{$expense->amount}}</td>
                        <td>{{$expense->description}}</td>
                        <td>
                            <div class="row row-cols-3 order-actions justify-content-center gap-1">
                                @if ($expense->reciept)
                                <a href="{{asset('storage/accounting/'.$expense->reciept)}}" download="{{$expense->reciept}}" class="col border border-dark" title="Download Reciept"><i class="bx bxs-download"></i></a>
                                @endif
                                <a href="{{route('admin.account.expenses.edit',$expense->id)}}" class="col border border-dark" title="Edit"><i class="bx bxs-edit"></i></a>
                                <a href="{{route('admin.account.expenses.destroy',$expense->id)}}" class="col border border-danger delete" title="Delete"><i class="bx bxs-trash"></i></a>
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
    $('#Expenses').DataTable();
    $(document).on("click",".delete",function (e) {
        var url = $(this).attr("href");
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You Want to Delete Permanently this Expense!",
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