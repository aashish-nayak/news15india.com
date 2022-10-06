<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i></div>
            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center" title="Go To Website" href="{{route('home')}}" target="_blank" role="button"> 
                            <i class='bx bx-link-external me-1'></i> <span style="font-size:12px">View Website</span>
                        </a>
                    </li>
                    @role('super-admin','admin')
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center" title="WhatsApp Group Link" data-bs-toggle="modal" data-bs-target="#whatsappGroupModel" role="button"> 
                            <i class='bx bxl-whatsapp fs-3'></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center" title="Youtube Live Stream" data-bs-toggle="modal" data-bs-target="#liveStreamModel" role="button"> 
                            <i class='bx bx-station fs-3'></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center" title="Special Coverage" data-bs-toggle="modal" data-bs-target="#coverage" role="button"> 
                            <i class='bx bx-news fs-3'></i>
                        </a>
                    </li>
                    @endrole
                </ul>
            </div>
            <div class="user-box dropdown">
                <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    @php
                        $avatar = auth('admin')->user()->details->avatar;
                        if(Storage::exists('public/admins-avatar/'.$avatar)){
                            $avatar = asset('storage/admins-avatar/'.$avatar);
                        }else{
                            $avatar = 'https://eu.ui-avatars.com/api/?name='.auth('admin')->user()->name.'&size=250';
                        }
                    @endphp
                    <img src="{{$avatar}}" class="user-img" alt="user avatar">
                    <div class="user-info ps-3">
                        <p class="user-name mb-0">{{auth('admin')->user()->name}}</p>
                        <p class="designattion mb-0">{{auth('admin')->user()->roles()->first()->name}}</p>
                    </div>
                </a>
            </div>
        </nav>
    </div>
</header>