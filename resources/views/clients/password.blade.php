@extends('layouts.client')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <!-- content -->
    <section>
        <div class="container">
            <div class="row gutter-1 gutter-md-2">
                <div class="col-lg-4">
                    <aside class="bg-white p-2 p-md-3">
                        <h3 class="fs-20 text-uppercase text-muted mb-2">Welcome, John Doe!</h3>
                        <div class="nav nav-menu flex-column lavalamp" id="sidebar-1" role="tablist">
                            <a class="nav-link" data-toggle="tab" href="#sidebar-1-1" role="tab" aria-controls="sidebar-1"
                                aria-selected="false"><i class="fs-24 icon-box"></i> Orders</a>
                            <a class="nav-link" data-toggle="tab" href="#sidebar-1-2" role="tab"
                                aria-controls="sidebar-1-2" aria-selected="false"><i class="fs-24 icon-heart"></i>
                                Favorites</a>
                            <a class="nav-link" data-toggle="tab" href="#sidebar-1-3" role="tab"
                                aria-controls="sidebar-1-3" aria-selected="false"><i class="fs-24 icon-user"></i> Personal
                                data </a>
                            <a class="nav-link active" data-toggle="tab" href="#sidebar-1-4" role="tab"
                                aria-controls="sidebar-1-4" aria-selected="true"><i class="fs-24 icon-lock"></i> Change
                                password</a>
                            <a class="nav-link" data-toggle="tab" href="#sidebar-1-5" role="tab"
                                aria-controls="sidebar-1-5" aria-selected="false"><i class="fs-24 icon-home"></i>
                                Addresses</a>
                        </div>
                    </aside>
                </div>
                <div class="col-lg-8">
                    <div class="bg-white p-2 p-md-3">
                        <div class="tab-content" id="myTabContent">

                            <!-- orders -->
                            <div class="tab-pane fade" id="sidebar-1-1" role="tabpanel" aria-labelledby="sidebar-1-1">
                                <div class="row">
                                    <div class="col">
                                        <h2>Orders</h2>
                                    </div>
                                </div>
                                <div class="row gutter-2">
                                    <div class="col-12">
                                        <div class="card card-data bordered">
                                            <div class="card-header">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <h2 class="card-title fs-18"><a href="#">Order 12339201</a>
                                                        </h2>
                                                    </div>
                                                    <div class="col text-right">
                                                        <span class="dropdown">
                                                            <button class="btn btn-lg btn-white btn-ico" id="dropdown-1"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false" type="button"><i
                                                                    class="icon-more-vertical"></i></button>
                                                            <span class="dropdown-menu" aria-labelledby="dropdown-1">
                                                                <a class="dropdown-item" href="#!">Action</a>
                                                                <a class="dropdown-item" href="#!">Another action</a>
                                                                <a class="dropdown-item" href="#!">Something else
                                                                    here</a>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <ul class="order-preview">
                                                    <li><a href="product-1.html" title="Fawn Wool / Natural Mammoth Chair"
                                                            data-toggle="tooltip" data-placement="top"><img
                                                                src="assets/images/demo/product-1.jpg"
                                                                alt="Fawn Wool / Natural Mammoth Chair"></a></li>
                                                    <li><a href="product-1.html" title="Dark Stained NY11 Dining Chair"
                                                            data-toggle="tooltip" data-placement="top"><img
                                                                src="assets/images/demo/product-2.jpg"
                                                                alt="Dark Stained NY11 Dining Chair"></a></li>
                                                    <li><a href="product-1.html" title="Dark Stained NY11 Dining Chair"
                                                            data-toggle="tooltip" data-placement="top"><img
                                                                src="assets/images/demo/product-3.jpg"
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
                                    </div>
                                    <div class="col-12">
                                        <div class="card card-data bordered">
                                            <div class="card-header">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <h2 class="card-title fs-18"><a href="#">Order 12339201</a>
                                                        </h2>
                                                    </div>
                                                    <div class="col text-right">
                                                        <span class="dropdown">
                                                            <button class="btn btn-lg btn-white btn-ico" id="dropdown-2"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false" type="button"><i
                                                                    class="icon-more-vertical"></i></button>
                                                            <span class="dropdown-menu" aria-labelledby="dropdown-2">
                                                                <a class="dropdown-item" href="#!">Action</a>
                                                                <a class="dropdown-item" href="#!">Another action</a>
                                                                <a class="dropdown-item" href="#!">Something else
                                                                    here</a>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <ul class="order-preview">
                                                    <li><a href="product-1.html" title="Fawn Wool / Natural Mammoth Chair"
                                                            data-toggle="tooltip" data-placement="top"><img
                                                                src="assets/images/demo/product-1.jpg"
                                                                alt="Fawn Wool / Natural Mammoth Chair"></a></li>
                                                    <li><a href="product-1.html" title="Dark Stained NY11 Dining Chair"
                                                            data-toggle="tooltip" data-placement="top"><img
                                                                src="assets/images/demo/product-2.jpg"
                                                                alt="Dark Stained NY11 Dining Chair"></a></li>
                                                    <li><a href="product-1.html" title="Dark Stained NY11 Dining Chair"
                                                            data-toggle="tooltip" data-placement="top"><img
                                                                src="assets/images/demo/product-3.jpg"
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
                                    </div>
                                    <div class="col-12">
                                        <div class="card card-data bordered">
                                            <div class="card-header">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <h2 class="card-title fs-18"><a href="#">Order 12339201</a>
                                                        </h2>
                                                    </div>
                                                    <div class="col text-right">
                                                        <span class="dropdown">
                                                            <button class="btn btn-lg btn-white btn-ico" id="dropdown-3"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false" type="button"><i
                                                                    class="icon-more-vertical"></i></button>
                                                            <span class="dropdown-menu" aria-labelledby="dropdown-3">
                                                                <a class="dropdown-item" href="#!">Action</a>
                                                                <a class="dropdown-item" href="#!">Another action</a>
                                                                <a class="dropdown-item" href="#!">Something else
                                                                    here</a>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <ul class="order-preview">
                                                    <li><a href="product-1.html" title="Fawn Wool / Natural Mammoth Chair"
                                                            data-toggle="tooltip" data-placement="top"><img
                                                                src="assets/images/demo/product-1.jpg"
                                                                alt="Fawn Wool / Natural Mammoth Chair"></a></li>
                                                    <li><a href="product-1.html" title="Dark Stained NY11 Dining Chair"
                                                            data-toggle="tooltip" data-placement="top"><img
                                                                src="assets/images/demo/product-2.jpg"
                                                                alt="Dark Stained NY11 Dining Chair"></a></li>
                                                    <li><a href="product-1.html" title="Dark Stained NY11 Dining Chair"
                                                            data-toggle="tooltip" data-placement="top"><img
                                                                src="assets/images/demo/product-3.jpg"
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
                                    </div>
                                </div>
                            </div>

                            <!-- favorites -->
                            <div class="tab-pane fade" id="sidebar-1-2" role="tabpanel" aria-labelledby="sidebar-1-2">
                                <div class="row align-items-end">
                                    <div class="col">
                                        <h2>Favourites</h2>
                                    </div>
                                    <div class="col text-right">
                                        <a href="#" class="underline"><i class="icon-plus"></i> add all to bag</a>
                                    </div>
                                </div>
                                <div class="row gutter-2">
                                    <div class="col-md-6">
                                        <div class="card card-product">
                                            <figure class="card-image">
                                                <a href="#!" class="action"><i class="icon-x"></i></a>
                                                <a href="#!">
                                                    <img src="assets/images/demo/product-1.jpg" alt="Image">
                                                    <img src="assets/images/demo/product-1-2.jpg" alt="Image">
                                                </a>
                                            </figure>
                                            <div class="card-footer">
                                                <h3 class="card-title"><a href="#">Black IC Pendant Light</a></h3>
                                                <span class="price">$410</span>
                                            </div>
                                        </div>
                                        <fieldset class="my-1">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="select-frame">
                                                        <select class="custom-select custom-select-lg"
                                                            id="custom-select-1" data-placeholder="Select colour">
                                                            <option label="color"></option>
                                                            <option value="1">Red</option>
                                                            <option value="2">Green</option>
                                                            <option value="3">Blue</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="select-frame">
                                                        <select class="custom-select custom-select-lg"
                                                            id="custom-select-1-2" data-placeholder="Size">
                                                            <option label="size"></option>
                                                            <option value="1">S</option>
                                                            <option value="2">M</option>
                                                            <option value="3">L</option>
                                                            <option value="4">XL</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <a href="#" class="btn btn-block btn-primary">Add to Bag</a>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card card-product">
                                            <figure class="card-image">
                                                <a href="#!" class="action"><i class="icon-x"></i></a>
                                                <a href="#!">
                                                    <img src="assets/images/demo/product-2.jpg" alt="Image">
                                                    <img src="assets/images/demo/product-2-2.jpg" alt="Image">
                                                </a>
                                            </figure>
                                            <div class="card-footer">
                                                <h3 class="card-title"><a href="#">Black IC Pendant Light</a></h3>
                                                <span class="price">$410</span>
                                            </div>
                                        </div>
                                        <fieldset class="my-1">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="select-frame">
                                                        <select class="custom-select custom-select-lg"
                                                            id="custom-select-2" data-placeholder="Select colour">
                                                            <option label="color"></option>
                                                            <option value="1">Red</option>
                                                            <option value="2">Green</option>
                                                            <option value="3">Blue</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="select-frame">
                                                        <select class="custom-select custom-select-lg"
                                                            id="custom-select-2-2" data-placeholder="Size">
                                                            <option label="size"></option>
                                                            <option value="1">S</option>
                                                            <option value="2">M</option>
                                                            <option value="3">L</option>
                                                            <option value="4">XL</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <a href="#" class="btn btn-block btn-primary">Add to Bag</a>
                                    </div>
                                </div>
                            </div>

                            <!-- personal data -->
                            <div class="tab-pane fade" id="sidebar-1-3" role="tabpanel" aria-labelledby="sidebar-1-3">
                                <div class="row">
                                    <div class="col">
                                        <h2>Personal Data</h2>
                                    </div>
                                </div>

                                <fieldset class="mb-2">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="inputName2"
                                                    class="form-control form-control-lg" placeholder="Name"
                                                    required="" value="Dumitru">
                                                <label for="inputName2">First Name</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="inputSurname2"
                                                    class="form-control form-control-lg" placeholder="Surname"
                                                    required="">
                                                <label for="inputSurname2">Surname</label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="mb-2">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-label-group">
                                                <input type="email" id="inputEmail"
                                                    class="form-control form-control-lg" placeholder="Email Address"
                                                    required="" value="">
                                                <label for="inputEmail">Email Address</label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <span class="label">Date of birth</span>
                                <fieldset class="mb-2">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="select-frame">
                                                <select class="custom-select custom-select-lg" id="customSelect-1"
                                                    data-placeholder="Day">
                                                    <option label="number"></option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">...</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="select-frame">
                                                <select class="custom-select custom-select-lg" id="customSelect-2"
                                                    data-placeholder="Month">
                                                    <option label="number"></option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">...</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="select-frame">
                                                <select class="custom-select custom-select-lg" id="customSelect-3"
                                                    data-placeholder="Year">
                                                    <option label="number"></option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">...</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <div class="row">
                                    <div class="col-12">
                                        <span class="label">Gender</span>
                                    </div>
                                    <div class="col">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="customRadioInline1" name="customRadioInline1"
                                                class="custom-control-input">
                                            <label class="custom-control-label" for="customRadioInline1">Men</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="customRadioInline2" name="customRadioInline1"
                                                class="custom-control-input">
                                            <label class="custom-control-label" for="customRadioInline2">Women</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <a href="#" class="btn btn-primary">Save Changes</a>
                                    </div>
                                </div>
                            </div>

                            <!-- change password -->
                            <div class="tab-pane fade show active" id="sidebar-1-4" role="tabpanel"
                                aria-labelledby="sidebar-1-4">
                                <div class="row">
                                    <div class="col">
                                        <h2>Change Password</h2>
                                    </div>
                                </div>

                                <fieldset class="mb-2">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-label-group">
                                                <input type="password" id="inputPassword"
                                                    class="form-control form-control-lg" placeholder="Current Password"
                                                    required="" value="$120-N<>&^9">
                                                <label for="inputPassword">Current Password</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-label-group">
                                                <input type="password" id="inputPassword2"
                                                    class="form-control form-control-lg" placeholder="New Password"
                                                    required="">
                                                <label for="inputPassword2">New Password</label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <div class="row">
                                    <div class="col">
                                        <a href="#" class="btn btn-primary">Save Password</a>
                                    </div>
                                </div>
                            </div>

                            <!-- addresses -->
                            <div class="tab-pane fade" id="sidebar-1-5" role="tabpanel" aria-labelledby="sidebar-1-5">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <h2>Addresses</h2>
                                    </div>
                                    <div class="col-md-6 text-md-right">
                                        <a href="#" class="underline"><i class="icon-plus"></i> Add new address</a>
                                    </div>
                                </div>
                                <div class="row gutter-2">
                                    <div class="col-lg-6">
                                        <div class="card card-data bordered">
                                            <div class="card-header">
                                                <div class="row align-items-center">
                                                    <div class="col-8">
                                                        <h2 class="card-title eyebrow">Main Delivery Address</h2>
                                                    </div>
                                                    <div class="col text-right">
                                                        <span class="dropdown">
                                                            <button class="btn btn-lg btn-white btn-ico" id="dropdown-5"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false" type="button"><i
                                                                    class="icon-more-vertical"></i></button>
                                                            <span class="dropdown-menu" aria-labelledby="dropdown-5">
                                                                <a class="dropdown-item" href="#!">Action</a>
                                                                <a class="dropdown-item" href="#!">Another action</a>
                                                                <a class="dropdown-item" href="#!">Something else
                                                                    here</a>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <p>
                                                    Jhon Doe <br />
                                                    1620 East Ayre Str <br />
                                                    Suite M3115662 <br />
                                                    Wilmington, DE 19804 <br />
                                                    United States
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="card card-data bordered">
                                            <div class="card-header">
                                                <div class="row align-items-center">
                                                    <div class="col-8">
                                                        <h2 class="card-title eyebrow">Main Delivery Address</h2>
                                                    </div>
                                                    <div class="col text-right">
                                                        <span class="dropdown">
                                                            <button class="btn btn-lg btn-white btn-ico" id="dropdown-4"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false" type="button"><i
                                                                    class="icon-more-vertical"></i></button>
                                                            <span class="dropdown-menu" aria-labelledby="dropdown-4">
                                                                <a class="dropdown-item" href="#!">Action</a>
                                                                <a class="dropdown-item" href="#!">Another action</a>
                                                                <a class="dropdown-item" href="#!">Something else
                                                                    here</a>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <p>
                                                    Jhon Doe <br />
                                                    1620 East Ayre Str <br />
                                                    Suite M3115662 <br />
                                                    Wilmington, DE 19804 <br />
                                                    United States
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="card card-data bordered">
                                            <div class="card-header">
                                                <div class="row align-items-center">
                                                    <div class="col-8">
                                                        <h2 class="card-title eyebrow">Main Delivery Address</h2>
                                                    </div>
                                                    <div class="col text-right">
                                                        <span class="dropdown">
                                                            <button class="btn btn-lg btn-white btn-ico" id="dropdown-8"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false" type="button"><i
                                                                    class="icon-more-vertical"></i></button>
                                                            <span class="dropdown-menu" aria-labelledby="dropdown-8">
                                                                <a class="dropdown-item" href="#!">Action</a>
                                                                <a class="dropdown-item" href="#!">Another action</a>
                                                                <a class="dropdown-item" href="#!">Something else
                                                                    here</a>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <p>
                                                    Jhon Doe <br />
                                                    1620 East Ayre Str <br />
                                                    Suite M3115662 <br />
                                                    Wilmington, DE 19804 <br />
                                                    United States
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
