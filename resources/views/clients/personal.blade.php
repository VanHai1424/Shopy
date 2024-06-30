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
                            <!-- personal data -->
                            <div class="tab-pane fade show active" id="sidebar-1-3" role="tabpanel"
                                aria-labelledby="sidebar-1-3">
                                <div class="row">
                                    <div class="col">
                                        <h2>Thông tin</h2>
                                    </div>
                                </div>
                                @if (session('msg'))
                                <div class="alert alert-{{session('alert-type')}}">
                                    <span>{{session('msg')}}</span>
                                </div>
                                @endif
                                <form action="{{route('cap-nhat-nguoi-dung')}}" method="POST">
                                    @csrf
                                    <fieldset class="mb-2">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-label-group">
                                                    <input type="text" id="inputName2"
                                                        class="form-control form-control-lg" placeholder="Name"
                                                        name="name" value="{{Auth::user()->name}}">
                                                    <label for="inputName2">Name</label>
                                                    @error('name')
                                                    <div class="text-danger" style="color: #DB3030; font-size: 12.25px; padding: 0 20px 10px; width: 100%;">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-label-group">
                                                    <input type="text" id="inputSurname2"
                                                        class="form-control form-control-lg" placeholder="Email"
                                                        name="email" value="{{Auth::user()->email}}">
                                                    <label for="inputSurname2">Email</label>
                                                    @error('email')
                                                    <div class="text-danger" style="color: #DB3030; font-size: 12.25px; padding: 0 20px 10px; width: 100%;">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
    
                                    <fieldset class="mb-2">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-label-group">
                                                    <input type="text" id="inputAddress"
                                                        class="form-control form-control-lg" placeholder="Address"
                                                        name="address" value="{{Auth::user()->address}}">
                                                    <label for="inputAddress">Address</label>
                                                    @error('address')
                                                    <div class="text-danger" style="color: #DB3030; font-size: 12.25px; padding: 0 20px 10px; width: 100%;">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset class="mb-2">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-label-group">
                                                    <input type="text" id="phone"
                                                        class="form-control form-control-lg" placeholder="Phone"
                                                        name="phone" value="{{Auth::user()->phone}}">
                                                    <label for="phone">Phone</label>
                                                    @error('phone')
                                                    <div class="text-danger" style="color: #DB3030; font-size: 12.25px; padding: 0 20px 10px; width: 100%;">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="row">
                                        <div class="col-12">
                                            <span class="label">Giới tinh</span>
                                        </div>
                                        <div class="col">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadioInline1" name="gender" value="male"
                                                    class="custom-control-input" {{Auth::user()->gender == 'male' ? 'checked' : ""}}>
                                                <label class="custom-control-label" for="customRadioInline1">Nam</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadioInline2" name="gender" value="female"
                                                    class="custom-control-input" {{Auth::user()->gender == 'female' ? 'checked' : ""}}>
                                                <label class="custom-control-label" for="customRadioInline2">Nữ</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadioInline3" name="gender" value="other"
                                                    class="custom-control-input" {{Auth::user()->gender == 'other' ? 'checked' : ""}}>
                                                <label class="custom-control-label" for="customRadioInline3">Khác</label>
                                            </div>
                                            @error('gender')
                                            <div class="text-danger" style="color: #DB3030; font-size: 12.25px; padding-top: 10px; width: 100%;">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
    
                                    <div class="row">
                                        <div class="col">
                                            <input type="submit" class="btn btn-primary" value="Cập nhật"></input>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
