<div class="container text-center mt-5 mb-5">
    <div class="row">
        <div class="col-12 mx-auto page_num">
            @if ($pages > 1)
            @for ($i = 1; $i <= $pages; $i++)
            <span num="{{$i}}" class="me-md-4 ms-md-4 ms-sm-3 me-sm-3 ms-1 me-1 page_list fs-5 page_num-{{$i}}">{{ $i }}</span>
            @endfor
            @endif
        </div>
    </div>
</div>