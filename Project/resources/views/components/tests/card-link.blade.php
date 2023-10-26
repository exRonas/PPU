@props(['href' => '/'])

<a {{$attributes->class([
    "btn col-6 p-2 btn__choice"
])->merge([
    'href' => $attributes['link'], 
    'role' => 'button',
    'href' => $href
])
}}>Перейти</a>