@extends('layouts.admin')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="row">
        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Thêm mới</h4>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class="col-md-4">
                                    <div>
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name"
                                            value="{{ old('name') }}" name="name">
                                    </div>
                                    @error('name')
                                        <p class="text-danger mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <label for="formFile" class="form-label">Thumbnail</label>
                                        <input class="form-control" type="file" name="thumbnail" id="formFile">
                                    </div>
                                    @error('thumbnail')
                                        <p class="text-danger mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <label for="price" class="form-label">Price</label>
                                        <input type="text" class="form-control" id="price"
                                            value="{{ old('price') }}" name="price">
                                    </div>
                                    @error('price')
                                        <p class="text-danger mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-8">
                                    <div>
                                        <label for="desc" class="form-label">Description</label>
                                        <textarea cols="80" id="desc" name="desc" rows="10">
                                            {{old('desc')}}
                                        </textarea>
                                    </div>
                                    @error('desc')
                                        <p class="text-danger mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <div>
                                        <label class="form-label" for="category">Category</label>
                                        <select class="form-select" id="category" name="category">
                                            <option value="" selected>--Chọn--</option>
                                            @foreach ($categories as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('category')
                                        <p class="text-danger mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!--end col-->
                                <div class="col-md-2">
                                    <div>
                                        <label class="form-label" for="">Status</label>
                                        <div class="form-check form-switch form-switch-success">
                                            <input class="form-check-input" name="status" type="checkbox" role="switch"
                                                id="SwitchCheck3" checked>
                                        </div>
                                    </div>
                                    @error('status')
                                        <p class="text-danger mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <!--end row-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Biến thể</h4>
                        @error('variant')
                            <p class="text-danger mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="card-body overflow-scroll" style="height: 300px;">
                        <div class="live-preview">
                            <div class="row gy-4 p-3">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Size</th>
                                            <th>Color</th>
                                            <th>Quantity</th>
                                            <th>Image</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sizes as $size)
                                            @foreach ($colors as $color)
                                            <tr>
                                                <td>{{$size->name}}</td>
                                                <td>
                                                    <div style="background-color: {{$color->name}}; width: 50px; height: 50px;"></div>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="text" name="variant[{{$size->id . '-' . $color->id}}][quantity]" id="">
                                                </td>
                                                <td>
                                                    <input class="form-control" type="file" name="variant[{{$size->id . '-' . $color->id}}][img]" id="">
                                                </td>
                                            </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!--end row-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script-libs')
    <script src="https://cdn.ckeditor.com/4.22.0/full/ckeditor.js"></script>
@endsection

@section('script')
    <script>
        CKEDITOR.replace('desc', {
            height: 400,
            baseFloatZIndex: 10005,
            removeButtons: 'PasteFromWord'
        });
    </script>
@endsection
