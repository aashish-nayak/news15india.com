<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i></div>
            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center" title="Go To Website" href="{{route('home')}}" target="_blank" role="button"> 
                            <i class='bx bx-link-external me-1'></i> <span style="font-size:12px">News15India</span>
                        </a>
                    </li>
                    @role('super-admin','admin')
                    <li class="nav-item dropdown dropdown-large ms-md-3 ms-2">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <i class='bx bx-grid-alt'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <div class="row row-cols-3 g-3 p-3">
                                <div class="col text-center">
                                    <a type="button" data-bs-toggle="modal" data-bs-target="#whatsappGroupModel" role="button"> 
                                        <div class="app-box mx-auto bg-gradient-lush text-white"><i class='bx bxl-whatsapp'></i></div>
                                        <div class="app-title">WhatsApp Group</div>
                                    </a>
                                </div>
                                <div class="col text-center">
                                    <a type="button" data-bs-toggle="modal" data-bs-target="#liveStreamModel" role="button"> 
                                        <div class="app-box mx-auto bg-gradient-burning text-white"><i class='bx bx-broadcast'></i></div>
                                        <div class="app-title">Youtube Live</div>
                                    </a>
                                </div>
                                <div class="col text-center">
                                    <a type="button" data-bs-toggle="modal" data-bs-target="#coverage" role="button"> 
                                        <div class="app-box mx-auto bg-gradient-cosmic text-white"><i class='bx bx-news'></i></div>
                                        <div class="app-title">Special Coverage</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endrole
                </ul>
            </div>
            <div class="user-box dropdown">
                <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    @php
                        $avatar = auth('admin')->user()->getAvatar();
                    @endphp
                    <img src="{{$avatar}}" class="user-img" alt="user avatar">
                    <div class="user-info ps-3">
                        <p class="user-name mb-0">{{auth('admin')->user()->name}}</p>
                        <p class="designattion mb-0">{{auth('admin')->user()->roles()->first()->name}}</p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="{{route('admin.profile')}}">
                            <i class="bx bx-user"></i><span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('admin.dashboard')}}">
                            <i class='bx bx-home-circle'></i><span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider mb-0"></div>
                    </li>
                    <li>
                        <form action="{{ route('admin.logout') }}" method="post" id="logout-form">
                            @csrf
                            <a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault();$('#logout-form').submit();">
                                <i class='bx bx-log-out-circle'></i><span>Logout</span>
                            </a>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>