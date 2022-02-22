<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel</title>

    @include('layouts.partials.css')
    @include('layouts.partials.script')
    @include('layouts.partials.dataTables')


</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

   @include('layouts.partials.navbar')

   @include('layouts.partials.sidebar')

    <div class="content-wrapper">
        @yield('content')
    </div>

    @include('layouts.partials.footer')
</div>

@include('sweetalert::alert')

</body>
</html>
