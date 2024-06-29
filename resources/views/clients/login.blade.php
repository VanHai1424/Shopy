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
                                    <a class="nav-link {{session('msg') ? 'active' : ""}}" data-toggle="tab" href="#component-1-1" role="tab"
                                        aria-controls="component-1-1" aria-selected="true">Đăng nhập</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{session('msgS') ? 'active' : ""}}" data-toggle="tab" href="#component-1-2" role="tab"
                                        aria-controls="component-1-2" aria-selected="false">Đăng ký</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="component-1-content">
                                <div class="tab-pane fade {{ (!session('msg') && !session('msgS')) || (session('msg') && !session('msgS')) ? 'show active' : '' }}" id="component-1-1" role="tabpanel"
                                    aria-labelledby="component-1-1">
                                    <form action="{{route('xu-ly-dang-nhap')}}" method="POST">
                                        @csrf
                                        <div class="row gutter-2">
                                            <div class="col-12">
                                                @if (session('msg'))
                                                    <div class="alert alert-{{ session('alert-type') }} ">
                                                        {{ session('msg') }}
                                                    </div>
                                                @endif
                                                <fieldset>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-label-group">
                                                                <input type="text" id="inputEmail" name="email"
                                                                    class="form-control form-control-lg" value="{{old('email')}}"
                                                                    placeholder="Email">
                                                                <label for="inputEmail">Email</label>
                                                                @error('email')
                                                                <div class="text-danger" style="color: #DB3030; font-size: 12.25px; padding: 0 20px 10px; width: 100%;">{{$message}}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-label-group">
                                                                <input type="password" id="inputPassword" name="pass"
                                                                    class="form-control form-control-lg" placeholder="Password">
                                                                <label for="inputPassword">Password</label>
                                                                @error('pass')
                                                                <div class="text-danger" style="color: #DB3030; font-size: 12.25px; padding: 0 20px 10px; width: 100%;">{{$message}}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-12">
                                                <input type="submit" class="btn btn-primary btn-block" value="Đăng nhập"></input>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade {{session('msgS') ? 'show active' : ""}}" id="component-1-2" role="tabpanel"
                                    aria-labelledby="component-1-2">
                                    <form action="{{route('xu-ly-dang-ky')}}" method="POST">
                                        @csrf
                                        <div class="row gutter-2">
                                            <div class="col-12">
                                                @if (session('msgS'))
                                                    <div class="alert alert-{{ session('alert-typeS') }} ">
                                                        {{ session('msgS') }}
                                                    </div>
                                                @endif
                                                <fieldset>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-label-group">
                                                                <input type="text" id="inputName2" name="nameS" value="{{old('nameS')}}"
                                                                    class="form-control form-control-lg"
                                                                    placeholder="First name">
                                                                <label for="inputName">Name</label>
                                                                @error('nameS')
                                                                <div class="text-danger" style="color: #DB3030; font-size: 12.25px; padding: 0 20px 10px; width: 100%;">{{$message}}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-label-group">
                                                                <input type="text" id="inputEmail2" name="emailS" value="{{old('emailS')}}"
                                                                    class="form-control form-control-lg"
                                                                    placeholder="Email address">
                                                                <label for="inputEmail">Email</label>
                                                                @error('emailS')
                                                                <div class="text-danger" style="color: #DB3030; font-size: 12.25px; padding: 0 20px 10px; width: 100%;">{{$message}}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-label-group">
                                                                <input type="password" id="inputPassword2" name="passS"
                                                                    class="form-control form-control-lg" placeholder="Password">
                                                                <label for="inputPassword">Password</label>
                                                                @error('passS')
                                                                <div class="text-danger" style="color: #DB3030; font-size: 12.25px; padding: 0 20px 10px; width: 100%;">{{$message}}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-12">
                                                <input type="submit" class="btn btn-primary btn-block" value="Đăng ký"></input>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
