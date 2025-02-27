@extends('/layouts/main')

@push('css-dependencies')
<link href="/css/profile.css" rel="stylesheet" />
@endpush

@push('scripts-dependencies')
<script src="/js/profile.js" type="module"></script>
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
<div class="main-body px-1 px-md-3 px-lg-4 px-xl-5">

    @include('/partials/breadcumb')

    <!-- Thông báo -->
    @if(session()->has('message'))
    {!! session("message") !!}
    @endif

    <div class="row">
        <div class="col-xl-4">
            <!-- Thẻ ảnh hồ sơ -->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Ảnh hồ sơ</div>
                <div class="card-body text-center">
                    <!-- Hình ảnh hồ sơ -->
                    <img class="img-account-profile mb-2" id="image-preview" src="{{ asset('storage/' . auth()->user()->image) }}" width="150" alt="">
                    <!-- Hướng dẫn ảnh hồ sơ -->
                    <div class="small font-italic text-muted mb-4">Phải là ảnh không quá 2 MB</div>
                    <!-- Nút tải lên ảnh hồ sơ -->
                    <form method="post" action="/profile/edit_profile/{{ auth()->user()->id }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="oldImage" value="{{ auth()->user()->image }}">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image">
                            @error('image')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Thẻ chi tiết hồ sơ -->
            <div class="card mb-4">
                <div class="card-header">Chi tiết hồ sơ</div>
                <div class="card-body">
                    <!-- Nhóm biểu mẫu (email) -->
                    <div class="mb-3">
                        <label class="small mb-1" for="email">Email</label>
                        <input class="form-control" id="email" name="email" type="text" placeholder="Nhập địa chỉ email của bạn" value="{{ auth()->user()->email }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="small mb-1" for="username">Tên đăng nhập <em class="link-danger">Tên của bạn trên trang web</em></label>
                        <input class="form-control @error('username') is-invalid @enderror" id="username" name="username" type="text" placeholder="Tên đăng nhập của bạn" value="{{ auth()->user()->username }}">
                        @error('username')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="small mb-1" for="fullname">Họ và tên</label>
                        <input class="form-control @error('fullname') is-invalid @enderror" id="fullname" name="fullname" type="text" placeholder="Họ và tên của bạn" value="{{ auth()->user()->fullname }}">
                        @error('fullname')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row gx-3 mb-3">
                        <div class="col-md-6">
                            <label class="small mb-1" for="phone">Số điện thoại</label>
                            <input class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" type="text" placeholder="Số điện thoại của bạn" value="{{ auth()->user()->phone }}">
                            @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="small mb-1" for="gender">Giới tính</label>
                            <input class="form-control" id="gender" name="gender" type="text" value="{{ auth()->user()->gender == 'M' ? 'Nam' : 'Nữ' }}" readonly>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="name" class="col-sm-12 col-form-label">Địa chỉ</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="Vui lòng nhập địa chỉ của bạn" value="{{ auth()->user()->address }}">
                            @error('address')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Nút lưu thay đổi -->
                    <div class="col-12 d-flex justify-content-start align-items-center">
                        <a href="/profile/my_profile" class="btn btn-outline-secondary me-2">Quay lại</a>
                        <button class="btn btn-dark" type="submit">Lưu thay đổi</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
