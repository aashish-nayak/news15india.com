<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
  </head>
  <body>
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                {{-- <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th data-orderable="false"><input type="checkbox" class="checkboxes" name="id[]" value="all"/></th>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Categories</th>
                            <th>Status</th>
                            <th>Reporter</th>
                            <th>Views</th>
                            <th>Time/Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table> --}}
                {!! $dataTable->table() !!}
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    {{-- <script>
        $(document).ready(function () {
            $('#example').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route("test") !!}',
                columns: [
                    { data: 'selectbox', name: 'selectbox' },
                    { data: 'id', name: 'id' },
                    { data: 'image', name: 'image' },
                    { data: 'title', name: 'title' },
                    { data: 'admin_id', name: 'admin_id' },
                    { data: 'status', name: 'status' },
                    { data: 'image', name: 'image' },
                    { data: 'admin_id', name: 'admin_id' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'created_at', name: 'created_at' },
                ]
            });
        });
    </script> --}}
    {!!$dataTable->scripts()!!}
  </body>
</html>