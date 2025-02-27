@extends('/layouts/main')

@push('css-dependencies')
<link href="/css/profile.css" rel="stylesheet" />
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
<div class="main-body px-5">

    @include('/partials/breadcumb')

    <div class="col-12 col-sm-11 col-md-10 col-xl-8">
        @if(session()->has('message'))
        {!! session("message") !!}
        @endif
    </div>

    <div class="row">
        <div class="col-12 col-sm-11 col-md-10 col-xl-8">
            <div class="panel panel-info">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-12 col-xl-4 col-sm-5 separator social-login-box"> <br>
                            <img alt="ảnh hồ sơ người dùng" class="img-thumbnail" src="{{ ('/'.'storage/' . auth()->user()->image) }}">
                        </div>
                        <div style="margin-top:20px;" class="col-12 col-xl-8 col-sm-7 login-box">

                            <form action="/profile/change_password" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="current_password">Mật khẩu hiện tại</label>
                                    <input type="password"
                                      class="form-control @error('current_password') is-invalid @enderror"
                                      id="current_password" name="current_password">
                                    @error('current_password')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Mật khẩu mới</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                      id="password" name="password">
                                    @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Nhập lại mật khẩu mới</label>
                                    <input type="password"
                                      class="form-control @error('password_confirmation') is-invalid @enderror"
                                      id="password_confirmation" name="password_confirmation">
                                    @error('password_confirmation')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
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
