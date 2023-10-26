<input {{$attributes->class(
    [
        "form-control form-input text-center" 
    ]
)->merge([
    'name' => '',
    'type' => "text",
    'value' => request()->old($attributes['name'])
])}}  
aria-describedby="helpId">