<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @section('main.css')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    @show
</head>

<body>
    @section('absolute')
        @includeIf('layouts.figures.one')
        @includeIf('layouts.figures.two')
        {{-- @includeIf('layouts.figures.three') --}}
        @includeIf('layouts.figures.four')
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
    @show
</body>

</html>
