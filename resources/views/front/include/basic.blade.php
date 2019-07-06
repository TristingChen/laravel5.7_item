<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 10)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Mirrored from edena-creative-multipurpose-bootstrap-theme.little-neko.com/files/shop-home.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Aug 2015 04:30:18 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>

    <!-- Basic Page Needs ================================================== -->
    <meta charset="utf-8">
    <title>云城</title>
    <meta name="description" content="neko-description">

    <!-- Mobile Specific Metas ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS ================================================== -->

    <!-- web font  -->
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:400,700' rel='stylesheet' type='text/css'>
    <!-- External plugins -->
    <!-- Revolution slider  -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/front/js-plugins/rs-plugin/css/settings.css') }}" media="screen" />


    <!-- Neko framework  -->
    <link type="text/css" rel="stylesheet" href="{{ asset('/front/custom-icons/css/custom-icons.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('/front/neko-framework/external-plugins/external-plugins.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('/front/neko-framework/css/layout/neko-framework-layout.css') }}">
    <link type="text/css" rel="stylesheet" id="color" href="{{ asset('/front/neko-framework/css/color/neko-framework-color.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('/front/css/custom.css') }}">

    <!-- Favicons ================================================== -->
    <link rel="shortcut icon" href="{{ asset('/front/images/favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('/front/images/apple-touch-icon.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('/front/images/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('/front/images/apple-touch-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('/front/images/apple-touch-icon-144x144.png') }}">

    <script src="{{ asset('/front/neko-framework/external-plugins/modernizr/modernizr.custom.js') }}"></script>
        @yield('css')

    </head>
<body class="activate-appear-animation header-7 pre-header-on">
        <div id="global-wrapper">
        <!-- 公共头部内容 -->
        @include('front.include.header')
            @yield('content')
        @include('front.include.footer')
        <!-- Placed at the end of the document so the pages load faster -->
        <script type="text/javascript" src="{{ asset('/front/neko-framework/js/jquery/jquery-1.10.2.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/front/neko-framework/js/jquery-ui/jquery-ui-1.8.23.custom.min.js') }}"></script>

        <!-- external framework plugins -->
        <script type="application/javascript" src="{{ asset('/front/neko-framework/external-plugins/external-plugins.min.js') }}"></script>
        <!-- neko framework script -->
        <script type="text/javascript" src="{{ asset('/front/neko-framework/js/neko-framework.js') }}"></script>

        <!-- external custom plugins -->

        <!-- Revolution slider -->
        <script type="text/javascript" src="{{ asset('/front/js-plugins/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/front/js-plugins/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>

        <!-- neko custom script --> 
        <script src="{{ asset('/front/js/custom.js') }}"></script>
        @yield('javascript')
        <!-- end: JavaScript -->
    </body>
</html>