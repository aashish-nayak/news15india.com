<footer class="nb-footer mt-1">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="row" style="margin: 0px;">
                    @foreach ($footerMenu->parentMenuNodes as $footer)
                    @if ($footer->has_child)
                    <div class="col-md-2 px-md-1 col-sm-6">
                        <div class="footer-info-single">
                            <h4 class="title">{{$footer->title}}</h4>
                            <ul class="list-unstyled">
                                @foreach ($footer->child as $subFooter)
                                <li>
                                    <a href="{{route('category-news',$subFooter->fetchUrl->slug)}}" title="">
                                        <i class="fa fa-angle-double-right"></i>
                                        {{$subFooter->title}}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    <div class="col-12 px-1 mt-5 mt-md-0 text-center">
                        <img src="{{ asset('front-assets/img/flag-color.png') }}" class="img-fluid footer-img" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="p-2 mt-3" style="background-color:var(--primary)">
                    <div class="col-12 p-2 text-center" style="background-color: var(--secondary);">
                        <p style="font-size:10px;color:white;margin:0%;">SUBSCRIBE TO OUR DAILY NEWSLETTER</p>
                    </div>
                    <div class="col-12 p-0 mt-2" style="background-color: var(--secondary);">
                        <div class="text-light p-2">
                            <div class="row">
                                <div class=" fa fa-envelope-open col-2" style="font-size:30px;"></div>
                                <div class="col-10" style="font-size:11px;">Subscribe to our Mailing List to get
                                    the Updates to Your E-mail Inbox</div>
                            </div>
                        </div>
                        <div class="col-12 px-2 py-2" style="font-size:16px;">
                            <!-- Subscription Code start here -->
                            <form action="" method="post" class="subscribe_form">
                                <input type="email" name="subscribe_email"
                                    class="w-100 mb-2 subscribe_email_footer" placeholder="name@example.com">
                                <button type="submit" name="subcribe" class="btn btn-block text-white font-weight-bold subscribe-button">SUBSCRIBE</button>
                            </form>
                            <!-- Subscription Code ends here -->
                        </div>
                    </div>
                </div>
                <div class="col-12 p-2 mt-3" style="background-color:var(--primary)">
                    <div class="col-12 p-2 text-center" style="background-color: var(--secondary);">
                        <p style="font-size:10px;margin:0%;" class="text-white">APP DOWNLOAD NOW</p>
                    </div>
                    <div class="col-12 p-0 mt-2" style="background-color: var(--secondary);">
                        <div class="text-light p-2">
                            <div class="row">
                                <div class="col-6"><a href="javascript:void(0)"><img src="{{asset('front-assets/img/app-store.png')}}"
                                            class="img-fluid" alt=""></a></div>
                                <div class="col-6"><a href="javascript:void(0)"><img src="{{asset('front-assets/img/play-store.png')}}"
                                            class="img-fluid" alt=""></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="copyright" style="border-top: 1px solid gray;">
        <div class="container-fluid px-1 text-center">
            <nav class="col-12 mx-auto">
                <ul class="m-0 p-1">
                    <li class="nav-item"><a class="p-0 nav-link" href="javascript:void(0)">About Us</a></li>
                    <li class="nav-item"><a class="p-0 nav-link" href="javascript:void(0)">Contact Us</a></li>
                    <li class="nav-item"><a class="p-0 nav-link" href="javascript:void(0)">Feedback</a></li>
                    <li class="nav-item"><a class="p-0 nav-link" href="javascript:void(0)">Careers</a></li>
                    <li class="nav-item"><a class="p-0 nav-link" href="javascript:void(0)">Advertisment with Us</a></li>
                    <li class="nav-item"><a class="p-0 nav-link" href="javascript:void(0)">Sitemap</a></li>
                    <li class="nav-item"><a class="p-0 nav-link" href="javascript:void(0)">Privacy Policy</a></li>
                    <li class="nav-item"><a class="p-0 nav-link" href="javascript:void(0)">Disclamer</a></li>
                </ul>
            </nav>
            <div class="col-sm-12 p-0">
                <p>Copyright © 20219 All Rights Reserved | <a href="javascript:void(0)"
                        class="text-decoration-none text-light"> <b><span style="color:orange;">NEWS</span><span
                                style="color:white;">15</span><span style="color:green">INDIA</span></b> </a>
                    (Mahira News Network Pvt. Ltd.)</p>
            </div>
        </div>
    </section>
</footer>