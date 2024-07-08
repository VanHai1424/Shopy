@extends('layouts.admin')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Thêm mới</h4>
                </div><!-- end card header -->
                <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class="col-md-4">
                                    <div>
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" value="{{old('name')}}" name="name">
                                    </div>
                                    @error('name')
                                        <p class="text-danger mt-2">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="email" value="{{old('email')}}" name="email">
                                    </div>
                                    @error('email')
                                        <p class="text-danger mt-2">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <label for="password" class="form-label">Password</label>
                                        <input type="text" class="form-control" id="password" value="{{old('password')}}" name="password">
                                    </div>
                                    @error('password')
                                        <p class="text-danger mt-2">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" class="form-control" id="phone" value="{{old('phone')}}" name="phone">
                                    </div>
                                    @error('phone')
                                        <p class="text-danger mt-2">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" class="form-control" id="address" value="{{old('address')}}" name="address">
                                    </div>
                                    @error('address')
                                        <p class="text-danger mt-2">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <label class="form-label" for="gender">Gender</label>
                                        <select class="form-select" id="gender" name="gender">
                                            <option value="male">Nam</option>
                                            <option value="female">Nữ</option>
                                            <option value="other">Khác</option>
                                        </select>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-md-4">
                                    <div>
                                        <label class="form-label" for="role">Role</label>
                                        <select class="form-select" id="role" name="role">
                                            <option value="1">User</option>
                                            <option value="0">Admin</option>
                                        </select>
                                    </div>
                                </div>
                                <!--end col-->
                                
                                <div>
                                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                                </div>
                            </div>
                            <!--end row-->
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection
