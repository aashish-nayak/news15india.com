@extends('layouts.backpanel.master')
@section('title', 'Media')
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/alertify.min.css" integrity="sha512-IXuoq1aFd2wXs4NqGskwX2Vb+I8UJ+tGJEu/Dc0zwLNKeQ7CW3Sr6v0yU3z5OQWe3eScVIkER4J9L7byrgR/fA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
@endpush
@section('sections')
    <div class="row">
        <div class="col-12 mt-5">
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
                            <form action="{{ Route('admin.media.create') }}" method="post" id="upload-form"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="file" class="" hidden name="file[]" multiple accept="image/*" id="uploader">
                            </form>
                            <div class="col-12">
                                <label class="uploader tab-height row" for="uploader">
                                    <div class="col-12 align-self-center"><i class="fa fa-upload" style="font-size: 75px"></i><br>Upload Files</div>
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
                                <div class="col-md-4 border-left py-3">
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
                                                    <input type="text" class="form-control form-control-sm" id="input-path"
                                                        name="path" value="" readonly>
                                                    <a href="javascript:void(0)" class="input-group-prepend"
                                                        style="cursor: pointer" onclick="copy()" title="Copy to Clipboard">
                                                        <div class="input-group-text"><i class="fa fa-clipboard"></i></div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="form-group m-0 mb-2">
                                                <input type="submit" class="btn btn-primary btn-sm" value="Save Changes">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js" integrity="sha512-JnjG+Wt53GspUQXQhc+c4j8SBERsgJAoHeehagKHlxQN+MtCCmFDghX9/AcbkkNRZptyZU4zC8utK59M5L45Iw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function copy() {
            var copyText = document.getElementById("input-path");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            document.execCommand("copy");
            $('#copied-success').fadeIn(800);
            $('#copied-success').fadeOut(800);
        }
        $(document).ready(function() {
            $("#uploader").change(function() {
                $("#upload-form").submit();
            });

            function fetch_data(page) {
                $.ajax({
                    url: "{{ route('admin.media.fetch') }}" + "?page=" + page,
                    success: function(data) {
                        $('#imgs-row').html(data);
                    }
                });
            }
            $(document).on('click', '.pagination a', function(e) {
                e.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });
            $(document).on('click', ".file", function() {
                $(document).find(".file").removeClass('file-selected');
                $(this).addClass("file-selected");
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
            });

            $("#update-form").on("submit", function(e) {
                e.preventDefault();
                let form = $(this);
                $.ajax({
                    url: form.attr('action'),
                    type: "POST",
                    data: form.serialize(),
                    dataType: "json",
                    success: function(data) {
                        if (data.status == "success") {
                            fetch_data(1);
                            alertify.success(data.message);
                        } else {
                            alertify.error(data.message);
                        }
                    }
                });
            });
        });
    </script>
@endpush
