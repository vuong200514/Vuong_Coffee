@extends('layouts.main')

@push('css-dependencies')
<link href="/css/profile.css" rel="stylesheet" />
@endpush

@push('scripts-dependencies')
<script src="/js/profile.js" type="module"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.form-group').forEach(group => {
            group.addEventListener('mouseenter', () => group.classList.add('highlight'));
            group.addEventListener('mouseleave', () => group.classList.remove('highlight'));
        });
    });
</script>
<style>
    .highlight { transform: scale(1.02); box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); }
</style>
@endpush

@section('content')
<div class="main-body px-1 px-md-3 px-lg-4 px-xl-5">
    @include('partials.breadcumb')
    @if(session('message')) {!! session('message') !!} @endif

    <div class="row">
        <div class="col-xl-4">
            <div class="card mb-4">
                <div class="card-header">Ảnh hồ sơ</div>
                <div class="card-body text-center">
                    <img class="img-account-profile mb-2" id="image-preview" src="{{ asset('storage/' . auth()->user()->image) }}" width="150">
                    <div class="small text-muted mb-4">Phải là ảnh không quá 2 MB</div>
                    <form method="post" action="/profile/edit_profile/{{ auth()->user()->id }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="oldImage" value="{{ auth()->user()->image }}">
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                        @error('image') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="card mb-4">
                <div class="card-header">Chi tiết hồ sơ</div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="small mb-1" for="email">Email</label>
                        <input class="form-control" id="email" name="email" type="text" value="{{ auth()->user()->email }}" readonly>
                    </div>
                    @foreach(['username' => 'Tên đăng nhập', 'fullname' => 'Họ và tên', 'phone' => 'Số điện thoại', 'address' => 'Địa chỉ'] as $field => $label)
                        <div class="mb-3">
                            <label class="small mb-1" for="{{ $field }}">{{ $label }}</label>
                            <input class="form-control @error($field) is-invalid @enderror" id="{{ $field }}" name="{{ $field }}" type="text" value="{{ auth()->user()->$field }}">
                            @error($field) <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    @endforeach
                    <div class="mb-3">
                        <label class="small mb-1" for="gender">Giới tính</label>
                        <input class="form-control" id="gender" name="gender" type="text" value="{{ auth()->user()->gender == 'M' ? 'Nam' : 'Nữ' }}" readonly>
                    </div>
                    <div class="d-flex">
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
