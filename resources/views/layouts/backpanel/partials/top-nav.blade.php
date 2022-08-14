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
                    {{-- <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span
                                class="alert-count">7</span>
                            <i class='bx bx-bell'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">
                                <div class="msg-header">
                                    <p class="msg-header-title">Notifications</p>
                                    <p class="msg-header-clear ms-auto">Marks all as read</p>
                                </div>
                            </a>
                            <div class="header-notifications-list">
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="notify bg-light-primary text-primary"><i class="bx bx-group"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">New Customers<span class="msg-time float-end">14
                                                    Sec
                                                    ago</span></h6>
                                            <p class="msg-info">5 new user registered</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="notify bg-light-danger text-danger"><i class="bx bx-cart-alt"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">New Orders <span class="msg-time float-end">2
                                                    min
                                                    ago</span></h6>
                                            <p class="msg-info">You have recived new orders</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="notify bg-light-success text-success"><i class="bx bx-file"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">24 PDF File<span class="msg-time float-end">19
                                                    min
                                                    ago</span></h6>
                                            <p class="msg-info">The pdf files generated</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="notify bg-light-warning text-warning"><i class="bx bx-send"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">Time Response <span class="msg-time float-end">28
                                                    min
                                                    ago</span></h6>
                                            <p class="msg-info">5.1 min avarage time response</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="notify bg-light-info text-info"><i class="bx bx-home-circle"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">New Product Approved <span
                                                    class="msg-time float-end">2 hrs ago</span></h6>
                                            <p class="msg-info">Your new product has approved</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="notify bg-light-danger text-danger"><i
                                                class="bx bx-message-detail"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">New Comments <span class="msg-time float-end">4
                                                    hrs
                                                    ago</span></h6>
                                            <p class="msg-info">New customer comments recived</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="notify bg-light-success text-success"><i
                                                class='bx bx-check-square'></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">Your item is shipped <span
                                                    class="msg-time float-end">5 hrs
                                                    ago</span></h6>
                                            <p class="msg-info">Successfully shipped your item</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="notify bg-light-primary text-primary"><i class='bx bx-user-pin'></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">New 24 authors<span
                                                    class="msg-time float-end">1 day
                                                    ago</span></h6>
                                            <p class="msg-info">24 new authors joined last week</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="notify bg-light-warning text-warning"><i
                                                class='bx bx-door-open'></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">Defense Alerts <span
                                                    class="msg-time float-end">2 weeks
                                                    ago</span></h6>
                                            <p class="msg-info">45% less alerts last 4 weeks</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <a href="javascript:;">
                                <div class="text-center msg-footer">View All Notifications</div>
                            </a>
                        </div>
                    </li> --}}
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
                </ul>
            </div>
            <div class="user-box dropdown">
                <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{asset('assets/images/avatars/avatar-2.png')}}" class="user-img" alt="user avatar">
                    <div class="user-info ps-3">
                        <p class="user-name mb-0">{{auth('admin')->user()->name}}</p>
                        <p class="designattion mb-0">{{auth('admin')->user()->roles()->first()->name}}</p>
                    </div>
                </a>
            </div>
        </nav>
    </div>
</header>
<div class="modal fade" id="whatsappGroupModel" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success py-1 px-4">
                <h5 class="modal-title d-flex align-items-center"><i class='bx bxl-whatsapp fs-3 me-2'></i> WhatsApp Group Link</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-5 text-center">
                <form action="{{route('admin.setting.store')}}" method="POST">
                    @csrf
                    <h5 class="fw-bold">Enter URL For Join WhatsApp Group</h3>
                    <div class="form-group mt-3">
                        <input type="url" class="form-control" name="whatsapp_group_url" value="{{setting('whatsapp_group_url')}}" placeholder="Enter WhatsApp Group Link">
                    </div>
                    <button type="submit" class="btn btn-success mt-3 px-5">Go</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="liveStreamModel" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger py-1 px-4">
                <h5 class="modal-title d-flex align-items-center"><i class='bx bx-station fs-3 me-2'></i> Live Streaming</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-5 text-center">
                <form action="{{route('admin.setting.store')}}" method="POST">
                    @csrf
                    <h5 class="fw-bold">Enter URL For Publish Live Streaming Video</h5>
                    <div class="form-group mt-3">
                        <input type="url" class="form-control" name="live_stream_url" value="{{setting('live_stream_url')}}" placeholder="Enter YouTube URL">
                    </div>
                    <button type="submit" class="btn btn-danger mt-3 px-5">Go</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="coverage" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-secondary py-1 px-4">
                <h5 class="modal-title d-flex align-items-center"><i class='bx bx-news fs-3 me-2'></i> Special Coverage</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <form action="{{route('admin.setting.store')}}" method="POST">
                    @csrf
                    <div class="coverage-news">
                        <div class="cover-block">
                            <div class="cover-header d-flex align-items-center justify-content-between">
                                <h6 class="m-0">Special Coverage Block - 1</h6>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="special_coverage[block_1][status]" value="1" id="blockStatus1" @if(isset(json_decode(setting('special_coverage'))->block_1->status) && json_decode(setting('special_coverage'))->block_1->status == 1) checked @endif />
                                    <label class="form-check-label" for="blockStatus1">Block 1 Status</label>
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                <input type="text" class="form-control form-control-sm" name="special_coverage[block_1][url]" value="{{json_decode(setting('special_coverage'))->block_1->url}}" placeholder="Enter Block 1 URL">
                            </div>
                            <input type="text" class="form-control form-control-sm mb-1 coverage-image" name="special_coverage[block_1][image]" value="{{json_decode(setting('special_coverage'))->block_1->image}}" placeholder="Enter Block 1 Image URL">
                            <div class="cover-img">
                                @if (json_decode(setting('special_coverage'))->block_1->image != null)
                                <img src="{{json_decode(setting('special_coverage'))->block_1->image}}" alt="news">
                                @else
                                <p>Block – 1 Preview</p>
                                @endif
                            </div>
                        </div>
                        <div class="cover-block">
                            <div class="cover-header d-flex align-items-center justify-content-between">
                                <h6 class="m-0">Special Coverage Block - 2</h6>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="special_coverage[block_2][status]" value="1" id="blockStatus2" @if(isset(json_decode(setting('special_coverage'))->block_2->status) && json_decode(setting('special_coverage'))->block_2->status == 1) checked @endif/>
                                    <label class="form-check-label" for="blockStatus2">Block 2 Status</label>
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                <input type="text" class="form-control form-control-sm" name="special_coverage[block_2][url]" value="{{json_decode(setting('special_coverage'))->block_2->url}}" placeholder="Enter Block 2 URL">
                            </div>
                            <input type="text" class="form-control form-control-sm mb-1 coverage-image" name="special_coverage[block_2][image]" value="{{json_decode(setting('special_coverage'))->block_2->image}}" placeholder="Enter Block 2 Image URL">
                            <div class="cover-img">
                                @if (json_decode(setting('special_coverage'))->block_2->image != null)
                                <img src="{{json_decode(setting('special_coverage'))->block_2->image}}" alt="news">
                                @else
                                <p>Block – 2 Preview</p>
                                @endif
                            </div>
                        </div>
                        <div class="cover-block">
                            <div class="cover-header d-flex align-items-center justify-content-between">
                                <h6 class="m-0">Special Coverage Block - 3</h6>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="special_coverage[block_3][status]" value="1" id="blockStatus3" @if(isset(json_decode(setting('special_coverage'))->block_3->status) && json_decode(setting('special_coverage'))->block_3->status == 1) checked @endif />
                                    <label class="form-check-label" for="blockStatus3">Block 3 Status</label>
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                <input type="text" class="form-control form-control-sm" name="special_coverage[block_3][url]" value="{{json_decode(setting('special_coverage'))->block_3->url}}" placeholder="Enter Block 3 URL">
                            </div>
                            <input type="text" class="form-control form-control-sm mb-1 coverage-image" name="special_coverage[block_3][image]" value="{{json_decode(setting('special_coverage'))->block_3->image}}" placeholder="Enter Block 3 Image URL">
                            <div class="cover-img">
                                @if (json_decode(setting('special_coverage'))->block_3->image != null)
                                <img src="{{json_decode(setting('special_coverage'))->block_3->image}}" alt="news">
                                @else
                                <p>Block – 3 Preview</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-dark px-5">Publish</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>