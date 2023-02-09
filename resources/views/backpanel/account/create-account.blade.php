@extends('layouts.backpanel.master')
@section('title', (isset($edit)) ? 'Update Bank Account' : 'Create Bank Account')

@section('sections')
<div class="col-10 mx-auto">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div class="col-md-6">
                <h4 class="card-title m-0 d-flex align-items-center">
                    <i class="bx bx-plus fs-3 mt-1 me-2"></i>
                    <span>{{(isset($edit))?'Update':'Create'}} Bank Account</span>
                </h4>
            </div>
            <div class="col-md-6 col-12">
                <div class="d-flex justify-content-end align-items-center gap-2 flex-wrap">
                    <a href="{{route('admin.account.banking')}}" class="btn btn-primary btn-sm">Back</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('admin.account.banking.save')}}" method="post">
                <div class="row">
                    @csrf
                    @isset($edit)
                        <input type="hidden" name="id" value="{{$edit->id}}">
                    @endisset
                    <div class="form-group col-md-6">
                        <label for="holder_name" class="form-label">Bank Holder Name</label>
                        <div class="form-icon-user">
                            <span><i class="ti ti-address-card"></i></span>
                            <input class="form-control" required="required" name="holder_name" type="text" value="@if(old('holder_name')){{old('holder_name')}}@elseif(isset($edit)){{$edit->holder_name}}@endif" id="holder_name">
                        </div>
                        @error('holder_name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-2 col-md-6">
                        <label for="bank_name" class="form-label">Bank Name</label>
                        <div class="form-icon-user">
                            <span><i class="ti ti-university"></i></span>
                            <input class="form-control" required="required" name="bank_name" type="text" value="@if(old('bank_name')){{old('bank_name')}}@elseif(isset($edit)){{$edit->bank_name}}@endif" id="bank_name">
                        </div>
                        @error('bank_name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-2 col-md-6">
                        <label for="account_number" class="form-label">Account Number</label>
                        <div class="form-icon-user">
                            <span><i class="ti ti-notes-medical"></i></span>
                            <input class="form-control" required="required" name="account_number" type="text" value="@if(old('account_number')){{old('account_number')}}@elseif(isset($edit)){{$edit->account_number}}@endif" id="account_number">
                        </div>
                        @error('account_number')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-2 col-md-6">
                        <label for="opening_balance" class="form-label">Opening Balance</label>
                        <div class="form-icon-user">
                            <span><i class="ti ti-dollar-sign"></i></span>
                            <input class="form-control" required="required" step="0.01" name="opening_balance" type="number" value="@if(old('opening_balance')){{old('opening_balance')}}@elseif(isset($edit)){{$edit->opening_balance}}@endif" id="opening_balance">
                        </div>
                        @error('opening_balance')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-2 col-md-12">
                        <label for="contact_number" class="form-label">Contact Number</label>
                        <div class="form-icon-user">
                            <span><i class="ti ti-mobile-alt"></i></span>
                            <input class="form-control" required="required" name="contact_number" type="text" value="@if(old('contact_number')){{old('contact_number')}}@elseif(isset($edit)){{$edit->contact_number}}@endif" id="contact_number">
                        </div>
                        @error('contact_number')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-2col-md-12">
                        <label for="bank_address" class="form-label">Bank Address</label>
                        <textarea class="form-control" rows="3" required="required" name="bank_address" cols="50" id="bank_address">@if(old('bank_address')){{old('bank_address')}}@elseif(isset($edit)){{$edit->bank_address}}@endif</textarea>
                        @error('bank_address')
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