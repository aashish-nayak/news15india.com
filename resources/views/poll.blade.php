@extends('layouts.frontend.master')

@section('sections')
    <main class="container-fluid mx-auto position-relative">
        <div class="row">
            <!-- Ad Banner  -->
            <section class="container-fluid mx-auto px-0 text-center">
                <a href="javascript:void(0)"><img loading="lazy" src="{{ asset('front-assets/img/banner.png') }}"
                        class="w-100 banner-height" alt="" srcset=""></a>
            </section>
            <!-- Ad Banner  -->
            <aside class="col-md-3 col-12 my-1 pt-1 px-1 my-md-0 order-2 order-md-1">
                <div class="sticky-top" style="z-index:1">
                    @includeIf('components.whatsapp-ad')
                    <div class="ad-box my-2">
                        <p class="m-0 text-center bg-secondary text-light" style="font-size:1.2rem">Advertisement</p>
                        <div class="box">
                            <a href="javascript:void(0)">
                                <img src="{{ asset('front-assets/img/square-ad.png') }}" style="height: 250px;object-fit:cover;" class="w-100" loading="lazy" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </aside>
            <div class="col-md-6 col-12 px-1 pr-md-1 order-1 order-md-2">
                <div class="main-bg-clr mx-auto container my-2">
                    @if($polls->count()>0)
                    @foreach ($polls as $key => $poll)
                    @if ($polls->count()== 1 && $key == 0)
                    @php
                        $meta = [
                            'title' => $poll->topic,
                            'prefix' => ' - ' . setting('site_name'),
                            'keywords' => setting('site_meta_keyword'),
                            'description' => setting('site_meta_description'),
                            'image' => asset('storage/media/'.$poll->pollImage->filename),
                            'type' => 'Polls',
                        ];
                    @endphp
                    @else
                    @php
                        $meta = [
                            'title' => 'Polls',
                            'prefix' => ' - ' . setting('site_name'),
                            'keywords' => setting('site_meta_keyword'),
                            'description' => setting('site_meta_description'),
                            'image' => setting('site_log'),
                            'type' => 'Polls',
                        ];
                    @endphp
                    @endif
                    @section('meta-tags')
                    @meta($meta)
                    @endsection
                    @php
                        $new = new App\Helpers\PollWriter();
                        $new->draw($poll);
                    @endphp
                    <section class="container-fluid mx-auto px-0 text-center my-3">
                        <a href="javascript:void(0)">
                            <img loading="lazy" src="{{ asset('front-assets/img/banner.png') }}" class="w-100 banner-height" alt="" srcset="">
                        </a>
                    </section>
                    @endforeach
                    @else
                    @includeIf('components.poll-stub.no-poll')
                    @endif
                </div>
            </div>
            <aside class="col-md-3 col-12 my-1 pt-1 px-1 my-md-0 order-3 order-md-3">
                <div class="sticky-top" style="z-index:1">
                    @includeIf('components.whatsapp-ad')
                    <div class="ad-box my-2">
                        <p class="m-0 text-center bg-secondary text-light" style="font-size:1.2rem">Advertisement</p>
                        <div class="box">
                            <a href="javascript:void(0)">
                                <img src="{{ asset('front-assets/img/square-ad.png') }}" style="height: 250px;object-fit:cover;" class="w-100" loading="lazy" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </main>
@endsection
