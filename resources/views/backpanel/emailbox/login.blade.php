@extends('layouts.backpanel.master')
@section('title', 'Email Client Login')
@push('plugin-css')
@endpush
@section('sections')
<!--start email wrapper-->
<div class="row justify-content-center">
    <div class="col-md-6 col-12">
        <div class="card border-top border-0 border-4 border-dark">
            <div class="card-body py-2 px-5">
                <div class="card-title text-center"><i class="bx bx-paper-plane text-dark font-50"></i>
                    <h5 class="mb-5 mt-2 text-dark">Email Client Login</h5>
                </div>
                <hr>
                <form class="row g-3" action="{{route('admin.emailbox.login')}}" method="POST">
                    @csrf
                    <div class="col-12">
                        <label for="inputLastEnterUsername" class="form-label">Enter Email</label>
                        <div class="input-group input-group-lg"> <span class="input-group-text bg-transparent"><i class="bx bxs-user"></i></span>
                            <input type="text" name="username" class="form-control border-start-0" id="inputLastEnterUsername" value="{{auth('admin')->user()->email}}" placeholder="Enter Your Panel Email">
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="inputLastEnterPassword" class="form-label">Enter Password</label>
                        <div class="input-group input-group-lg"> <span class="input-group-text bg-transparent"><i class="bx bxs-lock-open"></i></span>
                            <input type="password" name="password" class="form-control border-start-0" id="inputLastEnterPassword" placeholder="Enter Email Client Password">
                        </div>
                    </div>
                    <div class="col-12 mb-5">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-dark btn-lg px-5"><i class="bx bxs-lock-open"></i>Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end email wrapper-->
@endsection
@push('scripts')

@endpush