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
            <h4 class="m-0 text-primary-clr"><strong>Public Survey</strong></h4>
        </div>
    </div>
    <div class="card-body">
        <div class="text-left mb-4">
            <h5>Poll: {{ $question }}</h5>
        </div>
        @foreach($options as $option)
            <div class='result-option-id mb-3' style="font-size:14px">
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
                @isset($ShareCurrent)
                <a href="{{$ShareCurrent['whatsapp']}}" style="font-size: 3.5rem" class="mr-2 mr-md-3"><i class="fab fa-whatsapp-square"></i></a>
                <a href="{{$ShareCurrent['facebook']}}" style="font-size: 3.5rem" class="mr-2 mr-md-3"><i class="fab fa-facebook-square"></i></a>
                <a href="{{$ShareCurrent['twitter']}}" style="font-size: 3.5rem" class="mr-2 mr-md-3"><i class="fab fa-twitter-square"></i></a>
                @else
                <a href="{{$sharePoll['whatsapp']}}" style="font-size: 3.5rem" class="mr-2 mr-md-3"><i class="fab fa-whatsapp-square"></i></a>
                <a href="{{$sharePoll['facebook']}}" style="font-size: 3.5rem" class="mr-2 mr-md-3"><i class="fab fa-facebook-square"></i></a>
                <a href="{{$sharePoll['twitter']}}" style="font-size: 3.5rem" class="mr-2 mr-md-3"><i class="fab fa-twitter-square"></i></a>
                @endisset
            </div>
        </div>
    </div>
</div>