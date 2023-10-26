<form {{$attributes->class([
    "container col-12 mx-auto"
])->merge([
    'action' => '',
])}}>
    {{$slot}}
</form>