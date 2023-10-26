@props(['title', 'text', 'href'])
<div
    {{ $attributes->class(['col-10 col-sm-8 col-md-6 col-lg-4 p-3 mx-auto first card__block'])->merge([]) }}>
    <x-tests.card-body>

        <x-tests.card-title>
            {{$title}}
        </x-tests.card-title>

        <x-tests.card-text>
            {{$text}}
        </x-tests.card-text>

        <x-tests.card-link :href="$href">
        </x-tests.card-link>

    </x-tests.card-block>
</div>
