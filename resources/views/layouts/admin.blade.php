<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>RAMA WISATA ADMIN</title>
  @include('includes.admin.style')
</head>
<body class="hold-transition sidebar-mini accent-danger">
<div class="wrapper">

  @include('includes.admin.navbar')
  @include('includes.admin.sidebar')
  <div class="content-wrapper">
    @yield('content')
  </div>

  @include('includes.admin.footer')
</div>

@include('includes.admin.script')
</body>
</html>
