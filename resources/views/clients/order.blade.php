@extends('layouts.client')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <!-- order -->
    <section>
        <div class="container">
            <div class="bg-white p-3 mb-3">
                <h1 class="text-uppercase fs-20 mb-3">ĐƠN HÀNG ĐÃ NHẬN</h1>
                <div class="alert alert-success" role="alert">
                    Đặt hàng thành công!
                </div>
                <div class="card card-data bordered mb-3">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="card-title fs-18">Order Code: {{$orderSuccess['orderId']}}</h2>
                            </div>
                            <div class="col text-right">
                                <span class="dropdown">
                                    <button class="btn btn-lg btn-white btn-ico" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" type="button"><i
                                            class="icon-more-vertical"></i></button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="order-preview">
                            @foreach ($orderSuccess['images'] as $item)
                            <li>
                                <img src="{{asset('storage/upload/products/'.$item)}}" alt="">
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-body">
                        <ul class="order-meta">
                            <li>
                                <h5 class="order-meta-title">Order #</h5>
                                <span>{{$orderSuccess['orderId']}}</span>
                            </li>
                            <li>
                                <h5 class="order-meta-title">Tổng tiền</h5>
                                <span>{{number_format($orderSuccess['totalPrice'])}}</span>
                            </li>
                            <li>
                                <h5 class="order-meta-title">Trạng thái</h5>
                                <span class="text-muted">Đang chờ duyệt</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <a href="/" class="btn btn-primary">Tiếp tục mua hàng</a>
            </div>
        </div>
    </section>
@endsection
