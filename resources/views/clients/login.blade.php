@extends('layouts.client')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <!-- login -->
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="card boxed">
                        <div class="card-header">
                            <ul class="nav nav-tabs nav-fill card-header-tabs lavalamp" id="component-1" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#component-1-1" role="tab"
                                        aria-controls="component-1-1" aria-selected="true">Log In</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#component-1-2" role="tab"
                                        aria-controls="component-1-2" aria-selected="false">Sign Up</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="component-1-content">
                                <div class="tab-pane fade show active" id="component-1-1" role="tabpanel"
                                    aria-labelledby="component-1-1">
                                    <div class="row gutter-2">
                                        <div class="col-12">
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-label-group">
                                                            <input type="text" id="inputEmail"
                                                                class="form-control form-control-lg"
                                                                placeholder="Email address" required="">
                                                            <label for="inputEmail">Email address</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-label-group">
                                                            <input type="text" id="inputPassword"
                                                                class="form-control form-control-lg" placeholder="Password"
                                                                required="">
                                                            <label for="inputPassword">Password</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-12 text-center">
                                            <a href="#" class="underline fs-14">Forgot Password ?</a>
                                        </div>
                                        <div class="col-12">
                                            <a href="#" class="btn btn-primary btn-block">Sign In</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="component-1-2" role="tabpanel"
                                    aria-labelledby="component-1-2">
                                    <div class="row gutter-2">
                                        <div class="col-12">
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-label-group">
                                                            <input type="text" id="inputName2"
                                                                class="form-control form-control-lg"
                                                                placeholder="First name" required="">
                                                            <label for="inputName">First Name</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-label-group">
                                                            <input type="text" id="inputEmail2"
                                                                class="form-control form-control-lg"
                                                                placeholder="Email address" required="">
                                                            <label for="inputEmail">Email address</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-label-group">
                                                            <input type="text" id="inputPassword2"
                                                                class="form-control form-control-lg" placeholder="Password"
                                                                required="">
                                                            <label for="inputPassword">Password</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-12">
                                            <span class="label d-block">Gender</span>
                                            <div class="d-block">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="customRadioInline1" name="customRadioInline1"
                                                        class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadioInline1">Men</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="customRadioInline2"
                                                        name="customRadioInline1" class="custom-control-input">
                                                    <label class="custom-control-label"
                                                        for="customRadioInline2">Women</label>
                                                </div>
                                            </div>
                                            <small class="text-muted lh-sm">We will use this information for tailoring your
                                                experience.</small>
                                            <div class="custom-control custom-checkbox mt-1">
                                                <input type="checkbox" id="customCheckbox1" name="customCheckbox1"
                                                    class="custom-control-input">
                                                <label class="custom-control-label text-muted" for="customCheckbox1">Yes,
                                                    I agree to the <a href="#" class="underline">Terms and
                                                        Conditions</a></label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <a href="#" class="btn btn-primary btn-block">Creat an account</a>
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
