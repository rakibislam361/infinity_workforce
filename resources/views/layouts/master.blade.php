<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>revinr Admin - @stack('title')</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="{{asset('admin/images/revinr_favicon.png')}}">
    <link rel="shortcut icon" href="{{asset('admin/images/revinr_favicon.png')}}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{asset('admin')}}/assets/css/cs-skin-elastic.css">
     <link rel="stylesheet" type="text/css" href="{{ asset('/admin/assets/css/jgrowl/jquery.jgrowl.min.css')}}" />
     <link rel="stylesheet" type="text/css" href="{{asset('/admin/assets/css/sweetalert.css')}}">

    <link rel="stylesheet" href="{{asset('admin')}}/assets/css/style.css">
   

   
    @stack('head')
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
</head>

<body>
    @include('layouts.navbar')
<div id="right-panel" class="right-panel">
     @include('layouts.topbar')
    <div class="content">
        @yield('content')
    </div>
    <div class="clearfix"></div>
     <!-- Footer -->
    <footer class="site-footer">
        <div class="footer-inner bg-white">
            <div class="row">
                <div class="col-sm-6">
                    Copyright &copy; revinr
                </div>
                <div class="col-sm-6 text-right">
                    Designed by <a href="http://revinr.com.au" target="_blank">revinr IT</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- /.site-footer -->
</div>
@include('layouts.footer')