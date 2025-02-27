@extends('/layouts/main')

@push('css-dependencies')
<link href="/css/profile.css" rel="stylesheet" />
@endpush

@push('scripts-dependencies')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.card');

        cards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.02)';
                this.style.boxShadow = '0 4px 8px rgba(0, 0, 0, 0.2)';
            });

            card.addEventListener('mouseleave', function() {
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

    <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="{{ '/'.'storage/' . auth()->user()->image }}" width="150">
                        <div class="mt-3">
                            <h4>{{ auth()->user()->username }}</h4>
                            <p class="text-secondary mb-1">{{ auth()->user()->role->role_name }}</p>
                            <p class="text-muted font-size-sm">Người dùng từ {{ auth()->user()->created_at->format('d M Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Họ và tên</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ auth()->user()->fullname }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ auth()->user()->email }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Số điện thoại</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ auth()->user()->phone }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Giới tính</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ auth()->user()->gender == "M" ? "Nam" : "Nữ" }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Địa chỉ</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ auth()->user()->address }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <a class="btn btn-dark" href="/profile/edit_profile">Chỉnh sửa hồ sơ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
