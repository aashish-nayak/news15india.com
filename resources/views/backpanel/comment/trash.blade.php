@extends('layouts.backpanel.master')
@section('title', 'Trash Comments')
@push('plugin-css')

@endpush
@section('sections')
    <div class="col-12 mt-4 text-end">
        <a href="{{route('admin.comment.comments')}}" class="btn btn-primary mr-3 btn-sm">View Comments</a>
    </div>
    <div class="col-12 mt-2">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title m-0">Trash Comments</h4>
            </div>
            <div class="card-body">
                <div class="">
                    <table id="comments" class="w-100 table responsive display table-striped table-bordered align-middle border table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th data-orderable="false"><input type="checkbox" value="all"/></th>
                                <th>Comment</th>
                                <th data-orderable="false">News</th>
                                <th data-orderable="false">User</th>
                                <th>Is Approved</th>
                                <th data-orderable="false">Date</th>
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
        $('#comments').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            stateSave : true,
            scrollX : true,
            "order": [[1, 'asc']],
            deferRender: true,
            ajax: "{{ route('admin.comment.ajax-trash-comments') }}",
            columns: [
                {
                    data: 'id',
                    render: function(data, type, row) {
                        return '<input type="checkbox" value="' + row.id + '"/>';
                    }
                },
                {
                    data: 'comment',
                },
                {
                    data: 'news',
                },
                {
                    data: 'user'
                },
                {
                    data: 'approved',
                    render: function(data, type, row) {
                        if (data == 1) {
                            return '<div class="badge rounded-pill text-success bg-light-success text-uppercase"><i class="bx bxs-circle align-middle me-1"></i>Approved</div>';
                        } else {
                            return '<div class="badge rounded-pill text-danger bg-light-danger text-uppercase"><i class="bx bxs-circle align-middle me-1"></i>Pending</div>';
                        }
                    }
                },
                {
                    data: 'created',
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        let restore = "{{route('admin.comment.restore',':id')}}";
                        let del = "{{route('admin.comment.destroy',':id')}}";
                        del = del.replace(':id', data.id);
                        restore = restore.replace(':id', data.id);
                        return `<div class="dropdown">
                            <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Action</button>
                            <ul class="dropdown-menu" style="margin: 0px;">
                                <li><a class="dropdown-item" href="${restore}"><i class="bx bx-reset"></i> Restore</a></li>
                                <li><a class="dropdown-item delete" href="${del}"><i class="bx bx-x"></i> Delete Permanently</a></li>
                            </ul>
                        </div>`;
                    }
                },
            ]
        });
        $(document).on("click",".delete",function (e) {
            var url = $(this).attr("href");
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You Want to Delete Permanently this Comment!",
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
    });
</script>
@endpush
