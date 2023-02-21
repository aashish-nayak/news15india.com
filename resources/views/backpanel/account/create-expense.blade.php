@extends('layouts.backpanel.master')
@section('title', (isset($edit)) ? 'Update Expense' : 'Create Expense')

@section('sections')
<div class="col-10 mx-auto">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div class="col-md-6">
                <h4 class="card-title m-0 d-flex align-items-center">
                    <i class="bx bx-plus fs-3 mt-1 me-2"></i>
                    <span>{{(isset($edit))?'Update':'Create'}} Expense</span>
                </h4>
            </div>
            <div class="col-md-6 col-12">
                <div class="d-flex justify-content-end align-items-center gap-2 flex-wrap">
                    <a href="{{route('admin.account.expenses.index')}}" class="btn btn-primary btn-sm">Back</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('admin.account.expenses.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                @isset($edit)
                <input type="hidden" name="id" value="{{$edit->id}}">
                @endisset
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="bank_account" class="form-label">Account <span class="text-danger">*</span></label>
                        <select class="form-control select" required="required" id="bank_account" name="bank_account">
                            @foreach ($bankAccounts as $item)
                            <option value="{{$item->id}}" @if((old('bank_account') && $item->id == old('bank_account')) || (isset($edit) && $item->id == $edit->bank_account_id)){{'selected'}}@endif >{{ $item->bank_name }}</option>
                            @endforeach
                        </select>
                        @error('bank_account')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="amount" class="form-label">Amount <span class="text-danger">*</span></label>
                        <input class="form-control" required="required" step="0.01" name="amount" type="number"
                            value="@if(old('amount')){{old('amount')}}@elseif(isset($edit)){{$edit->amount}}@endif" id="amount">
                        @error('amount')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="date" class="form-label">Date <span class="text-danger">*</span></label>
                        <input class="form-control" required="required" name="date" type="date" id="date"
                            value="@if(old('date')){{old('date')}}@elseif(isset($edit)){{$edit->date}}@endif">
                        @error('date')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="account_category_id" class="form-label">Expense Category <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <select class="form-control select" required="required" id="account_category_id" name="account_category_id">
                                <option value="">Select Category</option>
                                @foreach ($categories as $item)
                                <option value="{{$item->id}}" @if((old('account_category_id') && $item->id == old('account_category_id')) || (isset($edit) && $item->id == $edit->account_category_id)){{'selected'}}@endif >{{ $item->name }}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Add</button>
                        </div>
                        @error('account_category_id')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="item_name" class="form-label">Item Name <span class="text-danger">*</span></label>
                        <input class="form-control" name="item_name" required type="text" value="@if(old('item_name')){{old('item_name')}}@elseif(isset($edit)){{$edit->item_name}}@endif" id="item_name">
                        @error('item_name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="reciept" class="form-label">Reciept</label>
                        @if (isset($edit) && $edit->reciept != null)
                            <img src="{{asset('storage/accounting/'.$edit->reciept)}}" >
                        @endif
                        <input type="file" class="form-control" name="reciept">
                        @error('reciept')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group  col-md-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" rows="3" name="description" cols="50" id="description">@if(old('description')){{old('description')}}@elseif(isset($edit)){{$edit->description}}@endif</textarea>
                        @error('description')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.account.category.store')}}" method="post" id="category-form">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="name" class="form-label">Category Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="catname" required class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <label for="description" class="form-label">Category description</label>
                        <input type="text" name="description" id="catdescription" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="save-category">Save changes</button>
                <button type="button" class="btn btn-secondary" id="closeModal" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
@push('plugin-scripts')
<script>
    $(document).ready(function () {
        $(document).on('click',"#save-category",function (e) { 
            var formdata = {
                "_token" : "{{csrf_token()}}",
                name : $('#catname').val(),
                description : $('#catdescription').val(),
            };
            $.ajax({
                type: "post",
                url: $('#category-form').attr('action'),
                data: formdata,
                success: function (response) {
                    $("#category-form")[0].reset();
                    $('#account_category_id').append(`<option value="${response.id}">${response.name}</option>`);
                    $("#closeModal").click();
                }
            });
        });
    });
</script>
@endpush