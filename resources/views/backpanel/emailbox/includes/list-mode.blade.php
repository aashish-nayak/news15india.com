<div class="email-header d-xl-flex align-items-center">
    <div class="d-flex align-items-center">
        <div class="email-toggle-btn"><i class="bx bx-menu"></i></div>
        <div class="btn btn-white">
            <input class="form-check-input multi-check-mail" type="checkbox" />
        </div>
        <div class="">
            <a href="{{request()->fullUrl()}}" class="btn btn-white ms-2" title="Refresh">
                <i class="bx bx-refresh me-0"></i>
            </a>
        </div>
        <div class="">
            <button type="button" class="btn btn-white ms-2" disabled id="trash" title="Trash">
                <i class="bx bx-trash me-0"></i>
            </button>
        </div>
    </div>
    <div class="ms-auto d-flex align-items-center">
        <button class="btn btn-sm btn-light">{{($messages->currentPage()-1)* $messages->perPage() + 1}} - {{($messages->currentPage()-1)* $messages->perPage() + $messages->perPage()}}</button>
        {{$messages->appends(request()->input())->links('vendor.pagination.mail-pagination')}}
    </div>
</div>
<div class="email-content">
    @if (!isset($error))
    <div class="">
        <div class="email-list py-1" style="overflow-y: auto;height: 430px;">
            @foreach ($messages as $key => $message)
            <a href="{{route('admin.emailbox.index',['mode'=>'read','mbox'=>$box,'message'=>$message->uid])}}">
                <div class="d-md-flex align-items-center email-message px-3 py-1">
                    <div class="d-flex align-items-center email-actions w-auto">
                        <input class="form-check-input me-3" type="checkbox" name="email_uid[]" value="{{$message->uid}}" />
                        <p class="mb-0">{{$message->get('from')}} <br>
                            @if ($message->flags->count() > 0)
                               <span>{{$message->get('subject')}}</span>
                            @else
                               <b>{{$message->get('subject')}}</b>
                            @endif
                        </p>
                    </div>
                    <div class="ms-auto">
                        <p class="mb-0 email-time">{{date('h:iA d-M-Y',strtotime($message->get('date')))}}</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    @endif
</div>