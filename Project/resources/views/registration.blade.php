@extends('layouts.page')

@section('title')
    {{ $title }}
@endsection
@section('main.css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/registration.css') }}">
@endsection

@section('main.header')
@endsection

@section('absolute')
    @parent
@endsection

@section('error')
    @parent
@endsection
@section('main.main')
    <form class="container col-12 mx-auto form" action="{{ route('test.' . $do) }}">
        <div class="row">
            <div class="mx-auto card text-center col-12 col-md-5 mb-5 form__left form__side">
                <div class="card-body">
                    <x-auth.quote :do="$do_rus" :text="$text" :author="$author" />
                </div>
            </div>


            <div class="mx-auto card text-start col-12 col-md-6 form__right form__side">
                <div class="card-body">

                    <x-auth.block>
                        <x-auth.input placeholder="Имя" name="name" />
                    </x-auth.block>

                    <x-auth.block>
                        <x-auth.input placeholder="Фамилия" name="lastname" />
                    </x-auth.block>

                    <x-auth.block>
                        <x-auth.input placeholder="Направление-Номер" name="group" />
                    </x-auth.block>

                    <x-auth.button />
                </div>
            </div>
        </div>
    </form>
@endsection
@section('main.js')
    @parent
    <script src="{{ asset('js/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('js/test.js') }}"></script>
@endsection
