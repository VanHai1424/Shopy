@extends('layouts.client')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <!-- hero -->
    <section class="py-0 no-overflow vh-100 scroll-down">
        <div class="image image-scroll" style="background-image:url(assets/images/demo/about-bg.jpg)"
            data--100-bottom-top="transform: translateY(0%);" data-top-bottom="transform: translateY(25%);"></div>
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <i class="icon-check"></i>
                </div>
            </div>
            <div class="row justify-content-center vh-100">
                <div class="col-md-4 align-self-center text-white text-center">
                    <h1 class="text-uppercase fs-60">Giới Thiệu</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- article -->
    <article>
        <div class="container">
            <div class="row justify-content-center gutter-1">

                <!-- post -->
                <div class="col-lg-8">
                    <div class="bg-white p-4">
                        <h2 class="text-uppercase">Lịch Sử</h2>
                        <p>
                            Shopy, một thương hiệu nổi tiếng trong lĩnh vực thương mại điện tử, đã trải qua một hành trình phát triển đầy ấn tượng kể từ khi thành lập. Được ra mắt vào năm 2024, Shopy bắt đầu như một nền tảng nhỏ với mục tiêu kết nối người mua và người bán trực tuyến. Với sự cam kết cung cấp trải nghiệm mua sắm tốt nhất, Shopy nhanh chóng mở rộng và trở thành một trong những nền tảng thương mại điện tử hàng đầu trên thế giới.
                        </p>
                    </div>
                </div>

                <div class="col-lg-8">
                    <figure class="equal equal-50">
                        <span class="image" style="background-image: url(assets/images/demo/image-1.jpg)"></span>
                    </figure>
                </div>

                <div class="col-lg-8">
                    <div class="bg-white p-4">
                        <h2 class="text-uppercase">Thiết kế</h2>
                        <p>Thiết kế website của Shopy đã đóng góp quan trọng vào sự thành công của thương hiệu, mang lại trải nghiệm người dùng tuyệt vời và thu hút hàng triệu người mua sắm trực tuyến. Dưới đây là những yếu tố nổi bật trong thiết kế website của Shopy</p>
                    </div>
                </div>

            </div>
        </div>
    </article>
@endsection
