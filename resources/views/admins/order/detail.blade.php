@extends('layouts.admin')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-9">
            @if (session('msg'))
            <div class="alert alert-{{session('alert-type')}}">
                <span>{{session('msg')}}</span>
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title flex-grow-1 mb-0">Order #{{$order->id}}</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table align-middle table-borderless mb-0 text-center">
                            <thead class="table-light text-muted">
                                <tr>
                                    <th class="text-start">Product Details</th>
                                    <th style="width: 150px;">Item Price</th>
                                    <th style="width: 150px;">Quantity</th>
                                    <th>Total Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($order->orderDetail as $item)
                                @php
                                    $total += $item->variant->product->price * $item->quantity;
                                @endphp
                                <tr>
                                    <td>
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 avatar-md bg-light rounded p-1">
                                                <img src="{{asset('storage/upload/'.$item->variant->img)}}" alt=""
                                                    class="img-fluid d-block">
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h5 class="fs-15 text-start"><a href="apps-ecommerce-product-details.html"
                                                        class="link-primary">{{$item->variant->product->name}}</a></h5>
                                                <p class="text-muted mb-0 text-start">Color: <span class="fw-medium">{{$item->variant->color->name}}</span></p>
                                                <p class="text-muted mb-0 text-start">Size: <span class="fw-medium">{{$item->variant->size->name}}</span></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{number_format($item->variant->product->price)}}</td>
                                    <td>{{$item->quantity}}</td>
                                    <td class="fw-medium ">
                                        {{number_format($item->variant->product->price * $item->quantity)}} VND
                                    </td>
                                </tr>
                                @endforeach
                                <tr class="border-top border-top-dashed">
                                    <td colspan="3"></td>
                                    <td colspan="2" class="fw-medium p-0">
                                        <table class="table table-borderless mb-0">
                                            <tbody>
                                                <tr>
                                                    <td>Sub Total :</td>
                                                    <td class="text-end">{{number_format($total)}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Discount :</td>
                                                    <td class="text-end">0</td>
                                                </tr>
                                                <tr>
                                                    <td>Shipping Charge :</td>
                                                    <td class="text-end">0</td>
                                                </tr>
                                                <tr class="border-top border-top-dashed">
                                                    <th scope="row">Total :</th>
                                                    <th class="text-end">{{number_format($total)}} VND</th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--end card-->
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Order Status</h5>
                        <form action="{{route('order.update-status', $order->id)}}" method="POST" class="d-flex mt-2 mt-sm-0 gap-3">
                            @csrf
                            <select name="status" class="form-control" style="width: 160px;">
                                <option {{$order->status == 1 ? "selected" : ""}} value="1">Đang chờ duyệt</option>
                                <option {{$order->status == 2 ? "selected" : ""}} value="2">Đã xác nhận</option>
                                <option {{$order->status == 3 ? "selected" : ""}} value="3">Đang vận chuyển</option>
                                <option {{$order->status == 4 ? "selected" : ""}} value="4">Hoàn thành</option>
                                <option {{$order->status == 5 ? "selected" : ""}} value="5">Đã hủy</option>
                            </select>
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-xl-3">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <h5 class="card-title flex-grow-1 mb-0"><i
                                class="mdi mdi-truck-fast-outline align-middle me-1 text-muted"></i> Logistics Details</h5>
                        <div class="flex-shrink-0">
                            <a href="javascript:void(0);" class="badge bg-primary-subtle text-primary fs-11">Track
                                Order</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <lord-icon src="https://cdn.lordicon.com/uetqnvvg.json" trigger="loop"
                            colors="primary:#405189,secondary:#0ab39c" style="width:80px;height:80px"></lord-icon>
                        <h5 class="fs-16 mt-2">RQK Logistics</h5>
                        <p class="text-muted mb-0">ID: MFDS1400457854</p>
                        <p class="text-muted mb-0">Payment Mode : Debit Card</p>
                    </div>
                </div>
            </div>
            <!--end card-->

            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <h5 class="card-title flex-grow-1 mb-0">Customer Details</h5>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0 vstack gap-3">
                        <li>
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="fs-14 mb-1">{{$order->name}}</h6>
                                    <p class="text-muted mb-0">Customer</p>
                                </div>
                            </div>
                        </li>
                        <li><i class="ri-mail-line me-2 align-middle text-muted fs-16"></i>{{$order->email}}</li>
                        <li><i class="ri-phone-line me-2 align-middle text-muted fs-16"></i>{{$order->phone}}</li>
                    </ul>
                </div>
            </div>
            <!--end card-->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="ri-map-pin-line align-middle me-1 text-muted"></i> Shipping
                        Address</h5>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled vstack gap-2 fs-13 mb-0">
                        <li class="fw-medium fs-14">{{$order->name}}</li>
                        <li>{{$order->phone}}</li>
                        <li>{{$order->address}}</li>
                    </ul>
                </div>
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
@endsection
