@foreach ($comments as $item)
    <li class="review">
        <div class="review_meta">
            <span class="fs-12 text-uppercase text-muted">{{$item->created_at->format('d/m/Y')}}</span>
        </div>
        <h4 class="review_title">{{$item->user->name}}</h4>
        <p>{{$item->content}}</p>
    </li>
@endforeach