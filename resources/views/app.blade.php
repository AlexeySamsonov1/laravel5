<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Styles -->
    <link href="/css/all.css" rel="stylesheet">

    <title>Document</title>
</head>
<body>
    @include('partials/navbar')
    <div class="content">
        {{--@include('partials/flash')--}}
        @include('vendor/flash/message')
        @yield('content')
    </div>
    <script src="/js/all.js"></script>
    <script>
        $('div.alert').not('.alert-important').delay(3000).slideUp(300);
    </script>
    @yield('footer')
</body>
</html>
