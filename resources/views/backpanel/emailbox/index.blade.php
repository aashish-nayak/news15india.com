@extends('layouts.backpanel.master')
@section('title', 'Email Box')
@push('plugin-css')
<style>
    .image-attachment {
        position: relative;
        border: 1px solid #ddd;
        border-radius: 0.3rem;
        background-color: rgba(55, 190, 255, 0.05);
        float: left;
        margin: 0.5rem;
        min-width: 47%;
        min-height: 250px;
        overflow: hidden;
        display: flex;
        justify-content: center;
    }

    .image-attachment .attach-details {
        color: #737677;
        padding: 0 0.5rem;
        font-size: 90%;
        white-space: nowrap;
        position: absolute;
        line-height: 1.5rem;
    }

    .image-attachment .attach-details.attach-filename {
        overflow: hidden;
        text-overflow: ellipsis;
        left: 0;
        top: 0;
        right: 0;
        padding-right: 4rem;
    }

    .image-attachment .attach-details.attach-filesize {
        right: 0;
        top: 0;
    }
    .image-attachment .attachment-links{
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        padding: 5px;
        text-align: center;
    }
</style>
@endpush
@section('sections')
<!--start email wrapper-->
@isset($error)
<div class="alert border-0 border-start border-5 border-warning alert-dismissible fade show">
    <div>{{ucwords($error)}}</div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endisset
<div class="email-wrapper">
    <div class="email-sidebar">
        <div class="email-sidebar-header d-grid">
            <a href="javascript:;" class="btn btn-primary compose-mail-btn"><i class="bx bx-plus me-2"></i> Compose</a>
        </div>
        <div class="email-sidebar-content">
            <div class="email-navigation border-0">
                <div class="list-group list-group-flush">
                    @if (!isset($error))
                    @php
                        $icons = [
                            'INBOX' => 'bxs-inbox',
                            'INBOX.Archive' => 'bx-box',
                            'INBOX.spam' => 'bxs-info-circle',
                            'INBOX.Sent' => 'bxs-send',
                            'INBOX.Drafts' => 'bxs-file-blank',
                            'INBOX.Trash' => 'bxs-trash-alt',
                            'INBOX.Junk' => 'bx-mail-send',
                        ];
                    @endphp
                    @foreach ($folders as $folder)
                    <a href="{{route('admin.emailbox.index',['mode'=>'list','mbox'=>$folder->path])}}"
                        class="list-group-item d-flex align-items-center {{($box == $folder->path) ? 'active' : ''}}">
                        <i class="bx {{$icons[$folder->path] ?? 'bxs-folder'}} me-3 font-20"></i><span>{{ucfirst($folder->name)}}</span>
                        @if($folder->messages()->unseen()->count() > 0)
                        <span
                            class="badge bg-primary rounded-pill ms-auto">{{$folder->messages()->unseen()->count()}}</span>
                        @endif
                    </a>
                    @if($folder->hasChildren())
                    @foreach ($folder->children as $subFolder)
                    <a href="{{route('admin.emailbox.index',['mode'=>'list','mbox'=>$subFolder->path])}}"
                        class="list-group-item d-flex align-items-center {{($box == $subFolder->path) ? 'active' : ''}}">
                        <i class="bx {{$icons[$subFolder->path] ?? 'bxs-folder'}} me-3 font-20"></i><span>{{ucwords($subFolder->name)}}</span>
                        @if($subFolder->messages()->unseen()->count() > 0)
                        <span
                            class="badge bg-primary rounded-pill ms-auto">{{$subFolder->messages()->unseen()->count()}}</span>
                        @endif
                    </a>
                    @endforeach
                    @endif
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if($mode == 'list')
        @include('backpanel.emailbox.includes.list-mode')
    @elseif($mode == 'read')
        @include('backpanel.emailbox.includes.read-mode')
    @endif
    <!--start compose mail-->
    <div class="compose-mail-popup">
        <div class="card">
            <div class="card-header bg-dark text-white py-2 cursor-pointer">
                <div class="d-flex align-items-center">
                    <div class="compose-mail-title">New Message</div>
                    <div class="compose-mail-close ms-auto">x</div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('admin.emailbox.compose')}}" method="post">
                    @csrf
                    <div class="email-form">
                        <div class="mb-3">
                            <input type="email" name="mailto" class="form-control" placeholder="To" required />
                        </div>
                        <div class="mb-3">
                            <input type="text" name="subject" class="form-control" placeholder="Subject" required />
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" name="message" placeholder="Message" required minlength="3" rows="10" cols="10"></textarea>
                        </div>
                        <div class="mb-0">
                            <div class="d-flex align-items-center">
                                <div class="">
                                    <div class="btn-group">
                                        <button type="submit" name="submit" value="send" class="btn btn-primary">
                                            Send
                                        </button>
                                        <button type="button"
                                            class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                                            data-bs-toggle="dropdown">
                                            <span class="visually-hidden">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu">
                                            <button type="submit" name="submit" value="draft" class="dropdown-item">Draft</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end compose mail-->
    <!--start email overlay-->
    <div class="overlay email-toggle-btn-mobile"></div>
    <!--end email overlay-->
</div>
<!--end email wrapper-->
@endsection
@push('scripts')
<script>
    new PerfectScrollbar('.email-navigation');
    $(document).ready(function () {
        $('.multi-check-mail').click(function(){
            let flag = $(this).is(':checked');
            $('.email-list a input[type="checkbox"]').attr('checked',flag);
        });
        $('.email-list a input[type="checkbox"], .multi-check-mail').change(function(){
            let flag = ($('.email-list a input[type="checkbox"]:checked').length > 0) ? false : true;
            $("#trash").attr('disabled',flag);
        });
        $("#trash").click(function(){
            var uidArray = [];
            $.each($('input[name="email_uid[]"]:checked'), function (indexInArray, element) {
                var id = $(element).val();
                var index = $.inArray(id, uidArray);
                if ( index === -1 ) {
                    uidArray.push($(element).val());
                }
            });
            $.ajax({
                type: "post",
                url: "{{route('admin.emailbox.trash')}}",
                data: {
                    "_token" : "{{csrf_token()}}",
                    'email_uids' : uidArray,
                    'folder' : "{{$box}}"
                },
                success: function (response) {
                    if(response.status == 'success'){
                        window.location.reload();
                    }
                }
            });
        });
    });
</script>
@endpush