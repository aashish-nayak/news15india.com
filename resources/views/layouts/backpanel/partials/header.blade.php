<!DOCTYPE html>
<html lang="en" class="semi-dark">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{setting('admin_favicon')}}" type="image/png" />
    <!--plugins-->
    <link rel="stylesheet" href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/plugins/datatable/css/select.dataTables.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/plugins/simplebar/css/simplebar.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}" />
	<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2-bootstrap4.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/plugins/datatable/css/buttons.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/plugins/metismenu/css/metisMenu.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/pace.min.css')}}"/>
	<script src="{{asset('assets/js/pace.min.js')}}"></script>
    @stack('plugin-css')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/icons.css')}}" />
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/input-tags/css/tagsinput.css') }}"/>
    <link rel="stylesheet" href="{{asset('assets/css/dark-theme.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/semi-dark.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/header-colors.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/custom-theme.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
    @stack('css')
    <title>@yield('title') - {{ setting('site_name') }}</title>
    <script src="{{asset('assets/plugins/limonte-sweetalert2/sweetalert2.all.js')}}"></script>
</head>
