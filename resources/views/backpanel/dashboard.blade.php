@extends('layouts.backpanel.master')
@section('title','Dashboard')
@section('sections')
    <div class="row row-cols-1 row-cols-lg-3 row-cols-xl-4">
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="text-center">
                        <div class="widgets-icons rounded-circle mx-auto bg-light-primary text-primary mb-3">
                            <i class="bx bx-news"></i>
                        </div>
                        <h4 class="my-1">{{$totalNews}}</h4>
                        <p class="mb-0 text-secondary">Total News</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="text-center">
                        <div class="widgets-icons rounded-circle mx-auto bg-light-warning text-warning mb-3">
                            <i class="bx bx-comment-detail"></i>
                        </div>
                        <h4 class="my-1">{{$totalComments}}</h4>
                        <p class="mb-0 text-secondary">Total Comments</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="text-center">
                        <div class="widgets-icons rounded-circle mx-auto bg-light-danger text-danger mb-3">
                            <i class="bx bx-images"></i>
                        </div>
                        <h4 class="my-1">{{$totalFiles}}</h4>
                        <p class="mb-0 text-secondary">Total Files</p>
                    </div>
                </div>
            </div>
        </div>
        @permission('read-user')
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="text-center">
                        <div class="widgets-icons rounded-circle mx-auto bg-light-info text-info mb-3">
                            <i class="bx bx-group"></i>
                        </div>
                        <h4 class="my-1">{{$totalUsers}}</h4>
                        <p class="mb-0 text-secondary">Total Users</p>
                    </div>
                </div>
            </div>
        </div>
        @endpermission
    </div>
    <div class="row">
        <div class="col-12 col-xl-6 d-flex">
            <div class="card radius-10 w-100">
                <div class="card-header">
                    <h5 class="mb-0">Recent News</h5>
                </div>
                <div class="customers-list p-3 mb-3">
                    @foreach ($recentNews as $recentnews)
                    <div class="customers-list-item d-flex align-items-center border-top border-bottom p-2 cursor-pointer">
                        <div class="">
                            <img src="{{asset('storage/media/'.$recentnews->newsImage->filename)}}" class="rounded-circle" width="46" height="46" alt="" />
                        </div>
                        <div class="ms-2">
                            <h6 class="mb-1 font-14">{{$recentnews->title}}</h6>
                            <p class="mb-0 font-13 text-secondary">{{$recentnews->categories->first()->cat_name}}</p>
                        </div>
                        <div class="list-inline d-flex customers-contacts ms-auto"> 
                            <a href="{{route('single-news',$recentnews->slug)}}" target="_blank" class="list-inline-item"><i class='bx bx-show'></i></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card radius-10 w-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <h5 class="mb-0">Top Categories</h5>
                        </div>
                        <div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
                        </div>
                    </div>
                    <div class="mt-5" id="chart15"></div>
                </div>
                <ul class="list-group list-group-flush">
                    @php
                        $bgArr = ['bg-success','bg-danger','bg-warning','bg-info','bg-dark'];
                        $newsCountArr = [];
                    @endphp
                    @foreach ($topCategories as $key => $cat)
                    <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
                        @php
                            array_push($newsCountArr,$cat->nestedNewsCount)
                        @endphp
                        {{$cat->cat_name}} <span class="badge {{$bgArr[rand(0,count($bgArr)-1)]}} rounded-pill">{{$cat->nestedNewsCount}}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <input type="hidden" name="" id="cats" value="{{implode(', ',$topCategories->pluck('cat_name')->toArray() ?? [])}}">
    <input type="hidden" name="" id="cats-news-counts" value="{{implode(', ', $newsCountArr)}}">
@endsection

@push('plugin-scripts')
<script src="{{ asset('assets/plugins/apexcharts-bundle/js/apexcharts.min.js')}}"></script>
@endpush

@push('scripts')
{{-- <script src="{{ asset('assets/js/index.js')}}"></script> --}}
<script>
    new PerfectScrollbar('.customers-list');
    $(document).ready(function () {
        let seriesList = [];
        $.each($('#cats-news-counts').val().split(', '), function (indexInArray, val) { 
             seriesList.push(Number(val));
        });
        e = {
            series: seriesList,
            chart: {
                height: 240,
                type: "donut"
            },
            legend: {
                position: "bottom",
                show: !1
            },
            plotOptions: {
                pie: {
                    donut: {
                        size: "80%"
                    }
                }
            },
            colors: ["#17a00e", "#0d6efd", "#f41127", "#ffc107" , "#fd8dd6"],
            dataLabels: {
                enabled: !1
            },
            labels: $("#cats").val().split(', '),
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        height: 200
                    },
                    legend: {
                        position: "bottom"
                    }
                }
            }]
        };
        new ApexCharts(document.querySelector("#chart15"), e).render();
    });
</script>
@endpush