<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
   @include('layouts.meta')
    @include('layouts.css')
</head>
<body>
<!-- banner -->
@include('layouts.header')

<div class="new_arrivals_agile_w3ls_info">
    <div class="container">
        @yield('content')
    </div>
</div>
<!-- //new_arrivals -->

<!-- footer -->
@include('layouts.footer')

@include('layouts.js')
</body>
</html>
