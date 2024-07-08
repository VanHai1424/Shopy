@extends('layouts.admin')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Chỉnh sửa</h4>
                </div><!-- end card header -->
                <form action="{{route('category.update', $category->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("put")
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class="col-md-4">
                                    <div>
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" value="{{old('name') ?? $category->name}}" name="name">
                                    </div>
                                    @error('name')
                                        <p class="text-danger mt-2">{{$message}}</p>
                                    @enderror
                                </div>
                                <!--end col-->
                                <div class="col-md-4">
                                    <div>
                                        <label class="form-label" for="parent">Category parent</label>
                                        <select class="form-select" id="parent" name="parent_id">
                                            @foreach ($categoryParent as $item)
                                            <option @if ($item->id == $category->parent_id)
                                                selected
                                            @endif value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-md-4">
                                    <div>
                                        <label for="formFile" class="form-label">Image</label>
                                        <input class="form-control" type="file" name="img" id="formFile">
                                    </div>
                                    @error('img')
                                        <p class="text-danger mt-2">{{$message}}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                </div>
                            </div>
                            <!--end row-->
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection
