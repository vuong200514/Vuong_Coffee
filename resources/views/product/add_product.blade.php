@extends('/layouts.main')

@push('css-dependencies')
<link rel="stylesheet" type="text/css" href="/css/product.css" />
@endpush

@push('scripts-dependencies')
<script src="/js/product.js" type="module"></script>
@endpush

@section('content')
<div class="container-fluid p-4" style="background: #eee;">

  @include('partials/breadcumb')

  <div class="row flex-lg-nowrap">

    <div class="col">
      <div class="row">
        <div class="col mb-3">
          <div class="card">
            <div class="card-body">
              <div class="e-profile">
                <ul class="nav nav-tabs">
                  <li class="nav-item"><a href="#" class="active nav-link">Biểu mẫu của {{ $title }}</a></li>
                </ul>
                <div class="tab-content pt-3">
                  <div class="tab-pane active">
                    <div class="row">
                      <div class="col">
                        <div class="row">
                          <div class="col-12 col-md-6 mb-3">
                            <div class="form-group">
                              <!-- Form -->
                              <form action="/product/add_product" method="post" enctype="multipart/form-data">
                                @csrf
                                <label for="product_name">Tên sản phẩm</label>
                                <input class="form-control @error('product_name') is-invalid @enderror" type="text"
                                  id="product_name" name="product_name" placeholder="Nhập tên sản phẩm"
                                  value="{{ old('product_name') }}">
                                @error('product_name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                          </div>
                          <div class="col-12 col-md-2 col-sm-4 mb-3">
                            <div class="form-group">
                              <label for="stock">Số lượng</label>
                              <input class="form-control @error('stock') is-invalid @enderror" type="text" id="stock"
                                name="stock" placeholder="Nhập số lượng có sẵn" value="{{ old('stock') }}">
                              @error('stock')
                              <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                          <div class="col-12 col-md-2 col-sm-4 mb-3">
                            <div class="form-group">
                              <label for="price">Giá</label>
                              <input class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                                type="text" placeholder="Nhập giá sản phẩm" value="{{ old('price') }}">
                              @error('price')
                              <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                          <div class="col-12 col-md-2 col-sm-4 mb-3">
                            <div class="form-group">
                              <label for="discount">Giảm giá</label>
                              <input class="form-control @error('discount') is-invalid @enderror" type="text"
                                id="discount" name="discount" placeholder="Nhập giảm giá sản phẩm"
                                value="{{ old('discount') }}">
                              @error('discount')
                              <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                          <div class="col-lg-12 mb-3">
                            <div class="form-group">
                              <label for="orientation">Hướng dẫn sử dụng sản phẩm</label>
                              <textarea class="form-control @error('orientation') is-invalid @enderror" rows="3"
                                id="orientation" name="orientation"
                                placeholder="Nhập hướng dẫn sử dụng sản phẩm">{{ old('orientation') }}</textarea>
                              @error('orientation')
                              <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                          <div class="col-lg-12 mb-3">
                            <div class="form-group">
                              <label for="description">Mô tả sản phẩm</label>
                              <textarea class="form-control @error('description') is-invalid @enderror" rows="5"
                                id="description" placeholder="Nhập mô tả sản phẩm"
                                name="description">{{ old('description') }}</textarea>
                              @error('description')
                              <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                          <div class="custom-file">
                            <label class="custom-file-label" for="image">Hình ảnh</label> <br>
                            <img class="img-account-profile mb-2 d-block" id="image-preview" width="150"
                              alt="Hình ảnh sản phẩm mặc định" src="{{ '/'.'storage/' . env('IMAGE_PRODUCT') }}">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            @error('image')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col d-flex justify-content-end">
                        <a class="btn btn-primary mx-3" href="/product">Quay lại danh sách sản phẩm</a>
                        <button class="btn btn-primary" type="submit">Thêm sản phẩm</button>
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
    </div>
  </div>
</div>
@endsection
