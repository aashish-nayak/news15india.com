@extends('layouts.backpanel.master')
@section('title', 'News')
@push('plugin-css')

@endpush
@section('sections')
    <div class="col-12 mt-4 text-end">
        <a href="{{route('admin.news.create')}}" class="btn btn-primary mr-3 btn-sm">Add News</a>
        <a href="{{route('admin.news.trash-news')}}" class="btn btn-danger mr-3 btn-sm">View Trash</a>
    </div>
    <div class="col-12 mt-2">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title m-0">News</h4>
            </div>
            <div class="card-body">
                <div class="">
                    <table id="news" class="w-100 table responsive display table-striped table-bordered align-middle border table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th data-orderable="false"><input type="checkbox" value="all"/></th>
                                <th>ID</th>
                                <th data-orderable="false">Image</th>
                                <th>Title</th>
                                <th data-orderable="false" >Categories</th>
                                <th>Status</th>
                                <th data-orderable="false">Reporter</th>
                                <th data-orderable="false">Views</th>
                                <th data-orderable="false">Time/Date</th>
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
<script>
    $(document).ready(function() {
        $('#news').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            stateSave : true,
            scrollX : true,
            "columnDefs": [
                { "width": "5px", "targets": 0 },
                { "responsivePriority" : 1, "width": "2%", "targets": 1 },
                { "responsivePriority" : 2, "width": "15%", "targets": 2 },
                { "responsivePriority" : 3, "width": "50%", "targets": 3 },
                { "responsivePriority" : 3, "width": "10%", "targets": 4 },
                { "responsivePriority" : 4, "width": "10%", "targets": 9 },
            ],
            "order": [[1, 'asc']],
            deferRender: true,
            ajax: "{{ route('admin.news.ajax-list') }}",
            columns: [
                {
                    data: 'id',
                    render: function(data, type, row) {
                        return '<input type="checkbox" value="' + row.id + '"/>';
                    }
                },
                {
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
                    data: 'title',
                    className: 'fw-bold',
                },
                {
                    data: null,
                    render: function(data, type, row) {
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
                    data: 'status',
                    render: function(data, type, row) {
                        if (data == 1) {
                            return '<div class="badge rounded-pill text-success bg-light-success cursor-pointer text-uppercase status" data-id="'+row.id+'" title="Change Status"><i class="bx bxs-circle align-middle me-1"></i>Active</div>';
                        } else {
                            return '<div class="badge rounded-pill text-danger bg-light-danger cursor-pointer text-uppercase status" data-id="'+row.id+'" title="Change Status"><i class="bx bxs-circle align-middle me-1"></i>Inactive</div>';
                        }
                    }
                },
                {
                    data: 'created_by',
                    className: 'fw-bold',
                },
                {
                    data: 'views'
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return `<div class="fw-bold text-muted border-bottom border-success py-1 mb-1">${data.created_at}</div>
                        <div class="text-muted fw-bold">${data.created_date}</div>`;
                    }
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        let del = "{{route('admin.news.delete',':id')}}";
                        let edit = "{{route('admin.news.edit',':id')}}";
                        let view = "{{route('single-news',':slug')}}";
                        del = del.replace(':id', data.id);
                        edit = edit.replace(':id', data.id);
                        view = view.replace(':slug',data.slug);
                        return '<div class="row row-cols-2 order-actions justify-content-center gap-1">' +
                            '<a href="'+edit+'" class="col edit-category border border-dark" title="Edit"><i class="bx bxs-edit"></i></a>' +
                            '<a href="'+del+'" class="col delete text-danger border border-dark" title="Trash"><i class="bx bxs-trash"></i></a>' +
                            '<a href="'+view+'" class="col text-dark border border-dark" target="_blank"><i class="bx bxs-show"></i></a>' +
                            '<a href="javascript:void(0)" class="col text-dark border border-dark"><i class="bx bxs-download"></i></a>' +
                        '</div>';
                    }
                },
            ]
        });
        $(document).on('click',".status",function () {
            var parent = $(this);
            var id = $(this).data('id');
            var url = "{{route('admin.news.status',':id')}}";
            url = url.replace(':id',id);
            $.ajax({
                type: "GET",
                url: url,
                success: function(data) {
                    if(data.success){
                        if($(parent).html()=='<i class="bx bxs-circle align-middle me-1"></i>Active'){
                            $(parent).removeClass("text-success bg-light-success");
                            $(parent).addClass("text-danger bg-light-danger");
                            $(parent).html('<i class="bx bxs-circle align-middle me-1"></i>Inactive');
                        }else{
                            $(parent).addClass("text-success bg-light-success");
                            $(parent).removeClass("text-danger bg-light-danger");
                            $(parent).html('<i class="bx bxs-circle align-middle me-1"></i>Active');
                        }
                    }
                }
            });
        });
        $(document).on("click",".delete",function (e) {
            var url = $(this).attr("href");
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You Want to Trash this News!",
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
