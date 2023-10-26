@extends('layouts.page')

@section('title')
    {{ $title }}
@endsection
@section('main.css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/check.css') }}">
@endsection

@section('main.header')
@endsection

@section('absolute')
    @parent
@endsection

@section('main.main')
    <a href="{{ route('check.results') }}">Очистить поиск</a>
    <div class="accordion accordion-flush row" id="accordionFlushExample">

        <x-check.accordion class="mt-4" name='All' search='Вывод всех результатов'>
            <x-check.form action="{{ route('get.results') }}">
                <x-check.input type="hidden" name='do' value="all" />
                <x-check.button>Найти</x-check.button>
            </x-check.form>
        </x-check.accordion>

        <x-check.accordion name='Fullname' search='Поиск по имени'>
            <x-check.form action="{{ route('get.results') }}">
                <x-check.input placeholder="Имя" name='name' value="{{ old('name') }}" />
                <x-check.input placeholder="Фамилия" name='lastname' value="{{ old('lastname') }}" />
                <x-check.input type="hidden" name='do' value="name" />
                <x-check.button>Найти</x-check.button>
            </x-check.form>
        </x-check.accordion>

        <x-check.accordion name='Group' search='Поиск по группе'>
            <x-check.form action="{{ route('get.results') }}">
                <x-check.block>
                    <x-check.select name="group">
                        <x-check.option selected="true">Выберите группу</x-check.option>
                        <x-check.option value="им-11">ИМ-11</x-check.option>
                        <x-check.option value="им-12">ИМ-12</x-check.option>
                        <x-check.option value="ищ-11">ИШ-11</x-check.option>
                        <x-check.option value="иш-12">ИШ-12</x-check.option>
                    </x-check.select>
                </x-check.block>
                <x-check.input type="hidden" name='do' value="group" />
                <x-check.button>Найти</x-check.button>
            </x-check.form>
        </x-check.accordion>

        <div class="container">
            <div class="row results">
                @isset($result)
                    <div class="table-responsive">
                        <table class="table table-primary">
                            <thead>
                                <tr>
                                    <th scope="col">Группа</th>
                                    <th scope="col">Имя</th>
                                    <th scope="col">Фамилия</th>
                                    <th scope="col">Результаты</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($result as $item)
                                    <tr class="">
                                        <td scope="row">{{ $item['group'] }}</td>
                                        <td>{{ $item['name'] }}</td>
                                        <td>{{ $item['lastname'] }}</td>
                                        <td>
                                            @foreach ($item['results'] as $res)
                                                @isset($res->max)
                                                    <span class="me-4">{{ $res->index }} / {{ $res->max }}</span>
                                                @elseif(isset($res->title))
                                                    <span class="me-4">{{ $res->index }}</span>
                                                @else
                                                    <span class="me-4">{{ $res }}</span>
                                                @endisset
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endisset
            </div>
        </div>
    </div>
@endsection

@section('main.js')
    @parent
    <script src="{{ asset('js/jquery/dist/jquery.min.js') }}"></script>
@endsection
