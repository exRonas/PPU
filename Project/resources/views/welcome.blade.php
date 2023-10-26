@extends('layouts.page')


@section('title')
    Главная
@endsection

@section('main.css')
    @parent
    <link rel="stylesheet" href="{{asset('css/welcome.css')}}">
@endsection

@section('main.header')
@endsection

@section('absolute')
@parent
@endsection

@section('main.main')
    <div class="section main__wrapper mt-4">
        <div class="row">
            
            <div class="section__img col-lg-6 col-md-10">
                @includeIf('layouts.figures.woman')
            </div>

            <div class="section__card opacity-80 col-lg-6 col-md-12">
                <div class="card text-start col-sm-12 col-md-10 card__block">
                    <div class="card-body">
                        <h4 class="card-title fs-1 card__title ">Глубокое погружение в лабиринты души</h4>
                        <p class="card-text fs-5 mt-3 card__text">Разберитесь в своей уникальной личности и раскройте
                            потенциал с помощью
                            наших тщательно разработанных тестов. </p>
                        <div class="d-grid col-sm-12 col-md-6 fs-5 btn__block">
                            <a role="button" class="btn btn__choice p-2" href='{{route('tests')}}'>Выбор тестов</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('main.js')
@parent
<script src="{{asset("js/jquery/dist/jquery.min.js")}}"></script>
<script src="{{asset("js/welcome.js")}}"></script>
@endsection
