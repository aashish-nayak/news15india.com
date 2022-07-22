<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{asset('assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">News15India</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i> </div>
    </div>
    <ul class="metismenu" id="menu">
        {{-- <li class="menu-label">UI Elements</li> --}}
        <li class="">
            <a href="{{Route('admin.dashboard')}}">
                <div class="parent-icon"><i class='bx bx-home-circle'></i></div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li class="">
            <a href="{{Route('admin.category.index')}}">
                <div class="parent-icon"><i class='bx bx-grid-alt'></i></div>
                <div class="menu-title">Category</div>
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-detail"></i>
                </div>
                <div class="menu-title">News</div>
            </a>
            <ul >
                <li> <a href="{{Route('admin.news.create')}}"><i class="bx bx-right-arrow-alt"></i>Add News</a></li>
                <li> <a href="{{Route('admin.news.view-all-news')}}"><i class="bx bx-right-arrow-alt"></i>View News</a></li>
                <li> <a href="{{Route('admin.news.trash-news')}}"><i class="bx bx-right-arrow-alt"></i>Trash News</a></li>
            </ul>
        </li>
        <li class="">
            <a href="{{Route('admin.tag.index')}}">
                <div class="parent-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-hash"><line x1="4" y1="9" x2="20" y2="9"></line><line x1="4" y1="15" x2="20" y2="15"></line><line x1="10" y1="3" x2="8" y2="21"></line><line x1="16" y1="3" x2="14" y2="21"></line></svg></div>
                <div class="menu-title">Tags</div>
            </a>
        </li>
        <li class="">
            <a href="{{Route('admin.media.index')}}">
                <div class="parent-icon"><i class='bx bx-images'></i></div>
                <div class="menu-title">Media</div>
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-lock"></i>
                </div>
                <div class="menu-title">Authentication</div>
            </a>
            <ul >
                <li> <a href="{{Route('admin.user.add')}}"><i class="bx bx-right-arrow-alt"></i>Add Member</a></li>
                <li> <a href="{{Route('admin.user.index')}}"><i class="bx bx-right-arrow-alt"></i>All Members</a></li>
                <li> <a href="{{Route('admin.role.show')}}"><i class="bx bx-right-arrow-alt"></i>Roles & Permission</a></li>
            </ul>
        </li>
        <li class="">
            <a href="{{Route('admin.viewer.index')}}">
                <div class="parent-icon"><i class='bx bx-user'></i></div>
                <div class="menu-title">Users</div>
            </a>
        </li>
        <li class="">
            <form action="{{ route('admin.logout') }}" method="post" id="logout-form">
                @csrf
                <a href="{{ route('admin.logout') }}" onclick="event.preventDefault();$('#logout-form').submit();">
                    <div class="parent-icon"><i class='bx bx-power-off'></i></div>
                    <div class="menu-title">Logout</div>
                </a>
            </form>
        </li>
    </ul>
</div>
