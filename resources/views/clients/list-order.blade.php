@extends('layouts.client')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <!-- content -->
    <section>
        <div class="container">
            <div class="row gutter-1 gutter-md-2">
                @include('blocks.clients.sidebar-account')
                <div class="col-lg-8">
                    <div class="bg-white p-2 p-md-3">
                        <div class="tab-content" id="myTabContent">

                            <!-- orders -->
                            <div class="tab-pane fade show active" id="sidebar-1-1" role="tabpanel"
                                aria-labelledby="sidebar-1-1">
                                <div class="row">
                                    <div class="col">
                                        <h2>Đơn hàng gần đây</h2>
                                    </div>
                                </div>
                                <div class="row gutter-2">
                                    @foreach ($orders as $item)
                                    <div class="col-12">
                                        <div class="card card-data bordered">
                                            <div class="card-header">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <h2 class="card-title fs-18">Order Code: {{$item->id}}</h2>
                                                    </div>
                                                    <div class="col text-right">
                                                        <span class="dropdown">
                                                            <button class="btn btn-lg btn-white btn-ico" id="dropdown-1"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false" type="button"><i
                                                                    class="icon-more-vertical"></i></button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <ul class="order-preview">
                                                    @foreach ($item->orderDetail as $detail)
                                                        <li>
                                                            <img src="{{'storage/upload/'.$detail->variant->img}}" alt="">
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="card-body">
                                                <ul class="order-meta">
                                                    <li>
                                                        <h5 class="order-meta-title">Order #</h5>
                                                        <span>{{$item->id}}</span>
                                                    </li>
                                                    <li>
                                                        <h5 class="order-meta-title">Tổng tiền</h5>
                                                        <span>{{number_format($item->total)}}</span>
                                                    </li>
                                                    <li>
                                                        <h5 class="order-meta-title">Trạng thái</h5>
                                                        <span class="text-muted">
                                                            @if($item->status == 1)
                                                                Đang chờ duyệt
                                                            @elseif($item->status == 2)
                                                                Đã xác nhận
                                                            @elseif($item->status == 3)
                                                                Đang vận chuyển
                                                            @elseif($item->status == 4)
                                                                Hoàn thành
                                                            @else
                                                                Đã hủy
                                                            @endif
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
