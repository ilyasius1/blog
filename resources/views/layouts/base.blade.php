<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/assets/images/favicon.png">
    <title>{{ $title ?? $titleDefault}}</title>
    <!--@section('head_scripts')
    <script src="/assets/js/jquery.js"></script>
    @show-->
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,400italic|Roboto:400,700,500|Open+Sans:400,600&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/assets/css/main.css" />
</head>
<body>
@yield('header')

@yield('searchpanel')

@yield('content')

@yield('footer_links')

@yield('footer_copyrights')

<!--@section('bottom_scripts')
    <script src="assets/js/default.js"></script>
@show

@section('app_scripts')
    <script src="assets/js/app.js? {{ sha1(microtime(true)) }}"></script>
@show-->
<script src="../js/main.js"></script>
    <script>
        const link=document.querySelector(".profile-link");
        const div=document.querySelector(".dropdown-menu.dropdown-menu-right");
        link.addEventListener("click", function () {
           div.classList.toggle("show");
        });
    </script>
</body>
</html>
