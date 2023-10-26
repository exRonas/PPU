@props(['search' => 'Поиск по', 'name' => 'one'])

<div {{$attributes->class([
    'accordion-item mb-5'
])}}>
    <h2 class="accordion-header" id="flush-heading{{ $name }}">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-collapse{{ $name }}" aria-expanded="true"
            aria-controls="flush-collapse{{ $name }}">
            {{ $search }}
        </button>
    </h2>
    <div id="flush-collapse{{ $name }}" class="accordion-collapse collapse row"
        aria-labelledby="flush-heading{{ $name }}" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">
            {{ $slot }}
        </div>
    </div>
</div>
