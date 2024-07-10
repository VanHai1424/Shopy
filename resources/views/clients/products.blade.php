@extends('layouts.client')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <!-- breadcrumbs -->
    <section class="breadcrumbs bg-light">
        <div class="container">
          <div class="row">
            <div class="col">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{$category?->parent ? $category->parent->id : $category?->id}}">{{$category?->parent?->name ?? $category?->name}}</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{$category?->parent ? $category?->name : ""}}</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>
  
      <!-- listing -->
      <section class="pt-6">
        <div class="container">
  
          <!-- sort -->
          <div class="row gutter-1 align-items-end">
            <div class="col-md-6">
              <h1>{{$category?->name}}</h1>
            </div>
          </div>
  
          <!-- filters -->
          <div class="row filter">
            <div class="col-md-6 col-lg">
              <div class="dropdown">
                <button class="btn btn-filter btn-block dropdown-toggle" type="button" id="dropdown-filter-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Kích Cỡ
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdown-filter-2">
                  <form action="" id="sizeform" method="post">
                    <div class="btn-group-toggle btn-group-square" data-toggle="buttons">
                      @foreach ($sizes as $item)
                      <label class="btn active">
                        <input type="checkbox" name="size" value="{{$item->id}}" id="option-{{$item->id}}"> {{$item->name}}
                      </label>
                      @endforeach
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg">
              <div class="dropdown">
                <button class="btn btn-filter btn-block dropdown-toggle" type="button" id="dropdown-filter-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Màu Sắc
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdown-filter-3">
                  <form method="post" id="colorform" action="">
                    <div class="btn-group-toggle btn-group-square btn-group-colors" data-toggle="buttons">
                      @foreach ($colors as $item)
                      <label class="btn text-{{$item->name}}">
                        <input type="checkbox" name="color" value="{{$item->id}}" id="option-2-{{$item->id}}">
                      </label>
                      @endforeach
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <button id="submit-form" class="btn btn-primary px-3">Lọc</button>
          </div>
  
          <div id="product-container">
            <!-- products -->
            <div class="row gutter-1">
              @foreach ($products as $item)
              <div class="col-6 col-md-4">
                <div class="card card-product">
                  <figure class="card-image d-flex justify-content-center align-items-center" style="height: 379.99px;">
                    <a href="{{route('chi-tiet', $item->id)}}">
                      <img src="{{asset('storage/upload/products/'.$item->thumbnail)}}" alt="Image">
                    </a>
                  </figure>
                  <div class="card-footer">
                    <h3 class="card-title mb-1"><a href="{{route('chi-tiet', $item->id)}}">{{$item->name}}</a></h3>
                    <span class="price">{{number_format($item->price)}} VND</span>
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
                    <li class="page-item"><a class="page-link" href="{{$products->previousPageUrl()}}">Previous</a></li>
                    @endif
                    @for ($i = 1; $i <= $products->lastPage(); $i++)
                      <li class="page-item {{$products->currentPage() == $i ? 'active' : ""}}"><a class="page-link mx-1" href="{{$products->url($i)}}">{{$i}}</a></li>
                    @endfor
                    @if ($products->hasMorePages())
                    <li class="page-item"><a class="page-link" href="{{$products->nextPageUrl()}}">Next</a></li>
                    @else
                    <li class="page-item disabled"><a class="page-link" href="#!">Next</a></li>
                    @endif
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection

@section('script')
    <script>
      $(document).ready(function() {
        $('#submit-form').click(function() {
          var sizeData = $('#sizeform').serializeArray();
          var colorData = $('#colorform').serializeArray();
          var formData = sizeData.concat(colorData);
          var data = {};
          formData.forEach(function(element) {
              if (!data[element.name]) {
                  data[element.name] = [];
              }
              data[element.name].push(element.value);
          });
          $.ajax({
            url: '{{ route("filter-pro", $category->id ?? 1) }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                data: data
            },
            success: function(response) {
                $('#product-container').html(response.html);
            },
            error: function(xhr, status, error) {
                console.error(error); 
            }
        });
        })
      })
    </script>
@endsection