@extends('layouts.page')

@section('title')
    {{ $title }}
@endsection
@section('main.css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/results.css') }}">
@endsection

@section('main.header')
@endsection

@section('absolute')
    @parent
@endsection

@section('main.main')
    {{-- #ФИЧА Выводим значения всё в одном файле --}}
    {{-- #ЧЗХ Оптимизировать код компонентами --}}
    <div class="container results">
        @if (count($results) == 5)
        {{-- {{dd($results['title'])}} --}}
            <div class="accordion accordion-flush row" id="accordionFlushExample">
                <div class="accordion-item result mt-3 mb-5 mx-auto col-11 col-md-10 col-lg-8">
                    <div class="accordion-header accordion_header p-4 text-center" id="flush-headingOne">
                        <h4 class="card-title fs-5">{{ $results['title'] }}</h4>
                        <p class='mt-4'>Результ: {{ $results['result']}}</p>
                        <p class='mt-3'>{{ $results['index'] }} / {{ $results['max'] }}</p>
                        <div class="col-lg-2 col-md-4 col-sm-6 col-7 mx-auto">
                            <button class="accordion-button collapsed result_button" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                aria-expanded="true" aria-controls="flush-collapseOne">
                                Описание
                            </button>
                        </div>
                    </div>
                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body col-9 mx-auto accordion_text text-center">
                            {{ $results['description'] }}
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="accordion accordion-flush row" id="accordionFlushExample">
                {{-- _{{$loop->index}} --}}
                @foreach ($results as $item)
                    <div class="accordion-item result mt-3 mb-5 mx-auto col-11 col-md-10 col-lg-8">
                        <div class="accordion-header accordion_header p-4 text-center" id="flush-heading_{{ $loop->index }}">
                            <h4 class="card-title fs-5">{{ $item['title'] }}</h4>
                            <p class='mt-3'>{{ $item['index'] }} / {{ $item['max'] }}</p>
                            <div class="col-lg-2 col-md-4 col-sm-6 col-7 mx-auto">
                                <button class="accordion-button collapsed result_button" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#flush-collapse_{{ $loop->index }}"
                                    aria-expanded="true" aria-controls="flush-collapse_{{ $loop->index }}">
                                    Описание
                                </button>
                            </div>
                        </div>
                        <div id="flush-collapse_{{ $loop->index }}" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body col-9 mx-auto accordion_text text-center">
                                {{ $item['description'] }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        <a href='{{route('tests')}}' class="btn mt-4 col-8 col-md-6 col-lg-2 mx-auto d-block back">Выбор тестов</a>
    </div>

@endsection


@section('main.js')
    @parent
    <script src="{{ asset('js/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('js/tests.js') }}"></script>
    <script src="{{ asset('js/result.js') }}"></script>
@endsection