<!--Top Header Strip  -->
<div class="small-top d-md-block d-none">
    <div class="container-fluid mx-auto">
        <div class="row justify-content-between align-items-center">
            <div class="col-md-2 d-none d-md-block d-md-flex justify-content-start">
                <div class="social-icon">
                    @php
                    $socials = json_decode(setting('site_social_links'));
                    @endphp
                    @if($socials != null)
                    @foreach ($socials as $social)         
                    <a target="_blank" href="{{$social->url}}" class="{{$social->icon}}"></a>
                    @endforeach
                    @endif
                </div>
            </div>
            <div class="col-md-5 d-none d-md-flex justify-content-center date-time text-center align-items-center">
                <p class="m-0 date-time mr-5">
                    <span id="day" class=""></span> : <span class="" id="datetime"></span>
                </p>
                <p class="m-0 date-time">
                    <span class="weather-icon" style="border-radius:4px; padding: 3px; background: slategray;"></span> | <span class="temperature-value"></span> | <span class="location"></span>
                </p>
            </div>
            <div class="col-md-5 d-none d-md-block login-singup pr-1 text-right">
                <a href="javascript:void(0)" class="google-play"><i class="fas fa-newspaper"></i> E-Paper</a>
                <a href="javascript:void(0)" class="google-play"><i class="fas fa-download"></i> Download App</a>
                <a href="javascript:void(0)" class="google-play" id="my-notification-button">Notification</a>
                @auth('web')
                <a href="{{route('dashboard')}}" class="google-play"><i class="fas fa-user"></i> Profile</a>
                @else
                <a href="{{route('login')}}" class="google-play"><i class="fas fa-user"></i> Login / Signup</a>
                @endauth
                {{-- <a href="javascript:void(0)" class="google-play" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-user"></i> Login / Signup</a> --}}
            </div>
        </div>
    </div>
</div>
<!--Top Header Strip End  -->