@extends('/layouts/main')

@push('css-dependencies')
<style>
    .container-fluid {
        background: #f5f5dc; /* Màu nền kem */
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-body {
        padding: 30px;
    }

    .nav-tabs .nav-link.active {
        background-color: #d2b48c; /* Màu kem */
        color: #fff;
        border-radius: 5px;
    }

    .form-group label {
        font-weight: bold;
    }

    .form-control {
        border-radius: 5px;
    }

    .btn-primary {
        background-color: #d2b48c; /* Màu kem */
        border-color: #d2b48c;
        transition: background-color 0.3s ease, border-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #c0a080; /* Màu kem đậm hơn khi hover */
        border-color: #c0a080;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
        transition: background-color 0.3s ease, border-color 0.3s ease;
    }

    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }

    .custom-file-label {
        cursor: pointer;
    }

    .img-account-profile {
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
</style>
@endpush

@push('scripts-dependencies')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const imageInput = document.getElementById('image');
        const imagePreview = document.getElementById('image-preview');

        imageInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    });
</script>
@endpush

@section('content')
<div class="container-fluid p-4">

  @include('/partials/breadcumb')

  @if(session()->has('message'))
  {!! session("message") !!}
  @endif

  <div class="row flex-lg-nowrap">

    <div class="col">
      <div class="row">
        <div class="col mb-3">
          <div class="card">
            <div class="card-body">
              <div class="e-profile">
                <div class="row">
                  <div class="col-12 col-sm-auto mb-3">
                    <img class="mb-2 img-account-profile" id="image-preview" src="{{ '/'.'storage/' . $product->image }}" width="200"
                      alt="{{ $product->product_name }}">
                  </div>
                  <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                    <div class="text-sm-left mb-2 mb-sm-0">
                      <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">
                        {{ $product->product_name }}
                      </h4>
                      <div class="text-muted"><small>Cập nhật lần cuối vào {{ date('d M Y', strtotime($product->updated_at)) }}</small></div>
                      <div class="mt-2">
                        <!-- Form -->
                        <form id="form_edit_product" action="/product/edit_product/{{ $product->id }}" method="post"
                          enctype="multipart/form-data">
                          @csrf
                          <input type="hidden" name="oldImage" value="{{ $product->image }}">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            @error('image')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                      </div>
                    </div>
                    <div class="text-center">
                      <span style="background: #108d6f; color:white; padding:0.08em 0.4em;border-radius: 0.5em;cursor:pointer">Admin</span>
                      <div class="text-muted"><small>Được tạo vào: {{ date('d M Y', strtotime($product->created_at)) }}</small></div>
                    </div>
                  </div>
                </div>
                <ul class="nav nav-tabs">
                  <li class="nav-item"><a href="" class="active nav-link">Biểu mẫu của {{ $title }}</a></li>
                </ul>
                <div class="tab-content pt-3">
                  <div class="tab-pane active">
                    <div class="row">
                      <div class="col">
                        <div class="row">
                          <div class="col-12 col-sm-6 mb-3">
                            <div class="form-group">
                              <label for="product_name">Tên sản phẩm</label>
                              <input class="form-control @error('product_name') is-invalid @enderror" type="text"
                                id="product_name" name="product_name" placeholder="Nhập tên sản phẩm"
                                value="{{ old('product_name', $product->product_name) }}">
                              @error('product_name')
                              <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                          <div class="col-12 col-sm-2 mb-3">
                            <div class="form-group">
                              <label for="stock">Tồn kho</label>
                              <input class="form-control @error('product_name') is-invalid @enderror" type="text"
                                id="stock" name="stock" placeholder="Nhập số lượng tồn kho" value="{{ old('stock', $product->stock) }}">
                              @error('stock')
                              <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                          <div class="col-12 col-sm-2 mb-3">
                            <div class="form-group">
                              <label for="price">Giá</label>
                              <input class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                                type="text" placeholder="Nhập giá sản phẩm" value="{{ old('price', $product->price) }}">
                              @error('price')
                              <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                          <div class="col-12 col-sm-2 mb-3">
                            <div class="form-group">
                              <label for="discount">Giảm giá</label>
                              <input class="form-control @error('discount') is-invalid @enderror" type="text"
                                id="discount" name="discount" placeholder="Nhập giảm giá sản phẩm"
                                value="{{ old('discount', $product->discount) }}">
                              @error('discount')
                              <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col mb-3">
                            <div class="form-group">
                              <label for="orientation">Hướng sản phẩm</label>
                              <input class="form-control @error('orientation') is-invalid @enderror" id="orientation"
                                name="orientation" placeholder="Nhập hướng sản phẩm" value="{{ old('orientation', $product->orientation) }}">
                              @error('orientation')
                              <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col mb-3">
                            <div class="form-group">
                              <label for="description">Mô tả sản phẩm</label>
                              <input class="form-control @error('description') is-invalid @enderror" id="description"
                                placeholder="Nhập mô tả sản phẩm" name="description"
                                value="{{ old('description', $product->description) }}">
                              @error('description')
                              <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col d-flex justify-content-end">
                        <a class="btn btn-primary mx-3" href="/product">Quay lại danh sách sản phẩm</a>
                        <button class="btn btn-primary mx-3" type="submit" id="button_edit_product">Lưu thay đổi</button>
                        </form>
                        <form action="{{ url('/product/delete_product/' . $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mx-3">Xóa sản phẩm</button>
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
  </div>
</div>
@endsection
