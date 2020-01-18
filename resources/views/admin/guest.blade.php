<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Front Page')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.bootcss.com/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
