<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="shortcut icon" href="{{ asset('images/Anjaman_Logo.png') }}">
    <title>@yield('title')</title>

    @stack('prepend-style')
    @include('layouts.style')
    @stack('addon-style')
</head>

<body>

    @include('layouts.navbar')
    @yield('content')

    @stack('prepend-script')
    @include('layouts.script')
    @stack('addon-script')
</body>

</html>