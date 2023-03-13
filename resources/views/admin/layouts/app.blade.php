<!DOCTYPE html>
<html lang="en"> 
<head>
    <title> @yield('title', 'Trang quản trị') </title>
        
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico"> 

    <!-- FontAwesome JS-->
    <script defer src="{{ asset('admin/assets/plugins/fontawesome/js/all.min.js') }}"></script>

    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="{{ asset('admin/assets/css/portal.css') }}">

    <!-- App CKeditor -->  
    {{-- <script src="../ckeditor.js"></script> --}}
</head>
<body class="app">   	
    
    @include('admin.layouts.header')
    @include('admin.layouts.sidebar')

    
    <div class="app-wrapper">

    @yield('content')

    </div><!--//app-content-->

@include('admin.layouts.footer')
