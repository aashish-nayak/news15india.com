<div class="card mt-1">
    <div class="card-header">
        <div class="text-center">
            <h4 class="m-0 text-primary-clr"><strong>Public Survey</strong></h4>
        </div>
    </div>
    <div class="card-body">
        <div class="text-left">
            <h6 class="">
                {{$question}}
            </h6>
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
                        @auth
                        <button type="submit" class="btn btn-dark" style="font-size: 15px;">VOTE</button>
                        @else
                        <a href="{{route('login',['redirect_to'=>route('poll',$poll->id)])}}" class="btn btn-dark" style="font-size: 15px;">Login</a>
                        @endauth
                    </div>
                    <div class="col px-1">
                        <div class="d-flex justify-content-end align-items-center">
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
        </form>
    </div>
</div>