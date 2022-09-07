@if(Session::has('errors'))
    <div class="alert alert-danger">
            {{ session('errors') }}
    </div>
@endif
@if(Session::has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card mt-1">
    <div class="card-header">
        <div class="text-center">
            <h5 class="m-0 text-primary-clr"><strong>{{$poll->topic}}</strong></h5>
        </div>
    </div>
    <div class="card-body">
        <div class="text-left mb-4">
            <h6 style="color: #333;word-spacing: 2px; font-weight: 800 !important;">सवाल: {{ $question }}</h6>
        </div>
        @foreach($options as $option)
            <div class='result-option-id mb-2' style="font-size:14px">
                <div class="d-flex justify-content-between align-items-center mb-1">
                    <strong>{{ $option->name }}</strong><span class='pull-right'>{{ $option->percent }}%</span>
                </div>
                <div class="progress" style="height: 1.5rem;font-size:12px">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="{{ $option->percent }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $option->percent }}%">{{ $option->percent }}% Complete</div>
                </div>
            </div>
        @endforeach
        <div class="col-12 px-1 mt-2">
            <div class="d-flex justify-content-start align-items-center">
                <div class="col px-1">
                    @auth
                    @else
                    <a href="{{route('login',['redirect_to'=>route('poll',$poll->id)])}}" data-toggle="tooltip" data-placement="top" title="Login for Vote"  class="btn btn-dark" style="font-size: 15px;">वोट करे !</a>
                    @endauth
                </div>
                <div class="col px-1">
                    <div class="d-flex justify-content-end align-items-center">
                        <a href="javascript:void(0)" onclick="clipboardCopy(this)" data-toggle="tooltip" data-placement="top" title="Copy To Clipboard" data-copy="{{route('poll',$poll->id)}}" class="clipboard mr-2 mr-md-3"><i class="fa fa-clipboard"></i></a>
                        @isset($ShareCurrent)
                        <a href="{{$ShareCurrent['whatsapp']}}" data-toggle="tooltip" data-placement="top" title="Share on WhatsApp"  style="font-size: 3.5rem" class="mr-2 mr-md-3"><i class="fab fa-whatsapp-square"></i></a>
                        <a href="{{$ShareCurrent['facebook']}}" data-toggle="tooltip" data-placement="top" title="Share on Facebook"  style="font-size: 3.5rem" class="mr-2 mr-md-3"><i class="fab fa-facebook-square"></i></a>
                        <a href="{{$ShareCurrent['twitter']}}"  data-toggle="tooltip" data-placement="top" title="Share on Twitter" style="font-size: 3.5rem" class="mr-2 mr-md-3"><i class="fab fa-twitter-square"></i></a>
                        @else
                        <a href="{{$sharePoll['whatsapp']}}" data-toggle="tooltip" data-placement="top" title="Share on WhatsApp"  style="font-size: 3.5rem" class="mr-2 mr-md-3"><i class="fab fa-whatsapp-square"></i></a>
                        <a href="{{$sharePoll['facebook']}}" data-toggle="tooltip" data-placement="top" title="Share on Facebook"  style="font-size: 3.5rem" class="mr-2 mr-md-3"><i class="fab fa-facebook-square"></i></a>
                        <a href="{{$sharePoll['twitter']}}"  data-toggle="tooltip" data-placement="top" title="Share on Twitter" style="font-size: 3.5rem" class="mr-2 mr-md-3"><i class="fab fa-twitter-square"></i></a>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>