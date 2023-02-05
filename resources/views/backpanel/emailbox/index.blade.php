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
<div class="email-wrapper">
    <div class="email-sidebar">
        <div class="email-sidebar-header d-grid">
            <a href="javascript:;" class="btn btn-primary compose-mail-btn"><i class="bx bx-plus me-2"></i> Compose</a>
        </div>
        <div class="email-sidebar-content">
            <div class="email-navigation border-0">
                <div class="list-group list-group-flush">
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
                        @if($folder->messages()->all()->count() > 0)
                        <span
                            class="badge bg-primary rounded-pill ms-auto">{{$folder->messages()->all()->count()}}</span>
                        @endif
                    </a>
                    @if($folder->hasChildren())
                    @foreach ($folder->children as $subFolder)
                    <a href="{{route('admin.emailbox.index',['mode'=>'list','mbox'=>$subFolder->path])}}"
                        class="list-group-item d-flex align-items-center {{($box == $subFolder->path) ? 'active' : ''}}">
                        <i class="bx {{$icons[$subFolder->path] ?? 'bxs-folder'}} me-3 font-20"></i><span>{{ucwords($subFolder->name)}}</span>
                        @if($subFolder->messages()->all()->count() > 0)
                        <span
                            class="badge bg-primary rounded-pill ms-auto">{{$subFolder->messages()->all()->count()}}</span>
                        @endif
                    </a>
                    @endforeach
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="email-header d-xl-flex align-items-center">
        <div class="d-flex align-items-center">
            <div class="email-toggle-btn"><i class="bx bx-menu"></i></div>
            <div class="btn btn-white">
                <input class="form-check-input" type="checkbox" />
            </div>
            <div class="">
                <a href="{{request()->fullUrl()}}" class="btn btn-white ms-2">
                    <i class="bx bx-refresh me-0"></i>
                </a>
            </div>
            <div class="">
                <button type="button" class="btn btn-white ms-2">
                    <i class="bx bx-downvote me-0"></i>
                </button>
            </div>
            <div class="d-none d-md-flex">
                <button type="button" class="btn btn-white ms-2">
                    <i class="bx bx-file me-0"></i>
                </button>
            </div>
            <div class="">
                <button type="button" class="btn btn-white ms-2">
                    <i class="bx bx-trash me-0"></i>
                </button>
            </div>
        </div>
        {{-- <div class="flex-grow-1 mx-xl-2 my-2 my-xl-0">
            <div class="input-group">
                <span class="input-group-text bg-transparent"><i class="bx bx-search"></i></span>
                <input type="text" class="form-control" placeholder="Search mail" />
            </div>
        </div> --}}
        <div class="ms-auto d-flex align-items-center">
            <button class="btn btn-sm btn-light">1-10</button>
            <button class="btn btn-white px-2 ms-2">
                <i class="bx bx-chevron-left me-0"></i>
            </button>
            <button class="btn btn-white px-2 ms-2">
                <i class="bx bx-chevron-right me-0"></i>
            </button>
        </div>
    </div>
    <div class="email-content">
        <div class="">
            @if($mode == 'list')
            <div class="email-list">
                @foreach ($messages as $message)
                <a href="{{route('admin.emailbox.index',['mode'=>'read','mbox'=>$box,'message'=>$message->uid])}}">
                    <div class="d-md-flex align-items-center email-message px-3 py-1">
                        <div class="d-flex align-items-center email-actions w-auto">
                            <input class="form-check-input me-3" type="checkbox" value="" />
                            <p class="mb-0">{{$message->get('from')}} <br><b>{{$message->get('subject')}}</b></p>
                        </div>
                        <div class="ms-auto">
                            <p class="mb-0 email-time">{{date('h:iA d-M-Y',strtotime($message->get('date')))}}</p>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
            @elseif($mode == 'read')
            <div class="email-read-box p-3" style="overflow-y: auto;height: 430px;">
                <h4>{{$readMessage->get('subject')}}</h4>
                <hr>
                <div class="d-flex align-items-center">
                    <img src="{{asset('assets/images/avatars/avatar-1.png')}}" width="42" height="42" class="rounded-circle" alt="" />
                    <div class="flex-grow-1 ms-2">
                        <p class="mb-0 font-weight-bold">{{$readMessage->get('sender')}}</p>
                        <div class="dropdown">
                            <div>to me</div>
                        </div>
                    </div>
                    <p class="mb-0 chat-time ps-5 ms-auto">{{date('M d,Y h:iA',strtotime($readMessage->get('date')))}}
                        ({{\Carbon\Carbon::parse($readMessage->get('date'))->diffForHumans()}})</p>
                </div>
                <div class="email-read-content p-1 p-md-2">
                    {!!$readMessage->getHTMLBody()!!}
                </div>
                @if($readMessage->hasAttachments())
                @foreach ($readMessage->getAttachments() as $attach)
                @if($attach->mask()->content_type != 'application/octet-stream')
                <div class="p-4 image-attachment">
                    @if($attach->mask()->content_type == 'image/png')
                    <img src="{{$attach->mask()->getImageSrc()}}" style="width: 240px;" alt="attachment">
                    @endif
                    <span class="attach-details attach-filename">{{$attach->mask()->name}}</span>
                    <span class="attach-details attach-filesize">{{formatBytes($attach->mask()->size)}}</span>
                    <span class="attachment-links">
                        <a href="{{$attach->mask()->getImageSrc()}}" class="mb-3" download="{{$attach->mask()->name}}">
                            <i class="bx bx-download"></i>
                            Download
                        </a>
                    </span>
                </div>
                @endif
                @endforeach
                @endif
            </div>
            @endif
        </div>
    </div>
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
                <div class="email-form">
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="To" />
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Subject" />
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" placeholder="Message" rows="10" cols="10"></textarea>
                    </div>
                    <div class="mb-0">
                        <div class="d-flex align-items-center">
                            <div class="">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary">
                                        Action
                                    </button>
                                    <button type="button"
                                        class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                                        data-bs-toggle="dropdown">
                                        <span class="visually-hidden">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:;">Action</a>
                                        <a class="dropdown-item" href="javascript:;">Another action</a>
                                        <a class="dropdown-item" href="javascript:;">Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="javascript:;">Separated link</a>
                                    </div>
                                </div>
                            </div>
                            <div class="ms-2">
                                <button type="button" class="btn border-0 btn-sm btn-white">
                                    <i class="lni lni-text-format"></i>
                                </button>
                                <button type="button" class="btn border-0 btn-sm btn-white">
                                    <i class="bx bx-link-alt"></i>
                                </button>
                                <button type="button" class="btn border-0 btn-sm btn-white">
                                    <i class="lni lni-emoji-tounge"></i>
                                </button>
                                <button type="button" class="btn border-0 btn-sm btn-white">
                                    <i class="lni lni-google-drive"></i>
                                </button>
                            </div>
                            <div class="ms-auto">
                                <button type="button" class="btn border-0 btn-sm btn-white">
                                    <i class="lni lni-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
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
    if(document.querySelectorAll('.email-list').length > 0){
        new PerfectScrollbar('.email-list');
    }
</script>
@endpush