@extends('layouts.backpanel.master')
@section('title', (isset($edit)) ? 'Update Bank Transfer' : 'Create Bank Transfer')

@section('sections')
<div class="col-10 mx-auto">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div class="col-md-6">
                <h4 class="card-title m-0 d-flex align-items-center">
                    <i class="bx bx-plus fs-3 mt-1 me-2"></i>
                    <span>{{(isset($edit))?'Update':'Create'}} Bank Transfer</span>
                </h4>
            </div>
            <div class="col-md-6 col-12">
                <div class="d-flex justify-content-end align-items-center gap-2 flex-wrap">
                    <a href="{{route('admin.account.bank-transfer.index')}}" class="btn btn-primary btn-sm">Back</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('admin.account.bank-transfer.store')}}" method="post">
                @csrf
                @isset($edit)
                <input type="hidden" name="id" value="{{$edit->id}}">
                @endisset
                <div class="row">
                    <div class="form-group  col-md-6">
                        <label for="from_account" class="form-label">From Account</label>
                        <select class="form-control select" required="required" id="from_account" name="from_account">
                            @foreach ($bankAccounts as $item)
                            <option value="{{$item->id}}" @if((old('from_account') && $item->id == old('from_account')) || (isset($edit) && $item->id == $edit->from_account)){{'selected'}}@endif >{{ $item->bank_name }}</option>
                            @endforeach
                        </select>
                        @error('from_account')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group  col-md-6">
                        <label for="to_account" class="form-label">To Account</label>
                        <select class="form-control select" required="required" id="to_account" name="to_account">
                            @foreach ($bankAccounts as $item)
                            <option value="{{$item->id}}" @if((old('to_account') && $item->id == old('to_account')) || (isset($edit) && $item->id == $edit->to_account)){{'selected'}}@endif >{{ $item->bank_name }}</option>
                            @endforeach
                        </select>
                        @error('to_account')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group  col-md-6">
                        <label for="amount" class="form-label">Amount</label>
                        <input class="form-control" required="required" step="0.01" name="amount" type="number"
                            value="@if(old('amount')){{old('amount')}}@elseif(isset($edit)){{$edit->amount}}@endif"
                            id="amount">
                        @error('amount')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group  col-md-6">
                        <label for="date" class="form-label">Date</label>
                        <input class="form-control" required="required" name="date" type="date" id="date"
                            value="@if(old('date')){{old('date')}}@elseif(isset($edit)){{$edit->date}}@endif">
                        @error('date')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group  col-md-6">
                        <label for="reference" class="form-label">Reference</label>
                        <input class="form-control" name="reference" type="text"
                            value="@if(old('reference')){{old('reference')}}@elseif(isset($edit)){{$edit->reference}}@else{{'Self'}}@endif"
                            id="reference">
                        @error('reference')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group  col-md-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" rows="3" name="description" cols="50"
                            id="description">@if(old('description')){{old('description')}}@elseif(isset($edit)){{$edit->description}}@endif</textarea>
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
@endsection
@push('plugin-scripts')

@endpush