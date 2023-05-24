<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('fronthand.layouts.header')
</head>
<body>
    @include('fronthand.layouts.navbar')
    @yield('main')
    @include('fronthand.layouts.footer')
    @include('fronthand.layouts.script')
</body>
</html>
