@extends('layouts.client')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <!-- order -->
    <section>
        <div class="container">
            <div class="bg-white p-3 mb-3">
                <h1 class="text-uppercase fs-20 mb-3">Order Received</h1>
                <div class="alert alert-success" role="alert">
                    Thank you. Your order has been received!
                </div>
                <div class="card card-data bordered mb-3">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="card-title fs-18">Order 12339201</h2>
                            </div>
                            <div class="col text-right">
                                <span class="dropdown">
                                    <button class="btn btn-lg btn-white btn-ico" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" type="button"><i
                                            class="icon-more-vertical"></i></button>
                                    <span class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#!">Action</a>
                                        <a class="dropdown-item" href="#!">Another action</a>
                                        <a class="dropdown-item" href="#!">Something else here</a>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="order-preview">
                            <li><a href="product-1.html" title="Fawn Wool / Natural Mammoth Chair" data-toggle="tooltip"
                                    data-placement="top"><img src="assets/images/demo/product-1.jpg"
                                        alt="Fawn Wool / Natural Mammoth Chair"></a></li>
                            <li><a href="product-1.html" title="Dark Stained NY11 Dining Chair" data-toggle="tooltip"
                                    data-placement="top"><img src="assets/images/demo/product-2.jpg"
                                        alt="Dark Stained NY11 Dining Chair"></a></li>
                            <li><a href="product-1.html" title="Dark Stained NY11 Dining Chair" data-toggle="tooltip"
                                    data-placement="top"><img src="assets/images/demo/product-3.jpg"
                                        alt="Dark Stained NY11 Dining Chair"></a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <ul class="order-meta">
                            <li>
                                <h5 class="order-meta-title">Order #</h5>
                                <span>12339201</span>
                            </li>
                            <li>
                                <h5 class="order-meta-title">Shipped Date</h5>
                                <span>23 March 2019</span>
                            </li>
                            <li>
                                <h5 class="order-meta-title">Total</h5>
                                <span>$78.00</span>
                            </li>
                            <li>
                                <h5 class="order-meta-title">Status</h5>
                                <span class="text-muted">Processing</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <p>Please check your inbox shortly, a confirmation email is on it's way</p>
                <a href="#" class="btn btn-primary">Continue Shopping</a>
            </div>
        </div>
    </section>
@endsection
