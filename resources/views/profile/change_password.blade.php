@extends('layouts.main')

@push('css-dependencies')
<link href="/css/profile.css" rel="stylesheet" />
@endpush

@push('scripts-dependencies')
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
<div class="main-body px-5">
    @include('partials.breadcumb')
    <div class="col-12 col-sm-11 col-md-10 col-xl-8">
        @if(session('message')) {!! session('message') !!} @endif
    </div>
    <div class="row">
        <div class="col-12 col-sm-11 col-md-10 col-xl-8">
            <div class="panel panel-info">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-12 col-xl-4 col-sm-5 separator social-login-box">
                            <img alt="ảnh hồ sơ người dùng" class="img-thumbnail" src="{{ '/'.'storage/' . auth()->user()->image }}">
                        </div>
                        <div class="col-12 col-xl-8 col-sm-7 login-box mt-3">
                            <form action="/profile/change_password" method="post">
                                @csrf
                                @foreach(['current_password' => 'Mật khẩu hiện tại', 'password' => 'Mật khẩu mới', 'password_confirmation' => 'Nhập lại mật khẩu mới'] as $field => $label)
                                    <div class="form-group">
                                        <label for="{{ $field }}">{{ $label }}</label>
                                        <input type="password" class="form-control @error('$field') is-invalid @enderror" id="{{ $field }}" name="{{ $field }}">
                                        @error('$field') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                @endforeach
                                <div class="form-group my-3">
                                    <button type="submit" class="btn btn-dark">Đổi mật khẩu</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
