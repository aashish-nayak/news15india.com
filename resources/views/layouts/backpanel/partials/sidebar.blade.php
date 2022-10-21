<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{setting('admin_logo')}}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">{{setting('site_name')}}</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i></div>
    </div>
    <ul class="metismenu" id="menu">
        {{-- <li class="menu-label">UI Elements</li> --}}
        <li>
            <a href="{{Route('admin.dashboard')}}">
                <div class="parent-icon"><i class='bx bx-home-circle'></i></div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        @permission('read-category')
        <li>
            <a href="{{Route('admin.category.index')}}">
                <div class="parent-icon"><i class='bx bx-grid-alt'></i></div>
                <div class="menu-title">Category</div>
            </a>
        </li>
        @endpermission
        @permission('read-news')
        <li>
            <a href="javascript:void(0);" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-news"></i></div>
                <div class="menu-title">News</div>
            </a>
            <ul >
                @permission('create-news')
                <li><a href="{{Route('admin.news.create')}}"><i class="bx bx-right-arrow-alt"></i>Add News</a></li>
                @endpermission
                <li><a href="{{Route('admin.news.view-all-news')}}"><i class="bx bx-right-arrow-alt"></i>View News</a></li>
                @permission('trash-news')
                <li><a href="{{Route('admin.news.trash-news')}}"><i class="bx bx-right-arrow-alt"></i>Trash News</a></li>
                @endpermission
            </ul>
        </li>
        @endpermission
        @permission('read-comments')
        <li>
            <a href="javascript:void(0);" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-comment-dots"></i></div>
                <div class="menu-title">Comments</div>
            </a>
            <ul >
                <li><a href="{{Route('admin.comment.comments')}}"><i class="bx bx-right-arrow-alt"></i> Comments</a></li>
                @permission('approve-comments')
                <li><a href="{{Route('admin.comment.unapproved')}}"><i class="bx bx-right-arrow-alt"></i>Unapproved Comments @if($unapproved_comments > 0)<span class="badge rounded-pill bg-info ms-auto">{{$unapproved_comments}}</span>@endif</a></li>
                @endpermission
                @permission('read-trash-comments')
                <li><a href="{{Route('admin.comment.trash')}}"><i class="bx bx-right-arrow-alt"></i>Trash Comments @if($trash_comments > 0)<span class="badge rounded-pill bg-danger ms-auto">{{$trash_comments}}</span>@endif</a></li>
                @endpermission
            </ul>
        </li>
        @endpermission
        @permission('read-polls')
        <li>
            <a href="{{Route('admin.poll.index')}}">
                <div class="parent-icon"><i class="bx bx-poll"></i></div>
                <div class="menu-title">Surveys</div>
            </a>
        </li>
        @endpermission
        @permission('read-media')
        <li>
            <a href="{{Route('admin.media.index')}}">
                <div class="parent-icon"><i class='bx bx-images'></i></div>
                <div class="menu-title">Media</div>
            </a>
        </li>
        @endpermission
        @permission('read-tags')
        <li>
            <a href="{{Route('admin.tag.index')}}">
                <div class="parent-icon"><i class="bx bx-hash"></i></div>
                <div class="menu-title">Tags</div>
            </a>
        </li>
        @endpermission
        @role('super-admin','admin')
        <li>
            <a href="javascript:void(0);" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-lock"></i></div>
                <div class="menu-title">Authentication</div>
            </a>
            <ul>
                @permission('create-member')
                <li><a href="{{Route('admin.user.add')}}"><i class="bx bx-right-arrow-alt"></i>Add Member</a></li>
                @endpermission
                @permission('read-member')
                <li><a href="{{Route('admin.user.index')}}"><i class="bx bx-right-arrow-alt"></i>All Members</a></li>
                @endpermission
                @permission('read-role','read-permission')
                <li><a href="{{Route('admin.role.show')}}"><i class="bx bx-right-arrow-alt"></i>Roles & Permission</a></li>
                @endpermission
            </ul>
        </li>
        @endrole
        @permission('read-advertisement')
        <li>
            <a href="javascript:void(0);" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-book-content"></i></div>
                <div class="menu-title">Advertisements</div>
            </a>
            <ul>
                @role('super-admin')
                <li><a href="{{Route('admin.advert.placements.index')}}"><i class="bx bx-right-arrow-alt"></i>Advert Placements</a></li>
                @endrole
                @permission('read-advertisement-category')
                <li><a href="{{Route('admin.advert.categories.index')}}"><i class="bx bx-right-arrow-alt"></i>Advert Categories</a></li>
                @endpermission
                @permission('create-advertisement')
                <li><a href="{{Route('admin.advert.create')}}"><i class="bx bx-right-arrow-alt"></i>Add Advertisement</a></li>
                @endpermission
                <li><a href="{{Route('admin.advert.index')}}"><i class="bx bx-right-arrow-alt"></i>Advertisements</a></li>
            </ul>
        </li>
        @endpermission
        @permission('read-reporters')
        <li>
            <a href="{{Route('admin.reporter.index')}}">
                <div class="parent-icon"><i class='bx bx-group'></i></div>
                <div class="menu-title">Reporters</div>
            </a>
        </li>
        @endpermission
        @permission('read-reporters')
        <li>
            <a href="{{Route('admin.complaint.index')}}">
                <div class="parent-icon"><i class='bx bx-box'></i></div>
                <div class="menu-title">Complaints</div>
            </a>
        </li>
        @endpermission
        @role('super-admin')
        <li>
            <a href="{{Route('admin.menu.index',1)}}">
                <div class="parent-icon"><i class='bx bx-menu-alt-right'></i></div>
                <div class="menu-title">Menus</div>
            </a>
        </li>
        <li>
            <a href="{{Route('admin.setting.index')}}">
                <div class="parent-icon"><i class='bx bx-cog'></i></div>
                <div class="menu-title">Settings</div>
            </a>
        </li>
        @endrole
        @permission('read-user')
        <li>
            <a href="{{Route('admin.viewer.index')}}">
                <div class="parent-icon"><i class='bx bx-user'></i></div>
                <div class="menu-title">Users</div>
            </a>
        </li>
        @endpermission
        <li>
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
