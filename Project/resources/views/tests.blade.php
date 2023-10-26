@extends('layouts.page')


@section('title')
    Выбор тестов
@endsection

@section('main.css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/tests/tests.css') }}">
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

            <x-tests.block :href="route('test.registration', ['do' => 'suicide'])" title="«Модификация суицидального риска»"
                text="Придумать текст">
            </x-tests.block>

            <x-tests.block :href="route('test.registration', ['do' => 'conflict'])" title="«Уровень конфликтности личности»"
                text="Придумать текст">
            </x-tests.block>

            <x-tests.block :href="route('test.registration', ['do' => 'coping'])" title="«Индикатор копинг-стратегий»"
                text="Придумать текст">
            </x-tests.block>

            @if ($count < 3)
            <x-tests.arrows />
            @endif
        </div>
    @endsection

    @section('main.js')
        @parent
        <script src="{{ asset('js/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('js/tests.js') }}"></script>
    @endsection
