@extends('layouts.page')


@section('title')
    Главная
@endsection

@section('main.css')
    @parent
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Roboto&display=swap"
        rel="stylesheet">
@endsection

@section('main.header')
@endsection

@section('absolute')
    @includeIf('layouts.figures.one')
    @includeIf('layouts.figures.two')
    {{-- @includeIf('layouts.figures.three') --}}
    @includeIf('layouts.figures.four')
@endsection

@section('main.main')
    <div class="section main__wrapper">
        <div class="row">
            <div class="section__img col-lg-6 col-md-10">
                @includeIf('layouts.figures.woman')
            </div>
            <div class="section__card opacity-80 col-lg-6 col-md-12">
                <div class="card text-start col-10 card__block">
                    <div class="card-body">
                        <h4 class="card-title fs-1 card__title ">Глубокое погружение в лабиринты души</h4>
                        <p class="card-text fs-5 mt-3 card__text">Разберитесь в своей уникальной личности и раскройте
                            потенциал с помощью
                            наших тщательно разработанных тестов. </p>
                        <div class="d-grid col-sm-12 col-6 fs-5 btn__block">
                            <button type="button" class="btn btn__choice p-2">Выбор тестов</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('main.js')
@parent
<script src="js/jquery/dist/jquery.min.js"></script>
<script src="js/index.js"></script>
@endsection
