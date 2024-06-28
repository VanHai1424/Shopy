@extends('layouts.client')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <!-- hero -->
    <section class="py-0 no-overflow vh-100">
        <div class="image image-scroll" style="background-image:url(assets/images/demo/background-1.jpg)"
            data--100-bottom-top="transform: translateY(0%);" data-top-bottom="transform: translateY(25%);"></div>
    </section>

    <!-- tabs -->
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4 text-center">
                    <ul class="nav nav-tabs nav-fill lavalamp" id="component-1" role="tablist">
                        <div class="lavalamp-object ease"
                            style="transition-duration: 0.2s; width: 186.712px;; height: 64px; transform: translate(0px, 0px);">
                        </div>
                        @foreach ($parentCategories as $key => $item)
                            <li class="nav-item lavalamp-item" style="z-index: 5; position: relative;">
                                <a class="nav-link {{ $key == 0 ? 'active' : '' }}" data-toggle="tab"
                                    href="#component-1-{{ $key + 1 }}" role="tab"
                                    aria-controls="component-1-{{ $key + 1 }}"
                                    aria-selected="false">{{ $item->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="tab-content" id="component-1-content">
                        @foreach ($childCategories as $key => $categories)
                            <div class="tab-pane fade {{$key == 1 ? "show active" : ""}}" id="component-1-{{$key}}" role="tabpanel"
                                aria-labelledby="component-1-{{$key}}">
                                <div class="row gutter-1">
                                    @foreach ($categories as $item)
                                    <div class="col-6 col-md-4 col-lg-2">
                                        <a href="{{route('danh-muc', $item->id)}}">
                                            <figure class="category">
                                                <img src="{{asset('storage/upload/'. $item->img)}}" alt="Image">
                                                <figcaption>{{$item->name}}</figcaption>
                                            </figure>
                                        </a>
                                    </div> 
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- categories -->
    <section class="py-1">
        <div class="container-full">
            <div class="row gutter-1">
                <div class="col-md-6">
                    <div class="card card-tile">
                        <figure class="card-image equal vh-75">
                            <span class="image image-scroll" style="background-image: url(assets/images/demo/image-3.jpg)"
                                data--100-bottom-top="transform: translateY(0%);"
                                data-top-bottom="transform: translateY(25%);"></span>
                        </figure>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-tile">
                        <figure class="card-image equal vh-75">
                            <span class="image image-scroll" style="background-image: url(assets/images/demo/image-1.jpg)"
                                data--100-bottom-top="transform: translateY(0%);"
                                data-top-bottom="transform: translateY(25%);"></span>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- trending -->
    <section class="pb-0">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-sm-8 col-md-6">
                    <h2>Sản Phẩm Mới</h2>
                </div>
            </div>
            <div class="row gutter-1">
                @foreach ($products as $item)
                <div class="col-md-4">
                    <div class="card card-product">
                        <figure class="card-image">
                            <a href="#!">
                                <img src="{{asset('storage/upload/'. $item->thumbnail)}}" alt="Image">
                            </a>
                        </figure>
                        <div class="card-footer">
                            <h3 class="card-title mb-1"><a href="#">{{$item->name}}</a></h3>
                            <span class="price">{{number_format($item->price)}} VND</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- logo -->
    <section class="no-overflow">
        <div class="container">
            <div class="row gutter-1 align-items-end">
                <div class="col-sm-8 col-md-6">
                    <h2>Thương Hiệu</h2>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="partners">
                        <div class="owl-carousel visible" data-items="[6,4,4,2]" data-nav="true" data-margin="10">
                            <a href="#"><img src="assets/images/demo/logo/logo-1.png" alt="Logo"></a>
                            <a href="#"><img src="assets/images/demo/logo/logo-2.png" alt="Logo"></a>
                            <a href="#"><img src="assets/images/demo/logo/logo-3.png" alt="Logo"></a>
                            <a href="#"><img src="assets/images/demo/logo/logo-4.png" alt="Logo"></a>
                            <a href="#"><img src="assets/images/demo/logo/logo-5.png" alt="Logo"></a>
                            <a href="#"><img src="assets/images/demo/logo/logo-6.png" alt="Logo"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
