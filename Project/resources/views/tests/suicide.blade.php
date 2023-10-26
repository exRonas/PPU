@extends('layouts.page')

@section('title')
    Тест - {{ $title }}
@endsection
@section('main.css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/tests/suicide.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tests/conflict.css') }}">
@endsection

@section('main.header')
@endsection

@section('absolute')
    @parent
@endsection

@section('error')
    <x-tests.errors message="" :many=true />
@endsection

@section('main.main')
    <x-tests.title :textTitle='$text_title' />
    <form class="row col-12 col-sm-10 mx-auto" action="{{ route('test.suicide.send') }}">
        @foreach ($json as $arr)
            @if ($loop->index == 0)
                <div class="section tests__wrapper mt-5 first page-{{ $loop->index + 1 }}">
                @elseif($loop->index == count($json) - 1)
                    <div class="section tests__wrapper mt-5 last d-none page-{{ $loop->index + 1 }}">
                    @else
                        <div class="section tests__wrapper mt-5 d-none page-{{ $loop->index + 1 }}">
            @endif
            @foreach ($arr as $question)
                <div class="col-12 mx-auto mt-5">
                    <div class="card question">

                        <x-test.title :title="$question->title" />

                        <div class="card-body">
                            @if ((int) old('suicide' . $question->id) === 1)
                                <x-test.test block="form-check-inline form__left" inVal='1' checked="true"
                                    inName="suicide{{ $question->id }}">
                                    Cогласен
                                </x-test.test>
                            @else
                                <x-test.test checked block="form-check-inline form__left" inVal='1'
                                    inName="suicide{{ $question->id }}">
                                    Cогласен
                                </x-test.test>
                            @endif

                            @if ((int) old('suicide' . $question->id) === 0 && old('suicide' . $question->id) != null)
                                <x-test.test block="form-check-inline form__left" inVal='0' checked="true"
                                    inName="suicide{{ $question->id }}">
                                    Не согласен
                                </x-test.test>
                            @else
                                <x-test.test block="form-check-inline form__left" inVal='0'
                                    inName="suicide{{ $question->id }}">
                                    Не согласен
                                </x-test.test>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        @endforeach
        <x-tests.button />
    </form>
    <x-tests.pages :pages='$pages' />
@endsection
@section('main.js')
    @parent
    <script src="{{ asset('js/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('js/test.js') }}"></script>
@endsection
