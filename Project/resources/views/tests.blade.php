@extends('layouts.page')


@section('title')
    Выбор тестов
@endsection

@section('main.css')
    @parent
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <link rel="stylesheet" href="{{asset('css/tests.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Roboto&display=swap"
        rel="stylesheet">
@endsection

@section('main.header')
@endsection

@section('absolute')
    @parent
@endsection

@section('main.main')
    <div class="section tests__wrapper mt-2">
        <div class="row tests__list">
            <p class="text-center mb-4 text h2">Выбор тестов</p>
            <div class="col-10 col-sm-8 col-md-6 col-lg-4 p-3 mx-auto first card__block">
                <div class="card card__body">
                    <div class="card-body text-center">
                        <h3 class="card-title card__title fs-4 mb-3">«Суицидального риска модификация»</h3>
                        <p class="card-text card__text mt-3">Это текст. Вы можете перетащить его в любое место на странице. Нажмите один раз и выберите «Редактировать текст» или просто нажмите дважды, чтобы добавить свой текст и настроить шрифт. </p>
                        <a name="" id="" class="btn col-6 p-2 btn__choice" href="/test/suicide" role="button">Перейти</a>
                    </div>
                </div>
            </div>
            <div class="col-10 col-sm-8 col-md-6 col-lg-4 p-3 mx-auto card__block">
                <div class="card card__body">
                    <div class="card-body text-center">
                        <h3 class="card-title card__title fs-4 mb-3">«Уровень конфликтности личности»</h3>
                        <p class="card-text card__text mt-3">Это текст. Вы можете перетащить его в любое место на странице. Нажмите один раз и выберите «Редактировать текст» или просто нажмите дважды, чтобы добавить свой текст и настроить шрифт. </p>
                        <a name="" id="" class="btn col-6 p-2 btn__choice" href="/test/conflict" role="button">Перейти</a>
                    </div>
                </div>
            </div>
            <div class="col-10 col-sm-8 col-md-6 col-lg-4 p-3 mx-auto card__block">
                <div class="card card__body">
                    <div class="card-body text-center">
                        <h3 class="card-title card__title fs-4 mb-3">«Индикатор копинг-стратегий»</h3>
                        <p class="card-text card__text mt-3">Это текст. Вы можете перетащить его в любое место на странице. Нажмите один раз и выберите «Редактировать текст» или просто нажмите дважды, чтобы добавить свой текст и настроить шрифт. </p>
                        <a name="" id="" class="btn col-6 p-2 btn__choice" href="/test/coping" role="button">Перейти</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 text-center mt-4 mb-5">
            <button type="button" class="btn btn__prev me-5">
                <svg width="27px"  viewBox="0 0 18 17" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g transform="translate(8.500000, 8.500000) scale(-1, 1) translate(-8.500000, -8.500000)">
                        <polygon class="btn-6-pl" points="16.3746667 8.33860465 7.76133333 15.3067621 6.904 14.3175671 14.2906667 8.34246869 6.908 2.42790698 7.76 1.43613596"></polygon>
                        <path d="M-1.48029737e-15,0.56157424 L-1.48029737e-15,16.1929159 L9.708,8.33860465 L-2.66453526e-15,0.56157424 L-1.48029737e-15,0.56157424 Z M1.33333333,3.30246869 L7.62533333,8.34246869 L1.33333333,13.4327013 L1.33333333,3.30246869 L1.33333333,3.30246869 Z"></path>
                    </g>
                </svg>
            </button>
            <button type="button" class="btn btn__next">
                <svg width="27px" viewBox="-1 0 18 17" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g>
                        <polygon class="btn-6-pl" points="16.3746667 8.33860465 7.76133333 15.3067621 6.904 14.3175671 14.2906667 8.34246869 6.908 2.42790698 7.76 1.43613596"></polygon>
                        <path d="M-4.58892184e-16,0.56157424 L-4.58892184e-16,16.1929159 L9.708,8.33860465 L-1.64313008e-15,0.56157424 L-4.58892184e-16,0.56157424 Z M1.33333333,3.30246869 L7.62533333,8.34246869 L1.33333333,13.4327013 L1.33333333,3.30246869 L1.33333333,3.30246869 Z"></path>
                    </g>
                </svg>
            </button>
        </div>
    </div>
@endsection

@section('main.js')
    @parent
    <script src="{{asset("js/jquery/dist/jquery.min.js")}}"></script>
    <script src="{{asset("js/tests.js")}}"></script>
@endsection
