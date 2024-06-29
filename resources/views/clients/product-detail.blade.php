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
                            <li class="breadcrumb-item"><a href="{{route('danh-muc', $product->category->parent->id)}}">{{$product->category->parent->name}}</a></li>
                            <li class="breadcrumb-item"><a href="{{route('danh-muc', $product->category->id)}}">{{$product->category->name}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>


    <!-- product -->
    <section class="hero">
        <div class="container">
            <div class="row gutter-2 gutter-md-4 justify-content-between">


                <!-- carousel -->
                <div class="col-lg-7">
                    <div class="row gutter-1 justify-content-between">
                        <div class="col-lg-10 order-lg-2">
                            <div class="owl-carousel owl-carousel--alt gallery" data-margin="0" data-slider-id="1"
                                data-thumbs="true" data-nav="true">
                                @foreach ($imgs as $item)
                                <figure>
                                    <a href="{{asset('storage/upload/'.$item)}}"><img src="{{asset('storage/upload/'.$item)}}"
                                            alt="Image"></a>
                                </figure>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-2 text-center text-lg-left order-lg-1">
                            <div class="owl-thumbs" data-slider-id="1">
                                @foreach ($imgs as $item)
                                <span class="owl-thumb-item">
                                    <img src="{{asset('storage/upload/'.$item)}}"alt="">
                                </span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-5 mb-lg-0">

                    <!-- description -->
                    <div class="row">
                        <div class="col-12">
                            <h1 class="fs-24">{{$product->name}}</h1>
                        </div>
                    </div>
                    <div class="row gutter-2">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Kích Cỡ</label>
                                <div class="btn-group-toggle btn-group-square" data-toggle="buttons">
                                    @foreach ($sizes as $item)
                                    <label class="btn">
                                        <input type="radio" class="btn-size" name="size" value="{{ $item->id }}" id="size-{{ $item->id }}"> {{ $item->name }}
                                    </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>màu sắc</label>
                                <div class="btn-group-toggle btn-group-square btn-group-colors" data-toggle="buttons" id="block-color">
                                    @foreach ($colors as $item)
                                    <label class="btn text-{{$item->name}}">
                                        <input type="radio" value="{{$item->id}}" name="color" id="option-2-1" >
                                    </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <span class="price fs-24 text-red">{{number_format($product->price)}} VND</span>
                        </div>
                        <div class="col-12">
                            <a href="#" class="btn btn-block btn-primary">Add to bag</a>
                        </div>
                    </div>

                    <!-- accordion -->
                    <div class="row">
                        <div class="col">
                            <div class="accordion" id="accordion-1">
                                <div class="card active">
                                    <div class="card-header" id="heading-1-1">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                                data-target="#collapse-1-1" aria-expanded="true"
                                                aria-controls="collapse-1-1">
                                                MÔ TẢ
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapse-1-1" class="collapse show" aria-labelledby="heading-1-1"
                                        data-parent="#accordion-1">
                                        <div class="card-body">
                                            <p>{{$product->desc}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="heading-1-3">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapse-1-3" aria-expanded="false"
                                                aria-controls="collapse-1-3">
                                                <span>
                                                    đánh giá (3)
                                                </span>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapse-1-3" class="collapse" aria-labelledby="heading-1-3"
                                        data-parent="#accordion-1">
                                        <div class="card-body">
                                            <p class="text-muted fs-14">Check Cotton Shirt is rated <b
                                                    class="text-dark">4.6</b> out of 5 by 3.</p>
                                            <ul>
                                                <li class="review">
                                                    <div class="review_meta">
                                                        <ul class="rating">
                                                            <li><i class="icon-star"></i></li>
                                                            <li><i class="icon-star"></i></li>
                                                            <li><i class="icon-star"></i></li>
                                                            <li><i class="icon-star"></i></li>
                                                            <li><i class="icon-star-o"></i></li>
                                                        </ul>
                                                        <span class="fs-12 text-uppercase text-muted ml-1">Juliet A. on may
                                                            31, 2018</span>
                                                    </div>
                                                    <h4 class="review_title">Love it.</h4>
                                                    <p>Nice jacket! Fits great. Looks good. Would buy again.</p>
                                                </li>
                                                <li class="review">
                                                    <div class="review_meta">
                                                        <ul class="rating">
                                                            <li><i class="icon-star"></i></li>
                                                            <li><i class="icon-star"></i></li>
                                                            <li><i class="icon-star"></i></li>
                                                            <li><i class="icon-star"></i></li>
                                                            <li><i class="icon-star-o"></i></li>
                                                        </ul>
                                                        <span class="fs-12 text-uppercase text-muted ml-1">Juliet A. on may
                                                            31, 2018</span>
                                                    </div>
                                                    <h4 class="review_title">Amazing fit.</h4>
                                                    <p>Nice jacket! Fits great. Looks good. Would buy again.</p>
                                                </li>
                                            </ul>
                                            <a href="#" class="underlined">Add a review</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Share this product</label>
                        <div>
                            <ul class="list list--horizontal">
                                <li><a href="#!" class="text-hover-facebook"><i
                                            class="fs-28 icon-facebook-square-brands"></i></a></li>
                                <li><a href="#!" class="text-hover-instagram"><i
                                            class="fs-28 icon-instagram-square-brands"></i></a></li>
                                <li><a href="#!" class="text-hover-twitter"><i
                                            class="fs-28 icon-twitter-square-brands"></i></a></li>
                                <li><a href="#!" class="text-hover-pinterest"><i
                                            class="fs-28 icon-pinterest-square-brands"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- related -->
    <section class="no-overflow">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2>Sản Phẩm Cùng Loại</h2>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="owl-carousel visible" data-items="[4,3,2,1]" data-margin="10" data-nav="true"
                        data-loop="true">
                        @foreach ($relatedProducts as $item)
                        <div class="card card-product">
                            <figure class="card-image">
                                <a href="{{route('chi-tiet', $item->id)}}">
                                    <img src="{{asset('storage/upload/'.$item->thumbnail)}}" alt="Image">
                                </a>
                            </figure>
                            <a href="{{route('chi-tiet', $item->id)}}" class="card-body">
                                <h3 class="card-title">{{$item->name}}</h3>
                                <span class="price">{{number_format($item->price)}} VND</span>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('.btn-size').on('click', function() {
                const idSize = $(this).val();
                $.ajax({
                    url: "{{route('filter-var', $product->id)}}",
                    method: "POST",
                    data: {
                        _token: '{{csrf_token()}}',
                        idSize
                    },
                    success: function(response) {
                        $('#block-color').html(response.data);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                })
            });

            
        });
    </script>
@endsection