@props(['block', 'inVal', 'inName', 'text', 'checked' => false, 'lClass' => ''])

<x-test.block class="{{$block}}">
    <x-test.input value="{{$inVal}}" :checked="$checked" name="{{$inName}}" />
    <x-test.label :class="$lClass">
        {{$slot}}
    </x-test.label>
</x-test.block>