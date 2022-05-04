@extends('layouts.backpanel.master')
@section('title', 'Trash News')
@push('plugin-css')
<link href="{{ asset('assets/plugins/input-tags/css/tagsinput.css') }}" rel="stylesheet" />
<style>
    #news .bg-secondary{
        font-size: 10px;
    }
    .custom-banner{
        border-radius: 5px;
    }
    #news tr > td{
        padding: 20px 10px;
    }
</style>
@endpush
@section('sections')
    <div class="col-12 mt-4 text-end">
        <a href="{{route('admin.news.view-all-news')}}" class="btn btn-primary mr-3 btn-sm">View News</a>
    </div>
    <div class="col-12 mt-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title m-0">Trash News</h4>
            </div>
            <div class="card-body">
                <div class="">
                    <table id="news" class="w-100 table responsive display table-striped table-bordered align-middle border table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th data-orderable="false">Image</th>
                                <th>Title</th>
                                <th data-orderable="false">Categories</th>
                                <th data-orderable="false">Deleted At</th>
                                <th data-orderable="false">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
@if (Session::has('success'))
<script>
    $(document).ready(function () {
        Swal.fire(
            'Successful!',
            "{{ Session::get('success') }}",
            'success'
        )
    });
</script>
@endisset
<script>
    $(document).ready(function() {
        $('#news').DataTable({
            processing: true,
            serverSide: true,
            // responsive:true,
            scrollX:true,
            ajax: "{{ route('admin.news.ajax-trash-news') }}",
            columnDefs : [
                { responsivePriority: 1, targets: 2 },
                { responsivePriority: 2, targets: 1 },
                { width: "10%", targets: 1}
            ],
            columns: [{
                    data: 'id'
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        let img = "{{asset('storage/media/'.':img')}}";
                        img = img.replace(':img',data.banner);
                        return '<img src="' + img + '" class="img-fluid custom-banner">';
                    }
                },
                {
                    data: 'title'
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        // console.log(data.categories);
                        var categories = data.categories.split(',');
                        var categories_html = '';
                        for (var i = 0; i < categories.length; i++) {
                            let cat = categories[i];
                            cat = cat.replace('-', ' ');
                            categories_html += '<span class="badge bg-secondary me-1">' + cat.toUpperCase() + '</span>';
                        }
                        return categories_html;
                    }
                },
                {
                    data: 'created'
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        let del = "{{route('admin.news.destroy',':id')}}";
                        let edit = "{{route('admin.news.restore',':id')}}";
                        del = del.replace(':id', data.id);
                        edit = edit.replace(':id', data.id);
                        return ' <div class="d-flex order-actions">' +
                            '<a href="'+edit+'" class="edit-category border" title="Restore"><i class="bx bx-reset"></i></a>' +
                            '<a href="'+del+'" class="text-danger ms-3 border delete" title="Delete"><i class="bx bxs-trash"></i></a>' +
                        '</div>';
                    }
                },
            ]
        });
        $(document).on("click",".delete",function (e) {
            var url = $(this).attr("href");
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You Want to Permanently Delete this News!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            })
        });
    });
</script>
@endpush
