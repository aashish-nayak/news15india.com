<!DOCTYPE html>
<html lang="en" class="semi-dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('assets/images/favicon-32x32.png')}}" type="image/png" />
    <!--plugins-->
    <link rel="stylesheet" href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/plugins/simplebar/css/simplebar.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/plugins/metismenu/css/metisMenu.min.css')}}" />
    @stack('plugin-css')
    <!-- loader-->
    <link rel="stylesheet" href="{{asset('assets/css/pace.min.css')}}" />
    <script src="{{asset('assets/js/pace.min.js')}}"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/icons.css')}}" />
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/dark-theme.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/semi-dark.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/header-colors.css')}}" />
    @stack('css')
    <title>@yield('title') - {{ config('app.name') }}</title>
</head>
