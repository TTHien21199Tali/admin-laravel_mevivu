
{{-- <meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="url-home" content="{{ url('/') }}">
<meta name="currency" content="{{ config('custom.currency') }}">
<meta name="position_currency" content="{{ config('custom.format.position_currency') }}">
<title>@yield('title', 'Admin')</title>
<link rel="shortcut icon" type="image/x-icon" href="{{ asset(config('custom.images.favicon')) }}" />
<!-- CSS files -->
<link href="{{ asset('public/libs/tabler/dist/css/tabler.min.css') }}" rel="stylesheet"/>
<link href="{{ asset('public/libs/tabler/dist/css/tabler-vendors.min.css') }}" rel="stylesheet"/>
<link href="{{ asset('public/libs/tabler/plugins/tabler-icon/webfont/tabler-icons.min.css') }}" rel="stylesheet"type="text/css">
<link href="{{ asset('public/libs/jquery-toast-plugin/jquery.toast.min.css') }}" rel="stylesheet"type="text/css">
<link href="{{ asset('public/libs/Parsley.js-2.9.2/style.css') }}" rel="stylesheet">
<!-- datatable -->
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('/public/libs/datatables/plugins/bs5/css/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('/public/libs/datatables/plugins/buttons/css/buttons.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('/public/libs/datatables/plugins/responsive/css/responsive.bootstrap5.min.css') }}">
<style>
    @import url('https://rsms.me/inter/inter.css');
    :root {
    --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
    }
    body {
    font-feature-settings: "cv03", "cv04", "cv11";
    }
</style>
<link href="{{ asset('public/admins/assets/css/style.css') }}" rel="stylesheet">
@stack('libs-css')
@stack('custom-css') --}}

<meta charset="UTF-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<meta name="csrf-token" content="{{ csrf_token() }}"> 
<meta name="url-home" content="{{ url('/') }}"> 
<link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}"> 
 
@stack('lib-css') 
<link rel="stylesheet" href="{{ asset('libs/tabler/dist/css/tabler.min.css') }}"> 
<link rel="stylesheet" href="{{ asset('libs/dropzone/css/dropzone.min.css') }}"> 
<link rel="stylesheet" href="{{ asset('libs/rateyo/css/rateyo.min.css') }}"> 
<link rel="stylesheet" href="{{ asset('libs/owlcarousel/css/owl.carousel.min.css') 
}}"> 
<link rel="stylesheet" href="{{ 
asset('libs/owlcarousel/css/owl.theme.default.min.css') }}"> 
<link rel="stylesheet" href="{{ asset('libs/virtualselect/css/virtual
select.min.css') }}"> 
<link rel="stylesheet" href="{{ asset('libs/fancybox/fancybox.css') }}"> 
<link rel="stylesheet" href="{{ asset('libs/virtualselect/css/tooltip.min.css') 
}}"> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper
bundle.min.css" /> 
<title>Bài Viết</title> 
 
@stack('custom-css') 
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"> 


    