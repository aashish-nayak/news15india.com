@extends('layouts.backpanel.master')
@section('title', 'Pages')
@push('plugin-css')
@endpush
@section('sections')
    <div class="col-12">
        <div class="chat-wrapper">
            <div class="chat-sidebar">
                <div class="chat-sidebar-header">
                    <div class="d-flex align-items-center">
                        <div class="chat-user-online">
                            <img src="assets/images/avatars/avatar-1.png" width="45" height="45" class="rounded-circle" alt="" />
                        </div>
                        <div class="flex-grow-1 ms-2">
                            <p class="mb-0">Rachel Zane</p>
                        </div>
                        <div class="dropdown">
                            <div class="cursor-pointer font-24 dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded'></i>
                            </div>
                            <div class="dropdown-menu dropdown-menu-end"> <a class="dropdown-item" href="javascript:;">Settings</a>
                                <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Help & Feedback</a>
                                <a class="dropdown-item" href="javascript:;">Enable Split View Mode</a>
                                <a class="dropdown-item" href="javascript:;">Keyboard Shortcuts</a>
                                <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Sign Out</a>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3"></div>
                    <div class="input-group input-group-sm"> <span class="input-group-text bg-transparent"><i class='bx bx-search'></i></span>
                        <input type="text" class="form-control" placeholder="People, groups, & messages"> <span class="input-group-text bg-transparent"><i class='bx bx-dialpad'></i></span>
                    </div>
                </div>
                <div class="chat-sidebar-content">
                    <div class="chat-list">
                        <div class="list-group list-group-flush">
                            <a href="javascript:;" class="list-group-item">
                                <div class="d-flex">
                                    <div class="chat-user-online">
                                        <img src="assets/images/avatars/avatar-2.png" width="42" height="42" class="rounded-circle" alt="" />
                                    </div>
                                    <div class="flex-grow-1 ms-2">
                                        <h6 class="mb-0 chat-title">Louis Litt</h6>
                                        <p class="mb-0 chat-msg">You just got LITT up, Mike.</p>
                                    </div>
                                    <div class="chat-time">9:51 AM</div>
                                </div>
                            </a>
                            <a href="javascript:;" class="list-group-item active">
                                <div class="d-flex">
                                    <div class="chat-user-online">
                                        <img src="assets/images/avatars/avatar-3.png" width="42" height="42" class="rounded-circle" alt="" />
                                    </div>
                                    <div class="flex-grow-1 ms-2">
                                        <h6 class="mb-0 chat-title">Harvey Specter</h6>
                                        <p class="mb-0 chat-msg">Wrong. You take the gun....</p>
                                    </div>
                                    <div class="chat-time">4:32 PM</div>
                                </div>
                            </a>
                            <a href="javascript:;" class="list-group-item">
                                <div class="d-flex">
                                    <div class="chat-user-online">
                                        <img src="assets/images/avatars/avatar-4.png" width="42" height="42" class="rounded-circle" alt="" />
                                    </div>
                                    <div class="flex-grow-1 ms-2">
                                        <h6 class="mb-0 chat-title">Rachel Zane</h6>
                                        <p class="mb-0 chat-msg">I was thinking that we could...</p>
                                    </div>
                                    <div class="chat-time">Wed</div>
                                </div>
                            </a>
                            <a href="javascript:;" class="list-group-item">
                                <div class="d-flex">
                                    <div class="chat-user-online">
                                        <img src="assets/images/avatars/avatar-5.png" width="42" height="42" class="rounded-circle" alt="" />
                                    </div>
                                    <div class="flex-grow-1 ms-2">
                                        <h6 class="mb-0 chat-title">Donna Paulsen</h6>
                                        <p class="mb-0 chat-msg">Mike, I know everything!</p>
                                    </div>
                                    <div class="chat-time">Tue</div>
                                </div>
                            </a>
                            <a href="javascript:;" class="list-group-item">
                                <div class="d-flex">
                                    <div class="chat-user-online">
                                        <img src="assets/images/avatars/avatar-6.png" width="42" height="42" class="rounded-circle" alt="" />
                                    </div>
                                    <div class="flex-grow-1 ms-2">
                                        <h6 class="mb-0 chat-title">Jessica Pearson</h6>
                                        <p class="mb-0 chat-msg">Have you finished the draft...</p>
                                    </div>
                                    <div class="chat-time">9/3/2020</div>
                                </div>
                            </a>
                            <a href="javascript:;" class="list-group-item">
                                <div class="d-flex">
                                    <div class="chat-user-online">
                                        <img src="assets/images/avatars/avatar-7.png" width="42" height="42" class="rounded-circle" alt="" />
                                    </div>
                                    <div class="flex-grow-1 ms-2">
                                        <h6 class="mb-0 chat-title">Harold Gunderson</h6>
                                        <p class="mb-0 chat-msg">Thanks Mike! :)</p>
                                    </div>
                                    <div class="chat-time">12/3/2020</div>
                                </div>
                            </a>
                            <a href="javascript:;" class="list-group-item">
                                <div class="d-flex">
                                    <div class="chat-user-online">
                                        <img src="assets/images/avatars/avatar-9.png" width="42" height="42" class="rounded-circle" alt="" />
                                    </div>
                                    <div class="flex-grow-1 ms-2">
                                        <h6 class="mb-0 chat-title">Katrina Bennett</h6>
                                        <p class="mb-0 chat-msg">I've sent you the files for...</p>
                                    </div>
                                    <div class="chat-time">16/3/2020</div>
                                </div>
                            </a>
                            <a href="javascript:;" class="list-group-item">
                                <div class="d-flex">
                                    <div class="chat-user-online">
                                        <img src="assets/images/avatars/avatar-10.png" width="42" height="42" class="rounded-circle" alt="" />
                                    </div>
                                    <div class="flex-grow-1 ms-2">
                                        <h6 class="mb-0 chat-title">Charles Forstman</h6>
                                        <p class="mb-0 chat-msg">Mike, this isn't over.</p>
                                    </div>
                                    <div class="chat-time">18/3/2020</div>
                                </div>
                            </a>
                            <a href="javascript:;" class="list-group-item">
                                <div class="d-flex">
                                    <div class="chat-user-online">
                                        <img src="assets/images/avatars/avatar-11.png" width="42" height="42" class="rounded-circle" alt="" />
                                    </div>
                                    <div class="flex-grow-1 ms-2">
                                        <h6 class="mb-0 chat-title">Jonathan Sidwell</h6>
                                        <p class="mb-0 chat-msg">That's bullshit. This deal..</p>
                                    </div>
                                    <div class="chat-time">24/3/2020</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="chat-header d-flex align-items-center">
                <div class="chat-toggle-btn"><i class='bx bx-menu-alt-left'></i>
                </div>
                <div>
                    <h4 class="mb-1 font-weight-bold">Harvey Inspector</h4>
                    <div class="list-inline d-sm-flex mb-0 d-none"> 
                        <a href="javascript:;" class="list-inline-item d-flex align-items-center text-secondary"><small class='bx bxs-circle me-1 chart-online'></small>Active Now</a>
                    </div>
                </div>
            </div>
            <div class="chat-content">
                <div class="chat-content-leftside">
                    <div class="d-flex">
                        <img src="assets/images/avatars/avatar-3.png" width="48" height="48" class="rounded-circle" alt="" />
                        <div class="flex-grow-1 ms-2">
                            <p class="mb-0 chat-time">Harvey, 2:35 PM</p>
                            <p class="chat-left-msg">Hi, harvey where are you now a days?</p>
                        </div>
                    </div>
                </div>
                <div class="chat-content-rightside">
                    <div class="d-flex ms-auto">
                        <div class="flex-grow-1 me-2">
                            <p class="mb-0 chat-time text-end">you, 2:37 PM</p>
                            <p class="chat-right-msg">I am in USA</p>
                        </div>
                    </div>
                </div>
                <div class="chat-content-leftside">
                    <div class="d-flex">
                        <img src="assets/images/avatars/avatar-3.png" width="48" height="48" class="rounded-circle" alt="" />
                        <div class="flex-grow-1 ms-2">
                            <p class="mb-0 chat-time">Harvey, 2:48 PM</p>
                            <p class="chat-left-msg">okk, what about admin template?</p>
                        </div>
                    </div>
                </div>
                <div class="chat-content-rightside">
                    <div class="d-flex">
                        <div class="flex-grow-1 me-2">
                            <p class="mb-0 chat-time text-end">you, 2:49 PM</p>
                            <p class="chat-right-msg">i have already purchased the admin template</p>
                        </div>
                    </div>
                </div>
                <div class="chat-content-leftside">
                    <div class="d-flex">
                        <img src="assets/images/avatars/avatar-3.png" width="48" height="48" class="rounded-circle" alt="" />
                        <div class="flex-grow-1 ms-2">
                            <p class="mb-0 chat-time">Harvey, 3:12 PM</p>
                            <p class="chat-left-msg">ohhk, great, which admin template you have purchased?</p>
                        </div>
                    </div>
                </div>
                <div class="chat-content-rightside">
                    <div class="d-flex">
                        <div class="flex-grow-1 me-2">
                            <p class="mb-0 chat-time text-end">you, 3:14 PM</p>
                            <p class="chat-right-msg">i purchased dashtreme admin template from themeforest. it is very good product for web application</p>
                        </div>
                    </div>
                </div>
                <div class="chat-content-leftside">
                    <div class="d-flex">
                        <img src="assets/images/avatars/avatar-3.png" width="48" height="48" class="rounded-circle" alt="" />
                        <div class="flex-grow-1 ms-2">
                            <p class="mb-0 chat-time">Harvey, 3:16 PM</p>
                            <p class="chat-left-msg">who is the author of this template?</p>
                        </div>
                    </div>
                </div>
                <div class="chat-content-rightside">
                    <div class="d-flex">
                        <div class="flex-grow-1 me-2">
                            <p class="mb-0 chat-time text-end">you, 3:22 PM</p>
                            <p class="chat-right-msg">codervent is the author of this admin template</p>
                        </div>
                    </div>
                </div>
                <div class="chat-content-leftside">
                    <div class="d-flex">
                        <img src="assets/images/avatars/avatar-3.png" width="48" height="48" class="rounded-circle" alt="" />
                        <div class="flex-grow-1 ms-2">
                            <p class="mb-0 chat-time">Harvey, 3:16 PM</p>
                            <p class="chat-left-msg">ohh i know about this author. he has good admin products in his portfolio.</p>
                        </div>
                    </div>
                </div>
                <div class="chat-content-rightside">
                    <div class="d-flex">
                        <div class="flex-grow-1 me-2">
                            <p class="mb-0 chat-time text-end">you, 3:30 PM</p>
                            <p class="chat-right-msg">yes, codervent has multiple admin templates. also he is very supportive.</p>
                        </div>
                    </div>
                </div>
                <div class="chat-content-leftside">
                    <div class="d-flex">
                        <img src="assets/images/avatars/avatar-3.png" width="48" height="48" class="rounded-circle" alt="" />
                        <div class="flex-grow-1 ms-2">
                            <p class="mb-0 chat-time">Harvey, 3:33 PM</p>
                            <p class="chat-left-msg">All the best for your target. thanks for giving your time.</p>
                        </div>
                    </div>
                </div>
                <div class="chat-content-rightside">
                    <div class="d-flex">
                        <div class="flex-grow-1 me-2">
                            <p class="mb-0 chat-time text-end">you, 3:35 PM</p>
                            <p class="chat-right-msg">thanks Harvey</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="chat-footer d-flex align-items-center">
                <div class="flex-grow-1 pe-2">
                    <div class="input-group">
                        <a href="javascript:;"><span class="input-group-text"><i class='bx bx-smile'></i></span></a>
                        <input type="text" class="form-control" placeholder="Type a message">
                        <a href="javascript:;" class="rounded-0 ms-2"><span class="input-group-text px-4 bg-primary text-white rounded-0"><i class='bx bx-send'></i></span></a>
                    </div>
                </div>
            </div>
            <!--start chat overlay-->
            <div class="overlay chat-toggle-btn-mobile"></div>
            <!--end chat overlay-->
        </div>
    </div>
@endsection
@push('plugin-scripts')
    <script>
        new PerfectScrollbar('.chat-list');
        new PerfectScrollbar('.chat-content');
    </script>
@endpush
