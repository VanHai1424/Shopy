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
                    <h1 class="text-uppercase fs-60">Our Story</h1>
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
                        <h2 class="text-uppercase">The History</h2>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                            pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                            mollit anim id est laborum.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed eius doloremque, suscipit minus
                            asperiores hic aut at odio unde nihil culpa recusandae labore, sint nulla vitae repellat quaerat
                            quo architecto!</p>
                    </div>
                </div>

                <div class="col-lg-8">
                    <figure class="equal equal-50">
                        <span class="image" style="background-image: url(assets/images/demo/image-1.jpg)"></span>
                    </figure>
                </div>

                <div class="col-lg-8">
                    <div class="bg-white p-4">
                        <h2 class="text-uppercase">The Design</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed eius doloremque, suscipit minus
                            asperiores hic aut at odio unde nihil culpa recusandae labore, sint nulla vitae repellat quaerat
                            quo architecto!</p>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                            pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                            mollit anim id est laborum.</p>
                    </div>
                </div>

            </div>
        </div>
    </article>
@endsection
