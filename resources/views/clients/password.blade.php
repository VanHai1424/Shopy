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
                            <!-- change password -->
                            <div class="tab-pane fade show active" id="sidebar-1-4" role="tabpanel"
                                aria-labelledby="sidebar-1-4">
                                <div class="row">
                                    <div class="col">
                                        <h2>Đổi mật khẩu</h2>
                                    </div>
                                </div>

                                <form action="{{route('cap-nhat-mat-khau')}}" method="POST">
                                    @csrf
                                    @if (session('msg'))
                                        <div class="alert alert-{{session('alert-type')}}">
                                            <span>{{session('msg')}}</span>
                                        </div>
                                    @endif
                                    <fieldset class="mb-2">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-label-group">
                                                    <input type="password" id="inputPassword" name="currentPass"
                                                        class="form-control form-control-lg" placeholder="Current Password">
                                                    <label for="inputPassword">Current Password</label>
                                                    @error('currentPass')
                                                    <div class="text-danger" style="color: #DB3030; font-size: 12.25px; padding: 0 20px 10px; width: 100%;">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-label-group">
                                                    <input type="password" id="inputPassword2" name="newPass"
                                                        class="form-control form-control-lg" placeholder="New Password">
                                                    <label for="inputPassword2">New Password</label>
                                                    @error('newPass')
                                                    <div class="text-danger" style="color: #DB3030; font-size: 12.25px; padding: 0 20px 10px; width: 100%;">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-label-group">
                                                    <input type="password" id="inputPassword3" name="newPass_confirmation"
                                                        class="form-control form-control-lg" placeholder="Confirm Password">
                                                    <label for="inputPassword3">Confirm Password</label>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
    
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
