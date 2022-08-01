<!-- Sidebar Nav  -->
<div class="over_lay"></div>
<div id="mySidenav" class="sidenav mx-auto">
    <div class="list_box">
        <div class="sidebar">
            <div class="user_actions">
                <div class="menu_search mb-4">
                    <a href="javascript:void(0)" class="p-4" onclick="openNav()">
                        <i class="far fa-times"></i>
                    </a>
                </div>
                <div class="menu_search">
                    <a href="javascript:void(0)" class="p-4" onclick="searchPop()">
                        <i class="far fa-search"></i>
                    </a>
                </div>
                <div class="menu_social">
                    <div class="connectus">
                        <p>SOCIAL</p>
                        <a rel="noopener" href="javascript:void(0)" target="_blank">
                            <img data-src="{{ asset('front-assets/img/sidebar-icons/social-facebook.svg') }}"
                                alt="facebook" class=" lazyloaded"
                                src="{{ asset('front-assets/img/sidebar-icons/social-facebook.svg') }}">
                        </a>
                        <a rel="noopener" href="javascript:void(0)" target="_blank">
                            <img data-src="{{ asset('front-assets/img/sidebar-icons/social-twitter.svg') }}"
                                alt="twitter" class=" lazyloaded"
                                src="{{ asset('front-assets/img/sidebar-icons/social-twitter.svg') }}">
                        </a>
                        <a rel="noopener" href="javascript:void(0)" target="_blank">
                            <img data-src="{{ asset('front-assets/img/sidebar-icons/social-youtube.svg') }}"
                                alt="youtube" class=" lazyloaded"
                                src="{{ asset('front-assets/img/sidebar-icons/social-youtube.svg') }}">
                        </a>
                    </div>
                    <p>APPS</p>
                    <a rel="noopener" href="javascript:void(0)" target="_blank">
                        <img data-src="{{ asset('front-assets/img/sidebar-icons/menu_android.svg') }}"
                            alt="Andrioid APP" class=" lazyloaded"
                            src="{{ asset('front-assets/img/sidebar-icons/menu_android.svg') }}">
                    </a>
                    <a rel="noopener" href="javascript:void(0)" target="_blank">
                        <img data-src="{{ asset('front-assets/img/sidebar-icons/menu_ios.svg') }}" alt="IOS APP"
                            class=" lazyloaded" src="{{ asset('front-assets/img/sidebar-icons/menu_ios.svg') }}">
                    </a>
                </div>
            </div>
            <div class="user_menus">
                <ul class="list-group">
                    <li>
                        <a href="{{route('home')}}" class="list-group-item d-flex align-items-center">
                            <span class="badge badge-primary badge-pill"><i class="fa fa-home-alt"></i></span>
                            होम
                        </a>
                    </li>
                    <li class="position-relative">
                        <a href="javascript:void(0)" class="list-group-item d-flex align-items-center">
                            <span class="badge badge-primary badge-pill"><i class="far fa-tv-retro"></i></span>
                            Live
                        </a>
                        <a class="sidenav-dropbtn" role="button">
                            <i class="far fa-dot-circle text-danger"></i>
                        </a>
                    </li>
                    @foreach ($sideMenu->parentMenuNodes as $menu)
                    @if ($menu->has_child)
                    <li class="position-relative">
                        <a href="{{$menu->url}}" target="{{$menu->target}}" class="list-group-item d-flex align-items-center">
                            @if($menu->icon)
                            <span class="badge badge-primary badge-pill">{!!$menu->icon!!}</span>
                            @endif 
                            {{$menu->title}}
                        </a>
                        <a class="sidenav-dropbtn" data-toggle="collapse" href="#collapse{{$menu->id}}" role="button"
                            aria-expanded="false" aria-controls="collapse{{$menu->id}}">
                            <i class="fa fa-plus"></i></span>
                        </a>
                        <div class="collapse mb-2" id="collapse{{$menu->id}}">
                            <div class="collapse_container">
                                <ul>
                                    @foreach ($menu->child as $subMenu)
                                    <li>
                                        <a href="{{$subMenu->url}}" target="{{$subMenu->target}}">{{$subMenu->title}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </li>
                    @else
                    <li>
                        <a href="{{$menu->url}}" target="{{$menu->target}}" class="list-group-item d-flex align-items-center">
                            @if($menu->icon)
                            <span class="badge badge-primary badge-pill">{!!$menu->icon!!}</span>
                            @endif
                            {{$menu->title}}
                        </a>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
{{-- Search Popup --}}
<div class="over_lay1" style="width: 0px;"></div>
<div class="search_container" style="left: -360px;">
    <div class="search_box">
        <form action="/Search">
            <img src="https://english.cdn.zeenews.com/static/public/menusearch.svg" alt="search icon"
                class="search_icon1 ls-is-cached lazyloaded">
            <input type="text" placeholder="Search here" name="q" minlength="3" class="search_input"
                required="true">
            <button class="search_submit"><img src="https://english.cdn.zeenews.com/static/public/search_arrow.svg"
                    class=" ls-is-cached lazyloaded" alt="search icon" width="12"></button>
        </form>
    </div>
</div><!-- Sidebar Nav  -->
<div class="over_lay"></div>
<div id="mySidenav" class="sidenav mx-auto">
    <div class="list_box">
        <div class="sidebar">
            <div class="user_actions">
                <div class="menu_search mb-4">
                    <a href="javascript:void(0)" class="p-4" onclick="openNav()">
                        <i class="far fa-times"></i>
                    </a>
                </div>
                <div class="menu_search">
                    <a href="javascript:void(0)" class="p-4" onclick="searchPop()">
                        <i class="far fa-search"></i>
                    </a>
                </div>
                <div class="menu_social">
                    <div class="connectus">
                        <p>SOCIAL</p>
                        <a rel="noopener" href="javascript:void(0)" target="_blank">
                            <img data-src="{{ asset('front-assets/img/sidebar-icons/social-facebook.svg') }}"
                                alt="facebook" class=" lazyloaded"
                                src="{{ asset('front-assets/img/sidebar-icons/social-facebook.svg') }}">
                        </a>
                        <a rel="noopener" href="javascript:void(0)" target="_blank">
                            <img data-src="{{ asset('front-assets/img/sidebar-icons/social-twitter.svg') }}"
                                alt="twitter" class=" lazyloaded"
                                src="{{ asset('front-assets/img/sidebar-icons/social-twitter.svg') }}">
                        </a>
                        <a rel="noopener" href="javascript:void(0)" target="_blank">
                            <img data-src="{{ asset('front-assets/img/sidebar-icons/social-youtube.svg') }}"
                                alt="youtube" class=" lazyloaded"
                                src="{{ asset('front-assets/img/sidebar-icons/social-youtube.svg') }}">
                        </a>
                    </div>
                    <p>APPS</p>
                    <a rel="noopener" href="javascript:void(0)" target="_blank">
                        <img data-src="{{ asset('front-assets/img/sidebar-icons/menu_android.svg') }}"
                            alt="Andrioid APP" class=" lazyloaded"
                            src="{{ asset('front-assets/img/sidebar-icons/menu_android.svg') }}">
                    </a>
                    <a rel="noopener" href="javascript:void(0)" target="_blank">
                        <img data-src="{{ asset('front-assets/img/sidebar-icons/menu_ios.svg') }}" alt="IOS APP"
                            class=" lazyloaded" src="{{ asset('front-assets/img/sidebar-icons/menu_ios.svg') }}">
                    </a>
                </div>
            </div>
            <div class="user_menus">
                <ul class="list-group">
                    <li>
                        <a href="javascript:void(0)" class="list-group-item d-flex align-items-center">
                            <span class="badge badge-primary badge-pill"><i class="far fa-home-alt"></i></span>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="list-group-item d-flex align-items-center">
                            <span class="badge badge-primary badge-pill"><i class="far fa-tv-retro"></i></span>
                            Live TV
                        </a>
                    </li>
                    <li class="position-relative">
                        <a href="javascript:void(0)" class="list-group-item d-flex align-items-center">
                            <span class="badge badge-primary badge-pill"><i
                                    class="fab fa-font-awesome-flag"></i></span>
                            India
                        </a>
                        <a class="sidenav-dropbtn" data-toggle="collapse" href="#collapseExample" role="button"
                            aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa fa-plus"></i></span>
                        </a>
                        <div class="collapse mb-2" id="collapseExample">
                            <div class="collapse_container">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0)">Ahmedabad</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Bengaluru</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Chennai</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Hyderabad</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Kolkata</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Mumbai</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Pune</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="position-relative">
                        <a href="javascript:void(0)" class="list-group-item d-flex align-items-center">
                            <span class="badge badge-primary badge-pill"><i class="far fa-theater-masks"></i></span>
                            Entertainment
                        </a>
                        <a class="sidenav-dropbtn" data-toggle="collapse" href="#collapseExample2" role="button"
                            aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa fa-plus"></i></span>
                        </a>
                        <div class="collapse mb-2" id="collapseExample2">
                            <div class="collapse_container">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0)">Hollywood</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Bollywood</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Tollywood</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Music</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Television</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Movie Review</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Religion</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="position-relative">
                        <a href="javascript:void(0)" class="list-group-item d-flex align-items-center">
                            <span class="badge badge-primary badge-pill"><i class="far fa-baseball"></i></span>
                            Sports
                        </a>
                        <a class="sidenav-dropbtn" data-toggle="collapse" href="#collapseExample3" role="button"
                            aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa fa-plus"></i></span>
                        </a>
                        <div class="collapse mb-2" id="collapseExample3">
                            <div class="collapse_container">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0)">Cricket</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Football</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Tennis</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Badminton</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Other Sports</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="position-relative">
                        <a href="javascript:void(0)" class="list-group-item d-flex align-items-center">
                            <span class="badge badge-primary badge-pill"><i class="fal fa-plane-departure"></i></span>
                            LifeStyle
                        </a>
                        <a class="sidenav-dropbtn" data-toggle="collapse" href="#collapseExample4" role="button"
                            aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa fa-plus"></i></span>
                        </a>
                        <div class="collapse mb-2" id="collapseExample4">
                            <div class="collapse_container">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0)">Relationship</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Travel</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Food & Recipes</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Fashion</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Culture</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Spirituality</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="position-relative">
                        <a href="javascript:void(0)" class="list-group-item d-flex align-items-center">
                            <span class="badge badge-primary badge-pill"><i class="far fa-industry"></i></span>
                            Business
                        </a>
                        <a class="sidenav-dropbtn" data-toggle="collapse" href="#collapseExample5" role="button"
                            aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa fa-plus"></i></span>
                        </a>
                        <div class="collapse mb-2" id="collapseExample5">
                            <div class="collapse_container">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0)">Economy</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Markets</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Companies</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Real Estate</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">International Business</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Personal Finance</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Automobile</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="position-relative">
                        <a href="javascript:void(0)" class="list-group-item d-flex align-items-center">
                            <span class="badge badge-primary badge-pill"><i class="far fa-microchip"></i></span>
                            Technology
                        </a>
                        <a class="sidenav-dropbtn" data-toggle="collapse" href="#collapseExample6" role="button"
                            aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa fa-plus"></i></span>
                        </a>
                        <div class="collapse mb-2" id="collapseExample6">
                            <div class="collapse_container">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0)">Gadget</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Gaming</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Internet & Social Media</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Apps</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Mobile</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="list-group-item d-flex align-items-center">
                            <span class="badge badge-primary badge-pill"><i class="far fa-crutch"></i></span>
                            Mobility
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="list-group-item d-flex align-items-center">
                            <span class="badge badge-primary badge-pill"><i class="far fa-newspaper"></i></span>
                            Viral News
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
{{-- Search Popup --}}
<div class="over_lay1" style="width: 0px;"></div>
<div class="search_container" style="left: -360px;">
    <div class="search_box">
        <form action="/Search">
            <img src="https://english.cdn.zeenews.com/static/public/menusearch.svg" alt="search icon"
                class="search_icon1 ls-is-cached lazyloaded">
            <input type="text" placeholder="Search here" name="q" minlength="3" class="search_input"
                required="true">
            <button class="search_submit"><img src="https://english.cdn.zeenews.com/static/public/search_arrow.svg"
                    class=" ls-is-cached lazyloaded" alt="search icon" width="12"></button>
        </form>
    </div>
</div>
