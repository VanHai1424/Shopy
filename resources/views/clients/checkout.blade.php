@extends('layouts.client')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <!-- checkout -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1>Thanh Toán</h1>
                </div>
            </div>
            <div class="row gutter-1">

                <div class="col">
                    <form action="{{route('dat-hang')}}" method="POST">
                        @csrf
                        <!-- address -->
                        <div class="bg-white p-2 p-lg-3 mb-1">
                            <div class="row gutter-1 align-items-center">
                                <div class="col-md-6">
                                    <h2 class="text-uppercase fs-20">Địa chỉ nhận hàng</h2>
                                </div>
                            </div>
                            @if (session('msg'))
                            <div class="alert alert-{{session('alert-type')}}">
                                <span>{{session('msg')}}</span>
                            </div>
                            @endif
                            <fieldset class="mb-2">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-label-group">
                                            <input type="text" id="inputName2" name="name" class="form-control form-control-lg" readonly
                                                placeholder="Name" value="{{Auth::user()->name}}">
                                            <label for="inputName">Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-label-group">
                                            <input type="email" id="inputEmail" name="email" class="form-control form-control-lg" readonly
                                                placeholder="Email" value="{{Auth::user()->email}}">
                                            <label for="inputEmail">Email</label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
    
                            <fieldset class="mb-2">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-label-group">
                                            <input type="text" id="inputAddress" name="address" class="form-control form-control-lg"
                                                placeholder="Address" value="{{old('address') ?: Auth::user()->address}}">
                                            <label for="inputAddress">Address</label>
                                            @error('address')
                                            <div class="text-danger" style="color: #DB3030; font-size: 12.25px; padding: 0 20px 10px; width: 100%;">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-label-group">
                                            <input type="text" id="inputApt" name="phone" class="form-control form-control-lg"
                                                placeholder="Phone" value="{{old('phone') ?: Auth::user()->phone}}">
                                            <label for="inputApt">Phone</label>
                                            @error('phone')
                                            <div class="text-danger" style="color: #DB3030; font-size: 12.25px; padding: 0 20px 10px; width: 100%;">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <!-- place order -->
                        <div class="bg-white p-2 p-md-3">
                            <input type="submit" class="btn btn-lg btn-primary btn-block mb-2" value="Đặt hàng"></input>
                            <small class="text-muted">Bằng cách đặt hàng, bạn đồng ý với các Điều khoản & Điều kiện, chính sách bảo mật và hoàn trả của chúng tôi. Bạn cũng đồng ý cho phép một số dữ liệu của bạn được SHOPY lưu trữ, dữ liệu này có thể được sử dụng để mang lại trải nghiệm mua sắm tốt hơn cho bạn trong tương lai.</small>
                        </div>
                    </form>
                </div>


                <!-- sidebar -->
                <aside class="col-lg-5">
                    <div class="bg-white p-2 p-lg-3">
                        <h2 class="mb-3 text-uppercase fs-20">Đơn hàng</h2>
                        @foreach ($cart as $item)
                        <div class="cart-item">
                            <a href="#!" class="cart-item-image"><img src="{{asset('storage/upload/products/'.$item['img'])}}"
                                    alt="Image"></a>
                            <div class="cart-item-body">
                                <div class="row">
                                    <div class="col-9">
                                        <h5 class="cart-item-title">{{$item['product']['name']}}</h5>
                                        <ul class="list list--horizontal fs-14">
                                            <li class="text-red">{{number_format($item['product']['price'])}} VND</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <hr class="my-3" />
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
                    </div>
                </aside>
            </div>
        </div>
    </section>
@endsection
