<!-- Desktop Nav Bar Start   -->
<header class="sticky-top start-header mx-auto mega-menu-navbar">
    <div class="container-fluid mx-auto position-relative">
        <div class="row align-items-center">
            <div class="col-md-2-custom col-12 px-md-1 pt-0 d-flex justify-content-between justify-content-md-start mobile-toggle mobile-height-black align-items-center">
                <div class="col-md-12 col-6 px-0 py-2 py-md-1">
                    <span class="text-light mt-1" onclick="openNav()">&#9776;</span>
                    <a href="{{ route('home') }}" class="m-0">
                        <div class="navbar-brand p-0 m-0">
                            <img loading="lazy" src="{{ setting('site_logo') ?? asset('front-assets/img/logo.png') }}" class="img-fluid" style="margin-top:-11px;" alt="logo">
                        </div>
                    </a>
                </div>
                <div class="d-md-none d-block col-6 justify-self-end text-right px-0">
                    <a href="javascript:void(0)" style="font-size:25px" class="mr-3 p-1 text-center" ><i class="fas fa-bell mt-3"></i></a>
                    <a href="javascript:void(0)" style="font-size:25px" class="mr-3 p-1 text-center"><i class="fas fa-user mt-3"></i></a>
                    <a href="javascript:void(0)" style="font-size:25px" class="mr-3 p-1 text-center"><i class="far fa-tv-retro mt-3"></i></i></a>
                </div>
            </div>
            <div class="col-md-8 d-md-block d-none position-static">
                <!-- Main Navbar Start -->
                <nav class="nav sticky-top d-none d-lg-block d-md-block position-static">
                    <ul class="ul-reset ml-2 ">
                        <li><a href="{{route('home')}}" class="nav-link"><i class="fa fa-home"></i></a></li>
                        @foreach ($menuNodes as $node)
                        @if ($node->has_child)
                        <li class="nav-item-sub p-relative">
                            <a href="{{$node->url}}" target="{{$node->target}}" class="nav-link">
                                {{$node->title}}
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                @foreach ($node->child as $sub)
                                    @if ($sub->has_child)
                                    <li class="dropdown-sub dropright">
                                        <a href="{{$sub->url}}" target="{{$sub->target}}" class="dropdown-item">{{$sub->title}}</a>
                                        <ul class="dropdown-sub-menu" role="menu">
                                            @foreach ($sub->child as $sub2)
                                            @if ($sub2->has_child)
                                            <li class="dropdown-sub-2 dropright">
                                                <a href="{{$sub2->url}}" target="{{$sub2->target}}" class="dropdown-item">{{$sub2->title}}</a>
                                                <ul class="dropdown-sub-menu-2" role="menu">
                                                    @foreach ($sub2->child as $sub3)
                                                        @if($sub3->has_child)
                                                        <li class="dropdown-sub-3 dropright">
                                                            <a href="{{$sub3->url}}" target="{{$sub3->target}}" class="dropdown-item">{{$sub3->title}}</a>
                                                            <ul class="dropdown-sub-menu-3" role="menu">
                                                                @foreach ($sub3->child as $sub4)
                                                                    @if($sub4->has_child == 0)
                                                                    <li><a href="{{$sub4->url}}" target="{{$sub4->target}}" class="dropdown-item">{{$sub4->title}}</a></li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                        @else
                                                        <li><a href="{{$sub3->url}}" target="{{$sub3->target}}" class="dropdown-item">{{$sub3->title}}</a></li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </li>
                                            @else
                                            <li><a href="{{$sub2->url}}" target="{{$sub2->target}}" class="dropdown-item">{{$sub2->title}}</a></li>
                                            @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                    @else
                                    <li><a href="{{$sub->url}}" target="{{$sub->target}}" class="dropdown-item">{{$sub->title}}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                        @else 
                        <li><a href="{{$node->url}}" target="{{$node->target}}" class="nav-link">{{$node->title}}</a></li>
                        @endif
                        @endforeach
                        @foreach ($megaMenu1 as $megaNode)
                        <li class="droppable">
                            <a href="{{$megaNode->url}}" target="{{$megaNode->target}}" class="nav-link">{{$megaNode->title}}</a>
                            @if ($megaNode->has_child)
                            <div class="mega-menu mx-auto">
                                <div class="col-12 py-4">
                                    <div class="flexrow row-7-el justify-content-start align-items-start">
                                        @foreach ($megaNode->child as $subMegaNode)
                                        <div class="element">
                                            <ul class="ul-reset p-3 w-100">
                                                <a href="{{$subMegaNode->url}}" target="{{$subMegaNode->target}}"><h3>{{$subMegaNode->title}}</h3></a>
                                                @if ($subMegaNode->has_child)
                                                @foreach ($subMegaNode->child as $subMega2)
                                                <li><a class="dropdown-item text-decoration-none" target="{{$subMega2->target}}" href="{{$subMega2->url}}">{{$subMega2->title}}</a></li>
                                                @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endif
                        </li>   
                        @endforeach
                        @foreach ($megaMenu2 as $megaNode)
                        <li class="droppable">
                            <a href="{{$megaNode->url}}" target="{{$megaNode->target}}" class="nav-link">{{$megaNode->title}}</a>
                            <div class="mega-menu row justify-content-center">
                                <div class="cf col-10 py-4">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-md-3">
                                            <h5 class="text-capitalize mb-4">Categories Name</h5>
                                            <div class="mega-menu-tabs nav flex-column flex-nowrap nav-pills pr-1" style="max-height: 300px;overflow-y:scroll;" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                @if($megaNode->has_child)
                                                    @foreach ($megaNode->child as $key => $subMegaNode)
                                                        @php
                                                            if($key == 0){
                                                                $active = 'active';
                                                                $show = 'show';
                                                            }else{
                                                                $active = '';
                                                                $show = '';
                                                            }
                                                        @endphp
                                                            <a href="{{$subMegaNode->url}}" target="{{$subMegaNode->target}}" class="mb-2 py-1 nav-link {{$active}}" id="tab-{{$subMegaNode->id}}-data" data-toggle="pill" data-target="#tab-{{$subMegaNode->id}}" type="button" role="tab" aria-controls="tab-{{$subMegaNode->id}}" aria-selected="true">{{$subMegaNode->title}}</a>
                                                        @push('tabs')
                                                            @includeIf('components.tab', ['subMegaNode' => $subMegaNode,'active'=>$active,'show'=>$show])
                                                        @endpush
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                @stack('tabs')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                        @foreach ($megaMenu3 as $key => $megaNode)
                        <li class="droppable">
                            <a href="{{$megaNode->url}}" target="{{$megaNode->target}}" class="nav-link">{{$megaNode->title}}</a>
                            @if($megaNode->reference->news()->count() > 1)
                            @foreach ($megaNode->reference->news()->latest()->limit(9)->get() as $subkey => $nodeNews)
                                @if($subkey == 0)
                                    @section('mega_design_1_id'.$key)
                                    <div class="col-5">
                                        <a href="{{route('single-news',$nodeNews->slug)}}" class="text-decoration-none">
                                            <img loading="lazy" src="{{asset('storage/media/'.$nodeNews->newsImage->filename)}}" class="img-fluid w-100" alt="{{$nodeNews->newsImage->alt}}">
                                            <h6 style="font-size: 1.4rem" class="mt-2 border-bottom">
                                                {{\Str::limit($nodeNews->title,60)}}
                                            </h6>
                                        </a>
                                        <p class="text-muted" style="font-size: 1.2rem">
                                            {{\Str::limit($nodeNews->short_description,100)}}
                                        </p>
                                    </div>
                                    @endsection
                                @else
                                    @push('mega_design_2_id'.$key)
                                    <div class="col mb-2 px-2">
                                        <div class="card card-shadow">
                                            <a href="{{route('single-news',$nodeNews->slug)}}" class="text-muted text-decoration-none">
                                                <img loading="lazy" src="{{asset('storage/media/'.$nodeNews->newsImage->filename)}}" class="card-img-top" alt="{{$nodeNews->newsImage->alt}}">
                                            </a>
                                            <div class="card-body p-3" style="border-bottom:2px solid var(--primary);">
                                                <a href="{{route('single-news',$nodeNews->slug)}}" class="text-decoration-none font-weight-bold">{{\Str::limit($nodeNews->title,60)}}</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endpush
                                @endif
                            @endforeach
                            <div class="mega-menu col-12">
                                <div class="row justify-content-center">
                                    <div class="cf col-12 py-4">
                                        <div class="row justify-content-center">
                                            @yield('mega_design_1_id'.$key)
                                            <div class="col-7">
                                                <div class="row row-cols-4 mx-0">
                                                    @stack('mega_design_2_id'.$key)
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </nav>
                <!-- Main Navbar End  -->
            </div>
            <!-- Search Button  -->
            <div class="col px-1">
                <div id="block-search-form" class="block block-search block-odd d-none d-md-flex justify-content-end">
                    <div class="content">
                        <form action="/drupal/globalnews/" method="post" id="search-block-form"
                            accept-charset="UTF-8">
                                <div class="container-inline">
                                    <h2 class="element-invisible">Search form</h2>
                                    <div class="form-item form-type-textfield form-item-search-block-form">
                                        <label class="element-invisible" for="edit-search-block-form--2">Search</label>
                                        <input title="Enter the terms you wish to search for." placeholder="Search"
                                            type="search" id="edit-search-block-form--2" name="search_block_form"
                                            value="" size="15" maxlength="128" class="form-text">
                                    </div>
                                    <div class="form-actions form-wrapper" id="edit-actions">
                                        <a type="submit" id="edit-submit" name="op" value="Search" class="form-submit"><i class="fa fa-search"></i></a>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Search Button End  -->
        </div>
    </div>
</header>
<!-- Desktop Nav Bar End -->