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
                                <th>ID</th>
                                <th data-orderable="false">Image</th>
                                <th>Title</th>
                                <th data-orderable="false" >Categories</th>
                                <th>Status</th>
                                <th data-orderable="false">Created by</th>
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
            columnDefs: [
                { responsivePriority: 1, targets: 0 },
                { responsivePriority: 1, targets: 2 },
                { responsivePriority: 2, targets: 1 },
                { responsivePriority: 3, targets: 4 },
                { responsivePriority: 4, targets: 6 },
                { width: "10%", targets: 1}
            ],
            ajax: "{{ route('admin.news.ajax-list') }}",
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
                    data: 'status',
                    render: function(data, type, row) {
                        if (data == 1) {
                            return '<div class="badge rounded-pill text-success bg-light-success cursor-pointer py-2 text-uppercase px-3 status" data-id="'+row.id+'" title="Change Status"><i class="bx bxs-circle align-middle me-1"></i>Active</div>';
                        } else {
                            return '<div class="badge rounded-pill text-danger bg-light-danger cursor-pointer py-2 text-uppercase px-3 status" data-id="'+row.id+'" title="Change Status"><i class="bx bxs-circle align-middle me-1"></i>Inactive</div>';
                        }
                    }
                },
                {
                    data: 'created'
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        let del = "{{route('admin.news.delete',':id')}}";
                        let edit = "{{route('admin.news.edit',':id')}}";
                        del = del.replace(':id', data.id);
                        edit = edit.replace(':id', data.id);
                        return ' <div class="d-flex order-actions">' +
                            '<a href="'+edit+'" class="edit-category border" title="Edit"><i class="bx bxs-edit"></i></a>' +
                            '<a href="'+del+'" class="text-danger ms-3 border delete" title="Trash"><i class="bx bxs-trash"></i></a>' +
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
