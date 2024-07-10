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
                <form action="{{route('size.store')}}" method="post" enctype="multipart/form-data">
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
    </div>    
@endsection
