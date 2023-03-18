<div class="email-header d-xl-flex align-items-center">
    <div class="d-flex align-items-center">
        <div class="email-toggle-btn"><i class="bx bx-menu"></i></div>
        <div class="">
            <a href="{{ URL::previous() }}" class="btn btn-white ms-2" title="Back">
                <i class="bx bx-left-arrow-alt me-0"></i>
            </a>
        </div>
        <div class="">
            <a href="{{request()->fullUrl()}}" class="btn btn-white ms-2" title="Refresh">
                <i class="bx bx-refresh me-0"></i>
            </a>
        </div>
        <div class="">
            <a href="{{route('admin.emailbox.trash',['folder'=>$box,'email_uids'=>$readMessage->get('uid')])}}" class="btn btn-white ms-2"
                title="Trash">
                <i class="bx bx-trash me-0"></i>
            </a>
        </div>
    </div>
</div>
<div class="email-content">
    @if (!isset($error))
    <div class="">
        <div class="email-read-box p-3" style="overflow-y: auto;height: 430px;">
            <h4>{{$readMessage->get('subject')}}</h4>
            <hr>
            <div class="d-flex align-items-center">
                <img src="https://eu.ui-avatars.com/api/?name={{strip_tags($readMessage->get('sender'))}}&size=250" width="42" height="42" class="rounded-circle" alt="" />
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
    </div>
    @endif
</div>