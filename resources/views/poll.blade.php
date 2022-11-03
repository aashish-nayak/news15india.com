@extends('layouts.frontend.master')
@section('meta-tags')
{!! SEO::generate() !!}
@endsection
@section('sections')
    <main class="container-fluid mx-auto position-relative">
        <div class="row">
            <!-- Ad Banner  -->
            <section class="container-fluid mx-auto px-0 text-center">
                {!!AdvertHTML('polls-header-1250x150')!!}
            </section>
            <!-- Ad Banner  -->
            <aside class="col-md-3 col-12 my-1 pt-1 px-1 my-md-0 order-2 order-md-1">
                <div class="sticky-top" style="z-index:1">
                    @includeIf('components.whatsapp-ad')
                    <div class="ad-box my-2">
                        {!!AdvertHTML('polls-left-sidebar-350x300')!!}
                    </div>
                </div>
            </aside>
            <div class="col-md-6 col-12 px-1 pr-md-1 order-1 order-md-2">
                <div class="main-bg-clr mx-auto container my-2">
                    @forelse ($polls as $key => $poll)
                    @php
                        $new = new App\Helpers\PollWriter();
                        $new->draw($poll);
                    @endphp
                    <section class="container-fluid mx-auto px-0 text-center my-3">
                        {!!AdvertHTML('polls-bottom-each-800x100')!!}
                    </section>
                    @empty
                    @includeIf('components.poll-stub.no-poll')
                    @endforelse
                </div>
            </div>
            <aside class="col-md-3 col-12 my-1 pt-1 px-1 my-md-0 order-3 order-md-3">
                <div class="sticky-top" style="z-index:1">
                    @includeIf('components.whatsapp-ad')
                    <div class="ad-box my-2">
                        {!!AdvertHTML('polls-right-sidebar-350x300')!!}
                    </div>
                </div>
            </aside>
        </div>
    </main>
@endsection
