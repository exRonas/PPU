@extends('layouts.page')

@section('title')
    Тест - {{ $title }}
@endsection
@section('main.css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/tests/conflict.css') }}">
@endsection

@section('main.header')
@endsection

@section('absolute')
    @parent
@endsection

@section('main.main')
    <x-tests.title :textTitle='$text_title' />
    <form class="row col-12 col-sm-10 mx-auto" action="{{ route('test.conflict.send') }}">
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

                        <div class="card-body col-12 ">
                            @if ((int)old('conflict' . $question->id) === 3)
                                <x-test.test block="mt-2" inVal='3' checked="true"
                                    inName="conflict{{ $question->id }}">
                                    {{ $question->answer_a }}
                                </x-test.test>
                            @else
                                <x-test.test block="mt-2" inVal='3' checked="true" inName="conflict{{ $question->id }}">
                                    {{ $question->answer_a }}
                                </x-test.test>
                            @endif

                            @if ((int)old('conflict' . $question->id) === 2)
                                <x-test.test block="mt-2" inVal='2' checked="true"
                                    inName="conflict{{ $question->id }}">
                                    {{ $question->answer_b }}
                                </x-test.test>
                            @else
                                <x-test.test block="mt-2" inVal='2' inName="conflict{{ $question->id }}">
                                    {{ $question->answer_b }}
                                </x-test.test>
                            @endif

                            @if ((int)old('conflict' . $question->id) === 1)
                                <x-test.test block="mt-2" inVal='1' checked="true"
                                    inName="conflict{{ $question->id }}">
                                    {{ $question->answer_c }}
                                </x-test.test>
                            @else
                                <x-test.test block="mt-2" inVal='1' inName="conflict{{ $question->id }}">
                                    {{ $question->answer_c }}
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
@endsection
@section('main.js')
    @parent
    <script src="{{ asset('js/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('js/test.js') }}"></script>
@endsection
