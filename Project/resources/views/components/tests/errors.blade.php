<div class="container error">
    @if (count($errors) > 0 && count($errors) <4)
        @foreach ($errors->all() as $item)
            <div class="alert alert-dismissible fade show error_block" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                <strong>Ошибка</strong> <br> {{ $item }}
            </div>
        @endforeach
    @elseif(session('error'))
        <div class="alert alert-dismissible fade show error_block" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            <strong>Ошибка</strong> <br> {{ session('error') }}
        </div>
    @elseif (count($errors) > 4)
        <div class="alert alert-dismissible fade show error_block" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            <strong>Ошибка</strong> <br>Не все поля выделены
        </div>
    @endif
</div>
