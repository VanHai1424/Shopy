<!-- content -->
<div class="col">
    <div class="bg-white cart-item-list p-2 p-lg-3 mb-1">
        @foreach ($cart as $item)
        <div class="cart-item">
            <a href="#!" class="cart-item-image"><img src="{{asset('storage/upload/'.$item['img'])}}"
                    alt="Image"></a>
            <div class="cart-item-body">
                <div class="row">
                    <div class="col-10">
                        <div class="row">
                            <div class="col-md-7">
                                <h5 class="cart-item-title">{{$item['product']['name']}}</h5>
                                <ul class="cart-item-meta">
                                    <li class="text-red">{{number_format($item['product']['price'])}} VND</li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <ul class="list list--horizontal" style="margin-left: 30px">
                                    <li class="mr-2">
                                        <div class="">
                                            <a class="" href="#!" role="button">
                                                Kích cỡ: <span class="ml-1">{{$item['size']['name']}}</span>
                                                Màu sắc: 
                                                <div class="d-inline-block btn-group-toggle btn-group-square btn-group-colors" data-toggle="buttons" id="block-color">
                                                    <label class="btn text-{{$item['color']['name']}}" style="width: 20px; height: 20px;">
                                                        <input type="radio" value="{{$item['color']['id']}}" name="color" id="option-2-1" >
                                                    </label>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="qty d-flex align-items-center mt-1">
                                            <span class="minus bg-primary" data-id="{{$item['id']}}">-</span>
                                            <input type="number" class="count text-primary" name="qty"
                                                value="{{$item['quantityOrder']}}" max="{{$item['quantity']}}" disabled>
                                            <span class="plus bg-primary" data-id="{{$item['id']}}">+</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 text-right">
                        <ul class="cart-item-options">
                            <li><a data-id="{{$item['id']}}" id="remove-cart" class="icon-x"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @if (!$cart)
    <p class="text-red">Không có sản phẩm nào trong giỏ hàng</p>
    @endif
    <a href="{{ route('home') }}" class="underlined">Tiếp tục mua hàng</a>
</div>

<!-- sidebar -->
<aside class="col-lg-4">
    <div class="bg-white p-2 p-lg-3">
        <h2 class="mb-3 text-uppercase fs-20">Tổng đơn hàng</h2>
        <div class="input-combined mb-2">
            <input type="text" class="form-control" placeholder="Mã giảm giá" aria-label="Promo code"
                aria-describedby="button-addon2">
            <button class="btn btn-white" type="button" id="button-addon2">Áp dụng</button>
            <span class="input-combined_indicator"></span>
        </div>
        <ul class="list-group list-group-minimal mb-3">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Giá
                <span>{{number_format($totalPrice)}}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Vận chuyển
                <span>0</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center text-red">
                Giảm giá
                <span class="text-red">0</span>
            </li>
            <li
                class="list-group-item d-flex justify-content-between align-items-center text-uppercase font-weight-bold">
                Tổng tiền
                <span class="text-red">{{number_format($totalPrice)}} VND</span>
            </li>
        </ul>
        <a href="{{route('thanh-toan')}}" class="btn btn-primary btn-block">Thanh toán</a>
    </div>
</aside>