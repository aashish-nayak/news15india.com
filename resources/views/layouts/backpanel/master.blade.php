{{-- header --}}
@includeIf('layouts.backpanel.partials.header')
<body>
    <div class="wrapper">
        @includeIf('layouts.backpanel.partials.top-nav')
        {{-- sidebar --}}
        @includeIf('layouts.backpanel.partials.sidebar')
        <div class="page-wrapper">
            <div class="page-content p-3">
                @yield('sections')
            </div>
            <div class="overlay toggle-icon"></div>
            <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        </div>
        <footer class="page-footer">
            <p class="mb-0">{!!setting('site_copyright')!!}</p>
        </footer>
    </div>
    @role('super-admin','admin')
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
                        <ul class="nav nav-tabs nav-danger" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" data-bs-toggle="tab" href="#block1" role="tab" aria-selected="true">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-title">Block - 1</div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#block2" role="tab" aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-title">Block - 2</div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#block3" role="tab" aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-title">Block - 3</div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content py-3 coverage-news">
                            <div class="tab-pane fade show active" id="block1" role="tabpanel">
                                <div class="cover-block">
                                    <div class="cover-header d-flex align-items-center justify-content-between">
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
                            </div>
                            <div class="tab-pane fade" id="block2" role="tabpanel">
                                <div class="cover-block">
                                    <div class="cover-header d-flex align-items-center justify-content-between">
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
                            </div>
                            <div class="tab-pane fade" id="block3" role="tabpanel">
                                <div class="cover-block">
                                    <div class="cover-header d-flex align-items-center justify-content-between">
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
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-dark px-5">Publish</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endrole
    {{-- <div class="switcher-wrapper">
        <div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
        </div>
        <div class="switcher-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0 text-uppercase">Theme Customizer</h5>
                <button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
            </div>
            <hr />
            <h6 class="mb-0">Theme Styles</h6>
            <hr />
            <div class="d-flex align-items-center justify-content-between">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="lightmode" checked>
                    <label class="form-check-label" for="lightmode">Light</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="darkmode">
                    <label class="form-check-label" for="darkmode">Dark</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="semidark">
                    <label class="form-check-label" for="semidark">Semi Dark</label>
                </div>
            </div>
            <hr />
            <div class="form-check">
                <input class="form-check-input" type="radio" id="minimaltheme" name="flexRadioDefault">
                <label class="form-check-label" for="minimaltheme">Minimal Theme</label>
            </div>
            <hr />
            <h6 class="mb-0">Header Colors</h6>
            <hr />
            <div class="header-colors-indigators">
                <div class="row row-cols-auto g-3">
                    <div class="col">
                        <div class="indigator headercolor1" id="headercolor1"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor2" id="headercolor2"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor3" id="headercolor3"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor4" id="headercolor4"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor5" id="headercolor5"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor6" id="headercolor6"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor7" id="headercolor7"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor8" id="headercolor8"></div>
                    </div>
                </div>
            </div>
            <hr />
            <h6 class="mb-0">Sidebar Colors</h6>
            <hr />
            <div class="header-colors-indigators">
                <div class="row row-cols-auto g-3">
                    <div class="col">
                        <div class="indigator sidebarcolor1" id="sidebarcolor1"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor2" id="sidebarcolor2"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor3" id="sidebarcolor3"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor4" id="sidebarcolor4"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor5" id="sidebarcolor5"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor6" id="sidebarcolor6"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor7" id="sidebarcolor7"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor8" id="sidebarcolor8"></div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
{{-- scripts --}}
@includeIf('layouts.backpanel.partials.scripts')
<script>
    function stringslug(str) {
        str = str.replace(/^\s+|\s+$/g, ''); // trim
        str = str.toLowerCase(); // remove accents, swap ñ for n, etc
        var from = "ãàáäâẽèéëêìíïîõòóöôùúüûñç·/_,:;";
        var to = "aaaaaeeeeeiiiiooooouuuunc------";
        for (var i = 0, l = from.length; i < l; i++) {
            str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
        }
        str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
            .replace(/\s+/g, '-') // collapse whitespace and replace by -
            .replace(/-+/g, '-'); // collapse dashes
        return str;
    };
    $(document).ready(function () {
        $(document).on('change',".coverage-image",function () {
            let img = $(this).val();
            if($(this).next().find('img').length > 0){
                $(this).next().find('img').attr('src',img);
            }else{
                $(this).next().html('<img src="'+img+'" alt="news">');
            }
        });
    });
</script>
@if (Session::has('success'))
<script>
    $(document).ready(function() {
        Swal.fire(
            'Successful!',
            "{{ Session::get('success') }}",
            'success'
        )
    });
</script>
@endif
@if (Session::has('error'))
<script>
    $(document).ready(function() {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: "{{ Session::get('error') }}"
        })
    });
</script>
@endif
</body>

</html>
