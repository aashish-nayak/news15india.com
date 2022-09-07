<div class="card mt-1">
    <div class="card-header">
        <div class="text-center">
            <h5 class="m-0 text-primary-clr"><strong>{{$poll->topic}}</strong></h5>
        </div>
    </div>
    <div class="card-body">
        <div class="text-left">
            <h6 style="color: #333;word-spacing: 2px; font-weight: 800 !important;">सवाल: {{$question}}</h6>
        </div>
        <form action="{{route('poll.vote',$id)}}" method="POST" style="font-size: 15px;" class="py-3">
            @csrf
            @foreach ($options as $id => $name)
            <div class="custom-control custom-radio mb-2 px-3 py-2 rounded w-100" style="border: 1px solid #99000040">
                <input type="radio" id="option-{{$id}}" name="options[]" value="{{ $id }}">
                <label class="w-75 m-0" for="option-{{$id}}">{{$name}}</label>
            </div>
            @endforeach
            <div class="col-12 px-1">
                <div class="row row-cols-2 mx-0 justify-content-between align-items-center">
                    <div class="col px-1">
                        @if(auth('web')->check() == true || $poll->canVisitorsVote == 1)
                        <button type="submit" class="btn btn-dark" style="font-size: 15px;">वोट करे !</button>
                        @else
                        <a href="{{route('login',['redirect_to'=>route('poll',$poll->id)])}}" data-toggle="tooltip" data-placement="top" title="Login for Vote"  class="btn btn-dark" style="font-size: 15px;">वोट करे !</a>
                        @endif
                    </div>
                    <div class="col px-1">
                        <div class="d-flex justify-content-end align-items-center">
                            <a href="javascript:void(0)" onclick="clipboardCopy(this)" data-toggle="tooltip" data-placement="top" title="Copy To Clipboard" data-copy="{{route('poll',$poll->id)}}" class="clipboard mr-2 mr-md-3"><i class="fa fa-clipboard"></i></a>
                            @isset($ShareCurrent)
                            <a href="{{$ShareCurrent['whatsapp']}}"data-toggle="tooltip" data-placement="top" title="Share on WhatsApp"  style="font-size: 3.5rem" class="mr-2 mr-md-3"><i class="fab fa-whatsapp-square"></i></a>
                            <a href="{{$ShareCurrent['facebook']}}"data-toggle="tooltip" data-placement="top" title="Share on Facebook"  style="font-size: 3.5rem" class="mr-2 mr-md-3"><i class="fab fa-facebook-square"></i></a>
                            <a href="{{$ShareCurrent['twitter']}}" data-toggle="tooltip" data-placement="top" title="Share on Twitter" style="font-size: 3.5rem" class="mr-2 mr-md-3"><i class="fab fa-twitter-square"></i></a>
                            @else
                            <a href="{{$sharePoll['whatsapp']}}"data-toggle="tooltip" data-placement="top" title="Share on WhatsApp"  style="font-size: 3.5rem" class="mr-2 mr-md-3"><i class="fab fa-whatsapp-square"></i></a>
                            <a href="{{$sharePoll['facebook']}}"data-toggle="tooltip" data-placement="top" title="Share on Facebook"  style="font-size: 3.5rem" class="mr-2 mr-md-3"><i class="fab fa-facebook-square"></i></a>
                            <a href="{{$sharePoll['twitter']}}" data-toggle="tooltip" data-placement="top" title="Share on Twitter" style="font-size: 3.5rem" class="mr-2 mr-md-3"><i class="fab fa-twitter-square"></i></a>
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>