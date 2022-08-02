@extends('layouts.backpanel.master')
@section('title', 'Media')
@section('sections')
    <div class="row">
        <div class="col-12 mt-4 text-end">
            {{-- <a href="javacript:void(0)" class="btn btn-primary mr-3 btn-sm">Add News</a> --}}
            <button class="btn btn-success mr-3 btn-sm" id="bulk-select">Select Multiple</button>
        </div>
        <div class="col-12 mt-3">
            <div class="card ">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-danger" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#upload" role="tab" aria-selected="true">
                                <div class="tab-title">Upload New Files</div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="tab" href="#gallery" role="tab"
                                aria-selected="false">
                                <div class="tab-title">Images Library</div>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content mt-3 " id="myTabContent">
                        <div class="tab-pane fade" id="upload" role="tabpanel" aria-labelledby="upload-tab">
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Error!</strong> {{ $error }}
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endforeach
                            @endif
                            <form action="{{ Route('admin.media.create') }}" method="post" id="upload-form" enctype="multipart/form-data">
                                @csrf
                                <input type="file" class="" hidden name="file[]" multiple accept="image/*" id="uploader">
                            </form>
                            <div class="col-12">
                                <label class="uploader tab-height row" for="uploader">
                                    <div class="col-12 align-self-center"><i class="fadeIn animated bx bx-upload" style="font-size: 75px"></i><br>Upload Files</div>
                                </label>
                            </div>
                        </div>
                        <div class="tab-pane fade active show" id="gallery" role="tabpanel" aria-labelledby="gallery-tab">
                            <div class="row">
                                <div class="col-md-8 position-relative">
                                    <div class="row h-100 pb-5" id="imgs-row">
                                        @include('backpanel.media.media-paginate')
                                    </div>
                                </div>
                                <div class="col-md-4 border-start py-3">
                                    <div class="row px-0">
                                        <div class="col-5">
                                            <div style="height:100px">
                                                <img class="img-fluid up-file" id="image"
                                                    src="https://via.placeholder.com/150" />
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div><b class="media-title" id="name">FileName</b></div>
                                            <div><span class="media-size" id="dimen">Dimesion</span></div>
                                            <div><span class="media-weight" id="size">Size</span></div>
                                            <div><span class="media-type" id="type">File Type</span></div>
                                            <a href="" class="text-danger" id="delete">Delete definitely</a>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="sidebar-body">
                                        <form action="{{ Route('admin.media.update') }}" method="POST" id="update-form">
                                            <input type="hidden" id="input-id" name="id">
                                            @csrf
                                            <div class="form-group m-0 mb-2">
                                                <label for="input-name" class="col-form-label">Name</label>
                                                <input class="form-control form-control-sm" type="text" name="filename"
                                                    value="" id="input-name">
                                            </div>
                                            <div class="form-group m-0 mb-2">
                                                <label for="input-alt" class="col-form-label">Alt name</label>
                                                <input class="form-control form-control-sm" name="alt_name" type="text"
                                                    value="" id="input-alt">
                                            </div>
                                            <div class="form-group m-0 mb-2">
                                                <label class="col-form-label" for="input-path">Path</label>
                                                <div class="input-group mb-2">
                                                    <input type="text" class="form-control form-control-sm" id="input-path"  name="path" value="" readonly>
                                                    <a href="javascript:void(0)" class="input-group-prepend" style="cursor: pointer" onclick="copy()" title="Copy to Clipboard">
                                                        <div class="input-group-text"><i class="fadeIn animated bx bx-clipboard"></i></div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="form-group m-0 mb-2">
                                                <label class="col-form-label" for="input-path">Image ID</label>
                                                <div class="input-group mb-2">
                                                    <input type="text" class="form-control form-control-sm" id="input-imgid" value="" readonly>
                                                    <a href="javascript:void(0)" class="input-group-prepend" style="cursor: pointer" onclick="copyID()" title="Copy to Clipboard">
                                                        <div class="input-group-text"><i class="fadeIn animated bx bx-clipboard"></i></div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="form-group m-0 mb-2">
                                                <input type="submit" id="submitchange" disabled class="btn btn-primary btn-sm" value="Save Changes">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="copied-success" class="copied">
        <span>Copied!</span>
    </div>
@endsection
@push('scripts')
<script>
    function copy() {
        var copyText = document.getElementById("input-path");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        document.execCommand("copy");
        $('#copied-success').fadeIn(800);
        $('#copied-success').fadeOut(800);
    }
    function copyID() {
        var copyText = document.getElementById("input-imgid");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        document.execCommand("copy");
        $('#copied-success').fadeIn(800);
        $('#copied-success').fadeOut(800);
    }
    $(document).ready(function() {
        $("#delete").on("click",function (e) {
            var url = $(this).attr("href");
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You Want to delete this Image!",
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
        $("#uploader").change(function() {
            $("#upload-form").submit();
            $("#uploader").prop("disabled",true);
        });
        function fetch_data(page) {
            $.ajax({
                url: "{{ route('admin.media.fetch') }}" + "?page=" + page,
                success: function(data) {
                    $('#imgs-row').html(data);
                    $("#imgs-row").find(".file").each(function () {
                        if(bulkId.includes($(this).data('id')) == true){
                            $(this).addClass("file-selected");
                        }
                    });
                }
            });
        }
        var bulk = false;
        var bulkId = [];
        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        });
        $(document).on('click','#bulk-select',function () {
            if(bulk === true){
                $(document).find(".file").removeClass("file-selected");
                $(document).find("#bulk-delete").remove();
                $(this).text('Select Multiple');
                $(this).removeClass('btn-secondary');
                $(this).addClass('btn-success');
                bulk = false;
                bulkId = [];
            }else{
                $(this).before('<button class="btn btn-danger btn-sm me-3" id="bulk-delete">Bulk Delete</button>');
                $(this).removeClass('btn-success');
                $(document).find(".file").removeClass("file-selected");
                $(this).addClass('btn-secondary');
                $(this).text('Cancel');
                bulk = true;
            }
        });
        $(document).on('click','#bulk-delete',function (e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You Want to Bulk Delete Images!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    var url = "{{ route('admin.media.bulk.delete') }}";
                    var data = {
                        "_token": "{{ csrf_token() }}",
                        ids: bulkId
                    };
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: data,
                        beforeSend: function() {
                            $("#bulk-delete").prop('disabled',true);
                        },
                        success: function(data) {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            ).then(function() {
                                location.reload();
                            });
                        }
                    });
                }
            })
        });
        $(document).on('click', ".file", function() {
            $("#submitchange").prop("disabled",false);
            if(bulk === true){
                $(this).toggleClass("file-selected");
                var selected = $(document).find(".file-selected");
                $(this).hasClass("file-selected") ? bulkId.push($(this).data('id')) : bulkId.splice(bulkId.indexOf($(this).data('id')),1);
            }else{
                $(document).find(".file").removeClass("file-selected");
                $(this).toggleClass("file-selected");
            }
            $("#bulk-delete").text(bulkId.length + ' Bulk Delete');
            $("#image").attr("src", $(this).data('path'));
            let name = $(this).data('name');
            if (name.length > 50) name = name.substring(0, 50);
            $("#name").html(name);
            $("#dimen").html($(this).data('dimen'));
            $("#size").html($(this).data('size'));
            $("#type").html($(this).data('type'));
            let delurl = "{{ Route('admin.media.delete', ':id') }}";
            delurl = delurl.replace(':id', $(this).data('id'));
            $("#delete").attr('href', delurl);
            // form 
            $("#input-id").val($(this).data('id'));
            $("#input-name").val($(this).data('name'));
            $("#input-alt").val($(this).data('alt'));
            $("#input-path").val($(this).data('path'));
            $("#input-imgid").val($(this).data('id'));
        });

        $("#update-form").on("submit", function(e) {
            e.preventDefault();
            $("#submitchange").prop("disabled",true);
            let form = $(this);
            $.ajax({
                url: form.attr('action'),
                type: "POST",
                data: form.serialize(),
                dataType: "json",
                success: function(data) {
                    if (data.status == "success") {
                        $("#submitchange").prop("disabled",false);
                        fetch_data(1);
                        Swal.fire(
                            'Successful!',
                            data.message,
                            'success'
                        );
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: data.message,
                        })
                    }
                }
            });
        });
    });
</script>
@endpush
