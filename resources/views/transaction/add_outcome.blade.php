@extends('/layouts/main')

@push('css-dependencies')
<link href="/css/transaction.css" rel="stylesheet" />
@endpush

@push('scripts-dependencies')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const formGroups = document.querySelectorAll('.form-group');

        formGroups.forEach(group => {
            group.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.02)';
                this.style.boxShadow = '0 4px 8px rgba(0, 0, 0, 0.2)';
            });

            group.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
                this.style.boxShadow = 'none';
            });
        });
    });
</script>
@endpush

@section('content')
<div class="container-fluid pt-4">

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
                <ul class="nav nav-tabs">
                  <li class="nav-item"><a href="" class="active nav-link">{{ $title }}</a></li>
                </ul>

                <!-- Form -->
                <form action="/transaction/add_outcome" method="post">
                  @csrf
                  <div class="tab-content pt-3">
                    <div class="tab-pane active">
                      <div class="row">
                        <div class="col">
                          <div class="row">
                            <div class="col-12 col-sm-8 mb-3">
                              <div class="form-group">
                                <label for="category">Danh mục</label>
                                <select class="form-control" name="category_id" id="category">
                                  <option value="0">Chọn danh mục</option>
                                  @foreach ($categories as $category)
                                  <option value="{{ $category->id }}" {{ old("category_id")==$category->id ? "selected"
                                    : "" }}>{{ $category->category_name }}</option>
                                  @endforeach
                                </select>
                                @error('category_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                              </div>
                            </div>
                            <div class="col-12 col-sm-4 mb-3">
                              <div class="form-group">
                                <label for="outcome">Tổng chi phí</label>
                                <input class="form-control" type="text" id="outcome" name="outcome"
                                  placeholder="Nhập chi phí" value="{{ old('outcome') }}">
                                @error('outcome')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col mb-3">
                              <div class="form-group">
                                <label for="description">Mô tả</label>
                                <input class="form-control" id="description" name="description"
                                  placeholder="Nhập mô tả chi phí" value="{{ old('description') }}">
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
                          <a class="btn btn-secondary mx-3" href="/transaction">Quay lại danh sách giao dịch</a>
                          <button class="btn btn-dark" type="submit">Gửi</button>
                        </div>
                      </div>
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
@endsection
