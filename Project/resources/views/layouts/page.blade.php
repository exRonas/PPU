<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @section('main.css')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/figures.css') }}">
        <link rel="stylesheet" href="{{ asset('css/index.css') }}">
        <link rel="stylesheet" href="{{ asset('css/errors.css') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Lexend&family=Montserrat&family=Playfair+Display:wght@400;700&family=Roboto&display=swap"
            rel="stylesheet">
    @show
</head>

<body>
    @section('absolute')
        @includeIf('layouts.figures.one')
        @includeIf('layouts.figures.two')
        {{-- @includeIf('layouts.figures.three') --}}
        @includeIf('layouts.figures.four')
        {{-- Посмотреть с кругами --}}
    @show
    @section('error')
    <x-tests.errors message="" :many=false />
    @show
<div class="container root ">
    <div class="row mx-auto">
        <header>
            @section('main.header')
                <x-header />
            @show
        </header>
        <main class='main'>
            @section('main.main')
            @show
        </main>
        <footer class='footer' id='footer'>
            @section('main.footer')
                <x-footer />
            @show
        </footer>
    </div>
</div>
@section('main.js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('js/index.js') }}"></script>
@show
</body>

</html>
