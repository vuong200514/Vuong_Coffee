@extends('/layouts/main')

@push('css-dependencies')
<link href="/css/profile.css" rel="stylesheet" />
@endpush

@push('scripts-dependencies')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.card').forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'scale(1.02)';
                card.style.boxShadow = '0 4px 8px rgba(0, 0, 0, 0.2)';
            });
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'scale(1)';
                card.style.boxShadow = 'none';
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
            <div class="card text-center p-3">
                <img src="/{{ 'storage/' . auth()->user()->image }}" width="150">
                <h4 class="mt-3">{{ auth()->user()->username }}</h4>
                <p class="text-secondary mb-1">{{ auth()->user()->role->role_name }}</p>
                <p class="text-muted font-size-sm">Người dùng từ {{ auth()->user()->created_at->format('d M Y') }}</p>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mb-3 p-3">
                @foreach ([
                    'Họ và tên' => auth()->user()->fullname,
                    'Email' => auth()->user()->email,
                    'Số điện thoại' => auth()->user()->phone,
                    'Giới tính' => auth()->user()->gender == 'M' ? 'Nam' : 'Nữ',
                    'Địa chỉ' => auth()->user()->address
                ] as $label => $value)
                <div class="row mb-2">
                    <div class="col-sm-3"><h6 class="mb-0">{{ $label }}</h6></div>
                    <div class="col-sm-9 text-secondary">{{ $value }}</div>
                </div>
                <hr>
                @endforeach
                <div class="text-end">
                    <a class="btn btn-dark" href="/profile/edit_profile">Chỉnh sửa hồ sơ</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
