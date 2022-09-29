@extends('layouts.backpanel.master')
@section('title', 'Application Form')
@push('plugin-css')
@endpush
@section('sections')
    <div class="col-12 mt-2">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="col-md-6">
                    <h4 class="card-title m-0 d-flex align-items-center"><i class="bx bx-group fs-3 mt-1 me-2"></i>
                        <span>Application Form</span>
                    </h4>
                </div>
            </div>
            <div class="card-body">
                {!! $dataTable->table() !!}
            </div>
        </div>
    </div>
@endsection
@push('plugin-scripts')
    {!! $dataTable->scripts() !!}

    <script>
        $(document).ready(function () {
            $(document).on("click",".delete",function (e) {
                var url = $(this).attr("href");
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You Want to move this News in Trash!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Trash it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            });
        });
    </script>
@endpush
