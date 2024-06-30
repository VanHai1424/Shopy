<!-- products -->
<div class="row gutter-1">
@foreach ($products as $item)
    <div class="col-6 col-md-4">
        <div class="card card-product">
            <figure class="card-image">
                <a href="{{route('chi-tiet', $item->id)}}">
                    <img src="{{ asset('storage/upload/' . $item->thumbnail) }}" alt="Image">
                </a>
            </figure>
            <div class="card-footer">
                <h3 class="card-title mb-1"><a href="{{route('chi-tiet', $item->id)}}">{{ $item->name }}</a></h3>
                <span class="price">{{ number_format($item->price) }} VND</span>
            </div>
        </div>
    </div>
@endforeach
</div>

<div class="row">
    <div class="col">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                @if ($products->onFirstPage())
                    <li class="page-item disabled"><a class="page-link" href="#!">Previous</a></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $products->previousPageUrl() }}">Previous</a>
                    </li>
                @endif
                @for ($i = 1; $i <= $products->lastPage(); $i++)
                    <li class="page-item {{ $products->currentPage() == $i ? 'active' : '' }}"><a class="page-link mx-1"
                            href="{{ $products->url($i) }}">{{ $i }}</a></li>
                @endfor
                @if ($products->hasMorePages())
                    <li class="page-item"><a class="page-link" href="{{ $products->nextPageUrl() }}">Next</a></li>
                @else
                    <li class="page-item disabled"><a class="page-link" href="#!">Next</a></li>
                @endif
            </ul>
        </nav>
    </div>
</div>
